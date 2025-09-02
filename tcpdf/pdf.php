<?php
include_once("../../../config/conex.php");
$link = Conexion();
require "../phpqrcode/qrlib.php"; 
require_once('tcpdf_include.php');

$id_informe = $_REQUEST['id_informe'];

$sql_encabezado ="SELECT   [id_informe]
						  ,[numero_informe]
						  ,FORMAT(cast([fecha_informe] as date),'d', 'en-gb' )   as fecha_informe
						  ,FORMAT(cast([fecha_accidente] as date),'d', 'en-gb' ) as fecha_accidente
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
						   ,A.fecha_nacimiento
						   ,A.horas_trabajadas
						   ,A.jornada
						   ,REPLACE(A.tipo,'_',' ') AS tipo
						    ,[check_1] 
							,[check_2] 
							,[check_3] 
							,[check_4] 
							,[check_5] 
							,[check_6] 
							,[check_7] 
							,[check_8] 
							,[check_9] 
							,[check_10] 
							,[check_11] 
							,[check_12] 
							,[check_13] 
							,[check_14] 
							,[check_15] 
							,[check_16] 
							,[check_17] 
							,[check_18] 
							,[check_19] 
							,[check_20] 
							,[check_21] 
							,[check_22] 
							,[check_23] 
							,[check_24] 
							,[check_25] 
							,[check_26] 
							,[check_27] 
							,[check_28] 
							,[check_29] 
							,[check_30] 
							,[check_31] 
							,[check_32] 
							,[check_33] 
							,[check_34] 
							,[check_35] 
							,[check_36] 
							,[check_37] 
							,[check_38] 
							,[check_39] 
							,[check_40] 
							,[check_41] 
							,[check_42] 
							,[check_43] 
							,[check_44] 
							,[check_45] 
							,[check_46] 
							,[check_47] 
							,[check_48] 
							,[check_49] 
							,[check_50] 
							,[check_51] 
							,[check_52] 
							,[check_53] 
							,[check_54] 
							,[check_55] 
							,[check_56] 
							,[check_57] 
							,[check_58] 
							,[check_59] 
							,[check_60] 
							,[check_61] 
							,[check_62] 
							,[check_63] 
							,[check_64] 
							,[check_65] 
							,[check_66] 
							,[check_67] 
							,[check_68] 
							,[check_69] 
							,[check_70] 
							,[check_71] 
							,[check_72] 
							,[check_73] 
							,[check_74] 
							,[check_75] 
							,[check_76] 
							,[check_77] 
							,[check_78] 
							,[check_79] 
							,[check_80] 
							,[check_81] 
							,[check_82] 
							,[check_83] 
							,[check_84] 
							,[check_85] 
							,[check_86] 
							,[check_87] 
							,[check_88] 
							,[check_89] 
							,[check_90] 
							,[check_91] 
							,[check_92] 
							,[check_93] 
							,[check_94] 
							,[check_95] 
							,[check_96] 
							,[check_97] 
							,[check_98] 
							,[check_99] 
							,[check_100] 
							,[check_101] 
							,[check_102] 
							,[check_103] 
							,[check_104] 
							,[check_105] 
							,[check_106] 
							,[check_107] 
							,[check_108] 
							,[check_109] 
							,[check_110] 
							,[check_111] 
							,[check_112] 
							,[check_113] 
							,[check_114] 
							,[check_115] 
							,[check_116] 
							,[check_117] 
							,[check_118] 
							,[check_119] 
							,[check_120] 
							,[check_121] 
							,[check_122] 
							,[check_123] 
							,[check_124] 
							,[check_125] 
							,[check_126] 
							,[check_127] 
							,[check_128] 
							,[check_129] 
							,[check_130] 
							,[check_131] 
							,[check_132] 
							,[check_133] 
							,[check_134] 
							,[check_135] 
							,[check_136] 
							,[check_137] 
							,[check_138] 
							,[check_139] 
							,[check_140] 
							,[check_141] 
							,[check_142] 
							,[check_143] 
							,[check_144] 
							,[check_145] 
							,[check_146] 
							,[check_147] 
							,[check_148] 
							,[check_149] 
							,[check_150] 
							,[check_151] 
							,[check_152] 
							,[check_153] 
							,[check_154] 
							,[check_155] 
							,[check_156] 
							,[check_157] 
							,[check_158] 
							,[check_159] 
							,[check_160] 
							,[check_161] 
							,[check_167] 
							,[check_168] 
							,[check_169] 
							,[check_170] 
							,[check_171] 
							,[check_172] 
							,[check_173] 
							,[check_174] 
							,[check_175] 
							,[check_176] 
							,[check_177] 
							,[check_178] 
							,[check_179] 
							,[check_180] 
							,[check_181] 
							,[check_182] 
							,[check_183] 
							,[check_184] 
							,[check_185] 
							,[check_186] 
							,[check_187] 
							,[check_188] 
							,[check_189] 
							,[check_190] 
							,[check_191] 
							,[check_192] 
							,[check_193] 
							,[check_194] 
							,[check_195] 
							,[check_196] 
							,[check_197] 
							,[check_198] 
							,[check_199] 
							,[check_200] 
							,[check_201] 
							,[check_202] 
							,[check_203] 
							,[check_204] 
							,[check_205] 
							,[check_206] 
							,[check_207] 
							,[check_208] 
							,[check_209] 
							,[check_210] 
							,[check_211] 
							,[check_212] 
							,[check_213] 
							,[check_214] 
							,[check_215] 
							,[check_216] 
							,[check_217] 
							,[check_218] 
							,[check_219] 
							,[check_220] 
							,[check_221] 
							,[check_222] 
							,[check_223] 
							,[check_224] 
							,[check_225] 
							,[check_226] 
							,[check_227] 
							,[check_228] 
							,[check_229] 
							,[check_230] 
							,[check_231] 
							,[check_232] 
							,[check_233] 
							,[check_234] 
							,[check_235] 
							,[check_236] 
							,[check_237] 
							,[check_238] 
							,[check_239] 
							,[check_240] 
							,[check_241] 
							,[check_242] 
							,[check_243] 
							,[check_244] 
							,[check_245] 
							,[check_246] 
							,[check_247] 
							,[check_248] 
							,[check_249] 
							,[check_250] 
							,[check_251] 
							,[check_252] 
							,[check_253] 
							,[check_254] 
							,[check_255] 
							,[check_256] 
							,[check_257] 
							,[check_258] 
							,[check_259] 
							,[check_260] 
							,[check_261] 
							,[check_262] 
							,[check_263] 
							,[check_264] 
							,[check_265] 

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

$fecha_nacimiento        =$ROW_encabezado['fecha_nacimiento'];
$horas_trabajadas        =$ROW_encabezado['horas_trabajadas'];
$jornada                 =strtoupper($ROW_encabezado['jornada']);
$tipo                    =$ROW_encabezado['tipo'];

// ACCIÓN SUBESTANDAR

if($ROW_encabezado['check_1'] == 'true' || $ROW_encabezado['check_2'] == 'true' || $ROW_encabezado['check_3'] == 'true'|| $ROW_encabezado['check_4'] == 'true')
	{$check_1_4 ='<label style="background-color: #d7dbdd;"><br /> + Equipos de mantenimiento en funcionamiento <br /><br /></label>';} 
else{$check_1_4 ='';}	

if($ROW_encabezado['check_1'] =='true'){$check_1 ='- Rellenar, empacar,etc., con equipo bajo presión.                <br />';}else{$check_1 ='';}
if($ROW_encabezado['check_2'] =='true'){$check_2 ='- Limpiar, engrasar, ajustar, reparar equipo en funcionamiento.   <br />';}else{$check_2 ='';}
if($ROW_encabezado['check_3'] =='true'){$check_3 ='- Soldar o reparar tanques o recipientes sin purgar.              <br />';}else{$check_3 ='';}
if($ROW_encabezado['check_4'] =='true'){$check_4 ='- Trabajar en equipo eléctrico.                                   <br />';}else{$check_4 ='';}

if($ROW_encabezado['check_5'] == 'true' || $ROW_encabezado['check_6'] == 'true' || $ROW_encabezado['check_7'] == 'true'|| $ROW_encabezado['check_8'] == 'true' || $ROW_encabezado['check_9'] == 'true')
	{$check_5_9 ='<label style="background-color: #d7dbdd;"><br /> + No advertir o asegurar <br /><br /></label>';} 
else{$check_5_9 ='';}	

if($ROW_encabezado['check_5'] =='true'){$check_5 ='- No cerrar con llave, bloquear o asegurar contra movimiento inesperado.   <br />';}else{$check_5 ='';}
if($ROW_encabezado['check_6'] =='true'){$check_6 ='- No apagar equipos que no están en uso.                                   <br />';}else{$check_6 ='';}
if($ROW_encabezado['check_7'] =='true'){$check_7 ='- No poner señales de advertencia, etiquetas o letreros.                   <br />';}else{$check_7 ='';}
if($ROW_encabezado['check_8'] =='true'){$check_8 ='- Soltar o mover cargas sin advertir adecuadamente.                        <br />';}else{$check_8 ='';}
if($ROW_encabezado['check_9'] =='true'){$check_9 ='- Arrancar o detener vehículos sin advertir adecuadamente.                 <br />';}else{$check_9 ='';}

if($ROW_encabezado['check_10'] == 'true' || $ROW_encabezado['check_11'] == 'true' || $ROW_encabezado['check_12'] == 'true'|| $ROW_encabezado['check_13'] == 'true')
	{$check_10_13 ='<label style="background-color: #d7dbdd;"><br /> + Hacer inoperante los dispositivos de seguridad <br /><br /></label>';} 
else{$check_10_13 ='';}	

if($ROW_encabezado['check_10'] =='true'){$check_10 ='- Bloquear, tapar o ligar dispositivos de seguridad.                     <br />';}else{$check_10 ='';}
if($ROW_encabezado['check_11'] =='true'){$check_11 ='- Desconectar o quitar dispositivos de seguridad.                        <br />';}else{$check_11 ='';}
if($ROW_encabezado['check_12'] =='true'){$check_12 ='- Ajustar dispositivos de seguridad inadecuadamente.                     <br />';}else{$check_12 ='';}
if($ROW_encabezado['check_13'] =='true'){$check_13 ='- Reemplazar un dispositivo de seguridad con otro de capacidad impropia. <br />';}else{$check_13 ='';}

if($ROW_encabezado['check_14'] == 'true' || $ROW_encabezado['check_15'] == 'true' || $ROW_encabezado['check_16'] == 'true'|| $ROW_encabezado['check_17'] == 'true')
	{$check_14_17 ='<label style="background-color: #d7dbdd;"><br /> + Operar o trabajar a una velocidad impropia <br /><br /></label>';} 
else{$check_14_17 ='';}	

if($ROW_encabezado['check_14'] =='true'){$check_14 ='- Alimentando o abasteciendo materiales demasiado rápido. <br />';}else{$check_14 ='';}
if($ROW_encabezado['check_15'] =='true'){$check_15 ='- Saltar desde elevaciones.                               <br />';}else{$check_15 ='';}
if($ROW_encabezado['check_16'] =='true'){$check_16 ='- Correr.                                                 <br />';}else{$check_16 ='';}
if($ROW_encabezado['check_17'] =='true'){$check_17 ='- Tirar materiales en lugar de pasarlo o llevarlos.       <br />';}else{$check_17 ='';}

if($ROW_encabezado['check_18'] == 'true' || $ROW_encabezado['check_19'] == 'true' || $ROW_encabezado['check_20'] == 'true'|| $ROW_encabezado['check_21'] == 'true' || $ROW_encabezado['check_22'] == 'true')
	{$check_18_22 ='<label style="background-color: #d7dbdd;"><br /> + Posición o postura impropia para la tarea <br /><br /></label>';} 
else{$check_18_22 ='';}	

if($ROW_encabezado['check_18'] =='true'){$check_18 ='- Entrar a espacios encerrados sin el margen apropiado.       <br />';}else{$check_18 ='';}
if($ROW_encabezado['check_19'] =='true'){$check_19 ='- Montar en posiciones inseguras.                             <br />';}else{$check_19 ='';}
if($ROW_encabezado['check_20'] =='true'){$check_20 ='- Mover bajos las cargas suspendidas.                         <br />';}else{$check_20 ='';}
if($ROW_encabezado['check_21'] =='true'){$check_21 ='- Exposición a cargas oscilantes.                             <br />';}else{$check_21 ='';}
if($ROW_encabezado['check_22'] =='true'){$check_22 ='- Exposición innecesaria a materiales o equipo en movimiento. <br />';}else{$check_22 ='';}

if($ROW_encabezado['check_23'] == 'true' || $ROW_encabezado['check_24'] == 'true' || $ROW_encabezado['check_25'] == 'true'|| $ROW_encabezado['check_26'] == 'true')
	{$check_23_26 ='<label style="background-color: #d7dbdd;"><br /> + Colocar, mezclar o combinar en forma impropia <br /><br /></label>';} 
else{$check_23_26 ='';}	

if($ROW_encabezado['check_23'] =='true'){$check_23 ='- Inyectar, mezclar, o combinar sustancias.                                                       <br />';}else{$check_23 ='';}
if($ROW_encabezado['check_24'] =='true'){$check_24 ='- Crea una explosión, incendio u otro peligro.                                                    <br />';}else{$check_24 ='';}
if($ROW_encabezado['check_25'] =='true'){$check_25 ='- Posicionamiento impropio de vehículos o equipo de manejo de materiales para cargar o descargar. <br />';}else{$check_25 ='';}
if($ROW_encabezado['check_26'] =='true'){$check_26 ='- Colocación impropia de materiales que crean peligros como tropezar o chocar.                    <br />';}else{$check_26 ='';}

if($ROW_encabezado['check_27'] == 'true' || $ROW_encabezado['check_28'] == 'true' || $ROW_encabezado['check_29'] == 'true')
	{$check_27_29 ='<label style="background-color: #d7dbdd;"><br /> + Uso impropio del equipo <br /><br /></label>';} 
else{$check_27_29 ='';}	

if($ROW_encabezado['check_27'] =='true'){$check_27 ='- Usar equipo etiquetado o evidentemente defectuoso.                 <br />';}else{$check_27 ='';}
if($ROW_encabezado['check_28'] =='true'){$check_28 ='- Usar equipo o material de una manera para lo que no fue pensado.   <br />';}else{$check_28 ='';}
if($ROW_encabezado['check_29'] =='true'){$check_29 ='- Cargar excesivamente equipo o estructuras.                         <br />';}else{$check_29 ='';}

if($ROW_encabezado['check_30'] == 'true' || $ROW_encabezado['check_31'] == 'true' || $ROW_encabezado['check_32'] == 'true')
	{$check_30_32 ='<label style="background-color: #d7dbdd;"><br /> + Uso impropio de manos o partes del cuerpo<br /><br /></label>';} 
else{$check_30_32 ='';}	

if($ROW_encabezado['check_30'] =='true'){$check_30 ='- Asir objetos en forma insegura.              <br />';}else{$check_30 ='';}
if($ROW_encabezado['check_31'] =='true'){$check_31 ='- Agarrar objetos inadecuadamente.             <br />';}else{$check_31 ='';}
if($ROW_encabezado['check_32'] =='true'){$check_32 ='- Usar las manos en lugar de las herramientas. <br />';}else{$check_32 ='';}

if($ROW_encabezado['check_33'] == 'true' || $ROW_encabezado['check_34'] == 'true' || $ROW_encabezado['check_35'] == 'true'|| $ROW_encabezado['check_36'] == 'true' || $ROW_encabezado['check_37'] == 'true')
	{$check_33_37 ='<label style="background-color: #d7dbdd;"><br /> + Otras prácticas subestándares <br /><br /></label>';} 
else{$check_33_37 ='';}	

if($ROW_encabezado['check_33'] =='true'){$check_33 ='- Falta de atención al equilibrio o el ambiente.    <br />';}else{$check_33 ='';}
if($ROW_encabezado['check_34'] =='true'){$check_34 ='- No usar vestimenta personal segura.               <br />';}else{$check_34 ='';}
if($ROW_encabezado['check_35'] =='true'){$check_35 ='- No usar equipo de protección personal disponible. <br />';}else{$check_35 ='';}
if($ROW_encabezado['check_36'] =='true'){$check_36 ='- Uso impropio del equipo de protección personal.   <br />';}else{$check_36 ='';}
if($ROW_encabezado['check_37'] =='true'){$check_37 ='- Bromas.                                           <br />';}else{$check_37 ='';}

if($ROW_encabezado['check_38'] == 'true' || $ROW_encabezado['check_39'] == 'true' || $ROW_encabezado['check_40'] == 'true'|| $ROW_encabezado['check_41'] == 'true' || $ROW_encabezado['check_42'] == 'true' || $ROW_encabezado['check_43'] == 'true')
	{$check_38_43 ='<label style="background-color: #d7dbdd;"><br /> + Métodos o procedimientos peligrosos <br /><br /></label>';} 
else{$check_38_43 ='';}	

if($ROW_encabezado['check_38'] =='true'){$check_38 ='- Uso de materiales/equipos inherentes peligrosas.         <br />';}else{$check_38 ='';}
if($ROW_encabezado['check_39'] =='true'){$check_39 ='- Uso de método / procedimientos inherentes peligrosas.    <br />';}else{$check_39 ='';}
if($ROW_encabezado['check_40'] =='true'){$check_40 ='- Uso de equipo inadecuado e impropio.                     <br />';}else{$check_40 ='';}
if($ROW_encabezado['check_41'] =='true'){$check_41 ='- Ayuda inadecuada para el levantamiento de cosas pesadas. <br />';}else{$check_41 ='';}
if($ROW_encabezado['check_42'] =='true'){$check_42 ='- Asignación impropia de personal.                         <br />';}else{$check_42 ='';}
if($ROW_encabezado['check_43'] =='true'){$check_43 ='- Otros métodos o procedimientos peligrosos.               <br />';}else{$check_43 ='';}

if($ROW_encabezado['check_44'] == 'true' )
	{$check_44_44 ='<label style="background-color: #d7dbdd;"><br /> + Otro <br /><br /></label>';} 
else{$check_44_44 ='';}	

if($ROW_encabezado['check_44'] =='true'){$check_44 ='- Trabajador adopta postura inadecuado de arrastre o traslado de piezas. <br />';}else{$check_44 ='';}

// FIN ACCIÓN SUBESTANDAR

// CONDICIÓN SUBESTANDAR

if($ROW_encabezado['check_45'] == 'true' || $ROW_encabezado['check_46'] == 'true' || $ROW_encabezado['check_47'] == 'true' || $ROW_encabezado['check_48'] == 'true' || $ROW_encabezado['check_49'] == 'true' ||
   $ROW_encabezado['check_50'] == 'true' || $ROW_encabezado['check_51'] == 'true' || $ROW_encabezado['check_52'] == 'true' || $ROW_encabezado['check_53'] == 'true' || $ROW_encabezado['check_54'] == 'true' ||
   $ROW_encabezado['check_55'] == 'true')   
    {$check_45_55 ='<label style="background-color: #d7dbdd;"><br /> + Defecto de herramientas o equipo <br /><br /></label>';} 
else{$check_45_55 ='';}	

if($ROW_encabezado['check_45'] =='true'){$check_45 ='- Diseñado inadecuadamente.           <br />';}else{$check_45 ='';}
if($ROW_encabezado['check_46'] =='true'){$check_46 ='- Compuesto de materiales impropios.  <br />';}else{$check_46 ='';}
if($ROW_encabezado['check_47'] =='true'){$check_47 ='- Inadecuadamente compuesto o armado. <br />';}else{$check_47 ='';}
if($ROW_encabezado['check_48'] =='true'){$check_48 ='- Desafilado.                         <br />';}else{$check_48 ='';}
if($ROW_encabezado['check_49'] =='true'){$check_49 ='- Asignación impropia de personal.    <br />';}else{$check_49 ='';}
if($ROW_encabezado['check_50'] =='true'){$check_50 ='- Áspero.                             <br />';}else{$check_50 ='';}
if($ROW_encabezado['check_51'] =='true'){$check_51 ='- Resbaladizo.                        <br />';}else{$check_51 ='';}
if($ROW_encabezado['check_52'] =='true'){$check_52 ='- Desgastado.                         <br />';}else{$check_52 ='';}
if($ROW_encabezado['check_53'] =='true'){$check_53 ='- Raído.                              <br />';}else{$check_53 ='';}
if($ROW_encabezado['check_54'] =='true'){$check_54 ='- Rasgado.                            <br />';}else{$check_54 ='';}
if($ROW_encabezado['check_55'] =='true'){$check_55 ='- Roto.                               <br />';}else{$check_55 ='';}

if($ROW_encabezado['check_56'] == 'true' || $ROW_encabezado['check_57'] == 'true' || $ROW_encabezado['check_58'] == 'true')
	{$check_56_58 ='<label style="background-color: #d7dbdd;"><br /> + Peligros de la vestimenta <br /><br /></label>';} 
else{$check_56_58 ='';}	

if($ROW_encabezado['check_56'] =='true'){$check_56 ='- Falta de equipo protector adecuado. <br />';}else{$check_56 ='';}
if($ROW_encabezado['check_57'] =='true'){$check_57 ='- Ropa impropia o inadecuada.         <br />';}else{$check_57 ='';}
if($ROW_encabezado['check_58'] =='true'){$check_58 ='- Otros peligros de la vestimenta.    <br />';}else{$check_58 ='';}

if($ROW_encabezado['check_59'] == 'true' || $ROW_encabezado['check_60'] == 'true' || $ROW_encabezado['check_61'] == 'true' || $ROW_encabezado['check_62'] == 'true' || $ROW_encabezado['check_63'] == 'true' ||
   $ROW_encabezado['check_64'] == 'true' || $ROW_encabezado['check_65'] == 'true' || $ROW_encabezado['check_66'] == 'true' || $ROW_encabezado['check_67'] == 'true' || $ROW_encabezado['check_68'] == 'true' ||
   $ROW_encabezado['check_69'] == 'true' || $ROW_encabezado['check_70'] == 'true') 
	{$check_59_70 ='<label style="background-color: #d7dbdd;"><br /> + Peligros del medio ambiente <br /><br /></label>';} 
else{$check_59_70 ='';}	

if($ROW_encabezado['check_59'] =='true'){$check_59 ='- Ruido excesivo.                                      <br />';}else{$check_59 ='';}
if($ROW_encabezado['check_60'] =='true'){$check_60 ='- Espacio inadecuado en pasillos.                      <br />';}else{$check_60 ='';}
if($ROW_encabezado['check_61'] =='true'){$check_61 ='- Salidas inadecuadas.                                 <br />';}else{$check_61 ='';}
if($ROW_encabezado['check_62'] =='true'){$check_62 ='- Margen inadecuado (congestión o restricción).        <br />';}else{$check_62 ='';}
if($ROW_encabezado['check_63'] =='true'){$check_63 ='- Control inadecuado de tráficos.                      <br />';}else{$check_63 ='';}
if($ROW_encabezado['check_64'] =='true'){$check_64 ='- Ventilación inadecuada.                              <br />';}else{$check_64 ='';}
if($ROW_encabezado['check_65'] =='true'){$check_65 ='- Espacio de trabajo insuficiente.                     <br />';}else{$check_65 ='';}
if($ROW_encabezado['check_66'] =='true'){$check_66 ='- Iluminación impropia (insuficiencia o exceso).       <br />';}else{$check_66 ='';}
if($ROW_encabezado['check_67'] =='true'){$check_67 ='- Contaminación del aire.                              <br />';}else{$check_67 ='';}
if($ROW_encabezado['check_68'] =='true'){$check_68 ='- Exposiciones a radiación.                            <br />';}else{$check_68 ='';}
if($ROW_encabezado['check_69'] =='true'){$check_69 ='- Peligros de incendio y explosión.                    <br />';}else{$check_69 ='';}
if($ROW_encabezado['check_70'] =='true'){$check_70 ='- Limpieza insuficiente; lugar de trabajo desordenado. <br />';}else{$check_70 ='';}

if($ROW_encabezado['check_71'] == 'true' || $ROW_encabezado['check_72'] == 'true' || $ROW_encabezado['check_73'] == 'true')
	{$check_71_73 ='<label style="background-color: #d7dbdd;"><br /> + Riesgos de la colocación <br /><br /></label>';} 
else{$check_71_73 ='';}	

if($ROW_encabezado['check_71'] =='true'){$check_71 ='- Inadecuadamente apilado.                               <br />';}else{$check_71 ='';}
if($ROW_encabezado['check_72'] =='true'){$check_72 ='- Inadecuadamente colocado.                              <br />';}else{$check_72 ='';}
if($ROW_encabezado['check_73'] =='true'){$check_73 ='- Inadecuadamente asegurado contra movimiento indeseado. <br />';}else{$check_73 ='';}

if($ROW_encabezado['check_74'] == 'true' || $ROW_encabezado['check_75'] == 'true' || $ROW_encabezado['check_76'] == 'true' || $ROW_encabezado['check_77'] == 'true' || $ROW_encabezado['check_78'] == 'true' ||
   $ROW_encabezado['check_79'] == 'true' || $ROW_encabezado['check_80'] == 'true' || $ROW_encabezado['check_81'] == 'true' || $ROW_encabezado['check_82'] == 'true') 
	{$check_74_82 ='<label style="background-color: #d7dbdd;"><br /> + Riesgos de dispositivos de protección inadecuados <br /><br /></label>';} 
else{$check_74_82 ='';}	

if($ROW_encabezado['check_74'] =='true'){$check_74 ='- Peligros mecánicos o físicos sin protección.                     <br />';}else{$check_74 ='';}
if($ROW_encabezado['check_75'] =='true'){$check_75 ='- Peligros mecánicos o físicos con protección inadecuada.          <br />';}else{$check_75 ='';}
if($ROW_encabezado['check_76'] =='true'){$check_76 ='- Falta de puntales o soportes, o puntales o soportes inadecuados. <br />';}else{$check_76 ='';}
if($ROW_encabezado['check_77'] =='true'){$check_77 ='- Corriente eléctrica sin tierra.                                  <br />';}else{$check_77 ='';}
if($ROW_encabezado['check_78'] =='true'){$check_78 ='- Corriente eléctrica sin aislamiento.                             <br />';}else{$check_78 ='';}
if($ROW_encabezado['check_79'] =='true'){$check_79 ='- Radiación inadecuadamente protegida.                             <br />';}else{$check_79 ='';}
if($ROW_encabezado['check_80'] =='true'){$check_80 ='- Radiación sin protección.                                        <br />';}else{$check_80 ='';}
if($ROW_encabezado['check_81'] =='true'){$check_81 ='- Radiación inadecuadamente protegida.                             <br />';}else{$check_81 ='';}
if($ROW_encabezado['check_82'] =='true'){$check_82 ='- Materiales sin etiquetar o inadecuadamente etiquetados.          <br />';}else{$check_82 ='';}

if($ROW_encabezado['check_83'] == 'true' || $ROW_encabezado['check_84'] == 'true' || $ROW_encabezado['check_85'] == 'true' || $ROW_encabezado['check_86'] == 'true')
	{$check_83_86 ='<label style="background-color: #d7dbdd;"><br /> + Peligros fuera del ambiente de trabajo de la organización <br /><br /></label>';} 
else{$check_83_86 ='';}	

if($ROW_encabezado['check_83'] =='true'){$check_83 ='- Artículos defectuosos de otros.                         <br />';}else{$check_83 ='';}
if($ROW_encabezado['check_84'] =='true'){$check_84 ='- Otros peligros asociados con la propiedad de otros.     <br />';}else{$check_84 ='';}
if($ROW_encabezado['check_85'] =='true'){$check_85 ='- Otros peligros asociados con la actividad de otros.     <br />';}else{$check_85 ='';}
if($ROW_encabezado['check_86'] =='true'){$check_86 ='- Peligros naturales: el tiempo, terreno, animales, etc.. <br />';}else{$check_86 ='';}

if($ROW_encabezado['check_87'] == 'true' || $ROW_encabezado['check_88'] == 'true')
	{$check_87_88 ='<label style="background-color: #d7dbdd;"><br /> + Peligros públicos <br /><br /></label>';} 
else{$check_87_88 ='';}	

if($ROW_encabezado['check_87'] =='true'){$check_87 ='- Peligros del transporte publico. <br />';}else{$check_87 ='';}
if($ROW_encabezado['check_88'] =='true'){$check_88 ='- Peligros del trafico.            <br />';}else{$check_88 ='';}

if($ROW_encabezado['check_89'] == 'true')
	{$check_89_89 ='<label style="background-color: #d7dbdd;"><br /> + Otro <br /><br /></label>';} 
else{$check_89_89 ='';}	

if($ROW_encabezado['check_89'] =='true'){$check_89 ='- Condiciones propias del entorno, trabajo repetitivo. <br />';}else{$check_89 ='';}

// FACTORES PERSONALES 

// FIN FACTORES PERSONALES 

if($ROW_encabezado['check_90'] == 'true' || $ROW_encabezado['check_91'] == 'true' || $ROW_encabezado['check_92'] == 'true' || $ROW_encabezado['check_93'] == 'true' || $ROW_encabezado['check_94'] == 'true' ||
   $ROW_encabezado['check_95'] == 'true' || $ROW_encabezado['check_96'] == 'true' || $ROW_encabezado['check_97'] == 'true' || $ROW_encabezado['check_98'] == 'true' || $ROW_encabezado['check_99'] == 'true' ||
   $ROW_encabezado['check_100'] == 'true' || $ROW_encabezado['check_101'] == 'true') 
	{$check_90_101 ='<label style="background-color: #d7dbdd;"><br /> + Capacidad física / fisiológica inadecuada <br /><br /></label>';} 
else{$check_90_101 ='';}	

if($ROW_encabezado['check_90'] =='true'){$check_90   ='- Altura, peso, talla fuerza, alcance, etc., inadecuados.                        <br />';}else{$check_90 ='';}
if($ROW_encabezado['check_91'] =='true'){$check_91   ='- Capacidad limitada de movimiento corporal.                                     <br />';}else{$check_91 ='';}
if($ROW_encabezado['check_92'] =='true'){$check_92   ='- Capacidad   limitada para mantenerse es determinadas posiciones corporales.    <br />';}else{$check_92 ='';}
if($ROW_encabezado['check_93'] =='true'){$check_93   ='- Sensibilidad o alergias a ciertas sustancias.                                  <br />';}else{$check_93 ='';}
if($ROW_encabezado['check_94'] =='true'){$check_94   ='- Asignación impropia de personal.                                               <br />';}else{$check_94 ='';}
if($ROW_encabezado['check_95'] =='true'){$check_95   ='- Sensibilidad a determinados extremos sensoriales (temperatura, sonidos, etc.). <br />';}else{$check_95 ='';}
if($ROW_encabezado['check_96'] =='true'){$check_96   ='- Visión defectuosa.                                                             <br />';}else{$check_96 ='';}
if($ROW_encabezado['check_97'] =='true'){$check_97   ='- Audición defectuosa.                                                           <br />';}else{$check_97 ='';}
if($ROW_encabezado['check_98'] =='true'){$check_98   ='- Otras deficiencias sensoriales (tacto, gusto, olfato, equilibrio).             <br />';}else{$check_98 ='';}
if($ROW_encabezado['check_99'] =='true'){$check_99   ='- Incapacidad respiratoria.                                                      <br />';}else{$check_99 ='';}
if($ROW_encabezado['check_100'] =='true'){$check_100 ='- Otras incapacidades físicas permanentes.                                       <br />';}else{$check_100 ='';}
if($ROW_encabezado['check_101'] =='true'){$check_101 ='- Incapacidades temporales.                                                      <br />';}else{$check_101 ='';}

if($ROW_encabezado['check_102'] == 'true' || $ROW_encabezado['check_103'] == 'true' || $ROW_encabezado['check_104'] == 'true' || $ROW_encabezado['check_105'] == 'true' || $ROW_encabezado['check_106'] == 'true' ||
   $ROW_encabezado['check_107'] == 'true' || $ROW_encabezado['check_108'] == 'true' || $ROW_encabezado['check_109'] == 'true' || $ROW_encabezado['check_110'] == 'true' || $ROW_encabezado['check_111'] == 'true') 
	{$check_102_111 ='<label style="background-color: #d7dbdd;"><br /> + Capacidad mental/ sicológica inadecuada <br /><br /></label>';} 
else{$check_102_111 ='';}	

if($ROW_encabezado['check_102'] =='true'){$check_102 ='- Miedos y fobias.             <br />';}else{$check_102 ='';}
if($ROW_encabezado['check_103'] =='true'){$check_103 ='- Perturbación emocional.      <br />';}else{$check_103 ='';}
if($ROW_encabezado['check_104'] =='true'){$check_104 ='- Nivel de inteligencia.       <br />';}else{$check_104 ='';}
if($ROW_encabezado['check_105'] =='true'){$check_105 ='- Incapacidad de comprensión.  <br />';}else{$check_105 ='';}
if($ROW_encabezado['check_106'] =='true'){$check_106 ='- Falta de juicio.             <br />';}else{$check_106 ='';}
if($ROW_encabezado['check_107'] =='true'){$check_107 ='- Escasa coordinación.         <br />';}else{$check_107 ='';}
if($ROW_encabezado['check_108'] =='true'){$check_108 ='- Tiempo lento de reacción.    <br />';}else{$check_108 ='';}
if($ROW_encabezado['check_109'] =='true'){$check_109 ='- Aptitud mecánica deficiente. <br />';}else{$check_109 ='';}
if($ROW_encabezado['check_110'] =='true'){$check_110 ='- Baja aptitud de aprendizaje. <br />';}else{$check_110 ='';}
if($ROW_encabezado['check_111'] =='true'){$check_111 ='- Problemas de memorias.       <br />';}else{$check_111 ='';}

if($ROW_encabezado['check_112'] == 'true' || $ROW_encabezado['check_113'] == 'true' || $ROW_encabezado['check_114'] == 'true' || $ROW_encabezado['check_115'] == 'true' || $ROW_encabezado['check_116'] == 'true' ||
   $ROW_encabezado['check_117'] == 'true' || $ROW_encabezado['check_118'] == 'true' || $ROW_encabezado['check_119'] == 'true' || $ROW_encabezado['check_120'] == 'true' || $ROW_encabezado['check_121'] == 'true') 
	{$check_112_121 ='<label style="background-color: #d7dbdd;"><br /> + Estrés mental o sicológicos <br /><br /></label>';} 
else{$check_112_121 ='';}	

if($ROW_encabezado['check_112'] =='true'){$check_112 ='- Sobrecarga emocional.                                                     <br />';}else{$check_112 ='';}
if($ROW_encabezado['check_113'] =='true'){$check_113 ='- Fatiga debida a la carga o las limitaciones de tiempo de la tarea mental. <br />';}else{$check_113 ='';}
if($ROW_encabezado['check_114'] =='true'){$check_114 ='- Obligaciones que exigen un juicio toma de decisiones extremas.            <br />';}else{$check_114 ='';}
if($ROW_encabezado['check_115'] =='true'){$check_115 ='- Rutina, monotonía, exigencias para un cargo sin transcendencia.           <br />';}else{$check_115 ='';}
if($ROW_encabezado['check_116'] =='true'){$check_116 ='- Exigencia de una concentración/ percepción profunda.                      <br />';}else{$check_116 ='';}
if($ROW_encabezado['check_117'] =='true'){$check_117 ='- Ordenes confusas.                                                         <br />';}else{$check_117 ='';}
if($ROW_encabezado['check_118'] =='true'){$check_118 ='- Solicitudes conflictivas.                                                 <br />';}else{$check_118 ='';}
if($ROW_encabezado['check_119'] =='true'){$check_119 ='- Preocupación debidos a problemas.                                         <br />';}else{$check_119 ='';}
if($ROW_encabezado['check_120'] =='true'){$check_120 ='- Frustraciones.                                                            <br />';}else{$check_120 ='';}
if($ROW_encabezado['check_121'] =='true'){$check_121 ='- Enfermedad mental.                                                        <br />';}else{$check_121 ='';}

if($ROW_encabezado['check_122'] == 'true' || $ROW_encabezado['check_123'] == 'true' || $ROW_encabezado['check_124'] == 'true' || $ROW_encabezado['check_125'] == 'true') 
	{$check_122_125 ='<label style="background-color: #d7dbdd;"><br /> + Falta de conocimiento <br /><br /></label>';} 
else{$check_122_125 ='';}	

if($ROW_encabezado['check_122'] =='true'){$check_122 ='- Falta de experiencia.             <br />';}else{$check_122 ='';}
if($ROW_encabezado['check_123'] =='true'){$check_123 ='- Orientación deficiente.           <br />';}else{$check_123 ='';}
if($ROW_encabezado['check_124'] =='true'){$check_124 ='- Entrenamiento inicial inadecuado. <br />';}else{$check_124 ='';}
if($ROW_encabezado['check_125'] =='true'){$check_125 ='- Ordenes mal interpretadas.        <br />';}else{$check_125 ='';}

if($ROW_encabezado['check_126'] == 'true' || $ROW_encabezado['check_127'] == 'true' || $ROW_encabezado['check_128'] == 'true' || $ROW_encabezado['check_129'] == 'true') 
	{$check_126_129 ='<label style="background-color: #d7dbdd;"><br /> + Falta de habilidad <br /><br /></label>';} 
else{$check_126_129 ='';}	

if($ROW_encabezado['check_126'] =='true'){$check_126 ='- Instrucción inicial inadecuada. <br />';}else{$check_126 ='';}
if($ROW_encabezado['check_127'] =='true'){$check_127 ='- Practica inadecuada.            <br />';}else{$check_127 ='';}
if($ROW_encabezado['check_128'] =='true'){$check_128 ='- Operación esporádica.           <br />';}else{$check_128 ='';}
if($ROW_encabezado['check_129'] =='true'){$check_129 ='- Falta de preparación.           <br />';}else{$check_129 ='';}

if($ROW_encabezado['check_130'] == 'true' || $ROW_encabezado['check_131'] == 'true' || $ROW_encabezado['check_132'] == 'true' || $ROW_encabezado['check_133'] == 'true' || $ROW_encabezado['check_134'] == 'true' ||
   $ROW_encabezado['check_135'] == 'true' || $ROW_encabezado['check_136'] == 'true' || $ROW_encabezado['check_137'] == 'true' || $ROW_encabezado['check_138'] == 'true' || $ROW_encabezado['check_139'] == 'true' ||
   $ROW_encabezado['check_140'] == 'true') 
	{$check_130_140 ='<label style="background-color: #d7dbdd;"><br /> + Motivación deficiente <br /><br /></label>';} 
else{$check_130_140 ='';}	

if($ROW_encabezado['check_130'] =='true'){$check_130 ='- El desempeño subestándar es más gratificante.               <br />';}else{$check_130 ='';}
if($ROW_encabezado['check_131'] =='true'){$check_131 ='- El desempeño estándar causa desagrado.                      <br />';}else{$check_131 ='';}
if($ROW_encabezado['check_132'] =='true'){$check_132 ='- Falta de incentivos .                                       <br />';}else{$check_132 ='';}
if($ROW_encabezado['check_133'] =='true'){$check_133 ='- Demasiadas frustraciones.                                   <br />';}else{$check_133 ='';}
if($ROW_encabezado['check_134'] =='true'){$check_134 ='- Agresión inadecuada.                                        <br />';}else{$check_134 ='';}
if($ROW_encabezado['check_135'] =='true'){$check_135 ='- No existe interés para evitar la incomodidad.               <br />';}else{$check_135 ='';}
if($ROW_encabezado['check_136'] =='true'){$check_136 ='- Sin interés por sobresalir.                                  <br />';}else{$check_136 ='';}
if($ROW_encabezado['check_137'] =='true'){$check_137 ='- Ejemplos deficientes por parte de la supervisión.           <br />';}else{$check_137 ='';}
if($ROW_encabezado['check_138'] =='true'){$check_138 ='- Retroalimentación inadecuada del desempeño.                 <br />';}else{$check_138 ='';}
if($ROW_encabezado['check_139'] =='true'){$check_139 ='- Falta de refuerzo positivo para el comportamiento correcto. <br />';}else{$check_139 ='';}
if($ROW_encabezado['check_140'] =='true'){$check_140 ='- Falta de incentivos de producción.                          <br />';}else{$check_140 ='';}

if($ROW_encabezado['check_141'] == 'true') 
	{$check_141_141 ='<label style="background-color: #d7dbdd;"><br /> + Otro <br /><br /></label>';} 
else{$check_141_141 ='';}	

if($ROW_encabezado['check_141'] =='true'){$check_141 ='- Postura inadecuada. <br />';}else{$check_141 ='';}

// FIN CONDICIÓN SUBESTANDAR

// FACTORES DEL TRABAJO

if($ROW_encabezado['check_142'] == 'true' || $ROW_encabezado['check_143'] == 'true' || $ROW_encabezado['check_144'] == 'true' || $ROW_encabezado['check_145'] == 'true' || $ROW_encabezado['check_146'] == 'true' ||
   $ROW_encabezado['check_147'] == 'true' || $ROW_encabezado['check_148'] == 'true' || $ROW_encabezado['check_149'] == 'true' || $ROW_encabezado['check_150'] == 'true' || $ROW_encabezado['check_151'] == 'true' ||
   $ROW_encabezado['check_152'] == 'true') 
	{$check_142_152 ='<label style="background-color: #d7dbdd;"><br /> + Supervisión y/o liderazgo deficiente <br /><br /></label>';} 
else{$check_142_152 ='';}	

if($ROW_encabezado['check_142'] =='true'){$check_142 ='- Relaciones jerárquicas poco claras o conflictivas.                                                        <br />';}else{$check_142 ='';}
if($ROW_encabezado['check_143'] =='true'){$check_143 ='- Asignación de responsabilidades poco claras o conflictivas.                                               <br />';}else{$check_143 ='';}
if($ROW_encabezado['check_144'] =='true'){$check_144 ='- Delegación   insuficiente o inadecuada.                                                                   <br />';}else{$check_144 ='';}
if($ROW_encabezado['check_145'] =='true'){$check_145 ='- Formulación de objetivos, metas o estándares que conflictúan.                                             <br />';}else{$check_145 ='';}
if($ROW_encabezado['check_146'] =='true'){$check_146 ='- Instrucción, orientación y/ o entrenamiento insuficiente.                                                 <br />';}else{$check_146 ='';}
if($ROW_encabezado['check_147'] =='true'){$check_147 ='- Entrega insuficiente de documentos de consulta, de instrucciones y de publicaciones guías.                <br />';}else{$check_147 ='';}
if($ROW_encabezado['check_148'] =='true'){$check_148 ='- Identificación y evaluación deficiente de exposiciones a pérdidas.                                        <br />';}else{$check_148 ='';}
if($ROW_encabezado['check_149'] =='true'){$check_149 ='- Falta de conocimiento en el trabajo, de supervisión/ administración.                                      <br />';}else{$check_149 ='';}
if($ROW_encabezado['check_150'] =='true'){$check_150 ='- Ubicación inadecuada del trabajador, de acuerdo a sus cualidades y a las exigencias que demanda la tarea. <br />';}else{$check_150 ='';}
if($ROW_encabezado['check_151'] =='true'){$check_151 ='- Medición y evaluación deficiente del desempeño.                                                           <br />';}else{$check_151 ='';}
if($ROW_encabezado['check_152'] =='true'){$check_152 ='- Retroalimentación del desempeño deficiente o incorrecto.                                                  <br />';}else{$check_152 ='';}

if($ROW_encabezado['check_153'] == 'true' || $ROW_encabezado['check_154'] == 'true' || $ROW_encabezado['check_155'] == 'true' || $ROW_encabezado['check_156'] == 'true' || $ROW_encabezado['check_157'] == 'true' ||
   $ROW_encabezado['check_158'] == 'true' || $ROW_encabezado['check_159'] == 'true') 
	{$check_153_159 ='<label style="background-color: #d7dbdd;"><br /> + Ingeniería Inadecuada <br /><br /></label>';} 
else{$check_153_159 ='';}	

if($ROW_encabezado['check_153'] =='true'){$check_153 ='- Evaluación inadecuada de las exposiciones a pérdidas.                  <br />';}else{$check_153 ='';}
if($ROW_encabezado['check_154'] =='true'){$check_154 ='- Preocupación deficiente en cuanto a los factores humanos/ ergonómicos. <br />';}else{$check_154 ='';}
if($ROW_encabezado['check_155'] =='true'){$check_155 ='- Estándares, especificaciones y/ o criterios de diseño inadecuados.     <br />';}else{$check_155 ='';}
if($ROW_encabezado['check_156'] =='true'){$check_156 ='- Controles inadecuados de las construcciones.                           <br />';}else{$check_156 ='';}
if($ROW_encabezado['check_157'] =='true'){$check_157 ='- Evaluación deficiente de la condición conveniente para operar.         <br />';}else{$check_157 ='';}
if($ROW_encabezado['check_158'] =='true'){$check_158 ='- Evaluación deficiente para el comienzo de una operación.               <br />';}else{$check_158 ='';}
if($ROW_encabezado['check_159'] =='true'){$check_159 ='- Evaluación insuficiente respecto al cambio que se produzcan.           <br />';}else{$check_159 ='';}

if($ROW_encabezado['check_160'] == 'true' || $ROW_encabezado['check_167'] == 'true' || $ROW_encabezado['check_168'] == 'true' || $ROW_encabezado['check_169'] == 'true' || $ROW_encabezado['check_170'] == 'true' ||
   $ROW_encabezado['check_171'] == 'true' || $ROW_encabezado['check_172'] == 'true' || $ROW_encabezado['check_173'] == 'true' || $ROW_encabezado['check_174'] == 'true' || $ROW_encabezado['check_161'] == 'true') 
	{$check_160_174 ='<label style="background-color: #d7dbdd;"><br /> + Deficiente en las adquisiciones <br /><br /></label>';} 
else{$check_160_174 ='';}	

if($ROW_encabezado['check_160'] =='true'){$check_160 ='- Especificaciones deficientes en cuanto a los pedidos.            <br />';}else{$check_160 ='';}
if($ROW_encabezado['check_167'] =='true'){$check_167 ='- Investigación insuficiente en cuanto a los materiales y equipos. <br />';}else{$check_167 ='';}
if($ROW_encabezado['check_168'] =='true'){$check_168 ='- Especificaciones deficientes para los vendedores.                <br />';}else{$check_168 ='';}
if($ROW_encabezado['check_169'] =='true'){$check_169 ='- Modalidad o ruta de embarque inadecuada.                         <br />';}else{$check_169 ='';}
if($ROW_encabezado['check_170'] =='true'){$check_170 ='- Comunicación inadecuada de información de seguridad y salud.     <br />';}else{$check_170 ='';}
if($ROW_encabezado['check_171'] =='true'){$check_171 ='- Manejo inadecuado de los materiales.                             <br />';}else{$check_171 ='';}
if($ROW_encabezado['check_172'] =='true'){$check_172 ='- Almacenamientos inadecuados de los materiales.                   <br />';}else{$check_172 ='';}
if($ROW_encabezado['check_173'] =='true'){$check_173 ='- Transportes inadecuados de los materiales.                       <br />';}else{$check_173 ='';}
if($ROW_encabezado['check_174'] =='true'){$check_174 ='- Identificación deficiente de artículos peligrosos.               <br />';}else{$check_174 ='';}
if($ROW_encabezado['check_161'] =='true'){$check_161 ='- Sistemas deficientes de recuperación o eliminación de desechos.  <br />';}else{$check_161 ='';}

if($ROW_encabezado['check_175'] == 'true' || $ROW_encabezado['check_176'] == 'true' || $ROW_encabezado['check_177'] == 'true' || $ROW_encabezado['check_178'] == 'true' || $ROW_encabezado['check_179'] == 'true' ||
   $ROW_encabezado['check_180'] == 'true' || $ROW_encabezado['check_181'] == 'true') 
	{$check_175_181 ='<label style="background-color: #d7dbdd;"><br /> + Mantenimiento deficiente <br /><br /></label>';} 
else{$check_175_181 ='';}	

if($ROW_encabezado['check_175'] =='true'){$check_175 ='- Prevención inadecuada de Evaluación de necesidades.    <br />';}else{$check_175 ='';}
if($ROW_encabezado['check_176'] =='true'){$check_176 ='- Prevención inadecuada de Lubricación y servicio.       <br />';}else{$check_176 ='';}
if($ROW_encabezado['check_177'] =='true'){$check_177 ='- Prevención inadecuada de Limpieza o pulimento.         <br />';}else{$check_177 ='';}
if($ROW_encabezado['check_178'] =='true'){$check_178 ='- Corrección inadecuada de Comunicación de necesidades.  <br />';}else{$check_178 ='';}
if($ROW_encabezado['check_179'] =='true'){$check_179 ='- Corrección inadecuada de Programación del trabajo.     <br />';}else{$check_179 ='';}
if($ROW_encabezado['check_180'] =='true'){$check_180 ='- Corrección inadecuada de Revisión de las piezas.       <br />';}else{$check_180 ='';}
if($ROW_encabezado['check_181'] =='true'){$check_181 ='- Corrección inadecuada de Reemplazo de partes.          <br />';}else{$check_181 ='';}

if($ROW_encabezado['check_182'] == 'true' || $ROW_encabezado['check_183'] == 'true' || $ROW_encabezado['check_184'] == 'true') 
	{$check_182_184 ='<label style="background-color: #d7dbdd;"><br /> + Estándares deficientes de trabajo <br /><br /></label>';} 
else{$check_182_184 ='';}	

if($ROW_encabezado['check_182'] =='true'){$check_182 ='- Desarrollo inadecuado de estándares.    <br />';}else{$check_182 ='';}
if($ROW_encabezado['check_183'] =='true'){$check_183 ='- Comunicación inadecuada de estándares.  <br />';}else{$check_183 ='';}
if($ROW_encabezado['check_184'] =='true'){$check_184 ='- Mantenimiento inadecuado de estándares. <br />';}else{$check_184 ='';}

if($ROW_encabezado['check_185'] == 'true' || $ROW_encabezado['check_186'] == 'true' || $ROW_encabezado['check_187'] == 'true' || $ROW_encabezado['check_188'] == 'true' || $ROW_encabezado['check_189'] == 'true' ||
   $ROW_encabezado['check_190'] == 'true' || $ROW_encabezado['check_191'] == 'true') 
	{$check_185_191 ='<label style="background-color: #d7dbdd;"><br /> + Uso y desgaste <br /><br /></label>';} 
else{$check_185_191 ='';}	

if($ROW_encabezado['check_185'] =='true'){$check_185 ='- Planificación inadecuada del uso.                          <br />';}else{$check_185 ='';}
if($ROW_encabezado['check_186'] =='true'){$check_186 ='- Prolongación excesiva de la vida útil del elemento.        <br />';}else{$check_186 ='';}
if($ROW_encabezado['check_187'] =='true'){$check_187 ='- Inspección y/o control deficiente.                         <br />';}else{$check_187 ='';}
if($ROW_encabezado['check_188'] =='true'){$check_188 ='- Sobrecarga o uso excesivo.                                 <br />';}else{$check_188 ='';}
if($ROW_encabezado['check_189'] =='true'){$check_189 ='- Mantenimiento deficiente.                                  <br />';}else{$check_189 ='';}
if($ROW_encabezado['check_190'] =='true'){$check_190 ='- Utilizado por personas no calificadas o sin entrenamiento. <br />';}else{$check_190 ='';}
if($ROW_encabezado['check_191'] =='true'){$check_191 ='- Empleo inadecuado para otros propósitos.                   <br />';}else{$check_191 ='';}

if($ROW_encabezado['check_192'] == 'true' || $ROW_encabezado['check_193'] == 'true' || $ROW_encabezado['check_194'] == 'true' || $ROW_encabezado['check_195'] == 'true') 
	{$check_192_195 ='<label style="background-color: #d7dbdd;"><br /> + Abuso o maltrato <br /><br /></label>';} 
else{$check_192_195 ='';}	

if($ROW_encabezado['check_192'] =='true'){$check_192 ='- Permitido por la supervisión Intencional.        <br />';}else{$check_192 ='';}
if($ROW_encabezado['check_193'] =='true'){$check_193 ='- Permitido por la supervisión No intencional.     <br />';}else{$check_193 ='';}
if($ROW_encabezado['check_194'] =='true'){$check_194 ='- No permitidos por la supervisión Intencional.    <br />';}else{$check_194 ='';}
if($ROW_encabezado['check_195'] =='true'){$check_195 ='- No permitidos por la supervisión No intencional. <br />';}else{$check_195 ='';}

// FIN FACTORES DEL TRABAJO

// FALTA/FALLA DE CONTROL ADMINISTRATIVO/OPERATIVO QUE PUEDA FALTAR EN LA ORGANIZACIÓN O QUE SEA DEFICIENTE

if($ROW_encabezado['check_196'] == 'true' || $ROW_encabezado['check_197'] == 'true' || $ROW_encabezado['check_198'] == 'true' || $ROW_encabezado['check_199'] == 'true' || $ROW_encabezado['check_200'] == 'true' ||
   $ROW_encabezado['check_201'] == 'true' || $ROW_encabezado['check_202'] == 'true' || $ROW_encabezado['check_203'] == 'true' || $ROW_encabezado['check_204'] == 'true' || $ROW_encabezado['check_205'] == 'true' ||
   $ROW_encabezado['check_206'] == 'true' || $ROW_encabezado['check_207'] == 'true') 
	{$check_196_207 ='<label style="background-color: #d7dbdd;"><br /> + Liderazgo y administración <br /><br /></label>';} 
else{$check_196_207 ='';}	

if($ROW_encabezado['check_196'] =='true'){$check_196 ='- Política Integrada de HSE.                               <br />';}else{$check_196 ='';}
if($ROW_encabezado['check_197'] =='true'){$check_197 ='- Coordinación de los programas HSE.                       <br />';}else{$check_197 ='';}
if($ROW_encabezado['check_198'] =='true'){$check_198 ='- Participación de la gerencia supervisor y mandos medios. <br />';}else{$check_198 ='';}
if($ROW_encabezado['check_199'] =='true'){$check_199 ='- Estándares establecidos para el desempeño.               <br />';}else{$check_199 ='';}
if($ROW_encabezado['check_200'] =='true'){$check_200 ='- Participación de la administración.                      <br />';}else{$check_200 ='';}
if($ROW_encabezado['check_201'] =='true'){$check_201 ='- Presencia en reuniones administrativas de HSE.           <br />';}else{$check_201 ='';}
if($ROW_encabezado['check_202'] =='true'){$check_202 ='- Manual de referencias de control operacional.            <br />';}else{$check_202 ='';}
if($ROW_encabezado['check_203'] =='true'){$check_203 ='- Auditorías internas realizadas.                          <br />';}else{$check_203 ='';}
if($ROW_encabezado['check_204'] =='true'){$check_204 ='- Establecimiento de objetivos anuales de HSE.             <br />';}else{$check_204 ='';}
if($ROW_encabezado['check_205'] =='true'){$check_205 ='- Comité Paritarios de Higiene y Seguridad.                <br />';}else{$check_205 ='';}
if($ROW_encabezado['check_206'] =='true'){$check_206 ='- Negativa a trabajar debido a peligros.                   <br />';}else{$check_206 ='';}
if($ROW_encabezado['check_207'] =='true'){$check_207 ='- Comunicaciones externas.                                 <br />';}else{$check_207 ='';}

if($ROW_encabezado['check_208'] == 'true' || $ROW_encabezado['check_209'] == 'true' || $ROW_encabezado['check_210'] == 'true' || $ROW_encabezado['check_211'] == 'true' || $ROW_encabezado['check_212'] == 'true') 
	{$check_208_212 ='<label style="background-color: #d7dbdd;"><br /> + Entrenamiento de la administración <br /><br /></label>';} 
else{$check_208_212 ='';}	

if($ROW_encabezado['check_208'] =='true'){$check_208 ='- Análisis de necesidades de entrenamiento.                     <br />';}else{$check_208 ='';}
if($ROW_encabezado['check_209'] =='true'){$check_209 ='- Orientación / Introducción inicial a controles operacionales. <br />';}else{$check_209 ='';}
if($ROW_encabezado['check_210'] =='true'){$check_210 ='- Entrenamiento inicial de contratación de HSE.                 <br />';}else{$check_210 ='';}
if($ROW_encabezado['check_211'] =='true'){$check_211 ='- Entrenamiento inicial de contratación por jefatura.           <br />';}else{$check_211 ='';}
if($ROW_encabezado['check_212'] =='true'){$check_212 ='- Entrenamiento periódico de controles operacionales.           <br />';}else{$check_212 ='';}

if($ROW_encabezado['check_213'] == 'true' || $ROW_encabezado['check_214'] == 'true' || $ROW_encabezado['check_215'] == 'true' || $ROW_encabezado['check_216'] == 'true' || $ROW_encabezado['check_217'] == 'true' ||
   $ROW_encabezado['check_218'] == 'true') 
	{$check_213_218 ='<label style="background-color: #d7dbdd;"><br /> + Inspecciones Planeadas <br /><br /></label>';} 
else{$check_213_218 ='';}	

if($ROW_encabezado['check_213'] =='true'){$check_213 ='- Inspecciones generales planeadas.   <br />';}else{$check_213 ='';}
if($ROW_encabezado['check_214'] =='true'){$check_214 ='- Procedimiento de seguimientos.      <br />';}else{$check_214 ='';}
if($ROW_encabezado['check_215'] =='true'){$check_215 ='- Análisis de informes de inspección. <br />';}else{$check_215 ='';}
if($ROW_encabezado['check_216'] =='true'){$check_216 ='- Mantenimiento preventivo.           <br />';}else{$check_216 ='';}
if($ROW_encabezado['check_217'] =='true'){$check_217 ='- Sistema de inspecciones especiales. <br />';}else{$check_217 ='';}
if($ROW_encabezado['check_218'] =='true'){$check_218 ='- Inspecciones de pre-uso de equipos. <br />';}else{$check_218 ='';}

if($ROW_encabezado['check_219'] == 'true' || $ROW_encabezado['check_220'] == 'true' || $ROW_encabezado['check_221'] == 'true') 
	{$check_219_221 ='<label style="background-color: #d7dbdd;"><br /> + Entrenamiento de conocimiento y habilidades <br /><br /></label>';} 
else{$check_219_221 ='';}	

if($ROW_encabezado['check_219'] =='true'){$check_219 ='- Análisis de necesidades de entrenamiento.                       <br />';}else{$check_219 ='';}
if($ROW_encabezado['check_220'] =='true'){$check_220 ='- Programa de entrenamiento o capacitación para los trabajadores. <br />';}else{$check_220 ='';}
if($ROW_encabezado['check_221'] =='true'){$check_221 ='- Evaluación del programa de entrenamiento.                       <br />';}else{$check_221 ='';}

if($ROW_encabezado['check_222'] == 'true' || $ROW_encabezado['check_223'] == 'true' || $ROW_encabezado['check_224'] == 'true') 
	{$check_222_224 ='<label style="background-color: #d7dbdd;"><br /> + Equipos de Protección Personal <br /><br /></label>';} 
else{$check_222_224 ='';}	

if($ROW_encabezado['check_222'] =='true'){$check_222 ='- Identificación de necesidades específicos de equipos de protección personal. <br />';}else{$check_222 ='';}
if($ROW_encabezado['check_223'] =='true'){$check_223 ='- Control de entrega de equipo de protección personal.                         <br />';}else{$check_223 ='';}
if($ROW_encabezado['check_224'] =='true'){$check_224 ='- Cumplimiento de las normas.                                                  <br />';}else{$check_224 ='';}

if($ROW_encabezado['check_225'] == 'true' || $ROW_encabezado['check_226'] == 'true' || $ROW_encabezado['check_227'] == 'true') 
	{$check_225_227 ='<label style="background-color: #d7dbdd;"><br /> + Sistema de evaluación de los Programas HSE <br /><br /></label>';} 
else{$check_225_227 ='';}	

if($ROW_encabezado['check_225'] =='true'){$check_225 ='- Evaluación de los requisitos de los estándares HSE. <br />';}else{$check_225 ='';}
if($ROW_encabezado['check_226'] =='true'){$check_226 ='- Evaluación cumplimiento de los estándares HSE.      <br />';}else{$check_226 ='';}
if($ROW_encabezado['check_227'] =='true'){$check_227 ='- Evaluación permanente del sistema integrado.        <br />';}else{$check_227 ='';}

if($ROW_encabezado['check_228'] == 'true' || $ROW_encabezado['check_229'] == 'true') 
	{$check_228_229 ='<label style="background-color: #d7dbdd;"><br /> + Comunicación con Grupos <br /><br /></label>';} 
else{$check_228_229 ='';}	

if($ROW_encabezado['check_228'] =='true'){$check_228 ='- Reuniones periódicas con grupos.    <br />';}else{$check_228 ='';}
if($ROW_encabezado['check_229'] =='true'){$check_229 ='- Participación de la administración. <br />';}else{$check_229 ='';}

if($ROW_encabezado['check_230'] == 'true' || $ROW_encabezado['check_231'] == 'true' || $ROW_encabezado['check_232'] == 'true') 
	{$check_230_232 ='<label style="background-color: #d7dbdd;"><br /> + Contratación y colocación <br /><br /></label>';} 
else{$check_230_232 ='';}	

if($ROW_encabezado['check_230'] =='true'){$check_230 ='- Requisitos de capacidad.                   <br />';}else{$check_230 ='';}
if($ROW_encabezado['check_231'] =='true'){$check_231 ='- Exámenes médicos.                          <br />';}else{$check_231 ='';}
if($ROW_encabezado['check_232'] =='true'){$check_232 ='- Revisión de la calificación de Pre-empleo. <br />';}else{$check_232 ='';}

if($ROW_encabezado['check_233'] == 'true' || $ROW_encabezado['check_234'] == 'true') 
	{$check_233_234 ='<label style="background-color: #d7dbdd;"><br /> + Seguridad fuera del trabajo <br /><br /></label>';} 
else{$check_233_234 ='';}	

if($ROW_encabezado['check_233'] =='true'){$check_233 ='- Identificación y análisis del problema.   <br />';}else{$check_233 ='';}
if($ROW_encabezado['check_234'] =='true'){$check_234 ='- Educación de seguridad fuera del trabajo. <br />';}else{$check_234 ='';}

////////////////////////

if($ROW_encabezado['check_235'] == 'true' || $ROW_encabezado['check_236'] == 'true') 
	{$check_235_236 ='<label style="background-color: #d7dbdd;"><br /> + Análisis y procedimientos de tareas <br /><br /></label>';} 
else{$check_235_236 ='';}	

if($ROW_encabezado['check_235'] =='true'){$check_235 ='- Matriz de identificación de peligro y evaluación de riesgos. <br />';}else{$check_235 ='';}
if($ROW_encabezado['check_236'] =='true'){$check_236 ='- Determinación de controles operacionales.                    <br />';}else{$check_236 ='';}

if($ROW_encabezado['check_237'] == 'true' || $ROW_encabezado['check_238'] == 'true') 
	{$check_237_238 ='<label style="background-color: #d7dbdd;"><br /> + Investigación de incidentes <br /><br /></label>';} 
else{$check_237_238 ='';}	

if($ROW_encabezado['check_237'] =='true'){$check_237 ='- Seguimiento de medidas correctivas de investigaciones de incidentes anteriores. <br />';}else{$check_237 ='';}
if($ROW_encabezado['check_238'] =='true'){$check_238 ='- Investigación de incidentes graves y de alto potencial.                         <br />';}else{$check_238 ='';}

if($ROW_encabezado['check_239'] == 'true' || $ROW_encabezado['check_240'] == 'true' || $ROW_encabezado['check_241'] == 'true' || $ROW_encabezado['check_242'] == 'true' || $ROW_encabezado['check_243'] == 'true') 
	{$check_239_243 ='<label style="background-color: #d7dbdd;"><br /> + Observación de tareas <br /><br /></label>';} 
else{$check_239_243 ='';}	

if($ROW_encabezado['check_239'] =='true'){$check_239 ='- Directiva de la administración.          <br />';}else{$check_239 ='';}
if($ROW_encabezado['check_240'] =='true'){$check_240 ='- Programa de observaciones de trabajo.    <br />';}else{$check_240 ='';}
if($ROW_encabezado['check_241'] =='true'){$check_241 ='- Observación del trabajo.                 <br />';}else{$check_241 ='';}
if($ROW_encabezado['check_242'] =='true'){$check_242 ='- Sistema de seguimiento de observaciones. <br />';}else{$check_242 ='';}
if($ROW_encabezado['check_243'] =='true'){$check_243 ='- Análisis de observaciones realizadas.    <br />';}else{$check_243 ='';}

if($ROW_encabezado['check_244'] == 'true' || $ROW_encabezado['check_245'] == 'true' || $ROW_encabezado['check_246'] == 'true' || $ROW_encabezado['check_247'] == 'true' || $ROW_encabezado['check_248'] == 'true' ||
   $ROW_encabezado['check_249'] == 'true' || $ROW_encabezado['check_250'] == 'true') 
	{$check_244_250 ='<label style="background-color: #d7dbdd;"><br /> + Preparación para emergencias <br /><br /></label>';} 
else{$check_244_250 ='';}	

if($ROW_encabezado['check_244'] =='true'){$check_244 ='- Plan de emergencia.                                        <br />';}else{$check_244 ='';}
if($ROW_encabezado['check_245'] =='true'){$check_245 ='- Análisis de posibles emergencias.                          <br />';}else{$check_245 ='';}
if($ROW_encabezado['check_246'] =='true'){$check_246 ='- Entrenamiento de medidas de control en caso de emergencia. <br />';}else{$check_246 ='';}
if($ROW_encabezado['check_247'] =='true'){$check_247 ='- Equipos de rescate de emergencia.                          <br />';}else{$check_247 ='';}
if($ROW_encabezado['check_248'] =='true'){$check_248 ='- Equipos o accesorios de emergencia.                        <br />';}else{$check_248 ='';}
if($ROW_encabezado['check_249'] =='true'){$check_249 ='- Comunicación en caso de emergencia.                        <br />';}else{$check_249 ='';}
if($ROW_encabezado['check_250'] =='true'){$check_250 ='- Comunicación al público en general.                        <br />';}else{$check_250 ='';}

if($ROW_encabezado['check_251'] == 'true' || $ROW_encabezado['check_252'] == 'true' || $ROW_encabezado['check_253'] == 'true' || $ROW_encabezado['check_254'] == 'true' || $ROW_encabezado['check_255'] == 'true' ||
   $ROW_encabezado['check_256'] == 'true') 
	{$check_251_256 ='<label style="background-color: #d7dbdd;"><br /> + Control de salud e higiene industrial <br /><br /></label>';} 
else{$check_251_256 ='';}	

if($ROW_encabezado['check_251'] =='true'){$check_251 ='- Identificación y evaluación de riesgos a la salud. <br />';}else{$check_251 ='';}
if($ROW_encabezado['check_252'] =='true'){$check_252 ='- Control de riesgos a la salud.                     <br />';}else{$check_252 ='';}
if($ROW_encabezado['check_253'] =='true'){$check_253 ='- Control de salud ocupacional e higiene industrial. <br />';}else{$check_253 ='';}
if($ROW_encabezado['check_254'] =='true'){$check_254 ='- Información y entrenamiento.                       <br />';}else{$check_254 ='';}
if($ROW_encabezado['check_255'] =='true'){$check_255 ='- Monitoreo de higiene industrial.                   <br />';}else{$check_255 ='';}
if($ROW_encabezado['check_256'] =='true'){$check_256 ='- Comunicaciones.                                    <br />';}else{$check_256 ='';}

if($ROW_encabezado['check_257'] == 'true' || $ROW_encabezado['check_258'] == 'true') 
	{$check_257_258 ='<label style="background-color: #d7dbdd;"><br /> + Control de Ingeniería <br /><br /></label>';} 
else{$check_257_258 ='';}	

if($ROW_encabezado['check_257'] =='true'){$check_257 ='- Consideración sobre ingeniería de diseño.          <br />';}else{$check_257 ='';}
if($ROW_encabezado['check_258'] =='true'){$check_258 ='- Revisión de proyectos y administración del cambio. <br />';}else{$check_258 ='';}

if($ROW_encabezado['check_259'] == 'true' || $ROW_encabezado['check_260'] == 'true' || $ROW_encabezado['check_261'] == 'true' || $ROW_encabezado['check_262'] == 'true') 
	{$check_259_262 ='<label style="background-color: #d7dbdd;"><br /> + Promoción general <br /><br /></label>';} 
else{$check_259_262 ='';}	

if($ROW_encabezado['check_259'] =='true'){$check_259 ='- Difusión de controles operacionales en diarios murales o sectores públicos. <br />';}else{$check_259 ='';}
if($ROW_encabezado['check_260'] =='true'){$check_260 ='- Uso de estadísticas de incidentes.                                          <br />';}else{$check_260 ='';}
if($ROW_encabezado['check_261'] =='true'){$check_261 ='- Promoción de temas críticos.                                                <br />';}else{$check_261 ='';}
if($ROW_encabezado['check_262'] =='true'){$check_262 ='- Premios y reconocimiento a individuo o al grupo.                            <br />';}else{$check_262 ='';}

if($ROW_encabezado['check_263'] == 'true' || $ROW_encabezado['check_264'] == 'true' || $ROW_encabezado['check_265'] == 'true') 
	{$check_263_265 ='<label style="background-color: #d7dbdd;"><br /> + Control de las adquisiciones, administración y servicios <br /><br /></label>';} 
else{$check_263_265 ='';}	

if($ROW_encabezado['check_263'] =='true'){$check_263 ='- Compras de mercancías.          <br />';}else{$check_263 ='';}
if($ROW_encabezado['check_264'] =='true'){$check_264 ='- Selección del contratista.      <br />';}else{$check_264 ='';}
if($ROW_encabezado['check_265'] =='true'){$check_265 ='- Administración del contratista. <br />';}else{$check_265 ='';}

}

  if($danio_equipo   == 'true'){$danio_equipo   = 'checked'; } else{$danio_equipo =''; }
  if($danio_material == 'true'){$danio_material = 'checked'; } else{$danio_material =''; }
  if($danio_ambiente == 'true'){$danio_ambiente = 'checked'; } else{$danio_ambiente =''; }
  if($danio_personas == 'true'){$danio_personas = 'checked'; } else{$danio_personas =''; }
  if($otros_danios   == 'true'){$otros_danios   = 'checked'; } else{$otros_danios =''; }
  
  if($actividad_rutinaria      == 'true'){$actividad_rutinaria      = 'checked';} else{$actividad_rutinaria =''; }
  if($actividad_planificada    == 'true'){$actividad_planificada    = 'checked';} else{$actividad_planificada =''; }
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

		$sql_firmas = "SELECT  CASE WHEN [fecha_firma_elaborador] IS NOT NULL OR [fecha_firma_elaborador]!='' THEN [nick_registro] ELSE '' END AS nick_registro
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

$html ='        <table border ="1" style="margin: 0 auto;">
							<tr>
									<td width="25%" rowspan="2" style="text-align:center;"> <br/><br/><img src="images/logo.jpg" width="100"></td>
									<td width="35%" style="text-align:center;"><strong>INFORME DE INVESTIGACIÓN DE ACCIDENTES</strong><br/></td>
									<td width="30%" ><strong>Código:</strong> '.$codigo_documento.' <br/> <strong>Fecha Informe: </strong> '.$fecha_informe.'</td>
									<td width="10%" rowspan="2" style="text-align:center;"><br/>&nbsp;&nbsp;<img src="images/temp/'.$id_informe.'.png" width="60" height="50"></td>
							</tr>

							<tr>
									<td style="text-align:center;">Prevención de Riesgos</td>
									<td><strong>Nro:</strong> '.$numero_informe.'</td>
							</tr>
				</table>
								
				<p></p>

				<table style="margin: 0 auto;">  
							<tr>
									<td width="50%" >
										 <br />
										<strong>Accidentado:           </strong> '.utf8_encode($nombre).'<br />
										<strong>Rut:                   </strong> '.$rut_accidentado.'<br />
										<strong>Edad:                  </strong> '.$edad_accidentado.'<br />
										<strong>Fecha de Nacimiento:   </strong> '.$fecha_nacimiento.'<br />
										<strong>Cargo:                 </strong> '.utf8_encode($cargo_nombre).'<br />
										<strong>Area:                  </strong> '.utf8_encode($area_nombre).'	
										
									</td>
									<td width="50%" >
										  <br />
										 <strong>Antigüedad Empresa:   </strong> '.utf8_encode($antiguedad_accidentado).'<br />
										 <strong>Antigüedad Cargo:     </strong> '.utf8_encode($antiguedad_en_cargo).'<br />
										 <strong>Horas Trabajadas:     </strong> '.$horas_trabajadas.'<br />
										 <strong>Jornada:              </strong> '.utf8_encode($jornada).'<br />
										 <strong>Gerencia:             </strong> '.utf8_encode($gerencia).'<br />	
										 <strong>Jefe Directo:         </strong> '.utf8_encode($jefe_directo).'	
										
									</td>
									    
							</tr>
				</table>
				
				<br />
		        <div style="background-color: #d7dbdd; text-align:center;"><strong>DESCRIPCIÓN</strong></div>
				<br />
				
				<table style="margin: 0 auto;">
							<tr>
									<td width="30%" >
										 <br />
										<strong>Fecha Accidente:  </strong> '.$fecha_accidente.'									
										
									</td>
									<td width="20%" >
										 
										 <strong>Hora:            </strong> '.$hora_accidente.'

									</td>
									<td width="50%" >
										
										 <strong>Tipo:            </strong> '.utf8_encode($tipo).'

									</td>
									    
							</tr>
							<tr>
								    <td width="100%">
									<br />
									<strong >Perdida del Incidente:</strong>		
				
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$danio_equipo.'"   >Equipo</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$danio_material.'" >Material</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$danio_ambiente.'" >Ambiente</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$danio_personas.'" >Personas</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$otros_danios.'"   >Otros</label> <br />
									
									<strong>Especificar Otros:                        </strong> '.utf8_encode($especifica_otros_danios).' <br />
									<strong>Equipo Involucrado:                       </strong> '.utf8_encode($especifica_otro_equipo).' <br />
									<strong>Actividad que Realizaba del Accidentarse: </strong> '.utf8_encode($actividad_realizada).'  <br />
									
									<strong>Actividad:</strong>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$actividad_rutinaria.'"      >Rutinaria</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$actividad_planificada.'"    >Planificada</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="'.$actividad_no_planificada.'" >No Planificada</label>
																					 
									</td>
								
						    </tr>
			    </table>
				
				<br />	
				<div style="background-color: #d7dbdd; text-align:center;"><strong>RELATO</strong></div>
				<br />	
				
									<strong>Relato del Accidente:                    </strong> '.utf8_encode($relato_accidente).' <br />
									<strong>Parte del Cuerpo Lesionada:              </strong> '.utf8_encode($parte_cuerpo_lesiona).' <br />
									<strong>Tipo de Accidente:                       </strong> '.utf8_encode($tipo_accidente).' <br />	
									<strong>Elemento que Provoca la Lesión (Agente): </strong> '.utf8_encode($elemento_provoca_lesion).' <br />		
									<strong>Fuente:                                  </strong> '.utf8_encode($fuente).' <br />				
									<strong>Lugar Exacto del Accidente:              </strong> '.utf8_encode($lugar_exacto_accidente).' 	
				
				<br />	
                <div style="background-color: #d7dbdd; text-align:center;"><strong>MEDIDAS DE CONTROL INMEDIATAS</strong></div>				
				<br />		

				<table border="1" style="margin: 0 auto; text-align:center;">
						   <tr>
								<th width="70%"><strong>Acción Inmediata Tomadas por el Supervisor</strong></th>
								<th width="30%"><strong>Responsable</strong></th>
					        </tr>
					      
				            '.$tabla_medidas_control.'   
							
				</table>					
										
		';

$html2 =' 	    <div style="background-color: #d7dbdd; text-align:center;"><strong>ANALISIS CAUSAL</strong></div>		

				<div style="text-align:center;"><strong>CAUSAS INMEDIATAS</strong></div>	
				<br />	
				 
				<table style="margin: 0 auto; text-align:left;">
							<tr>
								<th width="50%"; style="text-align:center;"><strong> ACCIÓN SUBESTANDAR    </strong></th>
								<th width="50%"; style="text-align:center;"><strong> CONDICIÓN SUBESTANDAR </strong></th>
						    </tr>
							<tr>
							        <td style="text-align:left;">

									'.$check_1_4.'
									'.$check_1.$check_2.$check_3.$check_4.'
									
							        '.$check_5_9.'
									'.$check_5.$check_6.$check_7.$check_8.$check_9.'
									
							        '.$check_10_13.'
									'.$check_10.$check_11.$check_12.$check_13.'
									
							        '.$check_14_17.'
									'.$check_14.$check_15.$check_16.$check_17.'
									
							        '.$check_18_22.'
									'.$check_18.$check_19.$check_20.$check_21.$check_22.'
									
							        '.$check_23_26.'
									'.$check_23.$check_24.$check_25.$check_26.'
									
									'.$check_27_29.'
									'.$check_27.$check_28.$check_29.'
									
							        '.$check_30_32.'
									'.$check_30.$check_31.$check_32.'
									
							        '.$check_33_37.'
									'.$check_33.$check_34.$check_35.$check_36.$check_37.'
									
							        '.$check_38_43.'
									'.$check_38.$check_39.$check_40.$check_41.$check_42.$check_43.'
									
							        '.$check_44_44.'
									'.$check_44.'
									
								    </td>
									
									<td style="text-align:left;">
									
									'.$check_45_55.'
									'.$check_45.$check_46.$check_47.$check_48.$check_49.$check_50.$check_51.$check_52.$check_53.$check_54.$check_55.'
									
									'.$check_56_58.'
									'.$check_56.$check_57.$check_58.'
									
									'.$check_59_70.'
									'.$check_59.$check_60.$check_61.$check_62.$check_63.$check_64.$check_65.$check_66.$check_67.$check_68.$check_69.$check_70.'
									
									'.$check_71_73.'
									'.$check_71.$check_72.$check_73.'
									
									'.$check_74_82.'
									'.$check_74.$check_75.$check_76.$check_77.$check_78.$check_79.$check_80.$check_81.$check_82.'
									
									'.$check_83_86.'
									'.$check_83.$check_84.$check_85.$check_86.'
									
									'.$check_87_88.'
									'.$check_87.$check_88.'
									
									'.$check_89_89.'
									'.$check_89.'
									
									</td>
							</tr>		
	 
				</table>	
				
				<p style="text-align:center;"><strong>CAUSAS BÁSICAS</strong></p>	
				
				<table style="margin: 0 auto; text-align:left;">
							<tr>
								<th width="50%"; style="text-align:center;"><strong> FACTORES PERSONALES  </strong></th>
								<th width="50%"; style="text-align:center;"><strong> FACTORES DEL TRABAJO </strong></th>
						    </tr>
							<tr>
							        <td style="text-align:left;">

									'.$check_90_101.'
									'.$check_90.$check_91.$check_92.$check_93.$check_94.$check_95.$check_96.$check_97.$check_98.$check_99.$check_100.$check_101.'
									
									'.$check_102_111.'
									'.$check_102.$check_103.$check_104.$check_105.$check_106.$check_107.$check_108.$check_109.$check_110.$check_111.'
									
									'.$check_112_121.'
									'.$check_112.$check_113.$check_114.$check_115.$check_116.$check_117.$check_118.$check_119.$check_120.$check_121.'
									
									'.$check_122_125.'
									'.$check_122.$check_123.$check_124.$check_125.'
									
									'.$check_126_129.'
									'.$check_126.$check_127.$check_128.$check_129.'
									
									'.$check_130_140.'
									'.$check_130.$check_131.$check_132.$check_133.$check_134.$check_135.$check_136.$check_137.$check_138.$check_139.$check_140.'
									
									'.$check_141_141.'
									'.$check_141.'
									
									
								    </td>
									
									<td style="text-align:left;">
									
									'.$check_142_152.'
									'.$check_142.$check_143.$check_144.$check_145.$check_146.$check_147.$check_148.$check_149.$check_150.$check_151.$check_152.'
									
									'.$check_153_159.'
									'.$check_153.$check_154.$check_155.$check_156.$check_157.$check_158.$check_159.'
									
									'.$check_160_174.'
									'.$check_160.$check_167.$check_168.$check_169.$check_170.$check_171.$check_172.$check_173.$check_174.$check_161.'
									
									'.$check_175_181.'
									'.$check_175.$check_176.$check_177.$check_178.$check_179.$check_180.$check_181.'
									
									'.$check_182_184.'
									'.$check_182.$check_183.$check_184.'
									
									'.$check_185_191.'
									'.$check_185.$check_186.$check_187.$check_188.$check_189.$check_190.$check_191.'
									
									'.$check_192_195.'
									'.$check_192.$check_193.$check_194.$check_195.'
									
									
									</td>
							</tr>		
	 
				</table>	
				
				<p style="text-align:center;"><strong>FALTA/FALLA DE CONTROL ADMINISTRATIVO/OPERATIVO QUE PUEDA FALTAR <br> EN LA ORGANIZACIÓN O QUE SEA DEFICIENTE</strong></p>	
				
				<table style="margin: 0 auto; text-align:left;">

							<tr>
							        <td style="text-align:left;">

									'.$check_196_207.'
									'.$check_196.$check_197.$check_198.$check_199.$check_200.$check_201.$check_202.$check_203.$check_204.$check_205.$check_206.$check_207.'
									
									'.$check_208_212.'
									'.$check_208.$check_209.$check_210.$check_211.$check_212.'
									
									'.$check_213_218.'
									'.$check_213.$check_214.$check_215.$check_216.$check_217.$check_218.'
									
									'.$check_219_221.'
									'.$check_219.$check_220.$check_221.'
									
									'.$check_222_224.'
									'.$check_222.$check_223.$check_224.'
									
									'.$check_225_227.'
									'.$check_225.$check_226.$check_227.'
									
									'.$check_228_229.'
									'.$check_228.$check_229.'
									
									'.$check_230_232.'
									'.$check_230.$check_231.$check_232.'
									
									'.$check_233_234.'
									'.$check_233.$check_234.'
									
									
								    </td>
									
									<td style="text-align:left;">
									
									'.$check_235_236.'
									'.$check_235.$check_236.'
									
									'.$check_237_238.'
									'.$check_237.$check_238.'
									
									'.$check_239_243.'
									'.$check_239.$check_240.$check_241.$check_242.$check_243.'
									
									'.$check_244_250.'
									'.$check_244.$check_245.$check_246.$check_247.$check_248.$check_249.$check_250.'
									
									'.$check_251_256.'
									'.$check_251.$check_252.$check_253.$check_254.$check_255.$check_256.'
									
									'.$check_257_258.'
									'.$check_257.$check_258.'
									
									'.$check_259_262.'
									'.$check_259.$check_260.$check_261.$check_262.'
									
									'.$check_263_265.'
									'.$check_263.$check_264.$check_265.'
																	
									
									</td>
							</tr>		
	 
				</table>	
				
		';
		
$html3 ='       <div style="background-color: #d7dbdd; text-align:center;"><strong>MEDIDAS PREVENTIVAS</strong></div>			
				<br />		
				
				<table border="1" style="margin: 0 auto; text-align:center;">
							<tr>
								<th width="40%"><strong>Plan de Acción</strong></th>
								<th width="20%"><strong>Responsable</strong></th>
								<th width="25%"><strong>Cargo</strong></th>
								<th width="15%"><strong>Plazo/Fecha</strong></th>
						    </tr>

						    '.$tabla_medidas_preventivas.' 
						 
				</table>
				
                <br />				
				<div style="background-color: #d7dbdd; text-align:center;"><strong>ADJUNTOS</strong></div>	
				<br />	
				
				<table border="1" style="margin: 0 auto; text-align:center;">
						    <tr>
								<th><strong>Imágenes</strong></th>
					        </tr>

						    '.$tabla_adjuntos.'
						 
				</table>
				
                <br />				
				<div style="background-color: #d7dbdd; text-align:center;"><strong>FIRMAS</strong></div>		
				<br />	
				
				<table border="1" style="margin: 0 auto; text-align:center;">
							<tr>
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
