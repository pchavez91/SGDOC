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

.fadeout{
  opacity: 0;
}

 .table { width: 100%; max-width: none; // >= this is very important } 
 
    body:not(.modal-open) {
        padding-right: 0px !important;
    }
    
    .nav > li > a:hover,
    .nav > li > a:focus {
        background-color: #ABEBC6;
        text-decoration: none;
    }
    
    .btn-success2 {
        color: #fff;
        background-color: #65CEA7;
        border-color: #65CEA7;
    }
    
    .panel-default > .panel-heading {
        background-color: #007bff;
        border-color: #424F63;
        color: #fff;
    }
    
    .modal {
        overflow: scroll !important;
    }
    
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid blue;
        border-bottom: 16px solid blue;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
        margin-right: auto;
        margin-left: auto;
    }
    
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }
    
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }


.select2-container .select2-selection--single { 
  height: 34px !important;
}

.select2-selection__rendered {
    line-height: 3.3rem !important;
}

.buttons-excel{
    color:#fff;
    background-color:#30a5ff;
    border-color:#30a5ff;
}

.dataTables_filter{
  display: none;
}

  .icono-ayuda {
    width: 50px;
    height: 40px;
    cursor: pointer;
    position: absolute;
    top: -2px;
    right: -2px;
  }

</style>

<HEAD>
<meta http-equiv="Expires" content="0">
 
<meta http-equiv="Last-Modified" content="0">
 
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 
<meta http-equiv="Pragma" content="no-cache">
       
<div class="panel panel-info">
 
    <div class="panel box-shadow-none content-header margin-topbar">
        <div class="form-group col-xs-12 col-lg-12" style="background-color: #39b3d7; border: 1px solid; border-color:#269abc; padding: 10px 3px 10px 5px; line-height: 15px; top:-15px;">
            <!--colocar al estilo-->
            <b><font size=3 color="white"><center>SOLICITUD DE CÓDIGO</center></font></b>
            <img id="btnAyuda" onclick="abre_modal_ayuda()" src="IMAGENES/ayuda.png" alt="Ayuda" class="icono-ayuda" title="¿Necesitas ayuda?">
        </div>
    </div>

    <div class="panel-body">
  

  <div class="row col-lg-5">
        <legend  class="w-auto">Datos del Documento</legend>
  
          <div class="form-group input-group col-lg-12 val_error"><span class="input-group-addon">Nombre del Documento:</span>
            <input type="text" class="form-control" id="nombre_documento" >
          </div>

          <input type="hidden" class="form-control" id="version" value="00" >

          <!--
          <div class="form-group input-group col-lg-12 val_error"><span class="input-group-addon">Versión:</span>
            <input type="text" class="form-control" id="version" >
          </div>
        -->
          <div class="form-group input-group col-lg-12 val_error"><span class="input-group-addon">Resumen Contenido:</span>
             <textarea class="form-control" id="resumen_contenido" rows="6" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"></textarea>
          </div>

          
  
  </div>
  <div class="row col-lg-1"></div>
  <div class="row col-lg-6">
      <legend  class="w-auto">Ubicación en el directorio</legend>

                    <div class="form-group input-group col-xs-12 col-lg-12 val_error"><span class="input-group-addon">Repositorio:</span>
                            <select class="form-control" id="combo_repositorio" onchange="buscar_area(document.getElementById('combo_repositorio').value)" ></select>
                    </div>


                    <div class="form-group input-group col-xs-12 col-lg-12 val_error"><span class="input-group-addon">Área:</span>
                            <select class="form-control" id="combo_area"  onchange="buscar_departamento(document.getElementById('combo_area').value)" ></select>
                    </div>


                    <div class="form-group input-group col-xs-12 col-lg-12 val_error"><span class="input-group-addon" id="nombre_sistemas">Departamento:</span>
                            <select class="form-control" id="combo_departamento" onchange="busca_tipo_documento(document.getElementById('combo_departamento').value)"></select>
                    </div>
  

                    <div class="form-group input-group col-xs-12 col-lg-12 val_error"><span class="input-group-addon" id="nombre_subsistemas">Tipo de Documento:</span>
                            <select class="form-control" id="combo_tipo_documento" onchange="busca_ultimo_nivel(document.getElementById('combo_tipo_documento').value)"></select>
                    </div>

                  
                    <div id="este_combo" >
                      <div class="form-group input-group col-xs-12 col-lg-12 val_error"><span class="input-group-addon">Tipo de Documento:</span>
                            <select class="form-control" id="combo_ultimo_nivel"></select>
                    </div>
                      
                    </div>

                    
                    
                   <!-- <button type="button" class="btn btn-success" onclick="enviar_solicitud()">-->
                    <button type="button" class="btn btn-success" onclick="generar_codigo()">
                  <span class="glyphicon glyphicon-refresh"></span> CREAR CODIGO</button>

       
    </div>
                            
  </div>
</div>  

<script src="../fracttal_comasa/js/jquery.inputmask.bundle.js"></script>
<script src="../fracttal_comasa/bootbox.min.js"></script>
<link href="../fracttal_comasa/css/toastr.css" rel="stylesheet"/>
<!-- <link href="http://codeseven.github.com/toastr/toastr-responsive.css" rel="stylesheet"/> -->
<script src="../fracttal_comasa/js/toastr.js"></script>

<script src="script/infografia.js"></script>

  <!-- VENTANA AYUDA-->
  <div id="ventana_de_ayuda" class="modal fade">
    <div class="modal-dialog" style="width: 800px; max-width: 100%;">
      <div class="modal-content" style="border-radius: 10px;">
      
        <div class="modal-header" style="background-color: #39b3d7; color: white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center;">SOLICITUD DE CODIGO</h4>
        </div>

        <div class="modal-body" style="padding: 20px;">

          <!-- Paso 1 -->
          <div id="paso1">
            <p><b>Completa el formulario con los datos necesarios para tu documento</b></p>
            
            <img src="IMAGENES/solicitud_codigo_1.png" style="width: 100%; height: auto;">
          </div>

          <!-- Paso 2 -->
          <div id="paso2" style="display: none;">
            <p><b>Despues de completar el formulario presiona el boton de generar codigo</b></p>
            
            <img src="IMAGENES/solicitud_codigo_2.png" style="width: 100%; height: auto;">
          </div>

          <!-- Paso 3 -->
          <div id="paso3" style="display: none;">
            <ul>
              <li>Despues de confirmar todos los datos presiona el boton "reservar y enviar por correo".</li>
              <li>Recibirás un correo con tu nuevo código.</li>
            </ul>
            <img src="IMAGENES/solicitud_codigo_3.png" style="width: 100%; height: auto;">
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


 <!-- VENTANA CODIGO ARCHIVO -->
<div id="ventana_nuevo_codigo" class="modal fade">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <input type="hidden" id="correlativo_directorio" value="0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <center> <h4 class="modal-title"><label>CODIGO GENERADO</label></h4></center>
      </div>
      <!-- <div class="modal-body"> -->
    <form action="#" method="post" role="form">
        <div class="rows">
         <div class="form-group col-xs-12 col-lg-12">
                   <strong id="nick_solicitante"></strong><BR>
                    <strong id="correo_solicitante"></strong>
            </div> 
    
            <div class="form-group col-xs-12 col-lg-12">
                   <label id="directorio_codigo"></label> 
                   <input type="text" class="form-control" name="codigo_generado"  id="codigo_generado" readonly >
            </div>  
            <BR><BR>    
      </div>
    </form>
 </br></br></br>
      <!-- </div> -->
    <div class="rows">
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="reservar_codigo()"><span class="glyphicon glyphicon-envelope"></span> RESERVAR Y ENVIAR POR CORREO</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
  </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- FIN CODIGO ARCHIVO-->



<script type="text/javascript">

$(".val_error").click(function(){  $(this).removeClass("has-error");//$(this).css("color", "#333");
});

function parent_error(id){
  //$(id).parent().css({"color": "red"}); TEXTO
  $(id).parent().addClass("has-error");
}



function reservar_codigo(){
    if($("#combo_repositorio").val()=='3846'){
      var id_directorio = $("#combo_ultimo_nivel").val();
    }else{
      var  id_directorio = $("#combo_tipo_documento").val();
    }

    var codigo_directotio = $("#codigo_directotio").val();
    var correlativo_directorio = $("#correlativo_directorio").val();
    var codigo_generado = $("#codigo_generado").val();
    var ruta_directorio = $("#ruta_directorio").html();



    $.ajax({
          url:'json/json.php?accion=reservar_codigo_automatico',
          data:{id_directorio:id_directorio,
                codigo_directotio:codigo_directotio,
                correlativo_directorio:correlativo_directorio,
                codigo_generado:codigo_generado},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {
               if(json_jax[0].success=='true'){

                recibir_automaticamente();

                $("#ventana_nuevo_codigo").modal('hide');
                alert(json_jax[0].codigo);

               }
            }
    });

}


function generar_codigo(){

 var nombre_documento = $("#nombre_documento").val();
 var version = $("#version").val();


 if(nombre_documento==''){
            alert('Debe ingresar un nombre para el documento');
            document.getElementById("nombre_documento").focus();
            return;
}

 if(version==''){
            alert('Debe ingresar una versión para el documento');
            document.getElementById("version").focus();
            return;
}


    if($("#combo_repositorio").val()=='3846'){
      var id_directorio = $("#combo_ultimo_nivel").val();
    }else{
      var  id_directorio = $("#combo_tipo_documento").val();
    }

    if(id_directorio!='0'){

        $.ajax({
              url:'json/json.php?accion=generar_codigo',
              data:{id_directorio:id_directorio},
              type:'post',
              dataType: "json", 
              success: function (data)
                {

                      if(data[0].success=='false'){

                        alert(data[0].codigo);

                      }else{

                        var directorio_codigo = $("#ruta_directorio").html();
                         $("#nick_solicitante").html(data[0].nick_solicitante);
                         $("#correo_solicitante").html(data[0].correo_solicitante);
                         $("#directorio_codigo").html(directorio_codigo);
                         $("#codigo_generado").val(data[0].codigo+'-'+version);
                         $("#correlativo_directorio").val(data[0].correlativo);
                        $("#ventana_nuevo_codigo").modal('show');

                      } 
                        

                }
        });


    }else{
        alert('ERROR: Debe almenos ingresar a un directorio');
    }


}


function buscar_area(cod_repositorio){  

$("#combo_area").html(""); 
$("#combo_tipo_documento").html(""); 
$("#combo_departamento").html("");
$("#combo_ultimo_nivel").html(""); 


if(cod_repositorio=='3845'){

  $("#nombre_sistemas").html("Departamento:"); 
  $("#nombre_subsistemas").html("Tipo de Documento:"); 
 document.getElementById("este_combo").style.display = "none";

}else{

  $("#nombre_sistemas").html("Sistemas:"); 
  $("#nombre_subsistemas").html("Activos:"); 

 document.getElementById("este_combo").style.display = "block";
}



$.ajax({
      url:'json/json.php?accion=consulta_directorio_adelante_general',
      data:{id_directorio:cod_repositorio},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {
      
            $("#combo_area").append("<option value='' disabled selected hidden>Seleccione Área....</option>");   
      
                for (var i = 0; i < json_jax.data.length; i++) {
            
                $("#combo_area").append('<option value="'+json_jax.data[i].id+'">'+json_jax.data[i].nombre_elemento+'</option>');
                
          }

            }
    });
  
}



function combos_inicio(){ 

$("#combo_repositorio").html(""); 
$("#combo_tipo_documento").html(""); 


    $.ajax({
          url:'json/json.php?accion=consulta_directorio_adelante_general',
          data:{id_directorio:'3844'},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {
      
      $("#combo_repositorio").append("<option value='' disabled selected hidden>Seleccione Repositorio....</option>");   
      
                for (var i = 0; i < json_jax.data.length; i++) {
            
                $("#combo_repositorio").append('<option value="'+json_jax.data[i].id+'">'+json_jax.data[i].nombre_elemento+'</option>');
                
        }

            }
    });



}



function busca_ultimo_nivel(subsistema){


  $("#combo_ultimo_nivel").html(""); 

  $.ajax({
          url:'json/json.php?accion=consulta_directorio_adelante_general',
          data:{id_directorio:subsistema},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {
      
      $("#combo_ultimo_nivel").append("<option value='' disabled selected hidden>Seleccione....</option>");   
      
                for (var i = 0; i < json_jax.data.length; i++) {
            
                $("#combo_ultimo_nivel").append('<option value="'+json_jax.data[i].id+'">'+json_jax.data[i].nombre_nomesclatura+'</option>');
                
        }

            }

       });
}
  


function busca_tipo_documento(codigo_departamento){


  $("#combo_tipo_documento").html(""); 
  $("#combo_ultimo_nivel").html(""); 

  $.ajax({
          url:'json/json.php?accion=consulta_directorio_adelante_general',
          data:{id_directorio:codigo_departamento},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {
      
      $("#combo_tipo_documento").append("<option value='' disabled selected hidden>Seleccione....</option>");   
      
                for (var i = 0; i < json_jax.data.length; i++) {
            
                $("#combo_tipo_documento").append('<option value="'+json_jax.data[i].id+'">'+json_jax.data[i].nombre_nomesclatura+'</option>');
                
        }

            }

       });
}
  

function buscar_departamento(cod_area){ 

$("#combo_departamento").html(""); 
$("#combo_tipo_documento").html(""); 
$("#combo_ultimo_nivel").html(""); 


$.ajax({
          url:'json/json.php?accion=consulta_directorio_adelante_general',
      data:{id_directorio:cod_area},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {
      
          $("#combo_departamento").append("<option value='' disabled selected hidden>Seleccione ....</option>");   
      
                for (var i = 0; i < json_jax.data.length; i++) {
            
                $("#combo_departamento").append('<option value="'+json_jax.data[i].id+'">'+json_jax.data[i].nombre_elemento+'</option>');
                
        }

            }
    });
  
} 

function enviar_solicitud(){  

var cont=0;
    
    if($("#combo_repositorio").val() == '' || $("#combo_repositorio").val()  == null) { 
             cont = 1;
             parent_error("#combo_repositorio");    
            }
    if($("#nombre_documento").val() == '' || $("#nombre_documento").val()  == null) { 
             cont = 1;
             parent_error("#nombre_documento");   
            }
    if($("#combo_tipo_documento").val() == '' || $("#combo_tipo_documento").val()  == null) { 
             cont = 1;
             parent_error("#combo_tipo_documento");   
            }
    if($("#combo_area").val() == '' || $("#combo_area").val()  == null) { 
             cont = 1;
             parent_error("#combo_area");   
            }
    if($("#combo_departamento").val() == '' || $("#combo_departamento").val()  == null) { 
             cont = 1;
             parent_error("#combo_departamento");   
            }
    if($("#version").val() == '' || $("#version").val()  == null) { 
             cont = 1;
             parent_error("#version");    
            }
    if($("#resumen_contenido").val() == '' || $("#resumen_contenido").val()  == null) { 
             cont = 1;
             parent_error("#resumen_contenido");    
            } 

var id_repositorio = $("#combo_repositorio").val();


if(id_repositorio=='4'){
    if($("#combo_ultimo_nivel").val() == '' || $("#combo_ultimo_nivel").val()  == null) { 
             cont = 1;
             parent_error("#combo_ultimo_nivel");    
            }
}


var repositorio    = document.getElementById("combo_repositorio");
var tipo_documento = document.getElementById("combo_tipo_documento");
var area           = document.getElementById("combo_area");
var departamento   = document.getElementById("combo_departamento");
var combo_ultimo_nivel   = document.getElementById("combo_ultimo_nivel");


    

if(cont == 0){  

      var dialog = bootbox.dialog({
      message: '<p class="loader"></p>',
      closeButton: false
      }); 
      
   $.ajax({
      url:'json/solicitud_codigo.php?accion=enviar_correo',
      data:{
        id_repositorio : id_repositorio,
        repositorio:      repositorio.options[repositorio.selectedIndex].text,
        nombre_documento: document.getElementById("nombre_documento").value,
        tipo_documento:   tipo_documento.options[tipo_documento.selectedIndex].text,
        area:             area.options[area.selectedIndex].text,
        departamento:     departamento.options[departamento.selectedIndex].text,
        version:          document.getElementById("version").value,
        resumen_contenido:document.getElementById("resumen_contenido").value,
        combo_ultimo_nivel: combo_ultimo_nivel.options[combo_ultimo_nivel.selectedIndex].text
        },
      type: "POST",
      contentType: "application/x-www-form-urlencoded",
      dataType: "json",
      success: function(data){
        if(data != null && $.isArray(data)){
          $.each(data, function(index, value){
              
              dialog.modal('hide');
              
              toastr.success('Datos Ingresados Correctamente', 'AVISO');
                  $(".val_error").removeClass("has-error");
              
              combos_inicio();
              
              document.getElementById("nombre_documento").value='';
              $("#combo_area").html(""); 
              $("#combo_departamento").html(""); 
              document.getElementById("version").value='';
              document.getElementById("resumen_contenido").value='';
              $("#combo_ultimo_nivel").html("");  
              
            });
    
  
          }
        }
      })    
          
}         
          
} 





function recibir_automaticamente(){  

var cont=0;
    
    if($("#combo_repositorio").val() == '' || $("#combo_repositorio").val()  == null) { 
             cont = 1;
             parent_error("#combo_repositorio");    
            }
    if($("#nombre_documento").val() == '' || $("#nombre_documento").val()  == null) { 
             cont = 1;
             parent_error("#nombre_documento");   
            }
    if($("#combo_tipo_documento").val() == '' || $("#combo_tipo_documento").val()  == null) { 
             cont = 1;
             parent_error("#combo_tipo_documento");   
            }
    if($("#combo_area").val() == '' || $("#combo_area").val()  == null) { 
             cont = 1;
             parent_error("#combo_area");   
            }
    if($("#combo_departamento").val() == '' || $("#combo_departamento").val()  == null) { 
             cont = 1;
             parent_error("#combo_departamento");   
            }
    if($("#version").val() == '' || $("#version").val()  == null) { 
             cont = 1;
             parent_error("#version");    
            }
    if($("#resumen_contenido").val() == '' || $("#resumen_contenido").val()  == null) { 
             cont = 1;
             parent_error("#resumen_contenido");    
            } 

var id_repositorio = $("#combo_repositorio").val();


if(id_repositorio=='4'){
    if($("#combo_ultimo_nivel").val() == '' || $("#combo_ultimo_nivel").val()  == null) { 
             cont = 1;
             parent_error("#combo_ultimo_nivel");    
            }
}


var repositorio    = document.getElementById("combo_repositorio");
var tipo_documento = document.getElementById("combo_tipo_documento");
var area           = document.getElementById("combo_area");
var departamento   = document.getElementById("combo_departamento");
var combo_ultimo_nivel   = document.getElementById("combo_ultimo_nivel");
var codigo_generado_automaticamente = $("#codigo_generado").val();

    

if(cont == 0){  

      var dialog = bootbox.dialog({
      message: '<p class="loader"></p>',
      closeButton: false
      }); 
      
   $.ajax({
      url:'json/json.php?accion=enviar_correo_codigo_automatico',
      data:{
        id_repositorio : id_repositorio,
        repositorio:      repositorio.options[repositorio.selectedIndex].text,
        nombre_documento: document.getElementById("nombre_documento").value,
        tipo_documento:   tipo_documento.options[tipo_documento.selectedIndex].text,
        area:             area.options[area.selectedIndex].text,
        departamento:     departamento.options[departamento.selectedIndex].text,
        version:          document.getElementById("version").value,
        resumen_contenido:document.getElementById("resumen_contenido").value,
        combo_ultimo_nivel: combo_ultimo_nivel.options[combo_ultimo_nivel.selectedIndex].text,
        codigo_generado_automaticamente:codigo_generado_automaticamente
        },
      type: "POST",
      contentType: "application/x-www-form-urlencoded",
      dataType: "json",
      success: function(data){
        if(data != null && $.isArray(data)){
          $.each(data, function(index, value){
              
              dialog.modal('hide');
              
              toastr.success('Codigo reservado y en proceso de envío.......', 'AVISO');
                  $(".val_error").removeClass("has-error");
              
              combos_inicio();
              
              document.getElementById("nombre_documento").value='';
              $("#combo_area").html(""); 
              $("#combo_departamento").html(""); 
              document.getElementById("version").value='';
              document.getElementById("resumen_contenido").value='';
              $("#combo_ultimo_nivel").html("");  
              
            });
    
  
          }
        }
      })    
          
}         
          
} 










combos_inicio();

</script>

