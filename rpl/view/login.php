<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- Title here -->
		<title>E-Letter</title>
		<!-- Description, Keywords and Author -->
		<meta name="description" content="Your description">
		<meta name="keywords" content="Your,Keywords">
		<meta name="author" content="ResponsiveWebInc">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Styles -->
		<!-- Bootstrap CSS -->
		<link href="view/css/bootstrap.min.css" rel="stylesheet">
		<!-- Font awesome CSS -->
		<link href="view/css/font-awesome.min.css" rel="stylesheet">		
		<!-- Custom CSS -->
		<link href="view/css/style.css" rel="stylesheet">
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="#">
	</head>
	
	<body style="background-color:#CCC">

		<!-- Form area -->
        <?php 
		  if(isset($_GET['status']))
		    {
				if($_GET['status']=='error')
				  { ?>
		<div class="admin-form">
          <div class="widget wred">
					<div class="widget-head">
					  <center>Username Atau Password yang anda masukkan salah</center>
				    </div> 
                    </div> 
                    </div>
				  <?php }
			}
		?>
		<div class="admin-form">
			<!-- Widget starts -->
			<div class="widget worange">
				<!-- Widget head -->
				<div class="widget-head">
					<i class="fa fa-lock"></i> Login 
				</div>

				<div class="widget-content">
					<div class="padd">
						<!-- Login form -->
						<form class="form-horizontal" action="control/proses.php?do=login" method="post">
							<!-- Email -->
							<div class="form-group">
								  <label class="control-label col-lg-3" for="inputEmail">Username</label>
								  <div class="col-lg-9">
									<input type="text" name="username" class="form-control" id="inputEmail" placeholder="Username">
								  </div>
							</div>
							<!-- Password -->
							<div class="form-group">
								  <label class="control-label col-lg-3" for="inputPassword">Password</label>
								  <div class="col-lg-9">
									<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
								  </div>
							</div>
							<!-- Remember me checkbox and sign in button -->
							<div class="form-group">
								<!--<div class="col-lg-9 col-lg-offset-3">
									<div class="checkbox">
										<label>
											<input type="checkbox"> Remember me
										</label>
									</div>
								</div>-->
								<div class="col-lg-9 col-lg-offset-3">
									<button name="signin" type="submit" class="btn btn-danger">Sign in</button>
									<button type="reset" class="btn btn-default">Reset</button>
								</div>
							</div>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="widget-foot">
				  <!--Not Registred? <a href="#">Register here</a>-->
				</div>
			</div>  
		</div>
	

		<!-- Javascript files -->
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Respond JS for IE8 -->
		<script src="js/respond.min.js"></script>
		<!-- HTML5 Support for IE -->
		<script src="js/html5shiv.js"></script>
	</body>	
</html>