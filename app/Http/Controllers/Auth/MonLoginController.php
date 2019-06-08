<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\MonLoginRequest;
use Validator;
use App\User;
class MonLoginController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function index()
    {
        if (auth()->check()) {
            return back();
        }
        return view('Auth.login');
    }

    public function store(MonLoginRequest $request)
    {
        $validator = Validator::make($request->all(), [          
            'login' => 'required|exists:users,login',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (\Auth::attempt([
            'login' => $request->login, 'password' => $request->password,
            'type_user' => "agent",
        ])) {
            return redirect('agent');
        }
        if (\Auth::attempt([
            'login' => $request->login, 'password' => $request->password,
            'type_user' => "bcm",
        ])) {
            return redirect('bcm');
        }
        if (\Auth::attempt([
            'login' => $request->login, 'password' => $request->password,
            'type_user' => "admin",
        ])) {
            return redirect('admin');
        } else {
            return back();
        }
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
