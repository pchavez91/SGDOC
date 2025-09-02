<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Permiso Diario de Trabajo</title>
  <style>

  toastr.options = {
          "debug": false,
          "positionClass": "toast-bottom-right",
          "onclick": null,
          "fadeIn": 300,
          "fadeOut": 100,
          "timeOut": 5000,
          "extendedTimeOut": 1000
      }

    body {
      font-family: Arial, sans-serif;
      font-size: 14px;
      margin: 20px;
    }
    h1 {
      text-align: center;
      text-transform: uppercase;
    }
    .section {
      margin-top: 20px;
      border-top: 1px solid #ccc;
      padding-top: 10px;
    }
    label, input, select, textarea {
      margin: 5px 0;
    }
    .checkbox-group, .inline {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }
    .checkbox-group label {
      width: 250px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    table2, th2, td2 {
      border: 1px solid #ccc;
      padding: 5px;
    }
    input, textarea, select {
      border-radius: 5px;
    }
  </style>
</head>
<body>
<link href="../fracttal_comasa/css/toastr.css" rel="stylesheet"/>
<!-- <link href="http://codeseven.github.com/toastr/toastr-responsive.css" rel="stylesheet"/> -->
<script src="../fracttal_comasa/js/toastr.js"></script>

  <div class="panel panel-default">
  <div class="panel-body">
  
    <button type="button" class="btn btn-primary data-toggle=button" title="Nuevo Permiso" onclick="nuevo_permiso('diario','nuevo')">NUEVO PERMISO DIARIO</button>
    <button type="button" class="btn btn-info data-toggle=button" title="Nuevo Permiso" onclick="nuevo_permiso('semanal','nuevo')">NUEVO PERMISO SEMANAL</button>
      <div class="tab-content">
                <div id="tab_principal1" class="tab-pane active">
                  <div class="panel-body">
                       <CENTER><H1>LISTA DE PERMISOS</H1></CENTER>
                            <div class="col-xs-12 col-lg-12">
                                  <table id="tabla_lista_de_permisos" class="display nowrap" width="100%">
                                      <thead>
                                          <tr>
                                          <th>N°</th>
                                          <th>TIPO PERMISO</th>
                                          <th>INICIO</th>
                                          <th>TERMINO</th>
                                          <th>EJECUTOR</th>
                                          <th>AREA</th>
                                          <th>TAREA</th>
                                          <th>CREADOR</th>
                                          <th>ESTADO</th>
                                          <th></th>   
                                          </tr>
                                      </thead>
                                  </table>
                              </div>
                    </div>
                </div>  
         </div>
    </div>

    </div>
</body>
</html>







<div id="ventana_permiso" class="modal fade" >
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        
      </div>
     <div class="modal-body"> 


  <div class="panel panel-default" id="panel_imprimir">
  <div class="panel-body">
    <button type="button" class="btn btn-success data-toggle=button" d="boton_guarda_diario" title="Guardar" onclick="guardar_actualizar()">GUARDAR O ACTUALIZAR</button>
    <button type="button" class="btn btn-primary data-toggle=button" d="boton_guarda_diario" title="Guardar" onclick="imprimir_permiso()">IMPRIMIR</button>


  <h1><div id="titulo_permiso"></div><div id="num_permiso" style="color: red;">s/n</div></h1>

  <form id="formulario_permiso">

  <div class="section">
     <div class="col-lg-8"></div>
    <label style="margin-left: 20px">N° Trabajadores:</label>
    <input type="text" size="7" id="numero_trabajadores">
    <label style="margin-left: 20px">N° OT:</label>
    <input type="text" size="7" id="num_ot">
  </div>

  <div class="section">
    <div class="col-lg-3">
    <label>Área Solicitante:</label>
    </div>
    <div class="col-lg-9">
       <select id="area_solicitante" class="col-lg-6">
        </select>
    </div>
    <div class="col-lg-3">
    <label>Trabajo a realizar:</label>
    </div>
    <div class="col-lg-9">
    <textarea rows="1" cols="100" id="trabajo_a_realizar"></textarea>
    </div>
    <div class="col-lg-3">
    <label>Ubicación del trabajo:</label>
    </div>
    <div class="col-lg-9">
    <textarea rows="1" cols="100" id="area_autorizada"></textarea>
    </div>
    <div class="col-lg-3">
    <label>Contratista:</label>
    </div>
    <div class="col-lg-9">
    <textarea rows="1" cols="100" id="empresa_contratista"></textarea>
    </div>
    <div class="col-lg-3">
    <label>Responsable_ejecucion:</label>
    </div>
    <div class="col-lg-9">
    <textarea rows="1" cols="100" id="responsable_ejecucion"></textarea>
    </div>
     <div class="col-lg-3">
    <label>Area Responsable:</label>
    </div>
    <div class="col-lg-9">
    <select id="area_responsable" onchange="carga_lista_usuarios()" class="col-lg-6">
        </select>
    </div>
     <div class="col-lg-3">
    <label>Responsable del Area:</label>
    </div>
    <div class="col-lg-9">
    <select id="responsable_area" class="col-lg-6">
        </select>
    </div>

    <label>Fecha Ejecución: &nbsp&nbsp</label> <input type="date" id="fecha_ini_ejecucion">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label >Fecha Termino: &nbsp&nbsp</label> <input type="date" id="fecha_termino_ejecucion" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label>Hora Inicio: &nbsp&nbsp</label> <input type="time"  id="hora_ini_ejecucion">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label>Hora Término: &nbsp&nbsp</label> <input type="time" id="hora_termino_ejecucion">

  </div>


  <div class="section">
    <label id="select_trabajo_critico"><strong>TIPOS DE TRABAJO CRITICO:</strong></label><br>
    <div class="checkbox-group">
      <label><input type="checkbox" onchange="form_check_uno()" id="I_check_aislamiento_bloqueo"> I.- AISLAMIENTO Y BLOQUEO</label>
      <label><input type="checkbox" onchange="form_check_dos()" id="II_check_trabajo_altura"> II.- TRABAJO EN ALTURA</label>
      <label><input type="checkbox" onchange="form_check_tres()" id="III_check_sumunistro_aire"> III.- SUMINISTRO DE AIRE</label>
      <label><input type="checkbox" onchange="form_check_cuatro()" id="IV_check_operacion_levante"> IV.- OPERACIÓN DE LEVANTE</label>
      <label><input type="checkbox" onchange="form_check_cinco()" id="V_check_cespacio_confinado"> V.- ESPACIO CONFINADO</label>
      <label><input type="checkbox" onchange="form_check_seis()" id="VI_check_excavacion"> VI.- EXCAVACIÓN</label>
      <label><input type="checkbox" onchange="form_check_siete()" id="VII_check_equipos_electronicos"> VII.- EQUIPOS ELECTRICOS</label>
      <label><input type="checkbox" onchange="form_check_ocho()" id="VIII_check_atmosfera_peligrosa"> VIII.- ATMOSFERA PELIGROSA</label>
      <label><input type="checkbox" onchange="form_check_nueve()" id="IX_check_trabajos_caliente"> IX.- TRABAJOS EN CALIENTE</label>
      <label><input type="checkbox" onchange="form_check_diez()" id="X_check_lavado_alta_presion"> X.- LAVADO ALTA PRESIÓN</label>
      <textarea rows="1" cols="60" id="detalle_tabajo_critico" placeholder="Detalle trabajo critico:"></textarea>
    </div>
  </div>
</form>
<form id="formulario_uno" style="display:none;">
  <div class="section" >
    
    <label><strong>I. AISLAMIENTO Y BLOQUEO:</strong></label><br>
    TAG de equipo N°<input type="text" placeholder="N°:" id="I_tag_uno">&nbsp<input type="text"  placeholder="N°:" id="I_tag_dos">&nbsp<input type="text" placeholder="N°:" id="I_tag_tres">&nbsp<input type="text" placeholder="N°:" id="I_tag_cuatro">&nbsp<input type="text" placeholder="N°:" id="I_tag_cinco"><br>
    Colocar candado: <input type="checkbox" id="I_check_candado_si"> Sí &nbsp&nbsp&nbsp<input type="checkbox" id="I_check_candado_no"> No<br>
    Desconectar desde: <input type="checkbox" id="I_check_ccm"> CCM &nbsp&nbsp&nbsp<input type="checkbox" id="I_check_tablero_electrico"> Tablero Eléctrico &nbsp&nbsp&nbsp<input type="checkbox" id="I_check_ww"> W/W &nbsp&nbsp&nbsp<input type="checkbox" id="I_check_otro_subprincipio"> Otro (Subprincipio)<br>
    Candados N° <input type="text" placeholder="N°:" id="I_candado_uno">&nbsp<input type="text" placeholder="N°:" id="I_candado_dos">&nbsp<input type="text" placeholder="N°:" id="I_candado_tres">&nbsp<input type="text" placeholder="N°:" id="I_candado_cuatro">&nbsp<input type="text" placeholder="N°:" id="I_candado_cinco">
    
  </div>
 </form>
<form id="formulario_dos" style="display:none;">
  <div class="section" >
    <label><strong>II. TRABAJOS EN ALTURA:</strong></label><br>
    <label>SI</label>&nbsp&nbsp&nbsp<label> NO </label><br>
    <input type="checkbox" id="IIa_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIa_check_no">&nbsp<label  id="nombre_IIa"> Personal capacitado en procedimiento para Trabajos en altura.</label><br>
    <input type="checkbox" class="has-error" id="IIb_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIb_check_no">&nbsp<label> Mantener libre de materiales la plataforma de trabajo.</label><br>
    <input type="checkbox" id="IIc_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIc_check_no">&nbsp<label> La escalera cuenta con los dispositivos de seguridad.</label><br>
    <input type="checkbox" id="IId_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IId_check_no">&nbsp<label> Inspección de arnés, puntos de anclaje, andamios, escaleras, equipos y herramientas antes de su uso.</label><br>
    <input type="checkbox" id="IIe_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIe_check_no">&nbsp<label> Se debe colocar una linea o cuerda de vida adicional.</label><br>
    <input type="checkbox" id="IIf_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIf_check_no">&nbsp<label> Barandas a partir de 1 metro de altura.</label><br>
    <input type="checkbox" id="IIg_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIg_check_no">&nbsp<label> Se debe utilizar baldes para subir o bajar herramientas o elementos.</label><br>
    <input type="checkbox" id="IIh_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIh_check_no">&nbsp<label> Si el andamio supera los 2 cuerpos debe estar anclado a estructura fija.</label><br>
    <input type="checkbox" id="IIi_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIi_check_no">&nbsp<label> Al andamio o plataforma está aprobado.</label><br>
    <input type="checkbox" id="IIj_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIj_check_no">&nbsp<label> Señalizar con cinta de peligro o letreros el área de la zona de trabajo.</label><br>

  </div>
  </form>
<form id="formulario_tres" style="display:none;">
  <div class="section">
    <label><strong>III. SUMINISTRO DE AIRE:</strong></label><br>
    <label>SI</label>&nbsp&nbsp&nbsp<label> NO </label><br>
    <input type="checkbox" id="IIIa_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIIa_check_no">&nbsp<label> Personal capacitado en procedimiento para trabajos con suministro de aire.</label><br>
    <input type="checkbox" id="IIIb_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIIb_check_no">&nbsp<label> Inspección previa del compresor.</label><br>
    <input type="checkbox" id="IIIc_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIIc_check_no">&nbsp<label> Verificar que cuente con su mantención al día.</label><br>
    <input type="checkbox" id="IIId_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIId_check_no">&nbsp<label> Revisar que el compresor tenga válvula de seguridad y manómetro operativo.</label><br>
    <input type="checkbox" id="IIIe_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIIe_check_no">&nbsp<label> Condición de mangueras y conexiones.</label><br>
    <input type="checkbox" id="IIIf_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIIf_check_no">&nbsp<label> Utilizar mangueras sin grietas, desgastes ni reparaciones caseras.</label><br>
    <input type="checkbox" id="IIIg_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIIg_check_no">&nbsp<label> Uso de reguladores de presión.</label><br>
    <input type="checkbox" id="IIIh_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIIh_check_no">&nbsp<label> Uso de válvulas de retención y purgadores.</label><br>
    <input type="checkbox" id="IIIi_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IIIi_check_no">&nbsp<label> Prohibido el uso de aire comprimido para limpiar ropa o cuerpo humano.</label><br>

  </div>
  </form>
<form id="formulario_cuatro" style="display:none;">
  <div class="section">
    <label><strong>IV. OPERACIÓN DE LEVANTE:</strong></label><br>
    <label>SI</label>&nbsp&nbsp&nbsp<label> NO </label><br>
    <input type="checkbox" id="IVa_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IVa_check_no">&nbsp<label> Equipos de levante certificados y con mantención vigente.</label><br>
    <input type="checkbox" id="IVb_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IVb_check_no">&nbsp<label> Inspección visual de todos los accesorios de izaje antes del uso.</label><br>
    <input type="checkbox" id="IVc_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IVc_check_no">&nbsp<label> Estabilizadores extendidos y nivelados (en caso de camión grúa).</label><br>
    <input type="checkbox" id="IVd_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IVd_check_no">&nbsp<label> Vía de desplazamiento de carga despejada.</label><br>
    <input type="checkbox" id="IVe_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IVe_check_no">&nbsp<label> Área señalizada y delimitada.</label><br>
    <input type="checkbox" id="IVf_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IVf_check_no">&nbsp<label> El señalero o Rigger debera usar chaquetra reflectante diferente al resto del personal.</label><br>
    <input type="checkbox" id="IVg_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IVg_check_no">&nbsp<label> Toda carga será manipulada a traves de cuerdas guías o vientos.</label><br>
    <input type="checkbox" id="IVh_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IVh_check_no">&nbsp<label> Operador debidamente acreditado (licencia o curso según tipo de equipo).</label><br>
    <input type="checkbox" id="IVi_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IVi_check_no">&nbsp<label> No se realizarán maniobras de izaje con viento mayor a 30 Km/hr.</label><br>

  </div>
</form>

<form id="formulario_cinco" style="display:none;">
  <div class="section">
    <label><strong>V. ESPACIO CONFINADO:</strong></label><br>
    <label>SI</label>&nbsp&nbsp&nbsp<label> NO </label><br>
    <input type="checkbox" id="Va_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Va_check_no">&nbsp<label> Personal capacitado en Procedimiento de Trabajos en espacios confinados.</label><br>
    <input type="checkbox" id="Vb_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Vb_check_no">&nbsp<label> Personal debera contar con examen vigente que acredite salud compatible.</label><br>
    <input type="checkbox" id="Vc_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Vc_check_no">&nbsp<label> Medición de atmósfera interna ANTES del ingreso ,asegurar que se inicien y mantengan las tareas.</label><br>
    <input type="checkbox" id="Vd_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Vd_check_no">&nbsp<label> 0 % del límite inferior de explosividad (LEL), 0 ppm de ácido sulfhídrico (H2S).</label><br>
    <input type="checkbox" id="Ve_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Ve_check_no">&nbsp<label> 0 ppm  Monóxido de Carbono  y 21 % Oxígeno.(Detector Multigas Fijo).</label><br>
    <input type="checkbox" id="Vf_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Vf_check_no">&nbsp<label> Se debe contar con accesos adecuados para aegurar la salida rápida en casos de emergencia.</label><br>
    <input type="checkbox" id="Vg_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Vg_check_no">&nbsp<label> Ventilar el espacio con sistemas forzados (extractores o inyectores de aire limpio) antes y durante el trabajo.</label><br>
    <input type="checkbox" id="Vh_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Vh_check_no">&nbsp<label> En caso de atmósfera peligrosa, aplicar sistemas de purga con aire o gases inertes según corresponda.</label><br>
    <input type="checkbox" id="Vi_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Vi_check_no">&nbsp<label> Iluminación de baja tensión (24 V o a prueba de explosión).</label><br>

  </div>
</form>

<form id="formulario_seis" style="display:none;">
  <div class="section">
    <label><strong>VI. EXCAVACIÓN:</strong></label><br>
    <label>SI</label>&nbsp&nbsp&nbsp<label> NO </label><br>
    <input type="checkbox" id="VIa_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIa_check_no">&nbsp<label> Personal capacitado en Procedimiento de Trabajos en excavación.</label><br>
    <input type="checkbox" id="VIb_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIb_check_no">&nbsp<label> Demarcar y señalizar visiblemente la zona de trabajo.</label><br>
    <input type="checkbox" id="VIc_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIc_check_no">&nbsp<label> Instalar iluminación artificial si se trabaja en condiciones de poca luz.</label><br>
    <input type="checkbox" id="VId_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VId_check_no">&nbsp<label> Evitar maquinaria pesada a menos de 2 metros del borde de la excavación.</label><br>
    <input type="checkbox" id="VIe_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIe_check_no">&nbsp<label> Usar pendiente natural adecuada o entibar si el terreno es inestable.</label><br>
    <input type="checkbox" id="VIf_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIf_check_no">&nbsp<label> Escalera fija o acceso seguro cada 7 metros.</label><br>
    <input type="checkbox" id="VIg_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIg_check_no">&nbsp<label> Comunicación radial constante si se trabaja con maquinaria pesada en paralelo.</label><br>
    <input type="checkbox" id="VIh_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIh_check_no">&nbsp<label> Designación de vigía o señalizador, si hay interacción con camiones u otros equipos.</label><br>
    <input type="checkbox" id="VIi_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIi_check_no">&nbsp<label> Instalación de malla naranjo o reja metálica para evitar caída de personas en excavaciones.</label><br>
    <input type="checkbox" id="VIj_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIj_check_no">&nbsp<label> Registro de inspecciones diarias (condiciones del talud, accesos, estado general).</label><br>

  </div>
  </form>

<form id="formulario_siete" style="display:none;">
  <div class="section">
    <label><strong>VII. EQUIPOS ELECTRICOS:</strong></label><br>
    <label>SI</label>&nbsp&nbsp&nbsp<label> NO </label><br>
    <input type="checkbox" id="VIIa_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIa_check_no">&nbsp<label> Personal capacitado en Procedimiento de Trabajos con equipos eléctricos.</label><br>
    <input type="checkbox" id="VIIb_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIb_check_no">&nbsp<label> Aislamiento y bloqueo eléctrico (LOTO).</label><br>
    <input type="checkbox" id="VIIc_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIc_check_no">&nbsp<label> Desenergizar completamente los equipos antes de intervenirlos.</label><br>
    <input type="checkbox" id="VIId_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIId_check_no">&nbsp<label> Colocar candados y tarjetas de bloqueo personales.</label><br>
    <input type="checkbox" id="VIIe_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIe_check_no">&nbsp<label> Verificar ausencia de tensión con instrumento adecuado (multímetro o detector de voltaje).</label><br>
    <input type="checkbox" id="VIIf_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIf_check_no">&nbsp<label> Inspección visual de herramientas antes del uso: sin daños, aislación intacta, sin humedad.</label><br>
    <input type="checkbox" id="VIIg_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIg_check_no">&nbsp<label> Uso de instrumentos de medición calibrados y apropiados para el nivel de tensión.</label><br>
    <input type="checkbox" id="VIIh_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIh_check_no">&nbsp<label> Prohibido usar alargadores o conexiones improvisadas.</label><br>
    <input type="checkbox" id="VIIi_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIi_check_no">&nbsp<label> Sólo pueden ejecutar tareas eléctricas los trabajadores autorizados y certificados por la empresa.</label><br>

  </div>
  </form>

<form id="formulario_ocho" style="display:none;">
  <div class="section">
    <label><strong>VIII. ATMOSFERA PELIGROSA:</strong></label><br>
    <label>SI</label>&nbsp&nbsp&nbsp<label> NO </label><br>
    <input type="checkbox" id="VIIIa_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIIa_check_no">&nbsp<label> Personal capacitado en Procedimiento de trabajos con atmosfera peligrosa.</label><br>
    <input type="checkbox" id="VIIIb_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIIb_check_no">&nbsp<label> Antes de comenzar los trabajos se deberá realizar mediciones ambientales y mantener un registro .</label><br>
    <input type="checkbox" id="VIIIc_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIIc_check_no">&nbsp<label> Asegurar que se inicien y mantengan las tareas en condiciones de 0 % del límite inferior de explosividad 0 ppm </label><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label> de ácido sulfhídrico (H2S), 0 ppm  Monóxido de Carbono y 21 % Oxígeno.(Detector Multigas Fijo).</label><br>
    <input type="checkbox" id="VIIId_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIId_check_no">&nbsp<label> Contar con extintor en el área de trabajo al utilizar vehículos o maquinaría de combustión interna.</label><br>
    <input type="checkbox" id="VIIIe_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIIe_check_no">&nbsp<label> En caso de evacuación, el personal deberá cumplir lo indicado en el Plan de GRD de COMASA.</label><br>
    <input type="checkbox" id="VIIIf_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIIf_check_no">&nbsp<label> Ventilación forzada (extractores o inyección de aire) antes y durante el trabajo.</label><br>
    <input type="checkbox" id="VIIIg_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIIg_check_no">&nbsp<label> Sistema de purga con aire limpio si hay gases acumulados o atmósfera inerte.</label><br>
    <input type="checkbox" id="VIIIh_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="VIIIh_check_no">&nbsp<label> Prohibido fumar o usar llamas abiertas.</label><br>

  </div>
  </form>

<form id="formulario_nueve" style="display:none;">

    <div class="section">
    <label><strong>IX. TRABAJOS EN CALIENTE:</strong></label><br>
    <label>SI</label>&nbsp&nbsp&nbsp<label> NO </label><br>
    <input type="checkbox" id="IXa_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IXa_check_no">&nbsp<label> Personsal capacitado en Procedimiento de trabajos en caliente.</label><br>
    <input type="checkbox" id="IXb_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IXb_check_no">&nbsp<label> Limpiar el área de trabajo eliminando producto inflamable o combustible .</label><br>
    <input type="checkbox" id="IXc_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IXc_check_no">&nbsp<label> Mantener mojado el piso y zonas circundantes.</label><br>
    <input type="checkbox" id="IXd_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IXd_check_no">&nbsp<label> Aislar el área de trabajo por medio de biombos, lonas o mantas mojadas.</label><br>
    <input type="checkbox" id="IXe_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IXe_check_no">&nbsp<label> Instalación de mangueras contra incendios.</label><br>
    <input type="checkbox" id="IXf_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IXf_check_no">&nbsp<label> Extintor portátil tipo PQS.</label><br>
    <input type="checkbox" id="IXg_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IXg_check_no">&nbsp<label> Medición de gases explosivos ene l área.</label><br>
    <input type="checkbox" id="IXh_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="IXh_check_no">&nbsp<label> Verificar que al termino de los trabajos no queden restos de material incandescentes.</label><br>

  </div>
  </form>

<form id="formulario_diez" style="display:none;">

  <div class="section">
    <label><strong>X. LAVADO ALTA PRESIÓN:</strong></label><br>
    <label>SI</label>&nbsp&nbsp&nbsp<label> NO </label><br>
    <input type="checkbox" id="Xa_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Xa_check_no">&nbsp<label> Personal capacitado en Procedimieno de trabajos con lavado de alta presión.</label><br>
    <input type="checkbox" id="Xb_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Xb_check_no">&nbsp<label> Nunca realizar lavado de alta presión solo.</label><br>
    <input type="checkbox" id="Xc_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Xc_check_no">&nbsp<label> Prohibido realizar ajustes en la boquilla, conexiones o mangueras con presión en línea.</label><br>
    <input type="checkbox" id="Xd_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Xd_check_no">&nbsp<label> Utilizar boquillas con difusor de abanico o control de ángulo para reducir el impacto puntual.</label><br>
    <input type="checkbox" id="Xe_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Xe_check_no">&nbsp<label> Realizar prueba de estanqueidad y presión a mangueras antes de cada turno.</label><br>
    <input type="checkbox" id="Xf_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Xf_check_no">&nbsp<label> Confirmar funcionamiento del sistema de corte automático por sobrepresión si el equipo lo incluye.</label><br>
    <input type="checkbox" id="Xg_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Xg_check_no">&nbsp<label> Al finalizar el trabajo,Purgar completamente el sistema antes de desconectar manguera.</label><br>
    <input type="checkbox" id="Xh_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Xh_check_no">&nbsp<label> Purgar completamente el sistema antes de desconectar mangueras.</label><br>
    <input type="checkbox" id="Xi_check_si">&nbsp&nbsp&nbsp<input type="checkbox" id="Xi_check_no">&nbsp<label> Verificar que no queden puntos con presión residual.</label><br>

  </div>
  </form>

<form id="formulario_ultimos_datos">

  <div class="section">
    <label><strong>VERIFICAR SI SE USAN LAS SIGUIENTES HERRAMIENTAS /EQUIPOS:</strong></label>
    <div class="rows">
      <label><input type="checkbox" id="XII_check_herr_electr"> Herramienta eléctrica /neumática </label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XII_check_herr_manual"> Herramientas manuales</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XII_check_camion_grua"> Camión grúa o pluma</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XII_check_andamio"> Andamio y/o escalas</label>&nbsp&nbsp&nbsp<br>
      <label><input type="checkbox" id="XII_check_soldadura_arco"> Soldadura / Corte por arco eléctrico</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XII_check_compresor"> Compresor /Bombas</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XII_check_soldadura_oxi"> Soldadura / Corte por Oxi-gas</label>&nbsp&nbsp&nbsp<br>
      <textarea  rows="1" cols="80" id="XII_otros" placeholder="Otros...."></textarea>

    </div>
  </div>

  <div class="section">
    <label><strong>PELIGROS FISICOS:</strong></label>
    <div class="rows">
      <label><input type="checkbox" id="XIII_check_ruido"> Ruido >82 dB</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XIII_check_caida"> Caída >1,8 mts</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XIII_check_riego_electrico"> Riesgo Eléctrico</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XIII_check_contacto_quimico"> Contacto con prod. Químicos</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XIII_check_exposicion_gas"> Exposición de Gases</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XIII_check_estres"> Estrés por calor</label>&nbsp&nbsp&nbsp<br>
      <label><input type="checkbox" id="XIII_check_proyeccion"> Proyección de partículas</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XIII_check_exposicion_polvo"> Exposición Polvo en Suspensión</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XIII_check_contacto_sup_caliente"> Contacto sup. Calientess</label>&nbsp&nbsp&nbsp<br>
      <textarea  rows="1" cols="80" id="XIII_otros" placeholder="Otros...."></textarea>

    </div>
  </div>

    <div class="section">
    <label><strong>RESGUARDO AREA DE TRABAJO:</strong></label>
    <div class="rows">
      <label><input type="checkbox" id="XIV_check_conos"> Conos</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XIV_check_cinta"> Cinta de Peligro</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XIV_check_barreras"> Barreras</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="XIV_check_senalizacion"> Señalización (letreros)</label>&nbsp&nbsp&nbsp

    </div>
  </div>
</form>

  <div class="section">
    <label><strong>AUTORIZADORES</strong></label>
    <table>
      <thead>
        <tr>
          <th width="10%"></th>
          <th width="22%">I T O</th>
          <th width="22%">Originador del trabajo</th>
          <th width="22%">Ejecutor del trabajo</th>
          <th width="22%">Responsable del área</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><br>Nombre:<br><br>Firma:<br><br></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>

  </div>
  </div>









  </div>
    <div class="rows">
      <div class="modal-footer">
        <button type="button" class="btn btn-success data-toggle=button"  title="Guardar" onclick="guardar_actualizar()">GUARDAR O ACTUALIZAR</button>
        <button type="button" class="btn btn-primary data-toggle=button" id="boton_guarda_diario" title="Guardar" onclick="imprimir_permiso()">IMPRIMIR</button>
      </div>
  </div>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script src="script/admin_permisos.js"></script>