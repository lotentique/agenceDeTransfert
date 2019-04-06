<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\MonLoginRequest;

class MonLoginController extends Controller
{

    public function index(){
        if (auth()->check()) {
            return back();
        }
        return view('Auth.login');
    }

    public function store(MonLoginRequest $request){
        if(\Auth::attempt(['login' => $request->login, 'password' => $request->password,
            'type_user'=>"agent",]))
        {
            return view('home');
        }
        if(\Auth::attempt(['login' => $request->login, 'password' => $request->password,
            'type_user'=>"bcm",]))
        {
            return view('home');
        }
        if(\Auth::attempt(['login' => $request->login, 'password' => $request->password,
            'type_user'=>"admin",]))
        {
            return redirect('admin');
        }else{
            return redirect('/');
        }

    }

    public function destroy(){
        auth()->logout();
        return redirect('/');
    }
}
