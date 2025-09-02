<?php
header('Content-Type: text/html; charset=utf-8');
include_once("../../../config/conex.php");
$link = Conexion();

//Variables 

//sa
$saAprobada=0;
$saPendiente=0;
$saRechazada=0;
$totalSaP=0;

//OC


$SQL_VER_BLOQUEO_VC='select autorizado_vc,autorizado_prestamo,usuario_modifica_vc, usuario_modifica_vp
from  [Seguridad].[dbo].[usuario] where user_rut="'.$_SESSION['rut'].'"';

$Res_VER_BLOQUEO_VC= mssql_query($SQL_VER_BLOQUEO_VC, $link); 

	     while ($row_Res_VER_BLOQUEO_VC=  mssql_fetch_array($Res_VER_BLOQUEO_VC))
            {
				$a_vc=$row_Res_VER_BLOQUEO_VC['autorizado_vc'];
				$a_vp=$row_Res_VER_BLOQUEO_VC['autorizado_prestamo'];
				$m_vc=$row_Res_VER_BLOQUEO_VC['usuario_modifica_vc'];
				$m_vp=$row_Res_VER_BLOQUEO_VC['usuario_modifica_vp'];
			}

$SQL_saPersonal = "SELECT SA_POR_RUT=CASE WHEN B.estado_nombre ='ENVIADA' THEN 'PENDIENTE' 
			ELSE B.estado_nombre END, 
			count(A.estado_codigo) AS CANTIDAD
			FROM TI.temp_Documento AS A
			INNER JOIN TI.temp_ESTADO_SA AS B ON A.estado_codigo=B.estado_codigo
			WHERE A.TipoDocto='S A NACIONAL'
			AND A.Empresa='004'
			and A.ANALISISE17='".$_SESSION['nick']."'
			AND A.estado_codigo IN (3,4,2)
			GROUP BY B.estado_nombre";

$Res_saPersonal = mssql_query($SQL_saPersonal, $link); 

	     while ($row_saPersonal=  mssql_fetch_array($Res_saPersonal))
            {
                  switch ($row_saPersonal['SA_POR_RUT']) 
                  {
                      case "APROBADA":
                               if ($row_saPersonal['SA_POR_RUT']=='APROBADA'){
                                     $saAprobada=$row_saPersonal['CANTIDAD'];
                              }else{
                                     $saAprobada=0;   
                              }
                          break;
                      case "PENDIENTE":
                              if ($row_saPersonal['SA_POR_RUT']=='PENDIENTE'){
                                     $saPendiente=$row_saPersonal['CANTIDAD'];
                              }else{
                                     $saPendiente=0;
                              }
                          break;
                      case "RECHAZADA":
                          if ($row_saPersonal['SA_POR_RUT']=='RECHAZADA'){
                                     $saRechazada=$row_saPersonal['CANTIDAD'];
                              }else{
                                     $saRechazada=0;
                              }
                          break;
                  }
		}

$totalSaP=$saPendiente+$saAprobada+$saRechazada;

//VC
$vcPendienteP=0;
$vcAprobadoP=0;
$vcTotalP=0;
$SQL_vcPersonal = "SELECT VALES_CONSUMOS=CASE WHEN B.GLOSA ='' THEN 'APROBADA' ELSE 'PENDIENTE' END, COUNT(B.Glosa)AS CANTIDAD
                  FROM flexline.Documento AS B 
                  WHERE B.TipoDocto IN ('VC_ADMINISTRACION','VC PRODUCCION','VC PROYECTOS') 
                  AND year(B.Fecha)>='2015'
                  AND B.Empresa='004'
                  AND B.Vigencia<>'A'
                  AND B.Comentario1='".$_SESSION['rut']."'
                  GROUP BY B.Glosa";
$Res_vcPersonal = mssql_query($SQL_vcPersonal, $link); 
while ($row_vcPersonal=  mssql_fetch_array($Res_vcPersonal))
            {
                  //echo $row_vcPersonal['CANTIDAD'];
                   switch ($row_vcPersonal['VALES_CONSUMOS']) 
                  {
                      case "APROBADA":
                              if ($row_vcPersonal['VALES_CONSUMOS']=='APROBADA'){
                                  $vcAprobadoP=$row_vcPersonal['CANTIDAD'];  
                              }else{
                                   $vcAprobadoP=0;
                              }
                          break;
                      case "PENDIENTE":
                             if ($row_vcPersonal['VALES_CONSUMOS']=='PENDIENTE'){
                                  $vcPendienteP=$row_vcPersonal['CANTIDAD'];  
                              }else{
                                   $vcPendienteP=0;
                              }
                          break;
                      case "RECHAZADA":
                          
                          break;
                  }
            }
$vcTotalP=$vcPendienteP+$vcAprobadoP;

//Prestamos
$prestAsignado=0;
$prestPrestamo=0;
$prestVencidos=0;
$prestTotalP=0;

$SQL_prestPersonal = "SELECT A.pd_tipo_prestamo AS TIPO, 
                  COUNT(A.pd_tipo_prestamo) AS CANTIDAD
                  FROM TI.prestamo_detalle AS A
                  INNER JOIN TI.prestamo_encabezado AS B 
                  ON A.pe_empresa=B.pe_empresa AND A.pe_correlativo=b.pe_correlativo
                  WHERE A.vigente='SI' AND B.pe_tipo_documento='VALE_PRESTAMO'
                   AND B.pe_rut_solicita='".$_SESSION['rut']."'
                  GROUP BY A.pd_tipo_prestamo
                  UNION
                  SELECT TIPO=CASE WHEN A.vigente = 'SI' THEN 'VENCIDOS' END, 
                  COUNT(A.bp_codigo_seguimiento) AS CANTIDAD
                  FROM TI.prestamo_detalle AS A
                  INNER JOIN TI.prestamo_encabezado AS B 
                  ON A.pe_empresa=B.pe_empresa AND A.pe_correlativo=b.pe_correlativo
                  WHERE A.vigente='SI' AND B.pe_tipo_documento='VALE_PRESTAMO' 
                  AND B.pe_rut_solicita='".$_SESSION['rut']."' 
                  AND DATEDIFF(DAY,A.pd_hasta,GETDATE())>=1
                  GROUP BY A.vigente";
$Res_prestPersonal = mssql_query($SQL_prestPersonal, $link);

while ($row_prestPersonal=  mssql_fetch_array($Res_prestPersonal))
            {
              switch ($row_prestPersonal['TIPO']) 
                  {
                      case "ASIGNADO":
                              if ($row_prestPersonal['TIPO']=='ASIGNADO'){
                                  $prestAsignado=$row_prestPersonal['CANTIDAD'];
                              }else{
                                  $prestAsignado=0;
                              }
                          break;
                      case "PRESTAMO":
                              if ($row_prestPersonal['TIPO']=='PRESTAMO'){
                                   $prestPrestamo=$row_prestPersonal['CANTIDAD'];
                              }else{
                                  $prestPrestamo=0;
                              }
                          break;
                      case "VENCIDOS":
                              if ($row_prestPersonal['TIPO']=='VENCIDOS'){
                                   $prestVencidos=$row_prestPersonal['CANTIDAD'];
                              }else{
                                  $prestVencidos=0;
                              }
                          break;
                  }     
            }
$prestTotalP=$prestPrestamo+$prestAsignado;

// OC

$ocRechazadaP=0;
$ocPendientep=0;
$ocAprobacion=0;
$ocTotalP=0;

$SQL_ocPersonal = "SELECT CASE WHEN C.Aprobacion='S' THEN 'APROBACION' 
                         WHEN C.Aprobacion='P' THEN 'PENDIENTE'
                         WHEN C.Aprobacion='N' THEN 'RECHAZADA' 
                         END AS ESTADO_OC ,COUNT(C.Aprobacion) AS CANTIDAD FROM(
                        SELECT A.Empresa, A.CorrelativoOrigen,A.TipoDoctoOrigen,
                        B.Correlativo, B.Numero,B.Proveedor, 
                        B.Fecha, A.TipoDocto, B.Aprobacion,B.Moneda,B.TotalIngreso,B.ANALISISE11
                        FROM (
                        SELECT Empresa,
                         Correlativo, 
                         TipoDocto, 
                         CorrelativoOrigen,
                         TipoDoctoOrigen
                        FROM flexline.DocumentoD
                        WHERE TipoDocto IN ('ORDEN DE COMPRA','O.C. IMPORTACION') AND Empresa='004' 
                        GROUP BY Empresa,Correlativo,TipoDocto,CorrelativoOrigen,TipoDoctoOrigen
                        ) AS A 
                        INNER JOIN flexline.Documento AS B ON A.Correlativo=B.Correlativo AND B.TipoDocto IN ('ORDEN DE COMPRA','O.C. IMPORTACION') AND B.Empresa='004'
                        )AS C
                        LEFT JOIN flexline.Documento AS D ON C.CorrelativoOrigen=D.Correlativo AND C.TipoDoctoOrigen=D.TipoDocto AND C.Empresa=D.Empresa
                        WHERE D.ANALISISE17='".$_SESSION['nick']."'
                        GROUP BY C.Aprobacion";

$Res_ocPersonal = mssql_query($SQL_ocPersonal, $link);

while ($row_ocPersonal=  mssql_fetch_array($Res_ocPersonal))
            {
                  switch ($row_ocPersonal['ESTADO_OC']) 
                  {
                      case "RECHAZADA":
                              if ($row_ocPersonal['ESTADO_OC']=='RECHAZADA'){
                                  $ocRechazadaP=$row_ocPersonal['CANTIDAD'];
                              }else{
                                  $ocRechazadaP=0;
                              }
                          break;
                      case "PENDIENTE":
                              if ($row_ocPersonal['ESTADO_OC']=='PENDIENTE'){
                                  $ocPendientep=$row_ocPersonal['CANTIDAD'];
                              }else{
                                  $ocPendientep=0;
                              }
                          break;
                      case "APROBACION":
                             if ($row_ocPersonal['ESTADO_OC']=='APROBACION'){
                                  $ocAprobacion=$row_ocPersonal['CANTIDAD'];
                              }else{
                                  $ocAprobacion=0;
                              }
                          break;
                  }  
            }
$ocTotalP=$ocAprobacion+$ocPendientep+$ocRechazadaP;
?>