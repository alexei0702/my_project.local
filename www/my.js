$(document).ready(function(){
	$(".hide").hide();
	$("img").click(function(){ 
		$(".hide").show(700); 
		$(this).hide(700); 
	});
	$(".action").click(function(){ 
		$("#first").hide(700); 
	}); 
	$(".action2").click(function(){ 
		$("#first").slideDown(); 
	});
});