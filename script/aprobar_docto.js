


function visualizar_archivo(nombre_archivo){

         // Abrir nuevo tab
        var win = window.open('archivos_subidos/'+nombre_archivo, '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();

}


function abre_ventana_permisos(id_archivo, nombre_archivo){

    $("#nombre_de_documento_permiso").html(nombre_archivo);
    $("#id_archivo_aprueba").val(id_archivo);
    $("#nombre_archivo_aprueba").val(nombre_archivo);


    $("#ventana_aprobar_documento").modal('show');

}




function aprobar_documento(){

    var id_archivo = $("#id_archivo_aprueba").val();
    var nivel_acceso = $("#nivel_acceso").val();


   if(nivel_acceso==null){
      alert('ERROR: Debe seleccionar un permiso de acceso para el documento.');
   }

    
            $.ajax({
              url:'json/json.php?accion=aprobar_archivo',
              data:{id_archivo:id_archivo,
                    nivel_acceso:nivel_acceso},
              type:'post',
              dataType: "json", 
              success: function (json_jax)
                {
                    
                    $("#ventana_aprobar_documento").modal('hide');
                    carga_tabla_archivos();

                }
             });

}


function rechazar_documento(){


    var id_archivo=$("#id_archivo_rechazo").val();
    var nombre_archivo=$("#nombre_archivo_rechazo").val();
    var motivo_de_rechazo_archivo=$("#motivo_de_rechazo_archivo").val();

   confirmar=confirm('Realmente desea rechazar el documento: "'+nombre_archivo+'". \n Se enviara un correo al creador de este archivo.'); 
          if (confirmar){

             $.ajax({
                      url:'json/json.php?accion=rechazar_archivo',
                      data:{id_archivo:id_archivo,
                            motivo_de_rechazo_archivo:motivo_de_rechazo_archivo},
                      type:'post',
                      dataType: "json", 
                      success: function (json_jax)
                        {
                            $("#ventana_rechazar_documento").modal('hide');
                            carga_tabla_archivos();
                        }
                     });
        }else{
            $("#ventana_rechazar_documento").modal('hide');
        }        

}




function ventana_rechazar_documento(id_archivo, nombre_archivo){

       $("#motivo_de_rechazo_archivo").val('');
       $("#id_archivo_rechazo").val(id_archivo);
       $("#nombre_archivo_rechazo").val(nombre_archivo);

       $("#ventana_rechazar_documento").modal('show');

       $('#ventana_rechazar_documento').on('shown.bs.modal', function () {
                    $('#motivo_de_rechazo_archivo').focus();
                }) 


}




function carga_tabla_archivos(){


    var consulta='json/json.php?accion=carga_tabla_archivos_aprobados';


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
                    {data: 'id', "render": function (data, type, row, meta) {
                        return '<div class="form-group col-xs-2 col-md-2 col-lg-2" onClick="visualizar_archivo(\''+row.codigo_archivo+'.'+row.extencion_elemento+'\')"><img src="img/'+row.extencion_elemento+'.png" class="img-responsive" style="max-width: 30px;" alt="Logo" title="'+row.nombre_elemento+'" ></div>';
                    }},
                    {data: 'id', "render": function (data, type, row, meta) {

                             return '<center><button type="button"  class="btn btn-success glyphicon glyphicon-ok btn-md pull-left" title="Aprobar documento" onclick="abre_ventana_permisos(\''+row.id+'\',\''+row.nombre_elemento+'\')" ></button>';
                            
                    }},
                    {data: 'id', "render": function (data, type, row, meta) {

                             return '<center><button type="button"  class="btn btn-danger glyphicon glyphicon-remove-circle btn-md pull-left" title="Rechazar este documento" onclick="ventana_rechazar_documento(\''+row.id+'\',\''+row.nombre_elemento+'\')"></button>';
                            
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





	
