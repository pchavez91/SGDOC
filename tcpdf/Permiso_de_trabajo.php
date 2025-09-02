<?php
include_once("../../../config/conex.php");
$link = Conexion();
require "../phpqrcode/qrlib.php"; 
require_once('tcpdf_include.php');

$numero_permiso	=$_REQUEST['num_permiso'];



$sql ="SELECT id_permiso
				,num_permiso
				,num_ot
				,tipo_permiso
				,numero_trabajadores
				,ejecutor_mantencion
				,ejecutor_contratista
				,especialidad_mecanica
				,especialidad_soldadura
				,especialidad_electrica 
				,especialidad_instrumentacion
				,especialidad_produccion
				,especialidad_servicio
				,especialidad_otra 
				,prevencion_si
				,prevencion_no
				,case when year(fecha_ini_ejecucion)=1900 THEN null else  cast(fecha_ini_ejecucion as date) END AS fecha_ini_ejecucion
				,case when year(fecha_termino_ejecucion)=1900 THEN null else  cast(fecha_termino_ejecucion as date) END AS fecha_termino_ejecucion
		      	,CASE WHEN CAST(fecha_termino_ejecucion AS DATE)>=CAST(GETDATE() AS DATE) THEN 'ABIERTO' ELSE 'CERRADO' END AS estado
		      	,hora_ini_ejecucion 
				,hora_termino_ejecucion
				,area_autorizada
				,trabajo_a_realizar
				,empresa_contratista
				,[1A_check1] AS v1A_check1
				,[1A_check2] AS v1A_check2
				,[1A_check3] AS v1A_check3
				,[1A_check4] AS v1A_check4
				,[1A_check5] AS v1A_check5
				,[1A_check6] AS v1A_check6
				,[1A_check7] AS v1A_check7
				,[1A_check8] AS v1A_check8
				,[1A_check9 ] AS v1A_check9 
				,[2A_check1] AS v2A_check1
				,[2A_check2 ] AS v2A_check2 
				,[2A_check3] AS v2A_check3
				,[3A_check1] AS v3A_check1
				,[3A_check2] AS v3A_check2
				,[3A_check3 ] AS v3A_check3 
				,[3A_check4 ] AS v3A_check4 
				,[3A_check5 ] AS v3A_check5 
				,[3A_check6 ] AS v3A_check6 
				,[3A_check7] AS v3A_check7
				,[4A_check1 ] AS v4A_check1 
				,[4A_check2] AS v4A_check2
				,[4A_check3] AS v4A_check3
				,[4A_check4] AS v4A_check4
				,[4A_check5 ] AS v4A_check5 
				,[4A_check6] AS v4A_check6
				,[4A_check7] AS v4A_check7
				,[4A_check8] AS v4A_check8
				,[4A_check9 ] AS v4A_check9 
				,[5A_check1] AS v5A_check1
				,[5A_check2] AS v5A_check2
				,[5A_check3] AS v5A_check3
				,[5A_check4] AS v5A_check4
				,[5A_check5 ] AS v5A_check5 
				,[5B_check1 ] AS v5B_check1 
				,[5B_check2] AS v5B_check2
				,[5B_check3 ] AS v5B_check3 
				,[5C_check1 ] AS v5C_check1 
				,[5C_check2 ] AS v5C_check2 
				,[5C_check3] AS v5C_check3
				,[5C_check5] AS v5C_check5
				,[5D_check1 ] AS v5D_check1 
				,[5D_check2] AS v5D_check2
				,[5E_check1 ] AS v5E_check1 
				,[5E_check2] AS v5E_check2
				,[5E_check3] AS v5E_check3
				,[5F_check1] AS v5F_check1
				,[5F_check2] AS v5F_check2
				,[5F_check3] AS v5F_check3
				,[5F_check4] AS v5F_check4
				,[5F_check5] AS v5F_check5
				,[5G_check1] AS v5G_check1
				,[5G_check2] AS v5G_check2
				,[5G_check3 ] AS v5G_check3 
				,[5H_check1] AS v5H_check1
				,[5H_check2] AS v5H_check2
				,[5H_check3] AS v5H_check3
				,[6A_check1] AS v6A_check1
				,[6A_check2] AS v6A_check2
				,[6A_check3] AS v6A_check3
				,[7candado_check1] AS v7candado_check1
				,[7candado_check2] AS v7candado_check2
				,[7candado_check3 ] AS v7candado_check3 
				,[7ccm_check] AS v7ccm_check
				,[7tablero_check] AS v7tablero_check
				,[7ww_check] AS v7ww_check
				,[7otro_check ] AS v7otro_check 
				,[8A_check1] AS v8A_check1
				,[8A_check2] AS v8A_check2
				,[8A_check3 ] AS v8A_check3 
				,[8B_check1] AS v8B_check1
				,[8B_check2] AS v8B_check2
				,[8B_check3] AS v8B_check3
				,[8C_check1] AS v8C_check1
				,[8C_check2] AS v8C_check2
				,[8C_check3 ] AS v8C_check3 
				,[8D_check1] AS v8D_check1
				,[8D_check2] AS v8D_check2
				,[8D_check3] AS v8D_check3
				,[8E_check1] AS v8E_check1
				,[8E_check2] AS v8E_check2
				,[8E_check3 ] AS v8E_check3 
				,[8F_check1] AS v8F_check1
				,[8F_check2] AS v8F_check2
				,[8F_check3] AS v8F_check3
				,[8G_check1] AS v8G_check1
				,[8G_check2] AS v8G_check2
				,[8G_check3 ] AS v8G_check3 
				,[9A_check1 ] AS v9A_check1 
				,[9A_check2 ] AS v9A_check2 
				,[9A_check3] AS v9A_check3
				,[9B_check1 ] AS v9B_check1 
				,[9B_check2] AS v9B_check2
				,[9B_check3] AS v9B_check3
				,[9C_check1] AS v9C_check1
				,[9C_check2] AS v9C_check2
				,[9C_check3 ] AS v9C_check3 
				,[9D_check1] AS v9D_check1
				,[9D_check2] AS v9D_check2
				,[9D_check3] AS v9D_check3
				,[9E_check1] AS v9E_check1
				,[9E_check2] AS v9E_check2
				,[9E_check3] AS v9E_check3
				,[9F_check1] AS v9F_check1
				,[9F_check2] AS v9F_check2
				,[9F_check3] AS v9F_check3
				,[9G_check1 ] AS v9G_check1 
				,[9G_check2] AS v9G_check2
				,[9G_check3 ] AS v9G_check3 
				,[9H_check1] AS v9H_check1
				,[9H_check2] AS v9H_check2
				,[9H_check3] AS v9H_check3
				,[9I_check1] AS v9I_check1
				,[9I_check2] AS v9I_check2
				,[9I_check3 ] AS v9I_check3 
				,[9J_check1] AS v9J_check1
				,[9J_check2] AS v9J_check2
				,[9J_check3] AS v9J_check3
				,[10A_check1] AS v10A_check1
				,[10A_check2 ] AS v10A_check2 
				,[10A_check3] AS v10A_check3
				,[10B_check1] AS v10B_check1
				,[10B_check2] AS v10B_check2
				,[10B_check3 ] AS v10B_check3 
				,[10C_check1] AS v10C_check1
				,[10C_check2] AS v10C_check2
				,[10C_check3] AS v10C_check3
				,[10D_check1] AS v10D_check1
				,[10D_check2 ] AS v10D_check2 
				,[10D_check3 ] AS v10D_check3 
				,[10E_check1 ] AS v10E_check1 
				,[10E_check2 ] AS v10E_check2 
				,[10E_check3 ] AS v10E_check3 
				,[10F_check1] AS v10F_check1
				,[10F_check2] AS v10F_check2
				,[10F_check3] AS v10F_check3
				,[11medicionestrestermico_check] AS v11medicionestrestermico_check
				,[11vapor_check] AS v11vapor_check
				,[11aguacaliente_check] AS v11aguacaliente_check
				,[11condensados_check] AS v11condensados_check
				,[11aguafria_check] AS v11aguafria_check
				,[11aire_check] AS v11aire_check
				,[11sodacautica_check ] AS v11sodacautica_check 
				,[11amoniaco_check] AS v11amoniaco_check
				,[11acidosulfurico_check ] AS v11acidosulfurico_check 
				,[11actualizarquimicos_check] AS v11actualizarquimicos_check
				,[11temperaturaalta_check] AS v11temperaturaalta_check
				,[11temperaturabaja_check ] AS v11temperaturabaja_check 
				,[11lineapresurizada_check] AS v11lineapresurizada_check
				,[11lineaabierta_check ] AS v11lineaabierta_check 
				,[11lineaincomunicada_check] AS v11lineaincomunicada_check
				,[11lineapurgada_check] AS v11lineapurgada_check
				,[11bloqueovalvula_check] AS v11bloqueovalvula_check
				,[6A_check4] AS v6A_check4
				,[6A_otros] AS v6A_otros
				,[1A_otros] AS v1A_otros
				,[3A_otros ] AS v3A_otros 
				,[4A_otros] AS v4A_otros
				,[5C_tipo_filtro] AS v5C_tipo_filtro
				,[5F_otros] AS v5F_otros
				,[5G_otros] AS v5G_otros
				,[7tag_1 ] AS v7tag_1 
				,[7tag_2] AS v7tag_2
				,[7tag_3 ] AS v7tag_3 
				,[7tag_4] AS v7tag_4
				,[7tag_5 ] AS v7tag_5 
				,[7candado_num1] AS v7candado_num1
				,[7candado_num2] AS v7candado_num2
				,[7candado_num3] AS v7candado_num3
				,[7candado_num4 ] AS v7candado_num4 
				,[7candado_num5] AS v7candado_num5
				,[7responsable_bloqueo] AS v7responsable_bloqueo
				,[8I_otros] AS v8I_otros
				,[10B_T] AS v10B_T
				,[10B_C] AS v10B_C
				,[10B_O2] AS v10B_O2
				,[10B_CO] AS v10B_CO
				,[10B_LEL] AS v10B_LEL
				,[11bloqueovalvula_num] AS v11bloqueovalvula_num
		  FROM [seguimiento].[dbo].[permiso_trabajo]
		  WHERE num_permiso= '".$numero_permiso."'";

    $RES = mssql_query($sql, $link);
    while($ROW =  mssql_fetch_array($RES))
		{

$num_permiso              =$ROW['num_permiso'];
$num_ot                   =$ROW['num_ot'];
$titulo_permiso           =$ROW['tipo_permiso'];
$numero_trabajadores      =$ROW['numero_trabajadores'];
$otra_especialidad        =$ROW['especialidad_otra'];
$fecha_ini_ejecucion      =$ROW['fecha_ini_ejecucion'];
$fecha_termino_ejecucion  =$ROW['fecha_termino_ejecucion'];
$hora_ini_ejecucion       =$ROW['hora_ini_ejecucion'];
$hora_termino_ejecucion   =$ROW['hora_termino_ejecucion'];

$a_1A_otros =$ROW['v1A_otros'];
$a_3A_otros =$ROW['v3A_otros'];
$a_4A_otros   =$ROW['v4A_otros'];
$a_5C_tipo_filtro   =$ROW['v5C_tipo_filtro'];
$v5F_otros   =$ROW['v5F_otros'];
$v5G_otros   =$ROW['v5G_otros'];
$a_7tag_1   =$ROW['v7tag_1'];
$a_7tag_2   =$ROW['v7tag_2'];
$a_7tag_3   =$ROW['v7tag_3'];
$a_7tag_4   =$ROW['v7tag_4'];
$a_7tag_5   =$ROW['v7tag_5'];
$v7candado_num1   =$ROW['v7candado_num1'];
$v7candado_num2   =$ROW['v7candado_num2'];
$v7candado_num3   =$ROW['v7candado_num3'];
$v7candado_num4   =$ROW['v7candado_num4'];
$v7candado_num5   =$ROW['v7candado_num5'];
$v7responsable_bloqueo   =$ROW['v7responsable_bloqueo'];
$a_8I_otros   =$ROW['v8I_otros'];
$v10B_T   =$ROW['v10B_T'];
$v10B_C   =$ROW['v10B_C'];
$v10B_O2   =$ROW['v10B_O2'];
$v10B_CO   =$ROW['v10B_CO'];
$v10B_LEL   =$ROW['v10B_LEL'];
$v11bloqueovalvula_num   =$ROW['v11bloqueovalvula_num'];
$area_autorizada   =$ROW['area_autorizada'];
$trabajo_a_realizar   =$ROW['trabajo_a_realizar'];
$empresa_contratista   =$ROW['empresa_contratista'];
$v6A_otros   =$ROW['v6A_otros'];

 
if($ROW['ejecutor_mantencion']=='false')         {$ejecutor_mantencion = ''; }          else{$ejecutor_mantencion ='checked'; }
if($ROW['ejecutor_contratista']=='false')        {$ejecutor_contratista = ''; }         else{$ejecutor_contratista ='checked'; }
if($ROW['especialidad_mecanica']=='false')       {$especialidad_mecanica = ''; }        else{$especialidad_mecanica ='checked'; }
if($ROW['especialidad_soldadura']=='false')      {$especialidad_soldadura = ''; }       else{$especialidad_soldadura ='checked'; }
if($ROW['especialidad_electrica']=='false')      {$especialidad_electrica = ''; }       else{$especialidad_electrica ='checked'; }
if($ROW['especialidad_instrumentacion']=='false'){$especialidad_instrumentacion = ''; } else{$especialidad_instrumentacion ='checked'; }
if($ROW['especialidad_produccion']=='false')     {$especialidad_produccion = ''; }      else{$especialidad_produccion ='checked'; }
if($ROW['especialidad_servicio']=='false')       {$especialidad_servicio = ''; }        else{$especialidad_servicio ='checked'; }

if($ROW['v1A_check1']=='false'){$a_1A_check1 = ''; } else{$a_1A_check1 ='checked'; }
if($ROW['v1A_check1']=='false'){$a_1A_check1 = ''; } else{$a_1A_check1 ='checked'; }
if($ROW['v1A_check2']=='false'){$a_1A_check2 = ''; } else{$a_1A_check2 ='checked'; }
if($ROW['v1A_check3']=='false'){$a_1A_check3 = ''; } else{$a_1A_check3 ='checked'; }
if($ROW['v1A_check4']=='false'){$a_1A_check4 = ''; } else{$a_1A_check4 ='checked'; }
if($ROW['v1A_check5']=='false'){$a_1A_check5 = ''; } else{$a_1A_check5 ='checked'; }
if($ROW['v1A_check6']=='false'){$a_1A_check6 = ''; } else{$a_1A_check6 ='checked'; }
if($ROW['v1A_check7']=='false'){$a_1A_check7 = ''; } else{$a_1A_check7 ='checked'; }
if($ROW['v1A_check8']=='false'){$a_1A_check8 = ''; } else{$a_1A_check8 ='checked'; }
if($ROW['v1A_check9']=='false'){$a_1A_check9 = ''; } else{$a_1A_check9 ='checked'; }

if($ROW['v2A_check1']=='false'){$a_2A_check1 = ''; } else{$a_2A_check1 ='checked'; }
if($ROW['v2A_check2']=='false'){$a_2A_check2 = ''; } else{$a_2A_check2 ='checked'; }
if($ROW['v2A_check3']=='false'){$a_2A_check3 = ''; } else{$a_2A_check3 ='checked'; }
if($ROW['v3A_check1']=='false'){$a_3A_check1 = ''; } else{$a_3A_check1 ='checked'; }
if($ROW['v3A_check2']=='false'){$a_3A_check2 = ''; } else{$a_3A_check2 ='checked'; }
if($ROW['v3A_check3']=='false'){$a_3A_check3 = ''; } else{$a_3A_check3 ='checked'; }
if($ROW['v3A_check4']=='false'){$a_3A_check4 = ''; } else{$a_3A_check4 ='checked'; }
if($ROW['v3A_check5']=='false'){$a_3A_check5 = ''; } else{$a_3A_check5 ='checked'; }
if($ROW['v3A_check6']=='false'){$a_3A_check6 = ''; } else{$a_3A_check6 ='checked'; }
if($ROW['v3A_check7']=='false'){$a_3A_check7 = ''; } else{$a_3A_check7 ='checked'; }

if($ROW['v4A_check1']=='false'){$a_4A_check1 = ''; } else{$a_4A_check1 ='checked'; }
if($ROW['v4A_check2']=='false'){$a_4A_check2 = ''; } else{$a_4A_check2 ='checked'; }
if($ROW['v4A_check3']=='false'){$a_4A_check3 = ''; } else{$a_4A_check3 ='checked'; }
if($ROW['v4A_check4']=='false'){$a_4A_check4 = ''; } else{$a_4A_check4 ='checked'; }
if($ROW['v4A_check5']=='false'){$a_4A_check5 = ''; } else{$a_4A_check5 ='checked'; }
if($ROW['v4A_check6']=='false'){$a_4A_check6 = ''; } else{$a_4A_check6 ='checked'; }
if($ROW['v4A_check7']=='false'){$a_4A_check7 = ''; } else{$a_4A_check7 ='checked'; }
if($ROW['v4A_check8']=='false'){$a_4A_check8 = ''; } else{$a_4A_check8 ='checked'; }
if($ROW['v4A_check9']=='false'){$a_4A_check9 = ''; } else{$a_4A_check9 ='checked'; }

if($ROW['v5A_check1']=='false'){$a_5A_check1 = ''; } else{$a_5A_check1 ='checked'; }
if($ROW['v5A_check2']=='false'){$a_5A_check2 = ''; } else{$a_5A_check2 ='checked'; }
if($ROW['v5A_check3']=='false'){$a_5A_check3 = ''; } else{$a_5A_check3 ='checked'; }
if($ROW['v5A_check4']=='false'){$a_5A_check4 = ''; } else{$a_5A_check4 ='checked'; }
if($ROW['v5A_check5']=='false'){$a_5A_check5 = ''; } else{$a_5A_check5 ='checked'; }

if($ROW['v5B_check1']=='false'){$a_5B_check1 = ''; } else{$a_5B_check1 ='checked'; }
if($ROW['v5B_check2']=='false'){$a_5B_check2 = ''; } else{$a_5B_check2 ='checked'; }
if($ROW['v5B_check3']=='false'){$a_5B_check3 = ''; } else{$a_5B_check3 ='checked'; }

if($ROW['v5C_check1']=='false'){$a_5C_check1 = ''; } else{$a_5C_check1 ='checked'; }
if($ROW['v5C_check2']=='false'){$a_5C_check2 = ''; } else{$a_5C_check2 ='checked'; }
if($ROW['v5C_check3']=='false'){$a_5C_check3 = ''; } else{$a_5C_check3 ='checked'; }
if($ROW['v5C_check5']=='false'){$v5C_check5 = ''; } else{$v5C_check5 ='checked'; }

if($ROW['v5D_check1']=='false'){$v5D_check1 = ''; } else{$v5D_check1 ='checked'; }
if($ROW['v5D_check2']=='false'){$v5D_check2 = ''; } else{$v5D_check2 ='checked'; }

if($ROW['v5E_check1']=='false'){$v5E_check1 = ''; } else{$v5E_check1 ='checked'; }
if($ROW['v5E_check2']=='false'){$v5E_check2 = ''; } else{$v5E_check2 ='checked'; }
if($ROW['v5E_check3']=='false'){$v5E_check3 = ''; } else{$v5E_check3 ='checked'; }

if($ROW['v5F_check1']=='false'){$v5F_check1 = ''; } else{$v5F_check1 ='checked'; }
if($ROW['v5F_check2']=='false'){$v5F_check2 = ''; } else{$v5F_check2 ='checked'; }
if($ROW['v5F_check3']=='false'){$v5F_check3 = ''; } else{$v5F_check3 ='checked'; }
if($ROW['v5F_check4']=='false'){$v5F_check4 = ''; } else{$v5F_check4 ='checked'; }
if($ROW['v5F_check5']=='false'){$v5F_check5 = ''; } else{$v5F_check5 ='checked'; }

if($ROW['v5G_check1']=='false'){$v5G_check1 = ''; } else{$v5G_check1 ='checked'; }
if($ROW['v5G_check2']=='false'){$v5G_check2 = ''; } else{$v5G_check2 ='checked'; }
if($ROW['v5G_check3']=='false'){$v5G_check3 = ''; } else{$v5G_check3 ='checked'; }

if($ROW['v5H_check1']=='false'){$v5H_check1 = ''; } else{$v5H_check1 ='checked'; }
if($ROW['v5H_check2']=='false'){$v5H_check2 = ''; } else{$v5H_check2 ='checked'; }
if($ROW['v5H_check3']=='false'){$v5H_check3 = ''; } else{$v5H_check3 ='checked'; }


if($ROW['v6A_check1']=='false'){$v6A_check1 = ''; } else{$v6A_check1 ='checked'; }
if($ROW['v6A_check2']=='false'){$v6A_check2 = ''; } else{$v6A_check2 ='checked'; }
if($ROW['v6A_check3']=='false'){$v6A_check3 = ''; } else{$v6A_check3 ='checked'; }
if($ROW['v7candado_check1']=='false'){$v7candado_check1 = ''; } else{$v7candado_check1 ='checked'; }
if($ROW['v7candado_check2']=='false'){$v7candado_check2 = ''; } else{$v7candado_check2 ='checked'; }
if($ROW['v7candado_check3']=='false'){$v7candado_check3 = ''; } else{$v7candado_check3 ='checked'; }
if($ROW['v7ccm_check']=='false'){$v7ccm_check = ''; } else{$v7ccm_check ='checked'; }
if($ROW['v7tablero_check']=='false'){$v7tablero_check = ''; } else{$v7tablero_check ='checked'; }
if($ROW['v7ww_check']=='false'){$v7ww_check = ''; } else{$v7ww_check ='checked'; }
if($ROW['v7otro_check']=='false'){$v7otro_check = ''; } else{$v7otro_check ='checked'; }
if($ROW['v8A_check1']=='false'){$v8A_check1 = ''; } else{$v8A_check1 ='checked'; }
if($ROW['v8A_check2']=='false'){$v8A_check2 = ''; } else{$v8A_check2 ='checked'; }
if($ROW['v8A_check3']=='false'){$v8A_check3 = ''; } else{$v8A_check3 ='checked'; }
if($ROW['v8B_check1']=='false'){$v8B_check1 = ''; } else{$v8B_check1 ='checked'; }
if($ROW['v8B_check2']=='false'){$v8B_check2 = ''; } else{$v8B_check2 ='checked'; }
if($ROW['v8B_check3']=='false'){$v8B_check3 = ''; } else{$v8B_check3 ='checked'; }
if($ROW['v8C_check1']=='false'){$v8C_check1 = ''; } else{$v8C_check1 ='checked'; }
if($ROW['v8C_check2']=='false'){$v8C_check2 = ''; } else{$v8C_check2 ='checked'; }
if($ROW['v8C_check3']=='false'){$v8C_check3 = ''; } else{$v8C_check3 ='checked'; }
if($ROW['v8D_check1']=='false'){$v8D_check1 = ''; } else{$v8D_check1 ='checked'; }
if($ROW['v8D_check2']=='false'){$v8D_check2 = ''; } else{$v8D_check2 ='checked'; }
if($ROW['v8D_check3']=='false'){$v8D_check3 = ''; } else{$v8D_check3 ='checked'; }
if($ROW['v8E_check1']=='false'){$v8E_check1 = ''; } else{$v8E_check1 ='checked'; }
if($ROW['v8E_check2']=='false'){$v8E_check2 = ''; } else{$v8E_check2 ='checked'; }
if($ROW['v8E_check3']=='false'){$v8E_check3 = ''; } else{$v8E_check3 ='checked'; }
if($ROW['v8F_check1']=='false'){$v8F_check1 = ''; } else{$v8F_check1 ='checked'; }
if($ROW['v8F_check2']=='false'){$v8F_check2 = ''; } else{$v8F_check2 ='checked'; }
if($ROW['v8F_check3']=='false'){$v8F_check3 = ''; } else{$v8F_check3 ='checked'; }
if($ROW['v8G_check1']=='false'){$v8G_check1 = ''; } else{$v8G_check1 ='checked'; }
if($ROW['v8G_check2']=='false'){$v8G_check2 = ''; } else{$v8G_check2 ='checked'; }
if($ROW['v8G_check3']=='false'){$v8G_check3 = ''; } else{$v8G_check3 ='checked'; }
if($ROW['v9A_check1']=='false'){$v9A_check1 = ''; } else{$v9A_check1 ='checked'; }
if($ROW['v9A_check2']=='false'){$v9A_check2 = ''; } else{$v9A_check2 ='checked'; }
if($ROW['v9A_check3']=='false'){$v9A_check3 = ''; } else{$v9A_check3 ='checked'; }
if($ROW['v9B_check1']=='false'){$v9B_check1 = ''; } else{$v9B_check1 ='checked'; }
if($ROW['v9B_check2']=='false'){$v9B_check2 = ''; } else{$v9B_check2 ='checked'; }
if($ROW['v9B_check3']=='false'){$v9B_check3 = ''; } else{$v9B_check3 ='checked'; }
if($ROW['v9C_check1']=='false'){$v9C_check1 = ''; } else{$v9C_check1 ='checked'; }
if($ROW['v9C_check2']=='false'){$v9C_check2 = ''; } else{$v9C_check2 ='checked'; }
if($ROW['v9C_check3']=='false'){$v9C_check3 = ''; } else{$v9C_check3 ='checked'; }
if($ROW['v9D_check1']=='false'){$v9D_check1 = ''; } else{$v9D_check1 ='checked'; }
if($ROW['v9D_check2']=='false'){$v9D_check2 = ''; } else{$v9D_check2 ='checked'; }
if($ROW['v9D_check3']=='false'){$v9D_check3 = ''; } else{$v9D_check3 ='checked'; }
if($ROW['v9E_check1']=='false'){$v9E_check1 = ''; } else{$v9E_check1 ='checked'; }
if($ROW['v9E_check2']=='false'){$v9E_check2 = ''; } else{$v9E_check2 ='checked'; }
if($ROW['v9E_check3']=='false'){$v9E_check3 = ''; } else{$v9E_check3 ='checked'; }
if($ROW['v9F_check1']=='false'){$v9F_check1 = ''; } else{$v9F_check1 ='checked'; }
if($ROW['v9F_check2']=='false'){$v9F_check2 = ''; } else{$v9F_check2 ='checked'; }
if($ROW['v9F_check3']=='false'){$v9F_check3 = ''; } else{$v9F_check3 ='checked'; }
if($ROW['v9G_check1']=='false'){$v9G_check1 = ''; } else{$v9G_check1 ='checked'; }
if($ROW['v9G_check2']=='false'){$v9G_check2 = ''; } else{$v9G_check2 ='checked'; }
if($ROW['v9G_check3']=='false'){$v9G_check3 = ''; } else{$v9G_check3 ='checked'; }
if($ROW['v9H_check1']=='false'){$v9H_check1 = ''; } else{$v9H_check1 ='checked'; }
if($ROW['v9H_check2']=='false'){$v9H_check2 = ''; } else{$v9H_check2 ='checked'; }
if($ROW['v9H_check3']=='false'){$v9H_check3 = ''; } else{$v9H_check3 ='checked'; }
if($ROW['v9I_check1']=='false'){$v9I_check1 = ''; } else{$v9I_check1 ='checked'; }
if($ROW['v9I_check2']=='false'){$v9I_check2 = ''; } else{$v9I_check2 ='checked'; }
if($ROW['v9I_check3']=='false'){$v9I_check3 = ''; } else{$v9I_check3 ='checked'; }
if($ROW['v9J_check1']=='false'){$v9J_check1 = ''; } else{$v9J_check1 ='checked'; }
if($ROW['v9J_check2']=='false'){$v9J_check2 = ''; } else{$v9J_check2 ='checked'; }
if($ROW['v9J_check3']=='false'){$v9J_check3 = ''; } else{$v9J_check3 ='checked'; }
if($ROW['v10A_check1']=='false'){$v10A_check1 = ''; } else{$v10A_check1 ='checked'; }
if($ROW['v10A_check2']=='false'){$v10A_check2 = ''; } else{$v10A_check2 ='checked'; }
if($ROW['v10A_check3']=='false'){$v10A_check3 = ''; } else{$v10A_check3 ='checked'; }
if($ROW['v10B_check1']=='false'){$v10B_check1 = ''; } else{$v10B_check1 ='checked'; }
if($ROW['v10B_check2']=='false'){$v10B_check2 = ''; } else{$v10B_check2 ='checked'; }
if($ROW['v10B_check3']=='false'){$v10B_check3 = ''; } else{$v10B_check3 ='checked'; }
if($ROW['v10C_check1']=='false'){$v10C_check1 = ''; } else{$v10C_check1 ='checked'; }
if($ROW['v10C_check2']=='false'){$v10C_check2 = ''; } else{$v10C_check2 ='checked'; }
if($ROW['v10C_check3']=='false'){$v10C_check3 = ''; } else{$v10C_check3 ='checked'; }
if($ROW['v10D_check1']=='false'){$v10D_check1 = ''; } else{$v10D_check1 ='checked'; }
if($ROW['v10D_check2']=='false'){$v10D_check2 = ''; } else{$v10D_check2 ='checked'; }
if($ROW['v10D_check3']=='false'){$v10D_check3 = ''; } else{$v10D_check3 ='checked'; }
if($ROW['v10E_check1']=='false'){$v10E_check1 = ''; } else{$v10E_check1 ='checked'; }
if($ROW['v10E_check2']=='false'){$v10E_check2 = ''; } else{$v10E_check2 ='checked'; }
if($ROW['v10E_check3']=='false'){$v10E_check3 = ''; } else{$v10E_check3 ='checked'; }
if($ROW['v10F_check1']=='false'){$v10F_check1 = ''; } else{$v10F_check1 ='checked'; }
if($ROW['v10F_check2']=='false'){$v10F_check2 = ''; } else{$v10F_check2 ='checked'; }
if($ROW['v10F_check3']=='false'){$v10F_check3 = ''; } else{$v10F_check3 ='checked'; }
if($ROW['v11medicionestrestermico_check']=='false'){$v11medicionestrestermico_check = ''; } else{$v11medicionestrestermico_check ='checked'; }
if($ROW['v11vapor_check']=='false'){$v11vapor_check = ''; } else{$v11vapor_check ='checked'; }
if($ROW['v11aguacaliente_check']=='false'){$v11aguacaliente_check = ''; } else{$v11aguacaliente_check ='checked'; }
if($ROW['v11condensados_check']=='false'){$v11condensados_check = ''; } else{$v11condensados_check ='checked'; }
if($ROW['v11aguafria_check']=='false'){$v11aguafria_check = ''; } else{$v11aguafria_check ='checked'; }
if($ROW['v11aire_check']=='false'){$v11aire_check = ''; } else{$v11aire_check ='checked'; }
if($ROW['v11sodacautica_check']=='false'){$v11sodacautica_check = ''; } else{$v11sodacautica_check ='checked'; }
if($ROW['v11amoniaco_check']=='false'){$v11amoniaco_check = ''; } else{$v11amoniaco_check ='checked'; }
if($ROW['v11acidosulfurico_check']=='false'){$v11acidosulfurico_check = ''; } else{$v11acidosulfurico_check ='checked'; }
if($ROW['v11actualizarquimicos_check']=='false'){$v11actualizarquimicos_check = ''; } else{$v11actualizarquimicos_check ='checked'; }
if($ROW['v11temperaturaalta_check']=='false'){$v11temperaturaalta_check = ''; } else{$v11temperaturaalta_check ='checked'; }
if($ROW['v11temperaturabaja_check']=='false'){$v11temperaturabaja_check = ''; } else{$v11temperaturabaja_check ='checked'; }
if($ROW['v11lineapresurizada_check']=='false'){$v11lineapresurizada_check = ''; } else{$v11lineapresurizada_check ='checked'; }
if($ROW['v11lineaabierta_check']=='false'){$v11lineaabierta_check = ''; } else{$v11lineaabierta_check ='checked'; }
if($ROW['v11lineaincomunicada_check']=='false'){$v11lineaincomunicada_check = ''; } else{$v11lineaincomunicada_check ='checked'; }
if($ROW['v11lineapurgada_check']=='false'){$v11lineapurgada_check = ''; } else{$v11lineapurgada_check ='checked'; }
if($ROW['v11bloqueovalvula_check']=='false'){$v11bloqueovalvula_check = ''; } else{$v11bloqueovalvula_check ='checked'; }
if($ROW['v6A_check4']=='false'){$v6A_check4 = ''; } else{$v6A_check4 ='checked'; }


		}
		
global $id_permiso;
global $numero_permiso;
  
$QR='';

$texto='http://190.13.129.41/sistemas/repositorio/tcpdf/Permiso_diario_de_trabajo.php?numero_permiso='.$numero_permiso;

	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir = 'images/temp/';
	
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
        //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.$id_permiso.'.png';
 
        //Parametros de Condiguración
	
	$tamaño = 2; //Tamaño de Pixel
	$level = 'L'; //Precisión Baja
	$framSize = 1; //Tamaño en blanco
	$contenido = $texto; //Texto
	
        //Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
	
        //Mostramos la imagen generada
//$QR= '<img src="'.$dir.basename($filename).'" /><hr/>'; 

//global $QR;	


class MYPDF extends TCPDF {
	

	//Page header
	public function Header() {
		
		}
		       
		 // Page footer	
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");


#Establecemos los márgenes izquierda, arriba y derecha:
$pdf->SetMargins(05, 05 , 05);

// add a page
$pdf->AddPage('P');	
$pdf->SetFont('Helvetica','',10);


$html ='  <br><br>   <table border ="1" style="margin: 0 auto;">
							<tr>
									<td width="30%" style="text-align:center;"><br/><br/><br/><img src="images/logo.jpg" width="100"><br/></td>
									<td width="40%" style="text-align:center;"><br/><br/><strong>'.$titulo_permiso.'</strong><br/> N° '.$numero_permiso.' </td>
									<td width="30%" style="text-align:center;"><br/><br/>&nbsp;&nbsp;<img src="images/temp/'.$num_permiso.'.png" width="60" height="50"></td>
							</tr>
			 </table>
		
			<br/><br/>		
		
		    <table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="9%"><label><strong>Ejecutor</strong>:</label></td>
							<td width="16%"><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$ejecutor_mantencion.'" > Mantenimiento </label></td>
							<td width="13%"><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$ejecutor_contratista.'"> Contratista   </label></td>
							<td width="35%"><label><strong>Empresa</strong>:</label>  '.$empresa_contratista.'</td>
							<td width="17%"><label><strong>N° Trabajadores</strong>:</label> '.$numero_trabajadores.'</td>
							<td width="10%"><label><strong>N° OT</strong>:</label> '.$num_ot.' </td>
						</tr>						
			</table>	

            <hr/>	
			
			<label><strong>Área de trabajo autorizada</strong>: </label>'.$area_autorizada.' <br />
			<label><strong>Trabajo a realizar</strong>: </label>'.$trabajo_a_realizar.'

			<br/><br/>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="30%"><label><strong>Fecha Ejecución</strong>: </label>'.$fecha_ini_ejecucion.' </td>
							<td width="30%"><label><strong>Fecha Termino</strong>: </label>'.$fecha_termino_ejecucion.' </td>
							<td width="20%"><label><strong>Hora Inicio</strong>: </label>'.$hora_ini_ejecucion.'</td>
							<td width="20%"><label><strong>Hora Término</strong>: </label>'.$hora_termino_ejecucion.' </td>
						</tr>						
			</table>	
			
		     <br/>
            <hr/>	
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$especialidad_mecanica.'"> Mecánica</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$especialidad_soldadura.'"> Soldadura</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$especialidad_electrica.'"> Eléctrica</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$especialidad_instrumentacion.'"> Instrumentación</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$especialidad_produccion.'"> Producción</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$especialidad_servicio.'"> Servicio</label></td>
						</tr>						
			</table>	
			
			<label>Otra:</label>'.$otra_especialidad.'
			
			<br/>
            <hr/>			
			<label><strong>I. TIPO DE TRABAJO:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_1A_check1.'"> En Caliente (corte/soldadura)</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_1A_check2.'"> En Altura</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_1A_check3.'"> Espacios Confinados</label></td>
						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_1A_check4.'"> Sustancias Peligrosas</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_1A_check5.'"> Excavación</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_1A_check6.'"> Intervención de Circ. Eléctrico</label></td>
						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_1A_check7.'"> Intervención de Calderas/Válvulas</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_1A_check8.'"> Intervención de Sist. Prot. Incendios</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_1A_check9.'"> Equipos de Levante Hidrolavado</label></td>
						</tr>							
			</table>						
							
			<label>Otros:</label>'.$a_1A_otros.'

			<br/>
            <hr/>			
			<label><strong>II. EL ENCARGADO DE LA EJECUCIÓN DEBERÁ:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_2A_check1.'"> Comunicar a los trabajadores involucrados los riesgos que implica el trabajo</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_2A_check2.'"> Comunicar los instructivos de Seguridad específicos</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_2A_check3.'"> Presentar charla específica inicial</label></td>
						</tr>							
			</table>
			
			<br/>
            <hr/>			
			<label><strong>III. VERIFICAR SI SE USAN LAS SIGUYIENTES HERRAMIENTAS/EQUIPOS:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_3A_check1.'"> Herramienta eléctrica/neumática</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_3A_check2.'"> Cambio pluma o grúa</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_3A_check3.'"> Soldadura/Corte por arco eléctrico</label></td>
						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_3A_check4.'"> Soldadura/Corte por Oxi-gas</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_3A_check5.'"> Herramientas manuales</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_3A_check6.'"> Andamios y/o escaleras</label></td>
						</tr>	
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_3A_check7.'"> Compresor/Bombas</label></td>
							<td rowspan="2" ><label>Otros:</label>'.$a_3A_otros.'</td>
						</tr>							
			</table>
			
			<br/>
            <hr/>			
			<label><strong>IV. PELIGROS FÍSICOS:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_4A_check1.'"> Ruido > 82 dB</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_4A_check2.'"> Riesgo eléctrico</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_4A_check3.'"> Exposición de gases</label></td>
						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_4A_check4.'"> Proyección de partículas</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_4A_check5.'"> Contacto con superficies calientes</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_4A_check6.'"> Caídas > 1,50 mts.</label></td>
						</tr>	
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_4A_check7.'"> Contacto con prod. químicos</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_4A_check8.'"> Estrés por calor</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_4A_check9.'"> Exposición polvo en suspensión</label></td>
						</tr>							
			</table>
			
			<label>Otros:</label>'.$a_4A_otros.'</td>
			<br/>
            <hr/>			
			<label><strong>V. EQUIPOS DE PROTECCIÓN PERSONAL REQUERIDOS:</strong></label><br>
			<label><strong>V.1 ROPA:</strong></label><br>

			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_5A_check1.'"> Buzo trabajo</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_5A_check2.'"> Traje para polvos (desechables)</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_5A_check3.'"> Chaqueta, colete o cuero</label></td>
						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_5A_check4.'"> Traje para químicos</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_5A_check5.'"> Traje PVC</label></td>
						</tr>	
						
			</table><br><br>
			<label><strong>V.2 PROTECCIÓN DE CABEZA PIES Y PIERNAS:</strong></label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_5B_check1.'"> Casco</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_5B_check2.'"> Zapatos de Seguridad</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_5B_check3.'"> Botas de Goma (Con puntera de acero)</label></td>
						</tr>							
			</table><br>

			<label><strong>V.3 PROTECCIÓN RESPIRATORIA:</strong></label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_5C_check1.'"> Mascarilla desechable</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_5C_check2.'"> Máscara rostro completo</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$a_5C_check3.'"> Máscara medio rostro</label></td>
						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5C_check5.'"> Equipo de respiración autónoma</label></td>
							<td rowspan="2" ><label>Otros:</label>'.$a_5C_tipo_filtro.'</td>
						</tr>	
						
			</table><br><br>

			<label><strong>V.4 PROTECCIÓN AUDITIVA:</strong></label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5D_check1.'"> Tapón inserto</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5D_check2.'"> Orejera</label></td>

						</tr>
						
			</table><br><br>

			<label><strong>V.5 PROTECCIÓN CONTRA CAÍDAS:</strong></label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5E_check1.'"> Arnés de Seg. con 2 cabos de Vida</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5E_check2.'"> Arnés de Seg. con 3 cabos de Vida</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5E_check3.'"> Linea de Vida</label></td>

						</tr>
						
			</table><br><br>


	  ';


$html2=' <br><br> <label><strong>V.6 PPROTECCIÓN FACIAL Y OCULAR:</strong></label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5F_check1.'"> Lentes de seguridad</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5F_check2.'"> Lentes para polvo</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5F_check3.'"> Antiparras de acetato</label></td>

						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5F_check4.'"> Careta facial</label></td>
						    <td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5F_check5.'"> Máscara de soldar</label></td>
							<td rowspan="2" ><label>Otros:</label>'.$v5F_otros.'</td>
						</tr>
						
			</table><br><br>

			<label><strong>V.7 GUANTES:</strong></label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5G_check1.'"> Cabritilla</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5G_check2.'"> Soldador</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5G_check3.'"> Neopreno (prod. químicos)</label></td>

						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5H_check1.'"> Nitrilo o líquido combustible</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5H_check2.'"> Resistentes altas T°</label></td>
						    <td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v5H_check3.'"> Dieléctricos</label></td>
							<td rowspan="2" ><label>Otros:</label>'.$v5G_otros.'</td>
						</tr>
						<tr>
							<td rowspan="2" ><label>Otros:</label>'.$v5G_otros.'</td>
						</tr>
						
			</table>
			<br/>
            <hr/>			
			<label><strong>VI. RESGUARD ÁREA DE TRABAJO:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v6A_check1.'"> Conos</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v6A_check2.'"> Cinta de Peligro</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v6A_check3.'"> Barreras</label></td>
						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v6A_check4.'"> Señalización (letreros)</label></td>
							<td rowspan="2" ><label>Otros:</label>'.$v6A_otros.'</td>
						</tr>							
			</table>

			<br/>
            <hr/>			
			<label><strong>VII. PROCEDIMIENTO DE DESCONEXIÓN ELÉCTRICA/NEUMÁTICA:</strong></label><br>
			<label>TAG de equipo</label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td rowspan="1" ><label> N°:</label>'.$a_7tag_1.'</td>
							<td rowspan="1" ><label> N°:</label>'.$a_7tag_2.'</td>
							<td rowspan="1" ><label> N°:</label>'.$a_7tag_3.'</td>
							<td rowspan="1" ><label> N°:</label>'.$a_7tag_4.'</td>
							<td rowspan="1" ><label> N°:</label>'.$a_7tag_5.'</td>
						</tr>					
			</table><br><br>
			<label>Colocar candado:</label><br>
			<table style="margin: 0 auto; text-align:left;">

						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v7candado_check1.'"> SI</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v7candado_check2.'"> NO</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v7candado_check3.'"> N/A</label></td>
						</tr>
						
			</table><br><br>

			<label>Desconectar desde:</label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v7ccm_check.'"> CCM</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v7tablero_check.'"> Tablero Eléctrico </label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v7ww_check.'"> W/W</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v7otro_check.'"> Otro (Subprincipio)</label></td>

						</tr>						
			</table><br><br>
			<label>Candados:</label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td rowspan="1" ><label> N°:</label>'.$v7candado_num1.'</td>
							<td rowspan="1" ><label> N°:</label>'.$v7candado_num2.'</td>
							<td rowspan="1" ><label> N°:</label>'.$v7candado_num3.'</td>
							<td rowspan="1" ><label> N°:</label>'.$v7candado_num4.'</td>
							<td rowspan="1" ><label> N°:</label>'.$v7candado_num5.'</td>
						</tr>					
			</table><br><br>
			<label>Responsable desconexión o bloqueo:</label><br><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td rowspan="3" ><label>NOMBRE:</label>'.$v7responsable_bloqueo.'</td>
							<td rowspan="1" ><label> FIRMA:</label></td>
						</tr>					
			</table><br><br>
			<br/>
            <hr/>			
			<label><strong>VIII. TRABAJOS EN CALIENTE:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="10%"><label>SI NO N/A</label></td>
							<td width="90%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8A_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8A_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8A_check3.'"></td>
							<td><label>Limpiar el área de trabajo eliminando producto inflamable o combustible</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8B_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8B_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8B_check3.'"></td>
							<td><label>Mantener mojado el piso y zanas circundantes</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8C_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8C_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8C_check3.'"></td>
							<td><label>Aislar el área de trabajo por medio de biombos, lonas o mantas mojadas</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8D_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8D_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8D_check3.'"></td>
							<td><label>Instalación de mangueras contra incendio</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8E_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8E_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8E_check3.'"></td>
							<td><label>Extintor portatil tipo POS</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8F_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8F_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8F_check3.'"></td>
							<td><label>Medición de gases explosivos en el área</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8G_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8G_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v8G_check3.'"></td>
							<td><label>Verificar que al término de los tabajos no queden restos de material incandecentes</label></td>
						</tr>
						<tr>
							<td><label>Otros</label></td>
							<td><label>: </label>'.$v6A_otros.'</td>							
						</tr>
			</table>

			<br/>
            <hr/>			
			<label><strong>IX. TRABAJOS EN ALTURA:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="10%"><label>SI NO N/A</label></td>
							<td width="90%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9A_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9A_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9A_check3.'"></td>
							<td><label>Señalar con cinta de peligro o con letreros l área de la zona de trabajo</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9B_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9B_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9B_check3.'"></td>
							<td><label>Mantener libre de materiales la plataforma de trabajo</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9C_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9C_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9C_check3.'"></td>
							<td><label>La escalera cuenta con los dispositivos de seguridad</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9D_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9D_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9D_check3.'"></td>
							<td><label>Plataforma libre de carga</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9E_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9E_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9E_check3.'"></td>
							<td><label>Se debe colocar una linea o cuerda de vida adicional</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9F_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9F_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9F_check3.'"></td>
							<td><label>Se debe utilizar equipo de levante para subir o bajar personas</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9G_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9G_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9G_check3.'"></td>
							<td><label>Barreras a partir de 1 metro de altura</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9H_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9H_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9H_check3.'"></td>
							<td><label>Se debe utilizar baldes para subir o bajar herramientas o elementos</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9I_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9I_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9I_check3.'"></td>
							<td><label>Si el Andamio supera los 2 cuerpos debe estar anclado a una estructura fija</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9J_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9J_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v9J_check3.'"></td>
							<td><label>El Andamio o plataforma debe estar aprobado</label></td>
						</tr>						
			</table>

		

	';


$html3='<br><hr/>			
			<label><strong>IX. TRABAJOS EN ALTURA:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="10%"><label>SI NO N/A</label></td>
							<td width="90%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10A_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10A_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10A_check3.'"></td>
							<td><label>Para este tipo de trabajos, debe ir dos o mas trabajadores</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10B_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10B_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10B_check3.'"></td>
							<td><label>Se tomo medición de oxígeno, pases explisivos y T°:'.$v10B_T.', C°: '.$v10B_C.', Valores de Med. O2: '.$v10B_O2.', CO: '.$v10B_CO.', LEEL: '.$v10B_LEL.'. </label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10C_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10C_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10C_check3.'"></td>
							<td><label>Es necesario purgar equipos o sistema </label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10D_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10D_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10D_check3.'"></td>
							<td><label>El operador que ingrese deberá llevar arnés, amarrado a una soga</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10E_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10E_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10E_check3.'"></td>
							<td><label>Se necesita ventilación forzada</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10F_check1.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10F_check2.'"><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10F_check3.'"></td>
							<td><label>Se necesita iluminación en 24 volts</label></td>
						</tr>
					
			</table>
			<br><hr/>			
			<label><strong>XI. CIRCUITO CON FLUIDOS::</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11vapor_check.'">Vapor
									   <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11aguacaliente_check.'">Agua caliente
									   <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11condensados_check.'">Condensados
									   <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11aguafria_check.'">Agua fría
									   <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11aire_check.'">Aire
									   <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11sodacautica_check.'">Soda cáustica
									   <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11amoniaco_check.'">Amoníaco<br>
									   <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11acidosulfurico_check.'">Ácido sulfúrico
									   <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11medicionestrestermico_check.'">Medición Estres Térmico
									   <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11actualizarquimicos_check.'">Actualizar Químicos Comasa</label></td>
						</tr>

					
			</table><br><br>
			<label>Temperatura en la línea es: </label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11temperaturabaja_check.'">Sobre los 40°C <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11temperaturaalta_check.'">Bajo los 40°C</label></td>
						</tr>
		

					
			</table>
			<br><br>
			<label>La línea se encuentra: </label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11temperaturabaja_check.'">Presurizada <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11temperaturaalta_check.'">Incomunicada<input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11temperaturaalta_check.'">Purgada<input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11temperaturaalta_check.'">Abierta a la Atmósfera</label></td>
						</tr>
		

					
			</table>
			<br><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v11bloqueovalvula_check.'"> Bloqueo de válvula con cadena y candado Nº: '.$v11bloqueovalvula_num.'</label></td>
						</tr>
					
			</table>
			<br><hr/>			
			<label><strong>XII. Este trabajo requiere autorización de prevención de riesgos: </strong> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10A_check2.'">SI <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$v10A_check2.'">NO</label><br><br><br>
			
			<table style="border: 1px solid; text-align:center;">	
						<thead> 
					        <tr>
					          <th width="12%"></th>
					          <th width="22%">I T O</th>
					          <th width="22%">Originador del trabajo</th>
					          <th width="22%">Ejecutor del trabajo</th>
					          <th width="22%">Responsable del área</th>
					        </tr>
					      </thead>
					      <tbody >
					        <tr>
					          <td width="12%" style="border: 1px solid;"><br>Nombre:<br><br>Firma:<br><br></td>
					          <td width="22%" style="border: 1px solid;"></td>
					          <td width="22%" style="border: 1px solid;"></td>
					          <td width="22%" style="border: 1px solid;"></td>
					          <td width="22%" style="border: 1px solid;"></td>
					        </tr>
					      </tbody>
					
			</table>';


$html4='<br><br><br><h2 style="text-align:center;">VALIDACIÓN DIARIA DE EJECUCIÓN DE TRABAJO</h2>
<h2 style="text-align:center;">PERMISO SEMANAL N° '.$numero_permiso.'</h2><br><br><br><br>
  <table style="border: 1px solid; text-align:center;">

      <tr >
        <th rowspan="2" style="border: 1px solid;" width="5%">DÍA</th>
        <th rowspan="2" style="border: 1px solid;" width="11%">FECHA</th>
        <th colspan="2" style="border: 1px solid;" width="28%">OPERADOR TERRENO</th>
        <th colspan="2" style="border: 1px solid;" width="28%">LÍDER</th>
        <th colspan="2" style="border: 1px solid;" width="28%">CIERRE</th>
      </tr>
      <tr>
        <th style="border: 1px solid;">FIRMA</th>
        <th style="border: 1px solid;">HORA</th>
        <th style="border: 1px solid;">FIRMA</th>
        <th style="border: 1px solid;">HORA</th>
        <th style="border: 1px solid;">FIRMA</th>
        <th style="border: 1px solid;">HORA</th>
      </tr>
      <tr>
        <td style="border: 1px solid;"><h1>L</h1></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
      </tr>
      <tr>
        <td style="border: 1px solid;"><h1>M</h1></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
      </tr>

      <tr>
        <td style="border: 1px solid;"><h1>M</h1></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
      </tr>

      <tr>
        <td style="border: 1px solid;"><h1>J</h1></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
      </tr>

      <tr>
        <td style="border: 1px solid;" style="border: 1px solid;"><h1>V</h1></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
      </tr>
      <tr>
        <td style="border: 1px solid;"><h1>S</h1></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
      </tr>

      <tr>
        <td style="border: 1px solid;"><h1>D</h1></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
        <td style="border: 1px solid;"></td>
      </tr>
  </table>


';


$pdf->writeHTML($html, true, false, true, false, '');	
$pdf->AddPage('P');	

$pdf->writeHTML($html2, true, false, true, false, '');	
$pdf->AddPage('P');	

$pdf->writeHTML($html3, true, false, true, false, '');	


if($titulo_permiso=='PERMISO SEMANAL DE TRABAJO'){
	$pdf->AddPage('P');	
	$pdf->writeHTML($html4, true, false, true, false, '');
}
	



// create new PDF document
ob_end_clean();
$pdf->Output('Permiso_diario_de_trabajo.pdf', 'I');	

?>

