<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Permiso Diario de Trabajo</title>
  <style>
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
    input, textarea {
      border-radius: 5px;
    }
  </style>
</head>
<body>

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


  <h1><div id="titulo_permiso"></div><div id="num_permiso">s/n</div></h1>

  <form id="formulario_permiso">

  <div class="section">
    <div class="col-lg-8">
    <label>Ejecutor:</label>&nbsp&nbsp&nbsp
    <input type="checkbox" id="ejecutor_mantencion" > Mantenimiento &nbsp&nbsp&nbsp
    <input type="checkbox" id="ejecutor_contratista" > Contratista  <input type="text" id="empresa_contratista" size="45">
    </div>
    <label style="margin-left: 20px">N° Trabajadores:</label>
    <input type="text" size="7" id="numero_trabajadores">
    <label style="margin-left: 20px">N° OT:</label>
    <input type="text" size="7" id="num_ot">
  </div>

  <div class="section">
    <div class="col-lg-3">
    <label>Área de trabajo autorizada:</label>
    </div>
    <div class="col-lg-9">
    <textarea rows="1" cols="100" id="area_autorizada"></textarea>
    </div>
    <div class="col-lg-3">
    <label>Trabajo a realizar:</label>
    </div>
    <div class="col-lg-9">
    <textarea rows="1" cols="100" id="trabajo_a_realizar"></textarea>
    </div>

    <label>Fecha Ejecución: &nbsp&nbsp</label> <input type="date" id="fecha_ini_ejecucion">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label >Fecha Termino: &nbsp&nbsp</label> <input type="date" id="fecha_termino_ejecucion" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label>Hora Inicio: &nbsp&nbsp</label> <input type="time"  id="hora_ini_ejecucion">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label>Hora Término: &nbsp&nbsp</label> <input type="time" id="hora_termino_ejecucion">

  </div>

  <div class="section">
    <div class="checkbox-group">
      <label><input type="checkbox" id="especialidad_mecanica"> Mecánica</label>
      <label><input type="checkbox" id="especialidad_soldadura"> Soldadura</label>
      <label><input type="checkbox" id="especialidad_electrica"> Eléctrica</label>
      <label><input type="checkbox" id="especialidad_instrumentacion"> Instrumentación</label>
      <label><input type="checkbox" id="especialidad_produccion"> Producción</label>
      <label><input type="checkbox" id="especialidad_servicio"> Servicio</label>
      <textarea  rows="1" cols="30" id="otra_especialidad" placeholder="Otra...."></textarea>
    </div>
  </div>

  <div class="section">
    <label><strong>I. TIPO DE TRABAJO:</strong></label><br>
    <div class="checkbox-group">
      <label><input type="checkbox" id="1A_check1"> En Caliente (corte/soldadura)</label>
      <label><input type="checkbox" id="1A_check2"> En Altura</label>
      <label><input type="checkbox" id="1A_check3"> Espacios Confinados</label>
      <label><input type="checkbox" id="1A_check4"> Sustancias Peligrosas</label>
      <label><input type="checkbox" id="1A_check5"> Excavación</label>
      <label><input type="checkbox" id="1A_check6"> Intervención de Circ. Eléctrico</label>
      <label><input type="checkbox" id="1A_check7"> Intervención de Calderas/Válvulas</label>
      <label><input type="checkbox" id="1A_check8"> Intervención de Sist. Prot. Incendios</label>
      <label><input type="checkbox" id="1A_check9"> Equipos de Levante Hidrolavado</label>
      <textarea  rows="1" cols="80" id="1A_otros" placeholder="Otros...."></textarea>
    </div>
  </div>

  <div class="section">
    <label><strong>II. EL ENCARGADO DE LA EJECUCIÓN DEBERÁ:</strong></label>
    <div class="checkbox-group">
      <label><input type="checkbox" id="2A_check1"> Comunicar a los trabajadores involucrados los riesgos que implica el trabajo</label>
      <label><input type="checkbox" id="2A_check2"> Comunicar los instructivos de Seguridad específicos</label>
      <label><input type="checkbox" id="2A_check3"> Presentar charla específica inicial</label>
    </div>
  </div>

  <div class="section">
    <label><strong>III. VERIFICAR SI SE USAN LAS SIGUYIENTES HERRAMIENTAS/EQUIPOS:</strong></label>
    <div class="checkbox-group">
      <label><input type="checkbox" id="3A_check1"> Herramienta eléctrica/neumática</label>
      <label><input type="checkbox" id="3A_check2"> Cambio pluma o grúa</label>
      <label><input type="checkbox" id="3A_check3"> Soldadura/Corte por arco eléctrico</label>
      <label><input type="checkbox" id="3A_check4"> Soldadura/Corte por Oxi-gas</label>
      <label><input type="checkbox" id="3A_check5"> Herramientas manuales</label>
      <label><input type="checkbox" id="3A_check6"> Andamios y/o escaleras</label>
      <label><input type="checkbox" id="3A_check7"> Compresor/Bombas</label>
      <textarea  rows="1" cols="40" id="3A_otros" placeholder="Otros"></textarea>
    </div>
  </div>

  <div class="section">
    <label><strong>IV. PELIGROS FÍSICOS:</strong></label>
    <div class="checkbox-group">
      <label><input type="checkbox" id="4A_check1"> Ruido > 82 dB</label>
      <label><input type="checkbox" id="4A_check2"> Riesgo eléctrico</label>
      <label><input type="checkbox" id="4A_check3"> Exposición de gases</label>
      <label><input type="checkbox" id="4A_check4"> Proyección de partículas</label>
      <label><input type="checkbox" id="4A_check5"> Contacto con superficies calientes</label>
      <label><input type="checkbox" id="4A_check6"> Caídas > 1,50 mts.</label>
      <label><input type="checkbox" id="4A_check7"> Contacto con prod. químicos</label>
      <label><input type="checkbox" id="4A_check8"> Estrés por calor</label>
      <label><input type="checkbox" id="4A_check9"> Exposición polvo en suspensión</label>
      <textarea  rows="1" cols="40" id="4A_otros" placeholder="Otros...."></textarea>
    </div>
  </div>

  <div class="section">
    <label><strong>V. EQUIPOS DE PROTECCIÓN PERSONAL REQUERIDOS:</strong></label><br>
 
    <strong>V.1 ROPA</strong>
    <div class="checkbox-group">
      <label><input type="checkbox" id="5A_check1"> Buzo trabajo</label>
      <label><input type="checkbox" id="5A_check2"> Traje para polvos (desechables)</label>
      <label><input type="checkbox" id="5A_check3"> Chaqueta, colete o cuero</label>
      <label><input type="checkbox" id="5A_check4"> Traje para químicos</label>
      <label><input type="checkbox" id="5A_check5"> Traje PVC</label>
    </div><br>
   
     <strong>V.2 PROTECCIÓN DE CABEZA PIES Y PIERNAS</strong>
    <div class="checkbox-group">
      <label><input type="checkbox" id="5B_check1"> Casco</label>
      <label><input type="checkbox" id="5B_check2"> Zapatos de Seguridad</label>
      <label><input type="checkbox" id="5B_check3"> Botas de Goma (Con puntera de acero)</label>
    </div><br>
    <strong>V.3 PROTECCIÓN RESPIRATORIA</strong>
    <div class="checkbox-group">
      <label><input type="checkbox" id="5C_check1"> Mascarilla desechable</label>
      <label><input type="checkbox" id="5C_check2"> Máscara rostro completo</label>
      <label><input type="checkbox" id="5C_check3"> Máscara medio rostro</label>
      <label><input type="checkbox" id="5C_check5"> Equipo de respiración autónoma</label>
      <label><input type="text" id="5C_tipo_filtro" placeholder="Tipo filtro"></label>
    </div><br>
    <strong>V.4 PROTECCIÓN AUDITIVA</strong>
    <div class="checkbox-group">
      <label><input type="checkbox" id="5D_check1"> Tapón inserto</label>
      <label><input type="checkbox" id="5D_check2"> Orejera</label>
    </div><br>

    <strong>V.5 PROTECCIÓN CONTRA CAÍDAS</strong>
    <div class="checkbox-group">
      <label><input type="checkbox" id="5E_check1"> Arnés de Seg. con 2 cabos de Vida</label>
      <label><input type="checkbox" id="5E_check2"> Arnés de Seg. con 3 cabos de Vida</label>
      <label><input type="checkbox" id="5E_check3"> Linea de Vida</label>
    </div><br>

    <strong>V.6 PPROTECCIÓN FACIAL Y OCULAR</strong>
    <div class="checkbox-group">
      <label><input type="checkbox" id="5F_check1"> Lentes de seguridad</label>
      <label><input type="checkbox" id="5F_check2"> Lentes para polvo</label>
      <label><input type="checkbox" id="5F_check3"> Antiparras de acetato</label>
      <label><input type="checkbox" id="5F_check4"> Careta facial</label>
      <label><input type="checkbox" id="5F_check5"> Máscara de soldar</label>
      <textarea  rows="1" cols="40" id="5F_otros" placeholder="Otros...."></textarea>
    </div><br>
    <strong>V.7 GUANTES</strong>
    <div class="checkbox-group">
      <label><input type="checkbox" id="5G_check1"> Cabritilla</label>
      <label><input type="checkbox" id="5G_check2"> Soldador</label>
      <label><input type="checkbox" id="5G_check3"> Neopreno (prod. químicos)</label>
      <label><input type="checkbox" id="5H_check1"> Nitrilo o líquido combustible</label>
      <label><input type="checkbox" id="5H_check2"> Resistentes altas T°</label>
      <label><input type="checkbox" id="5H_check3"> Dieléctricos</label>
      <textarea  rows="1" cols="40" id="5G_otros" placeholder="Otros...."></textarea>
    </div>
  </div>

  <div class="section">
    <label><strong>VI. RESGUARD ÁREA DE TRABAJO:</strong></label>
    <div class="checkbox-group">
      <label><input type="checkbox" id="6A_check1"> Conos</label>
      <label><input type="checkbox" id="6A_check2"> Cinta de Peligro</label>
      <label><input type="checkbox" id="6A_check3"> Barreras</label>
      <label><input type="checkbox" id="6A_check4"> Señalización (letreros)</label>
      <textarea  rows="1" cols="40" id="6A_otros" placeholder="Otros...."></textarea>
    </div>
  </div>

  <div class="section">
    <label><strong>VII. PROCEDIMIENTO DE DESCONEXIÓN ELÉCTRICA/NEUMÁTICA:</strong></label><br>
    TAG de equipo Nº: <input type="text" id="7tag_1"> Nº: <input type="text" id="7tag_2"> Nº: <input type="text" id="7tag_3"> Nº: <input type="text" id="7tag_4"> Nº: <input type="text" id="7tag_5"><br>
    Colocar candado: <input type="checkbox" id="7candado_check1"> Sí &nbsp&nbsp&nbsp<input type="checkbox" id="7candado_check2"> No &nbsp&nbsp&nbsp<input type="checkbox" id="7candado_check3"> N/A<br>
    Desconectar desde: <input type="checkbox" id="7ccm_check"> CCM &nbsp&nbsp&nbsp<input type="checkbox" id="7tablero_check"> Tablero Eléctrico &nbsp&nbsp&nbsp<input type="checkbox" id="7ww_check"> W/W &nbsp&nbsp&nbsp<input type="checkbox" id="7otro_check"> Otro (Subprincipio)<br>
    Candados Nº: <input type="text" id="7candado_num1"> Nº: <input type="text" id="7candado_num2"> Nº: <input type="text" id="7candado_num3"> Nº: <input type="text" id="7candado_num4"> Nº: <input type="text" id="7candado_num5"><br>
    Responsable desconexión o bloqueo: <input type="text" id="7responsable_bloqueo"> Firma: <input type="text" id="">
  </div>

  <div class="section">
    <label><strong>VIII. TRABAJOS EN CALIENTE: </strong></label><br>

    <label>SI</label>&nbsp<label> NO </label>&nbsp<label> N/A </label><br>
    <input type="checkbox" id="8A_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="8A_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="8A_check3"> <label> Limpiar el área de trabajo eliminando producto inflamable o combustible</label><br>
    <input type="checkbox" id="8B_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="8B_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="8B_check3"> <label> Mantener mojado el piso y zanas circundantes</label><br>
    <input type="checkbox" id="8C_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="8C_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="8C_check3"> <label> Aislar el área de trabajo por medio de biombos, lonas o mantas mojadas</label><br>
    <input type="checkbox" id="8D_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="8D_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="8D_check3"> <label> Instalación de mangueras contra incendio</label><br>
    <input type="checkbox" id="8E_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="8E_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="8E_check3"> <label> Extintor portatil tipo POS</label><br>
    <input type="checkbox" id="8F_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="8F_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="8F_check3"> <label> Medición de gases explosivos en el área</label><br>
    <input type="checkbox" id="8G_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="8G_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="8G_check3"> <label> Verificar que al término de los tabajos no queden restos de material incandecentes</label><br>
    <textarea  rows="1" cols="100" id="8I_otros" placeholder="Otros...."></textarea>


  </div>

  <div class="section">
    <label><strong>IX. TRABAJOS EN ALTURA:</strong><br>
    </label><label>SI</label>&nbsp<label> NO </label>&nbsp<label> N/A </label><br>
    <input type="checkbox" id="9A_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="9A_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="9A_check3"><label>Señalar con cinta de peligro o con letreros l área de la zona de trabajo</label><br>
    <input type="checkbox" id="9B_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="9B_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="9B_check3"> <label> Mantener libre de materiales la plataforma de trabajo</label><br>
    <input type="checkbox" id="9C_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="9C_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="9C_check3"> <label> La escalera cuenta con los dispositivos de seguridad</label><br>
    <input type="checkbox" id="9D_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="9D_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="9D_check3"> <label> Plataforma libre de carga</label><br>
    <input type="checkbox" id="9E_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="9E_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="9E_check3"> <label> Se debe colocar una linea o cuerda de vida adicional</label><br>
    <input type="checkbox" id="9F_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="9F_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="9F_check3"> <label> Se debe utilizar equipo de levante para subir o bajar personas</label><br>
    <input type="checkbox" id="9G_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="9G_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="9G_check3"> <label> Barreras a partir de 1 metro de altura</label><br>
    <input type="checkbox" id="9H_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="9H_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="9H_check3"> <label> Se debe utilizar baldes para subir o bajar herramientas o elementos</label><br>
    <input type="checkbox" id="9I_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="9I_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="9I_check3"><label>Si el Andamio supera los 2 cuerpos debe estar anclado a una estructura fija</label><br>
    <input type="checkbox" id="9J_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="9J_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="9J_check3"> <label> El Andamio o plataforma debe estar aprobado</label>

  </div>

  <div class="section">
    <label><strong>X. TRABAJOS EN ESPACIOS CONFINADOS:</strong></label><br>
    </label><label>SI</label>&nbsp<label> NO </label>&nbsp<label> N/A </label><br>
    <input type="checkbox" id="10A_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="10A_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="10A_check3"> <label> Para este tipo de trabajos, debe ir dos o mas trabajadores</label><br>
    <input type="checkbox" id="10B_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="10B_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="10B_check3"> <label> Se tomo medición de oxígeno, pases explisivos y T°&nbsp</label><input type="text" size="7" id="10B_T"><label> &nbspC°&nbsp</label><input type="text" size="7" id="10B_C"><label> &nbsp Valores de la medición 02:&nbsp</label><input type="text" size="7" id="10B_O2"><label> &nbsp&nbspCO:&nbsp</label><input type="text" size="7" id="10B_CO"><label> &nbsp&nbspLEL:&nbsp</label><input type="text" size="7" id="10B_LEL"> <br>
    <input type="checkbox" id="10C_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="10C_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="10C_check3"> <label> Es necesario purgar equipos o sistema</label><br>
    <input type="checkbox" id="10D_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="10D_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="10D_check3"> <label> El operador que ingrese deberá llevar arnés, amarrado a una soga</label><br>
    <input type="checkbox" id="10E_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="10E_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="10E_check3"> <label> Se necesita ventilación forzada</label><br>
    <input type="checkbox" id="10F_check1">&nbsp&nbsp&nbsp<input type="checkbox" id="10F_check2">&nbsp&nbsp&nbsp<input type="checkbox" id="10F_check3"> <label> Se necesita iluminación en 24 volts</label>

  </div>

  <div class="section">
    <label><strong>XI. CIRCUITO CON FLUIDOS:</strong></label>
    <div class="rows">
      <label><input type="checkbox" id="11vapor_check"> Vapor </label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="11aguacaliente_check"> Agua caliente</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="11condensados_check"> Condensados</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="11aguafria_check"> Agua fría</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="11aire_check"> Aire</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="11sodacautica_check"> Soda cáustica</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="11amoniaco_check"> Amoníaco</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="11acidosulfurico_check"> Ácido sulfúrico</label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="11medicionestrestermico_check"> Medición Estres Térmico </label>&nbsp&nbsp&nbsp
      <label><input type="checkbox" id="11actualizarquimicos_check"> Actualizar Químicos Comasa</label>&nbsp&nbsp&nbsp
    </div><br>
    Temperatura en la línea es: &nbsp<input type="checkbox" id="11temperaturaalta_check"> Alta > 40°C &nbsp&nbsp&nbsp
                                     <input type="checkbox" id="11temperaturabaja_check"> Baja < 40°C<br><br>
    La línea se encuentra: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" id="11lineapresurizada_check"> Presurizada &nbsp&nbsp&nbsp 
                                                                         <input type="checkbox" id="11lineaincomunicada_check"> Incomunicada &nbsp&nbsp&nbsp
                                                                         <input type="checkbox" id="11lineapurgada_check"> Purgada &nbsp&nbsp&nbsp
                                                                         <input type="checkbox" id="11lineaabierta_check"> Abierta a la Atmósfera<br><br>
                                                                         <input type="checkbox" id="11bloqueovalvula_check"> Bloqueo de válvula con cadena y candado Nº: <input type="text" id="11bloqueovalvula_num">
  </div>

  <div class="section">
    <label><strong>XII. Este trabajo requiere autorización de prevención de riesgos:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</strong></label>
    <input type="checkbox" id="prevencion_si"> Sí &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" id="prevencion_no"> No
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





</form>



  </div>
    <div class="rows">
      <div class="modal-footer">
        <button type="button" class="btn btn-success data-toggle=button"  title="Guardar" onclick="guardar_actualizar()">GUARDAR O ACTUALIZAR</button>
        <button type="button" class="btn btn-primary data-toggle=button" d="boton_guarda_diario" title="Guardar" onclick="imprimir_permiso()">IMPRIMIR</button>
      </div>
  </div>


    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script src="script/permiso.js"></script>