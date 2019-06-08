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
use App\models\Historique_caisse;
use PhpParser\Node\Expr\Cast\Double;

class AgentController extends Controller
{

    public function index(){
        $pnt=Point_de_transfert::where('id','=',auth()->user()->id_pnt)->get();
        //return($pnt[0]->id_ville);
        $nbrtrans =Transfert::where('effectue_par','=', auth()->user()->id)->count();
        $nbrretrais =Transfert::where([
            ['modifier_par','=', auth()->user()->id],
            ['date_recuperation','!=',null]
        ])->count();
        $transrecu=Transfert::where('id_ville','=', $pnt[0]->id_ville)->count();
        $somme=Transfert::where([
            ['id_ville','=', $pnt[0]->id_ville],
            ['status', '=', false],
        ])->sum('montant');
        $params=[
            'nbrtrans'=>$nbrtrans,
            'nbrretrais'=>$nbrretrais,
            'transrecu'=>$transrecu,
            'caisse'=>$pnt[0]->caisse,
            'somme'=>$somme,
        ];
        return view('agent.Agent')->with($params);
    }
    public function retirais(Request $request){
        $validator = Validator::make($request->all(), [
            'montant' => 'required|numeric',
        ]);
        if($request->montant==null){
            $params=[
                'message'=>'vous n avez saisie aucun montant',
            ];
            return back()->withErrors($params);
        }
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $pnt = Point_de_transfert::where('id', '=', auth()->user()->id_pnt)->get();
        $caisse=$pnt[0]->caisse;
        if($request->montant>$caisse){
            $params=[
                'message'=>"se montant n'est pas disponible dans la caisse",
            ];
            return back()->withErrors($params);
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
        return redirect('agent')->with($params);
    }
    public function ajout(Request $request){
        $validator = Validator::make($request->all(), [
            'montant' => 'required|numeric',
        ]);
        if($request->montant==null){
            $params=[
                'message'=>'vous n avez saisie aucun montant',
            ];
            return back()->withErrors($params);
        }
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
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
        return redirect('agent')->with($params);
    }
   
}