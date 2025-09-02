<?php
include_once("../../config/conex.php");
$link_seg = Conexion_seguridad();
session_start();
$resultado='';
		
echo $sql ="select a.user_codigo, 
a.userp_descripcion,
d.perfil_codigo, 
d.perfil_nombre,
c.sist_codigo, 
c.sist_nombre,
c.sist_ruta
from Seguridad.dbo.usuario_perfil as a
inner join Seguridad.dbo.perfil_sistema as b on a.psist_codigo=b.psist_codigo
inner join seguridad.dbo.sistemas as c on b.sist_codigo=c.sist_codigo
inner join Seguridad.dbo.perfil as d on b.perfil_codigo=d.perfil_codigo
where a.user_codigo='".$_SESSION['codigo']."' and c.vigencia='SI'
order by c.sist_codigo asc";

$RES_usuario = mssql_query($sql, $link_seg);
        while($ROW_usuario =  mssql_fetch_array($RES_usuario))
            {	
				
/*				$ruta_sistema=$ROW_usuario['sist_ruta'];		
				$sistema=$ROW_usuario['sist_nombre'];

				$ruta='../../'.$ruta_sistema;
				$menu_arriba_1="<li class='active' class='btn btn-primary'><a href='$ruta'>";
				$menu_arriba_2="</a></li>";

				$nuevo_tab.=$menu_arriba_1.$sistema.$menu_arriba_2;*/


			$resul_aux='';
			$seleccione='';
			$sist_nombre=$ROW_usuario['sist_nombre'];
			$sist_ruta=$ROW_usuario['sist_ruta'];
			$resul_aux='<option value="'.$sist_ruta.'">'.$sist_nombre.'</option>';
			$resultado=$resultado.$resul_aux;
			
			}	  

?>	

				<ul class="nav navbar-nav">
                 <?php echo $resultado ?>
                </ul>
			