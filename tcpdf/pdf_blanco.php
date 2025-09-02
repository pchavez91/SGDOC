<?php
include_once("../../../config/conex.php");
$link = Conexion();
require "../phpqrcode/qrlib.php"; 
require_once('tcpdf_include.php');


// ACCIÓN SUBESTANDAR

$check_1_4 ='<label style="background-color: #d7dbdd;"><br /> + Equipos de mantenimiento en funcionamiento <br /><br /></label>'; 


$check_1 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Rellenar, empacar,etc., con equipo bajo presión.                <br />';
$check_2 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Limpiar, engrasar, ajustar, reparar equipo en funcionamiento.   <br />';
$check_3 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Soldar o reparar tanques o recipientes sin purgar.              <br />';
$check_4 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Trabajar en equipo eléctrico.                                   <br />';

$check_5_9 ='<label style="background-color: #d7dbdd;"><br /> + No advertir o asegurar <br /><br /></label>'; 
$check_5_9 ='';	

$check_5 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > No cerrar con llave, bloquear o asegurar contra movimiento inesperado.   <br />';
$check_6 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > No apagar equipos que no están en uso.                                   <br />';
$check_7 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > No poner señales de advertencia, etiquetas o letreros.                   <br />';
$check_8 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Soltar o mover cargas sin advertir adecuadamente.                        <br />';
$check_9 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Arrancar o detener vehículos sin advertir adecuadamente.                 <br />';

$check_10_13 ='<label style="background-color: #d7dbdd;"><br /> + Hacer inoperante los dispositivos de seguridad <br /><br /></label>';

$check_10 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Bloquear, tapar o ligar dispositivos de seguridad.                     <br />';
$check_11 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Desconectar o quitar dispositivos de seguridad.                        <br />';
$check_12 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Ajustar dispositivos de seguridad inadecuadamente.                     <br />';
$check_13 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Reemplazar un dispositivo de seguridad con otro de capacidad impropia. <br />';

$check_14_17 ='<label style="background-color: #d7dbdd;"><br /> + Operar o trabajar a una velocidad impropia <br /><br /></label>';

$check_14 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Alimentando o abasteciendo materiales demasiado rápido. <br />';
$check_15 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Saltar desde elevaciones.                               <br />';
$check_16 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Correr.                                                 <br />';
$check_17 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Tirar materiales en lugar de pasarlo o llevarlos.       <br />';

$check_18_22 ='<label style="background-color: #d7dbdd;"><br /> + Posición o postura impropia para la tarea <br /><br /></label>';

$check_18 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Entrar a espacios encerrados sin el margen apropiado.       <br />';
$check_19 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Montar en posiciones inseguras.                             <br />';
$check_20 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Mover bajos las cargas suspendidas.                         <br />';
$check_21 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Exposición a cargas oscilantes.                             <br />';
$check_22 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Exposición innecesaria a materiales o equipo en movimiento. <br />';

$check_23_26 ='<label style="background-color: #d7dbdd;"><br /> + Colocar, mezclar o combinar en forma impropia <br /><br /></label>';	

$check_23 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Inyectar, mezclar, o combinar sustancias.                                                       <br />';
$check_24 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Crea una explosión, incendio u otro peligro.                                                    <br />';
$check_25 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Posicionamiento impropio de vehículos o equipo de manejo de materiales para cargar o descargar. <br />';
$check_26 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Colocación impropia de materiales que crean peligros como tropezar o chocar.                    <br />';

$check_27_29 ='<label style="background-color: #d7dbdd;"><br /> + Uso impropio del equipo <br /><br /></label>';

$check_27 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Usar equipo etiquetado o evidentemente defectuoso.                 <br />';
$check_28 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Usar equipo o material de una manera para lo que no fue pensado.   <br />';
$check_29 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Cargar excesivamente equipo o estructuras.                         <br />';

$check_30_32 ='<label style="background-color: #d7dbdd;"><br /> + Uso impropio de manos o partes del cuerpo<br /><br /></label>';

$check_30 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Asir objetos en forma insegura.              <br />';
$check_31 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Agarrar objetos inadecuadamente.             <br />';
$check_32 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Usar las manos en lugar de las herramientas. <br />';

$check_33_37 ='<label style="background-color: #d7dbdd;"><br /> + Otras prácticas subestándares <br /><br /></label>'; 

$check_33 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Falta de atención al equilibrio o el ambiente.    <br />';
$check_34 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > No usar vestimenta personal segura.               <br />';
$check_35 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > No usar equipo de protección personal disponible. <br />';
$check_36 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Uso impropio del equipo de protección personal.   <br />';
$check_37 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Bromas.                                           <br />';

$check_38_43 ='<label style="background-color: #d7dbdd;"><br /> + Métodos o procedimientos peligrosos <br /><br /></label>'; 

$check_38 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Uso de materiales/equipos inherentes peligrosas.         <br />';
$check_39 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Uso de método / procedimientos inherentes peligrosas.    <br />';
$check_40 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Uso de equipo inadecuado e impropio.                     <br />';
$check_41 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Ayuda inadecuada para el levantamiento de cosas pesadas. <br />';
$check_42 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Asignación impropia de personal.                         <br />';
$check_43 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Otros métodos o procedimientos peligrosos.               <br />';

$check_44_44 ='<label style="background-color: #d7dbdd;"><br /> + Otro <br /><br /></label>';

$check_44 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Trabajador adopta postura inadecuado de arrastre o traslado de piezas. <br />';

// FIN ACCIÓN SUBESTANDAR

// CONDICIÓN SUBESTANDAR

$check_45_55 ='<label style="background-color: #d7dbdd;"><br /> + Defecto de herramientas o equipo <br /><br /></label>';

$check_45 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Diseñado inadecuadamente.           <br />';
$check_46 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Compuesto de materiales impropios.  <br />';
$check_47 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Inadecuadamente compuesto o armado. <br />';
$check_48 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Desafilado.                         <br />';
$check_49 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Asignación impropia de personal.    <br />';
$check_50 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Áspero.                             <br />';
$check_51 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Resbaladizo.                        <br />';
$check_52 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Desgastado.                         <br />';
$check_53 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Raído.                              <br />';
$check_54 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Rasgado.                            <br />';
$check_55 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Roto.                               <br />';

$check_56_58 ='<label style="background-color: #d7dbdd;"><br /> + Peligros de la vestimenta <br /><br /></label>';	

$check_56 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Falta de equipo protector adecuado. <br />';
$check_57 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Ropa impropia o inadecuada.         <br />';
$check_58 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Otros peligros de la vestimenta.    <br />';

$check_59_70 ='<label style="background-color: #d7dbdd;"><br /> + Peligros del medio ambiente <br /><br /></label>';	

$check_59 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Ruido excesivo.                                      <br />';
$check_60 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Espacio inadecuado en pasillos.                      <br />';
$check_61 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Salidas inadecuadas.                                 <br />';
$check_62 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Margen inadecuado (congestión o restricción).        <br />';
$check_63 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Control inadecuado de tráficos.                      <br />';
$check_64 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Ventilación inadecuada.                              <br />';
$check_65 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Espacio de trabajo insuficiente.                     <br />';
$check_66 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Iluminación impropia (insuficiencia o exceso).       <br />';
$check_67 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Contaminación del aire.                              <br />';
$check_68 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Exposiciones a radiación.                            <br />';
$check_69 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Peligros de incendio y explosión.                    <br />';
$check_70 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Limpieza insuficiente; lugar de trabajo desordenado. <br />';

$check_71_73 ='<label style="background-color: #d7dbdd;"><br /> + Riesgos de la colocación <br /><br /></label>';	

$check_71 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Inadecuadamente apilado.                               <br />';
$check_72 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Inadecuadamente colocado.                              <br />';
$check_73 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Inadecuadamente asegurado contra movimiento indeseado. <br />';

$check_74_82 ='<label style="background-color: #d7dbdd;"><br /> + Riesgos de dispositivos de protección inadecuados <br /><br /></label>';	

$check_74 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Peligros mecánicos o físicos sin protección.                     <br />';
$check_75 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Peligros mecánicos o físicos con protección inadecuada.          <br />';
$check_76 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Falta de puntales o soportes, o puntales o soportes inadecuados. <br />';
$check_77 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Corriente eléctrica sin tierra.                                  <br />';
$check_78 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Corriente eléctrica sin aislamiento.                             <br />';
$check_79 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Radiación inadecuadamente protegida.                             <br />';
$check_80 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Radiación sin protección.                                        <br />';
$check_81 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Radiación inadecuadamente protegida.                             <br />';
$check_82 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Materiales sin etiquetar o inadecuadamente etiquetados.          <br />';

$check_83_86 ='<label style="background-color: #d7dbdd;"><br /> + Peligros fuera del ambiente de trabajo de la organización <br /><br /></label>';

$check_83 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Artículos defectuosos de otros.                         <br />';
$check_84 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Otros peligros asociados con la propiedad de otros.     <br />';
$check_85 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Otros peligros asociados con la actividad de otros.     <br />';
$check_86 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Peligros naturales: el tiempo, terreno, animales, etc.. <br />';

$check_87_88 ='<label style="background-color: #d7dbdd;"><br /> + Peligros públicos <br /><br /></label>';

$check_87 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Peligros del transporte publico. <br />';
$check_88 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Peligros del trafico.            <br />';

$check_89_89 ='<label style="background-color: #d7dbdd;"><br /> + Otro <br /><br /></label>';

$check_89 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Condiciones propias del entorno, trabajo repetitivo. <br />';

// FACTORES PERSONALES 

// FIN FACTORES PERSONALES 

$check_90_101 ='<label style="background-color: #d7dbdd;"><br /> + Capacidad física / fisiológica inadecuada <br /><br /></label>';	

$check_90   ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Altura, peso, talla fuerza, alcance, etc., inadecuados.                        <br />';
$check_91   ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Capacidad limitada de movimiento corporal.                                     <br />';
$check_92   ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Capacidad   limitada para mantenerse es determinadas posiciones corporales.    <br />';
$check_93   ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Sensibilidad o alergias a ciertas sustancias.                                  <br />';
$check_94   ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Asignación impropia de personal.                                               <br />';
$check_95   ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Sensibilidad a determinados extremos sensoriales (temperatura, sonidos, etc.). <br />';
$check_96   ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Visión defectuosa.                                                             <br />';
$check_97   ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Audición defectuosa.                                                           <br />';
$check_98   ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Otras deficiencias sensoriales (tacto, gusto, olfato, equilibrio).             <br />';
$check_99   ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Incapacidad respiratoria.                                                      <br />';
$check_100 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Otras incapacidades físicas permanentes.                                       <br />';
$check_101 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Incapacidades temporales.                                                      <br />';

$check_102_111 ='<label style="background-color: #d7dbdd;"><br /> + Capacidad mental/ sicológica inadecuada <br /><br /></label>';	

$check_102 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Miedos y fobias.             <br />';
$check_103 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" > Perturbación emocional.      <br />';
$check_104 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Nivel de inteligencia.       <br />';
$check_105 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Incapacidad de comprensión.  <br />';
$check_106 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Falta de juicio.             <br />';
$check_107 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Escasa coordinación.         <br />';
$check_108 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Tiempo lento de reacción.    <br />';
$check_109 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Aptitud mecánica deficiente. <br />';
$check_110 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Baja aptitud de aprendizaje. <br />';
$check_111 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Problemas de memorias.       <br />';

$check_112_121 ='<label style="background-color: #d7dbdd;"><br /> + Estrés mental o sicológicos <br /><br /></label>';	

$check_112 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Sobrecarga emocional.                                                     <br />';
$check_113 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Fatiga debida a la carga o las limitaciones de tiempo de la tarea mental. <br />';
$check_114 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Obligaciones que exigen un juicio toma de decisiones extremas.            <br />';
$check_115 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Rutina, monotonía, exigencias para un cargo sin transcendencia.           <br />';
$check_116 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Exigencia de una concentración/ percepción profunda.                      <br />';
$check_117 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Ordenes confusas.                                                         <br />';
$check_118 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Solicitudes conflictivas.                                                 <br />';
$check_119 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Preocupación debidos a problemas.                                         <br />';
$check_120 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Frustraciones.                                                            <br />';
$check_121 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Enfermedad mental.                                                        <br />';

$check_122_125 ='<label style="background-color: #d7dbdd;"><br /> + Falta de conocimiento <br /><br /></label>';

$check_122 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Falta de experiencia.             <br />';
$check_123 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Orientación deficiente.           <br />';
$check_124 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Entrenamiento inicial inadecuado. <br />';
$check_125 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Ordenes mal interpretadas.        <br />';

$check_126_129 ='<label style="background-color: #d7dbdd;"><br /> + Falta de habilidad <br /><br /></label>';	

$check_126 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Instrucción inicial inadecuada. <br />';
$check_127 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Practica inadecuada.            <br />';
$check_128 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Operación esporádica.           <br />';
$check_129 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Falta de preparación.           <br />';

$check_130_140 ='<label style="background-color: #d7dbdd;"><br /> + Motivación deficiente <br /><br /></label>';	

$check_130 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  El desempeño subestándar es más gratificante.               <br />';
$check_131 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  El desempeño estándar causa desagrado.                      <br />';
$check_132 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Falta de incentivos .                                       <br />';
$check_133 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Demasiadas frustraciones.                                   <br />';
$check_134 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Agresión inadecuada.                                        <br />';
$check_135 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  No existe interés para evitar la incomodidad.               <br />';
$check_136 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Sin interés por sobresalir.                                  <br />';
$check_137 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Ejemplos deficientes por parte de la supervisión.           <br />';
$check_138 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Retroalimentación inadecuada del desempeño.                 <br />';
$check_139 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Falta de refuerzo positivo para el comportamiento correcto. <br />';
$check_140 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Falta de incentivos de producción.                          <br />';

$check_141_141 ='<label style="background-color: #d7dbdd;"><br /> + Otro <br /><br /></label>';	

$check_141 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Postura inadecuada. <br />';

// FIN CONDICIÓN SUBESTANDAR

// FACTORES DEL TRABAJO

$check_142_152 ='<label style="background-color: #d7dbdd;"><br /> + Supervisión y/o liderazgo deficiente <br /><br /></label>';	

$check_142 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Relaciones jerárquicas poco claras o conflictivas.                                                        <br />';
$check_143 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Asignación de responsabilidades poco claras o conflictivas.                                               <br />';
$check_144 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Delegación   insuficiente o inadecuada.                                                                   <br />';
$check_145 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Formulación de objetivos, metas o estándares que conflictúan.                                             <br />';
$check_146 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Instrucción, orientación y/ o entrenamiento insuficiente.                                                 <br />';
$check_147 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Entrega insuficiente de documentos de consulta, de instrucciones y de publicaciones guías.                <br />';
$check_148 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Identificación y evaluación deficiente de exposiciones a pérdidas.                                        <br />';
$check_149 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Falta de conocimiento en el trabajo, de supervisión/ administración.                                      <br />';
$check_150 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Ubicación inadecuada del trabajador, de acuerdo a sus cualidades y a las exigencias que demanda la tarea. <br />';
$check_151 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Medición y evaluación deficiente del desempeño.                                                           <br />';
$check_152 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Retroalimentación del desempeño deficiente o incorrecto.                                                  <br />';

$check_153_159 ='<label style="background-color: #d7dbdd;"><br /> + Ingeniería Inadecuada <br /><br /></label>';
	

$check_153 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Evaluación inadecuada de las exposiciones a pérdidas.                  <br />';
$check_154 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Preocupación deficiente en cuanto a los factores humanos/ ergonómicos. <br />';
$check_155 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Estándares, especificaciones y/ o criterios de diseño inadecuados.     <br />';
$check_156 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Controles inadecuados de las construcciones.                           <br />';
$check_157 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Evaluación deficiente de la condición conveniente para operar.         <br />';
$check_158 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Evaluación deficiente para el comienzo de una operación.               <br />';
$check_159 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Evaluación insuficiente respecto al cambio que se produzcan.           <br />';

$check_160_174 ='<label style="background-color: #d7dbdd;"><br /> + Deficiente en las adquisiciones <br /><br /></label>';

$check_160 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Especificaciones deficientes en cuanto a los pedidos.            <br />';
$check_167 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Investigación insuficiente en cuanto a los materiales y equipos. <br />';
$check_168 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Especificaciones deficientes para los vendedores.                <br />';
$check_169 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Modalidad o ruta de embarque inadecuada.                         <br />';
$check_170 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Comunicación inadecuada de información de seguridad y salud.     <br />';
$check_171 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Manejo inadecuado de los materiales.                             <br />';
$check_172 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Almacenamientos inadecuados de los materiales.                   <br />';
$check_173 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Transportes inadecuados de los materiales.                       <br />';
$check_174 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Identificación deficiente de artículos peligrosos.               <br />';
$check_161 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Sistemas deficientes de recuperación o eliminación de desechos.  <br />';

$check_175_181 ='<label style="background-color: #d7dbdd;"><br /> + Mantenimiento deficiente <br /><br /></label>';

$check_175 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Prevención inadecuada de Evaluación de necesidades.    <br />';
$check_176 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Prevención inadecuada de Lubricación y servicio.       <br />';
$check_177 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Prevención inadecuada de Limpieza o pulimento.         <br />';
$check_178 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Corrección inadecuada de Comunicación de necesidades.  <br />';
$check_179 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Corrección inadecuada de Programación del trabajo.     <br />';
$check_180 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Corrección inadecuada de Revisión de las piezas.       <br />';
$check_181 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Corrección inadecuada de Reemplazo de partes.          <br />';

$check_182_184 ='<label style="background-color: #d7dbdd;"><br /> + Estándares deficientes de trabajo <br /><br /></label>';

$check_182 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Desarrollo inadecuado de estándares.    <br />';
$check_183 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Comunicación inadecuada de estándares.  <br />';
$check_184 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Mantenimiento inadecuado de estándares. <br />';

$check_185_191 ='<label style="background-color: #d7dbdd;"><br /> + Uso y desgaste <br /><br /></label>'; 

$check_185 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Planificación inadecuada del uso.                          <br />';
$check_186 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Prolongación excesiva de la vida útil del elemento.        <br />';
$check_187 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Inspección y/o control deficiente.                         <br />';
$check_188 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Sobrecarga o uso excesivo.                                 <br />';
$check_189 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Mantenimiento deficiente.                                  <br />';
$check_190 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Utilizado por personas no calificadas o sin entrenamiento. <br />';
$check_191 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Empleo inadecuado para otros propósitos.                   <br />';

$check_192_195 ='<label style="background-color: #d7dbdd;"><br /> + Abuso o maltrato <br /><br /></label>'; 

$check_192 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Permitido por la supervisión Intencional.        <br />';
$check_193 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Permitido por la supervisión No intencional.     <br />';
$check_194 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  No permitidos por la supervisión Intencional.    <br />';
$check_195 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  No permitidos por la supervisión No intencional. <br />';

// FIN FACTORES DEL TRABAJO

// FALTA/FALLA DE CONTROL ADMINISTRATIVO/OPERATIVO QUE PUEDA FALTAR EN LA ORGANIZACIÓN O QUE SEA DEFICIENTE

$check_196_207 ='<label style="background-color: #d7dbdd;"><br /> + Liderazgo y administración <br /><br /></label>'; 

$check_196 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Política Integrada de HSE.                               <br />';
$check_197 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Coordinación de los programas HSE.                       <br />';
$check_198 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Participación de la gerencia supervisor y mandos medios. <br />';
$check_199 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Estándares establecidos para el desempeño.               <br />';
$check_200 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Participación de la administración.                      <br />';
$check_201 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Presencia en reuniones administrativas de HSE.           <br />';
$check_202 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Manual de referencias de control operacional.            <br />';
$check_203 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Auditorías internas realizadas.                          <br />';
$check_204 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Establecimiento de objetivos anuales de HSE.             <br />';
$check_205 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Comité Paritarios de Higiene y Seguridad.                <br />';
$check_206 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Negativa a trabajar debido a peligros.                   <br />';
$check_207 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Comunicaciones externas.                                 <br />';

$check_208_212 ='<label style="background-color: #d7dbdd;"><br /> + Entrenamiento de la administración <br /><br /></label>';

$check_208 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Análisis de necesidades de entrenamiento.                     <br />';
$check_209 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Orientación / Introducción inicial a controles operacionales. <br />';
$check_210 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Entrenamiento inicial de contratación de HSE.                 <br />';
$check_211 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Entrenamiento inicial de contratación por jefatura.           <br />';
$check_212 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Entrenamiento periódico de controles operacionales.           <br />';

$check_213_218 ='<label style="background-color: #d7dbdd;"><br /> + Inspecciones Planeadas <br /><br /></label>';

$check_213 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Inspecciones generales planeadas.   <br />';
$check_214 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Procedimiento de seguimientos.      <br />';
$check_215 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Análisis de informes de inspección. <br />';
$check_216 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Mantenimiento preventivo.           <br />';
$check_217 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Sistema de inspecciones especiales. <br />';
$check_218 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Inspecciones de pre-uso de equipos. <br />';

$check_219_221 ='<label style="background-color: #d7dbdd;"><br /> + Entrenamiento de conocimiento y habilidades <br /><br /></label>';

$check_219 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Análisis de necesidades de entrenamiento.                       <br />';
$check_220 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Programa de entrenamiento o capacitación para los trabajadores. <br />';
$check_221 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Evaluación del programa de entrenamiento.                       <br />';

$check_222_224 ='<label style="background-color: #d7dbdd;"><br /> + Equipos de Protección Personal <br /><br /></label>';

$check_222 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Identificación de necesidades específicos de equipos de protección personal. <br />';
$check_223 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Control de entrega de equipo de protección personal.                         <br />';
$check_224 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Cumplimiento de las normas.                                                  <br />';

$check_225_227 ='<label style="background-color: #d7dbdd;"><br /> + Sistema de evaluación de los Programas HSE <br /><br /></label>';

$check_225 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Evaluación de los requisitos de los estándares HSE. <br />';
$check_226 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Evaluación cumplimiento de los estándares HSE.      <br />';
$check_227 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Evaluación permanente del sistema integrado.        <br />';

$check_228_229 ='<label style="background-color: #d7dbdd;"><br /> + Comunicación con Grupos <br /><br /></label>';

$check_228 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Reuniones periódicas con grupos.    <br />';
$check_229 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Participación de la administración. <br />';

$check_230_232 ='<label style="background-color: #d7dbdd;"><br /> + Contratación y colocación <br /><br /></label>';

$check_230 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Requisitos de capacidad.                   <br />';
$check_231 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Exámenes médicos.                          <br />';
$check_232 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Revisión de la calificación de Pre-empleo. <br />';

$check_233_234 ='<label style="background-color: #d7dbdd;"><br /> + Seguridad fuera del trabajo <br /><br /></label>';

$check_233 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Identificación y análisis del problema.   <br />';
$check_234 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Educación de seguridad fuera del trabajo. <br />';

////////////////////////

$check_235_236 ='<label style="background-color: #d7dbdd;"><br /> + Análisis y procedimientos de tareas <br /><br /></label>';

$check_235 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Matriz de identificación de peligro y evaluación de riesgos. <br />';
$check_236 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Determinación de controles operacionales.                    <br />';

$check_237_238 ='<label style="background-color: #d7dbdd;"><br /> + Investigación de incidentes <br /><br /></label>';

$check_237 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Seguimiento de medidas correctivas de investigaciones de incidentes anteriores. <br />';
$check_238 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Investigación de incidentes graves y de alto potencial.                         <br />';

$check_239_243 ='<label style="background-color: #d7dbdd;"><br /> + Observación de tareas <br /><br /></label>';

$check_239 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Directiva de la administración.          <br />';
$check_240 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Programa de observaciones de trabajo.    <br />';
$check_241 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Observación del trabajo.                 <br />';
$check_242 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Sistema de seguimiento de observaciones. <br />';
$check_243 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Análisis de observaciones realizadas.    <br />';

$check_244_250 ='<label style="background-color: #d7dbdd;"><br /> + Preparación para emergencias <br /><br /></label>';

$check_244 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Plan de emergencia.                                        <br />';
$check_245 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Análisis de posibles emergencias.                          <br />';
$check_246 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Entrenamiento de medidas de control en caso de emergencia. <br />';
$check_247 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Equipos de rescate de emergencia.                          <br />';
$check_248 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Equipos o accesorios de emergencia.                        <br />';
$check_249 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Comunicación en caso de emergencia.                        <br />';
$check_250 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Comunicación al público en general.                        <br />';

$check_251_256 ='<label style="background-color: #d7dbdd;"><br /> + Control de salud e higiene industrial <br /><br /></label>';

$check_251 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Identificación y evaluación de riesgos a la salud. <br />';
$check_252 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Control de riesgos a la salud.                     <br />';
$check_253 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Control de salud ocupacional e higiene industrial. <br />';
$check_254 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Información y entrenamiento.                       <br />';
$check_255 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Monitoreo de higiene industrial.                   <br />';
$check_256 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Comunicaciones.                                    <br />';

$check_257_258 ='<label style="background-color: #d7dbdd;"><br /> + Control de Ingeniería <br /><br /></label>';

$check_257 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Consideración sobre ingeniería de diseño.          <br />';
$check_258 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Revisión de proyectos y administración del cambio. <br />';

$check_259_262 ='<label style="background-color: #d7dbdd;"><br /> + Promoción general <br /><br /></label>';

$check_259 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Difusión de controles operacionales en diarios murales o sectores públicos. <br />';
$check_260 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Uso de estadísticas de incidentes.                                          <br />';
$check_261 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Promoción de temas críticos.                                                <br />';
$check_262 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Premios y reconocimiento a individuo o al grupo.                            <br />';

$check_263_265 ='<label style="background-color: #d7dbdd;"><br /> + Control de las adquisiciones, administración y servicios <br /><br /></label>';

$check_263 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Compras de mercancías.          <br />';
$check_264 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Selección del contratista.      <br />';
$check_265 ='<INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >  Administración del contratista. <br />';


$danio_equipo =''; 
$danio_material =''; 
$danio_ambiente ='';
$danio_personas ='';
$otros_danios ='';
  
$actividad_rutinaria ='';
$actividad_planificada ='';
$actividad_no_planificada ='';


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
									<td width="30%" ><strong>Código:</strong>  <br/> <strong>Fecha Informe: </strong> </td>
									<td width="10%" rowspan="2" style="text-align:center;"><br/>&nbsp;&nbsp;</td>
							</tr>

							<tr>
									<td style="text-align:center;">Prevención de Riesgos</td>
									<td><strong>Nro:</strong> </td>
							</tr>
				</table>
								
				<p></p>

				<table style="margin: 0 auto;">  
							<tr>
									<td width="50%" >
										 <br />
										<strong>Accidentado:           </strong> <br />
										<strong>Rut:                   </strong> <br />
										<strong>Edad:                  </strong> <br />
										<strong>Fecha de Nacimiento:   </strong> <br />
										<strong>Cargo:                 </strong> <br />
										<strong>Area:                  </strong> 
										
									</td>
									<td width="50%" >
										  <br />
										 <strong>Antigüedad Empresa:   </strong> <br />
										 <strong>Antigüedad Cargo:     </strong> <br />
										 <strong>Horas Trabajadas:     </strong> <br />
										 <strong>Jornada:              </strong> <br />
										 <strong>Gerencia:             </strong> <br />	
										 <strong>Jefe Directo:         </strong> 
										
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
										<strong>Fecha Accidente:  </strong> 								
										
									</td>
									<td width="20%" >
										 
										 <strong>Hora:            </strong>

									</td>
									<td width="50%" >
										
										 <strong>Tipo:            </strong>

									</td>
									    
							</tr>
							<tr>
								    <td width="100%">
									<br />
									<strong >Perdida del Incidente:</strong>		
				
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >Equipo</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >Material</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >Ambiente</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >Personas</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >Otros</label> <br />
									
									<strong>Especificar Otros:                        </strong> <br />
									<strong>Equipo Involucrado:                       </strong> <br />
									<strong>Actividad que Realizaba del Accidentarse: </strong> <br />
									
									<strong>Actividad:</strong>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >Rutinaria</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >Planificada</label>
									<label><INPUT TYPE="checkbox" NAME="input" VALUE="wrong" checked="" >No Planificada</label>
																					 
									</td>
								
						    </tr>
			    </table>
				
				<br />	
				<div style="background-color: #d7dbdd; text-align:center;"><strong>RELATO</strong></div>
				<br />	
				
									<strong>Relato del Accidente:                    </strong> <br />
									<strong>Parte del Cuerpo Lesionada:              </strong> <br />
									<strong>Tipo de Accidente:                       </strong> <br />	
									<strong>Elemento que Provoca la Lesión (Agente): </strong> <br />		
									<strong>Fuente:                                  </strong> <br />				
									<strong>Lugar Exacto del Accidente:              </strong> 
				
				<br />	
                <div style="background-color: #d7dbdd; text-align:center;"><strong>MEDIDAS DE CONTROL INMEDIATAS</strong></div>				
				<br />		

				<table border="1" style="margin: 0 auto; text-align:center;">
						   <tr>
								<th width="70%"><strong>Acción Inmediata Tomadas por el Supervisor</strong></th>
								<th width="30%"><strong>Responsable</strong></th>
					        </tr>
					      
				            <tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							<tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							<tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							<tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							<tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							 <tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							<tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							<tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							<tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							<tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							 <tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							<tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
							<tr><td><br /><br /></td>
                                <td><br /><br /></td>
						    </tr> 
														
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
									<br /><br />
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
									
									<br /><br /><br />
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
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
							<tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr><tr>
								<th width="40%"><br /><br /></th>
								<th width="20%"><br /><br /></th>
								<th width="25%"><br /><br /></th>
								<th width="15%"><br /><br /></th>
						    </tr>
												   
						 
				</table>
				
                <br />				
				<div style="background-color: #d7dbdd; text-align:center;"><strong>ADJUNTOS</strong></div>	
				<br />	
				
				<table border="1" style="margin: 0 auto; text-align:center;">
						    <tr>
								<th><strong>Imágenes</strong></th>
					        </tr>
							<tr>
								<th><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></th>
						    </tr>
							

						    
						 
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
							<tr>
								<th><br /><br /><br /><br /><br /><br /><br /><br /></th>
								<th><br /><br /><br /><br /><br /><br /><br /><br /></th>
								<th><br /><br /><br /><br /><br /><br /><br /><br /></th>
						    </tr>

						   
						 
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
