
   $('#carga-contenido').load('home/bienvenida.php');
   
   $('#inicio').click(function() {
   $('#carga-contenido').load('home/bienvenida.php');
   });


   $('#directorio_sub').click(function() { 
   $('#carga-contenido').load('forms/directorio.php');
   });


$('#subir_archivo_sub').click(function() { 
   $('#carga-contenido').load('forms/subir_archivo.php');
   });


$('#aprobar_documento_sub').click(function() { 
   $('#carga-contenido').load('forms/aprobar_docto.php');
   });

$('#pubicar_documento_sub').click(function() { 
   $('#carga-contenido').load('forms/publicar_documento.php');
   });

$('#directorio_general_sub').click(function() { 
   $('#carga-contenido').load('forms/directorio_general.php');
   });

$('#solicitud_codigo_directorio_sub').click(function() { 
   $('#carga-contenido').load('forms/solicitud_codigo_directorio.php');
   });

$('#permiso_diario_sub').click(function() { 
   $('#carga-contenido').load('forms/permiso_diario.php');
   });

$('#admin_permiso_sub').click(function() { 
   $('#carga-contenido').load('forms/admin_permisos.php');
   });

