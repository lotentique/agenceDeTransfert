<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Ville;
use App\Models\Point_de_transfert;
use Validator;

class UtilisateursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users=User::all();
        $nagent =User::where('type_user', 'agent')->count();
        $nadmin =User::where('type_user', 'admin')->count();
        $nbcm =User::where('type_user', 'bcm')->count();
        $params = [

            'nagent' => $nagent,
            'nadmin' => $nadmin,
            'nbcm' => $nbcm,
        ];
        return view('admin.Utilisateurs.indexUtilisateurs')->with($params);
    }

    public function nbrU(){
         $nagent =User::where('type_user', 'agent')->count();
         $nadmin =User::where('type_user', 'admin')->count();
         $nbcm =User::where('type_user', 'bcm')->count();
        return json_encode(array($nagent,$nadmin,$nbcm));
    }

    //recuperation de la liste des utilisateurs par type
    public function ajax(Request $request)
    {
        $id = auth()->user()->id;
        $type=$request->get('type');

        if ($type=='') {
           $users = User::get();
        }else{
           $users = User::where('type_user', '=',  $type)->get();
        }

        $params = [
            'users' => $users,
            'id' => $id,
            'type' => $type,
        ];
        return view('admin.Utilisateurs.ListUtilisateurs')->with($params);
    }
     //fin

    //recuperation des points de transfert
    public function Rptransfert(){
        $villes = Ville::get();
        $PTransfert = Point_de_transfert::get();
        $output='';
        foreach($villes as $row){

           $output.=' <optgroup label="'.$row->nom.'">';
                foreach($PTransfert as $row2){
                    if ($row->id_ville==$row2->id_ville){
                        $output .= '<option value="'.$row2->id.'">'.$row2->nom.'</option>';
                    }
                }
             $output.='</optgroup>';
        }

        echo $output;
    }
    //fin

    //validation des champs de saisie lors de l'ajout
        public function Validation(Request $request){
            $id=$request->get('id');
            if ($id=="name" || $id=="nameM" ) {
                $validator = Validator::make($request->all(), ['nom' => 'required|alpha_dash',]);
            }
            if ($id=="prenom" || $id=="prenomM") {
                $validator = Validator::make($request->all(), ['nom' => 'required|alpha_dash',]);
            }
            if ($id=="tel" || $id=="telM" ) {
                $validator = Validator::make($request->all(), ['nom' => 'required|alpha_num|min:8|max:8',]);
            }
            if ($id=="nni") {
                $validator = Validator::make($request->all(), ['nom' => 'required|alpha_num|unique:users,nni',]);
            }
            if ($id=="login") {
                $validator = Validator::make($request->all(), ['nom' => 'required|unique:users,login',]);
            }
            if ($id=="email") {
                $validator = Validator::make($request->all(), ['nom' => 'required|email|unique:users,email',]);
            }
            if ($id=="password") {
                $validator = Validator::make($request->all(), ['nom' =>'required|min:6',]);
            }
             if ($id=="password-confirm") {
                $validator = Validator::make($request->all(), ['nom' =>'required|min:6',]);
            }

            if ($validator->fails()) {
                $errors=$validator->messages();
                return $errors->first('nom');
            }else{

                return "";
            }

        }
    //fin





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|alpha_dash',
            'prenom' => 'required|alpha_dash',
            'tel' => 'required|alpha_num|min:8|max:8',
            'nni' => 'required|alpha_num|unique:users,nni',
            'login' => 'required|unique:users,login',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'type_user' => 'required',
        ]);

        if ($validator->fails()) {
            return "<div class='alert alert-danger alert-block'>
                    <button type='button' class='close' data-dismiss='alert'>X</button>
                  <strong>Verifier vos champs</strong>
                  </div>";
        }

        $id_pnt;
         if(empty($request->id_pnt)){
              $id_pnt=0;
         }
         else{
            $id_pnt=$request->id_pnt;
         }
        User::create([
            'name' => $request->nom,
            'prenom' => $request->prenom,
            'tel' => $request->tel,
            'nni' => $request->nni,
            'login' => $request->login,
            'type_user' => $request->type_user,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_pnt' => $id_pnt,
        ]);

        return "<div class='alert alert-success alert-block'>
          <button type='button' class='close' data-dismiss='alert'>X</button>
            <strong>Inserer avec succes</strong>
            <script>document.getElementById('AjoutUtilisateur').reset();</script>

        </div>";
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

    //recuperation des donnes de l'utilisateur a modifier
    public function edit(Request $request)
    {
        $nom;$prenom;$tel;$nni;$login;$email;$type_user;$id_pnt;$ptr='';
        $id=$request->id;
        $user = User::where('id', '=', $id)->get();
        foreach ($user as $row ) {
        $nom=$row->name;
        $prenom=$row->prenom;
        $tel=$row->tel;
        $nni=$row->nni;
        $login=$row->login;
        $email=$row->email;
        $type_user=$row->type_user;
        $id_pnt=$row->id_pnt;
        }
        if($type_user=="agent"){
            $villes = Ville::get();
            $PTransfert = Point_de_transfert::get();

            foreach($villes as $row){

                $ptr.=' <optgroup label="'.$row->nom.'">';
                    foreach($PTransfert as $row2){
                        if ($row->id_ville==$row2->id_ville){
                            if($row2->id==$id_pnt){
                             $ptr .= '<option selected value="'.$row2->id.'">'.$row2->nom.'</option>';
                            }
                            $ptr .= '<option value="'.$row2->id.'">'.$row2->nom.'</option>';

                        }
                    }
                $ptr.='</optgroup>';
            }
        }

        return json_encode(array($nom,$prenom,$tel,$nni,$login,$email,$ptr,$type_user));
    }
    //fin

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;$nniA;$loginA;$emailA;$msgF='';$envoi='.envoi';
        $user = User::where('id', '=', $id)->get();
        foreach ($user as $row) {
            $nniA=$row->nni;
            $loginA=$row->login;
            $emailA=$row->email;
        }

        $validator = Validator::make($request->all(), [
            'nom' => 'required|alpha_dash',
            'prenom' => 'required|alpha_dash',
            'tel' => 'required|alpha_num|min:8|max:8',
        ]);
        if ($validator->fails()) {
            $envoi='';
        }


        $nniEr="";$loginEr="";$emailEr="";

         if($nniA!=$request->nni){
            $validator = Validator::make($request->all(), [ 'nni' => 'required|alpha_num|min:10|max:10|unique:users,nni', ]);
            if ($validator->fails()) {
                $errors=$validator->messages();
                $nniEr=$errors->first('nni');
                $envoi='';
                return json_encode(array($nniEr,$loginEr,$emailEr,$msgF));
            }
        }

       if($loginA!=$request->login){
            $validator = Validator::make($request->all(), [ 'login' => 'required|unique:users,login', ]);
            if ($validator->fails()) {
                $errors=$validator->messages();
                $loginEr=$errors->first('login');
                $envoi='';
                return json_encode(array($nniEr,$loginEr,$emailEr,$msgF));
            }
        }

         if($emailA!=$request->email){
            $validator = Validator::make($request->all(), [ 'email' => 'required|email|unique:users,email', ]);
            if ($validator->fails()) {
                $errors=$validator->messages();
                $emailEr=$errors->first('email');
                $envoi='';
                return json_encode(array($nniEr,$loginEr,$emailEr,$msgF));
            }
        }
        if (!empty($envoi)) {


        $users  = User::find($id);
        $users->name=$request->nom;
        $users->prenom=$request->prenom;
        $users->tel=$request->tel;
        $users->login=$request->login;
        $users->nni=$request->nni;
        $users->email=$request->email;
        if (!empty($request->id_pnt)) {$users->id_pnt=$request->id_pnt; }
        if (!empty($request->password)) {$users->password=$request->password; }
        $users->save();
        }
        return json_encode(array("","","",$msgF,$envoi));






    }
    public function importUser(){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        $user = User::findOrFail($id);
        $user->delete();
        return "<div class='alert alert-success alert-block'>
          <button type='button' class='close' data-dismiss='alert'>X</button>
            <strong>Supprimer avec succes</strong>
            <script>document.getElementById('AjoutUtilisateur').reset();</script>

        </div>";
    }
    /**
     * pour l affichage de la view pour la suppretion
     * @param User $user
     */

}
