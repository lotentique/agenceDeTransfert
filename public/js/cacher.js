$(document).ready(function(){
	$("#c").load("AfficherC.php");
    $("#userTable").hide("show_user.php");
    $(".abc").click(function(){
    	 $("#c").load("AfficherC.php");
		$("#rech").hide("RechercherC.php");
		$("#userTable").hide("show_user.php");
		$("#cc").hide("AfficherL.php");
       $("#c").show("AfficherC.php");
	});

    $(".ab").click(function(){
    	$("#cc").load("AfficherL.php");
		$("#rech").hide("RechercherC.php");
		$("#userTable").hide("show_user.php");
		$("#c").hide("AfficherC.php");
		$("#cc").show("AfficherL.php");
	});


    $(".abcd").click(function(){
    	$("#userTable").show("show_user.php");
		$("#rech").hide("RechercherC.php");
		$("#c").hide("AfficherC.php");
		$("#cc").hide("AfficherL.php");
		$("#userTable").show("show_user.php");
	});

    $("#RC").click(function(){
    	$("#rech").show("RechercherC.php");
		$("#userTable").hide("show_user.php");
		$("#c").hide("AfficherC.php");
		$("#cc").hide("AfficherL.php");
		
	});

});