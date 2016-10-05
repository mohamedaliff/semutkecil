





<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Mosaddek">
		<meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
		<link rel="shortcut icon" href="img/favicon.png">
		<title>UniKL Single Sign-On</title>
		<script src="logon/jquery-1.8.3.min.js"></script>
		<!-- Bootstrap core CSS -->
		<link href="logon/bootstrap.min.css" rel="stylesheet">
		<link href="logon/bootstrap-reset.css" rel="stylesheet">
		<!--external css-->
		<link href="logon/font-awesome.css" rel="stylesheet" />
		<!-- Custom styles for this template -->
		<link href="logon/style.css" rel="stylesheet">
		<link href="logon/style-responsive.css" rel="stylesheet" />
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="logon/style.css" media="screen" />
		<script>
			$(document).ready(function ()
			{
				/*localStorage.removeItem("username");
				localStorage.removeItem("token");
				localStorage.removeItem("userType");*/
				localStorage.removeItem("casSubmitLogin");
				localStorage.removeItem("casSubmitUsername");
				localStorage.removeItem("casSubmitPassword");
			});
		</script>
	</head>
	
	<body id="cas" class="full-width">
		<section id="container" class="">
			<!--header start-->
			<header class="header" style="background-color:#393D5C;color:yellow;">
				<!--logo start-->
				<a class="navbar-brand" href="#" style="color:yellow;"><img src="image/unikl.png"width="50" height="25" border="0"> Single<span>&nbsp;Sign-On</span></a>
				<!--logo end-->
			</header>
			<!--header end-->
			<section id="main-content">
				<section class="wrapper">
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<div class="panel-body">
									<h2>Logout successful</h2>
									<div>&nbsp;</div>
									<p>You have successfully logged out from E-INTRA.</p>
									<div>&nbsp;</div>
									<div><a href="index.html">Return</a></div>
								</div>
							</section>
						</div>
					</div>
				</section>
			</section>
		</section>
	</body>
</html>