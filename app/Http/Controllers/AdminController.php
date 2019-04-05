<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=auth()->user()->id;
        $users=User::where([['type_user', '=', 'admin'],['id','!=',"$id"]])->get();
        $params = [
            'title' => 'Liste des ustilisateurs ',
            'users' => $users,
        ];
        return view('admin.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'name'=>'required|alpha_dash',
            'prenom'=>'required|alpha_dash',
            'tel'=>'required|alpha_num|min:8|max:8',
            'nni'=>'required|alpha_num|unique:users,nni',
            'login'=>'required|unique:users,login',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
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
        ]);
        return redirect('admin');
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
        return view('admin.edit', compact('user'));
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
        $id =$user->id;
        $validator = Validator::make($request->all(), [
            'name'=>'required|alpha_dash',
            'prenom'=>'required|alpha_dash',
            'tel'=>'required|alpha_num|min:8|max:8',
            'nni'=>'required|alpha_num|unique:users,nni,'.$id.'',
            'login'=>'required|unique:users,login,'.$id.'',
            //'type_user'=>'required',
            'email'=>'required|email|unique:users,email,'.$id.'',
            //'password'=>'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user->update($request->all());
        $user->update();
        return redirect('admin');
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
        return redirect('admin');
    }
    /**
     * pour l affichage de la view pour la suppretion
     * @param User $user
     */
    public function destroyForm(User $user)
    {
        return view('admin.destroy', compact('user'));
    }
}
