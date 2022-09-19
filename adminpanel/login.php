<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$warningmsg = "";
$loggedin = false;
if(isset($_SESSION["loggeduser"]))
{
	if($_SESSION["loggeduser"]["role"] != 1)
	{
		$warningmsg = "You don't have the privileges to access this page!";
	}
	else
	{
		header('Location: index.php');
		die();
	}
}

if(isset($_POST["email"]) && isset($_POST["password"]))
{
	include "../controller/mysqliHelper.php";

	$mysqli = mysqliHelper::getCon();
	$email = $mysqli->real_escape_string($_POST["email"]);
	$password = $mysqli->real_escape_string($_POST["password"]);


	$obj = $mysqli->query("SELECT * FROM `users` WHERE email='$email' AND psw='$password' LIMIT 1");
	if(!$obj)
    {
        echo("Error description: " . $mysqli -> error);
        die();
    }

	$theaccount = mysqli_fetch_assoc($obj);

	if($theaccount)
	{
		if($theaccount["role"] != 1)
		{
			$warningmsg = "You don't have the privileges to access this page!";
		}
		else
		{
			$_SESSION["loggeduser"] = $theaccount;
/*
			$_SESSION["loggeduser"]["id"] = $theaccount["id"];
			$_SESSION["loggeduser"]["nom"] = $theaccount["nom"];
			$_SESSION["loggeduser"]["prenom"] = $theaccount["prenom"];*/
			header('Location: index.php');
			die();

		}
	}
	else
	{
		$warningmsg = "Wrong credentials please try again!";

	}


}





?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.adminkit.io/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 01:35:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="pages-sign-in.html" />

	<title>Sign In | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">

	<!-- BEGIN SETTINGS -->
	<script src="js/settings.js"></script>
	<!-- END SETTINGS -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-10', { 'anonymize_ip': true });
</script></head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar: left (default), right
-->

<body data-theme="default" data-layout="fluid" data-sidebar="left">
	<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<img src="../images/logo2.png" style="  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
">
						<div class="text-center mt-4">
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
								<form method="POST" name="loginForm" id="loginForm">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
											<small>
												<a href="pages-reset-password.html">Forgot password?</a>
											</small>
										</div>
										<div>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
												<span class="form-check-label">
													Remember me next time
												</span>
											</label>
										</div>
										<div class="text-center mt-3">
											<a onclick="loginpls()" class="btn btn-lg btn-primary">Sign in</a>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
										</div>
									</form>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

<script>



<?php


	
						if($warningmsg != "")
						{
							echo '
							window.notyf.open({
								type:"danger",
								message:"'.$warningmsg.'",
								duration:"5000",
								ripple:true,
								dismissible:false,
								position: {
									x: "center",
									y: "top"
								}
							});
			
							
							
							
							
							
							
							
							
							
							
							';

						}
?>

function loginpls() {
        //e.preventDefault();


    	document.getElementById("loginForm").submit();




    }






  document.addEventListener("DOMContentLoaded", function(event) { 
    
  });
</script></body>


<!-- Mirrored from demo.adminkit.io/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 01:35:33 GMT -->
</html>