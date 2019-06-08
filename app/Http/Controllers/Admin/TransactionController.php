<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Point_de_transfert;
use App\Models\Ville;
use App\Models\Transfert;
use App\User;

class TransactionController extends Controller
{
    public function index()
    {
        //$users=User::all();
        $Transfert = Transfert::get();
        $Ptransfert = Point_de_transfert::get();
        $villes = Ville::get();
        $users=User::get();
        $params = [
            'title' => 'Liste des agents',
            'Transfert' => $Transfert,
            'villes' => $villes,
            'users' => $users,
            'Ptransfert' => $Ptransfert,
        ];
        return view('admin.Transaction.index')->with($params);
    }

    
}
