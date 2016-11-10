$(document).ready(function(){
	/*$("button").click(function(){
		//$( "div" ).removeClass( "blue" );	
		//$( "div" ).addClass( "red" );
		$( ".blue" ).css( "background-color", "red" );
	});
*/
	$( "tr" ).hover(
  function() {
    $( this ).css( "background-color", "#27C48F" );
},
 function() {
    $( this ).css( "background-color", "#ffffff" );
  }

);
});
