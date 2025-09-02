<?php
session_start();
include_once("../../config/conex.php");
$link = Conexion();

$accion   	= $_REQUEST['accion'];
$continua = true;
$sub_codigo='';


if($accion=='valida_submenu_OC_SA'){
	
	$SQL_consulta="SELECT A.sub_codigo,B.perfil_nombre,D.user_codigo,E.user_paterno FROM Seguridad.dbo.perfil_submenu AS A
 INNER JOIN Seguridad.DBO.perfil AS B ON A.perfil_codigo=B.perfil_codigo
 INNER JOIN Seguridad.dbo.perfil_sistema AS C ON B.perfil_codigo=C.perfil_codigo
 INNER JOIN Seguridad.dbo.usuario_perfil AS D ON C.psist_codigo=D.psist_codigo
 INNER JOIN Seguridad.dbo.usuario AS E ON D.user_codigo=E.user_codigo
 WHERE A.sub_codigo=8 AND C.sist_codigo=1 AND D.user_codigo='".$_SESSION['codigo']."'";
// $respuesta = CreaJSon($SQL_consulta, $link, '',1);
// echo '['.$respuesta.']'; 
    $RESPUESTA = mssql_query( $SQL_consulta, $link );
    if($RES = mssql_fetch_array($RESPUESTA))
    { 
    echo '[{"sub_codigo":"8"}]';            
    }else{
    echo '[{"success":"false"}]'; 
    }
	
}
?>