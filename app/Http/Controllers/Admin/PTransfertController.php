<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Point_de_transfert;
use App\Models\Ville;
use App\Models\Historique_caisse;
use App\User;

class PTransfertController extends Controller
{
    public function index()
    {
        //$users=User::all();
        $PTransfert = Point_de_transfert::get();
        $villes = Ville::get();

        $params = [
            'title' => 'Liste des agents',
            'PTransfert' => $PTransfert,
            'villes' => $villes,
        ];
        return view('admin.PTransfert.index')->with($params);
    }

    public function create()
    {

        $villes = Ville::get();
        $params = [
            'title' => 'Liste des agents',
            'villes' => $villes,
        ];
        return view('admin.PTransfert.create')->with($params);
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|alpha_dash|unique:Point_de_transferts,nom',
            'cartier' => 'required|alpha_dash',
            'nom_ville' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $villes = Ville::where('nom', '=', $request->nom_ville)->get();
        $id_ville;

        if (count($villes) == 0) {

            Ville::create([
                'nom' => $request->nom_ville,
            ]);
        }
        $villes = Ville::where('nom', '=', $request->nom_ville)->get();
        foreach ($villes as $row) {
            $id_ville = $row->id_ville;
        }

        Point_de_transfert::create([
            'nom' => $request->nom,
            'cartier' => $request->cartier,
            'id_ville' => $id_ville,
        ]);

        return redirect('admin/PTransfert');
    }

    public function edit(Point_de_transfert $Point_de_transferts)
    {
        $villes = Ville::get();
        $params = [
            'villes' => $villes,
        ];
        return view('admin.PTransfert.edit', compact('Point_de_transferts'))->with($params);
    }

    public function update(Request $request, Point_de_transfert $Point_de_transferts)
    {
        $id = $Point_de_transferts->id;
        $validator = Validator::make($request->all(), [
            'nom' => 'required|alpha_dash|unique:Point_de_transferts,nom,' . $id . '',
            'cartier' => 'required|alpha_dash',
            'nom_ville' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $villes = Ville::where('nom', '=', $request->nom_ville)->get();
        $id_ville;

        if (count($villes) == 0) {

            Ville::create([
                'nom' => $request->nom_ville,
            ]);
        }
        $villes = Ville::where('nom', '=', $request->nom_ville)->get();
        foreach ($villes as $row) {
            $id_ville = $row->id_ville;
        }

        $Point_de_transferts->id_ville = $id_ville;
        $Point_de_transferts->update($request->all());
        $Point_de_transferts->update();
        return redirect('admin/PTransfert');
    }


    public function destroy(Point_de_transfert $Point_de_transferts)
    {

        User::where('id_pnt', $Point_de_transferts->id)->update(['id_pnt' => '0']);
        $Point_de_transferts->delete();
        return redirect('admin/PTransfert');
    }
    /**
     * pour l affichage de la view pour la suppretion
     * @param User $user
     */
    public function destroyForm(Point_de_transfert $Point_de_transferts)
    {
        return view('admin.PTransfert.destroy', compact('Point_de_transferts'));
    }

    public function Hcaisse(Request $request){
        $id=$request->get('id');
        $Hcaisse = Historique_caisse::where('id_pnt', '=', $id)->get();
        //return json_encode(array($nagent,$nadmin,$nbcm));
        return json_encode($Hcaisse);
    }


    public function carte()
    {
        
        return view('admin.carte.map');
    }
}
