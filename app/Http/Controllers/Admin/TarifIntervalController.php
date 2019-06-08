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
        $tarifs = Tarif_interval::where('date_fin', '=', null)->get();
        foreach ($tarifs as  $tarif) {
            if ($val < $tarif->max && $val > $tarif->min) {
                return true;
            }
        }
        return false;
    }

    public function index()
    {
        $tarif = Tarif_interval::where('date_fin', '=', null)->orderBy('min', 'DESC')->get();
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
        $les = Tarif_interval::all();
        if (count(Tarif_interval::all()) == 0) {
            $params = [
                'mintr' => 1,
            ];
        } else {
            $min = Tarif_interval::max('max');
            //return ($min);
            $params = [
                'mintr' => $min,
            ];
        }
        return view('admin.config.tarif.interval.create')->with($params);
    }

    /**
     *  
     */

    public function store(Request $request)
    {
        $mx = Tarif_interval::max('max');
        $dernierTarif = Tarif_interval::where([['max', '=', $mx], ['min', '=', $mx]])->get();
        //verification de l'exitence d'un pourcentage
        if (count($dernierTarif) == 0) {
            if ($request->pourcentage != null) {
                $validator = Validator::make($request->all(), [
                    'min' => 'required|numeric|unique:tarif_intervals,min',
                    'max' => 'required|numeric|unique:tarif_intervals,max|min:' . $request->min,
                    'tarif' => 'required|numeric',
                    'pourcentage' => 'required|numeric|min:1|max:99'
                ]);
            } else {
                $validator = Validator::make($request->all(), [
                    'min' => 'required|numeric|unique:tarif_intervals,min',
                    'max' => 'required|numeric|unique:tarif_intervals,max|min:' . $request->min,
                    'tarif' => 'required|numeric',
                ]);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'min' => 'required|numeric|unique:tarif_intervals,min,' . $dernierTarif[0]->id . '',
                'max' => 'required|numeric|unique:tarif_intervals,max|min:' . $request->min,
                'tarif' => 'required|numeric',
            ]);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //verification de l'exitence d'un pourcentage pour le decaler
        if (count($dernierTarif) == 0) {
            if (!$this->verifInterval($request->max) && !$this->verifInterval($request->min)) {
                if (count(Tarif_interval::all()) == 0 && $request->min > 1) {
                    $params = [
                        'intervalPasCouvert' => "echec de l'ajout car l'interval entre 1 et " . $request->min . " n'est pas couvert"
                    ];
                    return back()->withErrors($params);
                } else {
                    Tarif_interval::create([
                        'min' => $request->min,
                        'max' => $request->max,
                        'tarif' => $request->tarif,
                        'date_debut' => now(),
                        'cree_par' => auth()->user()->id,
                    ]);
                    if ($request->pourcentage != null) {
                        Tarif_interval::create([
                            'min' => $request->max,
                            'max' => $request->max,
                            'tarif' => $request->pourcentage,
                            'date_debut' => now(),
                            'cree_par' => auth()->user()->id,
                        ]);
                    }
                }
            } else {
                $errors = ["ce interval existe"];
                return back()->withErrors($errors);
            }
        } else {
            //decalage du pourcentage
            $dernierTarif[0]->update([
                'min' => $request->max,
                'max' => $request->max,
                'modifier_par' => auth()->user()->id,
            ]);
            Tarif_interval::create([
                'min' => $request->min,
                'max' => $request->max,
                'tarif' => $request->tarif,
                'date_debut' => now(),
                'cree_par' => auth()->user()->id,
            ]);
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
        $mx = Tarif_interval::max('max');
        $dernierTarif = Tarif_interval::where([['max', '=', $mx], ['min', '=', $mx]])->get();
        $id = $tarif_interval->id;
        $validator = Validator::make($request->all(), [
            'min' => 'required|numeric|min:1',
            'max' => 'required|numeric| min:' . $request->min,
            'tarif' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        if ($tarif_interval->min == $request->min && $tarif_interval->max == $request->max) {
            $tarif_interval->update([
                // ' da te_fin' => now(),
                'tarif' => $request->tarif,
                'modifier_par' => auth()->user()->id,
            ]);
        } elseif (!$this->verifInterval($request->max) && !$this->verifInterval($request->min)) {
            //si le min ou le max se trouve dans aucun interval
            $dernierTarif[0]->update([
                'min' => $request->max,
                'max' => $request->max,
                'modifier_par' => auth()->user()->id,
            ]);
            if ($request->min > $tarif_interval->min) {
                $trmodif = Tarif_interval::where([['date_fin', '=', null], ['max', '=', $tarif_interval->min]])->get();
                $trmodif[0]->update([
                    'max' => $request->min,
                    'modifier_par' => auth()->user()->id,
                ]);
            }
            $tarif_interval->update([
                'min' => $request->min,
                'max' => $request->max,
                'tarif' => $request->tarif,
                'modifier_par' => auth()->user()->id,
            ]);

            $trsuprims = Tarif_interval::where([['id', '!=', $tarif_interval->id], ['id', '!=', $dernierTarif[0]->id]])
                ->whereBetween('min', array($tarif_interval->min, $tarif_interval->max))
                ->whereBetween('max', array($tarif_interval->min, $tarif_interval->max))->get();
            foreach ($trsuprims as $trsuprim) {
                $trsuprim->delete();
            }
        } else {

            $tarifs = Tarif_interval::where([['date_fin', '=', null], ['id', '!=', $tarif_interval->id]])->get();
            foreach ($tarifs as  $tarif) {
                if ($request->min < $tarif->max && $request->min > $tarif->min) {
                    $tarif->update([
                        'max' => $request->min,
                        'modifier_par' => auth()->user()->id,
                    ]);
                    break;
                }
            }
            foreach ($tarifs as  $tarif) {
                if ($request->max < $tarif->max && $request->max > $tarif->min) {
                    $tarif->update([
                        'min' => $request->max,
                        'modifier_par' => auth()->user()->id,
                    ]);
                    break;
                }
            }
            if ($request->max < $tarif_interval->max) {
                $trmodif = Tarif_interval::where([['date_fin', '=', null], ['min', '=', $tarif_interval->max]])->get();
                $trmodif[0]->update([
                    'min' => $request->max,
                    'modifier_par' => auth()->user()->id,
                ]);
            }
            if ($request->max > $dernierTarif[0]->max) {
                $dernierTarif[0]->update([
                    'min' => $request->max,
                    'max' => $request->max,
                    'modifier_par' => auth()->user()->id,
                ]);
            }
            if ($request->min > $tarif_interval->min) {
                $trmodif = Tarif_interval::where([['date_fin', '=', null], ['max', '=', $tarif_interval->min]])->get();
                $trmodif[0]->update([
                    'max' => $request->min,
                    'modifier_par' => auth()->user()->id,
                ]);
            }
            if ($tarif_interval->max == $dernierTarif[0]->max) {
                $dernierTarif[0]->update([
                    'min' => $request->max,
                    'max' => $request->max,
                    'modifier_par' => auth()->user()->id,
                ]);
            }

            $tarif_interval->update([
                'min' => $request->min,
                'max' => $request->max,
                'tarif' => $request->tarif,
                'modifier_par' => auth()->user()->id,
            ]);

            $trsuprims = Tarif_interval::where([['id', '!=', $tarif_interval->id], ['id', '!=', $dernierTarif[0]->id]])
                ->whereBetween('min', array($tarif_interval->min, $tarif_interval->max))
                ->whereBetween('max', array($tarif_interval->min, $tarif_interval->max))->get();
            foreach ($trsuprims as $trsuprim) {
                $trsuprim->delete();
            }
        }
        return redirect('admin/tarif');
    }
}
