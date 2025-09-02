<!DOCTYPE html>
<html lang="en">
<head>
<link href="../../css/style.css" rel="stylesheet">

  <style>
    .icono-ayuda {
      width: 50px;
      height: 42px;
      cursor: pointer;
      position: absolute;
      top: -1px;
      right: -2px;
    }
  </style>
</head>
	
<body class="sticky-header left-side-collapsed">
  <br>
  <div class="form-group col-xs-12 col-lg-12" style="background-color: #39b3d7; border: 1px solid; border-color:#269abc; padding: 10px 3px 10px 5px; line-height: 15px; top:-15px;">
    <b><font size=3 color="white">
      <center>
        <input type="hidden" id="id_directorio" value="0">
        <label id="ruta_directorio"></label>
      </center></font></b>
    <img id="btnAyuda" onclick="abre_modal_ayuda()" src="IMAGENES/ayuda.png" alt="Ayuda" class="icono-ayuda" title="¿Necesitas ayuda?">
  </div>

    <div class="form_empresa">
    	<div class="panel panel-default">
    		<div class="panel-body">
    			<div class="form-group col-xs-3 col-lg-6">
            <button type="button" class="btn" 
                    style="margin: 0px 0; padding: 8px 16px; background: linear-gradient(90deg, #0055aa, #0077cc);
                          color: white; border: none; border-radius: 6px; font-weight: bold; font-size: 14px; box-shadow: 0 2px 6px rgba(0,0,0,0.2);
                          cursor: pointer; transition: background 0.3s ease;" data-dismiss="modal" onclick="salir_directorio()">
              ← Volver
            </button>
    			</div>
          <div class="form-group col-xs-3 col-lg-2">
            <button type="button" class="btn btn-success" data-dismiss="modal" onclick="generar_codigo()">Generar Código</button>
          </div>
    			<div class="form-group col-xs-3 col-lg-2">
    				<button type="button" class="btn btn-info" data-dismiss="modal" onclick="crea_carpeta()">Crear Carpeta</button>
    			</div>
          <div class="form-group col-xs-3 col-lg-2">
            <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="listar_codigos()">Lista de códigos</button>
          </div>			
			  </div>
	    </div>
    </div>
	</div>

	<div class="form_empresa" id="directorio_principal">
		
	</div>
		
</body>
<script src="script/directorio.js"></script>
<script src="script/infografia.js"></script>




<!-- VENTANA NUEVA CARPETA -->
<div id="ventana_lista_codigos" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <center><h4 class="modal-title"><label id="">LISTA DE CODIGOS</label></h4></center>
            <h6 class="modal-title"><label id="directorio_codigos"></label></h6>
      </div>
      <!-- <div class="modal-body"> -->
    <form action="#" method="post" role="form" id="form_editar_descripcion">
      </br>
      <div class="rows">
            <div class="col-xs-12 col-lg-12">
                  <table id="tabla_lista_archivos" class="display nowrap" width="100%">
                      <thead>
                          <tr>
                          <th>CODIGOS</th>
                          <th>CREADO</th>
                          <th>OCUPADO</th>
                          <th></th>
                             
                          </tr>
                      </thead>
                  </table>
              </div>
   
      </div>
    </form>
 </br></br>
      <!-- </div> -->
    <div class="rows">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
  </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- FIN VENTANA NUEVA CARPETA -->




 <!-- VENTANA NUEVA CARPETA -->
<div id="ventana_nueva_carpeta" class="modal fade">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h6 class="modal-title"><label id="titulo_editar_nuevo"></label></h6>
      </div>
      <!-- <div class="modal-body"> -->
    <form action="#" method="post" role="form" id="form_nueva_carpeta">
    	</br>
      <div class="rows">
            <div class="form-group col-xs-9 col-lg-9">
              <label>Nombre Carpeta</label>
                   <input type="text" class="form-control" placeholder="Ej: Mi Carpeta..." name="nombre_nueva_carpeta"  id="nombre_nueva_carpeta" required="required" >
            </div>
            <div class="form-group col-xs-3 col-lg-3">
                   <label>Nomesclatura</label>
                   <input type="text" class="form-control" placeholder="EJ: MICARP..." name="nomesclatura_carpeta"  id="nomesclatura_carpeta" required="required" >
            </div>
            <input type="hidden" id="nivel_acceso" value="4">

            <!--
             <div class="form-group col-xs-3 col-lg-3">
                  <label>Nivel de Acceso</label>
                  <select class="form-control"  name="nivel_acceso" id="nivel_acceso" >
                            <option value="" disabled selected hidden>Seleccione</option>
                            <option value="4">TODOS</option>
                            <option value="3">GRTES-SUBGRTES-JEFES</option>
                            <option value="2">GRTES-SUBGRTES</option>
                            <option value="1">GERENTES</option>
                          </select>
            </div>
            -->
      </div>
    </form>
 </br></br></br>
      <!-- </div> -->
    <div class="rows">
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="crea_carpeta_directorio()">CREAR CARPETA</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
  </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- FIN VENTANA NUEVA CARPETA -->




 <!-- VENTANA EDITAR CARPETA -->
<div id="ventana_editar_carpeta" class="modal fade">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h6 class="modal-title"><label id="titulo_editar_carpeta"></label></h6>
      </div>
      <!-- <div class="modal-body"> -->
    <form action="#" method="post" role="form">
      <input type="hidden" id="id_directorio_editar">
      </br>
      <div class="rows">
            <div class="form-group col-xs-9 col-lg-9">
              <label>Nombre Carpeta</label>
                   <input type="text" class="form-control" name="nombre_editar_carpeta"  id="nombre_editar_carpeta" required="required" readonly>
            </div>
            <div class="form-group col-xs-3 col-lg-3">
                   <label>Nomesclatura</label>
                   <input type="text" class="form-control" name="editar_nomesclatura_carpeta"  id="editar_nomesclatura_carpeta" required="required" >
            </div>

            <input type="hidden" id="editar_nivel_acceso" value="4">
   
      </div>
    </form>
 </br></br></br>
      <!-- </div> -->
    <div class="rows">
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="editar_carpeta_directorio()">GUARDAR CAMBIOS</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
  </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- FIN VENTANA NUEVA CARPETA -->



 <!-- VENTANA CODIGO ARCHIVO -->
<div id="ventana_nuevo_codigo" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <input type="hidden" id="correlativo_directorio" value="0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><label>CODIGO GENERADO</label></h4>
      </div>
      <!-- <div class="modal-body"> -->
    <form action="#" method="post" role="form">
      </br>
      <div class="rows">
            <div class="form-group col-xs-12 col-lg-12">
                   <label id="directorio_codigo"></label> 
                   <input type="text" class="form-control" name="codigo_generado"  id="codigo_generado" >
            </div>      
      </div>
    </form>
 </br></br></br>
      <!-- </div> -->
    <div class="rows">
      <div class="modal-footer">
        <button type="button" class="btn btn-info" onclick="reservar_codigo()">RESERVAR CODIGO</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
  </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->

  <!-- VENTANA AYUDA-->
  <div id="ventana_de_ayuda" class="modal fade">
    <div class="modal-dialog" style="width: 800px; max-width: 100%;">
      <div class="modal-content" style="border-radius: 10px;">
      
        <div class="modal-header" style="background-color: #39b3d7; color: white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center;">EXPLORADOR DE ARCHIVOS</h4>
        </div>

        <div class="modal-body" style="padding: 20px;">

          <!-- Paso 1 -->
          <div id="paso1">
            <p><b>Generar código</b></p>
            <ul>
              <li>Paso 1: haz clic en Generar código</li>
              <li>Paso 2: completa el codigo a reservar</li>
              <li>Paso 3: presione en "reservar codigo" para guardar el codigo</li>
            </ul>
            <img src="IMAGENES/generar-codigo.png" style="width: 100%; height: auto;">
          </div>

          <!-- Paso 2 -->
          <div id="paso2" style="display: none;">
            <p><b>Crear carpeta</b></p>
            <ul>
              <li>Paso 1: haz clic en Crear carpeta</li>
              <li>Paso 2: ingresa el nombre de la nueva carpeta y agrega su nomesclatura</li>
              <li>Paso 3: presione en el boton crear carpeta para finalizar</li>
            </ul>
            <img src="IMAGENES/carpeta.png" style="width: 100%; height: auto;">
          </div>

          <!-- Paso 3 -->
          <div id="paso3" style="display: none;">
            <p><b>PLista de códigos</b></p>
            <ul>
              <li>Paso 1: Haz clic en Lista de códigos</li>
              <li>Paso 2: Se desplegará un listado con todos los códigos ya reservados</li>
              <li>Paso 3: Usa el buscador interno para encontrar entre los codigos reservados el| que necesitas</li>
            </ul>
            <img src="IMAGENES/lista-codigos.png" style="width: 73%; height: auto;">
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




 <!-- FIN CODIGO ARCHIVO-->


</html>