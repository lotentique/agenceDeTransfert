<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use Mail;
use App\Models\Beneficiaire;
use App\Models\Expediteur;
use App\Models\Parametre_applique;
use App\models\Point_de_transfert;
use App\Models\Tarif_interval;
use App\Models\Tarif_pourcentage;
use App\Models\Transfert;
use App\models\ville;
use App\models\Historique_caisse;
use PhpParser\Node\Expr\Cast\Double;

class TransfertController extends BaseController
{
    /**
     *
     */
    /*function cripte($val)
    {
        $ele = ['9', '8', '7', '6', '5', '4', '3', '2', '1', '0'];
        $taille = strlen((string)$val);
        switch ($taille) {
            case 1:
                if($val==0){
                    $val=10000;
                    break;
                }else{
                    $val=$val*10000;
                    break;
                }
            case 2:
                $val=$val*1000;
                break;
            case 3:
                $val=$val*100;
                break;
            case 4:
                $val=$val*10;
                break;
        }
        $val=(string)$val;
        $code = "";
        for ($i = 0; $i < 5; $i++) {
            switch ($val[$i]) {
                case '0':
                    $code = $code . $ele[0];
                    break;
                case '1':
                    $code = $code . $ele[1];
                    break;
                case '2':
                    $code = $code . $ele[2];
                    break;
                case '3':
                    $code = $code . $ele[3];
                    break;
                case '4':
                    $code = $code . $ele[4];
                    break;
                case '5':
                    $code = $code . $ele[5];
                    break;
                case '6':
                    $code = $code . $ele[6];
                    break;
                case '7':
                    $code = $code . $ele[7];
                    break;
                case '8':
                    $code = $code . $ele[8];
                    break;
                case '9':
                    $code = $code . $ele[9];
                    break;
            }
        }
        return ($code);
    }*/

    function cripte(){
        $code_transfer= random_int(1000000000,9999999999);
        $validator=\Validator::make(['code_transfer'=>$code_transfer],['code_transfer'=>'unique:Transferts,code_transfer']);

        if($validator->fails()){
            $this->cripte();
        }
        return $code_transfer;
    }

    /**
     * retourne le tarif a payer
     */
    private function tarif_a_payer($val)
    {
        $tarifs = Tarif_interval::where('date_fin', '=', null)->get();
        foreach ($tarifs as  $tarif) {
            if ($val <= $tarif->max && $val > $tarif->min) {
                return $tarif->tarif;
            }
        }
        return 0;
    }

    public function verif(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tel_benef'=>'required|digits:8',
            'tel_expe'=>'required|digits:8',
        ]);
        if ($validator->fails()) {
           return $this->envoiError('erreure de validation ',$validator->errors());
        }
        $villes = ville::all();
        $benef=Beneficiaire::where('tel','=',$request->tel_benef)->get();
        $expe=Expediteur::where('tel','=',$request->tel_expe)->get();
        $params = [
            'benef'=>$benef,
            'expe'=>$expe,
            'villes'=>$villes,
            'tel_expe'=>(integer)$request->tel_expe,
            'tel_benef'=>(integer)$request->tel_benef
        ];
        return $this->envoiResponse($params,'');
    }
   
    /**
     *
     */
    public function transfert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom_expediteur' => 'required|alpha_dash',
            'prenom_expediteur' => 'required|alpha_dash',
            'tel_expediteur' => 'required|digits:8',
            'nni_expediteur' => 'required|digits:10',
 
            'nom_beneficiaire' => 'required|alpha_dash',
            'prenom_beneficiaire' => 'required|alpha_dash',
            'tel_beneficiaire' => 'required|digits:8',
            'montant' => 'required|alpha_num',
        ]);
        if ($validator->fails()) {
           return $this->envoiError('erreure de validation ',$validator->errors());
        }
        if($request->email_expediteur !=null){
            if($request->email_beneficiaire !=null){
                $validator = Validator::make($request->all(), [
                    'email_expediteur' => 'email',
                    'email_beneficiaire' => 'email',
                ]);
                if ($validator->fails()) {
                    return $this->envoiError('erreure de validation ',$validator->errors());
                }
            }else{
                $validator = Validator::make($request->all(), [
                    'email_expediteur' => 'email',
                ]);
                if ($validator->fails()) {
                    return $this->envoiError('erreure de validation ',$validator->errors());
                }
            }
        }else{
            $validator = Validator::make($request->all(), [
                    'email_beneficiaire' => 'email',
                ]);
                if ($validator->fails()) {
                    return $this->envoiError('erreure de validation ',$validator->errors());
                }
        }
        $tarif_applique = Parametre_applique::where('date_fin', '=', null)->get();
        if ($tarif_applique[0]->regle == 1) {
            //tarification par interval
            $tarif = $this->tarif_a_payer($request->montant);
            if ($tarif == 0) {
                $mx = Tarif_interval::max('max');
                $pr = Tarif_interval::where([['max', '=', $mx], ['min', '=', $mx]])->get();
                $tarif = $request->montant * $pr[0]->tarif / 100;
            }
        } else {
            //tarification par pourcentage
            $pourcentage = Tarif_pourcentage::where('date_fin', '=', null)->get();
            $tarif = $request->montant * $pourcentage[0]->pourcentage / 100;
        }
        $ville = ville::where('id_ville', '=', $request->ville)->get();

        $benef=Beneficiaire::where('tel','=',$request->tel_beneficiaire)->get();
        $exped=Expediteur::where('tel','=',$request->tel_expediteur)->get();
        if(count($benef)==0){
            $benef = Beneficiaire::create([
                'nom' => $request->nom_beneficiaire,
                'prenom' => $request->prenom_beneficiaire,
                'tel' => $request->tel_beneficiaire,
                'email' => $request->email_beneficiaire,
            ]);
        }else{
            $benef=$benef[0];
        }
        if(count($exped)==0){
             $exped = Expediteur::create([
                'nom' => $request->nom_expediteur,
                'prenom' => $request->prenom_expediteur,
                'tel' => $request->tel_expediteur,
                'nni' => $request->nni_expediteur,
                'email' => $request->email_expediteur,
            ]);
        }else{
            $exped=$exped[0];
        }
        $point = Point_de_transfert::where('id', '=', auth()->user()->id_pnt)->get();
        $tr=Transfert::max('id');
        $tr=$tr+1;
        //$code = $this->cripte($tr);
        $code = $this->cripte();
        Transfert::create([
            'montant' => $request->montant,
            'tarif' => $tarif,
            'code_transfer' => $code,
            'effectue_par' => auth()->user()->id,
            'id_expediteur' => $exped->id,
            'id_beneficiaire' => $benef->id,
            'id_ville' => $request->id_ville,
            'id_pnt' => $point[0]->id
        ]);
        $caisse=$point[0]->caisse;
        $caisse=$caisse+$request->montant+$request->tarif;
        $point[0]->update([
            'caisse'=>$caisse,
        ]);
        $params = [
                'code' => $code,
                'tarif' => $tarif,
            ];

        return $this->envoiResponse($params,'transfert effectue');
        
    }
    /**
     *
     */

     public function retrais(Request $request){
        $validator = Validator::make($request->all(), [
            'code' => 'required|digits:5',
        ]);
        if ($validator->fails()) {
           return $this->envoiError('erreure de validation ',$validator->errors());
        }
        $idpnt = auth()->user()->id_pnt;
        $pnt = Point_de_transfert::where('id', '=', $idpnt)->get();
        $transfertNonReauperer = Transfert::where([
            ['code_transfer', '=', $request->code],
            ['status', '=', false],
            ['id_ville', '=', $pnt[0]->id_ville]
        ])->get();

        $transfertRecuperer = Transfert::where([
            ['code_transfer', '=', $request->code],
            ['status', '=', true],
            ['id_ville', '=', $pnt[0]->id_ville]
        ])->get();
        $transfertEnCour= Transfert::where([
            ['code_transfer', '=', $request->code],
            ['id_pnt', '=', $idpnt]
        ])->get();
        if (count($transfertNonReauperer)) {
            $benef = Beneficiaire::where('id', '=', $transfertNonReauperer[0]->id_beneficiaire)->get();
            $params = [
                'benef' => $benef,
                'trans' => $transfertNonReauperer,
            ];
            return $this->envoiResponse($params,'transfert non recupere');
        } elseif (count($transfertRecuperer)) {
            $benef = Beneficiaire::where('id', '=', $transfertRecuperer[0]->id_beneficiaire)->get();
            $pnt1 = Point_de_transfert::where('id', '=', $transfertRecuperer[0]->id_pnt)->get();
            $villeFrom = ville::where('id_ville', '=', $pnt1[0]->id_ville)->get();
            $params = [
                'trans' => $transfertRecuperer,
                'benef' => $benef,
                'villeFrom' => $villeFrom,
                'pnt1' => $pnt1,
            ];
            return $this->envoiResponse($params,'transfert recuperer');
        }elseif (count($transfertEnCour)) {
            if($transfertEnCour[0]->status){
                $benef = Beneficiaire::where('id', '=', $transfertEnCour[0]->id_beneficiaire)->get();
                $pnt1 = Point_de_transfert::where('id', '=', $transfertEnCour[0]->id_pnt)->get();
                $villeFrom = ville::where('id_ville', '=', $pnt1[0]->id_ville)->get();
                $params = [
                    'trans' => $transfertEnCour,
                    'benef' => $benef,
                    'villeFrom' => $villeFrom,
                    'pnt1' => $pnt1,
                ];
                return $this->envoiResponse($params,'transfert a ete recuperer');
            }else{

                $benef = Beneficiaire::where('id', '=', $transfertEnCour[0]->id_beneficiaire)->get();
                $pnt1 = Point_de_transfert::where('id', '=', $transfertEnCour[0]->id_pnt)->get();
                $villeFrom = ville::where('id_ville', '=', $pnt1[0]->id_ville)->get();
                $params = [
                    'trans' => $transfertEnCour,
                    'benef' => $benef,
                ];
                return $this->envoiResponse($params,'transfert pas recuperer');
            }
        } else {
            $params = [];
            return $this->envoiResponse($params,'ce code de transfert n\'existe pas ');
        }
     }

     /**
      * 
      *
      */
      public function effectueRetrait(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nni_benef' => 'required|alpha_dash|min:10|max:10',
            'id_trans'=>'required',
        ]);
        if ($validator->fails()) {
            return $this->envoiError('erreure de validation ',$validator->errors());
        }
        $trans = Transfert::where('id', '=', $request->id_trans)->get();
        $pnt = Point_de_transfert::where('id', '=', auth()->user()->id_pnt)->get();
        $caisse=$pnt[0]->caisse;
        if($trans[0]->montant>$caisse){
            $params=[];
            return $this->envoiResponse($params,'se montant ne se trouve pas dans la caisse ');
        }
        $trans[0]->update([
            'status' => true,
            'date_recuperation' => now(),
            'modifier_par' =>auth()->user()->id,
            'nni_beneficiaire' => $request->nni_benef,
        ]);
        $caisse=$caisse-$trans[0]->montant;
        $pnt[0]->update([
            'caisse'=>$caisse,
        ]);
        $params=[
            'message'=>'retrais effectue'
        ];
        return $this->envoiResponse($params,'');
    }
    /***
     * 
     * 
     */
    public function ajoutCaisse(Request $request){
        $validator = Validator::make($request->all(), [
            'montant' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return $this->envoiError('erreure de validation ',$validator->errors());
        }
        $pnt = Point_de_transfert::where('id', '=', auth()->user()->id_pnt)->get();
        $caisse=$pnt[0]->caisse;
        $caisse=$caisse+$request->montant; 
        $pnt[0]->update([
            'caisse'=>$caisse,
        ]);
        Historique_caisse::create([
            'effectue_par' => auth()->user()->id,
            'operation'=>'ajout',
            'montant'=>$request->montant,
            'id_pnt'=>auth()->user()->id_pnt,
            ]);
        $params=[
            'message'=>'opperation effectue avec sucsser'
        ];
        return $this->envoiResponse($params,'');
    }
    /**
     * 
     * 
     */
    public function retiraisCaisse(Request $request){
        $validator = Validator::make($request->all(), [
            'montant' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return $this->envoiError('erreure de validation ',$validator->errors());
        }
        $pnt = Point_de_transfert::where('id', '=', auth()->user()->id_pnt)->get();
        $caisse=$pnt[0]->caisse;
        if($request->montant>$caisse){
            $params=[];
            return $this->envoiResponse($params,'');
        }
        $caisse=$caisse-$request->montant;
        $pnt[0]->update([
            'caisse'=>$caisse,
        ]);
        Historique_caisse::create([
            'effectue_par' => auth()->user()->id,
            'operation'=>'retirais',
            'montant'=>$request->montant,
            'id_pnt'=>auth()->user()->id_pnt,
            ]);
       $params=[
            'message'=>'opperation effectue avec sucsser'
        ];
        return $this->envoiResponse($params,'');
    }
}