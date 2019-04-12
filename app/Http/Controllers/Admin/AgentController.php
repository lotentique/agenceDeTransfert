<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Ville;
use App\Models\Point_de_transfert;
use Validator;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users=User::all();
        $users = User::where('type_user', '=', 'agent')->get();
        $params = [
            'title' => 'Liste des agents',
            'users' => $users,
        ];
        return view('admin.agent.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $villes = Ville::get();
        $PTransfert = Point_de_transfert::get();
        $params = [
            'PTransfert' => $PTransfert,
            'villes' => $villes,
        ];
        return view('admin.agent.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha_dash',
            'prenom' => 'required|alpha_dash',
            'tel' => 'required|alpha_num|min:8|max:8',
            'nni' => 'required|alpha_num|unique:users,nni',
            'login' => 'required|unique:users,login',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'id_pnt' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'tel' => $request->tel,
            'nni' => $request->nni,
            'login' => $request->login,
            'type_user' => $request->type_user,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_pnt' => $request->id_pnt,
        ]);
        return redirect('admin/agents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $villes = Ville::get();
        $PTransfert = Point_de_transfert::get();
        $params = [
            'PTransfert' => $PTransfert,
            'villes' => $villes,
        ];

        return view('admin.agent.edit', compact('user'))->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $id = $user->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha_dash',
            'prenom' => 'required|alpha_dash',
            'tel' => 'required|alpha_num|min:8|max:8',
            'nni' => 'required|alpha_num|min:10|max:10|unique:users,nni,' . $id . '',
            'login' => 'required|unique:users,login,' . $id . '',
            //'type_user'=>'required',
            'email' => 'required|email|unique:users,email,' . $id . '',
            //'password'=>'required|min:6|confirmed',
            'id_pnt' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user->update($request->all());
        $user->update();
        return redirect('admin/agents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin/agents');
    }
    /**
     * pour l affichage de la view pour la suppretion
     * @param User $user
     */
    public function destroyForm(User $user)
    {
        return view('admin.agent.destroy', compact('user'));
    }
}
