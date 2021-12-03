<?php header( "refresh:6" );
	
	session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	$nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
	

$dbname = 'u582866828_dht11_php_mysq';
$dbuser = 'u582866828_Angel';  
$dbpass = 'Angelariel74'; 
$dbhost = 'localhost'; 


$connect = @mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$connect){
	echo "Error: " . mysqli_connect_error();
	exit();
}

// echo "Connection Success!<br><br>";

$temperature = $_GET["temperature"];
$water_level = $_GET["water_level"];


$query = "UPDATE temperature SET temperature = ('$temperature'),water_level = ('$water_level')";
mysqli_query($connect,$query);

// echo "Insertion Success!<br>";
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Omnigreen - Sistema Web</title>
        <link rel="icon" type="image/png" href="assets/img/miniLogo.png" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand">
            <a class="navbar-brand" href="index.html"><img src="assets/img/logo-text.svg"/></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
			><!-- Navbar Search-->
            <!--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
				<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
				<div class="input-group-append">
				<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
				</div>
                </div>
			</form>-->
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Salir</a>
					</div>
				</li>
			</ul>
		</nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion " id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.html"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
							>
							
							<?php if($tipo_usuario == 1) { ?>
								
								<div class="sb-sidenav-menu-heading">Interface</div>
								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
								><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
									UNIDADES
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
									></a>
									<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
										<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Static Navigation</a><a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a></nav>
									</div>
									<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
									><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
										RECOLECTORES
										<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
										></a>
										<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
											<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
												<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
												>Authentication
													<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
													></a>
													<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
														<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
													</div>
													<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
													>Error
														<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
														></a>
														<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
															<nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
														</div>
											</nav>
										</div>
										
							<?php } ?>
							
							<div class="sb-sidenav-menu-heading">Addons</div>
							<a class="nav-link" href="charts.html"
							><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
								Charts</a
								><a class="nav-link" href="tabla.php"
								><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
									Tables</a
								>
							</div>
					</div>
                    <div class="sb-sidenav-footer">
                        <div class="small"></div>
                        OMNIGREEN
					</div>
				</nav>
			</div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard Omnigreen</h1>
                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="border rounded bg-primary text-white mb-4">
                                    <div class="card-body">CARTON</div>
                                    <a class="card-body">  <?php
    $query2 = "select * from dht11 where id= '1'";
    $row = mysqli_query($connect,$query2);
    
    while($data = $row->fetch_assoc()){
        if($data["temperature"] > 40){
           echo "<h2 style='color:white'>". $data["temperature"]." KG</h2>"; 
        }else if($data["temperature"] <= 40 && $data["temperature"] > 25){
           echo "<h2 style='color:green'>". $data["temperature"]." KG</h2>";  
        }else{
            echo "<h2 style='color:black'>". $data["temperature"]." KG</h2>"; 
        }
        
    }
   
?>  </a>
                                   
								</div>
							</div>
                            <div class="col-xl-3 col-md-6">
                                <div class=" bg-warning text-white mb-4">
                                    <div class="card-body">MADERA</div>
                                    <a class="card-body"><?php
    $query2 = "select * from dht11 where id= '1'";
    $row = mysqli_query($connect,$query2);
    
    while($data = $row->fetch_assoc()){
        if($data["humidity"] > 40){
           echo "<h2 style='color:white'>". $data["humidity"]." KG</h2>"; 
        }else if($data["humidity"] <= 40 && $data["humidity"] > 25){
           echo "<h2 style='color:green'>". $data["humidity"]." KG</h2>";  
        }else{
            echo "<h2 style='color:black'>". $data["humidity"]." KG</h2>"; 
        }
        
    }
   
?></a>
                                   
								</div>
							</div>
                            <div class="col-xl-3 col-md-6">
                                <div class=" bg-danger text-white mb-4">
                                        <div class="card-body">PET</div>
                                        <a class="card-body"><?php 
                                        $query3 = "SELECT water_level from dht11";
    $rows = mysqli_query($connect,$query3);
    
    while($state = $rows->fetch_assoc()){
        
        if( strcmp($state['water_level'],"LLENO")  == 0){
            echo "<h2 style='color:WHITE'>".$state['water_level'];
        }else if( strcmp($state['water_level'],"LOW")  == 0 ){
            echo "<h2 style='color:black'>".$state['water_level'];
        }
        echo "</h2>";
    }?></a>
                                     
								</div>
							</div>
                            <div class="col-xl-3 col-md-6">
                                <div class=" bg-success text-white mb-4">
                                    <div class="card-body">DESCARGAR REPORTE</div>
                                </div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>CLIENTES</div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
								</div>
							</div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>KILOS POR MATERIAL</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
								</div>
							</div>
						</div>
                      
				</main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div>
                        <a href="https://tics-service.com/siriuschoice/"> Elaborado por:
                            Sirius Mexico
                        </a>
                    </div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
	</body>
</html>
