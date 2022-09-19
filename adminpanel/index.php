<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["loggeduser"]) || $_SESSION["loggeduser"]["role"] != 1)
{
	header('Location: login.php?nop');
	die();
}


$mysqli = include "../controller/mysqliHelper.php";

$mysqli = mysqliHelper::getCon();



$reportstable = $mysqli->query("SELECT * FROM `reports`") or die("db error");
$numrows = mysqli_num_rows($reportstable);
$numrowsAccepted = 0;
$numrowsPending = 0;
$fieldstable = $mysqli->query("SELECT * FROM `infos`") or die("db error");

while($row = $fieldstable->fetch_assoc()) {

	$fieldsObject[$row["fieldName"]] = $row["value"];



}
$numrowsDeleted = $fieldsObject["reportsDeleted"];

while($row = $reportstable->fetch_assoc()) {

	if($row["status"] == 1)
	{
		$numrowsAccepted++;
	}
	else
	{
		$numrowsPending++;
	}
	$date = strtotime($row["time"]); 
	if(isset($dates[date('j/m', $date)]))
	{
		$dates[date('j/m', $date)] ++;

	}
	else
	{
		$dates[date('j/m', $date)] = 1;

	}


}
/*
foreach($dates as $i => $item) {
	var_dump($i);
}
*/


//var_dump($dates);							






?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.adminkit.io/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 01:35:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="index-2.html" />

	<title>AdminKit Demo - Bootstrap 5 Admin Template</title>

	<link href="css/app.css" rel="stylesheet">

	<!-- BEGIN SETTINGS -->
	<script src="js/settings.js"></script>

	<script src="js/jquery.js"></script>

	<!-- END SETTINGS -->
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
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
					<span class="align-middle">AdminKit</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Pages
					</li>
					<li class="sidebar-item active">
						<a data-target="#dashboards" data-toggle="collapse" class="sidebar-link">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
						</a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
							<li class="sidebar-item active"><a class="sidebar-link" href="index.php">Analytics</a></li>
						</ul>
					</li>

					<li class="sidebar-header">
						Reports
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="reports.php">
							<i class="align-middle" data-feather="list"></i> <span class="align-middle">Reports</span>
						</a>
					</li>


					<li class="sidebar-header">
						Products Management
					</li>
					<li class="sidebar-item">
						<a data-target="#ui" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Products</span>
						</a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="products.php">Products List</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="addproduct.php">Add Product</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="#">Edit Product</a></li>
<li class="sidebar-item"><a class="sidebar-link" href="commandes.php">Commandes</a></li>
						</ul>
					</li>


					<li class="sidebar-header">
						Cliniques Management
					</li>
					<li class="sidebar-item">
						<a data-target="#ui3" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="home"></i> <span class="align-middle">Cliniques</span>
						</a>
						<ul id="ui3" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="cliniques.php">Cliniques List</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="addclinique.php">Add Clinique</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="reservation.php">Reservations</a></li>

							<li class="sidebar-item"><a class="sidebar-link" href="#">Edit Clinique</a></li>
						</ul>
					</li>

					<li class="sidebar-header">
					Livreurs Management
					</li>
					<li class="sidebar-item">
						<a data-target="#ui2" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="truck"></i> <span class="align-middle">Livreurs</span>
						</a>
						<ul id="ui2" class="sidebar-dropdown list-unstyled collapse" data-parent="#sidebar">
						<li class="sidebar-item"><a class="sidebar-link" href="livreur.php">Livreurs List</a></li>
						<li class="sidebar-item"><a class="sidebar-link" href="addlivreur.php">Add Livreur</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="#">Edit Livreur</a></li>
<li class="sidebar-item"><a class="sidebar-link" href="livraison.php">Livraisons</a></li>
<li class="sidebar-item"><a class="sidebar-link" href="#">Edit Livraison</a></li>
						</ul>
					</li>
				</ul>

			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
					<i class="hamburger align-self-center"></i>
				</a>

				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
							<i class="align-middle" data-feather="search"></i>
						</button>
					</div>
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-flag dropdown-toggle" href="#" id="languageDropdown" data-toggle="dropdown">
								<img src="img/flags/us.png" alt="English" />
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
								<a class="dropdown-item" href="#">
									<img src="img/flags/us.png" alt="English" width="20" class="align-middle mr-1" />
									<span class="align-middle">English</span>
								</a>
								<a class="dropdown-item" href="#">
									<img src="img/flags/es.png" alt="Spanish" width="20" class="align-middle mr-1" />
									<span class="align-middle">Spanish</span>
								</a>
								<a class="dropdown-item" href="#">
									<img src="img/flags/ru.png" alt="Russian" width="20" class="align-middle mr-1" />
									<span class="align-middle">Russian</span>
								</a>
								<a class="dropdown-item" href="#">
									<img src="img/flags/de.png" alt="German" width="20" class="align-middle mr-1" />
									<span class="align-middle">German</span>
								</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
								<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark"><?php
								

								echo $_SESSION["loggeduser"]["prenom"] . ' ' . $_SESSION["loggeduser"]["nom"];
								
								
								
								
								
								?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1" data-feather="settings"></i> Settings &
									Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>Analytics</strong> Dashboard</h3>
						</div>

						<div class="col-auto ml-auto text-right mt-n1">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
									<li class="breadcrumb-item"><a href="#">AdminKit</a></li>
									<li class="breadcrumb-item"><a href="#">Dashboards</a></li>
									<li class="breadcrumb-item active" aria-current="page">Analytics</li>
								</ol>
							</nav>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div style="flex:0 0 auto;">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Reports</h5>
													</div>

													<div class="col-auto">
														<div class="avatar">
															<div class="avatar-title rounded-circle bg-primary-light">
																<i class="align-middle" data-feather="users"></i>
															</div>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $numrows;?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Reports Pending</h5>
													</div>

													<div class="col-auto">
														<div class="avatar">
															<div class="avatar-title rounded-circle bg-primary-light">
																<i class="align-middle" data-feather="users"></i>
															</div>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $numrowsPending;?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Reports Accepted</h5>
													</div>

													<div class="col-auto">
														<div class="avatar">
															<div class="avatar-title rounded-circle bg-primary-light">
																<i class="align-middle" data-feather="users"></i>
															</div>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $numrowsAccepted;?></h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>












					<div class="col-xl-6 col-xxl-7">
						<div>
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
												<i class="align-middle" data-feather="more-horizontal"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Reports repartition</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td><i class="fas fa-circle text-primary fa-fw"></i> Reports Pending</td>
													<td class="text-right"><?php echo $numrowsPending;?></td>
												</tr>
												<tr>
													<td><i class="fas fa-circle text-warning fa-fw"></i> Reports Accepted</td>
													<td class="text-right"><?php echo $numrowsAccepted;?></td>
												</tr>
												<tr>
													<td><i class="fas fa-circle text-danger fa-fw"></i> Reports Deleted</td>
													<td class="text-right"><?php echo $numrowsDeleted;?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						
						
					</div>
















						<div>
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-right">
										<div class="dropdown show">
											<a href="#" data-toggle="dropdown" data-display="static">
												<i class="align-middle" data-feather="more-horizontal"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Reports by time</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>








						<div class="col-auto d-none d-sm-block">
							<h3><strong>See, Add And Edit</strong> Admin Fields</h3>
						</div>


						<div class="card" >
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
													</div>

													<div class="col-auto">
														<div class="avatar">
															<div class="avatar-title rounded-circle bg-primary-light">
																<i class="align-middle" data-feather="users"></i>
															</div>
														</div>
													</div>
												</div>


<?php 
foreach ($fieldsObject as $key => $value) : ?>
												<div class="acoolfield row row-cols-md-auto align-items-center">
										<div id="fieldparent1" class="col-12">
											<input id="fieldvalue" type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value="<?= $key ?>">
										</div>

										<div id="valueparent1" class="col-12">
											<div id="valueparent2" class="input-group mb-2 mr-sm-2">
												<div class="input-group-text">=</div>
												<input id="valuefield" type="text" class="form-control" id="inlineFormInputGroupUsername2" value="<?= $value ?>">
											</div>
										</div>

										<div class="col-12">
										<button saveKey="<?= $key ?>" action="save" class="editAField btn btn-primary mb-2">Save</button>
										<?= ($key != "reportsDeleted" && $key != "totalVisitors" && $key != "visitsCount")?'<button action="del" class="editAField btn btn-danger mb-2">Delete</button>':'' ?>
										</div>
									</div>
<br>


<?php endforeach ?>




<button class="addAField btn btn-success">Add Field</button>
												
											</div>
						</div>





						<?php 
foreach ($fieldsObject as $key => $value) : ?>

						<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title"><?= $key ?></h5>
													</div>

													<div class="col-auto">
														<div class="avatar">
															<div class="avatar-title rounded-circle bg-primary-light">
																<i class="align-middle" data-feather="users"></i>
															</div>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?= $value ?></h1>
											</div>
										</div>


										<?php endforeach ?>









					</div>

					

					

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>AdminKit Demo</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>

	<script>






		document.addEventListener("DOMContentLoaded", function() {






			$('.addAField').each(function(btn){
        $(this).click(function(){







			$( '<div class="acoolfield row row-cols-md-auto align-items-center"> <div id="fieldparent1" class="col-12"> <input id="fieldvalue" type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" value=""> </div> <div id="valueparent1" class="col-12"> <div id="valueparent2" class="input-group mb-2 mr-sm-2"> <div class="input-group-text">=</div> <input id="valuefield" type="text" class="form-control" id="inlineFormInputGroupUsername2" value=""> </div> </div> <div class="col-12"> <button action="save" class="editAField btn btn-primary mb-2">Save</button> <button action="del" class="editAField btn btn-danger mb-2">Delete</button> </div> </div> <br>' ).insertBefore( $(this) );


			$('.editAField').each(function(btn){
		$(this).unbind().click(clickEditBtn);
		
			});



		});
			});



			function clickEditBtn(){

$(this).attr("disabled", true);

var statuschange = 0;


switch(this.getAttribute("action"))
{
	case "save":
		statuschange = 1;
		break;
	case "del":
		statuschange = -1;
		break;
}


var originalFieldName = this.getAttribute("saveKey");

// For some browsers, `attr` is undefined; for others,
// `attr` is false.  Check for both.
if (typeof fieldName !== typeof undefined && fieldName !== false) {
	originalFieldName = "null";
}
fieldName = $(this).parent().siblings("#fieldparent1").children("#fieldvalue").val();

	console.log("editafield.php?action="+this.getAttribute("action")+"&orgFieldName=" + originalFieldName + "&fieldName="+ fieldName + "&value=" + $(this).parent().siblings("#valueparent1").children("#valueparent2").children("#valuefield").val());
	$.get( "editafield.php?action="+this.getAttribute("action")+"&orgFieldName=" + originalFieldName + "&fieldName="+ fieldName + "&value=" + $(this).parent().siblings("#valueparent1").children("#valueparent2").children("#valuefield").val(), function( data ) {
		$(this).attr("disabled", false);

		if(statuschange == -1)
		{
			window.notyf.open({
					type:"success",
					message:"Field have been deleted!",
					duration:"5000",
					ripple:true,
					dismissible:false,
					position: {
						x: "center",
						y: "top"
					}
				});
				$(this).remove();
		}
		else
		{
			window.notyf.open({
					type:"success",
					message:"Field have been saved!",
					duration:"5000",
					ripple:true,
					dismissible:false,
					position: {
						x: "center",
						y: "top"
					}
				});
		}

	}.bind(this));


}




			$('.editAField').each(function(btn){
		$(this).click(clickEditBtn);
		
			});








			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			var thevalues = <?php echo json_encode($dates); ?>

			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					
					labels: Object.keys(thevalues),
					datasets: [{
						label: "Reports count:",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: Object.values(thevalues)
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Pending", "Accepted"],
					datasets: [{
						data: [<?php echo $numrowsPending;?>, <?php echo $numrowsAccepted;?>, <?php echo $numrowsDeleted;?>],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new JsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
				nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
			});
		});
	</script>

<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
    setTimeout(function(){
      if(localStorage.getItem('popState') !== 'shown'){
        window.notyf.open({
          type: "success",
          message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
          duration: 10000,
          ripple: true,
          dismissible: false,
          position: {
            x: "left",
            y: "bottom"
          }
        });

        localStorage.setItem('popState','shown');
      }
    }, 15000);
  });
</script></body>


<!-- Mirrored from demo.adminkit.io/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 01:35:32 GMT -->
</html>