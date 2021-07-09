<?php 

session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CMNBM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/dist/css/skins/_all-skins.min.css">

    <!-- fullCalendar -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <!--  Data Tables  -->

  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
 <!-- <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.css"> -->
  



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini login-page">
<!-- Site wrapper -->

  <!-- =============================================== -->

<?php 

if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true) {
  
  echo '<difv class="wrapper">';

  include "modulos/cabecera.php";


  if ($_SESSION["rol"] == "Secretaria") {
    

  include "modulos/menuSecretaria.php";

  }else if ($_SESSION["rol"] == "Paciente") {
    
    include "modulos/menuPaciente.php";

  }else if ($_SESSION["rol"] == "Doctor") {
    
    include "modulos/menuDoctor.php";

  }else if ($_SESSION["rol"] == "Administrador") {
    
    include "modulos/menuAdmin.php";

  }






  $url = array();

  if (isset($_GET["url"])) {
  
    $url = explode("/", $_GET["url"]);

    if ($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "perfil-Secretaria" || $url[0] == "perfil-S" || $url[0] == "consultorios" || $url[0] == "E-C" || $url[0] == "doctores" || $url[0] == "pacientes" || $url[0] == "perfil-Paciente" || $url[0] == "perfil-P" || $url[0] == "Ver-consultorios" || $url[0] == "Doctor" || $url[0] == "historial" || $url[0] == "perfil-Doctor" || $url[0] == "perfil-D" || $url[0] == "Citas" || $url[0] == "perfil-Administrador " || $url[0] == "perfil-A" || $url[0] == "secretarias") { 
      
      include "modulos/".$url[0].".php";

    } 

  }else {
 
  include "modulos/inicio.php";

  }
   
echo '</div>';


}else if(isset($_GET["url"])){

  if ($_GET["url"] == "seleccionar"){
    
    include "modulos/seleccionar.php";
    
  }elseif ($_GET["url"] == "ingreso-Secretaria"){
    
    include "modulos/ingreso-Secretaria.php";

  }elseif ($_GET["url"] == "ingreso-Paciente"){
    
    include "modulos/ingreso-Paciente.php";
  
  }elseif ($_GET["url"] == "ingreso-Doctor"){
    
    include "modulos/ingreso-Doctor.php";
  
  }elseif ($_GET["url"] == "ingreso-Administrador"){
    
    include "modulos/ingreso-Administrador.php";
  }


}else {

include "modulos/seleccionar.php";
}

  

 ?>
 

  <!-- =============================================== -->

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://localhost/clinica/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/clinica/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://localhost/clinica/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/clinica/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/clinica/Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/clinica/Vistas/dist/js/demo.js"></script>


<!--Data Table --> 
<script src="http://localhost/clinica/Vistas/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!--<script src="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script> -->

<!-- fullCalendar -->
<script src="http://localhost/clinica/Vistas/bower_components/moment/moment.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<script src="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/locale/es.js"></script>



<script src="http://localhost/clinica/Vistas/js/doctores.js"></script> 
<script src="http://localhost/clinica/Vistas/js/pacientes.js"></script> 
<script src="http://localhost/clinica/Vistas/js/secretarias.js"></script> 


<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })


 //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    $('#calendar').fullCalendar({

      hiddenDays: [0,7],

      defaultView: 'agendaWeek',

      events: [

        <?php 

        $resultado = CitasC::VerCitas();

        foreach ($resultado as $key => $value) {
          
          if ($value["id_doctor"] == substr($_GET["url"], 7)){
            
            echo '{

              id: '.$value["id"].',
              title: "'.$value["nyaP"].'",
              start: "'.$value["inicio"].'",
              end: "'.$value["fin"].'"

            },';
          
          }else if($value["id_doctor"] == substr($_GET["url"], 6)){


            echo '{

              id: '.$value["id"].',
              title: "'.$value["nyaP"].'",
              start: "'.$value["inicio"].'",
              end: "'.$value["fin"].'"

            },';


          }


        }

         ?>

      ],



      dayClick:function(date,jsEvent,view){

        $('#CitaModal').modal();

        var fecha = date.format();
        var hora2 = ("01:00:00").split(":");

        fecha = fecha.split("T");

        var dia = fecha[0];

        var hora = (fecha[1].split(":"));

        var h1 = parseFloat(hora[0]);

        var h2 = parseFloat(hora2[0]);

        var horaFinal = h1+h2;

        $('#fechaC').val(dia);

        $('#horaC').val(h1+":00:00");

        $('#fyhIC').val(fecha[0]+" "+h1+":00:00");

        $('#fyhFC').val(fecha[0]+" "+horaFinal+":00:00");
      }

    })

</script>
</body>
</html>
