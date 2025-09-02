
  $(document).ready( function () {
  
		  $("input").on("keypress", function () {
		   $input=$(this);
		   setTimeout(function () {
			$input.val($input.val().toUpperCase());
		   },50);
		  });
		      				
 })
 
$(".val_error").click(function(){  $(this).removeClass("has-error");//$(this).css("color", "#333");
});

function parent_error(id){
  //$(id).parent().css({"color": "red"}); TEXTO
  $(id).parent().addClass("has-error");
}

function confirmar_archivo(adjunto,numero_arreglo,total_arreglo){


var cont=0;

    var nombre_archivo = $("#nombre_archivo").val();
    var codigo_en_directorio = $("#codigo_en_directorio").val();
    var ubicacion = $("#ubicacion").val();

        if(nombre_archivo ==''){
					     cont = 1;
						 parent_error("#nombre_archivo");
						 }
						 
						 
        if(codigo_en_directorio ==''){ 	
	                     cont = 1;
						 parent_error("#codigo_en_directorio");						 
						 }
						 
        if(ubicacion =='' || ubicacion== null){
	                     cont = 1;
						 parent_error("#ubicacion");
						 }

		if(adjunto == '') { 
		   cont = 1;	  
        }
		
if(cont == 0){		

	        var dialog = bootbox.dialog({
			message: '<p class="loader"></p>',
			closeButton: false
			});
			
    $.ajax({
          url:'json/json.php?accion=guardar_documento',
          data:{
			    nombre_archivo:nombre_archivo,
                codigo_en_directorio:codigo_en_directorio,
                ubicacion:ubicacion,
                archivo:adjunto
				},
    type: "POST",
    contentType: "application/x-www-form-urlencoded",
    dataType: "json",
    success: function(data){
        if(data != null && $.isArray(data)){
            $.each(data, function(index, value){	

				dialog.modal('hide');
				
				if(value.success == 'true'){
			 
				toastr.success(value.mensaje, 'AVISO');
				$(".val_error").removeClass("has-error");
		
				$("#archivos_subidos").html('');
				document.getElementById("archivo").value='';	
				document.getElementById("doc_adjunto").value='';
				$("#respuesta").removeClass('alert-success').removeClass('alert-danger').html('');
				document.getElementById("respuesta").style.display = "none";
				
				 carga_tabla_archivos(); 
				 document.getElementById('formulario_subir_archivos').reset();
				 $('#ventana_subir_archivo').modal('hide');
				
				}else{
					
				toastr.warning(value.mensaje, 'AVISO');	
					
				}
			
		
        });
		
		// limpiar();
		 // $('#crear_modal').modal('hide');

	
        }
    }
    });


}

}



function abre_ventana_subir_archivo(){

    document.getElementById('formulario_subir_archivos').reset();
	    $(".val_error").removeClass("has-error");
		
		$("#archivos_subidos").html('');
		document.getElementById("archivo").value='';	
		document.getElementById("doc_adjunto").value='';
		$("#respuesta").removeClass('alert-success').removeClass('alert-danger').html('');
		document.getElementById("respuesta").style.display = "none";
				
    $("#ventana_subir_archivo").modal('show');
	//$('.modal-dialog').css('width', '50%');

}


function visualizar_archivo(nombre_archivo){

         // Abrir nuevo tab
        var win = window.open('archivos_subidos/'+nombre_archivo, '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();

}

function eliminar_archivo(id_archivo,nombre_elemento){


          confirmar=confirm("DESEA ELIMINAR DEFINITIVAMENTE EL ARCHIVO: "+nombre_elemento); 
          if (confirmar) {

             $.ajax({
                      url:'json/json.php?accion=eliminar_archivo',
                      data:{id_archivo:id_archivo},
                      type:'post',
                      dataType: "json", 
                      success: function (json_jax)
                        {
                  
                            carga_tabla_archivos();
                        }
                     });
        }


}


function motivo_de_rechazo(id_archivo,nombre_elemento){

      $("#docto_rechazado").html(nombre_elemento);
      $("#visualiza_motivo_rechazo").html('');
      $("#fecha_rechaza").html('');
      $("#usuario_rechaza").html('');


      

    $.ajax({
          url:'json/json.php?accion=consulta_rechazo',
          data:{id_directorio:id_archivo},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {


                $("#visualiza_motivo_rechazo").html(json_jax[0].motivo_rechazo);
                $("#fecha_rechaza").html(json_jax[0].fecha_rechazo);
                $("#usuario_rechaza").html(json_jax[0].usuario_aprueba);

                $("#ventana_motivo_rechazo").modal('show');
               

            }
    });


}

function carga_tabla_archivos(){


var consulta='json/json.php?accion=carga_tabla_archivos';


$("#tabla_lista_archivos").dataTable().fnDestroy();
$('#tabla_lista_archivos').DataTable({
         responsive: true,
         dom: 'Bfrtip',
         scrollX:true,
         buttons: [ 
        ],
             aLengthMenu: [
                          [10,25, 50, 100, 200, -1],
                          [10,25, 50, 100, 200, "Todos"]
                      ],
        iDisplayLength: 10,     
    
            "ajax":''+consulta+'',
            "columns": [
            { "data": "nombre_elemento" },
            { "data": "codigo_archivo" },
            { "data": "fecha_creacion" },
            { "data": "ubicacion_planta" },
            { "data": "usuario_aprueba" },
            {data: 'id', "render": function (data, type, row, meta) {

                if(row.fecha_rechazo!=''){
                   return '<center><button type="button" class="btn btn-danger btn-md pull-left" title="clic para ver motivo de Rechazo" onclick="motivo_de_rechazo(\''+row.id+'\',\''+row.nombre_elemento+'\')" >RECHAZADO</button>';
                }else{
                    
                     return '<label>'+row.fecha_aprobacion+'</label>';
                }

                
            }},
            {data: 'id', "render": function (data, type, row, meta) {
                return '<div class="form-group col-xs-2 col-md-2 col-lg-2" onClick="visualizar_archivo(\''+row.descripcion+'\')"><img src="img/'+row.extencion_elemento+'.png" class="img-responsive" style="max-width: 30px;" alt="Logo" title="Ver: '+row.nombre_elemento+'" ></div>';
            }},
            {data: 'id', "render": function (data, type, row, meta) {
                if(row.estado_gestion=='OK'){
                    return '<label title="Publicado">'+row.estado_gestion+'</label>';
                }else if(row.estado_gestion=='REVISION' && row.usuario_aprueba!=''){     
                     return '<label title="En revisión por Depto de Gestión">'+row.estado_gestion+'</label>';
                }else{
                    return '<center><button type="button"  class="btn btn-danger glyphicon glyphicon-remove btn-md pull-left" title="Eliminar documento" onclick="eliminar_archivo(\''+row.id+'\',\''+row.nombre_elemento+'\')" ></button>';
                }
            }},
            {data: 'id', "render": function (data, type, row, meta) {
                if(row.estado_gestion=='OK'){
                 return '<center><button type="button" class="btn btn-info btn-md pull-left glyphicon glyphicon-cog " title="Créar código para nueva versión" onclick="crear_codigo_version(\''+row.codigo_archivo+'\',\''+row.ruta+'\',\''+row.nombre_elemento+'\',\''+row.id_padre+'\',\''+row.id+'\',\''+row.id_codigo+'\')" ></button>';
                }else{
                  return '<label> </label>';  
                }
            }}  
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ Registros por pagina",
                "zeroRecords": "No se ha encontrado resultados",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Sin resultados",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar",
                 "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                        },
            },
            
           "order": [], // sin orden de columna

            "columnDefs": [
            {
                //"targets": [ 2],
                //"visible": false,
                //"searchable": false
            }
        ],
           });

}

carga_tabla_archivos();
