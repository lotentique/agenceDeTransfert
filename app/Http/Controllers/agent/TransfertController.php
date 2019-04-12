<?php

namespace App\Http\Controllers\agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Validator;

use App\Models\Beneficiaire;
use App\Models\Expediteur;
use App\Models\Parametre_applique;
use App\models\Point_de_transfert;
use App\Models\Tarif_interval;
use App\Models\Tarif_pourcentage;
use App\Models\Transfert;
use App\models\ville;
use PhpParser\Node\Expr\Cast\Double;

class TransfertController extends Controller
{
    /**
     * 
     */
    function cripte($val)
    {
        $ele = ['J', 'I', 'H', 'F', 'E', 'D', 'G', 'C', 'B', 'A'];
        $val = (string)$val;
        $code = "#";
        for ($i = 0; $i < strlen($val); $i++) {
            if ($val[$i] == '1') {
                $code = $code . $ele[0];
            }
            if ($val[$i] == '2') {
                $code = $code . $ele[1];
            }
            if ($val[$i] == '3') {
                $code = $code . $ele[2];
            }
            if ($val[$i] == '4') {
                $code = $code . $ele[3];
            }
            if ($val[$i] == '5') {
                $code = $code . $ele[4];
            }
            if ($val[$i] == '6') {
                $code = $code . $ele[5];
            }
            if ($val[$i] == '7') {
                $code = $code . $ele[6];
            }
            if ($val[$i] == '8') {
                $code = $code . $ele[7];
            }
            if ($val[$i] == '9') {
                $code = $code . $ele[8];
            }
            if ($val[$i] == '0') {
                $code = $code . $ele[9];
            }
        }
        $code = $code . '#';
        return ($code);
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
    public function index()
    {
        $villes = ville::all();
        $parems = [
            'villes' => $villes
        ];
        return view('agent.transfert')->with($parems);
    }
    /**
     * 
     */
    public function confirm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom_expediteur' => 'required|alpha_dash',
            'prenom_expediteur' => 'required|alpha_dash',
            'tel_expediteur' => 'required|alpha_num|min:8|max:8',
            'nni_expediteur' => 'required|alpha_num|min:10|max:10',
            //'email_expediteur' => 'email',

            'nom_beneficiaire' => 'required|alpha_dash',
            'prenom_beneficiaire' => 'required|alpha_dash',
            'tel_beneficiaire' => 'required|alpha_num|min:8|max:8',
            //'email_beneficiaire' => 'email',
            'montant' => 'required|alpha_num',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $tarif_applique = Parametre_applique::where('date_fin', '=', null)->get();
        if ($tarif_applique[0]->regle == 1) {
            //tarification par interval 
            $tarif = $this->tarif_a_payer($request->montant);
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
        $point = Point_de_transfert::find(auth()->user()->id_pnt)->get();
        $benef = Beneficiaire::create([
            'nom' => $request->nom_beneficiaire,
            'prenom' => $request->prenom_beneficiaire,
            'tel' => $request->tel_beneficiaire,
            'email' => $request->email_beneficiaire,
        ]);
        $exped = Expediteur::create([
            'nom' => $request->nom_expediteur,
            'prenom' => $request->prenom_expediteur,
            'tel' => $request->tel_expediteur,
            'nni' => $request->nni_expediteur,
            'email' => $request->email_expediteur,
        ]);
        $cd = "bc12";
        $tr = Transfert::create([
            'montant' => $request->montant,
            'tarif' => $request->tarif,
            'code_transfer' => $cd,
            'effectue_par' => auth()->user()->id,
            'id_expediteur' => $exped->id,
            'id_beneficiaire' => $benef->id,
            'id_ville' => $request->id_ville,
            'id_pnt' => $point[0]->id
        ]);
        $idtr = $tr->id;
        $code = $this->cripte($idtr);
        $tr->update([
            'code_transfer' => $code,

        ]);
        $parems = [
            'code' => $code
        ];
        return view('agent.code')->with($parems);
        //return redirect('home');
    }
}
