<?php

namespace App\Http\Controllers\Auth;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\MonLoginRequest;
use Validator;
use App\User;
use App\Models\Config;
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
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
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

        $heur = Config::get();
        //dd($heur[0]->debut);
        $current_time = date('H:i ');

            $debut = $heur[0]->debut;
            $fin = $heur[0]->fin;
           // $debut = "03:00 ";
            //$fin = "04:00 ";
            
            $date1 = DateTime::createFromFormat('H:i ', $current_time);
            //dd($current_time);
            $date2 = DateTime::createFromFormat('H:i ', $debut);
            $date3 = DateTime::createFromFormat('H:i ', $fin);
        if (\Auth::attempt([
            'login' => $request->login, 'password' => $request->password,
            'type_user' => "agent",
            ]) && ($date1 > $date2 && $date1 < $date3)) {
                return redirect('agent');
        }
        else if(\Auth::attempt([
            'login' => $request->login, 'password' => $request->password,
            'type_user' => "agent",
            ]) && !($date1 > $date2 && $date1 < $date3)){
                $this->destroy();
                return redirect('login');
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


}