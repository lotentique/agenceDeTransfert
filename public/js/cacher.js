$(document).ready(function(){
    

        $('.NL2').hide();
        $('#res').show();
        var _token = $('input[name="_token"]').val();
        var type = $(this).attr("id");
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
         
    
    
     //recuperation et affichage de la liste des utilisateur suivant le type selectionner
    $(".envoi").click(function(){  
        
        $('.NL').hide();
        $('.NL2').hide();
        $('#res').show();
        var _token = $('input[name="_token"]').val();
        var type = $(this).attr("id");
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
   
   
    //recuperation des points de tranfert si le type agent est selectionner
    $(".type").click(function(){  
        if ($(this).val() == 'agent') { 
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type:'POST',
                url:'admin/Rptransfert',
                data:{_token:_token
                },
                success: function( msg ) {
                    $(".ptrans").html(msg);
                }
           });   
        }else{
            $(".ptrans").html('<select></select>')
        }    

    });
    //fin



    //insertion de l'utilisateur dans la base
    $('form.AjoutUtilisateur').on('submit',function(){
        var nom=$('#name').val();
        var prenom=$('#prenom').val();
        var tel=$('#tel').val();
        var nni=$('#nni').val();
        var login=$('#login').val();
        var email=$('#email').val();
        var password=$('#password').val();
        var passwordc=$('#password-confirm').val();      
        var type_user=$('#type_user').val();
        var id_pnt=$('#id_pnt').val();
        var _token = $('input[name="_token"]').val();
       if(password!=passwordc){
            $('#Errorpassword-confirm').html('<strong>Le champ de confirmation  ne correspond pas.</strong>');
        }else{
            $.ajax({
                type:'POST',
                url:'admin/ajout',
                data:{_token:_token,nom:nom,prenom:prenom,tel:tel,nni:nni,login:login,email:email,password:password,type_user:type_user,id_pnt:id_pnt,passwordc:passwordc
                },
                success: function( msg ) {
                    $('.reponse').html(msg);
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
                }   
            });  
        }
        return false;
    });
    
    //fin

    //affichage des erreurs sur les champs de saisie
    $('input').change(function(){
      var id=$(this).attr('id');
      var nom=$(this).val();
      var _token = $('input[name="_token"]').val();
        $.ajax({
            type:'POST',
            url:'admin/Validation',
            data:{_token:_token,nom:nom,id:id
            },
            success: function( msg ) {

            $('#Error'+id).html('<strong>'+msg+'</strong>');

            }   
       }); 
    });
    //fin

   $('.fa-toggle-on').click(function(){
           var tf =$(this).attr('id');
           $('.fa-toggle-on').removeClass('btarifs');
           $('#'+tf).addClass('btarifs');
           $('.param').val(tf).trigger('change');

    });


   $('#PTable').DataTable();

var erreurlogo=$('.erreurlogo').attr('id');
if(erreurlogo>0){
$('#ChangerLogo').modal({
        show: 'false'
    }); 

}





    
    $('.infPt').click(function(){
        

        var _token = $('input[name="_token"]').val();
        var infPnom=$(this).attr("id");
        var id=$('.'+infPnom+'InfPtID').attr("id");
       $('#infPtitre').html(infPnom);
       $('#caisseD').html('Caisse :'+$('.'+infPnom+'caisse').attr("id"));
       
       $.ajax({
            type:'POST',
            url:'PTransfert/Hcaisse',
            dataType:'json',
            data:{_token:_token,id:id
            },
            success: function( msg ) {
               if (jQuery.isEmptyObject(msg)) {                    
                   $('#infPTable').DataTable().destroy();
                   $('#infoHC').empty(); 
                   $('#infPTable').DataTable();
                }else{  
                    $('#infPTable').DataTable().destroy();
                    $('#infoHC').empty();     
                $.each(msg,function() {
                          
                    $('#infoHC').html($('#infoHC').html()+'<tr><td>'+this.operation+'</td><td>'+this.effectue_par+'</td><td>'+this.created_at+'</td><td>'+this.montant+'</td></tr>');
                    $.ajax({
                        type:'POST',
                        url:'PTransfert/Ucaisse',
                        dataType:'json',
                        data:{_token:_token,id:id
                        },
                        success: function( msg ) {

                        }
                    });

                });
                $('#infPTable').DataTable();
                }
                
            }
        });

    });
});