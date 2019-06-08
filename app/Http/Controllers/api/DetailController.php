<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use App\models\Point_de_transfert;
use App\Models\Transfert;
use App\models\ville;

class DetailController extends BaseController
{

    public function detail(){
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
        return $this->envoiResponse($params,'');
    }
}