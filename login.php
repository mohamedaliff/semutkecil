

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
     <link rel="icon" type="image/ico" href="image/favicon.ico">
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
		
		<style>
			.form-control2 {
			  display: block;
			  width: 100%;
			  height: 34px;
			  padding: 6px 12px;
			  font-size: 14px;
			  line-height: 1.428571429;
			  color: #111;
			  background-color: #fff;
			  background-image: none;
			  border: 1px solid #888;
			  border-radius: 4px;
			  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			          box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
			  -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
			          transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
			}
			.form-control2:focus {
			  border-color: #66afe9;
			  outline: 0;
			  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
			          box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6);
			}
			.form-control2:-moz-placeholder {
			  color: #666;
			}
			.form-control2::-moz-placeholder {
			  color: #666;
			  opacity: 1;
			}
			.form-control2:-ms-input-placeholder {
			  color: #666;
			}
			.form-control2::-webkit-input-placeholder {
			  color: #666;
			}
			.form-control2[disabled],
			.form-control2[readonly],
			fieldset[disabled] .form-control2 {
			  cursor: not-allowed;
			  background-color: #eee;
			  opacity: 1;
			}
			textarea.form-control2 {
			  height: auto;
			}					
		</style>
		
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
								<header class="panel-heading alt" style="background-color:#393D5C;color:yellow;">
									Please login to continue
								</header>
								<div class="panel-body">
									<div class="col-lg-4">
										<form id="fm1" name="fm1" action="loginFunction.php" method="post" onsubmit="return validateLogin();">
											<div class="form-group">
												<div class="iconic-input">
	                                            	<i  style="color: #888;"></i>
	                                            	<input type="text" class="form-control2" id="username" name="txtUsername" tabindex="1" placeholder="Username" autofocus autocomplete="off" onchange="checkDirectLogin()">
	                                          	</div>
											</div>
											<div class="form-group">
												<div class="iconic-input">
	                                            	<i style="color: #888;"></i>
	                                            	<input type="password" class="form-control2" id="password" name="txtPassword" tabindex="2" placeholder="Password" autocomplete="off">
	                                          	</div>
											</div>
											<div class="form-group">
												<!--div><a href="forgetPassword?service=http://elearn.unikl.edu.my/login/index.php?authCAS=CAS">Forgot password?</a></div-->
												<div><a href="#" onclick="promptForgotPassword()">Forgot password?</a></div>
												<div><a href="#">Change password?</a></div>
												<div><a href="#">Stuck at login? Click here to attempt fix & login again</a></div>
												<div><a href="#" onclick="clearCacheGuide()">Guide to clear your browser's cache</a></div>
											</div>
											<div class="form-group">
												
											</div>
											<input type="hidden" name="lt" value="e1s1" />
											<input type="hidden" name="_eventId" value="submit" />
											<button type="submit" name="submit2" class="btn btn-success" tabindex="3">Login</button>
											<button type="reset" name="reset" class="btn btn-danger" tabindex="4">Clear</button>
										</form>
									</div>
									<div class="col-lg-8">
							            <p>Dear all,</p>
						
							            <p>If you have any technical difficulty to login to E-INTRA, please drop us an email to <a href="#">helpdesk@unikl.edu.my</a> with the following information: </p>
							            <ol>
							              <li>Your name:</li>
							              <li>Your Student/Staff ID:</li>
							              <li>Your contact Number:</li>
							              <li>Type of problem:</li>
							              <li>Type of brower used (e.g: Internet Explorer):</li>
							              <li>Screenshots/screen dump of error (If available) </li>
							            </ol>
										<p>ITD</p>									
									</div>
								</div>
							</section>
						</div>
					</div>
					<div class="row">				
						<div class="col-lg-4" id="help">
							<section class="panel">
								<header class="panel-heading alt"  style="background-color:#393D5C;color:yellow;">
									Frequently Asked Questions (FAQ)
								</header>
								<div class="panel-body">
									If you have difficulties to login, please read the <a data-toggle="modal" href="#faqModal">FAQ</a>
								</div>
							</section>
						</div>
						<div class="col-lg-8" id="help">
							<section class="panel">
								<header class="panel-heading alt"  style="background-color:#393D5C;color:yellow;">
									Support & Assistance
								</header>
								<div class="panel-body">
									<p><i class="fa fa-envelope"></i>&nbsp;&nbsp;Hunting Line: <a href="tel:60321754488">03-21754488</a></p>
									<p><i class="fa fa-envelope"></i>&nbsp;&nbsp;ITD Chancellery Helpdesk: <a href="mailto:helpdesk@unikl.edu.my">helpdesk@unikl.edu.my</a></p>
									<p>ITD, Universiti Kuala Lumpur, 1016, Jalan Sultan Ismail 50250 Kuala Lumpur</p>
								</div>
							</section>
						</div>						
					</div>
				</section>
			</section>
			<!--footer start-->
			<!--footer class="site-footer">
				<div class="text-center">
					2014 &copy;UniKL
					<a href="#" class="go-top">
					<i class="fa fa-angle-up"></i>
					</a>
				</div>
			</footer-->
			<!--footer end-->
		</section>
		
		<div aria-hidden="true" aria-labelledby="faqModalLabel" role="dialog" tabindex="-1" id="faqModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button aria-hidden="true" data-dismiss="modal" class="close" type="button">Ã—</button>
                        <h4 class="modal-title">Frequently Asked Questions (FAQ)</h4>
                    </div>
                    <div class="modal-body" style="background-color: #f1f2f7;">
						<div id="accordion" class="panel-group m-bot20">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
										What is portal login?
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse in" id="collapseOne">
									<div class="panel-body">
										With portal login you only have one username and password  for access all UniKL application.
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
											What  is the URL address for Portal Login
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseTwo">
									<div class="panel-body">
										<a href="https://cas.unikl.edu.my">https://cas.unikl.edu.my</a>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
											I  forgot my username?
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseThree">
									<div class="panel-body">
										Username will always be your Student ID/Staff ID.
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseFour" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
											I  forgot my password?
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseFour">
									<div class="panel-body">
										Please  clickÃ‚ <em><u>HERE</u></em>Ã‚ if you forgot  your password.
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseFive" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
											How  to I change my password?
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseFive">
									<div class="panel-body">
										Select Preference from the menu and enter the required  information. Your password is case sensitive, must be at least 8 characters  long and maximum is 12 characters.
									</div>
								</div>
							</div>							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseSix" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
											First  time user (Student)
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseSix">
									<div class="panel-body">
										Your  Username will always be your Student ID. For first time login, your password  will be your IC No without '-'. You will be automatically required to change to  new password on your first login. Minimum character for password is 8, and  maximum character is 12. For international students, your password will be your  passport number.
									</div>
								</div>
							</div>							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseSeven" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
											First  time user (Staff)
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseSeven">
									<div class="panel-body">
										Your  Username will always be your Staff ID. For first time login, your password will  be your IC No without '-'. You will be automatically required to change to new  password on your first login. Minimum character for password is 8, and maximum  character is 12. For international staffs, your password will be your passport number.
									</div>
								</div>
							</div>							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseEight" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
											Any  preferred/recommended browsers to be used?
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseEight">
									<div class="panel-body">
										Internet Explorer 8 and above, Mozilla Firefox 20 and above, Google Chrome 20 and above, Android Chrome, and IOS Safari are supported.
									</div>
								</div>
							</div>																												
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseNine" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
											Who  do I call for support?
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseNine">
									<div class="panel-body">
										<p>If you have any technical difficulty to login, please drop  us an email to helpdesk@unikl.edu.myÃ‚  or  contactÃ‚  us at 03-21754488 with the  following information: </p>
										<ul>
											<li>Your  name: </li>
											<li>Your  Student/Staff ID: </li>
											<li>Your  contact Number: </li>
											<li> Type of  problem: </li>
											<li> Type of  browser used (e.g.: Internet Explorer): </li>
											<li> Screenshots/screen  dump of error (If available</li>
										</ul>
									</div>
								</div>
							</div>
							<!--div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseTen" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
										
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseTen">
									<div class="panel-body">
									
									</div>
								</div>
							</div-->							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseEleven" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
											Unable  to login (Staff)
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseEleven">
									<div class="panel-body">
										Your  account will automatically locked after 5th tries. Kindly seek assistance from IT of your campus to unlock &amp; reset your password.
									</div>
								</div>
							</div>	
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="#collapseTwelve" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
											Unable  to login (Student)
										</a>
									</h4>
								</div>
								<div class="panel-collapse collapse" id="collapseTwelve">
									<div class="panel-body">
										Only active student may access ECITIE online services. For  more information please contact your academic services at your campus.
									</div>
								</div>
							</div>																						
						</div>
						<button type="button" class="btn btn-success" onclick="$('#faqModal').modal('hide');">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div aria-hidden="true" aria-labelledby="browserNotCompatibleModalLabel" role="dialog" tabindex="-1" id="browserNotCompatibleModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<p>Sorry, your browser is no longer compatible with UniKL Single Sign-On. Kindly use either the following browser :</p>
					<div>&nbsp;</div>
					<ul>
						<li>Internet Explorer 10 or above</li>
						<li>Google Chrome 10 or above</li>
						<li>Mozilla Firefox 5 or above</li>
						<li>Apple Safari 5 or above</li>
						<li>Chrome for Android for Android 4.0 or above</li>
						<li>Safari for IOS 6.0 or above</li>							
					</ul>
					<div>&nbsp;</div>
					<p>Thank you.</p>
				</div>
			</div>
		</div>
		
		<div aria-hidden="true" aria-labelledby="forgotPasswordModalLabel" role="dialog" tabindex="-1" id="forgotPasswordModal" class="modal fade">
			<div class="modal-dialog modal-dialog-center">
				<div class="modal-content">
					<div class="modal-header">
						<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
						<h4 class="modal-title">Forgot Password?</h4>
					</div>
					<div class="modal-body">
						<p>Kindly drop us an email to <a href="#" onclick="emailForgotPassword()">helpdesk@unikl.edu.my</a> with the following information: </p>
			            <ol>
			              <li>Your name:</li>
			              <li>Your Student/Staff ID:</li>
			              <li>Your contact Number:</li>
			              <li>Type of problem: Forgot password</li>
			            </ol>
						<p>ITD</p>
						<div class="form-group">
							<button type="button" class="btn btn-success" onclick="emailForgotPassword()">Open my email app</button>
							<button type="button" class="btn btn-success" onclick="$('#forgotPasswordModal').modal('hide');">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div aria-hidden="true" aria-labelledby="clearCacheGuideModalLabel" role="dialog" tabindex="-1" id="clearCacheGuideModal" class="modal fade">
			<div class="modal-dialog modal-dialog-center">
				<div class="modal-content">
					<div class="modal-header">
						<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
						<h4 class="modal-title">How to clear your browser's cache</h4>
					</div>
					<div class="modal-body">
						<p>To clear your browser's cache follow the steps below :</p>
						<div>&nbsp;</div>
						<p>1. Clear browser cache</p>
						<div>&nbsp;</div>
						<p>&nbsp;&nbsp;&nbsp;For Google Chrome : <a href="http://www.refreshyourcache.com/en/chrome-27/" target="_blank">Click here</a></p>
						<div>&nbsp;</div> 
						<p>&nbsp;&nbsp;&nbsp;For Mozilla Firefox : <a href="https://support.mozilla.org/en-US/kb/how-clear-firefox-cache" target="_blank">Click here</a></p>
						<div>&nbsp;</div>
						<p>&nbsp;&nbsp;&nbsp;IE 10 & 11 (IE8 and below not supported) : <a href="http://www.refreshyourcache.com/en/internet-explorer-11/" target="_blank">Click here</a></p>
						<div>&nbsp;</div>
						<p>2. Change browser</p>
						<div>&nbsp;</div>
						<p>Sorry for all inconvenience caused.</p>
						<div class="form-group">
							<button type="button" class="btn btn-success" onclick="$('#clearCacheGuideModal').modal('hide');">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div aria-hidden="true" aria-labelledby="forgotPasswordProgressModalLabel" role="dialog" tabindex="-1" id="forgotPasswordProgressModal" class="modal fade">
			<div class="modal-dialog modal-dialog-center">
				<div align="center"><img src="images/wait.gif"></div>
				<div align="center" style="color:#fff;">Opening your email app ... Please wait</div>
			</div>
		</div>
		
		<!-- js placed at the end of the document so the pages load faster -->
		<script src="logon/jquery.js"></script>
		<script src="logon/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/common_rosters.js"></script>		
		<script language="javascript">
		   	function validateLogin ()
		   	{
		   		//console.log("validateLogin");
		   		if (document.fm1.username.value==null || document.fm1.username.value == "")
		   		{
		   			alert ("Please enter your username");
		   			return false;
		   		}
		   		if (document.fm1.password.value==null || document.fm1.password.value == "")
		   		{
		   			alert ("Please enter your password");
		   			return false;
		   		}
		   		/*localStorage.setItem("casSubmitLogin", "STAFF");
		   		localStorage.setItem("casSubmitUsername", document.fm1.username.value);
		   		localStorage.setItem("casSubmitPassword", document.fm1.password.value);*/
		   		return true;
		   	}
		
		   	function promptForgotPassword ()
		   	{
		   		$("#forgotPasswordModal").modal("show");
		   	}
		   	
		   	function emailForgotPassword ()
		   	{
		   		var subject = "Forgot Password";
		   		var body =  "Name: %0D%0A" +
		   					"Student/Staff ID : "+document.fm1.username.value+"%0D%0A" +
		   		     		"Contact Number :%0D%0A" +
		   		     		"Type of problem : Forgot my password";
		   		$("#forgotPasswordModal").modal("hide");
		   		$("#forgotPasswordProgressModal").modal("show");
		   		setTimeout (function(){
		   			$("#forgotPasswordProgressModal").modal("hide");
		   			}, 3000);
		   		window.location="mailto:helpdesk@unikl.edu.my?subject="+subject+"&body="+body;
		   	}
		   	
		   	function clearCacheGuide ()
		   	{
		   		$("#clearCacheGuideModal").modal("show");
		   	}
		   	
			$(document).ready(function ()
			{
				var serviceUrl = 'http://elearn.unikl.edu.my/login/index.php?authCAS=CAS';
				//console.log(serviceUrl);
				// Fix for users stuck at login page after entering username & password
		   		if(typeof(Storage)!=="undefined")
		   		{
		   			
		   				/*if (localStorage.getItem("casSubmitLogin")!=null && localStorage.getItem("casSubmitLogin")!="")
		   				{
		   					window.location.assign ("/cas-web/fixStuckSubmitLogin.jsp");
		   				}*/
		   			
		   			/*if ( localStorage.getItem("casSubmitLogin")!=null && localStorage.getItem("casSubmitLogin")!=""
		   				&& localStorage.getItem("casSubmitUsername")!=null && localStorage.getItem("casSubmitUsername")!=""
		   				&& localStorage.getItem("casSubmitPassword")!=null && localStorage.getItem("casSubmitPassword")!="" )
		   			{
		   				$("#username").val(localStorage.getItem("casSubmitUsername"));
						$("#password").val(localStorage.getItem("casSubmitPassword"));
		   				document.fm1.submit();
		   			}*/
		   			/*if (serviceUrl.indexOf("home.htm")==-1) // Email link redirect
		   			{
		   				var onlineDirectLink = "http://online1.unikl.edu.my" +
		   					serviceUrl.substring(serviceUrl.indexOf("spring-security-redirect=")+25,serviceUrl.length);
		   				localStorage.setItem("onlineDirectLink",onlineDirectLink);
		   			}
		   			else // Clear Email link redirect
		   				localStorage.removeItem("onlineDirectLink");*/
		   			
		   			// Store service URL into HTML5 storage
		   			console.log(serviceUrl);
		   			localStorage.setItem("serviceUrl", serviceUrl);
		   		}
		   		else // Browser not HTML5-compliant
		   			$("#browserNotCompatibleModal").modal("show");
				
				/*if(typeof(Storage)!=="undefined")
				{
					console.log("token="+localStorage.getItem("token"));
					// Check whether token local storage exists, if yes, submit login
					if (localStorage.getItem("token")!=null && localStorage.getItem("token")!="")
					{
						console.log("localStorage token found. Submitting ...");
						$("#username").val(localStorage.getItem("token"));
						$("#password").val("dummy");
						document.fm1.submit();
					}
				}
				else // Browser not HTML5-compliant
				{
					$("#browserNotCompatibleModal").modal("show");
				}*/
				
		   		$('a[href^=mailto]').each(function() {
		   		    var href = $(this).attr('href');
		   		    $(this).click(function() {
		   		      var t;
		   		      var self = $(this);

		   		      $(window).blur(function() {
		   		    	// The browser apparently responded, so stop the timeout.
		   		        clearTimeout(t);
		   		     	//$("#forgotPasswordProgressModal").modal("hide");
		   		      });

		   		      t = setTimeout(function() {
		   		        // The browser did not respond after 500ms, so open an alternative URL.
		   		        //$("#forgotPasswordProgressModal").modal("hide");
		   		        $("#forgotPasswordModal").modal("show");
		   		      }, 500);
		   		    });
		   		  });
		    });
			
			function checkDirectLogin ()
			{
				if (document.fm1.username.value!=null && document.fm1.username.value != ""
						&& document.fm1.username.value=="521725") // For En Mazli
				{
					//console.log("redirect to cas-web-direct");
					window.location = "https://cas.unikl.edu.my/cas-web-direct/login?username2="+document.fm1.username.value;
				}
				/*else if (document.fm1.username.value!=null && document.fm1.username.value != ""
					&& document.fm1.username.value=="portaladmin") // For portaladmin
				{
					//console.log("redirect to cas-web-direct");
					window.location = "https://cas.unikl.edu.my/cas-web/login?service=https://portal.unikl.edu.my/c/portal/login?redirect=%2Fgroup%2Funikl%2Fhome2&p_l_id=99001";
				}*/
			}
		</script>
	</body>
</html>