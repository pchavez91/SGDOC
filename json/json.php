<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("../../../config/conex.php");
require_once('correos.php');
$link = Conexion();

$accion   = $_REQUEST['accion'];
$continua = true;


if($accion=='buscar_usuario')
{

	$area_codigo=$_REQUEST['codigo_area']; 
	
		$sql =  "SELECT B.user_rut
		      ,B.cargo_codigo
		      ,B.user_nombre
		      ,B.user_contrasena
		      ,B.user_vigente
		      ,B.user_nick
		      ,B.user_materno
		      ,B.user_paterno
		      ,B.user_correo
		      ,FORMAT ( B.fecha_nacimiento, 'd', 'en-gb' ) AS fecha_nacimiento
			  ,C.cargo_nombre
			  ,D.area_nombre
			  ,D.nombre_area_padre
			  ,C.nivel2
			  ,E.cargo_nombre as gerencia
		  FROM Seguridad.dbo.usuario AS B
		  inner join Seguridad.dbo.cargo AS C ON B.cargo_codigo=C.cargo_codigo
		  INNER JOIN Seguridad.dbo.areas AS D ON D.area_codigo=C.area_codigo
		  LEFT JOIN Seguridad.dbo.cargo AS E ON C.nivel2=E.cargo_codigo
		  LEFT JOIN Seguridad.dbo.cargo AS G ON C.nivel4=G.cargo_codigo
		  where D.area_codigo='$area_codigo' AND B.user_vigente='S'";

	  $respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 

}



if($accion=='buscar_areas')
{
	
		$sql =  "SELECT area_codigo, area_nombre
				FROM Seguridad.dbo.areas
				WHERE area_vigencia='S'";

	  $respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 

}




if($accion=='guardar_actualizar_nuevo_permiso'){

$actividad=$_REQUEST['actividad']; 
$numero_permiso=$_REQUEST['num_permiso'];
$area_solicitante=utf8_decode($_REQUEST['area_solicitante']);
$num_ot=$_REQUEST['num_ot'];
$tipo_permiso=utf8_decode($_REQUEST['tipo_permiso']);
$numero_trabajadores=$_REQUEST['numero_trabajadores'];
$fecha_ini_ejecucion=$_REQUEST['fecha_ini_ejecucion'];
$fecha_termino_ejecucion=$_REQUEST['fecha_termino_ejecucion'];
$hora_ini_ejecucion=$_REQUEST['hora_ini_ejecucion'];
$hora_termino_ejecucion=$_REQUEST['hora_termino_ejecucion'];
$empresa_contratista=utf8_decode($_REQUEST['empresa_contratista']);
$responsable_ejecucion=utf8_decode($_REQUEST['responsable_ejecucion']);
$area_responsable=utf8_decode($_REQUEST['area_responsable']);
$responsable_area=utf8_decode($_REQUEST['responsable_area']);
$codigo_area_solicitante=$_REQUEST['codigo_area_solicitante'];
$codigo_area_responsable=$_REQUEST['codigo_area_responsable'];
$I_tag_uno=$_REQUEST['I_tag_uno'];
$I_tag_dos=$_REQUEST['I_tag_dos'];
$I_tag_tres=$_REQUEST['I_tag_tres'];
$I_tag_cuatro=$_REQUEST['I_tag_cuatro'];
$I_tag_cinco=$_REQUEST['I_tag_cinco'];
$I_candado_uno=$_REQUEST['I_candado_uno'];
$I_candado_dos=$_REQUEST['I_candado_dos'];
$I_candado_tres=$_REQUEST['I_candado_tres'];
$I_candado_cuatro=$_REQUEST['I_candado_cuatro'];
$I_candado_cinco=$_REQUEST['I_candado_cinco'];
$XII_otros=utf8_decode($_REQUEST['XII_otros']);
$XIII_otros=utf8_decode($_REQUEST['XIII_otros']);
$detalle_tabajo_critico=str_replace("\n", "<br />", utf8_decode($_REQUEST['detalle_tabajo_critico']));
$area_autorizada=utf8_decode($_REQUEST['area_autorizada']);
$trabajo_a_realizar=utf8_decode($_REQUEST['trabajo_a_realizar']);
$I_check_candado_si=$_REQUEST['I_check_candado_si'];
$I_check_candado_no=$_REQUEST['I_check_candado_no'];
$I_check_ccm=$_REQUEST['I_check_ccm'];
$I_check_tablero_electrico=$_REQUEST['I_check_tablero_electrico'];
$I_check_ww=$_REQUEST['I_check_ww'];
$I_check_otro_subprincipio=$_REQUEST['I_check_otro_subprincipio'];
$I_check_aislamiento_bloqueo=$_REQUEST['I_check_aislamiento_bloqueo'];
$II_check_trabajo_altura=$_REQUEST['II_check_trabajo_altura'];
$III_check_sumunistro_aire=$_REQUEST['III_check_sumunistro_aire'];
$IV_check_operacion_levante=$_REQUEST['IV_check_operacion_levante'];
$V_check_cespacio_confinado=$_REQUEST['V_check_cespacio_confinado'];
$VI_check_excavacion=$_REQUEST['VI_check_excavacion'];
$VII_check_equipos_electronicos=$_REQUEST['VII_check_equipos_electronicos'];
$VIII_check_atmosfera_peligrosa=$_REQUEST['VIII_check_atmosfera_peligrosa'];
$IX_check_trabajos_caliente=$_REQUEST['IX_check_trabajos_caliente'];
$X_check_lavado_alta_presion=$_REQUEST['X_check_lavado_alta_presion'];
$IIa_check_si=$_REQUEST['IIa_check_si'];
$IIa_check_no=$_REQUEST['IIa_check_no'];
$IIb_check_si=$_REQUEST['IIb_check_si'];
$IIb_check_no=$_REQUEST['IIb_check_no'];
$IIc_check_si=$_REQUEST['IIc_check_si'];
$IIc_check_no=$_REQUEST['IIc_check_no'];
$IId_check_si=$_REQUEST['IId_check_si'];
$IId_check_no=$_REQUEST['IId_check_no'];
$IIe_check_si=$_REQUEST['IIe_check_si'];
$IIe_check_no=$_REQUEST['IIe_check_no'];
$IIf_check_si=$_REQUEST['IIf_check_si'];
$IIf_check_no=$_REQUEST['IIf_check_no'];
$IIg_check_si=$_REQUEST['IIg_check_si'];
$IIg_check_no=$_REQUEST['IIg_check_no'];
$IIh_check_si=$_REQUEST['IIh_check_si'];
$IIh_check_no=$_REQUEST['IIh_check_no'];
$IIi_check_si=$_REQUEST['IIi_check_si'];
$IIi_check_no=$_REQUEST['IIi_check_no'];
$IIj_check_si=$_REQUEST['IIj_check_si'];
$IIj_check_no=$_REQUEST['IIj_check_no'];
$IIIa_check_si=$_REQUEST['IIIa_check_si'];
$IIIa_check_no=$_REQUEST['IIIa_check_no'];
$IIIb_check_si=$_REQUEST['IIIb_check_si'];
$IIIb_check_no=$_REQUEST['IIIb_check_no'];
$IIIc_check_si=$_REQUEST['IIIc_check_si'];
$IIIc_check_no=$_REQUEST['IIIc_check_no'];
$IIId_check_si=$_REQUEST['IIId_check_si'];
$IIId_check_no=$_REQUEST['IIId_check_no'];
$IIIe_check_si=$_REQUEST['IIIe_check_si'];
$IIIe_check_no=$_REQUEST['IIIe_check_no'];
$IIIf_check_si=$_REQUEST['IIIf_check_si'];
$IIIf_check_no=$_REQUEST['IIIf_check_no'];
$IIIg_check_si=$_REQUEST['IIIg_check_si'];
$IIIg_check_no=$_REQUEST['IIIg_check_no'];
$IIIh_check_si=$_REQUEST['IIIh_check_si'];
$IIIh_check_no=$_REQUEST['IIIh_check_no'];
$IIIi_check_si=$_REQUEST['IIIi_check_si'];
$IIIi_check_no=$_REQUEST['IIIi_check_no'];
$IVa_check_si=$_REQUEST['IVa_check_si'];
$IVa_check_no=$_REQUEST['IVa_check_no'];
$IVb_check_si=$_REQUEST['IVb_check_si'];
$IVb_check_no=$_REQUEST['IVb_check_no'];
$IVc_check_si=$_REQUEST['IVc_check_si'];
$IVc_check_no=$_REQUEST['IVc_check_no'];
$IVd_check_si=$_REQUEST['IVd_check_si'];
$IVd_check_no=$_REQUEST['IVd_check_no'];
$IVe_check_si=$_REQUEST['IVe_check_si'];
$IVe_check_no=$_REQUEST['IVe_check_no'];
$IVf_check_si=$_REQUEST['IVf_check_si'];
$IVf_check_no=$_REQUEST['IVf_check_no'];
$IVg_check_si=$_REQUEST['IVg_check_si'];
$IVg_check_no=$_REQUEST['IVg_check_no'];
$IVh_check_si=$_REQUEST['IVh_check_si'];
$IVh_check_no=$_REQUEST['IVh_check_no'];
$IVi_check_si=$_REQUEST['IVi_check_si'];
$IVi_check_no=$_REQUEST['IVi_check_no'];
$Va_check_si=$_REQUEST['Va_check_si'];
$Va_check_no=$_REQUEST['Va_check_no'];
$Vb_check_si=$_REQUEST['Vb_check_si'];
$Vb_check_no=$_REQUEST['Vb_check_no'];
$Vc_check_si=$_REQUEST['Vc_check_si'];
$Vc_check_no=$_REQUEST['Vc_check_no'];
$Vd_check_si=$_REQUEST['Vd_check_si'];
$Vd_check_no=$_REQUEST['Vd_check_no'];
$Ve_check_si=$_REQUEST['Ve_check_si'];
$Ve_check_no=$_REQUEST['Ve_check_no'];
$Vf_check_si=$_REQUEST['Vf_check_si'];
$Vf_check_no=$_REQUEST['Vf_check_no'];
$Vg_check_si=$_REQUEST['Vg_check_si'];
$Vg_check_no=$_REQUEST['Vg_check_no'];
$Vh_check_si=$_REQUEST['Vh_check_si'];
$Vh_check_no=$_REQUEST['Vh_check_no'];
$Vi_check_si=$_REQUEST['Vi_check_si'];
$Vi_check_no=$_REQUEST['Vi_check_no'];
$VIa_check_si=$_REQUEST['VIa_check_si'];
$VIa_check_no=$_REQUEST['VIa_check_no'];
$VIb_check_si=$_REQUEST['VIb_check_si'];
$VIb_check_no=$_REQUEST['VIb_check_no'];
$VIc_check_si=$_REQUEST['VIc_check_si'];
$VIc_check_no=$_REQUEST['VIc_check_no'];
$VId_check_si=$_REQUEST['VId_check_si'];
$VId_check_no=$_REQUEST['VId_check_no'];
$VIe_check_si=$_REQUEST['VIe_check_si'];
$VIe_check_no=$_REQUEST['VIe_check_no'];
$VIf_check_si=$_REQUEST['VIf_check_si'];
$VIf_check_no=$_REQUEST['VIf_check_no'];
$VIg_check_si=$_REQUEST['VIg_check_si'];
$VIg_check_no=$_REQUEST['VIg_check_no'];
$VIh_check_si=$_REQUEST['VIh_check_si'];
$VIh_check_no=$_REQUEST['VIh_check_no'];
$VIi_check_si=$_REQUEST['VIi_check_si'];
$VIi_check_no=$_REQUEST['VIi_check_no'];
$VIj_check_si=$_REQUEST['VIj_check_si'];
$VIj_check_no=$_REQUEST['VIj_check_no'];
$VIIa_check_si=$_REQUEST['VIIa_check_si'];
$VIIa_check_no=$_REQUEST['VIIa_check_no'];
$VIIb_check_si=$_REQUEST['VIIb_check_si'];
$VIIb_check_no=$_REQUEST['VIIb_check_no'];
$VIIc_check_si=$_REQUEST['VIIc_check_si'];
$VIIc_check_no=$_REQUEST['VIIc_check_no'];
$VIId_check_si=$_REQUEST['VIId_check_si'];
$VIId_check_no=$_REQUEST['VIId_check_no'];
$VIIe_check_si=$_REQUEST['VIIe_check_si'];
$VIIe_check_no=$_REQUEST['VIIe_check_no'];
$VIIf_check_si=$_REQUEST['VIIf_check_si'];
$VIIf_check_no=$_REQUEST['VIIf_check_no'];
$VIIg_check_si=$_REQUEST['VIIg_check_si'];
$VIIg_check_no=$_REQUEST['VIIg_check_no'];
$VIIh_check_si=$_REQUEST['VIIh_check_si'];
$VIIh_check_no=$_REQUEST['VIIh_check_no'];
$VIIi_check_si=$_REQUEST['VIIi_check_si'];
$VIIi_check_no=$_REQUEST['VIIi_check_no'];
$VIIIa_check_si=$_REQUEST['VIIIa_check_si'];
$VIIIa_check_no=$_REQUEST['VIIIa_check_no'];
$VIIIb_check_si=$_REQUEST['VIIIb_check_si'];
$VIIIb_check_no=$_REQUEST['VIIIb_check_no'];
$VIIIc_check_si=$_REQUEST['VIIIc_check_si'];
$VIIIc_check_no=$_REQUEST['VIIIc_check_no'];
$VIIId_check_si=$_REQUEST['VIIId_check_si'];
$VIIId_check_no=$_REQUEST['VIIId_check_no'];
$VIIIe_check_si=$_REQUEST['VIIIe_check_si'];
$VIIIe_check_no=$_REQUEST['VIIIe_check_no'];
$VIIIf_check_si=$_REQUEST['VIIIf_check_si'];
$VIIIf_check_no=$_REQUEST['VIIIf_check_no'];
$VIIIg_check_si=$_REQUEST['VIIIg_check_si'];
$VIIIg_check_no=$_REQUEST['VIIIg_check_no'];
$VIIIh_check_si=$_REQUEST['VIIIh_check_si'];
$VIIIh_check_no=$_REQUEST['VIIIh_check_no'];
$IXa_check_si=$_REQUEST['IXa_check_si'];
$IXa_check_no=$_REQUEST['IXa_check_no'];
$IXb_check_si=$_REQUEST['IXb_check_si'];
$IXb_check_no=$_REQUEST['IXb_check_no'];
$IXc_check_si=$_REQUEST['IXc_check_si'];
$IXc_check_no=$_REQUEST['IXc_check_no'];
$IXd_check_si=$_REQUEST['IXd_check_si'];
$IXd_check_no=$_REQUEST['IXd_check_no'];
$IXe_check_si=$_REQUEST['IXe_check_si'];
$IXe_check_no=$_REQUEST['IXe_check_no'];
$IXf_check_si=$_REQUEST['IXf_check_si'];
$IXf_check_no=$_REQUEST['IXf_check_no'];
$IXg_check_si=$_REQUEST['IXg_check_si'];
$IXg_check_no=$_REQUEST['IXg_check_no'];
$IXh_check_si=$_REQUEST['IXh_check_si'];
$IXh_check_no=$_REQUEST['IXh_check_no'];
$Xa_check_si=$_REQUEST['Xa_check_si'];
$Xa_check_no=$_REQUEST['Xa_check_no'];
$Xb_check_si=$_REQUEST['Xb_check_si'];
$Xb_check_no=$_REQUEST['Xb_check_no'];
$Xc_check_si=$_REQUEST['Xc_check_si'];
$Xc_check_no=$_REQUEST['Xc_check_no'];
$Xd_check_si=$_REQUEST['Xd_check_si'];
$Xd_check_no=$_REQUEST['Xd_check_no'];
$Xe_check_si=$_REQUEST['Xe_check_si'];
$Xe_check_no=$_REQUEST['Xe_check_no'];
$Xf_check_si=$_REQUEST['Xf_check_si'];
$Xf_check_no=$_REQUEST['Xf_check_no'];
$Xg_check_si=$_REQUEST['Xg_check_si'];
$Xg_check_no=$_REQUEST['Xg_check_no'];
$Xh_check_si=$_REQUEST['Xh_check_si'];
$Xh_check_no=$_REQUEST['Xh_check_no'];
$Xi_check_si=$_REQUEST['Xi_check_si'];
$Xi_check_no=$_REQUEST['Xi_check_no'];
$XII_check_herr_electr=$_REQUEST['XII_check_herr_electr'];
$XII_check_herr_manual=$_REQUEST['XII_check_herr_manual'];
$XII_check_camion_grua=$_REQUEST['XII_check_camion_grua'];
$XII_check_andamio=$_REQUEST['XII_check_andamio'];
$XII_check_soldadura_arco=$_REQUEST['XII_check_soldadura_arco'];
$XII_check_compresor=$_REQUEST['XII_check_compresor'];
$XII_check_soldadura_oxi=$_REQUEST['XII_check_soldadura_oxi'];
$XIII_check_ruido=$_REQUEST['XIII_check_ruido'];
$XIII_check_caida=$_REQUEST['XIII_check_caida'];
$XIII_check_riego_electrico=$_REQUEST['XIII_check_riego_electrico'];
$XIII_check_contacto_quimico=$_REQUEST['XIII_check_contacto_quimico'];
$XIII_check_exposicion_gas=$_REQUEST['XIII_check_exposicion_gas'];
$XIII_check_estres=$_REQUEST['XIII_check_estres'];
$XIII_check_proyeccion=$_REQUEST['XIII_check_proyeccion'];
$XIII_check_exposicion_polvo=$_REQUEST['XIII_check_exposicion_polvo'];
$XIII_check_contacto_sup_caliente=$_REQUEST['XIII_check_contacto_sup_caliente'];
$XIV_check_conos=$_REQUEST['XIV_check_conos'];
$XIV_check_cinta=$_REQUEST['XIV_check_cinta'];
$XIV_check_barreras=$_REQUEST['XIV_check_barreras'];
$XIV_check_senalizacion=$_REQUEST['XIV_check_senalizacion'];



if($tipo_permiso=='PERMISO DIARIO DE TRABAJO'){
	$fecha_termino_ejecucion=$fecha_ini_ejecucion;
}

	if($actividad=='nuevo'){


		 $sql_correlativo="SELECT max(cast(num_permiso as float))+1 AS numero_permiso 
			FROM seguimiento.dbo.permiso_trabajo_nuevo";
			$rES = mssql_query($sql_correlativo, $link);
			if($ROW2 =  mssql_fetch_array($rES))
			 {

			    $numero_permiso=$ROW2['numero_permiso'];
			    if($numero_permiso==''){
			    	$numero_permiso='1';
			    }
			

				$sql="INSERT INTO seguimiento.dbo.permiso_trabajo_nuevo
           						(num_permiso
								,area_solicitante
								,num_ot
								,tipo_permiso
								,numero_trabajadores
								,fecha_ini_ejecucion
								,fecha_termino_ejecucion
								,hora_ini_ejecucion
								,hora_termino_ejecucion
								,empresa_contratista
								,responsable_ejecucion
								,area_responsable
								,responsable_area
								,I_tag_uno
								,I_tag_dos
								,I_tag_tres
								,I_tag_cuatro
								,I_tag_cinco
								,I_candado_uno
								,I_candado_dos
								,I_candado_tres
								,I_candado_cuatro
								,I_candado_cinco
								,XII_otros
								,XIII_otros
								,I_check_candado_si
								,I_check_candado_no
								,I_check_ccm
								,I_check_tablero_electrico
								,I_check_ww
								,I_check_otro_subprincipio
								,I_check_aislamiento_bloqueo
								,II_check_trabajo_altura
								,III_check_sumunistro_aire
								,IV_check_operacion_levante
								,V_check_cespacio_confinado
								,VI_check_excavacion
								,VII_check_equipos_electronicos
								,VIII_check_atmosfera_peligrosa
								,IX_check_trabajos_caliente
								,X_check_lavado_alta_presion
								,IIa_check_si
								,IIa_check_no
								,IIb_check_si
								,IIb_check_no
								,IIc_check_si
								,IIc_check_no
								,IId_check_si
								,IId_check_no
								,IIe_check_si
								,IIe_check_no
								,IIf_check_si
								,IIf_check_no
								,IIg_check_si
								,IIg_check_no
								,IIh_check_si
								,IIh_check_no
								,IIi_check_si
								,IIi_check_no
								,IIj_check_si
								,IIj_check_no
								,IIIa_check_si
								,IIIa_check_no
								,IIIb_check_si
								,IIIb_check_no
								,IIIc_check_si
								,IIIc_check_no
								,IIId_check_si
								,IIId_check_no
								,IIIe_check_si
								,IIIe_check_no
								,IIIf_check_si
								,IIIf_check_no
								,IIIg_check_si
								,IIIg_check_no
								,IIIh_check_si
								,IIIh_check_no
								,IIIi_check_si
								,IIIi_check_no
								,IVa_check_si
								,IVa_check_no
								,IVb_check_si
								,IVb_check_no
								,IVc_check_si
								,IVc_check_no
								,IVd_check_si
								,IVd_check_no
								,IVe_check_si
								,IVe_check_no
								,IVf_check_si
								,IVf_check_no
								,IVg_check_si
								,IVg_check_no
								,IVh_check_si
								,IVh_check_no
								,IVi_check_si
								,IVi_check_no
								,Va_check_si
								,Va_check_no
								,Vb_check_si
								,Vb_check_no
								,Vc_check_si
								,Vc_check_no
								,Vd_check_si
								,Vd_check_no
								,Ve_check_si
								,Ve_check_no
								,Vf_check_si
								,Vf_check_no
								,Vg_check_si
								,Vg_check_no
								,Vh_check_si
								,Vh_check_no
								,Vi_check_si
								,Vi_check_no
								,VIa_check_si
								,VIa_check_no
								,VIb_check_si
								,VIb_check_no
								,VIc_check_si
								,VIc_check_no
								,VId_check_si
								,VId_check_no
								,VIe_check_si
								,VIe_check_no
								,VIf_check_si
								,VIf_check_no
								,VIg_check_si
								,VIg_check_no
								,VIh_check_si
								,VIh_check_no
								,VIi_check_si
								,VIi_check_no
								,VIj_check_si
								,VIj_check_no
								,VIIa_check_si
								,VIIa_check_no
								,VIIb_check_si
								,VIIb_check_no
								,VIIc_check_si
								,VIIc_check_no
								,VIId_check_si
								,VIId_check_no
								,VIIe_check_si
								,VIIe_check_no
								,VIIf_check_si
								,VIIf_check_no
								,VIIg_check_si
								,VIIg_check_no
								,VIIh_check_si
								,VIIh_check_no
								,VIIi_check_si
								,VIIi_check_no
								,VIIIa_check_si
								,VIIIa_check_no
								,VIIIb_check_si
								,VIIIb_check_no
								,VIIIc_check_si
								,VIIIc_check_no
								,VIIId_check_si
								,VIIId_check_no
								,VIIIe_check_si
								,VIIIe_check_no
								,VIIIf_check_si
								,VIIIf_check_no
								,VIIIg_check_si
								,VIIIg_check_no
								,VIIIh_check_si
								,VIIIh_check_no
								,IXa_check_si
								,IXa_check_no
								,IXb_check_si
								,IXb_check_no
								,IXc_check_si
								,IXc_check_no
								,IXd_check_si
								,IXd_check_no
								,IXe_check_si
								,IXe_check_no
								,IXf_check_si
								,IXf_check_no
								,IXg_check_si
								,IXg_check_no
								,IXh_check_si
								,IXh_check_no
								,Xa_check_si
								,Xa_check_no
								,Xb_check_si
								,Xb_check_no
								,Xc_check_si
								,Xc_check_no
								,Xd_check_si
								,Xd_check_no
								,Xe_check_si
								,Xe_check_no
								,Xf_check_si
								,Xf_check_no
								,Xg_check_si
								,Xg_check_no
								,Xh_check_si
								,Xh_check_no
								,Xi_check_si
								,Xi_check_no
								,XII_check_herr_electr
								,XII_check_herr_manual
								,XII_check_camion_grua
								,XII_check_andamio
								,XII_check_soldadura_arco
								,XII_check_compresor
								,XII_check_soldadura_oxi
								,XIII_check_ruido
								,XIII_check_caida
								,XIII_check_riego_electrico
								,XIII_check_contacto_quimico
								,XIII_check_exposicion_gas
								,XIII_check_estres
								,XIII_check_proyeccion
								,XIII_check_exposicion_polvo
								,XIII_check_contacto_sup_caliente
								,XIV_check_conos
								,XIV_check_cinta
								,XIV_check_barreras
								,XIV_check_senalizacion
								,nick_creador
								,fecha_creador
								,codigo_area_solicitante
								,codigo_area_responsable
								,detalle_tabajo_critico
								,trabajo_a_realizar
								,area_autorizada
								)
						           VALUES ('$numero_permiso',
											'$area_solicitante',
											'$num_ot',
											'$tipo_permiso',
											'$numero_trabajadores',
											'$fecha_ini_ejecucion',
											'$fecha_termino_ejecucion',
											'$hora_ini_ejecucion',
											'$hora_termino_ejecucion',
											'$empresa_contratista',
											'$responsable_ejecucion',
											'$area_responsable',
											'$responsable_area',
											'$I_tag_uno',
											'$I_tag_dos',
											'$I_tag_tres',
											'$I_tag_cuatro',
											'$I_tag_cinco',
											'$I_candado_uno',
											'$I_candado_dos',
											'$I_candado_tres',
											'$I_candado_cuatro',
											'$I_candado_cinco',
											'$XII_otros',
											'$XIII_otros',
											'$I_check_candado_si',
											'$I_check_candado_no',
											'$I_check_ccm',
											'$I_check_tablero_electrico',
											'$I_check_ww',
											'$I_check_otro_subprincipio',
											'$I_check_aislamiento_bloqueo',
											'$II_check_trabajo_altura',
											'$III_check_sumunistro_aire',
											'$IV_check_operacion_levante',
											'$V_check_cespacio_confinado',
											'$VI_check_excavacion',
											'$VII_check_equipos_electronicos',
											'$VIII_check_atmosfera_peligrosa',
											'$IX_check_trabajos_caliente',
											'$X_check_lavado_alta_presion',
											'$IIa_check_si',
											'$IIa_check_no',
											'$IIb_check_si',
											'$IIb_check_no',
											'$IIc_check_si',
											'$IIc_check_no',
											'$IId_check_si',
											'$IId_check_no',
											'$IIe_check_si',
											'$IIe_check_no',
											'$IIf_check_si',
											'$IIf_check_no',
											'$IIg_check_si',
											'$IIg_check_no',
											'$IIh_check_si',
											'$IIh_check_no',
											'$IIi_check_si',
											'$IIi_check_no',
											'$IIj_check_si',
											'$IIj_check_no',
											'$IIIa_check_si',
											'$IIIa_check_no',
											'$IIIb_check_si',
											'$IIIb_check_no',
											'$IIIc_check_si',
											'$IIIc_check_no',
											'$IIId_check_si',
											'$IIId_check_no',
											'$IIIe_check_si',
											'$IIIe_check_no',
											'$IIIf_check_si',
											'$IIIf_check_no',
											'$IIIg_check_si',
											'$IIIg_check_no',
											'$IIIh_check_si',
											'$IIIh_check_no',
											'$IIIi_check_si',
											'$IIIi_check_no',
											'$IVa_check_si',
											'$IVa_check_no',
											'$IVb_check_si',
											'$IVb_check_no',
											'$IVc_check_si',
											'$IVc_check_no',
											'$IVd_check_si',
											'$IVd_check_no',
											'$IVe_check_si',
											'$IVe_check_no',
											'$IVf_check_si',
											'$IVf_check_no',
											'$IVg_check_si',
											'$IVg_check_no',
											'$IVh_check_si',
											'$IVh_check_no',
											'$IVi_check_si',
											'$IVi_check_no',
											'$Va_check_si',
											'$Va_check_no',
											'$Vb_check_si',
											'$Vb_check_no',
											'$Vc_check_si',
											'$Vc_check_no',
											'$Vd_check_si',
											'$Vd_check_no',
											'$Ve_check_si',
											'$Ve_check_no',
											'$Vf_check_si',
											'$Vf_check_no',
											'$Vg_check_si',
											'$Vg_check_no',
											'$Vh_check_si',
											'$Vh_check_no',
											'$Vi_check_si',
											'$Vi_check_no',
											'$VIa_check_si',
											'$VIa_check_no',
											'$VIb_check_si',
											'$VIb_check_no',
											'$VIc_check_si',
											'$VIc_check_no',
											'$VId_check_si',
											'$VId_check_no',
											'$VIe_check_si',
											'$VIe_check_no',
											'$VIf_check_si',
											'$VIf_check_no',
											'$VIg_check_si',
											'$VIg_check_no',
											'$VIh_check_si',
											'$VIh_check_no',
											'$VIi_check_si',
											'$VIi_check_no',
											'$VIj_check_si',
											'$VIj_check_no',
											'$VIIa_check_si',
											'$VIIa_check_no',
											'$VIIb_check_si',
											'$VIIb_check_no',
											'$VIIc_check_si',
											'$VIIc_check_no',
											'$VIId_check_si',
											'$VIId_check_no',
											'$VIIe_check_si',
											'$VIIe_check_no',
											'$VIIf_check_si',
											'$VIIf_check_no',
											'$VIIg_check_si',
											'$VIIg_check_no',
											'$VIIh_check_si',
											'$VIIh_check_no',
											'$VIIi_check_si',
											'$VIIi_check_no',
											'$VIIIa_check_si',
											'$VIIIa_check_no',
											'$VIIIb_check_si',
											'$VIIIb_check_no',
											'$VIIIc_check_si',
											'$VIIIc_check_no',
											'$VIIId_check_si',
											'$VIIId_check_no',
											'$VIIIe_check_si',
											'$VIIIe_check_no',
											'$VIIIf_check_si',
											'$VIIIf_check_no',
											'$VIIIg_check_si',
											'$VIIIg_check_no',
											'$VIIIh_check_si',
											'$VIIIh_check_no',
											'$IXa_check_si',
											'$IXa_check_no',
											'$IXb_check_si',
											'$IXb_check_no',
											'$IXc_check_si',
											'$IXc_check_no',
											'$IXd_check_si',
											'$IXd_check_no',
											'$IXe_check_si',
											'$IXe_check_no',
											'$IXf_check_si',
											'$IXf_check_no',
											'$IXg_check_si',
											'$IXg_check_no',
											'$IXh_check_si',
											'$IXh_check_no',
											'$Xa_check_si',
											'$Xa_check_no',
											'$Xb_check_si',
											'$Xb_check_no',
											'$Xc_check_si',
											'$Xc_check_no',
											'$Xd_check_si',
											'$Xd_check_no',
											'$Xe_check_si',
											'$Xe_check_no',
											'$Xf_check_si',
											'$Xf_check_no',
											'$Xg_check_si',
											'$Xg_check_no',
											'$Xh_check_si',
											'$Xh_check_no',
											'$Xi_check_si',
											'$Xi_check_no',
											'$XII_check_herr_electr',
											'$XII_check_herr_manual',
											'$XII_check_camion_grua',
											'$XII_check_andamio',
											'$XII_check_soldadura_arco',
											'$XII_check_compresor',
											'$XII_check_soldadura_oxi',
											'$XIII_check_ruido',
											'$XIII_check_caida',
											'$XIII_check_riego_electrico',
											'$XIII_check_contacto_quimico',
											'$XIII_check_exposicion_gas',
											'$XIII_check_estres',
											'$XIII_check_proyeccion',
											'$XIII_check_exposicion_polvo',
											'$XIII_check_contacto_sup_caliente',
											'$XIV_check_conos',
											'$XIV_check_cinta',
											'$XIV_check_barreras',
											'$XIV_check_senalizacion',
											'".$_SESSION['nick']."',
											getdate(),
											'$codigo_area_solicitante',
											'$codigo_area_responsable',
											'$detalle_tabajo_critico',
											'$trabajo_a_realizar',
											'$area_autorizada')";
				mssql_query($sql, $link);

				echo '[{"success":"true","numero_permiso":"'.$numero_permiso.'","mensaje":"NUEVO PERMISO GUARDADO CORRECTAMENTE"}]';

			}

	}else{


		$sql="UPDATE seguimiento.dbo.permiso_trabajo_nuevo
			  SET area_solicitante='$area_solicitante',
					num_ot='$num_ot',
					tipo_permiso='$tipo_permiso',
					numero_trabajadores='$numero_trabajadores',
					fecha_ini_ejecucion='$fecha_ini_ejecucion',
					fecha_termino_ejecucion='$fecha_termino_ejecucion',
					hora_ini_ejecucion='$hora_ini_ejecucion',
					hora_termino_ejecucion='$hora_termino_ejecucion',
					empresa_contratista='$empresa_contratista',
					responsable_ejecucion='$responsable_ejecucion',
					area_responsable='$area_responsable',
					responsable_area='$responsable_area',
					area_autorizada='$area_autorizada',
					trabajo_a_realizar='$trabajo_a_realizar',
					detalle_tabajo_critico='$detalle_tabajo_critico',
					XIII_otros='$XIII_otros',
					XII_otros='$XII_otros',
					nick_modifica='".$_SESSION['nick']."',
					fecha_modifica=getdate(),
					I_check_aislamiento_bloqueo='$I_check_aislamiento_bloqueo',
					II_check_trabajo_altura='$II_check_trabajo_altura',
					III_check_sumunistro_aire='$III_check_sumunistro_aire',
					IV_check_operacion_levante='$IV_check_operacion_levante',
					V_check_cespacio_confinado='$V_check_cespacio_confinado',
					VI_check_excavacion='$VI_check_excavacion',
					VII_check_equipos_electronicos='$VII_check_equipos_electronicos',
					VIII_check_atmosfera_peligrosa='$VIII_check_atmosfera_peligrosa',
					IX_check_trabajos_caliente='$IX_check_trabajos_caliente',
					X_check_lavado_alta_presion='$X_check_lavado_alta_presion',
					I_tag_uno='$I_tag_uno',
					I_tag_dos='$I_tag_dos',
					I_tag_tres='$I_tag_tres',
					I_tag_cuatro='$I_tag_cuatro',
					I_tag_cinco='$I_tag_cinco',
					I_check_candado_si='$I_check_candado_si',
					I_check_candado_no='$I_check_candado_no',
					I_check_ccm='$I_check_ccm',
					I_check_tablero_electrico='$I_check_tablero_electrico',
					I_check_ww='$I_check_ww',
					I_check_otro_subprincipio='$I_check_otro_subprincipio',
					I_candado_uno='$I_candado_uno',
					I_candado_dos='$I_candado_dos',
					I_candado_tres='$I_candado_tres',
					I_candado_cuatro='$I_candado_cuatro',
					I_candado_cinco='$I_candado_cinco',
					IIa_check_si='$IIa_check_si',
					IIa_check_no='$IIa_check_no',
					IIb_check_si='$IIb_check_si',
					IIb_check_no='$IIb_check_no',
					IIc_check_si='$IIc_check_si',
					IIc_check_no='$IIc_check_no',
					IId_check_si='$IId_check_si',
					IId_check_no='$IId_check_no',
					IIe_check_si='$IIe_check_si',
					IIe_check_no='$IIe_check_no',
					IIf_check_si='$IIf_check_si',
					IIf_check_no='$IIf_check_no',
					IIg_check_si='$IIg_check_si',
					IIg_check_no='$IIg_check_no',
					IIh_check_si='$IIh_check_si',
					IIh_check_no='$IIh_check_no',
					IIi_check_si='$IIi_check_si',
					IIi_check_no='$IIi_check_no',
					IIj_check_si='$IIj_check_si',
					IIj_check_no='$IIj_check_no',
					IIIa_check_si='$IIIa_check_si',
					IIIa_check_no='$IIIa_check_no',
					IIIb_check_si='$IIIb_check_si',
					IIIb_check_no='$IIIb_check_no',
					IIIc_check_si='$IIIc_check_si',
					IIIc_check_no='$IIIc_check_no',
					IIId_check_si='$IIId_check_si',
					IIId_check_no='$IIId_check_no',
					IIIe_check_si='$IIIe_check_si',
					IIIe_check_no='$IIIe_check_no',
					IIIf_check_si='$IIIf_check_si',
					IIIf_check_no='$IIIf_check_no',
					IIIg_check_si='$IIIg_check_si',
					IIIg_check_no='$IIIg_check_no',
					IIIh_check_si='$IIIh_check_si',
					IIIh_check_no='$IIIh_check_no',
					IIIi_check_si='$IIIi_check_si',
					IIIi_check_no='$IIIi_check_no',
					IVa_check_si='$IVa_check_si',
					IVa_check_no='$IVa_check_no',
					IVb_check_si='$IVb_check_si',
					IVb_check_no='$IVb_check_no',
					IVc_check_si='$IVc_check_si',
					IVc_check_no='$IVc_check_no',
					IVd_check_si='$IVd_check_si',
					IVd_check_no='$IVd_check_no',
					IVe_check_si='$IVe_check_si',
					IVe_check_no='$IVe_check_no',
					IVf_check_si='$IVf_check_si',
					IVf_check_no='$IVf_check_no',
					IVg_check_si='$IVg_check_si',
					IVg_check_no='$IVg_check_no',
					IVh_check_si='$IVh_check_si',
					IVh_check_no='$IVh_check_no',
					IVi_check_si='$IVi_check_si',
					IVi_check_no='$IVi_check_no',
					Va_check_si='$Va_check_si',
					Va_check_no='$Va_check_no',
					Vb_check_si='$Vb_check_si',
					Vb_check_no='$Vb_check_no',
					Vc_check_si='$Vc_check_si',
					Vc_check_no='$Vc_check_no',
					Vd_check_si='$Vd_check_si',
					Vd_check_no='$Vd_check_no',
					Ve_check_si='$Ve_check_si',
					Ve_check_no='$Ve_check_no',
					Vf_check_si='$Vf_check_si',
					Vf_check_no='$Vf_check_no',
					Vg_check_si='$Vg_check_si',
					Vg_check_no='$Vg_check_no',
					Vh_check_si='$Vh_check_si',
					Vh_check_no='$Vh_check_no',
					Vi_check_si='$Vi_check_si',
					Vi_check_no='$Vi_check_no',
					VIa_check_si='$VIa_check_si',
					VIa_check_no='$VIa_check_no',
					VIb_check_si='$VIb_check_si',
					VIb_check_no='$VIb_check_no',
					VIc_check_si='$VIc_check_si',
					VIc_check_no='$VIc_check_no',
					VId_check_si='$VId_check_si',
					VId_check_no='$VId_check_no',
					VIe_check_si='$VIe_check_si',
					VIe_check_no='$VIe_check_no',
					VIf_check_si='$VIf_check_si',
					VIf_check_no='$VIf_check_no',
					VIg_check_si='$VIg_check_si',
					VIg_check_no='$VIg_check_no',
					VIh_check_si='$VIh_check_si',
					VIh_check_no='$VIh_check_no',
					VIi_check_si='$VIi_check_si',
					VIi_check_no='$VIi_check_no',
					VIj_check_si='$VIj_check_si',
					VIj_check_no='$VIj_check_no',
					VIIa_check_si='$VIIa_check_si',
					VIIa_check_no='$VIIa_check_no',
					VIIb_check_si='$VIIb_check_si',
					VIIb_check_no='$VIIb_check_no',
					VIIc_check_si='$VIIc_check_si',
					VIIc_check_no='$VIIc_check_no',
					VIId_check_si='$VIId_check_si',
					VIId_check_no='$VIId_check_no',
					VIIe_check_si='$VIIe_check_si',
					VIIe_check_no='$VIIe_check_no',
					VIIf_check_si='$VIIf_check_si',
					VIIf_check_no='$VIIf_check_no',
					VIIg_check_si='$VIIg_check_si',
					VIIg_check_no='$VIIg_check_no',
					VIIh_check_si='$VIIh_check_si',
					VIIh_check_no='$VIIh_check_no',
					VIIi_check_si='$VIIi_check_si',
					VIIi_check_no='$VIIi_check_no',
					VIIIa_check_si='$VIIIa_check_si',
					VIIIa_check_no='$VIIIa_check_no',
					VIIIb_check_si='$VIIIb_check_si',
					VIIIb_check_no='$VIIIb_check_no',
					VIIIc_check_si='$VIIIc_check_si',
					VIIIc_check_no='$VIIIc_check_no',
					VIIId_check_si='$VIIId_check_si',
					VIIId_check_no='$VIIId_check_no',
					VIIIe_check_si='$VIIIe_check_si',
					VIIIe_check_no='$VIIIe_check_no',
					VIIIf_check_si='$VIIIf_check_si',
					VIIIf_check_no='$VIIIf_check_no',
					VIIIg_check_si='$VIIIg_check_si',
					VIIIg_check_no='$VIIIg_check_no',
					VIIIh_check_si='$VIIIh_check_si',
					VIIIh_check_no='$VIIIh_check_no',
					IXa_check_si='$IXa_check_si',
					IXa_check_no='$IXa_check_no',
					IXb_check_si='$IXb_check_si',
					IXb_check_no='$IXb_check_no',
					IXc_check_si='$IXc_check_si',
					IXc_check_no='$IXc_check_no',
					IXd_check_si='$IXd_check_si',
					IXd_check_no='$IXd_check_no',
					IXe_check_si='$IXe_check_si',
					IXe_check_no='$IXe_check_no',
					IXf_check_si='$IXf_check_si',
					IXf_check_no='$IXf_check_no',
					IXg_check_si='$IXg_check_si',
					IXg_check_no='$IXg_check_no',
					IXh_check_si='$IXh_check_si',
					IXh_check_no='$IXh_check_no',
					Xa_check_si='$Xa_check_si',
					Xa_check_no='$Xa_check_no',
					Xb_check_si='$Xb_check_si',
					Xb_check_no='$Xb_check_no',
					Xc_check_si='$Xc_check_si',
					Xc_check_no='$Xc_check_no',
					Xd_check_si='$Xd_check_si',
					Xd_check_no='$Xd_check_no',
					Xe_check_si='$Xe_check_si',
					Xe_check_no='$Xe_check_no',
					Xf_check_si='$Xf_check_si',
					Xf_check_no='$Xf_check_no',
					Xg_check_si='$Xg_check_si',
					Xg_check_no='$Xg_check_no',
					Xh_check_si='$Xh_check_si',
					Xh_check_no='$Xh_check_no',
					Xi_check_si='$Xi_check_si',
					Xi_check_no='$Xi_check_no',
					XII_check_herr_electr='$XII_check_herr_electr',
					XII_check_herr_manual='$XII_check_herr_manual',
					XII_check_camion_grua='$XII_check_camion_grua',
					XII_check_andamio='$XII_check_andamio',
					XII_check_soldadura_arco='$XII_check_soldadura_arco',
					XII_check_compresor='$XII_check_compresor',
					XII_check_soldadura_oxi='$XII_check_soldadura_oxi',
					XIII_check_ruido='$XIII_check_ruido',
					XIII_check_caida='$XIII_check_caida',
					XIII_check_riego_electrico='$XIII_check_riego_electrico',
					XIII_check_contacto_quimico='$XIII_check_contacto_quimico',
					XIII_check_exposicion_gas='$XIII_check_exposicion_gas',
					XIII_check_estres='$XIII_check_estres',
					XIII_check_proyeccion='$XIII_check_proyeccion',
					XIII_check_exposicion_polvo='$XIII_check_exposicion_polvo',
					XIII_check_contacto_sup_caliente='$XIII_check_contacto_sup_caliente',
					XIV_check_conos='$XIV_check_conos',
					XIV_check_cinta='$XIV_check_cinta',
					XIV_check_barreras='$XIV_check_barreras',
					XIV_check_senalizacion='$XIV_check_senalizacion',
					codigo_area_solicitante='$codigo_area_solicitante',
					codigo_area_responsable='$codigo_area_responsable'
					WHERE num_permiso='$numero_permiso'";

			mssql_query($sql, $link);

			echo '[{"success":"true","numero_permiso":"'.$numero_permiso.'","mensaje":"ACTUALIZADO CORRECTAMENTE"}]';

	}

}













if($accion=='guardar_actualizar'){

$actividad=$_REQUEST['actividad']; 
$var_num_permiso=$_REQUEST['var_num_permiso']; 
$var_num_ot=$_REQUEST['var_num_ot']; 
$var_tipo_permiso=$_REQUEST['var_tipo_permiso']; 
$var_numero_trabajadores=$_REQUEST['var_numero_trabajadores']; 
$var_ejecutor_mantencion=$_REQUEST['var_ejecutor_mantencion']; 
$var_ejecutor_contratista=$_REQUEST['var_ejecutor_contratista']; 
$var_especialidad_mecanica=$_REQUEST['var_especialidad_mecanica']; 
$var_especialidad_soldadura=$_REQUEST['var_especialidad_soldadura']; 
$var_especialidad_electrica =$_REQUEST['var_especialidad_electrica']; 
$var_especialidad_instrumentacion=$_REQUEST['var_especialidad_instrumentacion']; 
$var_especialidad_produccion=$_REQUEST['var_especialidad_produccion']; 
$var_especialidad_servicio=$_REQUEST['var_especialidad_servicio']; 
$var_especialidad_otra =$_REQUEST['var_especialidad_otra']; 
$var_1A_check1=$_REQUEST['var_1A_check1']; 
$var_1A_check2=$_REQUEST['var_1A_check2']; 
$var_1A_check3=$_REQUEST['var_1A_check3']; 
$var_1A_check4=$_REQUEST['var_1A_check4']; 
$var_1A_check5=$_REQUEST['var_1A_check5']; 
$var_1A_check6=$_REQUEST['var_1A_check6']; 
$var_1A_check7=$_REQUEST['var_1A_check7']; 
$var_1A_check8=$_REQUEST['var_1A_check8']; 
$var_1A_check9 =$_REQUEST['var_1A_check9']; 
$var_2A_check1=$_REQUEST['var_2A_check1']; 
$var_2A_check2 =$_REQUEST['var_2A_check2']; 
$var_2A_check3=$_REQUEST['var_2A_check3']; 
$var_3A_check1=$_REQUEST['var_3A_check1']; 
$var_3A_check2=$_REQUEST['var_3A_check2']; 
$var_3A_check3 =$_REQUEST['var_3A_check3']; 
$var_3A_check4 =$_REQUEST['var_3A_check4']; 
$var_3A_check5 =$_REQUEST['var_3A_check5']; 
$var_3A_check6 =$_REQUEST['var_3A_check6']; 
$var_3A_check7=$_REQUEST['var_3A_check7']; 
$var_4A_check1 =$_REQUEST['var_4A_check1']; 
$var_4A_check2=$_REQUEST['var_4A_check2']; 
$var_4A_check3=$_REQUEST['var_4A_check3']; 
$var_4A_check4=$_REQUEST['var_4A_check4']; 
$var_4A_check5 =$_REQUEST['var_4A_check5']; 
$var_4A_check6=$_REQUEST['var_4A_check6']; 
$var_4A_check7=$_REQUEST['var_4A_check7']; 
$var_4A_check8=$_REQUEST['var_4A_check8']; 
$var_4A_check9 =$_REQUEST['var_4A_check9']; 
$var_5A_check1=$_REQUEST['var_5A_check1']; 
$var_5A_check2=$_REQUEST['var_5A_check2']; 
$var_5A_check3=$_REQUEST['var_5A_check3']; 
$var_5A_check4=$_REQUEST['var_5A_check4']; 
$var_5A_check5 =$_REQUEST['var_5A_check5']; 
$var_5B_check1 =$_REQUEST['var_5B_check1']; 
$var_5B_check2=$_REQUEST['var_5B_check2']; 
$var_5B_check3 =$_REQUEST['var_5B_check3']; 
$var_5C_check1 =$_REQUEST['var_5C_check1']; 
$var_5C_check2 =$_REQUEST['var_5C_check2']; 
$var_5C_check3=$_REQUEST['var_5C_check3']; 
$var_5C_check5=$_REQUEST['var_5C_check5']; 
$var_5D_check1 =$_REQUEST['var_5D_check1']; 
$var_5D_check2=$_REQUEST['var_5D_check2']; 
$var_5E_check1 =$_REQUEST['var_5E_check1']; 
$var_5E_check2=$_REQUEST['var_5E_check2']; 
$var_5E_check3=$_REQUEST['var_5E_check3']; 
$var_5F_check1=$_REQUEST['var_5F_check1']; 
$var_5F_check2=$_REQUEST['var_5F_check2']; 
$var_5F_check3=$_REQUEST['var_5F_check3']; 
$var_5F_check4=$_REQUEST['var_5F_check4']; 
$var_5F_check5=$_REQUEST['var_5F_check5']; 
$var_5G_check1=$_REQUEST['var_5G_check1']; 
$var_5G_check2=$_REQUEST['var_5G_check2']; 
$var_5G_check3 =$_REQUEST['var_5G_check3']; 
$var_5H_check1=$_REQUEST['var_5H_check1']; 
$var_5H_check2=$_REQUEST['var_5H_check2']; 
$var_5H_check3=$_REQUEST['var_5H_check3']; 
$var_6A_check1=$_REQUEST['var_6A_check1']; 
$var_6A_check2=$_REQUEST['var_6A_check2']; 
$var_6A_check3=$_REQUEST['var_6A_check3']; 
$var_7candado_check1=$_REQUEST['var_7candado_check1']; 
$var_7candado_check2=$_REQUEST['var_7candado_check2']; 
$var_7candado_check3 =$_REQUEST['var_7candado_check3']; 
$var_7ccm_check=$_REQUEST['var_7ccm_check']; 
$var_7tablero_check=$_REQUEST['var_7tablero_check']; 
$var_7ww_check=$_REQUEST['var_7ww_check']; 
$var_7otro_check =$_REQUEST['var_7otro_check']; 
$var_8A_check1=$_REQUEST['var_8A_check1']; 
$var_8A_check2=$_REQUEST['var_8A_check2']; 
$var_8A_check3 =$_REQUEST['var_8A_check3']; 
$var_8B_check1=$_REQUEST['var_8B_check1']; 
$var_8B_check2=$_REQUEST['var_8B_check2']; 
$var_8B_check3=$_REQUEST['var_8B_check3']; 
$var_8C_check1=$_REQUEST['var_8C_check1']; 
$var_8C_check2=$_REQUEST['var_8C_check2']; 
$var_8C_check3 =$_REQUEST['var_8C_check3']; 
$var_8D_check1=$_REQUEST['var_8D_check1']; 
$var_8D_check2=$_REQUEST['var_8D_check2']; 
$var_8D_check3=$_REQUEST['var_8D_check3']; 
$var_8E_check1=$_REQUEST['var_8E_check1']; 
$var_8E_check2=$_REQUEST['var_8E_check2']; 
$var_8E_check3 =$_REQUEST['var_8E_check3']; 
$var_8F_check1=$_REQUEST['var_8F_check1']; 
$var_8F_check2=$_REQUEST['var_8F_check2']; 
$var_8F_check3=$_REQUEST['var_8F_check3']; 
$var_8G_check1=$_REQUEST['var_8G_check1']; 
$var_8G_check2=$_REQUEST['var_8G_check2']; 
$var_8G_check3 =$_REQUEST['var_8G_check3']; 
$var_9A_check1 =$_REQUEST['var_9A_check1']; 
$var_9A_check2 =$_REQUEST['var_9A_check2']; 
$var_9A_check3=$_REQUEST['var_9A_check3']; 
$var_9B_check1 =$_REQUEST['var_9B_check1']; 
$var_9B_check2=$_REQUEST['var_9B_check2']; 
$var_9B_check3=$_REQUEST['var_9B_check3']; 
$var_9C_check1=$_REQUEST['var_9C_check1']; 
$var_9C_check2=$_REQUEST['var_9C_check2']; 
$var_9C_check3 =$_REQUEST['var_9C_check3']; 
$var_9D_check1=$_REQUEST['var_9D_check1']; 
$var_9D_check2=$_REQUEST['var_9D_check2']; 
$var_9D_check3=$_REQUEST['var_9D_check3']; 
$var_9E_check1=$_REQUEST['var_9E_check1']; 
$var_9E_check2=$_REQUEST['var_9E_check2']; 
$var_9E_check3=$_REQUEST['var_9E_check3']; 
$var_9F_check1=$_REQUEST['var_9F_check1']; 
$var_9F_check2=$_REQUEST['var_9F_check2']; 
$var_9F_check3=$_REQUEST['var_9F_check3']; 
$var_9G_check1 =$_REQUEST['var_9G_check1']; 
$var_9G_check2=$_REQUEST['var_9G_check2']; 
$var_9G_check3 =$_REQUEST['var_9G_check3']; 
$var_9H_check1=$_REQUEST['var_9H_check1']; 
$var_9H_check2=$_REQUEST['var_9H_check2']; 
$var_9H_check3=$_REQUEST['var_9H_check3']; 
$var_9I_check1=$_REQUEST['var_9I_check1']; 
$var_9I_check2=$_REQUEST['var_9I_check2']; 
$var_9I_check3 =$_REQUEST['var_9I_check3']; 
$var_9J_check1=$_REQUEST['var_9J_check1']; 
$var_9J_check2=$_REQUEST['var_9J_check2']; 
$var_9J_check3=$_REQUEST['var_9J_check3']; 
$var_10A_check1=$_REQUEST['var_10A_check1']; 
$var_10A_check2 =$_REQUEST['var_10A_check2']; 
$var_10A_check3=$_REQUEST['var_10A_check3']; 
$var_10B_check1=$_REQUEST['var_10B_check1']; 
$var_10B_check2=$_REQUEST['var_10B_check2']; 
$var_10B_check3 =$_REQUEST['var_10B_check3']; 
$var_10C_check1=$_REQUEST['var_10C_check1']; 
$var_10C_check2=$_REQUEST['var_10C_check2']; 
$var_10C_check3=$_REQUEST['var_10C_check3']; 
$var_10D_check1=$_REQUEST['var_10D_check1']; 
$var_10D_check2 =$_REQUEST['var_10D_check2']; 
$var_10D_check3 =$_REQUEST['var_10D_check3']; 
$var_10E_check1 =$_REQUEST['var_10E_check1']; 
$var_10E_check2 =$_REQUEST['var_10E_check2']; 
$var_10E_check3 =$_REQUEST['var_10E_check3']; 
$var_10F_check1=$_REQUEST['var_10F_check1']; 
$var_10F_check2=$_REQUEST['var_10F_check2']; 
$var_10F_check3=$_REQUEST['var_10F_check3']; 
$var_11medicionestrestermico_check=$_REQUEST['var_11medicionestrestermico_check']; 
$var_11vapor_check=$_REQUEST['var_11vapor_check']; 
$var_11aguacaliente_check=$_REQUEST['var_11aguacaliente_check']; 
$var_11condensados_check=$_REQUEST['var_11condensados_check']; 
$var_11aguafria_check=$_REQUEST['var_11aguafria_check']; 
$var_11aire_check=$_REQUEST['var_11aire_check']; 
$var_11sodacautica_check =$_REQUEST['var_11sodacautica_check']; 
$var_11amoniaco_check=$_REQUEST['var_11amoniaco_check']; 
$var_11acidosulfurico_check =$_REQUEST['var_11acidosulfurico_check']; 
$var_11actualizarquimicos_check=$_REQUEST['var_11actualizarquimicos_check']; 
$var_11temperaturaalta_check=$_REQUEST['var_11temperaturaalta_check']; 
$var_11temperaturabaja_check =$_REQUEST['var_11temperaturabaja_check']; 
$var_11lineapresurizada_check=$_REQUEST['var_11lineapresurizada_check']; 
$var_11lineaabierta_check =$_REQUEST['var_11lineaabierta_check']; 
$var_11lineaincomunicada_check=$_REQUEST['var_11lineaincomunicada_check']; 
$var_11lineapurgada_check=$_REQUEST['var_11lineapurgada_check']; 
$var_11bloqueovalvula_check=$_REQUEST['var_11bloqueovalvula_check']; 
$var_6A_check4=$_REQUEST['var_6A_check4']; 
$var_6A_otros=$_REQUEST['var_6A_otros']; 
$var_prevencion_si=$_REQUEST['var_prevencion_si']; 
$var_prevencion_no=$_REQUEST['var_prevencion_no']; 
$var_fecha_ini_ejecucion=$_REQUEST['var_fecha_ini_ejecucion']; 
$var_fecha_termino_ejecucion=$_REQUEST['var_fecha_termino_ejecucion']; 
$var_hora_ini_ejecucion =$_REQUEST['var_hora_ini_ejecucion']; 
$var_hora_termino_ejecucion=$_REQUEST['var_hora_termino_ejecucion']; 
$var_1A_otros=$_REQUEST['var_1A_otros']; 
$var_3A_otros =$_REQUEST['var_3A_otros']; 
$var_4A_otros=$_REQUEST['var_4A_otros']; 
$var_5C_tipo_filtro=$_REQUEST['var_5C_tipo_filtro']; 
$var_5F_otros=$_REQUEST['var_5F_otros']; 
$var_5G_otros=$_REQUEST['var_5G_otros']; 
$var_7tag_1 =$_REQUEST['var_7tag_1']; 
$var_7tag_2=$_REQUEST['var_7tag_2']; 
$var_7tag_3 =$_REQUEST['var_7tag_3']; 
$var_7tag_4=$_REQUEST['var_7tag_4']; 
$var_7tag_5 =$_REQUEST['var_7tag_5']; 
$var_7candado_num1=$_REQUEST['var_7candado_num1']; 
$var_7candado_num2=$_REQUEST['var_7candado_num2']; 
$var_7candado_num3=$_REQUEST['var_7candado_num3']; 
$var_7candado_num4 =$_REQUEST['var_7candado_num4']; 
$var_7candado_num5=$_REQUEST['var_7candado_num5']; 
$var_7responsable_bloqueo=$_REQUEST['var_7responsable_bloqueo']; 
$var_8I_otros=$_REQUEST['var_8I_otros']; 
$var_10B_T=$_REQUEST['var_10B_T']; 
$var_10B_C=$_REQUEST['var_10B_C']; 
$var_10B_O2=$_REQUEST['var_10B_O2']; 
$var_10B_CO=$_REQUEST['var_10B_CO']; 
$var_10B_LEL=$_REQUEST['var_10B_LEL']; 
$var_11bloqueovalvula_num=$_REQUEST['var_11bloqueovalvula_num']; 
$var_area_autorizada=$_REQUEST['var_area_autorizada']; 
$var_trabajo_a_realizar=$_REQUEST['var_trabajo_a_realizar']; 
$var_empresa_contratista=$_REQUEST['var_empresa_contratista']; 



if($var_tipo_permiso=='PERMISO DIARIO DE TRABAJO'){
	$var_fecha_termino_ejecucion=$var_fecha_ini_ejecucion;
}

	if($actividad=='nuevo'){


	$sql_correlativo="SELECT max(cast([num_permiso] as float))+1 AS numero_permiso 
	FROM [seguimiento].[dbo].[permiso_trabajo]";
	$rES = mssql_query($sql_correlativo, $link);
	if($ROW2 =  mssql_fetch_array($rES))
	 {

	    $numero_permiso=$ROW2['numero_permiso'];
	

		$sql="INSERT INTO [seguimiento].[dbo].[permiso_trabajo]
		([num_permiso],
		[num_ot],
		[tipo_permiso],
		[numero_trabajadores],
		[ejecutor_mantencion],
		[ejecutor_contratista],
		[especialidad_mecanica],
		[especialidad_soldadura],
		[especialidad_electrica ],
		[especialidad_instrumentacion],
		[especialidad_produccion],
		[especialidad_servicio],
		[especialidad_otra ],
		[1A_check1],
		[1A_check2],
		[1A_check3],
		[1A_check4],
		[1A_check5],
		[1A_check6],
		[1A_check7],
		[1A_check8],
		[1A_check9],
		[2A_check1],
		[2A_check2],
		[2A_check3],
		[3A_check1],
		[3A_check2],
		[3A_check3],
		[3A_check4],
		[3A_check5],
		[3A_check6],
		[3A_check7],
		[4A_check1],
		[4A_check2],
		[4A_check3],
		[4A_check4],
		[4A_check5],
		[4A_check6],
		[4A_check7],
		[4A_check8],
		[4A_check9],
		[5A_check1],
		[5A_check2],
		[5A_check3],
		[5A_check4],
		[5A_check5],
		[5B_check1],
		[5B_check2],
		[5B_check3],
		[5C_check1],
		[5C_check2],
		[5C_check3],
		[5C_check5],
		[5D_check1],
		[5D_check2],
		[5E_check1],
		[5E_check2],
		[5E_check3],
		[5F_check1],
		[5F_check2],
		[5F_check3],
		[5F_check4],
		[5F_check5],
		[5G_check1],
		[5G_check2],
		[5G_check3],
		[5H_check1],
		[5H_check2],
		[5H_check3],
		[6A_check1],
		[6A_check2],
		[6A_check3],
		[7candado_check1],
		[7candado_check2],
		[7candado_check3],
		[7ccm_check],
		[7tablero_check],
		[7ww_check],
		[7otro_check],
		[8A_check1],
		[8A_check2],
		[8A_check3],
		[8B_check1],
		[8B_check2],
		[8B_check3],
		[8C_check1],
		[8C_check2],
		[8C_check3],
		[8D_check1],
		[8D_check2],
		[8D_check3],
		[8E_check1],
		[8E_check2],
		[8E_check3],
		[8F_check1],
		[8F_check2],
		[8F_check3],
		[8G_check1],
		[8G_check2],
		[8G_check3],
		[9A_check1],
		[9A_check2],
		[9A_check3],
		[9B_check1],
		[9B_check2],
		[9B_check3],
		[9C_check1],
		[9C_check2],
		[9C_check3],
		[9D_check1],
		[9D_check2],
		[9D_check3],
		[9E_check1],
		[9E_check2],
		[9E_check3],
		[9F_check1],
		[9F_check2],
		[9F_check3],
		[9G_check1],
		[9G_check2],
		[9G_check3],
		[9H_check1],
		[9H_check2],
		[9H_check3],
		[9I_check1],
		[9I_check2],
		[9I_check3],
		[9J_check1],
		[9J_check2],
		[9J_check3],
		[10A_check1],
		[10A_check2],
		[10A_check3],
		[10B_check1],
		[10B_check2],
		[10B_check3],
		[10C_check1],
		[10C_check2],
		[10C_check3],
		[10D_check1],
		[10D_check2],
		[10D_check3],
		[10E_check1],
		[10E_check2],
		[10E_check3],
		[10F_check1],
		[10F_check2],
		[10F_check3],
		[11medicionestrestermico_check],
		[11vapor_check],
		[11aguacaliente_check],
		[11condensados_check],
		[11aguafria_check],
		[11aire_check],
		[11sodacautica_check],
		[11amoniaco_check],
		[11acidosulfurico_check],
		[11actualizarquimicos_check],
		[11temperaturaalta_check],
		[11temperaturabaja_check],
		[11lineapresurizada_check],
		[11lineaabierta_check],
		[11lineaincomunicada_check],
		[11lineapurgada_check],
		[11bloqueovalvula_check],
		[6A_check4],
		[6A_otros],
		[prevencion_si],
		[prevencion_no],
		[fecha_ini_ejecucion],
		[fecha_termino_ejecucion],
		[hora_ini_ejecucion],
		[hora_termino_ejecucion],
		[1A_otros],
		[3A_otros],
		[4A_otros],
		[5C_tipo_filtro],
		[5F_otros],
		[5G_otros],
		[7tag_1],
		[7tag_2],
		[7tag_3],
		[7tag_4],
		[7tag_5],
		[7candado_num1],
		[7candado_num2],
		[7candado_num3],
		[7candado_num4],
		[7candado_num5],
		[7responsable_bloqueo],
		[8I_otros],
		[10B_T],
		[10B_C],
		[10B_O2],
		[10B_CO],
		[10B_LEL],
		[11bloqueovalvula_num],
		[area_autorizada],
		[trabajo_a_realizar],
		[empresa_contratista],
		[nick_creador],
		[fecha_creador],
		[cod_area])
		VALUES
		($numero_permiso,
		'$var_num_ot',
		'$var_tipo_permiso',
		'$var_numero_trabajadores',
		'$var_ejecutor_mantencion',
		'$var_ejecutor_contratista',
		'$var_especialidad_mecanica',
		'$var_especialidad_soldadura',
		'$var_especialidad_electrica',
		'$var_especialidad_instrumentacion',
		'$var_especialidad_produccion',
		'$var_especialidad_servicio',
		'$var_especialidad_otra',
		'$var_1A_check1',
		'$var_1A_check2',
		'$var_1A_check3',
		'$var_1A_check4',
		'$var_1A_check5',
		'$var_1A_check6',
		'$var_1A_check7',
		'$var_1A_check8',
		'$var_1A_check9',
		'$var_2A_check1',
		'$var_2A_check2',
		'$var_2A_check3',
		'$var_3A_check1',
		'$var_3A_check2',
		'$var_3A_check3',
		'$var_3A_check4',
		'$var_3A_check5',
		'$var_3A_check6',
		'$var_3A_check7',
		'$var_4A_check1',
		'$var_4A_check2',
		'$var_4A_check3',
		'$var_4A_check4',
		'$var_4A_check5',
		'$var_4A_check6',
		'$var_4A_check7',
		'$var_4A_check8',
		'$var_4A_check9',
		'$var_5A_check1',
		'$var_5A_check2',
		'$var_5A_check3',
		'$var_5A_check4',
		'$var_5A_check5',
		'$var_5B_check1',
		'$var_5B_check2',
		'$var_5B_check3',
		'$var_5C_check1',
		'$var_5C_check2',
		'$var_5C_check3',
		'$var_5C_check5',
		'$var_5D_check1',
		'$var_5D_check2',
		'$var_5E_check1',
		'$var_5E_check2',
		'$var_5E_check3',
		'$var_5F_check1',
		'$var_5F_check2',
		'$var_5F_check3',
		'$var_5F_check4',
		'$var_5F_check5',
		'$var_5G_check1',
		'$var_5G_check2',
		'$var_5G_check3',
		'$var_5H_check1',
		'$var_5H_check2',
		'$var_5H_check3',
		'$var_6A_check1',
		'$var_6A_check2',
		'$var_6A_check3',
		'$var_7candado_check1',
		'$var_7candado_check2',
		'$var_7candado_check3',
		'$var_7ccm_check',
		'$var_7tablero_check',
		'$var_7ww_check',
		'$var_7otro_check',
		'$var_8A_check1',
		'$var_8A_check2',
		'$var_8A_check3',
		'$var_8B_check1',
		'$var_8B_check2',
		'$var_8B_check3',
		'$var_8C_check1',
		'$var_8C_check2',
		'$var_8C_check3',
		'$var_8D_check1',
		'$var_8D_check2',
		'$var_8D_check3',
		'$var_8E_check1',
		'$var_8E_check2',
		'$var_8E_check3',
		'$var_8F_check1',
		'$var_8F_check2',
		'$var_8F_check3',
		'$var_8G_check1',
		'$var_8G_check2',
		'$var_8G_check3',
		'$var_9A_check1',
		'$var_9A_check2',
		'$var_9A_check3',
		'$var_9B_check1',
		'$var_9B_check2',
		'$var_9B_check3',
		'$var_9C_check1',
		'$var_9C_check2',
		'$var_9C_check3',
		'$var_9D_check1',
		'$var_9D_check2',
		'$var_9D_check3',
		'$var_9E_check1',
		'$var_9E_check2',
		'$var_9E_check3',
		'$var_9F_check1',
		'$var_9F_check2',
		'$var_9F_check3',
		'$var_9G_check1',
		'$var_9G_check2',
		'$var_9G_check3',
		'$var_9H_check1',
		'$var_9H_check2',
		'$var_9H_check3',
		'$var_9I_check1',
		'$var_9I_check2',
		'$var_9I_check3',
		'$var_9J_check1',
		'$var_9J_check2',
		'$var_9J_check3',
		'$var_10A_check1',
		'$var_10A_check2',
		'$var_10A_check3',
		'$var_10B_check1',
		'$var_10B_check2',
		'$var_10B_check3',
		'$var_10C_check1',
		'$var_10C_check2',
		'$var_10C_check3',
		'$var_10D_check1',
		'$var_10D_check2',
		'$var_10D_check3',
		'$var_10E_check1',
		'$var_10E_check2',
		'$var_10E_check3',
		'$var_10F_check1',
		'$var_10F_check2',
		'$var_10F_check3',
		'$var_11medicionestrestermico_check',
		'$var_11vapor_check',
		'$var_11aguacaliente_check',
		'$var_11condensados_check',
		'$var_11aguafria_check',
		'$var_11aire_check',
		'$var_11sodacautica_check ',
		'$var_11amoniaco_check',
		'$var_11acidosulfurico_check ',
		'$var_11actualizarquimicos_check',
		'$var_11temperaturaalta_check',
		'$var_11temperaturabaja_check',
		'$var_11lineapresurizada_check',
		'$var_11lineaabierta_check',
		'$var_11lineaincomunicada_check',
		'$var_11lineapurgada_check',
		'$var_11bloqueovalvula_check',
		'$var_6A_check4',
		'$var_6A_otros',
		'$var_prevencion_si',
		'$var_prevencion_no',
		'$var_fecha_ini_ejecucion',
		'$var_fecha_termino_ejecucion',
		'$var_hora_ini_ejecucion',
		'$var_hora_termino_ejecucion',
		'$var_1A_otros',
		'$var_3A_otros',
		'$var_4A_otros',
		'$var_5C_tipo_filtro',
		'$var_5F_otros',
		'$var_5G_otros',
		'$var_7tag_1',
		'$var_7tag_2',
		'$var_7tag_3',
		'$var_7tag_4',
		'$var_7tag_5',
		'$var_7candado_num1',
		'$var_7candado_num2',
		'$var_7candado_num3',
		'$var_7candado_num4',
		'$var_7candado_num5',
		'$var_7responsable_bloqueo',
		'$var_8I_otros',
		'$var_10B_T',
		'$var_10B_C',
		'$var_10B_O2',
		'$var_10B_CO',
		'$var_10B_LEL',
		'$var_11bloqueovalvula_num',
		'$var_area_autorizada',
		'$var_trabajo_a_realizar',
		'$var_empresa_contratista',
		'".$_SESSION['nick']."',
		getdate(),
		'".$_SESSION['cod_area']."')";
		mssql_query($sql, $link);



		echo '[{"success":"true","numero_permiso":"'.$numero_permiso.'","mensaje":"NUEVO PERMISO GUARDADO CORRECTAMENTE"}]';

	}

		}else{


		$sql="UPDATE [seguimiento].[dbo].[permiso_trabajo]
		SET [num_ot]='$var_num_ot'
		,[tipo_permiso]='$var_tipo_permiso'
		,[numero_trabajadores]='$var_numero_trabajadores'
		,[ejecutor_mantencion]='$var_ejecutor_mantencion'
		,[ejecutor_contratista]='$var_ejecutor_contratista'
		,[especialidad_mecanica]='$var_especialidad_mecanica'
		,[especialidad_soldadura]='$var_especialidad_soldadura'
		,[especialidad_electrica]='$var_especialidad_electrica'
		,[especialidad_instrumentacion]='$var_especialidad_instrumentacion'
		,[especialidad_produccion]='$var_especialidad_produccion'
		,[especialidad_servicio]='$var_especialidad_servicio'
		,[especialidad_otra]='$var_especialidad_otra'
		,[1A_check1]='$var_1A_check1'
		,[1A_check2]='$var_1A_check2'
		,[1A_check3]='$var_1A_check3'
		,[1A_check4]='$var_1A_check4'
		,[1A_check5]='$var_1A_check5'
		,[1A_check6]='$var_1A_check6'
		,[1A_check7]='$var_1A_check7'
		,[1A_check8]='$var_1A_check8'
		,[1A_check9]='$var_1A_check9'
		,[2A_check1]='$var_2A_check1'
		,[2A_check2]='$var_2A_check2'
		,[2A_check3]='$var_2A_check3'
		,[3A_check1]='$var_3A_check1'
		,[3A_check2]='$var_3A_check2'
		,[3A_check3]='$var_3A_check3'
		,[3A_check4]='$var_3A_check4'
		,[3A_check5]='$var_3A_check5'
		,[3A_check6]='$var_3A_check6'
		,[3A_check7]='$var_3A_check7'
		,[4A_check1]='$var_4A_check1'
		,[4A_check2]='$var_4A_check2'
		,[4A_check3]='$var_4A_check3'
		,[4A_check4]='$var_4A_check4'
		,[4A_check5]='$var_4A_check5'
		,[4A_check6]='$var_4A_check6'
		,[4A_check7]='$var_4A_check7'
		,[4A_check8]='$var_4A_check8'
		,[4A_check9]='$var_4A_check9'
		,[5A_check1]='$var_5A_check1'
		,[5A_check2]='$var_5A_check2'
		,[5A_check3]='$var_5A_check3'
		,[5A_check4]='$var_5A_check4'
		,[5A_check5]='$var_5A_check5'
		,[5B_check1]='$var_5B_check1'
		,[5B_check2]='$var_5B_check2'
		,[5B_check3]='$var_5B_check3'
		,[5C_check1]='$var_5C_check1'
		,[5C_check2]='$var_5C_check2'
		,[5C_check3]='$var_5C_check3'
		,[5C_check5]='$var_5C_check5'
		,[5D_check1]='$var_5D_check1'
		,[5D_check2]='$var_5D_check2'
		,[5E_check1]='$var_5E_check1'
		,[5E_check2]='$var_5E_check2'
		,[5E_check3]='$var_5E_check3'
		,[5F_check1]='$var_5F_check1'
		,[5F_check2]='$var_5F_check2'
		,[5F_check3]='$var_5F_check3'
		,[5F_check4]='$var_5F_check4'
		,[5F_check5]='$var_5F_check5'
		,[5G_check1]='$var_5G_check1'
		,[5G_check2]='$var_5G_check2'
		,[5G_check3]='$var_5G_check3'
		,[5H_check1]='$var_5H_check1'
		,[5H_check2]='$var_5H_check2'
		,[5H_check3]='$var_5H_check3'
		,[6A_check1]='$var_6A_check1'
		,[6A_check2]='$var_6A_check2'
		,[6A_check3]='$var_6A_check3'
		,[7candado_check1]='$var_7candado_check1'
		,[7candado_check2]='$var_7candado_check2'
		,[7candado_check3]='$var_7candado_check3'
		,[7ccm_check]='$var_7ccm_check'
		,[7tablero_check]='$var_7tablero_check'
		,[7ww_check]='$var_7ww_check'
		,[7otro_check]='$var_7otro_check'
		,[8A_check1]='$var_8A_check1'
		,[8A_check2]='$var_8A_check2'
		,[8A_check3]='$var_8A_check3'
		,[8B_check1]='$var_8B_check1'
		,[8B_check2]='$var_8B_check2'
		,[8B_check3]='$var_8B_check3'
		,[8C_check1]='$var_8C_check1'
		,[8C_check2]='$var_8C_check2'
		,[8C_check3]='$var_8C_check3'
		,[8D_check1]='$var_8D_check1'
		,[8D_check2]='$var_8D_check2'
		,[8D_check3]='$var_8D_check3'
		,[8E_check1]='$var_8E_check1'
		,[8E_check2]='$var_8E_check2'
		,[8E_check3]='$var_8E_check3'
		,[8F_check1]='$var_8F_check1'
		,[8F_check2]='$var_8F_check2'
		,[8F_check3]='$var_8F_check3'
		,[8G_check1]='$var_8G_check1'
		,[8G_check2]='$var_8G_check2'
		,[8G_check3]='$var_8G_check3'
		,[9A_check1]='$var_9A_check1'
		,[9A_check2]='$var_9A_check2'
		,[9A_check3]='$var_9A_check3'
		,[9B_check1]='$var_9B_check1'
		,[9B_check2]='$var_9B_check2'
		,[9B_check3]='$var_9B_check3'
		,[9C_check1]='$var_9C_check1'
		,[9C_check2]='$var_9C_check2'
		,[9C_check3]='$var_9C_check3'
		,[9D_check1]='$var_9D_check1'
		,[9D_check2]='$var_9D_check2'
		,[9D_check3]='$var_9D_check3'
		,[9E_check1]='$var_9E_check1'
		,[9E_check2]='$var_9E_check2'
		,[9E_check3]='$var_9E_check3'
		,[9F_check1]='$var_9F_check1'
		,[9F_check2]='$var_9F_check2'
		,[9F_check3]='$var_9F_check3'
		,[9G_check1]='$var_9G_check1'
		,[9G_check2]='$var_9G_check2'
		,[9G_check3]='$var_9G_check3'
		,[9H_check1]='$var_9H_check1'
		,[9H_check2]='$var_9H_check2'
		,[9H_check3]='$var_9H_check3'
		,[9I_check1]='$var_9I_check1'
		,[9I_check2]='$var_9I_check2'
		,[9I_check3]='$var_9I_check3'
		,[9J_check1]='$var_9J_check1'
		,[9J_check2]='$var_9J_check2'
		,[9J_check3]='$var_9J_check3'
		,[10A_check1]='$var_10A_check1'
		,[10A_check2]='$var_10A_check2'
		,[10A_check3]='$var_10A_check3'
		,[10B_check1]='$var_10B_check1'
		,[10B_check2]='$var_10B_check2'
		,[10B_check3]='$var_10B_check3'
		,[10C_check1]='$var_10C_check1'
		,[10C_check2]='$var_10C_check2'
		,[10C_check3]='$var_10C_check3'
		,[10D_check1]='$var_10D_check1'
		,[10D_check2]='$var_10D_check2'
		,[10D_check3]='$var_10D_check3'
		,[10E_check1]='$var_10E_check1'
		,[10E_check2]='$var_10E_check2'
		,[10E_check3]='$var_10E_check3'
		,[10F_check1]='$var_10F_check1'
		,[10F_check2]='$var_10F_check2'
		,[10F_check3]='$var_10F_check3'
		,[11medicionestrestermico_check]='$var_11medicionestrestermico_check'
		,[11vapor_check]='$var_11vapor_check'
		,[11aguacaliente_check]='$var_11aguacaliente_check'
		,[11condensados_check]='$var_11condensados_check'
		,[11aguafria_check]='$var_11aguafria_check'
		,[11aire_check]='$var_11aire_check'
		,[11sodacautica_check]='$var_11sodacautica_check'
		,[11amoniaco_check]='$var_11amoniaco_check'
		,[11acidosulfurico_check]='$var_11acidosulfurico_check'
		,[11actualizarquimicos_check]='$var_11actualizarquimicos_check'
		,[11temperaturaalta_check]='$var_11temperaturaalta_check'
		,[11temperaturabaja_check]='$var_11temperaturabaja_check'
		,[11lineapresurizada_check]='$var_11lineapresurizada_check'
		,[11lineaabierta_check]='$var_11lineaabierta_check'
		,[11lineaincomunicada_check]='$var_11lineaincomunicada_check'
		,[11lineapurgada_check]='$var_11lineapurgada_check'
		,[11bloqueovalvula_check]='$var_11bloqueovalvula_check'
		,[6A_check4]='$var_6A_check4'
		,[6A_otros]='$var_6A_otros,'
		,[prevencion_si]='$var_prevencion_si'
		,[prevencion_no]='$var_prevencion_no'
		,[fecha_ini_ejecucion]='$var_fecha_ini_ejecucion'
		,[fecha_termino_ejecucion]='$var_fecha_termino_ejecucion'
		,[hora_ini_ejecucion]='$var_hora_ini_ejecucion'
		,[hora_termino_ejecucion]='$var_hora_termino_ejecucion'
		,[1A_otros]='$var_1A_otros'
		,[3A_otros]='$var_3A_otros'
		,[4A_otros]='$var_4A_otros'
		,[5C_tipo_filtro]='$var_5C_tipo_filtro'
		,[5F_otros]='$var_5F_otros'
		,[5G_otros]='$var_5G_otros'
		,[7tag_1]='$var_7tag_1'
		,[7tag_2]='$var_7tag_2'
		,[7tag_3]='$var_7tag_3'
		,[7tag_4]='$var_7tag_4'
		,[7tag_5]='$var_7tag_5'
		,[7candado_num1]='$var_7candado_num1'
		,[7candado_num2]='$var_7candado_num2'
		,[7candado_num3]='$var_7candado_num3'
		,[7candado_num4]='$var_7candado_num4'
		,[7candado_num5]='$var_7candado_num5'
		,[7responsable_bloqueo]='$var_7responsable_bloqueo'
		,[8I_otros]='$var_8I_otros'
		,[10B_T]='$var_10B_T'
		,[10B_C]='$var_10B_C'
		,[10B_O2]='$var_10B_O2'
		,[10B_CO]='$var_10B_CO'
		,[10B_LEL]='$var_10B_LEL'
		,[11bloqueovalvula_num]='$var_11bloqueovalvula_num'
		,[area_autorizada]='$var_area_autorizada'
		,[trabajo_a_realizar]='$var_trabajo_a_realizar'
		,[empresa_contratista]='$var_empresa_contratista'
		WHERE num_permiso='$var_num_permiso'";

mssql_query($sql, $link);

echo '[{"success":"true","numero_permiso":"'.$var_num_permiso.'","mensaje":"ACTUALIZADO CORRECTAMENTE"}]';

}


}


if($accion=='ver_permiso_nuevo'){

	$numero_permiso	=$_REQUEST['numero_permiso'];
	$id_permiso	=$_REQUEST['id_permiso'];


	$sql="SELECT id_permiso
			      ,num_permiso
			      ,area_solicitante
			      ,num_ot
			      ,tipo_permiso
			      ,numero_trabajadores
			      ,cast(fecha_ini_ejecucion as date) as fecha_ini_ejecucion
			      ,cast(fecha_termino_ejecucion as date) as fecha_termino_ejecucion
			      ,hora_ini_ejecucion
			      ,hora_termino_ejecucion
			      ,empresa_contratista
			      ,responsable_ejecucion
			      ,area_responsable
			      ,responsable_area
			      ,I_check_aislamiento_bloqueo
			      ,II_check_trabajo_altura
			      ,III_check_sumunistro_aire
			      ,IV_check_operacion_levante
			      ,V_check_cespacio_confinado
			      ,VI_check_excavacion
			      ,VII_check_equipos_electronicos
			      ,VIII_check_atmosfera_peligrosa
			      ,IX_check_trabajos_caliente
			      ,X_check_lavado_alta_presion
			      ,I_tag_uno
			      ,I_tag_dos
			      ,I_tag_tres
			      ,I_tag_cuatro
			      ,I_tag_cinco
			      ,I_check_candado_si
			      ,I_check_candado_no
			      ,I_check_ccm
			      ,I_check_tablero_electrico
			      ,I_check_ww
			      ,I_check_otro_subprincipio
			      ,I_candado_uno
			      ,I_candado_dos
			      ,I_candado_tres
			      ,I_candado_cuatro
			      ,I_candado_cinco
			      ,IIa_check_si
			      ,IIa_check_no
			      ,IIb_check_si
			      ,IIb_check_no
			      ,IIc_check_si
			      ,IIc_check_no
			      ,IId_check_si
			      ,IId_check_no
			      ,IIe_check_si
			      ,IIe_check_no
			      ,IIf_check_si
			      ,IIf_check_no
			      ,IIg_check_si
			      ,IIg_check_no
			      ,IIh_check_si
			      ,IIh_check_no
			      ,IIi_check_si
			      ,IIi_check_no
			      ,IIj_check_si
			      ,IIj_check_no
			      ,IIIa_check_si
			      ,IIIa_check_no
			      ,IIIb_check_si
			      ,IIIb_check_no
			      ,IIIc_check_si
			      ,IIIc_check_no
			      ,IIId_check_si
			      ,IIId_check_no
			      ,IIIe_check_si
			      ,IIIe_check_no
			      ,IIIf_check_si
			      ,IIIf_check_no
			      ,IIIg_check_si
			      ,IIIg_check_no
			      ,IIIh_check_si
			      ,IIIh_check_no
			      ,IIIi_check_si
			      ,IIIi_check_no
			      ,IVa_check_si
			      ,IVa_check_no
			      ,IVb_check_si
			      ,IVb_check_no
			      ,IVc_check_si
			      ,IVc_check_no
			      ,IVd_check_si
			      ,IVd_check_no
			      ,IVe_check_si
			      ,IVe_check_no
			      ,IVf_check_si
			      ,IVf_check_no
			      ,IVg_check_si
			      ,IVg_check_no
			      ,IVh_check_si
			      ,IVh_check_no
			      ,IVi_check_si
			      ,IVi_check_no
			      ,Va_check_si
			      ,Va_check_no
			      ,Vb_check_si
			      ,Vb_check_no
			      ,Vc_check_si
			      ,Vc_check_no
			      ,Vd_check_si
			      ,Vd_check_no
			      ,Ve_check_si
			      ,Ve_check_no
			      ,Vf_check_si
			      ,Vf_check_no
			      ,Vg_check_si
			      ,Vg_check_no
			      ,Vh_check_si
			      ,Vh_check_no
			      ,Vi_check_si
			      ,Vi_check_no
			      ,VIa_check_si
			      ,VIa_check_no
			      ,VIb_check_si
			      ,VIb_check_no
			      ,VIc_check_si
			      ,VIc_check_no
			      ,VId_check_si
			      ,VId_check_no
			      ,VIe_check_si
			      ,VIe_check_no
			      ,VIf_check_si
			      ,VIf_check_no
			      ,VIg_check_si
			      ,VIg_check_no
			      ,VIh_check_si
			      ,VIh_check_no
			      ,VIi_check_si
			      ,VIi_check_no
			      ,VIj_check_si
			      ,VIj_check_no
			      ,VIIa_check_si
			      ,VIIa_check_no
			      ,VIIb_check_si
			      ,VIIb_check_no
			      ,VIIc_check_si
			      ,VIIc_check_no
			      ,VIId_check_si
			      ,VIId_check_no
			      ,VIIe_check_si
			      ,VIIe_check_no
			      ,VIIf_check_si
			      ,VIIf_check_no
			      ,VIIg_check_si
			      ,VIIg_check_no
			      ,VIIh_check_si
			      ,VIIh_check_no
			      ,VIIi_check_si
			      ,VIIi_check_no
			      ,VIIIa_check_si
			      ,VIIIa_check_no
			      ,VIIIb_check_si
			      ,VIIIb_check_no
			      ,VIIIc_check_si
			      ,VIIIc_check_no
			      ,VIIId_check_si
			      ,VIIId_check_no
			      ,VIIIe_check_si
			      ,VIIIe_check_no
			      ,VIIIf_check_si
			      ,VIIIf_check_no
			      ,VIIIg_check_si
			      ,VIIIg_check_no
			      ,VIIIh_check_si
			      ,VIIIh_check_no
			      ,IXa_check_si
			      ,IXa_check_no
			      ,IXb_check_si
			      ,IXb_check_no
			      ,IXc_check_si
			      ,IXc_check_no
			      ,IXd_check_si
			      ,IXd_check_no
			      ,IXe_check_si
			      ,IXe_check_no
			      ,IXf_check_si
			      ,IXf_check_no
			      ,IXg_check_si
			      ,IXg_check_no
			      ,IXh_check_si
			      ,IXh_check_no
			      ,IXi_check_si
			      ,IXi_check_no
			      ,Xa_check_si
			      ,Xa_check_no
			      ,Xb_check_si
			      ,Xb_check_no
			      ,Xc_check_si
			      ,Xc_check_no
			      ,Xd_check_si
			      ,Xd_check_no
			      ,Xe_check_si
			      ,Xe_check_no
			      ,Xf_check_si
			      ,Xf_check_no
			      ,Xg_check_si
			      ,Xg_check_no
			      ,Xh_check_si
			      ,Xh_check_no
			      ,Xi_check_si
			      ,Xi_check_no
			      ,XII_check_herr_electr
			      ,XII_check_herr_manual
			      ,XII_check_camion_grua
			      ,XII_check_andamio
			      ,XII_check_soldadura_arco
			      ,XII_check_compresor
			      ,XII_check_soldadura_oxi
			      ,XII_check_otros
			      ,XII_otros
			      ,XIII_check_ruido
			      ,XIII_check_caida
			      ,XIII_check_riego_electrico
			      ,XIII_check_contacto_quimico
			      ,XIII_check_exposicion_gas
			      ,XIII_check_estres
			      ,XIII_check_proyeccion
			      ,XIII_check_exposicion_polvo
			      ,XIII_check_contacto_sup_caliente
			      ,XIII_check_otros
			      ,XIII_otros
			      ,XIV_check_conos
			      ,XIV_check_cinta
			      ,XIV_check_barreras
			      ,XIV_check_senalizacion
			      ,nick_creador
			      ,fecha_creador
			      ,nick_modifica
			      ,fecha_modifica
			      ,area_autorizada
			      ,trabajo_a_realizar
			      ,detalle_tabajo_critico
			      ,codigo_area_solicitante
			      ,codigo_area_responsable
	FROM seguimiento.dbo.permiso_trabajo_nuevo
		  WHERE num_permiso='$numero_permiso' AND id_permiso='$id_permiso'";
		  $respuesta = CreaJSon($sql,$link,1);

		$arreglo='['.$respuesta.']';

		echo $arreglo; 


}




if($accion=='ver_permiso'){

	$numero_permiso	=$_REQUEST['numero_permiso'];
	$id_permiso	=$_REQUEST['id_permiso'];


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
		  WHERE num_permiso='$numero_permiso' AND id_permiso='$id_permiso'";
		  $respuesta = CreaJSon($sql,$link,1);

		$arreglo='['.$respuesta.']';

		echo $arreglo; 

   			
}


if($accion=='lista_de_permisos_nuevos'){

	$where='';

	if($_SESSION['cod_area']=='6' || $_SESSION['cod_area']=='1028' ){
	  
	}else{
		$where=' WHERE [cod_area]='.$_SESSION['cod_area'];
	}


		$sql ="SELECT id_permiso
			,num_permiso
		   ,num_ot
			,case when tipo_permiso='PERMISO DIARIO DE TRABAJO' then 'DIARIO' ELSE 'SEMANAL' END AS tipo_permiso
			,numero_trabajadores
			,responsable_ejecucion as ejecutor_mantencion
			,case when year(fecha_ini_ejecucion)=1900 THEN null else CONVERT(varchar,fecha_ini_ejecucion,105)  END AS fecha_ini_ejecucion
			,case when year(fecha_termino_ejecucion)=1900 THEN null else CONVERT(varchar,fecha_termino_ejecucion,105) END AS fecha_termino_ejecucion
		    ,CASE WHEN CAST(fecha_termino_ejecucion AS DATE)>=CAST(GETDATE() AS DATE) THEN 'ABIERTO' ELSE 'CERRADO' END AS estado
			,area_autorizada
			,nick_creador
			,empresa_contratista
			,trabajo_a_realizar   
			FROM seguimiento.dbo.permiso_trabajo_nuevo
			order by id_permiso DESC";
		    $respuesta = CreaJSon($sql,$link,1);


		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 

   			
}




if($accion=='lista_de_permisos'){

	$where='';

	if($_SESSION['cod_area']=='6' || $_SESSION['cod_area']=='1028' ){
	  
	}else{
		$where=' WHERE [cod_area]='.$_SESSION['cod_area'];
	}


		$sql ="SELECT [id_permiso]
		      ,[num_permiso]
		      ,[num_ot]
		      ,case when [tipo_permiso]='PERMISO DIARIO DE TRABAJO' then 'DIARIO' ELSE 'SEMANAL' END AS tipo_permiso
		      ,[numero_trabajadores]
		      ,[ejecutor_mantencion]
		      ,[ejecutor_produccion]
		      ,[ejecutor_contratista]
		      ,[rut_empresa]
		      ,case when year(fecha_ini_ejecucion)=1900 THEN null else CONVERT(varchar,fecha_ini_ejecucion,105)  END AS fecha_ini_ejecucion
			  ,case when year(fecha_termino_ejecucion)=1900 THEN null else CONVERT(varchar,fecha_termino_ejecucion,105) END AS fecha_termino_ejecucion
		      ,CASE WHEN CAST(fecha_termino_ejecucion AS DATE)>=CAST(GETDATE() AS DATE) THEN 'ABIERTO' ELSE 'CERRADO' END AS estado
		      ,[area_autorizada]
		      ,[nick_creador]
		      ,[empresa_contratista]
		      ,[trabajo_a_realizar]
		      ,[area_autorizada]
		  FROM [seguimiento].[dbo].[permiso_trabajo]
		  ".$where."
		  ORDER BY CAST([num_permiso] AS FLOAT) DESC";
		    $respuesta = CreaJSon($sql,$link,1);


		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 

   			
}



if($accion=='rechazar_publicacion'){

		$id_archivo	=$_REQUEST['id_archivo'];
		$motivo_rechazo	=$_REQUEST['motivo_de_rechazo_archivo'];

		    $sql_actualiza="UPDATE [BDflexline].[TI].[base_repositorio]
						   SET [fecha_rechazo] =getdate()
						      ,[motivo_rechazo]='$motivo_rechazo'
						      ,[estado_gestion]='RECHAZADO'
						      ,[usuario_aprueba]='".$_SESSION['nick']."'
						 WHERE id= '$id_archivo' ";
		   $RESP2 = mssql_query($sql_actualiza, $link);

//aka correo rechazo
// buscar datos correo

	    $sql_buscar_datos ="SELECT CONVERT(VARCHAR(10), fecha_rechazo, 103) as fecha_rechazo,motivo_rechazo,usuario_aprueba,
                            usuario_crea,b.user_correo AS correo_crea,c.user_correo AS correo_aprueba,nombre_elemento,descripcion
                            from [BDflexline].[TI].[base_repositorio] as a
                            inner join Seguridad.dbo.usuario as b on a.usuario_crea=b.user_nick
							inner join Seguridad.dbo.usuario as c on a.usuario_aprueba=c.user_nick
                            WHERE id= '$id_archivo' ";
						 
						 
		$RESP_buscar_datos = mssql_query($sql_buscar_datos, $link);
		if($ROW_buscar_datos =  mssql_fetch_array($RESP_buscar_datos))
		 {
		 	$fecha_rechazo  =$ROW_buscar_datos['fecha_rechazo'];
			$motivo_rechazo =$ROW_buscar_datos['motivo_rechazo'];
			$usuario_aprueba=$_SESSION['nick'];
			$usuario_crea   =$ROW_buscar_datos['usuario_crea'];
			$user_correo    =$ROW_buscar_datos['correo_crea'];
			$correo_aprueba =$ROW_buscar_datos['correo_aprueba'];
			$nombre_elemento=$ROW_buscar_datos['nombre_elemento'];
			$descripcion    =$ROW_buscar_datos['descripcion'];	




		 }

$respuesta = correo_rechaza_publicacion($fecha_rechazo,$motivo_rechazo,$usuario_aprueba,$usuario_crea,$user_correo,$nombre_elemento,$descripcion,$correo_aprueba);
echo $respuesta;
//echo '[{"success":"true","mensaje":"RECHAZADO CORRECTAMENTE"}]'; 
 				
}


if($accion=='rechazar_archivo'){

		$id_archivo	=$_REQUEST['id_archivo'];
		$motivo_rechazo	=utf8_encode($_REQUEST['motivo_de_rechazo_archivo']);

		    $sql_actualiza="UPDATE [BDflexline].[TI].[base_repositorio]
						   SET [fecha_rechazo] =getdate()
						      ,[motivo_rechazo]='$motivo_rechazo'
						      ,[usuario_aprueba]='".$_SESSION['nick']."'
						 WHERE id= '$id_archivo' ";
		   $RESP2 = mssql_query($sql_actualiza, $link);

//aka correo rechazo
// buscar datos correo

	    $sql_buscar_datos ="select CONVERT(VARCHAR(10), fecha_rechazo, 103) as fecha_rechazo,motivo_rechazo,usuario_aprueba,
                            usuario_crea,b.user_correo,nombre_elemento,descripcion
                            from [BDflexline].[TI].[base_repositorio] as a
                            inner join Seguridad.dbo.usuario as b on a.usuario_crea= b.user_nick
                            WHERE id= '$id_archivo' ";
						 
						 
		$RESP_buscar_datos = mssql_query($sql_buscar_datos, $link);
		if($ROW_buscar_datos =  mssql_fetch_array($RESP_buscar_datos))
		 {
		 	$fecha_rechazo  =$ROW_buscar_datos['fecha_rechazo'];
			$motivo_rechazo =$ROW_buscar_datos['motivo_rechazo'];
			$usuario_aprueba=$ROW_buscar_datos['usuario_aprueba'];
			$usuario_crea   =$ROW_buscar_datos['usuario_crea'];
			$user_correo    =$ROW_buscar_datos['user_correo'];
			$nombre_elemento=$ROW_buscar_datos['nombre_elemento'];
			$descripcion    =$ROW_buscar_datos['descripcion'];	
		 }

$respuesta = correo_rechazo($fecha_rechazo,$motivo_rechazo,$usuario_aprueba,$usuario_crea,$user_correo,$nombre_elemento,$descripcion);
echo $respuesta;
//echo '[{"success":"true","mensaje":"RECHAZADO CORRECTAMENTE"}]'; 
 				
}


if($accion=='bajar_publicacion'){

		$id_archivo	=$_REQUEST['id_archivo'];

		    $sql_actualiza="UPDATE [BDflexline].[TI].[base_repositorio]
						   SET [estado_gestion]='REVISION'
						 WHERE id='$id_archivo'";
		   $RESP2 = mssql_query($sql_actualiza, $link);



		   //aka correo rechazo
// buscar datos correo

/*	    $sql_buscar_datos ="select CONVERT(VARCHAR(10), fecha_publicacion, 103) as fecha_publicacion,usuario_aprueba,
                            usuario_crea,b.user_correo,nombre_elemento,descripcion
                            from [BDflexline].[TI].[base_repositorio] as a
                            inner join Seguridad.dbo.usuario as b on a.usuario_crea= b.user_nick
                            WHERE id= '$id_archivo' ";
						 
						 
		$RESP_buscar_datos = mssql_query($sql_buscar_datos, $link);
		if($ROW_buscar_datos =  mssql_fetch_array($RESP_buscar_datos))
		 {
		 	$fecha_rechazo  =$ROW_buscar_datos['fecha_publicacion'];
			$motivo_rechazo ='';
			$usuario_aprueba=$ROW_buscar_datos['usuario_aprueba'];
			$usuario_crea   =$ROW_buscar_datos['usuario_crea'];
			$user_correo    =$ROW_buscar_datos['user_correo'];
			$nombre_elemento=$ROW_buscar_datos['nombre_elemento'];
			$usuario_publica    =$_SESSION['nick'];	
		 }

	$respuesta = correo_publica_docto($fecha_rechazo,$motivo_rechazo,$usuario_aprueba,$usuario_crea,$user_correo,$nombre_elemento,$usuario_publica);
	echo $respuesta;

	*/
	echo '[{"success":"true","mensaje":"SE BAJO LA PUBLICACIÓN CORRECTAMENTE"}]';

 				
}


if($accion=='publicar_documento'){

		$id_archivo	=$_REQUEST['id_archivo'];

		    $sql_actualiza="UPDATE [BDflexline].[TI].[base_repositorio]
						   SET [estado_gestion]='OK',
						       [fecha_publicacion]=getdate()
						 WHERE id='$id_archivo'";
		   $RESP2 = mssql_query($sql_actualiza, $link);



		   //aka correo rechazo
// buscar datos correo

	    $sql_buscar_datos ="select CONVERT(VARCHAR(10), fecha_publicacion, 103) as fecha_publicacion,usuario_aprueba,
                            usuario_crea,b.user_correo,nombre_elemento,descripcion
                            from [BDflexline].[TI].[base_repositorio] as a
                            inner join Seguridad.dbo.usuario as b on a.usuario_crea= b.user_nick
                            WHERE id= '$id_archivo' ";
						 
						 
		$RESP_buscar_datos = mssql_query($sql_buscar_datos, $link);
		if($ROW_buscar_datos =  mssql_fetch_array($RESP_buscar_datos))
		 {
		 	$fecha_rechazo  =$ROW_buscar_datos['fecha_publicacion'];
			$motivo_rechazo ='';
			$usuario_aprueba=$ROW_buscar_datos['usuario_aprueba'];
			$usuario_crea   =$ROW_buscar_datos['usuario_crea'];
			$user_correo    =$ROW_buscar_datos['user_correo'];
			$nombre_elemento=$ROW_buscar_datos['nombre_elemento'];
			$usuario_publica    =$_SESSION['nick'];	
		 }

	$respuesta = correo_publica_docto($fecha_rechazo,$motivo_rechazo,$usuario_aprueba,$usuario_crea,$user_correo,$nombre_elemento,$usuario_publica);
	echo $respuesta;
	//echo '[{"success":"true","mensaje":"PUBLICADO CORRECTAMENTE"}]';

 				
}





if($accion=='aprobar_archivo'){

		$id_archivo	=$_REQUEST['id_archivo'];
		$nivel_acceso	=$_REQUEST['nivel_acceso'];

		   $sql_actualiza="UPDATE [BDflexline].[TI].[base_repositorio]
						   SET [fecha_aprobacion] =getdate()
						      ,[usuario_aprueba]='".$_SESSION['nick']."'
						      ,[nivel_acceso]='".$nivel_acceso."'
						      ,[estado_gestion]='OK'
						      ,[fecha_publicacion]=getdate()
						 WHERE id='$id_archivo'";
		   $RESP2 = mssql_query($sql_actualiza, $link);


//aka correo rechazo
// buscar datos correo

	    $sql_buscar_datos ="select CONVERT(VARCHAR(10), fecha_aprobacion, 103) as fecha_aprobacion,motivo_rechazo,usuario_aprueba,
                            usuario_crea,b.user_correo,nombre_elemento,descripcion
                            from [BDflexline].[TI].[base_repositorio] as a
                            inner join Seguridad.dbo.usuario as b on a.usuario_crea= b.user_nick
                            WHERE id= '$id_archivo' ";
						 
						 
		$RESP_buscar_datos = mssql_query($sql_buscar_datos, $link);
		if($ROW_buscar_datos =  mssql_fetch_array($RESP_buscar_datos))
		 {
		 	$fecha_aprobacion  =$ROW_buscar_datos['fecha_aprobacion'];
			$motivo_rechazo =$ROW_buscar_datos['motivo_rechazo'];
			$usuario_aprueba=$ROW_buscar_datos['usuario_aprueba'];
			$usuario_crea   =$ROW_buscar_datos['usuario_crea'];
			$user_correo    =$ROW_buscar_datos['user_correo'];
			$nombre_elemento=$ROW_buscar_datos['nombre_elemento'];
			$descripcion    =$ROW_buscar_datos['descripcion'];	
		 }

$respuesta = correo_aprueba($fecha_aprobacion,$motivo_rechazo,$usuario_aprueba,$usuario_crea,$user_correo,$nombre_elemento,$descripcion);
echo $respuesta;
 //echo '[{"success":"true","mensaje":"APROBADO CORRECTAMENTE"}]'; 
 				
				
}





if($accion=='edita_directorio'){

		$id_directorio	=$_REQUEST['id_directorio'];
		$nombre_elemento =$_REQUEST['nombre_elemento'];
		$nomesclatura	=$_REQUEST['nomesclatura'];
		$nivel_acceso	=$_REQUEST['nivel_acceso'];
		$descripcion_nivel_acceso ='';



		   if($nivel_acceso=='1'){
		   		$descripcion_nivel_acceso='GERENTES';
		   }else if($nivel_acceso=='2'){
		   		$descripcion_nivel_acceso='GRTES-SUBGRTES';
		   }else if($nivel_acceso=='3'){
		   		$descripcion_nivel_acceso='GRTES-SUBGRTES-JEFES';
		   }else if($nivel_acceso=='4'){
		   		$descripcion_nivel_acceso='TODOS';
		   }



		   $sql_actualiza_carpeta="UPDATE [BDflexline].[TI].[base_repositorio]
			  SET nombre_elemento='".utf8_decode($nombre_elemento)."', nomesclatura='$nomesclatura', nivel_acceso='$nivel_acceso', descripcion_acceso='$descripcion_nivel_acceso'
			  WHERE id='$id_directorio'";
		     $upd1 = mssql_query($sql_actualiza_carpeta, $link);





		   $sql ="SELECT nombre_elemento,ruta,nomesclatura,id, id_padre
				  FROM [BDflexline].[TI].[base_repositorio]
				  WHERE id='$id_directorio'";
					$RESP = mssql_query($sql, $link);
				if($ROW =  mssql_fetch_array($RESP))
				 {
				 	$nombre_elemento_anterior= utf8_encode($ROW['nombre_elemento']);
				 	$ruta= utf8_encode($ROW['ruta']);
				 	$id_padre= utf8_decode($ROW['id_padre']);


				 	   $sql_achivos_hijos="select nombre_elemento,ruta,nomesclatura,id
				 	   						FROM [BDflexline].[TI].[base_repositorio]
  											WHERE ruta like '%".$ruta."'+(SELECT nombre_elemento from [BDflexline].[TI].[base_repositorio] where id='".$id_directorio."')+'%'";
  						$RESP3 = mssql_query($sql_achivos_hijos, $link);
  						while($ROW3 =  mssql_fetch_array($RESP3))
				 		{

				 			$id_hijos= utf8_decode($ROW3['id']);
				 			$ruta_antigua= utf8_encode($ROW3['ruta']);
				 		    $nueva_ruta_update = str_replace($nombre_elemento_anterior, $nombre_elemento, $ruta_antigua);



				 		   $sql_actualiza_hijos="UPDATE [BDflexline].[TI].[base_repositorio]
											  SET ruta='$nueva_ruta_update'
											  WHERE id='$id_hijos'";
						   //$upd = mssql_query($sql_actualiza_hijos, $link);

				 		}


				 }

		 

		      echo '[{"success":"true","mensaje":"EDITADO CORRECTAMENTE"}]';
 				
}



if($accion=='listar_elementos_filtro') {


    $parent = intval($_GET['id_padre']);
    $sql = "
      SELECT [id], [nombre_elemento]
      FROM [BDflexline].[TI].[base_repositorio]
      WHERE [id_padre] = '$parent'
        AND [tipo_elemento] = '1'
        AND [vigencia] = 'SI'
    ";
    $res = mssql_query($sql, $link);
    $arr = [];
    while($row = mssql_fetch_array($res)) {
      $arr[] = [
        'id' => $row['id'],
        'nombre_elemento' => utf8_decode($row['nombre_elemento'])
      ];
    }
    echo json_encode(['data' => $arr]);
    exit;
}





if($accion=='listar_archivos_busqueda'){

    $arreglo = '';
    $codigo_cargo = $_SESSION['cod_cargo'];
    //$codigo_cargo = '92';

    // Determinar nodo raíz según filtros
    $p = 0;
    if (!empty($_GET['departamento'])) {
        $p = intval($_GET['departamento']);
    } elseif (!empty($_GET['area'])) {
        $p = intval($_GET['area']);
    } elseif (!empty($_GET['repositorio'])) {
        $p = intval($_GET['repositorio']);
    }

    // Función recursiva en PHP para obtener todos los descendientes
    function getDescendants($link, $parentId) {
        $ids = [$parentId];
        $res = mssql_query("SELECT id FROM [BDflexline].[TI].[base_repositorio] WHERE id_padre = $parentId AND vigencia='SI'", $link);
        while($row = mssql_fetch_array($res)) {
            $ids = array_merge($ids, getDescendants($link, $row['id']));
        }
        return $ids;
    }

    $parentFilter = '';
    if($p > 0) {
        $allIds = getDescendants($link, $p);
        $allIdsList = implode(',', $allIds);
        $parentFilter = " AND [id_padre] IN ($allIdsList)";
    }

    $sql ="SELECT [id], [nombre_elemento], [id_padre], [extencion_elemento], [tipo_elemento],
                   [ruta], [fecha_publicacion], [nivel_acceso], [descripcion], [codigo_archivo]
            FROM [BDflexline].[TI].[base_repositorio]
            WHERE [tipo_elemento] = '0'
              AND [vigencia] = 'SI'
              AND [estado_gestion] = 'OK'
			  $parentFilter";


			$RESP = mssql_query($sql, $link);
    		if(!$RESP){
       			echo json_encode(["data"=>[]]);
       			exit;
    		}	



		 
			while($ROW =  mssql_fetch_array($RESP)){
				$nombre_elemento= utf8_decode($ROW['nombre_elemento']);
				$extencion_elemento=$ROW['extencion_elemento'];
				$id_padre=$ROW['id_padre'];
				$tipo_elemento=$ROW['tipo_elemento'];
				$id=$ROW['id'];
				$nivel_acceso=$ROW['nivel_acceso'];
				$ruta=utf8_encode($ROW['ruta']);
				$fecha_publicacion=$ROW['fecha_publicacion'];
				$descripcion=$ROW['descripcion'];
				$codigo_archivo=$ROW['codigo_archivo'];

				if($nivel_acceso=='4'){

            	 	$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","extencion_elemento":"'.$extencion_elemento.'","id_padre":"'.$id_padre.'","tipo_elemento":"'.$tipo_elemento.'","id":"'.$id.'","nivel_acceso":"'.$nivel_acceso.'","ruta":"'.$ruta.'","fecha_publicacion":"'.$fecha_publicacion.'","descripcion":"'.$descripcion.'","codigo_archivo":"'.$codigo_archivo.'"},';

            	}else if($nivel_acceso=='3'){

            		$sql_usuario="SELECT top 1 A.nivel4, A.nivel3, A.nivel2, A.nivel1
								FROM Seguridad.dbo.cargo AS A
								WHERE A.cargo_codigo='$codigo_cargo'";
				            	$r = mssql_query($sql_usuario, $link);
						     	if($ROW2 =  mssql_fetch_array($r)) {
						            if($ROW2['nivel4']=='0'){
						            	$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","extencion_elemento":"'.$extencion_elemento.'","id_padre":"'.$id_padre.'","tipo_elemento":"'.$tipo_elemento.'","id":"'.$id.'","nivel_acceso":"'.$nivel_acceso.'","ruta":"'.$ruta.'","fecha_publicacion":"'.$fecha_publicacion.'","descripcion":"'.$descripcion.'","codigo_archivo":"'.$codigo_archivo.'"},';
						            }
						        }

            	}else if($nivel_acceso=='2'){
            	 	$sql_usuario2="SELECT top 1 A.nivel4, A.nivel3, A.nivel2, A.nivel1
									FROM Seguridad.dbo.cargo AS A
									WHERE A.cargo_codigo='$codigo_cargo'";
				            	 	$r2 = mssql_query($sql_usuario2, $link);
						     	 	if($ROW3 =  mssql_fetch_array($r2)) {
						            	if($ROW3['nivel3']=='0' && $ROW3['nivel4']=='0'){
						            		$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","extencion_elemento":"'.$extencion_elemento.'","id_padre":"'.$id_padre.'","tipo_elemento":"'.$tipo_elemento.'","id":"'.$id.'","nivel_acceso":"'.$nivel_acceso.'","ruta":"'.$ruta.'","fecha_publicacion":"'.$fecha_publicacion.'","descripcion":"'.$descripcion.'","codigo_archivo":"'.$codigo_archivo.'"},';
						            	}
						            }			
            	}else if($nivel_acceso=='1'){
            	 		$sql_usuario2="SELECT top 1 A.nivel4, A.nivel3, A.nivel2, A.nivel1
									   FROM Seguridad.dbo.cargo AS A
								       WHERE A.cargo_codigo='$codigo_cargo' AND cargo_nombre like 'GERENTE%'";
				            	       $r2 = mssql_query($sql_usuario2, $link);
						     		if($ROW3 =  mssql_fetch_array($r2)) {
						            	$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","extencion_elemento":"'.$extencion_elemento.'","id_padre":"'.$id_padre.'","tipo_elemento":"'.$tipo_elemento.'","id":"'.$id.'","nivel_acceso":"'.$nivel_acceso.'","ruta":"'.$ruta.'","fecha_publicacion":"'.$fecha_publicacion.'","descripcion":"'.$descripcion.'","codigo_archivo":"'.$codigo_archivo.'"},';
						        	}
            	}
			}
			$cont1=strlen($arreglo);
		    $arreglo=substr($arreglo,0,($cont1-1));
            echo '{"data":['.$arreglo.']}';
}





if($accion=='abrir_nombre_archivo'){

		$id_directorio	=$_REQUEST['id_directorio'];

       $sql ="SELECT [id]
				      ,[descripcion]
				  FROM [BDflexline].[TI].[base_repositorio]
				  WHERE [id]='$id_directorio' AND [vigencia]='SI' AND tipo_elemento='0'";
					$respuesta = CreaJSon($sql,$link,1);
					echo $respuesta; 



}



if($accion=='archivos_publicados'){


		 $sql ="SELECT [id]
			      ,[nombre_elemento]
			      ,[id_padre]
			      ,[tipo_elemento]
			      ,[extencion_elemento]
				  ,CAST([fecha_creacion] AS DATE) AS fecha_creacion
			      ,[ruta]
			      ,[vigencia]
			      ,[nomesclatura]
			      ,[usuario_crea]
			      ,[usuario_aprueba]
			      ,[codigo_archivo]
			      ,[ubicacion_planta]
			      ,[estado_gestion]
				  ,CAST([fecha_aprobacion] AS DATE) AS fecha_aprobacion
			  FROM [BDflexline].[TI].[base_repositorio]
			  WHERE tipo_elemento='0' AND [vigencia]='SI' AND usuario_aprueba IS NOT NULL AND estado_gestion='OK'";
					    $respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 
		

   			
}




if($accion=='carga_archivos_publicar'){


		 $sql ="SELECT [id]
			      ,[nombre_elemento]
			      ,[id_padre]
			      ,[tipo_elemento]
			      ,[extencion_elemento]
				  ,CAST([fecha_creacion] AS DATE) AS fecha_creacion
			      ,[ruta]
			      ,[vigencia]
			      ,[nomesclatura]
			      ,[usuario_crea]
			      ,[usuario_aprueba]
			      ,[codigo_archivo]
			      ,[ubicacion_planta]
			      ,[estado_gestion]
				  ,CAST([fecha_aprobacion] AS DATE) AS fecha_aprobacion
			  FROM [BDflexline].[TI].[base_repositorio]
			  WHERE tipo_elemento='0' AND [vigencia]='SI' AND fecha_aprobacion IS NOT NULL AND estado_gestion='REVISION'";
					    $respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 
		

   			
}






if($accion=='eliminar_archivo'){
		$id_archivo	=$_REQUEST['id_archivo'];

		    $sql_actualiza="UPDATE [BDflexline].[TI].[base_repositorio]
						   SET [vigencia] = 'NO'
						 WHERE id='$id_archivo'";
		   $RESP2 = mssql_query($sql_actualiza, $link);

		      echo '[{"success":"true","mensaje":"ELIMINADO CORRECTAMENTE"}]'; 

		      	$sql_consulta="SELECT codigo_archivo 
						FROM [BDflexline].[TI].[base_repositorio]
						WHERE id='".$id_archivo."'";
		      $r = mssql_query($sql_consulta, $link);
	     	 if($ROW2 =  mssql_fetch_array($r))
	            {


	            		$update="UPDATE [BDflexline].[TI].[base_repositorio_codigo]
							SET utilizado='NO'
							WHERE codigo_directotio='".$ROW2['codigo_archivo']."' AND utilizado='SI'";
							mssql_query($update, $link);


	            }
 				
}




if($accion=='eliminar_codigo'){
		$id_codigo	=$_REQUEST['id_codigo'];


		    $sql_actualiza="UPDATE [BDflexline].[TI].[base_repositorio_codigo]
							   SET [vigencia] = 'NO'
							 WHERE [id]='$id_codigo'";
		   $RESP2 = mssql_query($sql_actualiza, $link);

		      echo '[{"success":"true","mensaje":"ELIMINADO CORRECTAMENTE"}]'; 
 	

  			
}



if($accion=='lista_de_codigos'){

	$id_directorio	=$_REQUEST['id_directorio'];

		 $sql ="SELECT id, REPLACE(FORMAT( CAST(fecha_creacion AS DATE), 'd', 'en-US' ),'/','-') as fecha_creacion, 
				codigo_directotio, utilizado
				   FROM [BDflexline].[TI].[base_repositorio_codigo]
					where id_directorio='$id_directorio' and vigencia='SI'
					ORDER BY id desc";
		    $respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 

   			
}





if($accion=='guardar_documento'){
	
$nombre_archivo	      =$_REQUEST['nombre_archivo'];
$codigo_en_directorio =$_REQUEST['codigo_en_directorio'];
$ubicacion	          =$_REQUEST['ubicacion'];
$archivo	          =$_REQUEST['archivo'];
$extension            = pathinfo($_REQUEST['archivo'], PATHINFO_EXTENSION);

				$sql ="SELECT [id]
				      ,[fecha_creacion]
				      ,[vigencia]
				      ,[id_directorio]
				      ,[codigo_directotio]
				      ,[correlativo_directorio]
				      ,[usuario_crea]
				      ,[ruta_directorio]
				      ,[nivel_acceso]
      				  ,[descripcion_acceso]
				   FROM [BDflexline].[TI].[base_repositorio_codigo]
				  WHERE [codigo_directotio]='$codigo_en_directorio' AND  [utilizado]='NO'";
				$RESP = mssql_query($sql, $link);
				if($ROW =  mssql_fetch_array($RESP))
				 {
				 $id_directorio=$ROW['id_directorio'];
				 $ruta_directorio=$ROW['ruta_directorio'];
				 $nivel_acceso=$ROW['nivel_acceso'];
				 $descripcion_acceso=$ROW['descripcion_acceso'];


				 	$sql_inserta="INSERT INTO [BDflexline].[TI].[base_repositorio]
						           ([nombre_elemento]
						           ,[id_padre]
						           ,[tipo_elemento]
						           ,[extencion_elemento]
						           ,[ruta]
						           ,[fecha_creacion]
						           ,[vigencia]
						           ,[usuario_crea]
						           ,[codigo_archivo]
						           ,[ubicacion_planta]
						           ,[descripcion]
						           ,[estado_gestion]
						           ,[area_codigo]
						           ,[nivel_acceso]
      							   ,[descripcion_acceso])
						     VALUES
						           ('$nombre_archivo'
						           ,'$id_directorio'
						           ,'0'
						           ,'$extension'
						           ,'$ruta_directorio'
						           ,getdate()
						           ,'SI'
						           ,'".$_SESSION['nick']."'
						           ,'$codigo_en_directorio'
						       	   ,'$ubicacion'
						       	   ,'$codigo_en_directorio.$extension'
						       	   ,'REVISION'
						       	   ,'".$_SESSION['depto_codigo']."'
						       	   ,'$nivel_acceso'
						       	   ,'$descripcion_acceso')";

						   $RESP = mssql_query($sql_inserta, $link);

						    $sql_actualiza="UPDATE [BDflexline].[TI].[base_repositorio_codigo]
											   SET [utilizado] = 'SI'
											 WHERE [codigo_directotio]='$codigo_en_directorio'";
						   $RESP2 = mssql_query($sql_actualiza, $link);

				
				 rename("../../repositorio/upload/archivos_subidos/$archivo", "../../repositorio/archivos_subidos/$codigo_en_directorio.$extension");	
				 echo '[{"success":"true","mensaje":"ARCHIVO GUARDADO CORRECTAMENTE"}]'; 
				 	

				 }else{
					 
					unlink("../../repositorio/upload/archivos_subidos/$archivo"); 
				 	echo '[{"success":"false","mensaje":"EL CODIGO NO EXISTE O YA NO ESTA DISPONIBLE"}]'; 
					
				 }

  			
}

if($accion=='carga_tabla_archivos_aprobados'){


	  $sql ="SELECT [id]
			      ,[nombre_elemento]
			      ,[id_padre]
			      ,[tipo_elemento]
			      ,[extencion_elemento]
				  ,CAST([fecha_creacion] AS DATE) AS fecha_creacion
			      ,[ruta]
			      ,[vigencia]
			      ,[nomesclatura]
			      ,[usuario_crea]
			      ,[usuario_aprueba]
			      ,[codigo_archivo]
			      ,[ubicacion_planta]
			      ,[estado_gestion]
				  ,CAST([fecha_aprobacion] AS DATE) AS fecha_aprobacion
			  FROM [BDflexline].[TI].[base_repositorio] AS DOC
			  INNER JOIN Seguridad.dbo.usuario AS USR ON USR.user_nick=DOC.usuario_crea
			  INNER JOIN Seguridad.dbo.cargo AS CAR ON USR.cargo_codigo=CAR.cargo_codigo
			  WHERE tipo_elemento='0' AND [vigencia]='SI' AND usuario_aprueba IS NULL AND (USR.cargo_codigo= '".$_SESSION['cod_cargo']."' or CAR.nivel4= '".$_SESSION['cod_cargo']."' or CAR.nivel3= '".$_SESSION['cod_cargo']."' or CAR.nivel2= '".$_SESSION['cod_cargo']."' or CAR.nivel1= '".$_SESSION['cod_cargo']."')";
					    $respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 
		
   			
}



if($accion=='carga_tabla_archivos'){


		 $sql ="SELECT A.id
			      ,[nombre_elemento]
			      ,[id_padre]
			      ,[tipo_elemento]
			      ,[extencion_elemento]
				  ,CAST(A.fecha_creacion AS DATE) AS fecha_creacion
			      ,[ruta]
			      ,A.vigencia
			      ,[nomesclatura]
			      ,A.usuario_crea
			      ,[usuario_aprueba]
			      ,[codigo_archivo]
			      ,[ubicacion_planta]
			      ,[estado_gestion]
				  ,CAST(A.fecha_aprobacion AS DATE) AS fecha_aprobacion
				  ,[descripcion]
				  ,[fecha_rechazo]
				  ,[motivo_rechazo]
				  ,B.id AS id_codigo
			  FROM [BDflexline].[TI].[base_repositorio] AS A
			  INNER JOIN [BDflexline].[TI].[base_repositorio_codigo] AS B ON B.vigencia='SI' AND A.codigo_archivo=B.codigo_directotio AND A.id_padre=B.id_directorio
			  WHERE tipo_elemento='0' AND A.vigencia='SI' AND A.usuario_crea='".$_SESSION['nick']."'
			        order by id desc";
					    
				$respuesta = CreaJSon($sql,$link,1);
		        $arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 
   			
}


if($accion=='enviar_correo_codigo_automatico'){

$id_repositorio = utf8_decode($_POST['id_repositorio']); 
$repositorio =       utf8_decode($_POST['repositorio']); 
$nombre_documento =  utf8_decode($_POST['nombre_documento']); 
$tipo_documento =    utf8_decode($_POST['tipo_documento']); 
$area =              utf8_decode($_POST['area']); 
$departamento =      utf8_decode($_POST['departamento']); 
$version =           utf8_decode($_POST['version']); 
$resumen_contenido = utf8_decode($_POST['resumen_contenido']); 
$combo_ultimo_nivel = utf8_decode($_POST['combo_ultimo_nivel']);
$codigo_generado_automaticamente = $_POST['codigo_generado_automaticamente']; 

$respuesta = correo_solicitar_automatico($repositorio,$nombre_documento,$tipo_documento,$area,$departamento,$version,$resumen_contenido,$combo_ultimo_nivel,$id_repositorio,$codigo_generado_automaticamente);
echo $respuesta;	
			   
}


if($accion=='reservar_codigo_nueva_version'){

	$id_archivo	=$_REQUEST['id_archivo'];
	$codigo_generado =$_REQUEST['codigo_generado'];
	$correo_solicitante =$_REQUEST['correo_solicitante'];


	$sql ="SELECT [id]
		      ,[fecha_creacion]
		      ,[vigencia]
		      ,[id_directorio]
		      ,[codigo_directotio]
		      ,[correlativo_directorio]
		      ,[usuario_crea]
		      ,nivel_acceso
			  ,descripcion_acceso
			  ,ruta_directorio
		   FROM [BDflexline].[TI].[base_repositorio_codigo]
		  WHERE [id]='$id_archivo'";
		$RESP = mssql_query($sql, $link);
		if($ROW =  mssql_fetch_array($RESP))
		 {
		 	$codigo_directotio=$ROW['codigo_directotio'];
			$nivel_acceso=$ROW['nivel_acceso'];
		    $descripcion_acceso=$ROW['descripcion_acceso'];
		    $id_directorio=$ROW['id_directorio'];
		    $correlativo_directorio=$ROW['correlativo_directorio'];
		    $ruta_directorio=utf8_decode($ROW['ruta_directorio']);

				 		$sql_inserta="INSERT INTO [BDflexline].[TI].[base_repositorio_codigo]
						           ([fecha_creacion]
						           ,[vigencia]
						           ,[id_directorio]
						           ,[codigo_directotio]
						           ,[correlativo_directorio]
						           ,[usuario_crea]
						           ,[utilizado]
						           ,[ruta_directorio]
						           ,[nivel_acceso]
						           ,[descripcion_acceso])
						     VALUES
						           (getdate()
						           ,'SI'
						           ,'$id_directorio'
						           ,'$codigo_generado'
						           ,'$correlativo_directorio'
						           ,'".$_SESSION['nick']."'
						           ,'NO'
						           ,'$ruta_directorio'
						           ,'$nivel_acceso'
						           ,'$descripcion_acceso')";
						      $RESP = mssql_query($sql_inserta, $link);


			


						   $respuesta = correo_solicitar_nueva_version($codigo_generado,$correo_solicitante);
						echo $respuesta;	





		 }



}





if($accion=='reservar_codigo_automatico'){

	$id_directorio	=$_REQUEST['id_directorio'];
	$codigo_generado	=$_REQUEST['codigo_generado'];
	$correlativo_directorio	=$_REQUEST['correlativo_directorio'];
	//$ruta_directorio =utf8_decode(str_replace(' &gt;','/',(str_replace(' &gt; ','/',$_REQUEST['ruta_directorio']))));

	 $sql ="SELECT [id]
		      ,[fecha_creacion]
		      ,[vigencia]
		      ,[id_directorio]
		      ,[codigo_directotio]
		      ,[correlativo_directorio]
		      ,[usuario_crea]
		   FROM [BDflexline].[TI].[base_repositorio_codigo]
		  WHERE [codigo_directotio]='$codigo_generado'  AND [vigencia]='SI'";
		$RESP = mssql_query($sql, $link);
		if($ROW =  mssql_fetch_array($RESP))
		 {
		 	$codigo_directotio=$ROW['codigo_directotio'];
		 	echo '[{"success":"false","codigo":"El codigo "'.$codigo_directotio.'" ya esta reservado"}]'; 

		 }else{


				 $sql ="SELECT [id],[nivel_acceso]
				      ,[descripcion_acceso],[ruta]
				   FROM [BDflexline].[TI].[base_repositorio]
				  WHERE [id]='$id_directorio'";
				$RESP = mssql_query($sql, $link);
				if($ROW =  mssql_fetch_array($RESP))
				 {
				 	
				 	$nivel_acceso=$ROW['nivel_acceso'];
				 	$descripcion_acceso=$ROW['descripcion_acceso'];
				 	$ruta_directorio=utf8_decode($ROW['ruta']);

				 		 $sql_inserta="INSERT INTO [BDflexline].[TI].[base_repositorio_codigo]
						           ([fecha_creacion]
						           ,[vigencia]
						           ,[id_directorio]
						           ,[codigo_directotio]
						           ,[correlativo_directorio]
						           ,[usuario_crea]
						           ,[utilizado]
						           ,[ruta_directorio]
						           ,[nivel_acceso]
						           ,[descripcion_acceso])
						     VALUES
						           (getdate()
						           ,'SI'
						           ,'$id_directorio'
						           ,'$codigo_generado'
						           ,'$correlativo_directorio'
						           ,'".$_SESSION['nick']."'
						           ,'NO'
						           ,'$ruta_directorio'
						           ,'$nivel_acceso'
						           ,'$descripcion_acceso')";
						      $RESP = mssql_query($sql_inserta, $link);


						      echo '[{"success":"true","codigo":"RESERVADO CORRECTAMENTE"}]'; 


				 }


		 		


		 }



}


if($accion=='reservar_codigo'){

	$id_directorio	=$_REQUEST['id_directorio'];
	$codigo_generado	=$_REQUEST['codigo_generado'];
	$correlativo_directorio	=$_REQUEST['correlativo_directorio'];
	$ruta_directorio =utf8_decode(str_replace(' &gt;','/',(str_replace(' &gt; ','/',$_REQUEST['ruta_directorio']))));

	 $sql ="SELECT [id]
		      ,[fecha_creacion]
		      ,[vigencia]
		      ,[id_directorio]
		      ,[codigo_directotio]
		      ,[correlativo_directorio]
		      ,[usuario_crea]
		   FROM [BDflexline].[TI].[base_repositorio_codigo]
		  WHERE [codigo_directotio]='$codigo_generado' AND [vigencia]='SI'";
		$RESP = mssql_query($sql, $link);
		if($ROW =  mssql_fetch_array($RESP))
		 {
		 	$codigo_directotio=$ROW['codigo_directotio'];
		 	echo '[{"success":"false","codigo":"El codigo "'.$codigo_directotio.'" ya esta reservado"}]'; 

		 }else{


				 	$sql ="SELECT [id],[nivel_acceso]
				      ,[descripcion_acceso]
				   FROM [BDflexline].[TI].[base_repositorio]
				  WHERE [id]='$id_directorio'";
				$RESP = mssql_query($sql, $link);
				if($ROW =  mssql_fetch_array($RESP))
				 {
				 	
				 	$nivel_acceso=$ROW['nivel_acceso'];
				 	$descripcion_acceso=$ROW['descripcion_acceso'];

				 		$sql_inserta="INSERT INTO [BDflexline].[TI].[base_repositorio_codigo]
						           ([fecha_creacion]
						           ,[vigencia]
						           ,[id_directorio]
						           ,[codigo_directotio]
						           ,[correlativo_directorio]
						           ,[usuario_crea]
						           ,[utilizado]
						           ,[ruta_directorio]
						           ,[nivel_acceso]
						           ,[descripcion_acceso])
						     VALUES
						           (getdate()
						           ,'SI'
						           ,'$id_directorio'
						           ,'$codigo_generado'
						           ,'$correlativo_directorio'
						           ,'".$_SESSION['nick']."'
						           ,'NO'
						           ,'$ruta_directorio'
						           ,'$nivel_acceso'
						           ,'$descripcion_acceso')";
						      $RESP = mssql_query($sql_inserta, $link);

						      echo '[{"success":"true","codigo":"RESERVADO CORRECTAMENTE"}]'; 


				 }


		 		


		 }



}



if($accion=='generar_codigo_nueva_version'){

	$codigo_archivo	=$_REQUEST['codigo_archivo'];
	$id_padre	=$_REQUEST['id_padre'];

 	$version_aux = substr($codigo_archivo,'-2','2');
 	$version = str_replace("-", "", $version_aux);
 	$largo_version=strlen($version);
 	$largo_codigo=strlen($codigo_archivo);

 	$varsion_remplaza=$largo_codigo-$largo_version;

 	$solo_codigo=substr($codigo_archivo,'0',$varsion_remplaza);

 	$nueva_version =$version+1;

 	if(strlen($nueva_version)=='1'){
 		$nueva_version='0'.$nueva_version;
 	}



	$codigo_final=$solo_codigo.$nueva_version;
	$correlativo=substr($solo_codigo,'-5','4');



	$nick=str_replace('_',' ',$_SESSION['nick']);			


	echo '[{"success":"true","codigo":"'.$codigo_final.'","correlativo":"'.$correlativo.'","id_directorio":"'.$id_padre.'","nick_solicitante":"'.$nick.'","correo_solicitante":"'.$_SESSION['correo'].'"}]'; 

		            	 
}






if($accion=='generar_codigo'){

	$id_directorio	=$_REQUEST['id_directorio'];
	$codigo_final='';


			$sql ="SELECT [id]
				      ,[id_padre]
				      ,[nomesclatura]
				  FROM [BDflexline].[TI].[base_repositorio]
				  WHERE [id]='$id_directorio' AND [vigencia]='SI' AND tipo_elemento='1' AND nomesclatura<>''";
					$RESP = mssql_query($sql, $link);
		     	 if($ROW =  mssql_fetch_array($RESP))
		            {
		            	 $id_padre=$ROW['id_padre'];
		            	 $codigo=$ROW['nomesclatura'];
		            	 $codigo_final=$ROW['nomesclatura'];

		            	 while ($id_padre>0) {

		            	 	$sql_sig ="SELECT [id]
							      ,[id_padre]
							      ,[nomesclatura]
							  FROM [BDflexline].[TI].[base_repositorio]
							  WHERE [id]='$id_padre' AND [vigencia]='SI' AND tipo_elemento='1' AND nomesclatura<>''";
								$RESP2 = mssql_query($sql_sig, $link);
					     	 if($ROW2 =  mssql_fetch_array($RESP2)){

					     	    $nomesclatura_sig=$ROW2['nomesclatura'];
					     	 	 $id_padre=$ROW2['id_padre'];

					     	 	 $codigo=$codigo.'-'.$nomesclatura_sig;

					     	 }else{
					     	 	$id_padre=0;
					     	 }
		            	 	
		            	 }

		            	 $codigo_final=$codigo;


		            	 if($codigo_final!=''){

		            	 	$correlativo='';
		            	 	$ceros='';
							$nuevo=0;

		            	 			$sql ="SELECT count([id])+1 AS correlativo
										  FROM [BDflexline].[TI].[base_repositorio_codigo]
										  where [id_directorio]='$id_directorio' and vigencia='SI'";
											$RESP = mssql_query($sql, $link);
								     	 if($ROW =  mssql_fetch_array($RESP))
								            {
								            	$correlativo=$ROW['correlativo'];

								            	$contar = strlen($correlativo);
												$cantidad= 4-$contar;

												while ($cantidad > 0){		
													$ceros=$ceros.$nuevo;
													$cantidad=$cantidad-1;
												}

												$correlativo=$ceros.$correlativo;


								            }

							$nick=str_replace('_',' ',$_SESSION['nick']);			


		            	 	echo '[{"success":"true","codigo":"'.$codigo_final.'-'.$correlativo.'","correlativo":"'.$correlativo.'","id_directorio":"'.$id_directorio.'","nick_solicitante":"'.$nick.'","correo_solicitante":"'.$_SESSION['correo'].'"}]'; 

		            	 }

		            }else{

		            	echo '[{"success":"false","codigo":"Error: No podemos generar un código, el directorio o carpeta padre no tiene nomesclatura asignada"}]'; 

		            }




}



if($accion=='crea_carpeta_directorio'){

	$nombre_nueva_carpeta	=utf8_decode($_REQUEST['nombre_nueva_carpeta']);
	$nomesclatura_carpeta	=strtoupper(utf8_decode($_REQUEST['nomesclatura_carpeta']));
	$id_directorio	=$_REQUEST['id_directorio'];
	$ruta_directorio	=$_REQUEST['ruta_directorio'];
	$nivel_acceso	=$_REQUEST['nivel_acceso'];
	$descripcion_acceso	=$_REQUEST['descripcion_acceso'];
	$ruta='';
	$nivel_acceso_padre='';
	$nombre_acceso_padre='';


			$sql ="SELECT TOP 1 [ruta], [nivel_acceso],[descripcion_acceso]
		  			FROM [BDflexline].[TI].[base_repositorio]
		  			where id_padre='$id_directorio'";
					$RESP = mssql_query($sql, $link);
		     	 if($ROW =  mssql_fetch_array($RESP))
		            {
		            	 $ruta=$ROW['ruta'];


		            	$sql2 ="SELECT [ruta],[nombre_elemento], [nivel_acceso], [descripcion_acceso]
					  			FROM [BDflexline].[TI].[base_repositorio]
					  			where id='$id_directorio'";
								$RESP2 = mssql_query($sql2, $link);
					     	 if($ROW2 =  mssql_fetch_array($RESP2))
					            {
					            	$nivel_acceso_padre=$ROW2['nivel_acceso'];
					            	$nombre_acceso_padre=$ROW2['descripcion_acceso'];
					            }

		            }else{
		            	

			           	$sql ="SELECT [ruta],[nombre_elemento], [nivel_acceso], [descripcion_acceso]
					  			FROM [BDflexline].[TI].[base_repositorio]
					  			where id='$id_directorio'";
								$RESP = mssql_query($sql, $link);
					     	 if($ROW =  mssql_fetch_array($RESP))
					            {
					            	$ruta=$ROW['ruta'].$ROW['nombre_elemento'].'/';
					            	$nivel_acceso_padre=$ROW['nivel_acceso'];
					            	$nombre_acceso_padre=$ROW['descripcion_acceso'];
					            }else{
					            	echo '[{"success":"false","mensaje":"NO SE ENCONTRO LA RUTA"}]';
					            }	

		           }


					    if($nivel_acceso_padre>=$nivel_acceso){

					        if($ruta!=''){

					            	  $sql_insert="INSERT INTO [BDflexline].[TI].[base_repositorio]
										           ([nombre_elemento]
										           ,[id_padre]
										           ,[tipo_elemento]
										           ,[extencion_elemento]
										           ,[fecha_creacion]
										           ,[ruta]
										           ,[vigencia]
										           ,[nomesclatura]
										           ,[usuario_crea]
										           ,[nivel_acceso]
										           ,[descripcion_acceso])
										     	VALUES
										           ('$nombre_nueva_carpeta'
										           ,'$id_directorio'
										           ,'1'
										           ,'ca'
										           ,getdate()
										           ,'$ruta'
										           ,'SI'
										           ,'$nomesclatura_carpeta'
										           ,'".$_SESSION['nick']."'
										           ,'$nivel_acceso'
										         ,'$descripcion_acceso')";

										           mssql_query($sql_insert, $link);


					 					echo '[{"success":"true","mensaje":"INSERTADO CORRECTAMENTE"}]';

					        }

					    }else{

					    	echo '[{"success":"false","mensaje":"LOS NIVELES DE ACCESO NO PUEDEN SER MAYORES AL QUE POSEE EL DIRECTORIO PADRE ('.$nombre_acceso_padre.')"}]';

					    }
}




if($accion=='consulta_directorio_principal'){

		 $sql ="SELECT nombre_elemento, 
		 case when nomesclatura='' then nombre_elemento else nombre_elemento+' ('+nomesclatura+')' end AS nombre_nomesclatura, 
		 nomesclatura, id,extencion_elemento, tipo_elemento, REPLACE(ruta,'/',' > ') as ruta FROM BDflexline.TI.base_repositorio
              WHERE id_padre ='0' AND vigencia='SI' AND (estado_gestion ='OK' or estado_gestion IS NULL)";
		    $respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 

   			
}


if($accion=='consulta_directorio'){

	$id_directorio	=$_REQUEST['id_directorio'];

		 $sql ="SELECT nombre_elemento, nivel_acceso, descripcion_acceso,
		 case when nomesclatura='' then nombre_elemento else nombre_elemento+' ('+nomesclatura+')' end AS nombre_nomesclatura, 
		 nomesclatura, id, tipo_elemento, extencion_elemento, REPLACE(ruta,'/',' > ') as ruta, cast(fecha_rechazo as date) as fecha_rechazo, motivo_rechazo, usuario_aprueba   
		 FROM BDflexline.TI.base_repositorio
          WHERE id ='$id_directorio' AND vigencia='SI' AND (estado_gestion ='OK' or estado_gestion IS NULL)";
          $respuesta = CreaJSon($sql,$link,1);
		echo '['.$respuesta.']';


   			
}

if($accion=='consulta_rechazo'){

	$id_directorio	=$_REQUEST['id_directorio'];

		  $sql ="SELECT nombre_elemento, nivel_acceso, descripcion_acceso,
		 case when nomesclatura='' then nombre_elemento else nombre_elemento+' ('+nomesclatura+')' end AS nombre_nomesclatura, 
		 nomesclatura, id, tipo_elemento, extencion_elemento, REPLACE(ruta,'/',' > ') as ruta, cast(fecha_rechazo as date) as fecha_rechazo, motivo_rechazo, usuario_aprueba   
		 FROM BDflexline.TI.base_repositorio
          WHERE id ='$id_directorio' AND vigencia='SI' ";
          $respuesta = CreaJSon($sql,$link,1);
		echo '['.$respuesta.']';


   			
}


if($accion=='consulta_directorio_adelante'){

	$id_directorio	=$_REQUEST['id_directorio'];

		$sql ="SELECT nombre_elemento, nivel_acceso, descripcion_acceso,
		 case when nomesclatura='' then nombre_elemento else nombre_elemento+' ('+nomesclatura+')' end AS nombre_nomesclatura, 
		 nomesclatura, id, tipo_elemento, extencion_elemento, REPLACE(ruta,'/',' > ') as ruta   
		 FROM BDflexline.TI.base_repositorio
          WHERE id_padre ='$id_directorio' AND vigencia='SI' AND (estado_gestion ='OK' or estado_gestion IS NULL)"; 
		  $respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 
   			
}

if($accion=='consulta_directorio_atras'){

	$id_directorio	=$_REQUEST['id_directorio'];

		 $sql ="SELECT nombre_elemento, nivel_acceso, descripcion_acceso,
		 case when nomesclatura='' then nombre_elemento else nomesclatura+' - '+nombre_elemento end AS nombre_nomesclatura, 
		 nomesclatura, id, tipo_elemento, extencion_elemento, id_padre, REPLACE(ruta,'/',' > ') as ruta FROM BDflexline.TI.base_repositorio
              WHERE vigencia='SI' and  id_padre =(
              SELECT id_padre FROM BDflexline.TI.base_repositorio
              WHERE id ='$id_directorio')";
		    $respuesta = CreaJSon($sql,$link,1);
		$arreglo='{"data":['.$respuesta.']}';

		echo $arreglo; 
   			
}







if($accion=='consulta_directorio_adelante_general'){

	$id_directorio	=$_REQUEST['id_directorio'];
	$arreglo='';
	$codigo_cargo=$_SESSION['cod_cargo'];

		 $sql ="SELECT nombre_elemento, nivel_acceso, codigo_archivo,
		 case when nomesclatura='' then nombre_elemento else nomesclatura+' - '+nombre_elemento end AS nombre_nomesclatura, 
		 nomesclatura, id, tipo_elemento, extencion_elemento, REPLACE(ruta,'/',' > ') as ruta   
		 FROM BDflexline.TI.base_repositorio
          WHERE id_padre ='$id_directorio' AND vigencia='SI' AND (estado_gestion ='OK' or estado_gestion IS NULL)
          ORDER BY nombre_nomesclatura";
          $RESP = mssql_query($sql, $link);
     	 while($ROW =  mssql_fetch_array($RESP))
            {
            	 $nombre_elemento=utf8_encode($ROW['nombre_elemento']);
            	 $nivel_acceso=$ROW['nivel_acceso'];
            	 $nombre_nomesclatura=utf8_encode($ROW['nombre_nomesclatura']);
            	 $nomesclatura=$ROW['nomesclatura'];
            	 $id=$ROW['id'];
            	 $tipo_elemento=$ROW['tipo_elemento'];
            	 $extencion_elemento=$ROW['extencion_elemento'];
            	 $codigo_archivo=$ROW['codigo_archivo'];
            	 $ruta=utf8_encode($ROW['ruta']);

            	 if($nivel_acceso=='4' || $nivel_acceso==''){ 

            	 	$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","nivel_acceso":"'.$nivel_acceso.'","nombre_nomesclatura":"'.$nombre_nomesclatura.'","nomesclatura":"'.$nomesclatura.'","id":"'.$id.'","tipo_elemento":"'.$tipo_elemento.'","extencion_elemento":"'.$extencion_elemento.'","ruta":"'.$ruta.'","codigo_archivo":"'.$codigo_archivo.'"},';

            	 }else if($nivel_acceso=='3'){

            	 			$sql_usuario="SELECT top 1 A.nivel4, A.nivel3, A.nivel2, A.nivel1
								FROM Seguridad.dbo.cargo AS A
								WHERE (A.nivel3='$codigo_cargo' or A.nivel2='$codigo_cargo' or A.nivel1='$codigo_cargo')";
				            	 $r = mssql_query($sql_usuario, $link);
						     	 if($ROW2 =  mssql_fetch_array($r))
						            {

						            	//if($ROW2['nivel4']=='0'){

						            		$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","nivel_acceso":"'.$nivel_acceso.'","nombre_nomesclatura":"'.$nombre_nomesclatura.'","nomesclatura":"'.$nomesclatura.'","id":"'.$id.'","tipo_elemento":"'.$tipo_elemento.'","extencion_elemento":"'.$extencion_elemento.'","ruta":"'.$ruta.'","codigo_archivo":"'.$codigo_archivo.'"},';

						            	//}

						            }

            	 }else if($nivel_acceso=='2'){

            	 			$sql_usuario2="SELECT top 1 A.nivel4, A.nivel3, A.nivel2, A.nivel1
								FROM Seguridad.dbo.cargo AS A
								WHERE  (A.nivel2='$codigo_cargo' or A.nivel1='$codigo_cargo')";
				            	 $r2 = mssql_query($sql_usuario2, $link);
						     	 if($ROW3 =  mssql_fetch_array($r2))
						            {

						            	//if($ROW3['nivel3']=='0' && $ROW3['nivel4']=='0'){

						            		$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","nivel_acceso":"'.$nivel_acceso.'","nombre_nomesclatura":"'.$nombre_nomesclatura.'","nomesclatura":"'.$nomesclatura.'","id":"'.$id.'","tipo_elemento":"'.$tipo_elemento.'","extencion_elemento":"'.$extencion_elemento.'","ruta":"'.$ruta.'","codigo_archivo":"'.$codigo_archivo.'"},';

						            	//}

						            }

            	 }else if($nivel_acceso=='1'){

            	 			$sql_usuario2="SELECT top 1 A.nivel4, A.nivel3, A.nivel2, A.nivel1
								FROM Seguridad.dbo.cargo AS A
								WHERE  (A.nivel1='$codigo_cargo')";
				            	 $r2 = mssql_query($sql_usuario2, $link);
						     	 if($ROW3 =  mssql_fetch_array($r2))
						            {

						            		$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","nivel_acceso":"'.$nivel_acceso.'","nombre_nomesclatura":"'.$nombre_nomesclatura.'","nomesclatura":"'.$nomesclatura.'","id":"'.$id.'","tipo_elemento":"'.$tipo_elemento.'","extencion_elemento":"'.$extencion_elemento.'","ruta":"'.$ruta.'","codigo_archivo":"'.$codigo_archivo.'"},';

						            	
						            }

            	 }




            }


           $cont1=strlen($arreglo);
		   $arreglo=substr($arreglo,0,($cont1-1));
           echo '{"data":['.$arreglo.']}';

   			
}




if($accion=='consulta_directorio_atras_general'){

	$id_directorio	=$_REQUEST['id_directorio'];
	$arreglo='';
	$codigo_cargo=$_SESSION['cod_cargo'];

		 $sql ="SELECT nombre_elemento, nivel_acceso,codigo_archivo,
		 case when nomesclatura='' then nombre_elemento else nombre_elemento+' ('+nomesclatura+')' end AS nombre_nomesclatura,
		 nomesclatura, id, tipo_elemento, extencion_elemento, id_padre, REPLACE(ruta,'/',' > ') as ruta 
		 FROM BDflexline.TI.base_repositorio
              WHERE vigencia='SI' and  id_padre =(
              SELECT id_padre FROM BDflexline.TI.base_repositorio
              WHERE id ='$id_directorio')
              ORDER BY nombre_elemento";
          $RESP = mssql_query($sql, $link);
     	 while($ROW =  mssql_fetch_array($RESP))
            {
            	 $nombre_elemento=utf8_encode($ROW['nombre_elemento']);
            	 $nivel_acceso=$ROW['nivel_acceso'];
            	 $nombre_nomesclatura=utf8_encode($ROW['nombre_nomesclatura']);
            	 $nomesclatura=$ROW['nomesclatura'];
            	 $id_padre=$ROW['id_padre'];
            	 $id=$ROW['id'];
            	 $tipo_elemento=$ROW['tipo_elemento'];
            	 $extencion_elemento=$ROW['extencion_elemento'];
            	 $codigo_archivo=$ROW['codigo_archivo'];
            	 $ruta=utf8_encode($ROW['ruta']);

            	 if($nivel_acceso=='4'){

            	 	$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","nivel_acceso":"'.$nivel_acceso.'","nombre_nomesclatura":"'.$nombre_nomesclatura.'","nomesclatura":"'.$nomesclatura.'","id":"'.$id.'","id_padre":"'.$id_padre.'","tipo_elemento":"'.$tipo_elemento.'","extencion_elemento":"'.$extencion_elemento.'","ruta":"'.$ruta.'","codigo_archivo":"'.$codigo_archivo.'"},';

            	 }else if($nivel_acceso=='3'){

            	 			$sql_usuario="SELECT top 1 A.nivel4, A.nivel3, A.nivel2, A.nivel1
								FROM Seguridad.dbo.cargo AS A
								WHERE (A.nivel3='$codigo_cargo' or A.nivel2='$codigo_cargo' or A.nivel1='$codigo_cargo')";
				            	 $r = mssql_query($sql_usuario, $link);
						     	 if($ROW2 =  mssql_fetch_array($r))
						            {

						            	//if($ROW2['nivel4']=='0'){

						            		$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","nivel_acceso":"'.$nivel_acceso.'","nombre_nomesclatura":"'.$nombre_nomesclatura.'","nomesclatura":"'.$nomesclatura.'","id":"'.$id.'","id_padre":"'.$id_padre.'","tipo_elemento":"'.$tipo_elemento.'","extencion_elemento":"'.$extencion_elemento.'","ruta":"'.$ruta.'","codigo_archivo":"'.$codigo_archivo.'"},';

						            	//}

						            }

            	 }else if($nivel_acceso=='2'){

            	 			$sql_usuario2="SELECT top 1 A.nivel4, A.nivel3, A.nivel2, A.nivel1
								FROM Seguridad.dbo.cargo AS A
								WHERE (A.nivel2='$codigo_cargo' or A.nivel1='$codigo_cargo')";
				            	 $r2 = mssql_query($sql_usuario2, $link);
						     	 if($ROW3 =  mssql_fetch_array($r2))
						            {

						            	//if($ROW3['nivel3']=='0' && $ROW3['nivel4']=='0'){

						            		$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","nivel_acceso":"'.$nivel_acceso.'","nombre_nomesclatura":"'.$nombre_nomesclatura.'","nomesclatura":"'.$nomesclatura.'","id":"'.$id.'","id_padre":"'.$id_padre.'","tipo_elemento":"'.$tipo_elemento.'","extencion_elemento":"'.$extencion_elemento.'","ruta":"'.$ruta.'","codigo_archivo":"'.$codigo_archivo.'"},';

						            	//}

						            }

            	 }else if($nivel_acceso=='1'){

            	 			$sql_usuario2="SELECT top 1 A.nivel4, A.nivel3, A.nivel2, A.nivel1
								FROM Seguridad.dbo.cargo AS A
								WHERE (A.nivel1='$codigo_cargo')";
				            	 $r2 = mssql_query($sql_usuario2, $link);
						     	 if($ROW3 =  mssql_fetch_array($r2))
						            {

						            		$arreglo=$arreglo.'{"nombre_elemento":"'.$nombre_elemento.'","nivel_acceso":"'.$nivel_acceso.'","nombre_nomesclatura":"'.$nombre_nomesclatura.'","nomesclatura":"'.$nomesclatura.'","id":"'.$id.'","id_padre":"'.$id_padre.'","tipo_elemento":"'.$tipo_elemento.'","extencion_elemento":"'.$extencion_elemento.'","ruta":"'.$ruta.'","codigo_archivo":"'.$codigo_archivo.'"},';

						            	
						            }

            	 }




            }


           $cont1=strlen($arreglo);
		   $arreglo=substr($arreglo,0,($cont1-1));
           echo '{"data":['.$arreglo.']}';

   			
}

if ($accion == 'consulta_bases') {
    global $link;

    if (isset($_POST['id_padre'])) {
        $id_padre = intval($_POST['id_padre']);
    }
    elseif (isset($_GET['id_padre'])) {
        $id_padre = intval($_GET['id_padre']);
    }
    else {
        $id_padre = 0;
    }

    $sql = "
      SELECT id, nombre_elemento
      FROM [BDflexline].[TI].[base_repositorio]
      WHERE id_padre = {$id_padre}
        AND tipo_elemento = 1
      ORDER BY nombre_elemento
    ";

    $res = mssql_query($sql, $link);
    $bases = [];

    while ($row = mssql_fetch_array($res)) {
        $bases[] = [
            "id"     => $row['id'],
            "nombre" => utf8_encode($row['nombre_elemento'])
        ];
    }

    header('Content-Type: application/json');
    echo json_encode(["bases" => $bases]);
    exit;
}




if ($accion == 'consulta_directorio_completo') {
    $id_padre = intval($_GET['id_padre']);
    $codigo_cargo = $_SESSION['cod_cargo'];

    $sql = "SELECT nombre_elemento, nivel_acceso, codigo_archivo,
                   CASE 
                       WHEN nomesclatura = '' THEN nombre_elemento 
                       ELSE nomesclatura + ' - ' + nombre_elemento 
                   END AS nombre_nomesclatura,
                   nomesclatura, id, id_padre, tipo_elemento, extencion_elemento, 
                   REPLACE(ruta, '/', ' > ') AS ruta
            FROM BDflexline.TI.base_repositorio
            WHERE vigencia = 'SI' 
              AND (estado_gestion = 'OK' OR estado_gestion IS NULL)
              AND id_padre = $id_padre
              AND tipo_elemento IN (0, 1)
            ORDER BY nombre_nomesclatura";

    $RESP = mssql_query($sql, $link);
    $arreglo = [];

    while ($ROW = mssql_fetch_array($RESP)) {
        $nivel_acceso = $ROW['nivel_acceso'];

        $permitido = false;

        if ($nivel_acceso == '4' || $nivel_acceso == '') {
            $permitido = true;
        } elseif ($nivel_acceso == '3') {
            $sql_usuario = "SELECT TOP 1 nivel4, nivel3, nivel2, nivel1 
                            FROM Seguridad.dbo.cargo 
                            WHERE nivel3 = '$codigo_cargo' OR nivel2 = '$codigo_cargo' OR nivel1 = '$codigo_cargo'";
            $r = mssql_query($sql_usuario, $link);
            if (mssql_fetch_array($r)) {
                $permitido = true;
            }
        } elseif ($nivel_acceso == '2') {
            $sql_usuario2 = "SELECT TOP 1 nivel4, nivel3, nivel2, nivel1 
                             FROM Seguridad.dbo.cargo 
                             WHERE nivel2 = '$codigo_cargo' OR nivel1 = '$codigo_cargo'";
            $r2 = mssql_query($sql_usuario2, $link);
            if (mssql_fetch_array($r2)) {
                $permitido = true;
            }
        } elseif ($nivel_acceso == '1') {
            $sql_usuario3 = "SELECT TOP 1 nivel4, nivel3, nivel2, nivel1 
                             FROM Seguridad.dbo.cargo 
                             WHERE nivel1 = '$codigo_cargo'";
            $r3 = mssql_query($sql_usuario3, $link);
            if (mssql_fetch_array($r3)) {
                $permitido = true;
            }
        }

        if ($permitido) {
            $arreglo[] = [
                "nombre_elemento" => utf8_encode($ROW['nombre_elemento']),
                "nivel_acceso" => $nivel_acceso,
                "nombre_nomesclatura" => utf8_encode($ROW['nombre_nomesclatura']),
                "nomesclatura" => $ROW['nomesclatura'],
                "id" => $ROW['id'],
                "id_padre" => $ROW['id_padre'],
                "tipo_elemento" => $ROW['tipo_elemento'],
                "extencion_elemento" => $ROW['extencion_elemento'],
                "ruta" => utf8_encode($ROW['ruta']),
                "codigo_archivo" => $ROW['codigo_archivo']
            ];
        }
    }

    header('Content-Type: application/json');
    echo json_encode(["data" => $arreglo]);
    exit;
}


if ($accion == 'consulta_directorio_por_padre') {
    global $link;

    $id_padre = intval($_POST['id_padre']);

    $sql = "
      SELECT id, nombre_elemento
      FROM [BDflexline].[TI].[base_repositorio]
      WHERE id_padre = {$id_padre}
        AND tipo_elemento = 1
      ORDER BY nombre_elemento
    ";

    $res = mssql_query($sql, $link);
    $data = [];

    while ($row = mssql_fetch_array($res)) {
        $data[] = [
            'id'              => $row['id'],
            'nombre_elemento' => utf8_encode($row['nombre_elemento'])
        ];
    }

    header('Content-Type: application/json');
    echo json_encode(['data' => $data]);
    exit;
}


?>