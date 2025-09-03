


function visualizar_archivo(id_directorio){

         $.ajax({
                  url:'json/json.php?accion=abrir_nombre_archivo',
                  data:{id_directorio:id_directorio},
                  type:'post',
                  dataType: "json", 
                  success: function (json_jax)
                    {

                       // Abrir nuevo tab
                        var win = window.open('archivos_subidos/'+json_jax.descripcion, '_blank');
                        // Cambiar el foco al nuevo tab (punto opcional)
                        win.focus();

              

                    }
            });

}




function carga_lista_codigos(){


var id_directorio = $("#id_directorio").val();
var consulta='json/json.php?accion=lista_de_codigos&id_directorio='+id_directorio;


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
            { "data": "codigo_directotio" },
            { "data": "fecha_creacion" },
            { "data": "utilizado" },
            {data: 'id', "render": function (data, type, row, meta) {

                if(row.utilizado=='NO'){
                    return '<center><button type="button"  class="btn btn-danger fa fa-minus-square btn-md pull-left" title="Eliminar código" onclick="eliminar_codigo(\''+row.id+'\')" ></button>';
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





function eliminar_codigo(id_codigo){


    $.ajax({
          url:'json/json.php?accion=eliminar_codigo',
          data:{id_codigo:id_codigo},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {
               if(json_jax[0].success=='true'){

                listar_codigos();

               }
            }
    });

}


function reservar_codigo(){
    var id_directorio = $("#id_directorio").val();
    var codigo_directotio = $("#codigo_directotio").val();
    var correlativo_directorio = $("#correlativo_directorio").val();
    var codigo_generado = $("#codigo_generado").val();
    var ruta_directorio = $("#ruta_directorio").html();



    $.ajax({
          url:'json/json.php?accion=reservar_codigo',
          data:{id_directorio:id_directorio,
                codigo_directotio:codigo_directotio,
                correlativo_directorio:correlativo_directorio,
                codigo_generado:codigo_generado,
                ruta_directorio:ruta_directorio},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {
               if(json_jax[0].success=='true'){

                $("#ventana_nuevo_codigo").modal('hide');
                alert(json_jax[0].codigo);

               }
            }
    });

}

function generar_codigo(){
    var id_directorio = $("#id_directorio").val();
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
                         $("#directorio_codigo").html(directorio_codigo);
                         $("#codigo_generado").val(data[0].codigo);
                         $("#correlativo_directorio").val(data[0].correlativo);
                        $("#ventana_nuevo_codigo").modal('show');

                      } 
                        

                }
        });


    }else{
        alert('ERROR: Debe almenos ingresar a un directorio');
    }


}


function crea_carpeta(){

  var rutta_directorio = $("#ruta_directorio").html();
  $("#titulo_editar_nuevo").html(rutta_directorio);

  
    $("#nombre_nueva_carpeta").val('');
    $("#ventana_nueva_carpeta").modal('show');

    $('#ventana_nueva_carpeta').on('shown.bs.modal', function () {
            $('#nombre_nueva_carpeta').focus();
        }) 

}

function crea_carpeta_directorio(){

    var nombre_nueva_carpeta = $("#nombre_nueva_carpeta").val();
    var nomesclatura_carpeta = $("#nomesclatura_carpeta").val();
    var id_directorio = $("#id_directorio").val();
    var ruta_directorio = $("#ruta_directorio").html();

    $.ajax({
          url:'json/json.php?accion=crea_carpeta_directorio',
          data:{nombre_nueva_carpeta:nombre_nueva_carpeta,
                nomesclatura_carpeta:nomesclatura_carpeta,
                id_directorio:id_directorio,
                ruta_directorio:ruta_directorio},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {
                $("#ventana_nueva_carpeta").modal('hide');
                ingresar_directorio(id_directorio,'1');
            }
    });


}



function carga_directorio_inicio(){

    $("#ruta_directorio").html("DIRECTORIO PRINCIPAL"); 

	$.ajax({
          url:'json/json.php?accion=consulta_directorio_principal',
          //data:{id_subsistema:id_subsistema},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {
      
            	for (var i = 0; i < json_jax.data.length; i++) {

                  $("#directorio_principal").append('<div class="col-lg-6 col-xs-12" onclick="ingresar_directorio('+json_jax.data[i].id+','+json_jax.data[i].tipo_elemento+')"><div class="panel panel-default"><div class="panel-body"><img src="img/server2.png" class="img-responsive" style="max-width: 150px;" alt="Logo" title="'+json_jax.data[i].nombre_elemento+'" ><h4 class="centered"><br><strong>'+json_jax.data[i].nombre_elemento+'</strong></h4></div></div></div>');

                }
            }
    });

};



function ingresar_directorio(id_directorio,extencion_elemento,nombre_carpeta){

     //extencion_elemento =(si es '1' es una carpeta y si es '2' es un archivo)
     if(extencion_elemento=='1'){
        $("#id_directorio").val(id_directorio); 
      }


     

     if(extencion_elemento=='1'){

         var contenido_tabla='';

     	$("#directorio_principal").html(""); 

	     	$.ajax({
	          url:'json/json.php?accion=consulta_directorio_adelante_general',
	          data:{id_directorio:id_directorio},
	          type:'post',
	          dataType: "json", 
	          success: function (json_jax)
	            {

                    if(json_jax.data.length=='0' && id_directorio!='0'){

                        var ruta_absoluta=$("#ruta_directorio").html();

                        $("#ruta_directorio").html(ruta_absoluta+' '+nombre_carpeta+' >'); 

                    }
	      
	            	for (var i = 0; i < json_jax.data.length; i++) {

                        if(json_jax.data[i].tipo_elemento=='1'){

                            var nombre_elemento=json_jax.data[i].nombre_nomesclatura;

                        }else{
                            var nombre_elemento=json_jax.data[i].nombre_elemento;
                        }
                        

	                //  $("#directorio_principal").append("<div class='col-lg-3' onclick='ingresar_directorio(\""+json_jax.data[i].id+"\",\""+json_jax.data[i].tipo_elemento+"\",\""+json_jax.data[i].nombre_elemento+"\")'><div class='panel panel-default'><div class='panel-body'><img src='img/"+json_jax.data[i].extencion_elemento+".png' class='img-responsive' style='max-width: 150px;' alt='Logo' title='"+nombre_elemento+" - NIVEL "+json_jax.data[i].nivel_acceso+"' ><h5 class='centered'><br><strong>"+nombre_elemento+"</strong></h5></div></div></div>"); 

                      contenido_tabla=contenido_tabla+"<tr><td><img src='img/"+json_jax.data[i].extencion_elemento+".png' class='img-responsive' style='max-width: 50px;' alt='Logo' title='"+nombre_elemento+" - NIVEL "+json_jax.data[i].nivel_acceso+"' ></td><td align='left'><a onclick='ingresar_directorio(\""+json_jax.data[i].id+"\",\""+json_jax.data[i].tipo_elemento+"\",\""+json_jax.data[i].nombre_elemento+"\")'><strong style='color:#333FFF';>"+nombre_elemento+"</strong></a></td><td align='left'><a onclick='ingresar_directorio(\""+json_jax.data[i].id+"\",\""+json_jax.data[i].tipo_elemento+"\",\""+json_jax.data[i].nombre_elemento+"\")'><strong style='color:#333FFF';>"+json_jax.data[i].codigo_archivo+"</strong></a></td><td><strong style='color:#333FFF';>"+json_jax.data[i].extencion_elemento+"</strong></td></tr>";

                      
                      
                      $("#ruta_directorio").html(json_jax.data[i].ruta); 
	                }

                    $("#directorio_principal").html("<table class='display nowrap' width='100%'><tr><th>Tipo</th><th>Nombre</th><th>Código</th><th>Extención</th></tr>"+contenido_tabla+"</table>"); 
	            }
            
	    });



            

     }else{

         $.ajax({
                  url:'json/json.php?accion=abrir_nombre_archivo',
                  data:{id_directorio:id_directorio},
                  type:'post',
                  dataType: "json", 
                  success: function (json_jax)
                    {

                       // Abrir nuevo tab
                        var win = window.open('archivos_subidos/'+json_jax.descripcion, '_blank');
                        // Cambiar el foco al nuevo tab (punto opcional)
                        win.focus();

              

                    }
            });

     }

}; 



function salir_directorio(){

     $("#directorio_principal").html(""); 

     var id_directorio = $("#id_directorio").val(); 

     var contenido_tabla='';     

     if(id_directorio=='1' || id_directorio=='2' || id_directorio=='0' || id_directorio==''){
     	carga_directorio_inicio();
     }else{

     	$.ajax({
          url:'json/json.php?accion=consulta_directorio_atras_general',
          data:{id_directorio:id_directorio},
          type:'post',
          dataType: "json", 
          success: function (json_jax)
            {
      
            	for (var i = 0; i < json_jax.data.length; i++) {

            	$("#id_directorio").val(json_jax.data[i].id_padre);

                $("#ruta_directorio").html(json_jax.data[i].ruta); 

                        if(json_jax.data[i].tipo_elemento=='1'){

                            var nombre_elemento=json_jax.data[i].nombre_nomesclatura;

                        }else{
                            var nombre_elemento=json_jax.data[i].nombre_elemento;
                        }

                        if(id_directorio==json_jax.data[i].id){
                            var color='#FF5733';
                        }else{
                            var color='#333FFF';
                        }

                  //$("#directorio_principal").append("<div class='col-lg-3' onclick='ingresar_directorio(\""+json_jax.data[i].id+"\",\""+json_jax.data[i].tipo_elemento+"\",\""+json_jax.data[i].nombre_elemento+"\")'><div class='panel panel-default'><div class='panel-body'><img src='img/"+json_jax.data[i].extencion_elemento+".png' class='img-responsive' style='max-width: 150px;' alt='Logo' title='"+nombre_elemento+" - NIVEL "+json_jax.data[i].nivel_acceso+"' ><h5 class='centered'><br><strong>"+nombre_elemento+"</strong></h5></div></div></div>");

                  contenido_tabla=contenido_tabla+"<tr><td><img src='img/"+json_jax.data[i].extencion_elemento+".png' class='img-responsive' style='max-width: 50px;' alt='Logo' title='"+nombre_elemento+" - NIVEL "+json_jax.data[i].nivel_acceso+"' ></td><td align='left'><a onclick='ingresar_directorio(\""+json_jax.data[i].id+"\",\""+json_jax.data[i].tipo_elemento+"\",\""+json_jax.data[i].nombre_elemento+"\")'><strong style='color:"+color+"';>"+nombre_elemento+"</strong></a></td><td><strong style='color:#333FFF';>"+json_jax.data[i].codigo_archivo+"</strong></td><td><strong style='color:"+color+"';>"+json_jax.data[i].extencion_elemento+"</strong></td></tr>";

                }

                $("#directorio_principal").html("<table class='display nowrap' width='100%'><tr><th>Tipo</th><th>Nombre</th><th>Código</th><th>Extención</th></tr>"+contenido_tabla+"</table>"); 

            }
    	});

     }

}; 

carga_directorio_inicio();


function cargarVistaCarpetas() {
  const $cont = $('#vista_carpetas').empty();

  $.ajax({
    url: 'json/json.php',
    method: 'POST',
    dataType: 'json',
    data: { accion: 'consulta_directorio_por_padre', id_padre: 0 },
    success(resp) {
      const items = resp.data || [];
      if (!items.length) return $cont.append('<p>No hay carpetas en la raíz.</p>');

      items.forEach(item => {
        // Siempre 1.png en la raíz
        const $card = crearCard(item.nombre_elemento, true);

        $card.on('click', () => {
          $('#vista_carpetas').hide();
          $('#vista_subcarpetas').show();
          $('#btnVolver').show();
          cargarVistaSubcarpetas(item.id);
        });

        $cont.append($card);
      });
    }
  });
}

// Vista 2: subcarpetas
function cargarVistaSubcarpetas(idPadre) {
  const $cont = $('#vista_subcarpetas').empty();

  $.ajax({
    url: 'json/json.php',
    method: 'POST',
    dataType: 'json',
    data: { accion: 'consulta_directorio_por_padre', id_padre: idPadre },
    success(resp) {
      const items = resp.data || [];

      if (!items.length) {
        // Si no hay subcarpetas → ir directo a botones
        $('#vista_subcarpetas').hide();
        $('#botonesExplorador').show();
        cargarBases(idPadre);
        return;
      }

      items.forEach(item => {
        const $card = crearCard(item.nombre_elemento, false);

        $card.on('click', () => {
          $('#vista_subcarpetas').hide();
          $('#botonesExplorador').show();
          cargarBases(item.id);
        });

        $cont.append($card);
      });
    }
  });
}

// Crear card: si es raíz (isRaiz = true) → img/1.png, si no → img/ca.png
function crearCard(nombre, isRaiz) {
  const img = isRaiz ? "img/server2.png" : "img/ca.png";

  return $(`
    <div class="col-lg-3 col-xs-6">
      <div class="panel panel-default">
        <div class="panel-body" style="text-align:center; cursor:pointer;">
          <img src="${img}" style="max-width:150px; display:block; margin:0 auto;">
          <h4>${nombre}</h4>
        </div>
      </div>
    </div>
  `);
}


// Carga botones dinámicos según id_padre
function cargarBases(idPadre) {
  console.log('> cargarBases invocado con idPadre =', idPadre);
  const $cont = $('#botonesExplorador').empty();

  $.ajax({
    url: 'json/json.php',
    method: 'POST',
    dataType: 'json',
    data: {
      accion:   'consulta_bases',
      id_padre: idPadre
    },
    success(resp) {
      console.log('  ← respuesta consulta_bases:', resp);
      const bases = resp.bases || [];
      if (!bases.length) {
        $cont.append(`<p>No se encontraron bases para el padre ${idPadre}.</p>`);
        return;
      }

      // Agrupamiento y render de botones (tu lógica de niveles/color)
      const grupos = { 1: [], 2: [], 3: [], 4: [] };
      bases.forEach(base => {
        const nombre = base.nombre.trim().toLowerCase();
        let nivel, colorClass;

        if (nombre === 'alta direccion') {
          nivel = 1; colorClass = 'clr-alta';
        } else if (nombre.startsWith('subgerencia')) {
          nivel = 2; colorClass = 'clr-subgerencia';
        } else if (nombre === 'formatos oficiales') {
          nivel = 4; colorClass = 'clr-formatos';
        } else {
          nivel = 3; colorClass = 'clr-depto';
        }

        const $btn = $('<button>')
          .addClass(`base-btn boton-caja ${colorClass}`)
          .text(base.nombre)
          .attr('data-id', base.id)
          .attr('data-nombre', base.nombre);

        grupos[nivel].push($btn);
      });

      Object.keys(grupos).sort((a,b)=>a-b).forEach(n => {
        const $nivelDiv = $('<div>').addClass(`nivel nivel-${n}`);
        grupos[n].forEach($btn => $nivelDiv.append($btn));
        $cont.append($nivelDiv);
      });
    },
    error(xhr, status, err) {
      console.error('  ¡Error AJAX!', status, err);
      $cont.append('<p>Error cargando botones.</p>');
    }
  });
}




// Abrir modal y actualizar título
function abrir_modal(idBase, nombreBase) {
  const titulo = document.getElementById('modalLabel');
  if (!titulo) {
    console.error('No se encontró #modalLabel en el DOM');
    return;
  }
  titulo.textContent = nombreBase;
  const contenedor = document.getElementById('explorador');
  contenedor.innerHTML = '';
  cargarHijos(idBase, contenedor);
  $('#abrir_modal_explorador').modal('show');
}

//Función para obtener icono de cada elemento
function getIconHtml(item) {
  if (item.tipo_elemento == 1) {
    return '<img src="img/ca.png" alt="Carpeta" class="icono" />';
  }
  const ext = (item.extencion_elemento || '').toLowerCase();
  let iconFile = 'otro.png';
  switch (ext) {
    case 'pdf':   iconFile = 'pdf.png';     break;
    case 'xls':   iconFile = 'xls.png';     break;
    case 'xlsx':  iconFile = 'xlsx.png';    break;
    case 'excel': iconFile = 'excel.png';   break;
    case 'doc':   iconFile = 'docx.png';    break;
    case 'docx':  iconFile = 'docx.png';    break;
    case 'ppt':   iconFile = 'pptx.png';    break;
    case 'pptx':  iconFile = 'pptx.png';    break;
    case 'dwg':   iconFile = 'dwg.png';     break;
    case 'server':iconFile = 'server2.png'; break;
    case 'img':   iconFile = 'img.png';     break;
  }
  return `<img src="img/${iconFile}" alt="${ext}" class="icono" />`;
}


function cargarHijos(idPadre, contenedor) {
  fetch(`json/json.php?accion=consulta_directorio_completo&id_padre=${idPadre}`)
    .then(resp => resp.json())
    .then(data => {
      data.data.forEach(item => {
        if (contenedor.querySelector(`[data-id="${item.id}"]`)) return;

        const nodo = document.createElement('div');
        nodo.classList.add(item.tipo_elemento==1 ? 'item-carpeta' : 'item-archivo');
        nodo.dataset.id = item.id;

        nodo.innerHTML = `
          ${getIconHtml(item)}
          <span class="nombre-elemento">${item.nombre_elemento}</span>
        `;

        const hijosCont = document.createElement('div');
        hijosCont.classList.add('hijos-carpeta');
        nodo.appendChild(hijosCont);

        if (item.tipo_elemento == 1) {
          nodo.addEventListener('click', e => {
            e.stopPropagation();
            const abierto = hijosCont.style.display === 'block';
            hijosCont.style.display = abierto ? 'none' : 'block';
            if (!abierto && hijosCont.children.length === 0) {
              cargarHijos(item.id, hijosCont);
            }
          });
        }

        if (item.tipo_elemento == 0 && item.codigo_archivo) {
          nodo.addEventListener('click', e => {
            e.stopPropagation();
            const ruta = `archivos_subidos/${item.codigo_archivo}.${item.extencion_elemento}`;
            window.open(ruta, '_blank');
          });
        }

        contenedor.appendChild(nodo);
      });
    })
    .catch(err => console.error('Error cargando hijos:', err));
}


$(function(){
  // Al inicio, mostrar solo la vista de carpetas
  $('#vista_subcarpetas').hide();
  $('#botonesExplorador').hide();
  $('#btnVolver').hide();
  cargarVistaCarpetas();

  // Click sobre carpeta raíz → ocultar vista y cargar botones
  $('#vista_carpetas').on('click', '.carpeta-root', function(){
    const id     = $(this).data('id');
    const nombre = $(this).data('nombre');

    $('#vista_carpetas').hide();
    $('#botonesExplorador').show();
    $('#btnVolver').show();
    $('#ruta_directorio').text(`DIRECTORIO PRINCIPAL > ${nombre}`);

    cargarBases(id);
  });

  

// Navegación con botón Volver
$('#btnVolver').on('click', function() {
  if ($('#botonesExplorador').is(':visible')) {
    $('#botonesExplorador').hide().empty();
    $('#vista_subcarpetas').show();
  } else if ($('#vista_subcarpetas').is(':visible')) {
    $('#vista_subcarpetas').hide().empty();
    $('#vista_carpetas').show();
    $('#btnVolver').hide();
  }
});


  // Delegación para abrir modal desde los botones
  $('#botonesExplorador').on('click', 'button.base-btn', function(){
    abrir_modal($(this).data('id'), $(this).data('nombre'));
  });
});


// === Config ===
var ROOT_PARENT_ID = 3844;

// === Cache simple para hijos de directorios ===
var __dirCache = {};

// === util: cargar hijos (repos, áreas, deptos) ===
function loadDirOptions(parentId) {
  if (__dirCache[parentId]) {
    return $.Deferred().resolve(__dirCache[parentId]).promise();
  }
  return $.getJSON('json/json.php', {
    accion: 'listar_elementos_filtro',
    id_padre: parentId
  }).then(function (resp) {
    var list = (resp && resp.data) ? resp.data : [];
    __dirCache[parentId] = list;
    return list;
  }, function () {
    return [];
  });
}

// === util: rellenar <select> ===
function fillSelect($sel, items, placeholder) {
  var html = '<option value="">' + placeholder + '</option>';
  for (var i = 0; i < items.length; i++) {
    html += '<option value="' + items[i].id + '">' + items[i].nombre_elemento + '</option>';
  }
  $sel.html(html);
}

// === refs DOM ===
var $modal, $selRepo, $selArea, $selDepto, $buscador;
var tablaArchivos = null;
var reloadTimeout = null;

// === recarga segura de DataTable ===
function reloadTablaArchivos() {
  if(tablaArchivos){
    clearTimeout(reloadTimeout);
    reloadTimeout = setTimeout(() => {
      tablaArchivos.ajax.reload();
    }, 150);
  }
}

// === inicialización DataTable ===
function ensureDataTable() {
  if ($.fn.dataTable.isDataTable('#tabla_lista_archivos_encontrados')) {
    tablaArchivos = $('#tabla_lista_archivos_encontrados').DataTable();
    return;
  }

  tablaArchivos = $('#tabla_lista_archivos_encontrados').DataTable({
    dom: 'lrtip',
    responsive: true,
    scrollX: true,
    scrollY: '300px', // altura interna de la tabla
    scrollCollapse: true,
    ajax: {
      url: 'json/json.php?accion=listar_archivos_busqueda',
      data: function (d) {
        d.repositorio  = $selRepo.val()  || '';
        d.area         = $selArea.val()  || '';
        d.departamento = $selDepto.val() || '';
      },
      dataSrc: 'data'
    },
    columns: [
      { data: 'nombre_elemento' },
      { data: 'codigo_archivo' },
      {
        data: 'id',
        render: function (id, type, row) {
          return '' +
            '<div style="cursor:pointer;" onClick="visualizar_archivo(\'' + id + '\')">' +
              '<img src="img/' + row.extencion_elemento + '.png" style="max-width:30px" title="Ver archivo">' +
            '</div>';
        }
      },
      { data: 'ruta' }
    ],
    language: {
      lengthMenu:   'Mostrar _MENU_ registros',
      zeroRecords:  'No se ha encontrado resultados',
      info:         'Mostrando página _PAGE_ de _PAGES_',
      infoEmpty:    'Sin resultados',
      infoFiltered: '(filtrado de _MAX_ totales)',
      paginate: {
        first: 'Primero', last: 'Último', next: 'Siguiente', previous: 'Anterior'
      }
    },
    order: []
  });
}

// === buscador ===
function hookSearch() {
  window.tablaFiltroGlobal = function(q) {
    if (tablaArchivos) { tablaArchivos.search(q).draw(); }
  };
  $buscador.on('input', function() {
    if (tablaArchivos) { tablaArchivos.search(this.value).draw(); }
  });
}

// === filtros ===
function hookFilters() {
  $selRepo.on('change', function() {
    var repoId = $(this).val();
    fillSelect($selArea, [], 'Seleccione repositorio primero'); $selArea.prop('disabled', true);
    fillSelect($selDepto, [], 'Seleccione área primero');       $selDepto.prop('disabled', true);
    reloadTablaArchivos();
    if (repoId) {
      loadDirOptions(parseInt(repoId,10)).then(function(list){
        fillSelect($selArea, list, 'Seleccione área'); $selArea.prop('disabled', false);
      });
    }
  });

  $selArea.on('change', function() {
    var areaId = $(this).val();
    fillSelect($selDepto, [], 'Seleccione área primero'); $selDepto.prop('disabled', true);
    reloadTablaArchivos();
    if(areaId){
      loadDirOptions(parseInt(areaId,10)).then(function(list){
        fillSelect($selDepto, list, 'Seleccione departamento'); $selDepto.prop('disabled', false);
      });
    }
  });

  $selDepto.on('change', function() {
    reloadTablaArchivos();
  });
}

// === abrir modal ===
function abre_ventana_buscar_archivo() {
  var $idDir = $('#id_directorio');
  if ($idDir.length && $idDir.val() === '0') {
    alert('Error: Al menos debe ingresar a algunos de los directorios');
    return;
  }

  $modal    = $('#ventana_busqueda_archivo');
  $selRepo  = $('#selectRepositorio');
  $selArea  = $('#selectArea');
  $selDepto = $('#selectDepartamento');
  $buscador = $('#buscador');

  ensureDataTable();
  hookSearch();
  hookFilters();

  $buscador.val(''); tablaFiltroGlobal('');
  $selRepo.prop('disabled', false).val('');
  fillSelect($selArea, [], 'Seleccione repositorio primero'); $selArea.prop('disabled', true);
  fillSelect($selDepto, [], 'Seleccione área primero');       $selDepto.prop('disabled', true);

  loadDirOptions(ROOT_PARENT_ID).then(function(list){
    fillSelect($selRepo, list, 'Seleccione repositorio');
  });

  $modal.modal('show');
  reloadTablaArchivos();
}

// === compatibilidad con búsqueda rápida ===
$(document).on('click', '#btnBusquedaRapida', function(e){
  e.preventDefault();
  abre_ventana_buscar_archivo();
});

// === ajustar columnas al mostrarse el modal ===
$(document).on('shown.bs.modal', '#ventana_busqueda_archivo', function () {
  if (tablaArchivos) {
    tablaArchivos.columns.adjust().responsive.recalc();
  }
});

// === visualizar archivo ===
function visualizar_archivo(id_directorio) {
  $.ajax({
    url: 'json/json.php?accion=abrir_nombre_archivo',
    type: 'post',
    dataType: 'json',
    data: { id_directorio: id_directorio },
    success: function (json_jax) {
      var win = window.open('archivos_subidos/' + json_jax.descripcion, '_blank');
      if (win) { win.focus(); }
    }
  });
}

// boton de ayuda
function abre_modal_ayuda() {
  $("#ventana_de_ayuda").modal('show');

  pasoActual = 1;
  document.getElementById("paso1").style.display = "block";
  document.getElementById("paso2").style.display = "none";
  document.getElementById("paso3").style.display = "none";

  document.getElementById("btnSiguiente").style.display = "inline-block";
  document.getElementById("btnAnterior").style.display = "none";
}

let pasoActual = 1;
const totalPasos = 3;

function cambiarPaso(direccion) {
  document.getElementById(`paso${pasoActual}`).style.display = "none";

  // Cambia el paso
  pasoActual += direccion;

  // Asegura que esté dentro del rango válido
  if (pasoActual < 1) pasoActual = 1;
  if (pasoActual > totalPasos) pasoActual = totalPasos;

  document.getElementById(`paso${pasoActual}`).style.display = "block";

  // Actualiza botones
  const btnAnterior = document.getElementById("btnAnterior");
  const btnSiguiente = document.getElementById("btnSiguiente");

  // Mostrar u ocultar botón "Atrás"
  if (pasoActual === 1) {
    btnAnterior.style.display = "none";
  } else {
    btnAnterior.style.display = "inline-block";
  }

  // Mostrar u ocultar botón "Siguiente"
  if (pasoActual === totalPasos) {
    btnSiguiente.style.display = "none";
  } else {
    btnSiguiente.style.display = "inline-block";
    btnSiguiente.textContent = "Siguiente";
  }
}

	
