<?php

namespace App\Http\Controllers\agent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
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

class RetraitController extends Controller
{

    public function retrait(Request $request)
    {
        $idpnt = auth()->user()->id_pnt;
        $pnt = Point_de_transfert::where('id', '=', $idpnt)->get();
        $transfertNonReauperer = Transfert::where([
            ['code_transfer', '=', $request->code],
            ['status', '=', false],
            ['id_ville', '=', $pnt[0]->id_ville],
            ['id_pnt', '!=', $idpnt]
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
            return view('agent.retrait')->with($params);
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
            return view('agent.retraitEffec')->with($params);
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
                return view('agent.retraitStatus')->with($params);
            }else{

                $benef = Beneficiaire::where('id', '=', $transfertEnCour[0]->id_beneficiaire)->get();
                $pnt1 = Point_de_transfert::where('id', '=', $transfertEnCour[0]->id_pnt)->get();
                $villeFrom = ville::where('id_ville', '=', $pnt1[0]->id_ville)->get();
                $params = [
                    'trans' => $transfertEnCour,
                    'benef' => $benef,
                ];
                 return view('agent.retraitStatus')->with($params);
            }
        } else {
            $params = [
                'message' => "ce code de transfert n'existe pas ",
            ];
            return back()->withErrors($params);
        }
    }


    public function retraitEffectue(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nni_benef' => 'required|alpha_dash|min:10|max:10',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $trans = Transfert::where('id', '=', $request->id_trans)->get();
        $pnt = Point_de_transfert::where('id', '=', auth()->user()->id_pnt)->get();
        $caisse=$pnt[0]->caisse;
        if($trans[0]->montant>$caisse){
            $params=[
                'message'=>"echec de l'opperation se montant ne se trouve pas dans la caisse ",
            ];
            return back()->withErrors($params);
        }
        $trans[0]->update([
            'status' => true,
            'date_recuperation' => now(),
            'modifier_par' => auth()->user()->id,
            'nni_beneficiaire' => $request->nni_benef,
        ]);
        $caisse=$caisse-$trans[0]->montant;
        $pnt[0]->update([
            'caisse'=>$caisse,
        ]);
        return redirect('agent');
    }
}