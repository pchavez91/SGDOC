<?php
session_start();
?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <title>Bienvenida</title>
  
    <!--common-->
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  <link href="../../css/clndr.css" rel="stylesheet">
</head>
<body class="horizontal-menu-page">

    <!---inicio home bienvenida -->
    <div class="wrapper">
    <!--seccion N1 -->
    <div class="page-heading">
            <h1>
                Bienvenido al Módulo de Gestión Documental
            </h1>

        </div>
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Usuario | <spam class="text-muted"> <?php echo utf8_encode($_SESSION['nick']); ?> / <?php echo $_SESSION['cargo']; ?></spam>
                        </header>
                        <div class="panel-body">
                        <div class="row">
                          <div class="col-md-12">
                              <div class="row state-overview">
                                  <div class="col-md-12">
                                    <div align="center"><img src="home/img/logoB.png" style="width:500px;width:auto;height:auto;"></div>
                                  </div>			
                              </div>
                          </div>
                      </div>
                      </div>
            </div>
		</div>
    </div>
  <footer class="sticky-footer">
    </footer>
</section>

<script>

$("#lateral").show();
$("#header_lista_sistemas").show();
	  
 </script> 

</body>
</html>
