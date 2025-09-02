<?php
include_once("../../../config/conex.php");
$link = Conexion();
require "../phpqrcode/qrlib.php"; 
require_once('tcpdf_include.php');

$numero_permiso	=$_REQUEST['num_permiso'];

$sql="SELECT id_permiso
			      ,num_permiso
			      ,area_solicitante
			      ,num_ot
			      ,tipo_permiso
			      ,numero_trabajadores
			      ,case when year(fecha_ini_ejecucion)=1900 THEN null else  cast(fecha_ini_ejecucion as date) END AS fecha_ini_ejecucion
				  ,case when year(fecha_termino_ejecucion)=1900 THEN null else  cast(fecha_termino_ejecucion as date) END AS fecha_termino_ejecucion
		      	  ,CASE WHEN CAST(fecha_termino_ejecucion AS DATE)>=CAST(GETDATE() AS DATE) THEN 'ABIERTO' ELSE 'CERRADO' END AS estado
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
			      ,case when year(fecha_creador)=1900 THEN null else  cast(fecha_creador as date) END AS fecha_creador
			      ,nick_modifica
			      ,case when year(fecha_modifica)=1900 THEN null else  cast(fecha_modifica as date) END AS fecha_modifica
			      ,area_autorizada
			      ,trabajo_a_realizar
			      ,detalle_tabajo_critico
			      ,codigo_area_solicitante
			      ,codigo_area_responsable
	FROM seguimiento.dbo.permiso_trabajo_nuevo
		  WHERE num_permiso='$numero_permiso'";

    $RES = mssql_query($sql, $link);
    while($ROW =  mssql_fetch_array($RES))
		{

$num_permiso              =$ROW['num_permiso'];
$num_ot                   =$ROW['num_ot'];
$area_solicitante           =utf8_encode($ROW['area_solicitante']);
$titulo_permiso      =$ROW['tipo_permiso'];
$numero_trabajadores        =$ROW['numero_trabajadores'];
$fecha_ini_ejecucion      =date("d/m/Y", strtotime($ROW['fecha_ini_ejecucion']));
$fecha_termino_ejecucion  =date("d/m/Y", strtotime($ROW['fecha_termino_ejecucion'])); 
$estado       =$ROW['estado'];
$hora_ini_ejecucion   =$ROW['hora_ini_ejecucion'];
$hora_termino_ejecucion   =$ROW['hora_termino_ejecucion'];
$empresa_contratista   =utf8_encode($ROW['empresa_contratista']);
$responsable_ejecucion   =utf8_encode($ROW['responsable_ejecucion']);
$area_responsable   =utf8_encode($ROW['area_responsable']);
$responsable_area   =str_replace('_', ' ', utf8_encode($ROW['responsable_area']));
$nick_creador   =$ROW['nick_creador'];

$fecha_creador =$ROW['fecha_creador'];
$nick_modifica =$ROW['nick_modifica'];
$fecha_modifica   =$ROW['fecha_modifica'];
$area_autorizada   =utf8_encode($ROW['area_autorizada']);
$trabajo_a_realizar   =utf8_encode($ROW['trabajo_a_realizar']);
$detalle_tabajo_critico   =utf8_encode($ROW['detalle_tabajo_critico']);
$codigo_area_solicitante   =$ROW['codigo_area_solicitante'];
$codigo_area_responsable   =$ROW['codigo_area_responsable'];
$I_tag_uno   =$ROW['I_tag_uno'];
$I_tag_dos   =$ROW['I_tag_dos'];
$I_tag_tres   =$ROW['I_tag_tres'];
$I_tag_cuatro  =$ROW['I_tag_cuatro'];
$I_tag_cinco   =$ROW['I_tag_cinco'];
$I_candado_uno   =$ROW['I_candado_uno'];
$I_candado_dos   =$ROW['I_candado_dos'];
$I_candado_tres   =$ROW['I_candado_tres'];
$I_candado_cuatro  =$ROW['I_candado_cuatro'];
$I_candado_cinco   =$ROW['I_candado_cinco'];




if($ROW['I_check_aislamiento_bloqueo']=='false'){$I_check_aislamiento_bloqueo= ''; }else{$I_check_aislamiento_bloqueo='checked'; }
if($ROW['II_check_trabajo_altura']=='false'){$II_check_trabajo_altura= ''; }else{$II_check_trabajo_altura='checked'; }
if($ROW['III_check_sumunistro_aire']=='false'){$III_check_sumunistro_aire= ''; }else{$III_check_sumunistro_aire='checked'; }
if($ROW['IV_check_operacion_levante']=='false'){$IV_check_operacion_levante= ''; }else{$IV_check_operacion_levante='checked'; }
if($ROW['V_check_cespacio_confinado']=='false'){$V_check_cespacio_confinado= ''; }else{$V_check_cespacio_confinado='checked'; }
if($ROW['VI_check_excavacion']=='false'){$VI_check_excavacion= ''; }else{$VI_check_excavacion='checked'; }
if($ROW['VII_check_equipos_electronicos']=='false'){$VII_check_equipos_electronicos= ''; }else{$VII_check_equipos_electronicos='checked'; }
if($ROW['VIII_check_atmosfera_peligrosa']=='false'){$VIII_check_atmosfera_peligrosa= ''; }else{$VIII_check_atmosfera_peligrosa='checked'; }
if($ROW['IX_check_trabajos_caliente']=='false'){$IX_check_trabajos_caliente= ''; }else{$IX_check_trabajos_caliente='checked'; }
if($ROW['X_check_lavado_alta_presion']=='false'){$X_check_lavado_alta_presion= ''; }else{$X_check_lavado_alta_presion='checked'; }
if($ROW['I_check_candado_si']=='false'){$I_check_candado_si= ''; }else{$I_check_candado_si='checked'; }
if($ROW['I_check_candado_no']=='false'){$I_check_candado_no= ''; }else{$I_check_candado_no='checked'; }
if($ROW['I_check_ccm']=='false'){$I_check_ccm= ''; }else{$I_check_ccm='checked'; }
if($ROW['I_check_tablero_electrico']=='false'){$I_check_tablero_electrico= ''; }else{$I_check_tablero_electrico='checked'; }
if($ROW['I_check_ww']=='false'){$I_check_ww= ''; }else{$I_check_ww='checked'; }
if($ROW['I_check_otro_subprincipio']=='false'){$I_check_otro_subprincipio= ''; }else{$I_check_otro_subprincipio='checked'; }
if($ROW['IIa_check_si']=='false'){$IIa_check_si= ''; }else{$IIa_check_si='checked'; }
if($ROW['IIa_check_no']=='false'){$IIa_check_no= ''; }else{$IIa_check_no='checked'; }
if($ROW['IIb_check_si']=='false'){$IIb_check_si= ''; }else{$IIb_check_si='checked'; }
if($ROW['IIb_check_no']=='false'){$IIb_check_no= ''; }else{$IIb_check_no='checked'; }
if($ROW['IIc_check_si']=='false'){$IIc_check_si= ''; }else{$IIc_check_si='checked'; }
if($ROW['IIc_check_no']=='false'){$IIc_check_no= ''; }else{$IIc_check_no='checked'; }
if($ROW['IId_check_si']=='false'){$IId_check_si= ''; }else{$IId_check_si='checked'; }
if($ROW['IId_check_no']=='false'){$IId_check_no= ''; }else{$IId_check_no='checked'; }
if($ROW['IIe_check_si']=='false'){$IIe_check_si= ''; }else{$IIe_check_si='checked'; }
if($ROW['IIe_check_no']=='false'){$IIe_check_no= ''; }else{$IIe_check_no='checked'; }
if($ROW['IIf_check_si']=='false'){$IIf_check_si= ''; }else{$IIf_check_si='checked'; }
if($ROW['IIf_check_no']=='false'){$IIf_check_no= ''; }else{$IIf_check_no='checked'; }
if($ROW['IIg_check_si']=='false'){$IIg_check_si= ''; }else{$IIg_check_si='checked'; }
if($ROW['IIg_check_no']=='false'){$IIg_check_no= ''; }else{$IIg_check_no='checked'; }
if($ROW['IIh_check_si']=='false'){$IIh_check_si= ''; }else{$IIh_check_si='checked'; }
if($ROW['IIh_check_no']=='false'){$IIh_check_no= ''; }else{$IIh_check_no='checked'; }
if($ROW['IIi_check_si']=='false'){$IIi_check_si= ''; }else{$IIi_check_si='checked'; }
if($ROW['IIi_check_no']=='false'){$IIi_check_no= ''; }else{$IIi_check_no='checked'; }
if($ROW['IIj_check_si']=='false'){$IIj_check_si= ''; }else{$IIj_check_si='checked'; }
if($ROW['IIj_check_no']=='false'){$IIj_check_no= ''; }else{$IIj_check_no='checked'; }
if($ROW['IIIa_check_si']=='false'){$IIIa_check_si= ''; }else{$IIIa_check_si='checked'; }
if($ROW['IIIa_check_no']=='false'){$IIIa_check_no= ''; }else{$IIIa_check_no='checked'; }
if($ROW['IIIb_check_si']=='false'){$IIIb_check_si= ''; }else{$IIIb_check_si='checked'; }
if($ROW['IIIb_check_no']=='false'){$IIIb_check_no= ''; }else{$IIIb_check_no='checked'; }
if($ROW['IIIc_check_si']=='false'){$IIIc_check_si= ''; }else{$IIIc_check_si='checked'; }
if($ROW['IIIc_check_no']=='false'){$IIIc_check_no= ''; }else{$IIIc_check_no='checked'; }
if($ROW['IIId_check_si']=='false'){$IIId_check_si= ''; }else{$IIId_check_si='checked'; }
if($ROW['IIId_check_no']=='false'){$IIId_check_no= ''; }else{$IIId_check_no='checked'; }
if($ROW['IIIe_check_si']=='false'){$IIIe_check_si= ''; }else{$IIIe_check_si='checked'; }
if($ROW['IIIe_check_no']=='false'){$IIIe_check_no= ''; }else{$IIIe_check_no='checked'; }
if($ROW['IIIf_check_si']=='false'){$IIIf_check_si= ''; }else{$IIIf_check_si='checked'; }
if($ROW['IIIf_check_no']=='false'){$IIIf_check_no= ''; }else{$IIIf_check_no='checked'; }
if($ROW['IIIg_check_si']=='false'){$IIIg_check_si= ''; }else{$IIIg_check_si='checked'; }
if($ROW['IIIg_check_no']=='false'){$IIIg_check_no= ''; }else{$IIIg_check_no='checked'; }
if($ROW['IIIh_check_si']=='false'){$IIIh_check_si= ''; }else{$IIIh_check_si='checked'; }
if($ROW['IIIh_check_no']=='false'){$IIIh_check_no= ''; }else{$IIIh_check_no='checked'; }
if($ROW['IIIi_check_si']=='false'){$IIIi_check_si= ''; }else{$IIIi_check_si='checked'; }
if($ROW['IIIi_check_no']=='false'){$IIIi_check_no= ''; }else{$IIIi_check_no='checked'; }
if($ROW['IVa_check_si']=='false'){$IVa_check_si= ''; }else{$IVa_check_si='checked'; }
if($ROW['IVa_check_no']=='false'){$IVa_check_no= ''; }else{$IVa_check_no='checked'; }
if($ROW['IVb_check_si']=='false'){$IVb_check_si= ''; }else{$IVb_check_si='checked'; }
if($ROW['IVb_check_no']=='false'){$IVb_check_no= ''; }else{$IVb_check_no='checked'; }
if($ROW['IVc_check_si']=='false'){$IVc_check_si= ''; }else{$IVc_check_si='checked'; }
if($ROW['IVc_check_no']=='false'){$IVc_check_no= ''; }else{$IVc_check_no='checked'; }
if($ROW['IVd_check_si']=='false'){$IVd_check_si= ''; }else{$IVd_check_si='checked'; }
if($ROW['IVd_check_no']=='false'){$IVd_check_no= ''; }else{$IVd_check_no='checked'; }
if($ROW['IVe_check_si']=='false'){$IVe_check_si= ''; }else{$IVe_check_si='checked'; }
if($ROW['IVe_check_no']=='false'){$IVe_check_no= ''; }else{$IVe_check_no='checked'; }
if($ROW['IVf_check_si']=='false'){$IVf_check_si= ''; }else{$IVf_check_si='checked'; }
if($ROW['IVf_check_no']=='false'){$IVf_check_no= ''; }else{$IVf_check_no='checked'; }
if($ROW['IVg_check_si']=='false'){$IVg_check_si= ''; }else{$IVg_check_si='checked'; }
if($ROW['IVg_check_no']=='false'){$IVg_check_no= ''; }else{$IVg_check_no='checked'; }
if($ROW['IVh_check_si']=='false'){$IVh_check_si= ''; }else{$IVh_check_si='checked'; }
if($ROW['IVh_check_no']=='false'){$IVh_check_no= ''; }else{$IVh_check_no='checked'; }
if($ROW['IVi_check_si']=='false'){$IVi_check_si= ''; }else{$IVi_check_si='checked'; }
if($ROW['IVi_check_no']=='false'){$IVi_check_no= ''; }else{$IVi_check_no='checked'; }
if($ROW['Va_check_si']=='false'){$Va_check_si= ''; }else{$Va_check_si='checked'; }
if($ROW['Va_check_no']=='false'){$Va_check_no= ''; }else{$Va_check_no='checked'; }
if($ROW['Vb_check_si']=='false'){$Vb_check_si= ''; }else{$Vb_check_si='checked'; }
if($ROW['Vb_check_no']=='false'){$Vb_check_no= ''; }else{$Vb_check_no='checked'; }
if($ROW['Vc_check_si']=='false'){$Vc_check_si= ''; }else{$Vc_check_si='checked'; }
if($ROW['Vc_check_no']=='false'){$Vc_check_no= ''; }else{$Vc_check_no='checked'; }
if($ROW['Vd_check_si']=='false'){$Vd_check_si= ''; }else{$Vd_check_si='checked'; }
if($ROW['Vd_check_no']=='false'){$Vd_check_no= ''; }else{$Vd_check_no='checked'; }
if($ROW['Ve_check_si']=='false'){$Ve_check_si= ''; }else{$Ve_check_si='checked'; }
if($ROW['Ve_check_no']=='false'){$Ve_check_no= ''; }else{$Ve_check_no='checked'; }
if($ROW['Vf_check_si']=='false'){$Vf_check_si= ''; }else{$Vf_check_si='checked'; }
if($ROW['Vf_check_no']=='false'){$Vf_check_no= ''; }else{$Vf_check_no='checked'; }
if($ROW['Vg_check_si']=='false'){$Vg_check_si= ''; }else{$Vg_check_si='checked'; }
if($ROW['Vg_check_no']=='false'){$Vg_check_no= ''; }else{$Vg_check_no='checked'; }
if($ROW['Vh_check_si']=='false'){$Vh_check_si= ''; }else{$Vh_check_si='checked'; }
if($ROW['Vh_check_no']=='false'){$Vh_check_no= ''; }else{$Vh_check_no='checked'; }
if($ROW['Vi_check_si']=='false'){$Vi_check_si= ''; }else{$Vi_check_si='checked'; }
if($ROW['Vi_check_no']=='false'){$Vi_check_no= ''; }else{$Vi_check_no='checked'; }
if($ROW['VIa_check_si']=='false'){$VIa_check_si= ''; }else{$VIa_check_si='checked'; }
if($ROW['VIa_check_no']=='false'){$VIa_check_no= ''; }else{$VIa_check_no='checked'; }
if($ROW['VIb_check_si']=='false'){$VIb_check_si= ''; }else{$VIb_check_si='checked'; }
if($ROW['VIb_check_no']=='false'){$VIb_check_no= ''; }else{$VIb_check_no='checked'; }
if($ROW['VIc_check_si']=='false'){$VIc_check_si= ''; }else{$VIc_check_si='checked'; }
if($ROW['VIc_check_no']=='false'){$VIc_check_no= ''; }else{$VIc_check_no='checked'; }
if($ROW['VId_check_si']=='false'){$VId_check_si= ''; }else{$VId_check_si='checked'; }
if($ROW['VId_check_no']=='false'){$VId_check_no= ''; }else{$VId_check_no='checked'; }
if($ROW['VIe_check_si']=='false'){$VIe_check_si= ''; }else{$VIe_check_si='checked'; }
if($ROW['VIe_check_no']=='false'){$VIe_check_no= ''; }else{$VIe_check_no='checked'; }
if($ROW['VIf_check_si']=='false'){$VIf_check_si= ''; }else{$VIf_check_si='checked'; }
if($ROW['VIf_check_no']=='false'){$VIf_check_no= ''; }else{$VIf_check_no='checked'; }
if($ROW['VIg_check_si']=='false'){$VIg_check_si= ''; }else{$VIg_check_si='checked'; }
if($ROW['VIg_check_no']=='false'){$VIg_check_no= ''; }else{$VIg_check_no='checked'; }
if($ROW['VIh_check_si']=='false'){$VIh_check_si= ''; }else{$VIh_check_si='checked'; }
if($ROW['VIh_check_no']=='false'){$VIh_check_no= ''; }else{$VIh_check_no='checked'; }
if($ROW['VIi_check_si']=='false'){$VIi_check_si= ''; }else{$VIi_check_si='checked'; }
if($ROW['VIi_check_no']=='false'){$VIi_check_no= ''; }else{$VIi_check_no='checked'; }
if($ROW['VIj_check_si']=='false'){$VIj_check_si= ''; }else{$VIj_check_si='checked'; }
if($ROW['VIj_check_no']=='false'){$VIj_check_no= ''; }else{$VIj_check_no='checked'; }
if($ROW['VIIa_check_si']=='false'){$VIIa_check_si= ''; }else{$VIIa_check_si='checked'; }
if($ROW['VIIa_check_no']=='false'){$VIIa_check_no= ''; }else{$VIIa_check_no='checked'; }
if($ROW['VIIb_check_si']=='false'){$VIIb_check_si= ''; }else{$VIIb_check_si='checked'; }
if($ROW['VIIb_check_no']=='false'){$VIIb_check_no= ''; }else{$VIIb_check_no='checked'; }
if($ROW['VIIc_check_si']=='false'){$VIIc_check_si= ''; }else{$VIIc_check_si='checked'; }
if($ROW['VIIc_check_no']=='false'){$VIIc_check_no= ''; }else{$VIIc_check_no='checked'; }
if($ROW['VIId_check_si']=='false'){$VIId_check_si= ''; }else{$VIId_check_si='checked'; }
if($ROW['VIId_check_no']=='false'){$VIId_check_no= ''; }else{$VIId_check_no='checked'; }
if($ROW['VIIe_check_si']=='false'){$VIIe_check_si= ''; }else{$VIIe_check_si='checked'; }
if($ROW['VIIe_check_no']=='false'){$VIIe_check_no= ''; }else{$VIIe_check_no='checked'; }
if($ROW['VIIf_check_si']=='false'){$VIIf_check_si= ''; }else{$VIIf_check_si='checked'; }
if($ROW['VIIf_check_no']=='false'){$VIIf_check_no= ''; }else{$VIIf_check_no='checked'; }
if($ROW['VIIg_check_si']=='false'){$VIIg_check_si= ''; }else{$VIIg_check_si='checked'; }
if($ROW['VIIg_check_no']=='false'){$VIIg_check_no= ''; }else{$VIIg_check_no='checked'; }
if($ROW['VIIh_check_si']=='false'){$VIIh_check_si= ''; }else{$VIIh_check_si='checked'; }
if($ROW['VIIh_check_no']=='false'){$VIIh_check_no= ''; }else{$VIIh_check_no='checked'; }
if($ROW['VIIi_check_si']=='false'){$VIIi_check_si= ''; }else{$VIIi_check_si='checked'; }
if($ROW['VIIi_check_no']=='false'){$VIIi_check_no= ''; }else{$VIIi_check_no='checked'; }
if($ROW['VIIIa_check_si']=='false'){$VIIIa_check_si= ''; }else{$VIIIa_check_si='checked'; }
if($ROW['VIIIa_check_no']=='false'){$VIIIa_check_no= ''; }else{$VIIIa_check_no='checked'; }
if($ROW['VIIIb_check_si']=='false'){$VIIIb_check_si= ''; }else{$VIIIb_check_si='checked'; }
if($ROW['VIIIb_check_no']=='false'){$VIIIb_check_no= ''; }else{$VIIIb_check_no='checked'; }
if($ROW['VIIIc_check_si']=='false'){$VIIIc_check_si= ''; }else{$VIIIc_check_si='checked'; }
if($ROW['VIIIc_check_no']=='false'){$VIIIc_check_no= ''; }else{$VIIIc_check_no='checked'; }
if($ROW['VIIId_check_si']=='false'){$VIIId_check_si= ''; }else{$VIIId_check_si='checked'; }
if($ROW['VIIId_check_no']=='false'){$VIIId_check_no= ''; }else{$VIIId_check_no='checked'; }
if($ROW['VIIIe_check_si']=='false'){$VIIIe_check_si= ''; }else{$VIIIe_check_si='checked'; }
if($ROW['VIIIe_check_no']=='false'){$VIIIe_check_no= ''; }else{$VIIIe_check_no='checked'; }
if($ROW['VIIIf_check_si']=='false'){$VIIIf_check_si= ''; }else{$VIIIf_check_si='checked'; }
if($ROW['VIIIf_check_no']=='false'){$VIIIf_check_no= ''; }else{$VIIIf_check_no='checked'; }
if($ROW['VIIIg_check_si']=='false'){$VIIIg_check_si= ''; }else{$VIIIg_check_si='checked'; }
if($ROW['VIIIg_check_no']=='false'){$VIIIg_check_no= ''; }else{$VIIIg_check_no='checked'; }
if($ROW['VIIIh_check_si']=='false'){$VIIIh_check_si= ''; }else{$VIIIh_check_si='checked'; }
if($ROW['VIIIh_check_no']=='false'){$VIIIh_check_no= ''; }else{$VIIIh_check_no='checked'; }
if($ROW['IXa_check_si']=='false'){$IXa_check_si= ''; }else{$IXa_check_si='checked'; }
if($ROW['IXa_check_no']=='false'){$IXa_check_no= ''; }else{$IXa_check_no='checked'; }
if($ROW['IXb_check_si']=='false'){$IXb_check_si= ''; }else{$IXb_check_si='checked'; }
if($ROW['IXb_check_no']=='false'){$IXb_check_no= ''; }else{$IXb_check_no='checked'; }
if($ROW['IXc_check_si']=='false'){$IXc_check_si= ''; }else{$IXc_check_si='checked'; }
if($ROW['IXc_check_no']=='false'){$IXc_check_no= ''; }else{$IXc_check_no='checked'; }
if($ROW['IXd_check_si']=='false'){$IXd_check_si= ''; }else{$IXd_check_si='checked'; }
if($ROW['IXd_check_no']=='false'){$IXd_check_no= ''; }else{$IXd_check_no='checked'; }
if($ROW['IXe_check_si']=='false'){$IXe_check_si= ''; }else{$IXe_check_si='checked'; }
if($ROW['IXe_check_no']=='false'){$IXe_check_no= ''; }else{$IXe_check_no='checked'; }
if($ROW['IXf_check_si']=='false'){$IXf_check_si= ''; }else{$IXf_check_si='checked'; }
if($ROW['IXf_check_no']=='false'){$IXf_check_no= ''; }else{$IXf_check_no='checked'; }
if($ROW['IXg_check_si']=='false'){$IXg_check_si= ''; }else{$IXg_check_si='checked'; }
if($ROW['IXg_check_no']=='false'){$IXg_check_no= ''; }else{$IXg_check_no='checked'; }
if($ROW['IXh_check_si']=='false'){$IXh_check_si= ''; }else{$IXh_check_si='checked'; }
if($ROW['IXh_check_no']=='false'){$IXh_check_no= ''; }else{$IXh_check_no='checked'; }
if($ROW['Xa_check_si']=='false'){$Xa_check_si= ''; }else{$Xa_check_si='checked'; }
if($ROW['Xa_check_no']=='false'){$Xa_check_no= ''; }else{$Xa_check_no='checked'; }
if($ROW['Xb_check_si']=='false'){$Xb_check_si= ''; }else{$Xb_check_si='checked'; }
if($ROW['Xb_check_no']=='false'){$Xb_check_no= ''; }else{$Xb_check_no='checked'; }
if($ROW['Xc_check_si']=='false'){$Xc_check_si= ''; }else{$Xc_check_si='checked'; }
if($ROW['Xc_check_no']=='false'){$Xc_check_no= ''; }else{$Xc_check_no='checked'; }
if($ROW['Xd_check_si']=='false'){$Xd_check_si= ''; }else{$Xd_check_si='checked'; }
if($ROW['Xd_check_no']=='false'){$Xd_check_no= ''; }else{$Xd_check_no='checked'; }
if($ROW['Xe_check_si']=='false'){$Xe_check_si= ''; }else{$Xe_check_si='checked'; }
if($ROW['Xe_check_no']=='false'){$Xe_check_no= ''; }else{$Xe_check_no='checked'; }
if($ROW['Xf_check_si']=='false'){$Xf_check_si= ''; }else{$Xf_check_si='checked'; }
if($ROW['Xf_check_no']=='false'){$Xf_check_no= ''; }else{$Xf_check_no='checked'; }
if($ROW['Xg_check_si']=='false'){$Xg_check_si= ''; }else{$Xg_check_si='checked'; }
if($ROW['Xg_check_no']=='false'){$Xg_check_no= ''; }else{$Xg_check_no='checked'; }
if($ROW['Xh_check_si']=='false'){$Xh_check_si= ''; }else{$Xh_check_si='checked'; }
if($ROW['Xh_check_no']=='false'){$Xh_check_no= ''; }else{$Xh_check_no='checked'; }
if($ROW['Xi_check_si']=='false'){$Xi_check_si= ''; }else{$Xi_check_si='checked'; }
if($ROW['Xi_check_no']=='false'){$Xi_check_no= ''; }else{$Xi_check_no='checked'; }
if($ROW['XII_check_herr_electr']=='false'){$XII_check_herr_electr= ''; }else{$XII_check_herr_electr='checked'; }
if($ROW['XII_check_herr_manual']=='false'){$XII_check_herr_manual= ''; }else{$XII_check_herr_manual='checked'; }
if($ROW['XII_check_camion_grua']=='false'){$XII_check_camion_grua= ''; }else{$XII_check_camion_grua='checked'; }
if($ROW['XII_check_andamio']=='false'){$XII_check_andamio= ''; }else{$XII_check_andamio='checked'; }
if($ROW['XII_check_soldadura_arco']=='false'){$XII_check_soldadura_arco= ''; }else{$XII_check_soldadura_arco='checked'; }
if($ROW['XII_check_compresor']=='false'){$XII_check_compresor= ''; }else{$XII_check_compresor='checked'; }
if($ROW['XII_check_soldadura_oxi']=='false'){$XII_check_soldadura_oxi= ''; }else{$XII_check_soldadura_oxi='checked'; }
if($ROW['XIII_check_ruido']=='false'){$XIII_check_ruido= ''; }else{$XIII_check_ruido='checked'; }
if($ROW['XIII_check_caida']=='false'){$XIII_check_caida= ''; }else{$XIII_check_caida='checked'; }
if($ROW['XIII_check_riego_electrico']=='false'){$XIII_check_riego_electrico= ''; }else{$XIII_check_riego_electrico='checked'; }
if($ROW['XIII_check_contacto_quimico']=='false'){$XIII_check_contacto_quimico= ''; }else{$XIII_check_contacto_quimico='checked'; }
if($ROW['XIII_check_exposicion_gas']=='false'){$XIII_check_exposicion_gas= ''; }else{$XIII_check_exposicion_gas='checked'; }
if($ROW['XIII_check_estres']=='false'){$XIII_check_estres= ''; }else{$XIII_check_estres='checked'; }
if($ROW['XIII_check_proyeccion']=='false'){$XIII_check_proyeccion= ''; }else{$XIII_check_proyeccion='checked'; }
if($ROW['XIII_check_exposicion_polvo']=='false'){$XIII_check_exposicion_polvo= ''; }else{$XIII_check_exposicion_polvo='checked'; }
if($ROW['XIII_check_contacto_sup_caliente']=='false'){$XIII_check_contacto_sup_caliente= ''; }else{$XIII_check_contacto_sup_caliente='checked'; }
if($ROW['XIV_check_conos']=='false'){$XIV_check_conos= ''; }else{$XIV_check_conos='checked'; }
if($ROW['XIV_check_cinta']=='false'){$XIV_check_cinta= ''; }else{$XIV_check_cinta='checked'; }
if($ROW['XIV_check_barreras']=='false'){$XIV_check_barreras= ''; }else{$XIV_check_barreras='checked'; }
if($ROW['XIV_check_senalizacion']=='false'){$XIV_check_senalizacion= ''; }else{$XIV_check_senalizacion='checked'; }





		}
		
global $id_permiso;
global $numero_permiso;
  
$QR='';

$texto='http://190.13.129.41/sistemas/repositorio/tcpdf/permiso.php?numero_permiso='.$numero_permiso;

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
$pdf->SetFont('Helvetica','',7);


$html ='  <br><br>   <table border ="1" style="margin: 0 auto;">
							<tr>
									<td width="30%" style="text-align:center;"><br/><br/><br/><img src="images/logo.jpg" width="100"><br/></td>
									<td width="40%" style="text-align:center;"><br/><br/><strong>'.$titulo_permiso.'</strong><br/> N° '.$numero_permiso.' </td>
									<td width="30%" style="text-align:center;"><br/><br/>&nbsp;&nbsp;<img src="images/temp/'.$numero_permiso.'.png" width="60" height="50"></td>
							</tr>
			 </table>
		
			<br/><br/>		
		
		    <table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="70%"></td>
							<td width="20%"><label><strong>N° Trabajadores</strong>:</label> '.$numero_trabajadores.'</td>
							<td width="15%"><label><strong>N° OT</strong>:</label> '.$numero_permiso.' </td>
						</tr>						
			</table>	

            	
			
			<label><strong>Área Solicitante</strong>: </label>'.$area_solicitante.' <br/>
			<label><strong>Trabajo a realizar</strong>: </label>'.$trabajo_a_realizar.'<br/>
			<label><strong>Ubicación del trabajo</strong>: </label>'.$area_autorizada.'<br/>
			<label><strong>Contratista</strong>: </label>'.$empresa_contratista.'<br/>
			<label><strong>Responsable_ejecucion</strong>: </label>'.$responsable_ejecucion.'<br/>
			<label><strong>Area Responsable</strong>: </label>'.$area_responsable.'<br/>
			<label><strong>Responsable del Area</strong>: </label>'.$responsable_area.'<br/>

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
			<label><strong>TIPOS DE TRABAJO CRÍTICO:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$I_check_aislamiento_bloqueo.'"> I.- AISLAMIENTO Y BLOQUEO</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$II_check_trabajo_altura.'"> II.- TRABAJO EN ALTURA</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$III_check_sumunistro_aire.'"> III.- SUMINISTRO DE AIRE</label></td>
						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IV_check_operacion_levante.'"> IV.- OPERACIÓN DE LEVANTE</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$V_check_cespacio_confinado.'"> V.- ESPACIO CONFINADO</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VI_check_excavacion.'"> VI.- EXCAVACIÓN</label></td>
						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VII_check_equipos_electronicos.'"> VII.- EQUIPOS ELÉCTRICOS</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIII_check_atmosfera_peligrosa.'"> VIII.- ATMOSFERA PELIGROSA</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IX_check_trabajos_caliente.'"> IX.- TRABAJOS EN CALIENTE</label></td>
						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$X_check_lavado_alta_presion.'"> X.- LAVADO ALTA PRESIÓN</label></td>
						</tr>

			</table>
			<label>DETALLE : </label>'.$detalle_tabajo_critico.'						

			<br/>
            <hr/>
           <label><strong>I. AISLAMIENTO Y BLOQUEO:</strong></label><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
						    <td rowspan="1" ><label>Tag de equipo:</label></td>
							<td rowspan="1" ><label> N°:</label>'.$I_tag_uno.'</td>
							<td rowspan="1" ><label> N°:</label>'.$I_tag_dos.'</td>
							<td rowspan="1" ><label> N°:</label>'.$I_tag_tres.'</td>
							<td rowspan="1" ><label> N°:</label>'.$I_tag_cuatro.'</td>
							<td rowspan="1" ><label> N°:</label>'.$I_tag_cinco.'</td>
						</tr>					
			</table><br><br>
			<table style="margin: 0 auto; text-align:left;">

						<tr><td><label>Colocar candado:</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$I_check_candado_si.'"> SI</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$I_check_candado_no.'"> NO</label></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						
			</table><br><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
						    <td><label>Desconectarse desde:</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$I_check_ccm.'"> CCM</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$I_check_tablero_electrico.'"> Tablero Eléctrico </label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$I_check_ww.'"> W/W</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$I_check_otro_subprincipio.'"> Otro (Subprincipio)</label></td>
							<td></td>

						</tr>						
			</table><br><br>
			<table style="margin: 0 auto; text-align:left;">
						<tr>
						<td rowspan="1" ><label>Candados:</label></td>
							<td rowspan="1" ><label> N°:</label>'.$I_candado_uno.'</td>
							<td rowspan="1" ><label> N°:</label>'.$I_candado_dos.'</td>
							<td rowspan="1" ><label> N°:</label>'.$I_candado_tres.'</td>
							<td rowspan="1" ><label> N°:</label>'.$I_candado_cuatro.'</td>
							<td rowspan="1" ><label> N°:</label>'.$I_candado_cinco.'</td>
						</tr>					
			</table>

			<br/>
            <hr/>	

            <label><strong>II. TRABAJOS EN ALTURA:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="6%"><label>SI NO</label></td>
							<td width="94%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIa_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIa_check_no.'"></td>
							<td><label>Personal capacitado en procedimiento para Trabajos en altura.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIb_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIb_check_no.'"></td>
							<td><label>Mantener libre de materiales la plataforma de trabajo.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIc_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIc_check_no.'"></td>
							<td><label>La escalera cuenta con los dispositivos de seguridad.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IId_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IId_check_no.'"></td>
							<td><label>Inspección de arnés, puntos de anclaje, andamios, escaleras, equipos y herramientas antes de su uso.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIe_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIe_check_no.'"></td>
							<td><label>Se debe colocar una linea o cuerda de vida adicional.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIf_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIf_check_no.'"></td>
							<td><label>Barandas a partir de 1 metro de altura.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIg_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIg_check_no.'"></td>
							<td><label>Se debe utilizar baldes para subir o bajar herramientas o elementos.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIh_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIh_check_no.'"></td>
							<td><label>Si el andamio supera los 2 cuerpos debe estar anclado a estructura fija.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIi_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIi_check_no.'"></td>
							<td><label>Al andamio o plataforma está aprobado.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIj_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIj_check_no.'"></td>
							<td><label>Señalizar con cinta de peligro o letreros el área de la zona de trabajo.</label></td>
						</tr>

			</table>

			<br/>
            <hr/>		
            <label><strong>III. SUMINISTRO DE AIRE:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="6%"><label>SI NO</label></td>
							<td width="94%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIa_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIa_check_no.'"></td>
							<td><label>Personal capacitado en procedimiento para trabajos con suministro de aire.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIb_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIb_check_no.'"></td>
							<td><label>Inspección previa del compresor.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIc_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIc_check_no.'"></td>
							<td><label>Verificar que cuente con su mantención al día.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIId_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIId_check_no.'"></td>
							<td><label>Revisar que el compresor tenga válvula de seguridad y manómetro operativo.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIe_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIe_check_no.'"></td>
							<td><label>Condición de mangueras y conexiones.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIf_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIf_check_no.'"></td>
							<td><label>Utilizar mangueras sin grietas, desgastes ni reparaciones caseras.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIg_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIg_check_no.'"></td>
							<td><label>Uso de reguladores de presión.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIh_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIh_check_no.'"></td>
							<td><label>Uso de válvulas de retención y purgadores.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIi_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IIIi_check_no.'"></td>
							<td><label>Prohibido el uso de aire comprimido para limpiar ropa o cuerpo humano.</label></td>
						</tr>

			</table>
			<br/>
            <hr/>	
            <label><strong>IV. OPERACIÓN DE LEVANTE:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="6%"><label>SI NO</label></td>
							<td width="94%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVa_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVa_check_no.'"></td>
							<td><label>Equipos de levante certificados y con mantención vigente.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVb_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVb_check_no.'"></td>
							<td><label>Inspección visual de todos los accesorios de izaje antes del uso.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVc_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVc_check_no.'"></td>
							<td><label>Estabilizadores extendidos y nivelados (en caso de camión grúa).</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVd_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVd_check_no.'"></td>
							<td><label>Vía de desplazamiento de carga despejada.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVe_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVe_check_no.'"></td>
							<td><label>Área señalizada y delimitada.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVf_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVf_check_no.'"></td>
							<td><label>El señalero o Rigger debera usar chaquetra reflectante diferente al resto del personal.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVg_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVg_check_no.'"></td>
							<td><label>Toda carga será manipulada a traves de cuerdas guías o vientos.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVh_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVh_check_no.'"></td>
							<td><label>Operador debidamente acreditado (licencia o curso según tipo de equipo).</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVi_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IVi_check_no.'"></td>
							<td><label>No se realizarán maniobras de izaje con viento mayor a 30 Km/hr.</label></td>
						</tr>

			</table>
			<br/>
            <hr/>	
            <label><strong>V. ESPACIO CONFINADO:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="6%"><label>SI NO</label></td>
							<td width="94%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Va_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Va_check_no.'"></td>
							<td><label>Personal capacitado en Procedimiento de Trabajos en espacios confinados.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vb_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vb_check_no.'"></td>
							<td><label>Personal debera contar con examen vigente que acredite salud compatible.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vc_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vc_check_no.'"></td>
							<td><label>Medición de atmósfera interna ANTES del ingreso ,asegurar que se inicien y mantengan las tareas.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vd_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vd_check_no.'"></td>
							<td><label>0 % del límite inferior de explosividad (LEL), 0 ppm de ácido sulfhídrico (H2S).</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Ve_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Ve_check_no.'"></td>
							<td><label>0 ppm Monóxido de Carbono y 21 % Oxígeno.(Detector Multigas Fijo).</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vf_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vf_check_no.'"></td>
							<td><label>Se debe contar con accesos adecuados para aegurar la salida rápida en casos de emergencia.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vg_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vg_check_no.'"></td>
							<td><label>Ventilar el espacio con sistemas forzados (extractores o inyectores de aire limpio) antes y durante el trabajo.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vh_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vh_check_no.'"></td>
							<td><label>En caso de atmósfera peligrosa, aplicar sistemas de purga con aire o gases inertes según corresponda.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vi_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Vi_check_no.'"></td>
							<td><label>Iluminación de baja tensión (24 V o a prueba de explosión).</label></td>
						</tr>

			</table>

		

	  ';


$html2=' <br><hr/> 
		
            <label><strong>VI. EXCAVACIÓN:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="6%"><label>SI NO</label></td>
							<td width="94%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIa_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIa_check_no.'"></td>
							<td><label>Personal capacitado en Procedimiento de Trabajos en excavación.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIb_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIb_check_no.'"></td>
							<td><label>Demarcar y señalizar visiblemente la zona de trabajo.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIc_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIc_check_no.'"></td>
							<td><label>Instalar iluminación artificial si se trabaja en condiciones de poca luz.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VId_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VId_check_no.'"></td>
							<td><label>Evitar maquinaria pesada a menos de 2 metros del borde de la excavación.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIe_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIe_check_no.'"></td>
							<td><label>Usar pendiente natural adecuada o entibar si el terreno es inestable.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIf_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIf_check_no.'"></td>
							<td><label>Escalera fija o acceso seguro cada 7 metros.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIg_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIg_check_no.'"></td>
							<td><label>Comunicación radial constante si se trabaja con maquinaria pesada en paralelo.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIh_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIh_check_no.'"></td>
							<td><label>Designación de vigía o señalizador, si hay interacción con camiones u otros equipos.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIi_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIi_check_no.'"></td>
							<td><label>Instalación de malla naranjo o reja metálica para evitar caída de personas en excavaciones.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIj_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIj_check_no.'"></td>
							<td><label>Registro de inspecciones diarias (condiciones del talud, accesos, estado general).</label></td>
						</tr>

			</table>
			<br/>
            <hr/>		
            <label><strong>VII. EQUIPOS ELECTRICOS:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="6%"><label>SI NO</label></td>
							<td width="94%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIa_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIa_check_no.'"></td>
							<td><label>Personal capacitado en Procedimiento de Trabajos con equipos eléctricos.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIb_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIb_check_no.'"></td>
							<td><label>Aislamiento y bloqueo eléctrico (LOTO).</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIc_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIc_check_no.'"></td>
							<td><label>Desenergizar completamente los equipos antes de intervenirlos.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIId_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIId_check_no.'"></td>
							<td><label>Colocar candados y tarjetas de bloqueo personales.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIe_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIe_check_no.'"></td>
							<td><label>Verificar ausencia de tensión con instrumento adecuado (multímetro o detector de voltaje).</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIf_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIf_check_no.'"></td>
							<td><label>Inspección visual de herramientas antes del uso: sin daños, aislación intacta, sin humedad.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIg_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIg_check_no.'"></td>
							<td><label>Uso de instrumentos de medición calibrados y apropiados para el nivel de tensión.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIh_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIh_check_no.'"></td>
							<td><label>Prohibido usar alargadores o conexiones improvisadas.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIi_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIi_check_no.'"></td>
							<td><label>Sólo pueden ejecutar tareas eléctricas los trabajadores autorizados y certificados por la empresa.</label></td>
						</tr>

			</table>
			<br/>
            <hr/>	
             <label><strong>VIII. ATMOSFERA PELIGROSA:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="6%"><label>SI NO</label></td>
							<td width="94%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIa_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIa_check_no.'"></td>
							<td><label>Personal capacitado en Procedimiento de trabajos con atmosfera peligrosa.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIb_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIb_check_no.'"></td>
							<td><label>Antes de comenzar los trabajos se deberá realizar mediciones ambientales y mantener un registro .</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIc_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIc_check_no.'"></td>
							<td><label>Asegurar que se inicien y mantengan las tareas en condiciones de 0 % del límite inferior de explosividad 0 ppm de ácido sulfhídrico (H2S), 0 ppm Monóxido de Carbono y 21 % Oxígeno.(Detector Multigas Fijo).</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIId_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIId_check_no.'"></td>
							<td><label>Contar con extintor en el área de trabajo al utilizar vehículos o maquinaría de combustión interna.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIe_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIe_check_no.'"></td>
							<td><label>En caso de evacuación, el personal deberá cumplir lo indicado en el Plan de GRD de COMASA.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIf_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIf_check_no.'"></td>
							<td><label>Ventilación forzada (extractores o inyección de aire) antes y durante el trabajo.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIg_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIg_check_no.'"></td>
							<td><label>Sistema de purga con aire limpio si hay gases acumulados o atmósfera inerte.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIh_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$VIIIh_check_no.'"></td>
							<td><label>Prohibido fumar o usar llamas abiertas.</label></td>
						</tr>

			</table>
			<br/>
            <hr/>	

            <label><strong>IX. TRABAJOS EN CALIENTE:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="6%"><label>SI NO</label></td>
							<td width="94%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXa_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXa_check_no.'"></td>
							<td><label>Personsal capacitado en Procedimiento de trabajos en caliente.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXb_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXb_check_no.'"></td>
							<td><label>Limpiar el área de trabajo eliminando producto inflamable o combustible.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXc_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXc_check_no.'"></td>
							<td><label>Asegurar que se inicien y mantengan las tareas en condiciones de 0 % del límite inferior de explosividad 0 ppm de ácido sulfhídrico (H2S), 0 ppm Monóxido de Carbono y 21 % Oxígeno.(Detector Multigas Fijo).</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXd_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXd_check_no.'"></td>
							<td><label>Contar con extintor en el área de trabajo al utilizar vehículos o maquinaría de combustión interna.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXe_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXe_check_no.'"></td>
							<td><label>En caso de evacuación, el personal deberá cumplir lo indicado en el Plan de GRD de COMASA.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXf_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXf_check_no.'"></td>
							<td><label>Ventilación forzada (extractores o inyección de aire) antes y durante el trabajo.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXg_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXg_check_no.'"></td>
							<td><label>Sistema de purga con aire limpio si hay gases acumulados o atmósfera inerte.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXh_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$IXh_check_no.'"></td>
							<td><label>Prohibido fumar o usar llamas abiertas.</label></td>
						</tr>

			</table>
			<br/>
            <hr/>	


            <label><strong>X. LAVADO ALTA PRESIÓN:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td width="6%"><label>SI NO</label></td>
							<td width="94%"></td>
						</tr>	
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xa_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xa_check_no.'"></td>
							<td><label>Personal capacitado en Procedimieno de trabajos con lavado de alta presión.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xb_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xb_check_no.'"></td>
							<td><label>Nunca realizar lavado de alta presión solo.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xc_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xc_check_no.'"></td>
							<td><label>Prohibido realizar ajustes en la boquilla, conexiones o mangueras con presión en línea.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xd_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xd_check_no.'"></td>
							<td><label>Utilizar boquillas con difusor de abanico o control de ángulo para reducir el impacto puntual.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xe_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xe_check_no.'"></td>
							<td><label>Realizar prueba de estanqueidad y presión a mangueras antes de cada turno.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xf_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xf_check_no.'"></td>
							<td><label>Confirmar funcionamiento del sistema de corte automático por sobrepresión si el equipo lo incluye.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xg_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xg_check_no.'"></td>
							<td><label>Al finalizar el trabajo,Purgar completamente el sistema antes de desconectar manguera.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xh_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xh_check_no.'"></td>
							<td><label>Purgar completamente el sistema antes de desconectar mangueras.</label></td>
						</tr>
						<tr>
							<td><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xi_check_si.'"> <input type="checkbox" NAME="input" VALUE="wrong" checked="'.$Xi_check_no.'"></td>
							<td><label>Verificar que no queden puntos con presión residual.</label></td>
						</tr>

			</table>
			<br/>
            <hr/>	
            <label><strong>TIPOS DE TRABAJO CRÍTICO:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$XII_check_herr_electr.'"> Herramienta eléctrica /neumática</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$XII_check_herr_manual.'"> Herramientas manuales</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$XII_check_camion_grua.'"> Camión grúa o pluma</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$XII_check_andamio.'"> Andamio y/o escalas</label></td>
						</tr>
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$XII_check_soldadura_arco.'"> Soldadura / Corte por arco eléctrico </label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$XII_check_compresor.'"> Compresor /Bombas </label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$XII_check_soldadura_oxi.'"> Soldadura / Corte por Oxi-gas</label></td>
							<td></td>
						</tr>

			</table>
			<label>Otra Herramienta : </label>'.$XII_otros.'						

			<br/>
            <hr/>
            <label><strong>RESGUARDO AREA DE TRABAJO:</strong></label><br>
			
			<table style="margin: 0 auto; text-align:left;">
						<tr>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$XIV_check_conos.'"> Conos</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$XIV_check_cinta.'"> Cinta de Peligro</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$XIV_check_barreras.'"> Barreras</label></td>
							<td><label><input type="checkbox" NAME="input" VALUE="wrong" checked="'.$XIV_check_senalizacion.'"> Señalización (letreros) </label></td>
						</tr>

			</table>
			<label>Otra Herramienta : </label>'.$XII_otros.'						

			<br/>
            <hr/>
            <label><strong>AUTORIZADORES </strong><br><br><br>
			
			<table border="2" style="text-align:center;">	
						<thead> 
					        <tr>
					          <th width="12%"></th>
					          <th width="22%">.<br><strong>I T O</strong><br></th>
					          <th width="22%">.<br><strong>Originador del trabajo</strong><br></th>
					          <th width="22%">.<br><strong>Ejecutor del trabajo</strong><br></th>
					          <th width="22%">.<br><strong>Responsable del área</strong><br></th>
					        </tr>
					      </thead>
					      <tbody >
					        <tr>
					          <td width="12%">.<br><br>Nombre:<br><br><br>Firma:<br><br></td>
					          <td width="22%"></td>
					          <td width="22%"></td>
					          <td width="22%" ></td>
					          <td width="22%" ></td>
					        </tr>
					      </tbody>
					
			</table>


		

	';




$html4='<br><br><br><h2 style="text-align:center;">VALIDACIÓN DIARIA DE EJECUCIÓN DE TRABAJO</h2>
<h2 style="text-align:center;">PERMISO SEMANAL N° '.$numero_permiso.'</h2><br><br><br><br>
  <table border="2" style="solid; text-align:center;">

      <tr >
        <th rowspan="2" style="solid;" width="5%">.<br><strong>DÍA</strong></th>
        <th rowspan="2" style="solid;" width="11%">.<br><strong>FECHA</strong></th>
        <th colspan="2" style="solid;" width="28%">.<br><strong>OPERADOR TERRENO</strong><br></th>
        <th colspan="2" style="solid;" width="28%">.<br><strong>LÍDER</strong><br></th>
        <th colspan="2" style="solid;" width="28%">.<br><strong>CIERRE</strong><br></th>
      </tr>
      <tr>
        <th style="solid;">.<br><strong>FIRMA</strong><br></th>
        <th style="solid;">.<br><strong>HORA</strong><br></th>
        <th style="solid;">.<br><strong>FIRMA</strong><br></th>
        <th style="solid;">.<br><strong>HORA</strong><br></th>
        <th style="solid;">.<br><strong>FIRMA</strong><br></th>
        <th style="solid;">.<br><strong>HORA</strong><br></th>
      </tr>
      <tr>
        <td style="solid;">.<br><h1>L</h1><br></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
      </tr>
      <tr>
        <td style="solid;">.<br><h1>M</h1><br></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
      </tr>

      <tr>
        <td style="solid;">.<br><h1>M</h1><br></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
      </tr>

      <tr>
        <td style="solid;">.<br><h1>J</h1><br></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
      </tr>

      <tr>
        <td style="solid;" >.<br><h1>V</h1><br></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
      </tr>
      <tr>
        <td style="solid;">.<br><h1>S</h1><br></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
      </tr>

      <tr>
        <td style="solid;">.<br><h1>D</h1><br></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
        <td style="solid;"></td>
      </tr>
  </table>

';


$pdf->writeHTML($html, true, false, true, false, '');	
$pdf->AddPage('P');	


$pdf->writeHTML($html2, true, false, true, false, '');	
$pdf->AddPage('P');	
/*
$pdf->writeHTML($html3, true, false, true, false, '');	
*/

if($titulo_permiso=='PERMISO SEMANAL DE TRABAJO'){
	
	$pdf->writeHTML($html4, true, false, true, false, '');
}
	



// create new PDF document
ob_end_clean();
$pdf->Output('Permiso_'.$numero_permiso.'.pdf', 'I');	

?>

