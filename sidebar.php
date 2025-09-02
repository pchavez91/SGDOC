<?php

$menu='';
$submenu='';

$home='<li><a href="" id="inicio"> <i class="fa fa-home"></i>INICIO</a></li>';

$div_menu_1='<li class="menu-list"><a href=""><i class="fa fa-folder-open"></i><span>';
$div_menu_2='</span></a>';
$div_menu_3='</li>';

$div_submenu_1='<ul class="sub-menu-list">';
$div_submenu_2='<li><a href="#" id="';
$div_submenu_3='">';
$div_submenu_4='</a></li>';
$div_submenu_5='</ul>';

$sql_perfil ="select d.perfil_codigo,d.perfil_nombre
from Seguridad.dbo.usuario_perfil as a
inner join Seguridad.dbo.perfil_sistema as b on a.psist_codigo=b.psist_codigo
inner join seguridad.dbo.sistemas as c on b.sist_codigo=c.sist_codigo
inner join Seguridad.dbo.perfil as d on b.perfil_codigo=d.perfil_codigo
where a.user_codigo='".$_SESSION['codigo']."' AND c.sist_codigo=31";  // CODIGO SISTEMA

$RES_perfil = mssql_query($sql_perfil, $link_seg);
        while($ROW_perfil =  mssql_fetch_array($RES_perfil))
            {		
$perfil=$ROW_perfil['perfil_nombre'];
$perfil_codigo=$ROW_perfil['perfil_codigo'];
			}

$sql_menu ="SELECT A.menu_codigo AS CODIGO_MENU,
A.menu_nombre AS NOMBRE_MENU,
B.sist_codigo AS CODIGO_SISTEMA,
B.sist_nombre AS NOMBRE_SISTEMA,
D.perfil_codigo AS CODIGO_PERFIL, 
D.perfil_nombre AS NOMBRE_PERFIL
FROM Seguridad.dbo.menu AS A
INNER JOIN Seguridad.dbo.sistemas AS B ON A.sist_codigo=B.sist_codigo
INNER JOIN Seguridad.dbo.perfil_menu AS C ON A.menu_codigo=C.menu_codigo
INNER JOIN Seguridad.dbo.perfil AS D ON C.perfil_codigo=D.perfil_codigo
WHERE B.sist_codigo=31 AND C.perfil_codigo= '".$perfil_codigo."'";  // CODIGO SISTEMA

$RES_menu = mssql_query($sql_menu, $link_seg);
        while($ROW_menu =  mssql_fetch_array($RES_menu))
            {
$CODIGO_SISTEMA=$ROW_menu['CODIGO_SISTEMA'];	
$CODIGO_PERFIL=$ROW_menu['CODIGO_PERFIL'];
$CODIGO_MENU=$ROW_menu['CODIGO_MENU'];
$NOMBRE_MENU=utf8_encode($ROW_menu['NOMBRE_MENU']);				


$sql_submenu ="SELECT A.sub_codigo AS CODIGO_SUBMENU,
 A.sub_id AS ID_SUBMENU,
 A.sub_nombre AS NOMBRE_SUBMENU,
 B.menu_nombre AS NOMBRE_MENU,
 D.perfil_nombre AS NOMBRE_PERFIL,
 E.sist_nombre AS NOMBRE_SISTEMA
FROM Seguridad.dbo.sub_menu AS A
INNER JOIN Seguridad.dbo.menu AS B ON A.menu_codigo=B.menu_codigo
INNER JOIN Seguridad.dbo.perfil_submenu AS C ON A.sub_codigo=C.sub_codigo
INNER JOIN Seguridad.dbo.perfil AS D ON C.perfil_codigo=D.perfil_codigo
INNER JOIN Seguridad.dbo.sistemas AS E ON B.sist_codigo=E.sist_codigo
WHERE E.sist_codigo='".$CODIGO_SISTEMA."' 
AND D.perfil_codigo='".$CODIGO_PERFIL."' 
AND B.menu_codigo='".$CODIGO_MENU."' ";

$RES_submenu = mssql_query($sql_submenu, $link_seg);
        while($ROW_submenu =  mssql_fetch_array($RES_submenu))
            {
$ID_SUBMENU=$ROW_submenu['ID_SUBMENU'];
$NOMBRE_SUBMENU=utf8_encode($ROW_submenu['NOMBRE_SUBMENU']);
	
$submenu.=$div_submenu_2.$ID_SUBMENU.$div_submenu_3.$NOMBRE_SUBMENU.$div_submenu_4;		
			}

$menu.=$div_menu_1.$NOMBRE_MENU.$div_menu_2.$div_submenu_1.$submenu.$div_submenu_5.$div_menu_3;
$submenu='';			
			}// fin while menu	   

?>

				<ul  id="lateral" style="display:none;" class="nav nav-pills nav-stacked custom-nav">
					
					<?php echo $home.$menu ?>
				
				</ul>