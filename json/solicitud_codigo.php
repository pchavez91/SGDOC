<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../../../config/conex.php");
require_once('correos.php');
$link = Conexion();

$accion   = $_REQUEST['accion'];
$continua = true;

// solicitud codigo

if($accion=='combo_repositorio'){

$sql = "SELECT [cod_repositorio]
              ,[repositorio]
              ,[vigente]
        FROM [TI].[base_repositorio_repositorio]
        WHERE [vigente] ='S'";

$respuesta = CreaJSon($sql,$link,1);
$arreglo='{"data":['.$respuesta.']}';

echo $arreglo; 
   			
}

if($accion=='combo_tipo_documento'){

$sql = "SELECT [cod_tipo_documento]
              ,[tipo_documento]
              ,[sigla]
              ,[vigente]
        FROM [TI].[base_repositorio_tipo_documento]
        WHERE [vigente] ='S'";

$respuesta = CreaJSon($sql,$link,1);
$arreglo='{"data":['.$respuesta.']}';

echo $arreglo; 
   			
}

if($accion=='combo_area'){

$sql = "SELECT [cod_area]
              ,[area]
              ,[cod_repositorio]
              ,[vigente]
        FROM [TI].[base_repositorio_area]
        WHERE [vigente] ='S' and cod_repositorio = '".$_POST['cod_repositorio']."'  ";

$respuesta = CreaJSon($sql,$link,1);
$arreglo='{"data":['.$respuesta.']}';

echo $arreglo; 
   			
}

if($accion=='combo_departamento'){

$sql = "SELECT [cod_departamento]
              ,[departamento]
              ,[cod_area]
              ,[vigente]
        FROM [TI].[base_repositorio_departamento]
        WHERE [vigente] ='S' and [cod_area] = '".$_POST['cod_area']."'  ";

$respuesta = CreaJSon($sql,$link,1);
$arreglo='{"data":['.$respuesta.']}';

echo $arreglo; 
   			
}

if($accion=='enviar_correo'){

$id_repositorio = utf8_decode($_POST['id_repositorio']); 
$repositorio =       utf8_decode($_POST['repositorio']); 
$nombre_documento =  utf8_decode($_POST['nombre_documento']); 
$tipo_documento =    utf8_decode($_POST['tipo_documento']); 
$area =              utf8_decode($_POST['area']); 
$departamento =      utf8_decode($_POST['departamento']); 
$version =           utf8_decode($_POST['version']); 
$resumen_contenido = utf8_decode($_POST['resumen_contenido']); 
$combo_ultimo_nivel = utf8_decode($_POST['combo_ultimo_nivel']); 

$respuesta = correo_solicitar_codigo($repositorio,$nombre_documento,$tipo_documento,$area,$departamento,$version,$resumen_contenido,$combo_ultimo_nivel,$id_repositorio);
echo $respuesta;	
			   
}


//// tipo documento

if($accion=='tabla_tipo_documento'){

$sql = "SELECT [cod_tipo_documento]
              ,[tipo_documento]
              ,[sigla]
              ,[vigente]
        FROM [TI].[base_repositorio_tipo_documento]
		order by tipo_documento";

$respuesta = CreaJSon($sql,$link,1);
$arreglo='{"data":['.$respuesta.']}';

echo $arreglo; 
   			
}

if($accion=='guardar_documento'){

$tipo =           utf8_decode($_POST['tipo']); 
$codigo =         utf8_decode($_POST['codigo']); 
$tipo_documento = utf8_decode($_POST['tipo_documento']); 
$sigla =          utf8_decode($_POST['sigla']); 
$vigente =        utf8_decode($_POST['vigente']); 


if($tipo == 'Nuevo'){
	
$sql ="INSERT INTO [TI].[base_repositorio_tipo_documento]
           ([tipo_documento]
           ,[sigla]
           ,[vigente])
     VALUES
           ( 
		    '".$tipo_documento."',
            '".$sigla."',
            '".$vigente."'
			)";	

mssql_query($sql,$link,1);
	
}else{

$sql ="UPDATE [TI].[base_repositorio_tipo_documento]
        SET  [tipo_documento]    = '".$tipo_documento."'
            ,[sigla]             = '".$sigla."'
            ,[vigente]           = '".$vigente."'
        WHERE [cod_tipo_documento] = '".$codigo."' ";	

mssql_query($sql,$link,1);
	
}

echo '[{"success":"true","mensaje":"Ingresado Correctamente"}]';  

}

?>