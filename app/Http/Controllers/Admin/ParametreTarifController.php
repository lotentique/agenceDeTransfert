<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Parametre_applique;

use App\User;
use Validator;

class ParametreTarifController extends Controller
{
    public function index()
    {
        $parametre = Parametre_applique::where('date_fin', '=', null)->get();
        //$dec = $parametre->description;
        $params = [
            'parametres' => $parametre,

        ];
        return view('admin.config.tarification')->with($params);
    }
    public function store(Request $request)
    {
        if ($request->regele == 'interval') {
            Parametre_applique::create([
                'regle' => 1,
                'date_debut' => now(),
                'cree_par' => auth()->user()->id,
                'description' => "interval",
            ]);
        } else {
            Parametre_applique::create([
                'regle' => 2,
                'date_debut' => now(),
                'cree_par' => auth()->user()->id,
                'description' => "pourcentage",
            ]);
        }
        return redirect('admin/tarification');
    }

    public function update(Request $request, Parametre_applique $parametre_applique)
    {
        if ($parametre_applique->regle == $request->mode || empty($request->mode)) {
            $errors = ["ce parametre est deja applique"];
            return back()->withErrors($errors);
        } else {
            $parametre_applique->update([
                'date_fin' => now(),
                'modifier_par' => auth()->user()->id,
            ]);
            $desc = "interval";
            if ($request->mode == 2) {
                $desc = "pourcentage";
            }
            Parametre_applique::create([
                'regle' => $request->mode,
                'date_debut' => now(),
                'cree_par' => auth()->user()->id,
                'description' => $desc,
            ]);
        }
        return redirect('admin/tarification');
    }
}
