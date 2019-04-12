<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tarif_interval;

use App\User;
use Validator;

class TarifIntervalController extends Controller
{
    /**
     * retourne true si le valeu saisie se trouve entre un interval donne
     */
    private function verifInterval($val)
    {
        //$ver = false;
        $tarifs = Tarif_interval::where('date_fin', '=', null)->get();
        foreach ($tarifs as  $tarif) {
            if ($val < $tarif->max && $val > $tarif->min) {
                //$ver = true;
                return true;
            }
        }
        return false;
    }

    public function index()
    {
        $tarif = Tarif_interval::where('date_fin', '=', null)->get();
        $params = [
            'title' => 'Liste des tarif',
            'tarifs' => $tarif,
        ];
        return view('admin.config.tarif.interval.listTarif')->with($params);
    }

    /**
     * 
     */

    public function create()
    {
        return view('admin.config.tarif.interval.create');
    }

    /**
     *  
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'min' => 'required|numeric|unique:tarif_intervals,min|max:' . $request->max,
            'max' => 'required|numeric|unique:tarif_intervals,max',
            'tarif' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if (!$this->verifInterval($request->max) && !$this->verifInterval($request->min)) {
            Tarif_interval::create([
                'min' => $request->min,
                'max' => $request->max,
                'tarif' => $request->tarif,
                'date_debut' => now(),
                'cree_par' => auth()->user()->id,
            ]);
        } else {
            $errors = ["ce interval existe"];
            return back()->withErrors($errors);
        }
        return redirect('admin/tarif');
    }
    /**
     * 
     */
    public function edit(Tarif_interval $tarif_interval)
    {
        return view('admin.config.tarif.interval.edit', compact('tarif_interval'));
    }

    /**
     * 
     */
    public function update(Request $request, Tarif_interval $tarif_interval)
    {
        $id = $tarif_interval->id;
        $validator = Validator::make($request->all(), [
            'min' => 'required|numeric|unique:tarif_intervals,min,' . $id . '|max:' . $request->max,
            'max' => 'required|numeric|unique:tarif_intervals,max,' . $id . '',
            'tarif' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if ($tarif_interval->min == $request->min && $tarif_interval->max == $request->max) {
            $tarif_interval->update([
                //'min' => $request->min,
                //'max' => $request->max,
                ' da te_fin' => now(),
                'tarif' => $request->tarif,
                'modifier_par' => auth()->user()->id,
            ]);
        } elseif (!$this->verifInterval($request->max) && !$this->verifInterval($request->min)) {
            $tarif_interval->update([
                'min' => $request->min,
                'max' => $request->max,
                'tarif' => $request->tarif,
                'modifier_par' => auth()->user()->id,
            ]);
        } else {
            $errors = ["ce interval existe"];
            return back()->withErrors($errors);
        }
        return redirect('admin/tarif');
    }
}
