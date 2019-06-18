<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Validator;

class ConfigController extends Controller
{


	public function index()
	{
        $heur = Config::get();
        $params = [
            'heurs' => $heur,

        ];
		return view('admin.config.horaire')->with($params);
    }
    
    public function changerHeur(Request $request){
          $heur = Config::get();
        $params = [
            'heurs' => $heur,

        ];
         $validator = Validator::make($request->all(), [
            'debut' => 'required',
            'fin' => 'required',
        ]);
        if ($validator->fails()) {
            return back();
        }
        $debut=$request->debut." ";
        $fin=$request->fin." ";
        $heur = Config::get();
        $heur[0]->update([
            'debut' => $debut,
            'fin' => $fin,
        ]);
        return redirect('config');
    }
}