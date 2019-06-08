<div class="NLO NLD">
    <div class="reponse"></div>
    <div class="panel " style="background-color:rgba(0, 0, 0, 0.26);border:none;">
        <div class="panel-heading" style="border-bottom:4px solid Slateblue; background-image: -webkit-linear-gradient(50deg, black 0%, gray 100%);"><h4 class="tcreU" style="font-family: times new roman;text-transform: uppercase;color: white;"><span class="creU"></span> Ajouter un Utilisateur <button id="" class="envoi" style="float: right; background-color: Slateblue;border:none;border-radius: 2px;font-family: sans-serif;box-shadow: 1px 1px 1px 1px black;text-shadow: 1px 1px 1px black;">Fermer</button></h4></div>
        <div class="panel-body">
            <form class="form-horizontal AjoutUtilisateur" id="AjoutUtilisateur" method="post" action="admin/ajout">
                {{ csrf_field() }}
                <div class="gauche">

                    <div class="form-group row" >
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>   
                        <div class="col-md-6">                                    
                        <input id="name" name="name" type="text" class="form-control" placeholder="{{ __('Nom') }}" required>
                        <span class="invalid-feedback" role="alert" id="Errorname"></span>  
                        </div>                  
                    </div>

                    <div class="form-group row">
                        <label for="Prenom" class="col-md-4 col-form-label text-md-right">{{ __('Prenom') }}</label>   
                        <div class="col-md-6"> 
                        <input id="prenom" name="prenom" type="text" class="form-control" placeholder="{{ __('prenom') }}" required> 
                        <span class="invalid-feedback" role="alert" id="Errorprenom"></span>  
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('tel') }}</label>   
                        <div class="col-md-6"> 
                        <input id="tel" name="tel" type="text" class="form-control" placeholder="{{ __('tel') }}" required>
                        <span class="invalid-feedback" role="alert" id="Errortel"></span> 
                        </div>                      
                    </div>

                    <div class="form-group row">         
                        <label for="NNI" class="col-md-4 col-form-label text-md-right">{{ __('NNI') }}</label>   
                        <div class="col-md-6">                   
                        <input id="nni" name="nni" type="text" class="form-control" placeholder="{{ __('nni') }}" required>
                        <span class="invalid-feedback" role="alert" id="Errornni"> </span>       
                        </div>              
                    </div>

                    <div class="form-group row">
                        <label for="Login" class="col-md-4 col-form-label text-md-right">{{ __('Login') }}</label>   
                        <div class="col-md-6"> 
                        <input id="login" name="login" type="text" class="form-control" placeholder="{{ __('login') }}" required>
                        <span class="invalid-feedback" role="alert" id="Errorlogin"></span>  
                        </div>                  
                    </div>

                </div><!-- Fin gauche  -->

                <div class="droite">
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>   
                        <div class="col-md-6"> 
                        <input id="email" name="email" type="email" class="form-control" placeholder="{{ __('E-Mail Address') }}" required>
                        <span class="invalid-feedback" role="alert" id="Erroremail"></span>   
                        </div>     
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>   
                        <div class="col-md-6"> 
                        <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}" required>
                        <span class="invalid-feedback" role="alert" id="Errorpassword"></span> 
                        </div>                
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('confirmation') }}</label>   
                        <div class="col-md-6"> 
                        <input id="password-confirm" name="password-confirm" type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" required>
                        <span class="invalid-feedback" role="alert" id="Errorpassword-confirm"></span>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="type_user" class="col-md-4 col-form-label text-md-right">type D'utilisateur</label>   
                        <div class="col-md-6"> 
                        <select id="type_user" name="type_user" class="form-control type"> 
                            <option value="admin">Admin</option>
                            <option value="agent">Agent</option>                     
                            <option value="bcm">BCM</option>                        
                        </select>
                    </div>
                   </div>
                   <div class="form-group row">
                   <label for="point" class="col-md-4 col-form-label text-md-right">{{ __('point de transfert') }}</label>   
                        <div class="col-md-6"> 
                   
                        <select id="id_pnt" name="id_pnt" class="form-control ptrans" ></select>                     
                   </div>
                  </div>

                </div><!-- Fin droite  -->
            
                <div class="form-group" >
                    
                    <button type="submit" class="btn btn-primary Enregistrer" style="border-radius: 25px;box-shadow: 1px 0 8px skyblue;margin-top: 10px;">
                        Enregistrer
                    </button>                       
                    <button type="reset" class="btn btn-danger" style="border-radius: 25px;box-shadow: 1px 0 8px pink;margin-top: 10px;">Supprimer
                    </button>                
                </div>
            </form>
        </div>
    </div>
</div>
