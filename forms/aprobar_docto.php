<!DOCTYPE html>
<html lang="en">
<head>
  <link href="../../css/style.css" rel="stylesheet">
  <style>
    .icono-ayuda {
      width: 50px;
      height: 40px;
      cursor: pointer;
      position: absolute;
      top: -2px;
      right: -1px;
    }
  </style>

</head>
  
<body class="sticky-header left-side-collapsed">

  <div class="form_empresa">
      <div class="panel panel-default">
        <div class="panel-body">

            <div class="form-group col-xs-12 col-lg-12" style="background-color: #39b3d7; border: 1px solid; border-color:#269abc; padding: 10px 3px 10px 5px; line-height: 15px; top:-15px;">
              <b><font size=3 color="white"><center>APROBAR DOCUMENTO</center></font></b>
              <img id="btnAyuda" onclick="abre_modal_ayuda()" src="IMAGENES/ayuda.png" alt="Ayuda" class="icono-ayuda" title="¿Necesitas ayuda?">
            </div>

            <div class="col-xs-12 col-lg-12">
                  <table id="tabla_lista_archivos" class="display nowrap" width="100%">
                      <thead>
                          <tr>
                          <th>Nombre Archivo</th>
                          <th>Código</th>
                          <th>Subido</th>
                          <th>Ubicación</th>
                          <th></th>
                          <th></th>
                          <th></th>
                             
                          </tr>
                      </thead>
                  </table>
              </div>

        </div>
      </div>
  </div>

    
</body>
<script src="script/infografia.js"></script>

  <!-- VENTANA AYUDA-->
  <div id="ventana_de_ayuda" class="modal fade">
    <div class="modal-dialog" style="width: 800px; max-width: 100%;">
      <div class="modal-content" style="border-radius: 10px;">
      
        <div class="modal-header" style="background-color: #39b3d7; color: white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center;">APROBAR DOCUMENTO</h4>
        </div>

        <div class="modal-body" style="padding: 20px; height: 500px; overflow-y: auto;">
          <!-- Paso 1 -->
          <div id="paso1">
            <p>Aqui podras ver un listado en una tabla donde salen los archivos para abrirlos, aprobarlos o rechazarlos</p>
            <img src="IMAGENES/aprobar_documento.png" style="max-width: 100%; max-height: 300px; object-fit: contain; display: block; margin: auto;">
          </div>

          <!-- Paso 2 -->
          <div id="paso2" style="display: none;">
            <p><b>Aprobar documento</b></p>
            <p>En esta seccion decides quien puede ver el documento aprobado</p> 
            
            <img src="IMAGENES/aprobar_documento_1.png" style="max-width: 100%; max-height: 300px; object-fit: contain; display: block; margin: auto;">
          </div>

          <!-- Paso 3 -->
          <div id="paso3" style="display: none;">
            <p><b>Rechazar documento</b></p>
            <p>Aqui dejas un pequeño comentario de porque rechazas el documento.</p>
            <img src="IMAGENES/publicar_documento__rechazo.png" style="max-width: 100%; max-height: 300px; object-fit: contain; display: block; margin: auto;">
          </div>

        </div>

        <!-- Controles de navegación -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="btnAnterior" onclick="cambiarPaso(-1)">Anterior</button>
          <button type="button" class="btn btn-primary" id="btnSiguiente" onclick="cambiarPaso(1)">Siguiente</button>
          </div>

      </div>
    </div>
  </div>



 <!-- VENTANA NUEVA CARPETA -->
<div id="ventana_rechazar_documento" class="modal fade">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><center>RECHAZAR DOCUMENTO</center></h4>
      </div>
      <!-- <div class="modal-body"> -->
    <form action="#" method="post" role="form" id="form_nueva_carpeta">
      <input type="hidden"  id="id_archivo_rechazo">
      <input type="hidden"  id="nombre_archivo_rechazo">
      <br>
      <div class="rows">
            <div class="form-group col-xs-12 col-lg-12">
              <label>Indique motivo de rechazo:</label>
                   <input type="text" class="form-control" name="motivo_de_rechazo_archivo"  id="motivo_de_rechazo_archivo" required="required" >
            </div>

      </div>
    </form>
 </br></br></br>
      <!-- </div> -->
    <div class="rows">
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="rechazar_documento()">CONFIRMAR</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
  </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- FIN VENTANA NUEVA CARPETA -->



 <!-- VENTANA NUEVA CARPETA -->
<div id="ventana_aprobar_documento" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><center>SELECCIÓN DE PERFIL DE VISUALIZACIÓN</center></h4>
      </div>
      <!-- <div class="modal-body"> -->
    <form action="#" method="post" role="form" id="form_nueva_carpeta">
      <input type="hidden"  id="id_archivo_aprueba">
      <input type="hidden"  id="nombre_archivo_aprueba">
      <br>
      <div class="rows">
            <div class="form-group col-xs-12 col-lg-12">
              
              <strong>Archivo : </strong><label id="nombre_de_documento_permiso"></label><br><br>
              <strong>Seleccione, quienes puedrán ver o tener acceso a este documento:</strong>
                   <select class="form-control"  name="nivel_acceso" id="nivel_acceso" >
                            <option value="" disabled selected hidden></option>
                            <option value="4">TODOS</option>
                            <option value="3">SOLO GERENTES-SUBGRTES-JEFES DE AREA</option>
                            <option value="2">SOLO GERENTES-SUBGRTES</option>
                            <option value="1">SOLO GERENTES</option>
                  </select>
            </div>

      </div>
    </form>
 </br></br></br></br></br>
      <!-- </div> -->
    <div class="rows">
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="aprobar_documento()">CONFIRMAR APROBACIÓN</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
  </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- FIN VENTANA NUEVA CARPETA -->




<script src="script/aprobar_docto.js"></script>

</html>