
$(".DT").on("click", ".EliminarSecretaria", function(){

	var Sid = $(this).attr("Sid");
	var imgS = $(this).attr("imgS");

	window.location = "index.php?url=secretarias&Sid="+Sid+"&imgS="+imgS;

})