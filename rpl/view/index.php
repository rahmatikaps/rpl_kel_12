<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Title here -->
		<title>E - Letter - Fakultas Teknologi Informasi | UNAND</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="view/css/bootstrap.min.css" rel="stylesheet">
		<!-- jQuery UI -->
		<link rel="stylesheet" href="view/css/jquery-ui.css"> 
		
		<!-- Font awesome CSS -->
		<link href="view/css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="view/css/style.css" rel="stylesheet">
		<!-- Widgets stylesheet -->
		<link href="view/css/widgets.css" rel="stylesheet">   

		
		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
	</head>
	
	<body>
        <?php 
		  require_once('lib/mainClass.php');
		?>
		<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
			<div class="container">
				<!-- Menu button for smallar screens -->
				<div class="navbar-header">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="index.html" class="navbar-brand"><span class="bold">E - Letter</span> Fakultas Teknologi Informasi | Universitas Andalas</a>
				</div>
				<!-- Site name for smallar screens -->
				<!-- Navigation starts -->
				<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">     
					<!-- Links -->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">            
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<?php if($_SESSION['tipe_user']==1) { echo "Admin"; } else { echo "Staf"; } ?> <b class="caret"></b>  
							</a>
							<!-- Dropdown menu -->
							<ul class="dropdown-menu">
							<li><a href="control/proses.php?do=logout"><i class="fa fa-power-off"></i> Logout</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>

		<!-- Main content starts -->
		<div class="content">
			<!-- Sidebar -->
			<div class="sidebar">
				<div class="sidebar-dropdown"><a href="#">Navigation</a></div>
				<div class="sidebar-inner">
					<!--- Sidebar navigation -->
					<!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
					<ul class="navi">
						<!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

						<li class="nred current"><a href="index.php"><i class="fa fa-desktop"></i> Dashboard</a></li>
						<!-- Menu with sub menu -->
                         <?php if($_SESSION['tipe_user']==1) { ?>
						<li class="has_submenu nlightblue">
							<a href="#">
								<!-- Menu name with icon -->
								<i class="fa fa-user"></i> Pengguna 
								<!-- Icon for dropdown -->
								<span class="pull-right"><i class="fa fa-angle-down"></i></span>
							</a>
							<ul>
								<li><a href="?layout=list_user">List Pengguna</a></li>
								<li><a href="?layout=registrasi_user">Pendaftaran Pengguna</a></li>
							</ul>
						</li>
                        <li class="nblue"><a href="?layout=jenis_surat"><i class="fa fa-envelope-o"></i>Jenis Surat</a></li>
                        <?php } ?>
						<li class="has_submenu nviolet">
							<a href="#">
								<i class="fa fa-file-o"></i> Surat Masuk
								<span class="pull-right"><i class="fa fa-angle-down"></i></span>
							</a>
							<ul>
                              <?php if($_SESSION['tipe_user']==1) { ?>
								<li><a href="?layout=input_sm">Registrasi Surat Masuk</a></li>
                                <?php } ?>
								<li><a href="?layout=list_sm">List Surat Masuk</a></li>
							</ul>
						</li> 
                        <?php if(($_SESSION['tipe_user']==1)||($_SESSION['tipe_user']==3)) { ?>
						<li class="has_submenu nblue">
							<a href="#">
								<i class="fa fa-file-o"></i> Surat Keluar
								<span class="pull-right"><i class="fa fa-angle-down"></i></span>
							</a>
							<ul>
                            <?php if($_SESSION['tipe_user']==1) { ?>
								<li><a href="?layout=input_sk">Registrasi Surat Keluar</a></li>
                            <?php } ?> 
                            
								<li><a href="?layout=list_sk">List Surat Keluar</a></li>
							</ul>
						</li>
                        <?php } ?>
					</ul>
					<!--/ Sidebar navigation -->

					<!--<!-- Date 
					<div class="sidebar-widget">
						<div id="todaydate"></div>
					</div>-->
				</div>
			</div>
			<!-- Sidebar ends -->

			<!-- Main bar -->
			<div class="mainbar">
      
				<!-- Page heading -->
				<div class="page-head">
				<!-- Page heading -->
					<h2 class="pull-left">
					<?php
					  if(isset($_GET['layout']))
					    {
							if($_GET['layout']=='list_sm')
							  {
								  echo "Surat Masuk";
							  }
							elseif($_GET['layout']=='list_sk')
							  {
								  echo "Surat Keluar";
							  }
						}
					  else
					    {
							echo "Dashboard";
						}
					?>
					  <!-- page meta -->
					  <span class="page-meta"><?php echo "Selamat Datang <b>".$_SESSION['jabatan']."</b>"; ?></span>
					</h2>
					<div class="clearfix"></div>
				</div><!--/ Page heading ends -->
				<!-- Matter -->
				<div class="matter">
					<div class="container">
						<?php  
						   $layout = new indexcontrol();
						   $layout->pagecontrol();
						?>  
					</div>
				</div><!--/ Matter ends -->
			</div><!--/ Mainbar ends -->	    	
			<div class="clearfix"></div>
		</div><!--/ Content ends -->

		 

		<!-- Scroll to top -->
		<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="view/js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="view/js/bootstrap.min.js"></script>
		<!-- jQuery UI -->
		<script src="view/js/jquery-ui.min.js"></script> 
		<!-- jQuery Flot -->
		<script src="view/js/excanvas.min.js"></script>
		<script src="view/js/jquery.flot.js"></script>
		<script src="view/js/jquery.flot.resize.js"></script>
		<script src="view/js/jquery.flot.pie.js"></script>
		<script src="view/js/jquery.flot.stack.js"></script>
		<!-- Sparklines -->
		<script src="view/js/sparklines.js"></script> 
		<!-- Tikluszoom -->
        <script src="view/js/tikluszoom.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="view/js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="view/js/html5shiv.js"></script>
		<!-- Custom JS -->
		<script src="view/js/custom.js"></script>
		
		<!-- Script for this page -->
		<script src="view/js/sparkline-index.js"></script>
		
		<script type="text/javascript">
		$(function () {

			/* Bar Chart starts */

			var d1 = [];
			for (var i = 0; i <= 30; i += 1)
				d1.push([i, parseInt(Math.random() * 30)]);

			var d2 = [];
			for (var i = 0; i <= 30; i += 1)
				d2.push([i, parseInt(Math.random() * 30)]);


			var stack = 0, bars = true, lines = false, steps = false;
			
			function plotWithOptions() {
				$.plot($("#bar-chart"), [ d1, d2 ], {
					series: {
						stack: stack,
						lines: { show: lines, fill: true, steps: steps },
						bars: { show: bars, barWidth: 0.8 }
					},
					grid: {
						borderWidth: 0, hoverable: true, color: "#777"
					},
					colors: ["#52b9e9", "#0aa4eb"],
					bars: {
						  show: true,
						  lineWidth: 0,
						  fill: true,
						  fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
					}
				});
			}

			plotWithOptions();
			
			$(".stackControls input").click(function (e) {
				e.preventDefault();
				stack = $(this).val() == "With stacking" ? true : null;
				plotWithOptions();
			});
			$(".graphControls input").click(function (e) {
				e.preventDefault();
				bars = $(this).val().indexOf("Bars") != -1;
				lines = $(this).val().indexOf("Lines") != -1;
				steps = $(this).val().indexOf("steps") != -1;
				plotWithOptions();
			});

			/* Bar chart ends */

		});


		/* Curve chart starts */

		$(function () {
			var sin = [], cos = [];
			for (var i = 0; i < 14; i += 0.5) {
				sin.push([i, Math.sin(i)]);
				cos.push([i, Math.cos(i)]);
			}

			var plot = $.plot($("#curve-chart"),
				   [ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
					   series: {
						   lines: { show: true, 
									fill: true,
									fillColor: {
									  colors: [{
										opacity: 0.05
									  }, {
										opacity: 0.01
									  }]
								  }
						  },
						   points: { show: true }
					   },
					   grid: { hoverable: true, clickable: true, borderWidth:0 },
					   yaxis: { min: -1.2, max: 1.2 },
					   colors: ["#fa3031", "#43c83c"]
					 });


			function showTooltip(x, y, contents) {
				$('<div id="tooltip">' + contents + '</div>').css( {
					position: 'absolute',
					display: 'none',
					top: y + 5,
					width: 100,
					left: x + 5,
					border: '1px solid #000',
					padding: '2px 8px',
					color: '#ccc',
					'background-color': '#000',
					opacity: 0.9
				}).appendTo("body").fadeIn(200);
			}

			var previousPoint = null;
			$("#curve-chart").bind("plothover", function (event, pos, item) {
				$("#x").text(pos.x.toFixed(2));
				$("#y").text(pos.y.toFixed(2));

					if (item) {
						if (previousPoint != item.dataIndex) {
							previousPoint = item.dataIndex;
							
							$("#tooltip").remove();
							var x = item.datapoint[0].toFixed(2),
								y = item.datapoint[1].toFixed(2);
							
							showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
						}
					}
					else {
						$("#tooltip").remove();
						previousPoint = null;            
					}
			}); 

			$("#curve-chart").bind("plotclick", function (event, pos, item) {
				if (item) {
					$("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
					plot.highlight(item.series, item.datapoint);
				}
			});

		});

		/* Curve chart ends */
		</script>

	</body>
</html>