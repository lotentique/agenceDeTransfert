<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Exports\transExport;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Exports\PointExport;
use Validator;
use Excel;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function edit(User $user)
    {
        if (auth()->user()->id == $user->id) {
            return view('admin.admin.profile', compact('user'));
        }
        return view('admin.admin.edit', compact('user'));
    }

    public function modifProfil(Request $request, User $user)
    {
        $oldPass = $request->oldPass;
        if ($oldPass != null) {
            //la compareson des deux mot de passe
            if (password_verify($oldPass, auth()->user()->password)) {
                $id = auth()->user()->id;
                $validator = Validator::make($request->all(), [
                    'name' => 'required|alpha_dash',
                    'prenom' => 'required|alpha_dash',
                    'tel' => 'required|alpha_num|min:8|max:8',
                    'nni' => 'required|alpha_num|min:10|max:10|unique:users,nni,' . $id,
                    'login' => 'required|unique:users,login,' . $id . '',
                    'email' => 'required|email|unique:users,email,' . $id . '',
                    'newpass' => 'required|min:6',
                ]);
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                $user->update([
                    'name' => $request->name,
                    'prenom' => $request->prenom,
                    'tel' => $request->tel,
                    'nni' => $request->nni,
                    'login' => $request->login,
                    'email' => $request->email,
                    'password' => bcrypt($request->newpass)
                ]);
                return redirect('admin')->withErrors(['success' => 'lencie mot de passe n\'est pas correcte'])->withInput();
            } else {

                return back()->withErrors(['error' => 'lencie mot de passe n\'est pas correcte'])->withInput();
            }
        } else {
            $id = auth()->user()->id;
            $validator = Validator::make($request->all(), [
                'name' => 'required|alpha_dash',
                'prenom' => 'required|alpha_dash',
                'tel' => 'required|alpha_num|min:8|max:8',
                'nni' => 'required|alpha_num|min:10|max:10|unique:users,nni,' . $id . '',
                'login' => 'required|unique:users,login,' . $id . '',
                'email' => 'required|email|unique:users,email,' . $id . '',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user->update([
                'name' => $request->name,
                'prenom' => $request->prenom,
                'tel' => $request->tel,
                'nni' => $request->nni,
                'login' => $request->login,
                'email' => $request->email,
            ]);
            return redirect('admin');
        }
    }
    public function exportUtilisateur(){
        return Excel::download(new UsersExport, 'utilisateur.xlsx');

    }
    public function exportTransfert(){
        return Excel::download(new transExport, 'transfert.xlsx');

    }
    public function exportPoint(){
        return Excel::download(new PointExport, 'point.xlsx');

    }
    public function indexImport(){
        return view('admin/import');
    }
    public function submit(Request $res){
        $path= $res->file->getRealPath();
        Excel::import(new UsersImport, $path);
        return redirect('/')->with('success', 'All good!');
    }
}
