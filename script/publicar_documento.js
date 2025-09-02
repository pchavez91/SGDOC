
function tabla_archivos_publicados(){


    var consulta='json/json.php?accion=archivos_publicados';


        $("#tabla_archivos_publicados").dataTable().fnDestroy();
        $('#tabla_archivos_publicados').DataTable({
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
                    { "data": "fecha_aprobacion" },
                    {data: 'id', "render": function (data, type, row, meta) {

                                return '<center><button type="button"  class="btn btn-warning glyphicon glyphicon-download-alt btn-md pull-left" title="Bajar publicación de documento" onclick="bajar_publicacion(\''+row.id+'\',\''+row.nombre_elemento+'\')" ></button>';
                        
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


$('#id2_tab11').on('click', function () {
     
                // ajustar datatables tab
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
           .columns.adjust()
           .responsive.recalc();
        });

     })


$('#id2_tab22').on('click', function () {
     
                // ajustar datatables tab
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
           .columns.adjust()
           .responsive.recalc();
        });

     })


function visualizar_archivo(nombre_archivo){

         // Abrir nuevo tab
        var win = window.open('archivos_subidos/'+nombre_archivo, '_blank');
        // Cambiar el foco al nuevo tab (punto opcional)
        win.focus();

}

function bajar_publicacion(id_archivo, nombre_archivo){

         confirmar=confirm('Realmente desea bajar la publicación de este documento: \n"'+nombre_archivo+'"'); 
          if (confirmar) {

             $.ajax({
                      url:'json/json.php?accion=bajar_publicacion',
                      data:{id_archivo:id_archivo},
                      type:'post',
                      dataType: "json", 
                      success: function (json_jax)
                        {
                  
                            tabla_archivos_publicados();
                        }
                     });
        }


}

function publicar_documento(id_archivo, nombre_archivo){

         confirmar=confirm('Realmente desea publicar el documento: \n "'+nombre_archivo+'"'); 
          if (confirmar) {

             $.ajax({
                      url:'json/json.php?accion=publicar_documento',
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

function rechazar_documento(){


    var id_archivo=$("#id_archivo_rechazo").val();
    var nombre_archivo=$("#nombre_archivo_rechazo").val();
    var motivo_de_rechazo_archivo=$("#motivo_de_rechazo_archivo").val();

   confirmar=confirm('Realmente desea rechazar la publicación del archivo con nombre: "'+nombre_archivo+'". \n Si acepta; se notificará por correo al aprobador y al creador de este documento.'); 
          if (confirmar){

            $("#ventana_rechazar_documento").modal('hide');

             $.ajax({
                      url:'json/json.php?accion=rechazar_publicacion',
                      data:{id_archivo:id_archivo,
                            motivo_de_rechazo_archivo:motivo_de_rechazo_archivo},
                      type:'post',
                      dataType: "json", 
                      success: function (json_jax)
                        {
                            
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


    var consulta='json/json.php?accion=carga_archivos_publicar';


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
                    { "data": "fecha_aprobacion" },
                    {data: 'id', "render": function (data, type, row, meta) {
                        return '<div class="form-group col-xs-2 col-md-2 col-lg-2" onClick="visualizar_archivo(\''+row.codigo_archivo+'.'+row.extencion_elemento+'\')"><img src="img/'+row.extencion_elemento+'.png" class="img-responsive" style="max-width: 30px;" alt="Logo" title="'+row.nombre_elemento+'" ></div>';
                    }},
                    {data: 'id', "render": function (data, type, row, meta) {

                        if(row.estado_gestion=='REVISION'){

                                return '<center><button type="button"  class="btn btn-success glyphicon glyphicon-arrow-up btn-md pull-left" title="Publicar documento" onclick="publicar_documento(\''+row.id+'\',\''+row.nombre_elemento+'\')" ></button>';

                        }else{
                                 return '<label title="Publicado">OK</label>';
                        }

                             
                            
                    }},
                    {data: 'id', "render": function (data, type, row, meta) {

                        if(row.estado_gestion=='REVISION'){

                                return '<center><button type="button"  class="btn btn-danger glyphicon glyphicon-remove-circle btn-md pull-left" title="Rechazar documento" onclick="ventana_rechazar_documento(\''+row.id+'\',\''+row.nombre_elemento+'\')" ></button>';

                        }else{
                                 return '';
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





    
