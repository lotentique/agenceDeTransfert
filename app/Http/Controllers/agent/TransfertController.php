<?php

namespace App\Http\Controllers\agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

class TransfertController extends Controller
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
    public function index1()
    {
        $villes = ville::all();
        $parems = [
            'villes' => $villes
        ];
        return view('agent.transfert')->with($parems);
    }

    public function index()
    {
        return view('agent.saisie') ;
    }
    public function verif(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tel_benef'=>'required|digits:8',
            'tel_expe'=>'required|digits:8',
        ]);
        if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
        }
        $benef=Beneficiaire::where('tel','=',$request->tel_benef)->get();
        $expe=Expediteur::where('tel','=',$request->tel_expe)->get();
        $params = [
            'benef'=>$benef,
            'expe'=>$expe,
            'tel_expe'=>(integer)$request->tel_expe,
            'tel_benef'=>(integer)$request->tel_benef
        ];
        //return($params);
        return redirect()->route('trensfert')->with(['params'=>$params]);
    }
    public function transfer(Request $request)
    {
        $villes = ville::all();

        $param=session()->get('params');
        $params=[
            'villes'=>$villes,
            'benef'=>$param["benef"],
            'expe'=>$param["expe"]
        ];
        return view('agent.transfert')->with($params);
    }
    /**
     *
     */
    public function confirm(Request $request)
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
           return back()->withErrors($validator)->withInput();
        }
        if($request->email_expediteur !=null){
            if($request->email_beneficiaire !=null){
                $validator = Validator::make($request->all(), [
                    'email_expediteur' => 'email',
                    'email_beneficiaire' => 'email',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
            }else{
                $validator = Validator::make($request->all(), [
                    'email_expediteur' => 'email',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
            }
        }else{
            $validator = Validator::make($request->all(), [
                    'email_beneficiaire' => 'email',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
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
        $benef = [
            'nom' => $request->nom_beneficiaire,
            'prenom' => $request->prenom_beneficiaire,
            'tel' => $request->tel_beneficiaire,
            'email' => $request->email_beneficiaire,
        ];
        $expe = [
            'nom' => $request->nom_expediteur,
            'prenom' => $request->prenom_expediteur,
            'tel' => $request->tel_expediteur,
            'nni' => $request->nni_expediteur,
            'email' => $request->email_expediteur,
        ];
        $parems = [
            'benef' => $benef,
            'expe' => $expe,
            'tarif' => $tarif,
            'ville' => $ville,
            'montant' => $request->montant
        ];
        return view('agent.confirme')->with($parems);
    }
    /**
     *
     */
    public function store(Request $request)
    {
        $point = Point_de_transfert::where('id', '=', auth()->user()->id_pnt)->get();
        $benef=Beneficiaire::where('tel','=',$request->tel_beneficiaire)->get();
        $exped=Expediteur::where('tel','=',$request->tel_expediteur)->get();
        $pnt = Point_de_transfert::where('id', '=', auth()->user()->id_pnt)->get();
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
       $tr=Transfert::max('id');
       $tr=$tr+1;
       // $code = $this->cripte($tr);
        $code = $this->cripte();
        Transfert::create([
            'montant' => $request->montant,
            'tarif' => $request->tarif,
            'code_transfer' => $code,
            'effectue_par' => auth()->user()->id,
            'id_expediteur' => $exped->id,
            'id_beneficiaire' => $benef->id,
            'id_ville' => $request->id_ville,
            'id_pnt' => $point[0]->id
        ]);
        $caisse=$pnt[0]->caisse;
        $caisse=$caisse+$request->montant+$request->tarif;
        $pnt[0]->update([
            'caisse'=>$caisse,
        ]);
        $parems = [
            'code' => $code
        ];
        return view('agent.code')->with($parems);
    }
    public function st(Request $request)
    {
    $data=[1,2];
        Mail::send('emails.welcome', $data, function($message)
        {
             $message->to('demsscash@gmail.com', 'John Smith')->subject('Welcome!');
        });

    }
}