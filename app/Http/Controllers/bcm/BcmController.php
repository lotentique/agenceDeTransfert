<?php

namespace App\Http\Controllers\bcm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\models\Point_de_transfert;
use App\Models\Transfert;
use App\Charts\statTrans;
use App\Models\Ville;

class BcmController extends Controller
{
    
   public function index(){
   	$trans= transfert::all();
        $janvier = transfert::where([['created_at','>=', '2019-01-01'],['created_at','<', '2019-02-01']])->count();
        $fevrier = transfert::where([['created_at','>=', '2019-02-01'],['created_at','<', '2019-03-01']])->count();
        $mars = transfert::where([['created_at','>=', '2019-03-01'],['created_at','<', '2019-04-01']])->count();
        $avril = transfert::where([['created_at','>=', '2019-04-01'],['created_at','<', '2019-05-01']])->count();
        $mai = transfert::where([['created_at','>=', '2019-05-01'],['created_at','<', '2019-06-01']])->count();
        $juin = transfert::where([['created_at','>=', '2019-06-01'],['created_at','<', '2019-07-01']])->count();
        $juillet = transfert::where([['created_at','>=', '2019-07-01'],['created_at','<', '2019-08-01']])->count();
        $aout = transfert::where([['created_at','>=', '2019-08-01'],['created_at','<', '2019-09-01']])->count();
        $septembre = transfert::where([['created_at','>=', '2019-09-01'],['created_at','<', '2019-10-01']])->count();
        $octobre = transfert::where([['created_at','>=', '2019-10-01'],['created_at','<', '2019-11-01']])->count();
        $novembre = transfert::where([['created_at','>=', '2019-11-01'],['created_at','<', '2019-12-01']])->count();
        $decembre = transfert::where([['created_at','>=', '2019-12-01'],['created_at','<', '2020-01-01']])->count();
        $benefj = transfert::whereDate('created_at', today())->sum('tarif');
        $b1 = transfert::whereDate('created_at', today()->subDays(1))->sum('tarif');
        $b2 = transfert::whereDate('created_at', today()->subDays(2))->sum('tarif');
        $b3 = transfert::whereDate('created_at', today()->subDays(3))->sum('tarif');
        $b4 = transfert::whereDate('created_at', today()->subDays(4))->sum('tarif');
        $b5 = transfert::whereDate('created_at', today()->subDays(5))->sum('tarif');
        $b6 = transfert::whereDate('created_at', today()->subDays(6))->sum('tarif');

        $stats= new statTrans;
        $stats->labels(['janvier','fevrier','mars','avril','mai','juin','juillet','aout','septembre','octobre','novembre','decembre']);
        $dataset = $stats->dataset('Transactions', 'bar', [$janvier, $fevrier, $mars,$avril,$mai,$juin,$juillet,$aout,
        $septembre,$octobre,$novembre,$decembre]);
        $dataset->backgroundColor(['lightgray','lightgray','lightgray','lightgray','lightgray','lightgray','lightgray','lightgray','lightgray','lightgray','lightgray','lightgray']);
        $dataset->color(['black','black','black','black','black','black','black','black','black','black','black','black']);
        $benefice= new statTrans;
        $benefice->labels(['6 jour avant','5 jour avant','4 jour avant','3 jour avant','2 jour avant','hier','aujordhui']);
        $dataset = $benefice->dataset('benifice par jour', 'bar', [$b6, $b5, $b4,$b3,$b2,$b1,$benefj]);
        $dataset->backgroundColor(['red','blue', 'green']);
        $dataset->color(['#C5CAE9', '#783593','#283593']);

        $sommeCaiss=Point_de_transfert::sum('caisse');
        $sommeRetrai=Transfert::where('status','=',false)->sum('montant');
        $gain=Transfert::where('created_at','=',now())->sum('tarif');
        $capital=$sommeCaiss-$sommeRetrai;
        //return(now());
        $Transfertelever = Transfert::where('montant','>=', '200000')->get();
        $CTransfertelever = Transfert::where('montant','>=', '200000')->count();
        $CTransfert = Transfert::get()->count();
        $hasnoti='has-noti';
        $Transfert = Transfert::get();
        $Ptransfert = Point_de_transfert::get();
        $villes = Ville::get();
        $users=User::get();
        
        //Point de transfert le plus actif
        $ptactif=Transfert::orderBy('id_pnt','asc')->groupBy('id_pnt')->count('id_pnt');
        $id_pntA=array();
        foreach ($Transfert as $row) {
        	$count=0;
        	foreach ($Transfert as $row2) {
        		if ($row->id_pnt==$row2->id_pnt) {
        			$count++;
        		}
        	
            }
            if ($count==$ptactif) {
            	if (in_array($row->id_pnt, $id_pntA, true)) {
                   continue;
                }
                array_push($id_pntA,$row->id_pnt);
            	
            }	
        }
        $ptactifDT = transfert::where('id_pnt','=', $id_pntA)->count();
        $ptactifDR = transfert::where([['id_pnt','=', $id_pntA],['date_recuperation','!=','null']])->count();
        $statsPA= new statTrans;
        $statsPA->labels(['Transfert','Retrait']);
        $dataset = $statsPA->dataset('point actif', 'pie', [$ptactifDT,$ptactifDR]);
        $dataset->backgroundColor(['#283593','orange']);
        $dataset->color(['#C5CAE9', '#783593','#283593']);
        //fin
        //Point de transfert le moins actif
        $ptMactif=Transfert::orderBy('id_pnt','desc')->groupBy('id_pnt')->count('id_pnt');
        $id_pntMA=array();
        foreach ($Transfert as $row) {
        	$count=0;
        	foreach ($Transfert as $row2) {
        		if ($row->id_pnt==$row2->id_pnt) {
        			$count++;
        		}
        	
            }
            if ($count==$ptMactif) {
            	if (in_array($row->id_pnt, $id_pntMA, true)) {
                   continue;
                }
                array_push($id_pntMA,$row->id_pnt);
            	
            }	
        }
        $ptMactifDT = transfert::where('id_pnt','=', $id_pntMA)->count();
        $ptMactifDR = transfert::where([['id_pnt','=', $id_pntMA],['date_recuperation','!=','null']])->count();
        $statsPMA= new statTrans;
        $statsPMA->labels(['Transfert','Retrait']);
        $dataset = $statsPMA->dataset('point actif', 'pie', [$ptMactifDT,$ptMactifDR]);
        $dataset->backgroundColor(['gray','red']);
        $dataset->color(['#C5CAE9', '#783593','#283593']);
        //fin

        $params = [
            'Transfert' => $Transfert,
            'villes' => $villes,
            'users' => $users,
            'Ptransfert' => $Ptransfert,
            'Transfertelever' => $Transfertelever,
            'CTransfertelever' => $CTransfertelever,
            'hasnoti' => $hasnoti,
            'CTransfert' => $CTransfert,
        ];
        return view('bcm.bcm',compact('benefice','stats','statsPA','statsPMA','sommeCaiss','sommeRetrai','capital','gain'))->with($params);
       
   }
}