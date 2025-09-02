<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .icono-ayuda {
      width: 50px;
      height: 40px;
      cursor: pointer;
      position: absolute;
      top: -2px;
      right: -2px;
    }

  </style>




<link href="../../css/style.css" rel="stylesheet">
</head>
  
<body class="sticky-header left-side-collapsed">

  <div class="panel box-shadow-none content-header margin-topbar">
      <div class="form-group col-xs-12 col-lg-12" 
           style="background-color: #39b3d7; border: 1px solid; border-color:#269abc; padding: 10px 3px 10px 5px; line-height: 15px; top:-15px;">
          
          <b><font size=3 color="white">
              <center id="tituloBarra">PUBLICAR DOCUMENTO</center>
          </font></b>
          <img id="btnAyuda" onclick="abre_modal_ayuda()" src="IMAGENES/ayuda.png" alt="Ayuda" 
               class="icono-ayuda" title="¿Necesitas ayuda?">
      </div>
  </div>

  <div class="form_empresa">
      <div class="panel panel-default">
        <div class="panel-body">

          <ul class="nav nav-tabs">
              <li class="active col-lg-6">
                  <a class="btn btn-success" data-toggle="tab" href="#tab_principal1" 
                     id="id2_tab11" onclick="carga_tabla_archivos(); actualizarBarra('PUBLICAR DOCUMENTO');">
                     PUBLICAR DOCUMENTO
                  </a>
              </li>
              <li class="col-lg-6">
                  <a class="btn btn-success" data-toggle="tab" href="#tab_principal2" 
                     id="id2_tab22" onclick="tabla_archivos_publicados(); actualizarBarra('DOCUMENTOS PUBLICADOS');">
                     DOCUMENTOS PUBLICADOS
                  </a>
              </li>
          </ul>            

          <div class="tab-content">
              <div id="tab_principal1" class="tab-pane active">
                  <div class="panel-body">
                        <!-- Eliminado el título repetido -->
                        <div class="col-xs-12 col-lg-12">
                              <table id="tabla_lista_archivos" class="display nowrap" width="100%">
                                  <thead>
                                      <tr>
                                          <th>Nombre Archivo</th>
                                          <th>Código</th>
                                          <th>Subido</th>
                                          <th>Ubicación</th>
                                          <th>Aprobado por</th>
                                          <th>F Aprob</th>
                                          <th></th>
                                          <th></th>
                                          <th></th>
                                      </tr>
                                  </thead>
                              </table>
                        </div>
                  </div>
              </div>  
              
              <div id="tab_principal2" class="tab-pane fade">
                  <div class="panel-body">
                        <div class="row">
                              <!-- Eliminado el título repetido -->
                              <div class="col-xs-12 col-lg-12">
                                  <table id="tabla_archivos_publicados" class="display nowrap" width="100%">
                                      <thead>
                                          <tr>
                                              <th>Nombre Archivo</th>
                                              <th>Código</th>
                                              <th>Subido</th>
                                              <th>Ubicación</th>
                                              <th>Aprobado por</th>
                                              <th>F Aprob</th>
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
      </div>
  </div>

  <script>
    function actualizarBarra(titulo) {
        document.getElementById("tituloBarra").innerText = titulo;
    }
  </script>
</body>

<script src="script/infografia.js"></script>

  <!-- VENTANA AYUDA-->
  <div id="ventana_de_ayuda" class="modal fade">
    <div class="modal-dialog" style="width: 800px; max-width: 100%;">
      <div class="modal-content" style="border-radius: 10px;">
      
        <div class="modal-header" style="background-color: #39b3d7; color: white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center;">PUBLICAR DOCUMENTO</h4>
        </div>

        <div class="modal-body" style="padding: 20px;">

          <!-- Paso 1 -->
          <div id="paso1">
            <p><b>Pasos para la publicación</b></p>
            <p><b>En tu lista de "publicar documento" tienes los botones para poder aceptar el documento.</b></p>
            
            <img src="IMAGENES/publicar_documento_1.png" style="width: 100%; height: auto;">
          </div>

          <!-- Paso 2 -->
          <div id="paso2" style="display: none;">
            <p><b>Paso 2: Se abre una ventana emergente</b></p>
            <p></p>
            <ul>
              <li></li>
            </ul>
            <img src="Iimagen.png" style="width: 100%; height: auto;">
          </div>

          <!-- Paso 3 -->
          <div id="paso3" style="display: none;">
            <p><b>Paso 3: Navega por la jerarquía</b></p>
            <ul>
              <li></li>
            </ul>
            <img src="IM.png" style="width: 100%; height: auto;">
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
            <h4 class="modal-title"><center>RECHAZA PUBLICACIÓN DE DOCUMENTO</center></h4>
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


<script src="script/publicar_documento.js"></script>

</html>