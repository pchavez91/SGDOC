<?php
include_once("../../config/conex.php");
$link_seg = Conexion_seguridad();
session_start();

if($_SESSION['rut'] == ''){
     header('location:../../ingresar.php');die();
}

$sql_perfil ="select d.perfil_nombre
from Seguridad.dbo.usuario_perfil as a
inner join Seguridad.dbo.perfil_sistema as b on a.psist_codigo=b.psist_codigo
inner join seguridad.dbo.sistemas as c on b.sist_codigo=c.sist_codigo
inner join Seguridad.dbo.perfil as d on b.perfil_codigo=d.perfil_codigo
where a.user_codigo='".$_SESSION['codigo']."' AND c.sist_codigo=31"; // CODIGO SISTEMA

$RES_perfil = mssql_query($sql_perfil, $link_seg);
        while($ROW_perfil =  mssql_fetch_array($RES_perfil))
            {       
$perfil=$ROW_perfil['perfil_nombre'];
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon"/>
  <title>home</title>
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

                    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/datatables.min.css"/>

                
<section>
    <div class="left-side sticky-left-side">
        <div class="logo">
            <a href="#"><h2>GESTION DOCUMENTAL</h2></a>   <!-- NOMBRE DE SISTEMA -->
        </div>
        <!-- INICIO DE BARRA LATERAL -->
        <?php include 'sidebar.php'; ?>
        <!-- FIN BARRA LATERAL-->
    </div>

    <div class="main-content" >
        <div class="header-section">
        <!-- BARRA MENU DE LOS SISTEMAS -->
        <a class="toggle-btn"><i class="fa fa-bars"></i></a><br>
        <div class="form-group col-xs-10 col-lg-4">
        <select class="form-control myselectbox" name="combo_sistemas" onchange="cambiar_sistema()" id="combo_sistemas">
        </select> 
        </div>
  <!--  <?PHP //include 'navbar.php';?>
        FIN BARRA MENU DE LOS SISTEMAS -->          
        <div class="menu-right">
            <ul class="notification-menu">
                <li>
                    <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <div><img src="../../images/photos/logo_comasa_avatar.png" alt="" /></div>
                          <?php echo utf8_encode($perfil)?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
            <li><a href="#"><i class="fa fa-user"></i> <?php echo utf8_encode($_SESSION['nick']) ?></a></li>
            <li><a href="#"><i class="fa fa-align-center"></i> <?php echo utf8_encode($_SESSION['area']) ?></a></li>
            
                        <li><a href="../cerrar_sesion.php"><i class="fa fa-sign-out"></i><b><font size=2 color="#FFF00">CERRAR SESION</font></a></li>
            
                    </ul>
                </li>
            </ul>
        </div>
        </div>
        
          <!-- INICIO CONTENIDO DE LA PAGINA -->
          <div class="wrapper">
          
          <div class="contenido" id="carga-contenido"></div>      
            
          </div>
          <!-- FIN CONTENIDO DE LA PAGINA-->

    </div>
</section>
<!-- Placed js at the end of the document so the pages load faster -->
<script src="../../js/jquery-1.10.2.min.js"></script>
<script src="../../js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="../../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/modernizr.min.js"></script>
<script src="../../js/jquery.nicescroll.js"></script>
<!--common scripts for all pages-->


<!--<script src="../bodega/js/highcharts.js"></script>
<script src="../bodega/js/highcharts-3d.js"></script>
<script src="../bodega/js/exporting.js"></script>-->

<script src="../../js/scripts.js"></script>
<script src="../repositorio/upload/js/upload.js"></script>
<script src="../repositorio/upload/js/upload_multiple.js"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

<script type="text/javascript" src="main.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/b-1.2.2/b-html5-1.2.2/b-print-1.2.2/r-2.1.0/se-1.2.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.2/js/dataTables.fixedColumns.min.js"></script>

<!-- ORDENAR POR FECHAS DATATABLES -->
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script type="text/javascript"  src="https://cdn.datatables.net/plug-ins/1.10.15/sorting/datetime-moment.js"></script>

<script>

$(document).ready(function() {
    
    $(".dropdown-toggle").dropdown();
    $.fn.dataTable.moment( 'DD/MM/YYYY' ); // ORDENAR POR FECHAS DATATABLES 
    
});

$.ajax({
  url:'navbar.php',
  //data:{tipo_user:user},
  type:'post',
  success: function (data)
    {
    $("#combo_sistemas").html('<option value="" disabled selected hidden>GESTION DOCUMENTAL</option>'+data);
    }
 });

function cambiar_sistema(){
  var combo_sistemas=$("#combo_sistemas").val();

  location.href="../../"+combo_sistemas;

}


</script>
</html>
