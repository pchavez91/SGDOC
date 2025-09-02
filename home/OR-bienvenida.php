<?php
session_start();
?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <title>Bienvenida</title>
   <!--icheck-->
  <link href="../../js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
  <link href="../../js/iCheck/skins/square/square.css" rel="stylesheet">
  <link href="../../js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="../../js/iCheck/skins/square/blue.css" rel="stylesheet">
  
    <!--icheck-->
  <link href="../../js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
  <link href="../../js/iCheck/skins/square/square.css" rel="stylesheet">
  <link href="../../js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="../../js/iCheck/skins/square/blue.css" rel="stylesheet">

  <!--dashboard calendar-->
  <link href="../../css/clndr.css" rel="stylesheet">

  <!--Morris Chart CSS -->
  <link rel="stylesheet" href="../../js/morris-chart/morris.css">

  <!--common-->
  <link href="../../css/style.css" rel="stylesheet">
  <link href="../../css/style-responsive.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../../js/html5shiv.js"></script>
  <script src="../../js/respond.min.js"></script>
  <![endif]-->
</head>
<body class="horizontal-menu-page">

    <!---inicio home bienvenida -->
    <div class="wrapper">
    <!--seccion N1 -->
    <div class="page-heading">
            <h3>
                Bienvenido
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a><?php echo $_SESSION['nick'] ?></a>
                </li>
                <li class="active"> <?php echo $_SESSION['cargo'] ?></li>
            </ul>
            <div class="state-info">
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>Intranet</span>
                            <h3 class="red-txt">Bodega</h3>
                        </div>
                 	</div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>Intranet</span>
                            <h3 class="green-txt">TI</h3>
                        </div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>Intranet</span>
                            <h3 class="green-txt">PDP</h3>
                        </div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>Home</span>
                            <h3 class="green-txt">Inicio</h3>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- FIN seccion N1 -->
        <!--seccion N2 -->
			<div class="row">
                <div class="col-md-6">
                    <!--statistics start-->
                    <div class="row state-overview">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel purple">
                                <div class="symbol">
                                    <i class="fa fa-gavel"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value">23</div>
                                    <div class="title">Orden Compra</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel red">
                                <div class="symbol">
                                    <i class="fa fa-tags"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value">27</div>
                                    <div class="title">Parte Recepción</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row state-overview">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel blue">
                                <div class="symbol">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value">22014</div>
                                    <div class="title"> Total Revenue</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel green">
                                <div class="symbol">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value">390</div>
                                    <div class="title"> Unique Visitors</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--statistics end-->
                </div>
                <div class="col-md-6">
                    <!--more statistics box start-->
                    <div class="panel deep-purple-box">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    <div id="graph-donut" class="revenue-graph"></div>

                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-5">
                                    <ul class="bar-legend">
                                        <li><span class="blue"></span> Open rate</li>
                                        <li><span class="green"></span> Click rate</li>
                                        <li><span class="purple"></span> Share rate</li>
                                        <li><span class="red"></span> Unsubscribed rate</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--more statistics box end-->
                </div>
            </div>
        <!-- FIN seccion N1 -->
        <!--seccion N3 -->
        <div class="row">
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="calendar-block ">
                                <div class="cal1"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><span class="clndr-previous-button"><i class="fa fa-chevron-left"></i></span></div><div class="month"><span>July</span> 2015</div><div class="clndr-control-button leftalign"><span class="clndr-next-button"><i class="fa fa-chevron-right"></i></span></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day past adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day past adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day past adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day past calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day past calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day past calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day past calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day past calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day past calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day past calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day past calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day today calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day event calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day event calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day event calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day event calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day event calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day event calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day event calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day event calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <header class="panel-heading">
                            Todo List
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <ul class="to-do-list ui-sortable" id="sortable-todo">
                                <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check">
                                        <label for="todo-check"></label>
                                    </div>
                                    <p class="todo-title">
                                        Dashboard Design &amp; Wiget placement
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">

                                        <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check1">
                                        <label for="todo-check1"></label>
                                    </div>
                                    <p class="todo-title">
                                        Wireframe prepare for new design
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">

                                        <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check2">
                                        <label for="todo-check2"></label>
                                    </div>
                                    <p class="todo-title">
                                        UI perfection testing for Mega Section
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">

                                        <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check3">
                                        <label for="todo-check3"></label>
                                    </div>
                                    <p class="todo-title">
                                        Wiget &amp; Design placement
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">

                                        <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check4">
                                        <label for="todo-check4"></label>
                                    </div>
                                    <p class="todo-title">
                                        Development &amp; Wiget placement
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">

                                        <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>

                            </ul>
                            <div class="row">
                                <div class="col-md-12">
                                    <form role="form" class="form-inline">
                                        <div class="form-group todo-entry">
                                            <input type="text" placeholder="Enter your ToDo List" class="form-control" style="width: 100%">
                                        </div>
                                        <button class="btn btn-primary pull-right" type="submit">+</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--more statistics box start-->
                    <div class="panel deep-purple-box">
                         <div class="weather-block bg-blue">
                            <div class="weather-current-city">
                              <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <span class="current-city">Temuco, GB <span class="badge bg-blue">
                                        </span><span class="current-temp">22&deg;C</span>
                                        <span class="current-day">Viernes, 28 Julio</span>
                                        </div>
                                <div class="col-md-6 col-sm-6 col-xs-6"><span class="current-day-icon">
                                  <canvas id="clear-day" width="120" height="120"></canvas>
                                  </span></div>
                              </div>
                            </div>
                            <div class="row">
                              <ul class="days">
                                <li class="col-md-3 col-sm-3 col-xs-3"><strong>LUN</strong>
                                  <canvas id="snow" width="50" height="50"></canvas>
                                  <span>19&deg;</span></li>
                                <li class="col-md-3 col-sm-3 col-xs-3"><strong>MAR</strong>
                                  <canvas id="rain" width="50" height="50"></canvas>
                                  <span>17&deg;</span></li>
                                <li class="col-md-3 col-sm-3 col-xs-3"><strong>MIE</strong>
                                  <canvas id="sleet" width="50" height="50"></canvas>
                                  <span>23&deg;</span></li>
                                <li class="col-md-3 col-sm-3 col-xs-3"><strong>JUE</strong>
                                  <canvas id="fog" width="50" height="50"></canvas>
                                  <span>21&deg;</span></li>
                              </ul>
                    	</div>
                    </div>
                    <div class="col-md-3">
                    <!--more statistics box start-->
                </div>
            </div>
        <!-- FIN seccion N1 -->
    </div>
    <!--- --->
    <!-- fin HOME BIENVENIDA -->
  <footer class="sticky-footer">
        Footer contents goes here
    </footer>
</section>
<!-- Placed js at the end of the document so the pages load faster
<script src="../../js/jquery-1.10.2.min.js"></script>
<script src="../../js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="../../js/jquery-migrate-1.2.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/modernizr.min.js"></script>
<script src="../../js/jquery.nicescroll.js"></script>
 -->
<!--easy pie chart-->
<script src="../../js/easypiechart/jquery.easypiechart.js"></script>
<script src="../../js/easypiechart/easypiechart-init.js"></script>

<!--Sparkline Chart-->
<script src="../../js/sparkline/jquery.sparkline.js"></script>
<script src="../../js/sparkline/sparkline-init.js"></script>

<!--icheck -->
<script src="../../js/iCheck/jquery.icheck.js"></script>
<script src="../../js/icheck-init.js"></script>

<!-- jQuery Flot Chart-->
<script src="../../js/flot-chart/jquery.flot.js"></script>
<script src="../../js/flot-chart/jquery.flot.tooltip.js"></script>
<script src="../../js/flot-chart/jquery.flot.resize.js"></script>


<!--Morris Chart-->
<script src="../../js/morris-chart/morris.js"></script>
<script src="../../js/morris-chart/raphael-min.js"></script>

<!--Calendar-->
<script src="../../js/calendar/clndr.js"></script>
<script src="../../js/calendar/evnt.calendar.init.js"></script>
<script src="../../js/calendar/moment-2.2.1.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>


<!--Dashboard Charts-->
<script src="../../js/dashboard-chart-init.js"></script>

<!--SkyCons-->  
<script type="text/javascript" src="../../js/skycons/skycons.js"></script> 


<script>
      var icons = new Skycons({"color": "#fff"}),
          list  = [
            "clear-day", "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
            "fog"
          ],
          i;

      for(i = list.length; i--; )
        icons.set(list[i], list[i]);

      icons.play();
    </script> 
<!--common scripts for all pages-->

</body>
</html>
