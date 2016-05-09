<!DOCTYPE html>
<?php
function connexion($login,$pwd)
{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database="diffusion";
		// Create connection
		$conn = new mysqli($servername, $username, $password,$database);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$query="SELECT * FROM admin WHERE login='$login' AND password='$pwd'";
		$select=$conn->query($query);
		$num_rows = mysqli_num_rows($select);
		if($num_rows>=1)
		{
			session_start();
			$_SESSION['Login']=$login;
			header('Location:administrateur/index.php');
		}
		else
		{
		$query="SELECT * FROM superAdmin WHERE login='$login' AND password='$pwd'";
		$select=$conn->query($query);
		$num_rows = mysqli_num_rows($select);
		if($num_rows>=1)
		{
			session_start();
			$_SESSION['Login']=$login;
			header('Location:super_administrateur/index.php');
		}
		else
		{
			$query="SELECT * FROM `gestionnnairecampagne` WHERE login='$login' AND password='$pwd'";
			$select=$conn->query($query);
			$num_rows = mysqli_num_rows($select);
			if($num_rows>=1)
			{
				session_start();
				$_SESSION['Login']=$login;
				header('Location:gestionnaire_campagne/index.php');
			}
			else	{echo 'Le login ou mot de passe incorrect';}	
		}
		}
}
?>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>3iS Diffusion</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">
			  		3iS Diffusion
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype='multipart/form-data' method="POST">
						<div class="module-head">
							<h3>Authentification</h3>
						</div>
						<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text"  name="login" id="login" placeholder="Login">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" name="password" id="password" placeholder="Mot de passe">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" name="submit" class="btn btn-primary pull-right">Connexion</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2015 3iS Enterprise Solution - 3iS.tn </b> All rights reserved.
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>

<?php
if(isset($_POST['submit']))
{
	connexion($_POST["login"],$_POST["password"]);
	}
?>