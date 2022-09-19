<?php 
include "../controller/testC.php";

	 $tes=new testC;

        $listC = $tes->affichertest();



if (isset ($_POST['supprimer']))
{   
$req="delete from reservation where id=".$_POST['id'];
$db=config::getConnexion();
$sql=$db->prepare($req);
$sql->execute();
}
if(isset($_GET['new_etat'])){
$tes->modifieretat($_GET['id'],$_GET['new_etat']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Tables | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
</head>

<body>
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
						<a class="sidebar-link" href="index.html">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-profile.html">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-settings.html">
              <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-invoice.html">
              <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Invoice</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="pages-blank.html">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
            </a>
					</li>

					<li class="sidebar-header">
						Tools & Components
					</li>
					<li class="sidebar-item">
						<a href="#ui" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">UI Elements</span>
            </a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Alerts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Buttons</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Cards</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-general.html">General</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-grid.html">Grid</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-modals.html">Modals</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="ui-typography.html">Typography</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="icons-feather.html">
              <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a href="#forms" data-toggle="collapse" class="sidebar-link collapsed">
              <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Forms</span>
            </a>
						<ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="forms-layouts.html">Form Layouts</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="forms-basic-inputs.html">Basic Inputs</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="Afficherlivreurr.php">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Gestion livreur</span>
            </a>
					</li>
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="livraison.php">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Ajouter livreur</span>
            </a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="test.php">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Gestion Test</span>
            </a>
					</li>
						<li class="sidebar-item">
						<a class="sidebar-link" href="AfficherC.php">
              <i class="align-middle" data-feather="list"></i> <span class="align-middle">Gestion Clinique</span>
            </a>
					</li>

					<li class="sidebar-header">
						Plugins & Addons
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="charts-chartjs.html">
              <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="maps-google.html">
              <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
            </a>
					</li>
				</ul>

				<div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Upgrade to Pro</strong>
						<div class="mb-3 text-sm">
							Are you looking for more components?
						</div>
						<a href="https://adminkit.io/pricing" target="_blank" class="btn btn-outline-primary btn-block">Upgrade</a>
					</div>
				</div>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
          <i class="hamburger align-self-center"></i>
        </a>

				<form class="form-inline d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<div class="input-group-append">
							<button class="btn" type="button">
                <i class="align-middle" data-feather="search"></i>
              </button>
						</div>
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
										<div class="row no-gutters align-items-center">
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
										<div class="row no-gutters align-items-center">
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
										<div class="row no-gutters align-items-center">
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
										<div class="row no-gutters align-items-center">
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
										<div class="row no-gutters align-items-center">
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
										<div class="row no-gutters align-items-center">
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
										<div class="row no-gutters align-items-center">
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
										<div class="row no-gutters align-items-center">
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
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> <span class="text-dark">Charles Hall</span>
              </a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
								<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Gestion Test</h1>

					<div class="row">
						<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Test</h5>
								</div>
								<table >
									<thead>
										<tr>
											<th style="width:40%;">nom</th>
											<th style="width:25%">prenom</th>
											<th class="d-none d-md-table-cell" style="width:25%">Date de Creation</th>
											<th class="d-none d-md-table-cell" style="width:25%">Date de Test</th>
											<th style="width:25%">clinique</th>
											<th style="width:25%">etat du reservation</th>
											<th style="width:25%">Modifier l'etat</th>
											<th style="width:25%">Supprimer</th>
										</tr>
									</thead>
									<?PHP
									 foreach ($listC as $row) {
                                                    ?>
									<tbody>
										<tr>
										<td>
                                          <?PHP echo $row['nom']; ?>
                                          </td>
											<td>
                                          <?PHP echo $row['prenom']; ?>
                                          </td>
											<td>
                                          <?PHP echo $row['datecreation']; ?>
                                          </td>
											<td>
                                          <?PHP echo $row['dateDeTest']; ?>
                                          </td>
											<td>
                                          <?PHP echo $row['clinique']; ?>
                                          </td>
											<td>
                                          <?PHP echo $row['etat']; ?>
                                          </td>
											 <td >
                        
                                <input type="text" value="244" name="id" hidden>
                           
                           <a href="test.php?new_etat=valide&id=<?PHP echo $row['id']; ?>" class="btn btn-success btn-xs navbar-btn">valide <i class="fa fa-check"></i></a>
                     
                               <br></br>   
                                  <a href="test.php?new_etat=en_cours&id=<?PHP echo $row['id']; ?>" class="btn btn-warning btn-xs navbar-btn">en_cours <i class="fa fa-cog"></i></a>   
                                
                                <br></br>  
                                   <a href="test.php?new_etat=Annulee&id=<?PHP echo $row['id']; ?>"class="btn btn-danger btn-xs navbar-btn">Annulee <i class="fa fa-close"></i></a>  
                           
                        </td>
										 <td>
                                                            <form method="POST" action="test.php" >
                                                            <input style="background-color: #495156" class="btn btn-primary btn-block" type="submit" name="supprimer" value="supprimer">
                                                            <input class="btn btn-primary btn-block" type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                                            </form>
                                                            </td>
                                                      
                                                        </tr>

                                                    </tbody>

                                                <?PHP

                                            }   
                                         
                                            
                                           
                                             
                                            
                                                ?>
								</table>
								<div>
					<form class="form-inline" method="post" action="generate_pdf.php">
						<button type="submit"  id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf"" aria-hidden="true"></i>
							Generate PDF</button>
						</form>
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

	<script src="js/vendor.js"></script>
	<script src="js/app.js"></script>

</body>

</html>