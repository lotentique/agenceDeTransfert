<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Tarif_pourcentage;

use App\User;
use Validator;

class TarifPourcentageController extends Controller
{
    public function index()
    {
        $pourcentage = Tarif_pourcentage::where('date_fin', '=', null)->get();
        $params = [
            'title' => 'Liste des tarif',
            'pourcentages' => $pourcentage,
        ];
        return view('admin.config.tarif.pourcentage.listTarif')->with($params);
    }

    public function create()
    {
        return view('admin.config.tarif.pourcentage.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pourcentage' => 'required|numeric',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Tarif_pourcentage::create([
            'pourcentage' => $request->pourcentage,
            'date_debut' => now(),
            'cree_par' => auth()->user()->id,
        ]);


        return redirect('admin/pourcentage');
    }


    public function edit(Tarif_pourcentage $tarif_pourcentage)
    {
        return view('admin.config.tarif.pourcentage.edit', compact('tarif_pourcentage'));
    }


    public function update(Request $request, Tarif_pourcentage $tarif_pourcentage)
    {
        $validator = Validator::make($request->all(), [
            'pourcentage' => 'required|numeric|unique:Tarif_pourcentages,pourcentage',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $tarif_pourcentage->update([
            'date_fin' => now(),
            'modifier_par' => auth()->user()->id,
        ]);
        Tarif_pourcentage::create([
            'pourcentage' => $request->pourcentage,
            'date_debut' => now(),
            'cree_par' => auth()->user()->id,
        ]);
        return redirect('admin/pourcentage');
    }
}
