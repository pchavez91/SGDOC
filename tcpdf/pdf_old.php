<?php
include_once("../../../config/conex.php");
$link = Conexion();
require "../phpqrcode/qrlib.php"; 
require_once('tcpdf_include.php');

$id_informe = $_REQUEST['id_informe'];

$sql_encabezado ="SELECT [id_informe]
					  ,[numero_informe]
					  ,FORMAT([fecha_informe],'d', 'en-gb' ) as fecha_informe
					  ,cast([fecha_accidente] as date) as fecha_accidente
					  ,[hora_accidente]
					  ,REPLACE([gerencia],'GERENTE DE','') AS gerencia
					  ,[departamento]
					  ,[id_departamento]
					  ,[rut_accidentado]
					  ,[edad_accidentado]
					  ,[antiguedad_accidentado]
					  ,[antiguedad_en_cargo]
					  ,FORMAT([fecha_registro],'d', 'en-gb' ) as fecha_registro
					  ,[nick_registro]
					  ,[vigente]
					  ,[jefe_directo]
					  ,(rtrim(B.user_nombre)+' '+B.user_paterno+' '+B.user_materno) AS nombre
					   ,C.cargo_nombre
					   ,D.area_nombre
					   ,CASE WHEN A.accidente_con_danio IS NULL THEN 'false' ELSE A.accidente_con_danio END AS accidente_con_danio
					   ,CASE WHEN A.danio_equipo IS NULL THEN 'false' ELSE A.danio_equipo END AS danio_equipo
					   ,CASE WHEN A.danio_material IS NULL THEN 'false' ELSE A.danio_material END AS danio_material
					   ,CASE WHEN A.danio_ambiente IS NULL THEN 'false' ELSE A.danio_ambiente END AS danio_ambiente
					   ,CASE WHEN A.danio_personas IS NULL THEN 'false' ELSE A.danio_personas END AS danio_personas
					   ,CASE WHEN A.otros_danios IS NULL THEN 'false' ELSE A.otros_danios END AS otros_danios
					   ,CASE WHEN A.actividad_rutinaria IS NULL THEN 'false' ELSE A.actividad_rutinaria END AS actividad_rutinaria
					   ,CASE WHEN A.actividad_planificada IS NULL THEN 'false' ELSE A.actividad_planificada END AS actividad_planificada
					   ,CASE WHEN A.actividad_no_planificada IS NULL THEN 'false' ELSE A.actividad_no_planificada END AS actividad_no_planificada
					   ,A.relato_accidente
					   ,A.especifica_otros_danios
					   ,A.especifica_otro_equipo
					   ,A.actividad_realizada
					   ,A.parte_cuerpo_lesiona
					   ,A.elemento_provoca_lesion
					   ,A.fuente
					   ,A.lugar_exacto_accidente
					   ,A.tipo_accidente
					   ,A.id_tipo_accidente
					   ,A.codigo_documento
					   ,A.fecha_firma_autorizacion
				  FROM [seguimiento].[dbo].[informe] AS A
				  INNER JOIN Seguridad.dbo.usuario AS B ON A.rut_accidentado=B.user_rut
				  inner join Seguridad.dbo.cargo as C on B.cargo_codigo=C.cargo_codigo
				  INNER JOIN Seguridad.dbo.areas AS D ON D.area_codigo=C.area_codigo
				  where A.vigente='SI' AND A.id_informe= '".$id_informe."' ";

    $RES_encabezado = mssql_query($sql_encabezado, $link);
    while($ROW_encabezado =  mssql_fetch_array($RES_encabezado))
		{

$codigo_documento     =$ROW_encabezado['codigo_documento'];
$numero_informe       =$ROW_encabezado['numero_informe'];	

$fecha_informe   =$ROW_encabezado['fecha_informe'];
$fecha_accidente =$ROW_encabezado['fecha_accidente'];
$hora_accidente  =$ROW_encabezado['hora_accidente'];
$gerencia        =$ROW_encabezado['gerencia'];
$area_nombre     =$ROW_encabezado['area_nombre'];
$jefe_directo    =$ROW_encabezado['jefe_directo'];

$nombre                 =$ROW_encabezado['nombre'];
$rut_accidentado        =$ROW_encabezado['rut_accidentado'];
$edad_accidentado       =$ROW_encabezado['edad_accidentado'];
$antiguedad_accidentado =$ROW_encabezado['antiguedad_accidentado'];
$cargo_nombre           =$ROW_encabezado['cargo_nombre'];
$antiguedad_en_cargo    =$ROW_encabezado['antiguedad_en_cargo'];

$danio_equipo    =$ROW_encabezado['danio_equipo'];
$danio_material  =$ROW_encabezado['danio_material'];
$danio_ambiente= $ROW_encabezado['danio_ambiente'];
$danio_personas= $ROW_encabezado['danio_personas'];
$otros_danios=   $ROW_encabezado['otros_danios'];

$especifica_otros_danios =$ROW_encabezado['especifica_otros_danios'];
$especifica_otro_equipo  =$ROW_encabezado['especifica_otro_equipo'];
$actividad_realizada     =$ROW_encabezado['actividad_realizada'];

$actividad_rutinaria      =$ROW_encabezado['actividad_rutinaria'];
$actividad_planificada    =$ROW_encabezado['actividad_planificada'];
$actividad_no_planificada =$ROW_encabezado['actividad_no_planificada'];

$relato_accidente        =$ROW_encabezado['relato_accidente'];
$parte_cuerpo_lesiona    =$ROW_encabezado['parte_cuerpo_lesiona'];
$tipo_accidente          =$ROW_encabezado['tipo_accidente'];
$elemento_provoca_lesion =$ROW_encabezado['elemento_provoca_lesion'];
$fuente                  =$ROW_encabezado['fuente'];
$lugar_exacto_accidente  =$ROW_encabezado['lugar_exacto_accidente'];
  
   
}

  if($danio_equipo   == 'true'){$danio_equipo = 'checked';   } else{$danio_equipo =''; }
  if($danio_material == 'true'){$danio_material = 'checked'; } else{$danio_material =''; }
  if($danio_ambiente == 'true'){$danio_ambiente = 'checked'; } else{$danio_ambiente =''; }
  if($danio_personas == 'true'){$danio_personas = 'checked'; } else{$danio_personas =''; }
  if($otros_danios   == 'true'){$otros_danios = 'checked';   } else{$otros_danios =''; }
  
  if($actividad_rutinaria == 'true')     {$actividad_rutinaria = 'checked';     } else{$actividad_rutinaria =''; }
  if($actividad_planificada == 'true')   {$actividad_planificada = 'checked';   } else{$actividad_planificada =''; }
  if($actividad_no_planificada == 'true'){$actividad_no_planificada = 'checked';} else{$actividad_no_planificada =''; }


$tabla_medidas_control='';

		$sql_medidas_control = "SELECT [id_medida_control]
									  ,[medida_control]
									  ,[responsable]
									  ,[id_informe]
								FROM [seguimiento].[dbo].[medida_control]
								where id_informe= '".$id_informe."'
								ORDER BY [id_medida_control]";
	  
		$RES_medidas_control = mssql_query($sql_medidas_control, $link);
				While($ROW_medidas_control =  mssql_fetch_array($RES_medidas_control))
					{	

$tabla_medidas_control.='<tr><td>'.utf8_encode($ROW_medidas_control['medida_control']).'</td>
                             <td>'.utf8_encode($ROW_medidas_control['responsable']).'</td>
						 </tr>';					
							
					}

$tabla_analisi_causal= '';

// analisis_causal
	
	$tabla_inicio_principal='<table border="1" width="100%">';
	$tabla_inicio          ='<table border="1" width="100%">';
	$tabla_fin             ='</table>';
	
	$tabla_incidente='';
	$tabla_danio='';
	$tabla_icausas_inmediatas='';
	$tabla_causas_basicas='';
	
	
	   	$sql_danio ="SELECT [id_danio]
			               ,[danio]
			               ,[id_informe]
			         FROM [seguimiento].[dbo].[danio_informe]
			         WHERE [id_informe]='$id_informe'";
					 
			$RES1 = mssql_query($sql_danio, $link);
			while ($row1=  mssql_fetch_array($RES1))
			{	
				$accion='ingresar_incidente';
				$id_danio=$row1['id_danio'];
				$danio=$row1['danio'];
			   	$tabla_danio=$tabla_danio.'<tr><td width="20%">'.utf8_encode($row1['danio']).'</td>';
			   	
			   	$tabla_incidente='';

					    $sql_incidente ="SELECT [id_incidente]
												,[incidente]
												,[id_danio]
												,[id_informe]
										FROM [seguimiento].[dbo].[incidente_informe]
										where [id_informe]='$id_informe' and [id_danio]='$id_danio'";
									
						$RES2 = mssql_query($sql_incidente, $link);
						while ($row2=  mssql_fetch_array($RES2))
						{
							$accion='ingresar_causas_inmediatas';
							$id_incidente=$row2['id_incidente'];
							$incidente=$row2['incidente'];
							$tabla_incidente=$tabla_incidente.'<tr><td>'.utf8_encode($row2['incidente']).'</td>';
							
							$tabla_icausas_inmediatas='';
							
								$sql_causas_inmed ="SELECT [id_causas_inmediatas]
														  ,[causas_inmediatas]
														  ,[id_danio]
														  ,[id_incidente]
														  ,[id_informe]
													FROM [seguimiento].[dbo].[causas_inmediatas_informe]
													where [id_danio] ='$id_danio' and [id_incidente]='$id_incidente' and [id_informe]='$id_informe'";
									$RES3 = mssql_query($sql_causas_inmed, $link);
									while ($row3=  mssql_fetch_array($RES3))
									{

										$accion='ingresar_causas_basicas';
										$id_causas_inmediatas=$row3['id_causas_inmediatas'];
										$causas_inmediatas=$row3['causas_inmediatas'];
										$tabla_icausas_inmediatas=$tabla_icausas_inmediatas.'<tr><td>'.utf8_encode($row3['causas_inmediatas']).'</td>';
										
										$tabla_causas_basicas='';
																			
														$sql_causas_basicas ="SELECT   [id_causas_basicas]
																					  ,[causas_basicas]
																					  ,[id_danio]
																					  ,[id_incidente]
																					  ,[id_causas_inmediatas]
																					  ,[id_informe]
																			  FROM [seguimiento].[dbo].[causas_basicas_informe]
																			  where [id_danio]='$id_danio' and [id_incidente]='$id_incidente' 
																			  and [id_causas_inmediatas]='$id_causas_inmediatas' and [id_informe]='$id_informe'";
														 $RES4 = mssql_query($sql_causas_basicas, $link);
														while ($row4=  mssql_fetch_array($RES4))
														{

															$id_causas_basicas=$row4['id_causas_basicas'];
															$accion='ingresar_req_del_sistema';
															$causas_basicas=$row4['causas_basicas'];
															$tabla_causas_basicas=$tabla_causas_basicas.'<tr><td>'.utf8_encode($row4['causas_basicas']).'</td>';
															
															$tabla_req_sistema='';
															
																				$sql_req_sistema ="SELECT  [id_req_sistema]
																										  ,[req_sistema]
																										  ,[id_danio]
																										  ,[id_incidente]
																										  ,[id_causas_inmediatas]
																										  ,[id_causas_basicas]
																										  ,[id_informe]
																								    FROM [seguimiento].[dbo].[req_sistema_informe]
																									where [id_danio]='$id_danio' and [id_incidente]='$id_incidente' 
																									and [id_causas_inmediatas]='$id_causas_inmediatas' 
																									and [id_causas_basicas]='$id_causas_basicas' and [id_informe]='$id_informe'";
																				$RES5 = mssql_query($sql_req_sistema, $link);
																				while ($row5=  mssql_fetch_array($RES5))
																				{


																					$id_req_sistema=$row5['id_req_sistema'];
																					$tabla_req_sistema=$tabla_req_sistema.'<tr><td width="100%">'.utf8_encode($row5['req_sistema']).'</td></tr>';
																					
																					
																				}
																															
															
																	//if($tabla_req_sistema!=''){
																	$tabla_req_sistema='<td width="50%">'.$tabla_inicio.$tabla_req_sistema.$tabla_fin.'</td>';
																	$tabla_causas_basicas=$tabla_causas_basicas.$tabla_req_sistema;
																    //}
																	
																	 $tabla_causas_basicas=$tabla_causas_basicas.'</tr>';

															}	
													
													
										        //if($tabla_causas_basicas!=''){
												$tabla_causas_basicas='<td  width="100%">'.$tabla_inicio.$tabla_causas_basicas.$tabla_fin.'</td>';
												$tabla_icausas_inmediatas=$tabla_icausas_inmediatas.$tabla_causas_basicas;
												//}

									    								
										        $tabla_icausas_inmediatas=$tabla_icausas_inmediatas.'</tr>';
										
									}	   

						//if($tabla_icausas_inmediatas!=''){
						   $tabla_icausas_inmediatas='<td width="100%">'.$tabla_inicio.$tabla_icausas_inmediatas.$tabla_fin.'</td>';
						   $tabla_incidente=$tabla_incidente.$tabla_icausas_inmediatas;
						  // }

						$tabla_incidente=$tabla_incidente.'</tr>';
							
						}
						
			//if($tabla_incidente!=''){
				$tabla_incidente='<td width="40%">'.$tabla_inicio.$tabla_incidente.$tabla_fin.'</td>';
				$tabla_danio=$tabla_danio.$tabla_incidente;
			   // }

			$tabla_danio=$tabla_danio.'</tr>';
			
			}
					      		

$tabla_analisi_causal= $tabla_inicio_principal.$tabla_danio.$tabla_fin;
//echo $tabla_inicio_principal.$tabla_danio.$tabla_fin;
				

$tabla_medidas_preventivas='';

		$sql_medidas_preventivas = "SELECT [id_medida_preventiva]
										  ,[plan_de_accion]
										  ,[responsable_plan]
										  ,[cargo_responsable]
										  ,CAST([fecha_plazo] AS DATE) AS fecha_plazo
										  ,[id_informe]
									  FROM [seguimiento].[dbo].[medida_preventivas]
									  where [id_informe]= '".$id_informe."'
									  ORDER BY [id_medida_preventiva]";
	  
		$RES_medidas_preventivas = mssql_query($sql_medidas_preventivas, $link);
				While($ROW_medidas_preventivas =  mssql_fetch_array($RES_medidas_preventivas))
					{	

$tabla_medidas_preventivas.='<tr><td>'.utf8_encode($ROW_medidas_preventivas['plan_de_accion']).'</td>
                                 <td>'.utf8_encode($ROW_medidas_preventivas['responsable_plan']).'</td>
								 <td>'.utf8_encode($ROW_medidas_preventivas['cargo_responsable']).'</td>
								 <td>'.utf8_encode($ROW_medidas_preventivas['fecha_plazo']).'</td>	 
							</tr>';					
							
					}

$total_adjuntos=0;

		$sql_adjuntos_total = "SELECT count(id_ruta) as contador
						       FROM [seguimiento].[dbo].[ruta_documentos_informe]
						       where [id_informe]= '".$id_informe."' and tipo_adjunto = 'imagen' ";
	  
		$RES_adjuntos_total = mssql_query($sql_adjuntos_total, $link);
				if($ROW_adjuntos_total =  mssql_fetch_array($RES_adjuntos_total))
					{
						$total_adjuntos = $ROW_adjuntos_total['contador'];
					}
	
$tabla_adjuntos= '<tr><td><br/><br/>';		
$cont = 1;
				

if($total_adjuntos == 0){

$tabla_adjuntos= '<tr><td><br/></td></tr>';		
}

	
		$sql_adjuntos = "SELECT [id_ruta]
							  ,[ruta_documento]
							  ,[tipo_adjunto]
							  ,[id_informe]
							  ,[nick_usuario]
							  ,[fecha]
						  FROM [seguimiento].[dbo].[ruta_documentos_informe]
						  where [id_informe]= '".$id_informe."' and tipo_adjunto = 'imagen' ";
	  
		$RES_adjuntos = mssql_query($sql_adjuntos, $link);
				While($ROW_adjuntos =  mssql_fetch_array($RES_adjuntos))
					{	

					/* if($ROW_adjuntos['tipo_adjunto'] == 'imagen'){
						
						$tipo= '<br /><br />  <img src="../adjuntos/'.$ROW_adjuntos['ruta_documento'].'" width="150" height="100"><br /> ';
						
					}else{
						
						$tipo= '<br /><br />  <img src="../adjuntos/documento.jpg" width="75" height="50"><br /> ';
					} */
					
						if($cont == 3 || $cont == 6 || $cont == 9 || $cont == 12 || $cont == 15 || $cont == 18 || $cont == 21){

								if($total_adjuntos == $cont){
									
									$tr='</td></tr>';	
									
								}else{
									
									$tr='</td></tr><tr><td><br/><br/>';	
								}			
						
						}else{
							
								if($total_adjuntos == $cont){
									
									$tr='</td></tr>';	
									
								}else{
									
									$tr='';		
								}
					    }						
				
				$tabla_adjuntos.= '<img src="../adjuntos/'.$ROW_adjuntos['ruta_documento'].'" width="200" height="200">&nbsp;&nbsp;'.$tr;					
					
				$cont=$cont+1;					
					
					}					

					
$tabla_firmas='';

		$sql_firmas = "SELECT [nick_registro]
							  ,[firma_revision]
							  ,[cargo_revisor]
							  ,[firma_autorizacion]
							  ,[cargo_autorizador]
							 , FORMAT([fecha_firma_revision],'d', 'en-gb' ) as fecha_firma_revision
							 , FORMAT([fecha_firma_autorizacion],'d', 'en-gb' ) as fecha_firma_autorizacion
							 , FORMAT([fecha_firma_elaborador],'d', 'en-gb' ) as fecha_firma_elaborador
							  ,B.cargo_nombre
						  FROM [seguimiento].[dbo].[informe] AS A
						  INNER JOIN Seguridad.dbo.cargo AS B ON A.id_cargo_eleborador=B.cargo_codigo
						  WHERE id_informe= '".$id_informe."' ";
	  
		$RES_firmas = mssql_query($sql_firmas, $link);
				While($ROW_firmas =  mssql_fetch_array($RES_firmas))
					{	
					
$tabla_firmas.='<tr><td>'.utf8_encode($ROW_firmas['nick_registro']).'</td>
                    <td>'.utf8_encode($ROW_firmas['firma_revision']).'</td>	 
					<td>'.utf8_encode($ROW_firmas['firma_autorizacion']).'</td>	 
				</tr>';					
							
					}						

global $id_informe;
  
$QR='';

$texto='http://190.13.129.41/sistemas/investigacion/tcpdf/pdf.php?id_informe='.$id_informe;

	//Declaramos una carpeta temporal para guardar la imagenes generadas
	$dir = 'images/temp/';
	
	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
        mkdir($dir);
	
        //Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.$id_informe.'.png';
 
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

$html ='        <table border="1" style="margin: 0 auto;">
							  <tr>
									<td width="25%" rowspan="2" style="text-align:center;"> <br/><br/><img src="images/logo.jpg" width="100"></td>
									<td width="35%" style="text-align:center;"><strong>INFORME DE INVESTIGACIÓN DE ACCIDENTES</strong><br/></td>
									<td width="30%" ><strong>Código:</strong> '.$codigo_documento.'</td>
									<td width="10%" rowspan="2" style="text-align:center;"><br/>&nbsp;&nbsp;<img src="images/temp/'.$id_informe.'.png" width="60" height="50"></td>
							  </tr>

							  <tr>
									<td style="text-align:center;">Prevención de Riesgos</td>
									<td><strong>Nro:</strong> '.$numero_informe.'</td>
							  </tr>
				</table>
	
		
				<p style="background-color: #4682B4; text-align:center;"><strong><font color="#ffffff">IDENTIFICACIÓN</font></strong></p>
				
				<table>
				      <tr>    
						<th><table style="margin: 0 auto;">
							   <tr>
							            <br />
										 <td width="50%" >
										    <br />
										    <strong>Fecha Informe:         </strong> '.$fecha_informe.'										
											</td>
										<td width="27%" >
										<br />
										     <strong>Fecha Accidente:      </strong> '.$fecha_accidente.'
										</td>
										<td width="23%" >
										     <strong>Hora Accidente:       </strong> '.$hora_accidente.'
										</td>
									    
							   </tr>
							</table>
							
						</th>
					  </tr>
				</table>
				
				<table>
				      <tr>    
						<th><table style="margin: 0 auto;">
							   <tr>
										 <td width="50%" >
										    <br />
										   <strong>Gerencia:             </strong> '.utf8_encode($gerencia).'	
										    <br />
										   <strong>Jefe Directo/a Cargo: </strong> '.utf8_encode($jefe_directo).'	
											</td>
										<td width="50%" >
										<br />
										    <strong>Area:                 </strong> '.utf8_encode($area_nombre).'
									    </td>
							   </tr>
							</table>
							
						</th>
					  </tr>
				</table>
				
				
		        <p style="background-color: #4682B4; text-align:center;"><strong><font color="#ffffff">IDENTIFICACIÓN DEL ACCIDENTADO</font></strong></p>
				<p></p>

		        <strong>Accidentado: </strong> '.utf8_encode($nombre).'<br />
				
				<table>
				        <tr>    
						<th><table style="margin: 0 auto;">
							   <tr>
										<td width="60%" >
											<strong>Rut:                          </strong> '.$rut_accidentado.'<br />
											<strong>Antigüedad en la Empresa:     </strong> '.utf8_encode($antiguedad_accidentado).'<br />
											<strong>Cargo:                        </strong> '.utf8_encode($cargo_nombre).'
											</td>
										<td width="40%" >
										     <strong>Edad:                       </strong> '.$edad_accidentado.'<br />
											 <br />
											 <strong>Antigüedad en el Cargo:     </strong> '.utf8_encode($antiguedad_en_cargo).' 
											
										</td>
									    
							   </tr>
							</table>
							
						</th>
					    </tr>
				</table>
				
		        <p style="background-color: #4682B4; text-align:center;"><strong><font color="#ffffff">DESCRIPCIÓN DEL ACCIDENTE</font></strong></p>
				<p></p>
				
										<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$danio_equipo.'"   >Equipo</label>
										<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$danio_material.'" >Material</label>
										<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$danio_ambiente.'" >Ambiente</label>
										<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$danio_personas.'" >Personas</label>
										<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$otros_danios.'"   >Otros</label> <br /><br />
				
										<strong>Especificar Otros:                                        </strong> '.utf8_encode($especifica_otros_danios).' <br />
										<strong>Equipo Involucrado:                                       </strong> '.utf8_encode($especifica_otro_equipo).' <br />
										<strong>Actividad que Realizaba Trabajador antes de Accidentarse: </strong> '.utf8_encode($actividad_realizada).'  <br /><br />
										
										
										<strong>Actividad:</strong>
										<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$actividad_rutinaria.'"      >Rutinaria</label>
										<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$actividad_planificada.'"    >Planificada</label>
										<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$actividad_no_planificada.'" >No Planificada</label><br />
																				 
										<hr><br />								 
										<strong>Relato del Accidente: </strong>	'.utf8_encode($relato_accidente).' <br />
										<hr><br /><br /><br />									
										
										<strong>Parte del Cuerpo Lesionada:              </strong> '.utf8_encode($parte_cuerpo_lesiona).' <br />
										<strong>Tipo de Accidente:                       </strong> '.utf8_encode($tipo_accidente).' <br />	
										<strong>Elemento que Provoca la Lesión (Agente): </strong> '.utf8_encode($elemento_provoca_lesion).' <br />		
										<strong>Fuente:                                  </strong> '.utf8_encode($fuente).' <br />				
										<strong>Lugar Exacto del Accidente:              </strong> '.utf8_encode($lugar_exacto_accidente).' 
										
				<p style="background-color: #4682B4; text-align:center;"><strong><font color="#ffffff">MEDIDAS DE CONTROL INMEDIATAS</font></strong></p>
				<p></p>		

				<table border="1" style="margin: 0 auto; text-align:center;">
						<tr style="background-color: #D5DBDB">
						<th width="70%"><strong>Acción Inmediata Tomadas por el Supervisor</strong></th>
						<th width="30%"><strong>Responsable</strong></th>
					  </tr>
					      
				        '.$tabla_medidas_control.'    
				</table>
								
		';

$html2 ='   <p style="background-color: #4682B4; text-align:center;"><strong><font color="#ffffff">ANALISIS CAUSAL</font></strong></p>
				<p></p>		
				
				<table border="1" style="margin: 0 auto; text-align:center;">
						<tr style="background-color: #D5DBDB">
						<th width="20%"><strong>Daño</strong></th>
						<th width="20%"><strong>Incidente</strong></th>
						<th width="20%"><strong>Causas Inmediatas</strong></th>
						<th width="20%"><strong>Causas Básicas</strong></th>
						<th width="20%"><strong> Req. Del Sistema </strong></th>
					  </tr>

						'.$tabla_analisi_causal.' 
						 
				</table>
								
		';


$html3 ='   <p style="background-color: #4682B4; text-align:center;"><strong><font color="#ffffff">MEDIDAS PREVENTIVAS</font></strong></p>
				<p></p>		
				
				<table border="1" style="margin: 0 auto; text-align:center;">
						<tr style="background-color: #D5DBDB">
						<th width="40%"><strong>Plan de Acción</strong></th>
						<th width="20%"><strong>Responsable</strong></th>
						<th width="25%"><strong>Cargo</strong></th>
						<th width="15%"><strong>Plazo/Fecha</strong></th>
					  </tr>

						'.$tabla_medidas_preventivas.' 
						 
				</table>
						
				<p style="background-color: #4682B4; text-align:center;"><strong><font color="#ffffff">ADJUNTOS</font></strong></p>
				<p></p>	
				
				<table border="1" style="margin: 0 auto; text-align:center;">
						<tr style="background-color: #D5DBDB">
						<th><strong>Imágenes</strong></th>
					  </tr>

						'.$tabla_adjuntos.'
						 
				</table>
					
				<p style="background-color: #4682B4; text-align:center;"><strong><font color="#ffffff">FIRMAS</font></strong></p>
				<p></p>	
				
				<table border="1" style="margin: 0 auto; text-align:center;">
						<tr style="background-color: #D5DBDB">
						<th><strong>Elaborado por</strong></th>
						<th><strong>Revisado por</strong></th>
						<th><strong>Aprobado por</strong></th>
					  </tr>

						'.$tabla_firmas.' 
						 
				</table>
				
		';
		
$pdf->writeHTML($html, true, false, true, false, '');	
$pdf->AddPage('P');		
$pdf->writeHTML($html2, true, false, true, false, '');
$pdf->AddPage('P');		
$pdf->writeHTML($html3, true, false, true, false, '');

// create new PDF document
$pdf->Output('Informe_investigacion.pdf', 'I');	
	
?>
