    <div class="Sreponse"></div>
    <!-- liste de tous les utilisateurs -->
    <div class="TableauU">
	    <div class="listtitre">
	    <h3>Listes Des Utilisateurs <button class="btn  bajouter" id="Ajouter"><i class="fa fa-plus"></i> Ajouter</button>   <a dusk="export" href="{{ route('listeUtilisateur') }}" class="btn  btn-primary"><i class="fa fa-export"></i> exporter</a> <a href="{{ route('importer') }}" class="btn  btn-primary"><i class="fa fa-import"></i> importer</a></h3>
	    </div>
	    <div class="scroll" style="box-shadow: 1px 0px 0px 2px gray;">
	    <table class="table table-striped table-bordered tbD tbDD animated fadeIn" id="myTable">

	        <thead>
	            <tr>
	                <th>Nom</th>
	                <th>prenom</th>
	                <th>tel</th>
	                <th>nni</th>
	                <th>login</th>
	                <th>email</th>
	                <th>Action</th>
	            </tr>
	        </thead>
	        <tbody>
	            @if (count($users))
	            @foreach($users as $row)
	            @if($row->id!=$id)
	            <tr>
	                <td>{{$row->name}}</td>
	                <td>{{$row->prenom}}</td>
	                <td>{{$row->tel}}</td>
	                <td>{{$row->nni}}</td>
	                <td>{{$row->login}}</td>
	                <td>{{$row->email}}</td>
	                <td>
	                    <button dusk="edit" class="btn btn-info Modif" value="{{$row->id}}"><i class="fa fa-pencil" title="Edit"></i> </button>
	                    <button dusk="suprime" data-toggle="modal" data-target="#supp" data-original-title class="btn btn-danger Supp" value="{{$row->id}}"><i class="fa fa-trash-o" title="Delete"></i></button>

	                </td>
	            </tr>
	             @endif
	            @endforeach
	            @endif
	        </tbody>

	    </table>
	    </div>
    </div>

    <!--fin-->





   <!-- modal supression -->
   <div class="modal fade" id="supp">
	  <div class="modal-dialog">
	    <div class="panel " style="border:none;">
	        <div class="panel-heading" style=" background-image: -moz-linear-gradient(70deg, SlateBlue 0%, gray 100%);
             background-image: -webkit-linear-gradient(70deg, SlateBlue 0%, gray 100%);
             background-image: -ms-linear-gradient(70deg, SlateBlue 0%, gray 100%);">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	          <h4 class="panel-title" style="color: white;text-shadow: 1px 1px 1px black;" ><span class="glyphicon glyphicon-user"></span>Supprimer</h4>
	        </div>

	        <div class="modal-body" style="padding: 5px;">
	          	<h5>Voulez vous vraiment supprimer cet utilisateur?</h5>
	        </div>
	        <div class="panel-footer " style="margin-bottom:-14px;">
	            <input type="submit" class="btn btn-success" data-dismiss="modal" value="confirmer" id="conf"/>
	            <button  class="btn btn-danger " data-dismiss="modal" >Annuler</button>
	        </div>
	    </div>
	  </div>
	</div>
   <!-- fin modal -->

    <script >

        $(document).ready(function(){

             $('#myTable').DataTable();
             $('#myTable_length').html("<label> Type Utilisateur: <select id='selectU'><option value=''>Tous</option><option value='admin' <?php if($type=='admin'){echo('selected');} ?> >admin</option><option value='agent' <?php if($type=='agent'){echo('selected');} ?>>agent</option><option value='bcm' <?php if($type=='bcm'){echo('selected');} ?>>bcm</option></select></label>");




        	 //button ajouter utilisateur
			    $("#Ajouter").click(function(){
			    	$('.NLO').removeClass('NLD');
			    	$('.NLO').addClass('NL');
			        $('.NL').show(500);
			         $('#res').hide();
				});
			    //fin

			    //
			    $("#selectU").change(function(){
			        var _token = $('input[name="_token"]').val();
                    var type = $("#selectU").val();
		            $.ajax({
		            type:'POST',
		            url:'admin/ajax',
		            data:{_token:_token,type:type
		            },
		            success: function( msg ) {
		                $("#res").html(msg);
		               $("table").removeClass("tbDD");

		            }

		           });
				});
			    //fin
            //recuperation des donnes de l'utilisateur a modifier
              var id;
	    	$(".Modif").click(function(){
	    		$('#ModifUtilisateur')[0].reset();
	    		var _token = $('input[name="_token"]').val();
	    		id=$(this).val();
                $('#res').hide();
	            $('#Ajouter').hide();
	            $('.NL2').addClass('NL22');
	    		$('.NL2').show(400);
                $.ajax({
		            type:'POST',
		            url:'admin/Modif',
		            dataType:'json',
		            data:{_token:_token,id:id
		            },

		            success: function( msg ) {
				        $('input[id=nameM]').val(msg[0]).trigger('change');
			            $('input[id=prenomM]').val(msg[1]).trigger('change');
			            $('input[id=telM]').val(msg[2]).trigger('change');
			            $('input[id=nniM]').val(msg[3]).trigger('change');
			            $('input[id=loginM]').val(msg[4]).trigger('change');
			            $('input[id=emailM]').val(msg[5]).trigger('change');
                        $('#id_pntM').html(msg[6]);
                        $('input[id=tu]').val(msg[7]).trigger('change');
		            }
                });
		    });
		    //fin

            //modifier  les donnees
		    $('form.ModifUtilisateur').on('submit',function(){
		        var nom=$('#nameM').val();
		        var prenom=$('#prenomM').val();
		        var tel=$('#telM').val();
		        var nni=$('#nniM').val();
		        var login=$('#loginM').val();
		        var email=$('#emailM').val();
		        var password=$('#passwordM').val();
		        var id_pnt=$('#id_pntM').val();
                var type_user=$('#tu').val();
			    var _token = $('input[name="_token"]').val();
			  	    $.ajax({
			            type:'POST',
			            url:'admin/update',
			            dataType:'json',
			            data:{_token:_token,nom:nom,prenom:prenom,tel:tel,nni:nni,login:login,email:email,id_pnt:id_pnt,id:id,password:password
			            },
			            success: function( msg ) {
                          $('#ErrornniM').html(msg[0]);
                          $('#ErrorloginM').html(msg[1]);
                          $('#ErroremailM').html(msg[2]);
			              $('.reponse1').html(msg[3]);
                          $('.envoi').trigger('click');
			            }
			        });

		    	return false;
		    });
		    //fin






            //suppression d'un utilisateur
            $(".Supp").click(function(){
               var id=$(this).val();
               var type_user=$('#tu').val();
               $("#conf").click(function(){
                var _token = $('input[name="_token"]').val();
	                $.ajax({
			            type:'POST',
			            url:'admin/Supp',
			            data:{_token:_token,id:id
			            },
			            success: function( msg ) {
                            $.ajax({
		                        type:'POST',
		                        url:'admin/nbrU',
		                        dataType:'json',
		                        data:{_token:_token
		                        },
		                        success: function( msg ) {
		                            $("#nbragent").html(': '+msg[0]);
		                            $("#nbradmin").html(': '+msg[1]);
		                            $("#nbrbcm").html(': '+msg[2]);
		                        }
                            });
			            	$('.envoi').trigger('click');
			            }
			        });
               });
            });
            //fin
        });
    </script>
