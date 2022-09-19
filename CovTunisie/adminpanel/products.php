
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["loggeduser"]) || $_SESSION["loggeduser"]["role"] != 1)
{
	header('Location: login.php?nop');
	die();
}

include '../Products/produit_c.php';
require_once '../Products/produit.php';
$produit_c=new produitC();
$list=$produit_c->retrieveAllproducts();
    





?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.adminkit.io/tables-datatables-responsive.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 01:34:56 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="tables-datatables-responsive.html" />

	<title>Responsive DataTables | AdminKit Demo</title>

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
					<li class="sidebar-item">
						<a data-target="#dashboards" data-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
						</a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="index.php">Analytics</a></li>
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
						<a data-target="#ui" data-toggle="collapse" class="sidebar-link">
							<i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Products</span>
						</a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse show" data-parent="#sidebar">
						<li class="sidebar-item active"><a class="sidebar-link" href="products.php">Products List</a></li>
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

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Products List</h1>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
								
							</div>
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Liste des produits</h5>
								</div>
								<div class="card-body">
									<table id="datatables-reponsive" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Id</th>
                                                <th>Type</th>
                                                <th>Prix</th>
                                                <th>Nombre</th>
												<th>Notice</th>
												<th>Img</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>



											<?php

                                            $list=$produit_c->retrieveAllproducts();
                                            foreach($list as $row) { 
            
											

											echo '<tr>
												<td id="id">' . $row["id"] . '</td>
												<td id="type">' . $row["type"] . '</td>
												<td id="prix">' . $row["prix"] . '</td>
												<td id="nbr">' . $row["nbr"] . '</td>
												<td id="notice">' . $row["notice"] . '</td>
												<td id="notice"><a href="../images/produits/' . $row["img"] . '">' . $row["img"] . '</td>
                                                <td id="actions">
                                                    <form method="POST" style="
                                                    float: left;
                                                ">
                                                        <input type="hidden" value='. $row['id'] . ' name="id">
                                                        <span>
                                                        <button id="edit" formaction="editproduct.php" class="btn btn-success" action="accept"><i class="fa fa-edit"></i></button>

                                                        </span> 
                                                        
                                                    </form>	
                                                    <button id="delete" class="deletebutton btn btn-danger" action="decline"><i class="fas fa-times"></i></button>
                                                    <div id="loading" class="spinner-border spinner-border-sm text-primary mr-2" role="status" style="display:none">

											<span class="sr-only">Loading...</span>
										</div>												</td>
											</tr>';

											}


											?>

										</tbody>
									</table>
								</div>
							</div>
						</div>
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

	<script src="js/datatables.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
		});
	</script>
<script>
  document.addEventListener("DOMContentLoaded", function(event) { 
    /*setTimeout(function(){
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
    }, 15000);*/
  });



  $('.deletebutton').each(function(btn){
        $(this).click(function(){

			$(this).attr("disabled", true);
			$(this).siblings("#delete").attr("disabled", true);
			$(this).siblings("#edit").attr("disabled", true);
			$(this).siblings("#loading").css("display", "");
		
			var statuschange = -1;


			setTimeout(function()
			{

				$.get( "../Products/deleteproduct.php?id="+$(this).parent().siblings("#id").text(), function( data ) {

					if(statuschange == -1)
					{
						//$(this).parent().parent().remove();
						$(this).siblings("#edit").remove();
						$(this).siblings("#accept").remove();
						$(this).siblings("#loading").remove();
						$(this).parent().html('<span class="badge bg-danger">Deleted</span>');
						$(this).remove();

					}

				}.bind(this));
			}.bind(this),1000);


        });
    });







  
</script></body>


<!-- Mirrored from demo.adminkit.io/tables-datatables-responsive.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Dec 2020 01:35:15 GMT -->
</html>