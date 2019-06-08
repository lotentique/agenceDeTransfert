
<div class="NL2">
    <div class="reponse1"></div>
    <div class="panel " style="background-color:rgba(0, 0, 0, 0.26);border:none;">
        <div class="panel-heading" style="border-bottom:4px solid Slateblue; background-image: -webkit-linear-gradient(50deg, black 0%, gray 100%);"><h4 class="tcreU" style="font-family: times new roman;text-transform: uppercase;color: white;"><span class="creU"></span> Modifier Cet Utilisateur <button id="" class="envoi" style="float: right; background-color: Slateblue;border:none;border-radius: 2px;font-family: sans-serif;box-shadow: 1px 1px 1px 1px black;text-shadow: 1px 1px 1px black;">Fermer</button></h4></div>
        <div class="panel-body">
            <form class="form-horizontal ModifUtilisateur" id="ModifUtilisateur" method="post" action="admin/update">
                {{ csrf_field() }}
                <div class="gauche">

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>   
                        <div class="col-md-6">                                      
                        <input id="nameM" type="text" class="form-control" required>
                        <span class="invalid-feedback" role="alert" id="ErrornameM"></span>  
                        </div>                  
                    </div>

                    <div class="form-group row">
                         <label for="Prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>   
                        <div class="col-md-6"> 
                        <input id="prenomM" type="text" class="form-control" required> 
                        <span class="invalid-feedback" role="alert" id="ErrorprenomM"></span>  
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('tel') }}</label>   
                        <div class="col-md-6">  
                        <input id="telM" type="text" class="form-control" required>
                        <span class="invalid-feedback" role="alert" id="ErrortelM"></span>  
                        </div>                     
                    </div>

                    <div class="form-group row">  
                        <label for="NNI" class="col-md-4 col-form-label text-md-right">{{ __('NNI') }}</label>   
                        <div class="col-md-6">                            
                        <input id="nniM" type="text" class="form-control" required>
                        <span class="invalid-feedback" role="alert" id="ErrornniM"> </span>   
                        </div>                  
                    </div>

                    

                </div><!-- Fin gauche  -->

                <div class="droite">
                    <div class="form-group row">
                       <label for="Login" class="col-md-4 col-form-label text-md-right">{{ __('Login') }}</label>   
                        <div class="col-md-6"> 
                        <input id="loginM" type="text" class="form-control" required disabled>
                        <span class="invalid-feedback" role="alert" id="ErrorloginM"></span>  
                        </div>                  
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>   
                        <div class="col-md-6"> 
                        <input id="passwordM" type="text" class="form-control" >
                        <span class="invalid-feedback" role="alert" id="ErrorpasswordM"></span>  
                        </div>                  
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>   
                        <div class="col-md-6">
                        <input id="emailM" type="email" class="form-control" required>
                        <span class="invalid-feedback" role="alert" id="ErroremailM"></span>  
                        </div>      
                    </div>
                     
                   

                   <div class="form-group row">
                    <label for="type_user" class="col-md-4 col-form-label text-md-right">{{ __('point de transfert') }}</label>   
                        <div class="col-md-6">
                        <select id="id_pntM" class="form-control ptrans1" ></select>   
                        </div>                  
                   </div>

                </div><!-- Fin droite  -->
            
                <div class="form-group" >
                    
                    <button type="submit" class="btn btn-primary Enregistrer" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;margin-top: 10px;">
                        Enregistrer
                    </button>                       
                    <button type="reset" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;margin-top: 10px;">Supprimer
                    </button>  
                    <input type="hidden" id="tu">              
                </div>
            </form>
        </div>
    </div>
</div>
