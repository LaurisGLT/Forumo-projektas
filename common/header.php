<?php require('common/functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  	<meta name="description" content="BMW forumas">
  	<meta name="author" content="Laurynas Gunas">
	<title>BMW KK fanai</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/fonts/font-awesome-4.6.3/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/lib/bootstrap-3.3.7/css/flatly-bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>
	<script src="jquery-3.5.1.min.js"></script>
</head>
<body class="background">
	<div class="container-fluid">
		<div class="container">
			<div class="row header-row margin-bottom10">
				<div class="col-md-12">
					<nav class="navbar navbar-default">
					  <div class="container-fluid">
					    <!-- Logotipas -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand" href="<?php echo $path['siteUrl']; ?>"><i class="fa fa-comments"></i>&nbsp;BMW Fanai KK</a>
					    </div>

					    <!--Navigacija -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav navbar-right">
						  <li><a href="index.php">Pagrindinis</a></li>
					        <?php
					        	if(isset($_SESSION['userData'])){
									if($_SESSION['userData']['role'] == 1){
										echo '<li><a href="/admin.php">Svetainės valdymas</a></li>';
									}
					        		?>
									<li><a href="SFP.php">Ieškoti prekės</a></li>
									<li><a href="aboutus.php">Apie mus</a></li>
					        		<li class="dropdown">
							          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Paskyra <span class="caret"></span></a>
							          <ul class="dropdown-menu">
							            <li><a href="profile.php">Mano Profilis</a></li>
							            <li role="separator" class="divider"></li>
										<li><a href="contact.php">Susisiekti</a></li>
							            <li role="separator" class="divider"></li>
										<li><a href="report.php">Pranešti klaidą</a></li>
							            <li role="separator" class="divider"></li>
							            <li><a href="logout.php">Atsijungti</a></li>
										
							          </ul>
							        </li>
					        		<?php
					        	}else{
					        		?>
					        		<li><a href="register.php">Prisijunk prie mūsų</a></li>
					        		<li><a href="login.php">Prisijungti</a></li>
					        		<?php
					        	}
					        ?>
					      </ul>
					    </div>
					  </div>
					</nav>
				</div>
			</div>
			<!-- Header pabaiga -->