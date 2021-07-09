$(".DT").on("click", ".EditarDoctor", function(){

	var Did = $(this).attr("Did");
	var datos = new FormData();

	datos.append("Did", Did);

	$.ajax({

		url: "Ajax/doctoresA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,

		success: function(resultado){

			$("#Did").val(resultado["id"]);
			$("#apellidoE").val(resultado["apellido"]);
			$("#nombreE").val(resultado["nombre"]);
			$("#usuarioE").val(resultado["usuario"]);
			$("#claveE").val(resultado["clave"]);

			$("#sexoE").html(resultado["sexo"]);
			$("#sexoE").val(resultado["sexo"]);

		} 

	})

})


$(".DT").on("click", ".EliminarDoctor", function(){

	var Did = $(this).attr("Did");
	var imgD = $(this).attr("imgD");

	window.location = "index.php?url=doctores&Did="+Did+"&imgD="+imgD;

})


$(".DT").DataTable({

//traduccion 

"language": {

	"sSearch": "Buscar:",
	"sEmptyTable": "No hay datos en la Tabla",
	"sZeroRecords": "No se Encuentran Resulatados",
	"sInfo": "Mostrando registro del _START_ al _END_ de un total _TOTAL_",
	"SInfoEmpty": "Mostrar registro del 0 al 0 de un total de 0",
	"sInfoFiltered": "(Filtrando de un total de _MAX_ registros)",
	"oPaginate": {

		"sFirst": "Primero",
		"sLast": "Último",
		"sNext": "Siguiente",
		"sPrevious": "Anterior"
	},	

	"sLoadingRecords": "Cargando",
	"sLengthMenu": "Mostrar _MENU_ registros"

}

})