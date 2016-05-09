<!DOCTYPE html>
<?php
if(isset($_POST['creer']))
{
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database="diffusion";
        // Create connection
        // keep track post values
        $login=$_POST['login'];
        $pwd=$_POST['pwd']; 
        $societe=$_POST['societe'];
        $mail=$_POST['mail'];
        $telephone=$_POST['telephone'];         
        // delete data
        $conn = new mysqli($servername, $username, $password,$database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "INSERT INTO `admin`(login,password,societe,email,telephone) VALUES('$login','$pwd','$societe','$mail','$telephone')";
        if(!$select=$conn->query($sql))
        {
            die("Erreur d'insertion".$conn->error);
        }
         header('Location: '.$_SERVER['PHP_SELF']); 
    }

function liste_utilisateurs()
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
		$query="SELECT login,email,societe from `admin`";
		$select=$conn->query($query);
		$i=0;
		while($row = $select->fetch_array())
		  {   
			$i++;
			if($i%2==0){echo "<div class='row-fluid'>";}
			echo "
					<div class='span6'>
						<div class='media user'>
							<a class='media-avatar pull-left' href='#'>
								<img src='../images/user.png'>
							</a>
							<div class='media-body'>
								<h3 class='media-title'>".$row['login']."
								</h3>
								<p>
								 <p>
								 <b>soci&eacute;t&eacute;:</b>
                                    <small class='muted'>".$row['societe']."</small></p>
									 <p>
									 <b>E-mail:</b>
                                    <small class='muted'>".$row['email']."</small></p>
								<small class='muted'></small></p>
								<div class='media-option btn-group shaded-icon'>
									<button class='btn btn-primary'>";
									echo'
										<a class="a-none" href="supprimer.php?id='.$row['login'].'">
										<i class="icon-remove"></i>&nbsp;Supprimer</a>
									</button>
									</div>';
									
									echo"<div class='media-option btn-group shaded-icon'><button class='btn btn-primary'>";
									echo'
										<a class="a-none" href="liste_actions.php?id='.$row['login'].'"><i class="icon-list-alt"></i>&nbsp;Actions</a>
									</button>
								</div>
								<div class="media-option btn-group shaded-icon"><button class="btn btn-primary">
									<a class="a-none" href="liste_utilisateurs.php?id='.$row['login'].'">
									<i class="icon-list-alt"></i>&nbsp;Utilisateurs</a>
									</button>
								</div>
								
							</div>
						</div>
					</div>';
			if($i%2==0){echo "</div><br/>";}			
        }                     
		}
		?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edmin</title>
    <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="../css/theme.css" rel="stylesheet">
    <link type="text/css" href="../images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
		<script>
		
		</script>
</head>
<body>
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">3iS Diffusion </a>
                <div class="nav-collapse collapse navbar-inverse-collapse">
                    <ul class="nav nav-icons">
                        <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                        <li><a href="#"><i class="icon-eye-open"></i></a></li>
                        <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                    </ul>
                    <form class="navbar-search pull-left input-append" action="#">
                    <input type="text" class="span3">
                    <button class="btn" type="button">
                        <i class="icon-search"></i>
                    </button>
                    </form>
                    <ul class="nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Item No. 1</a></li>
                                <li><a href="#">Don't Click</a></li>
                                <li class="divider"></li>
                                <li class="nav-header">Example Header</li>
                                <li><a href="#">A Separated link</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Support </a></li>
                        <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="images/user.png" class="nav-avatar" />
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Your Profile</a></li>
                                <li><a href="#">Edit Profile</a></li>
                                <li><a href="#">Account Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </div>
        </div>
        <!-- /navbar-inner -->
    </div>
    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="span3">
                    <div class="sidebar">
                        <ul class="widget widget-menu unstyled">
                            <li class="active"><a href="../index.php"><i class="menu-icon icon-dashboard"></i>Tableau de bord
                            </a></li>
                           <li><a href="../superAdmin/liste_superAdmin.php"><i class="menu-icon icon-bullhorn"></i>Super Administrateurs</a>
                                </li>
                                <li><a href="../admin/liste_admin.php"><i class="menu-icon icon-inbox"></i>Administrateurs <b class="label green pull-right">
                                    11</b> </a></li>
                                <li><a href="../gestionnairecampagne/liste_gestionnaires.php"><i class="menu-icon icon-tasks"></i>Gestionnaires de campagne <b class="label orange pull-right">
                                    19</b> </a></li>
                        </ul>
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                                <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> Buttons </a></li>
                                <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Typography </a></li>
                                <li><a href="form.html"><i class="menu-icon icon-paste"></i>Forms </a></li>
                                <li><a href="table.html"><i class="menu-icon icon-table"></i>Tables </a></li>
                                <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
                            </ul>
                        <!--/.widget-nav-->
                        <ul class="widget widget-menu unstyled">
                            <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                            </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                            </i>More Pages </a>
                                <ul id="togglePages" class="collapse unstyled">
                                    <li><a href="other-login.html"><i class="icon-inbox"></i>Login </a></li>
                                    <li><a href="other-user-profile.html"><i class="icon-inbox"></i>Profile </a></li>
                                    <li><a href="other-user-listing.html"><i class="icon-inbox"></i>All Users </a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
                        </ul>
                    </div>
                    <!--/.sidebar-->
                </div>
                <!--/.span3-->
                <div class="span9">
                    <div class="content">
					<div  id="add_div"></div>
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                    Tous les Administrateurs</h3>
                            </div>
                            <div class="module-option clearfix">
                                <form>
                                <div class="input-append pull-left">
                                    <input type="text" class="span3" placeholder="Filtrer par nom...">
                                    <button type="submit" class="btn">
                                        <i class="icon-search"></i>
                                    </button>
                                </div>
                                </form>
                                <div class="btn-group pull-right" data-toggle="buttons-radio">
                                    <button type="button" onclick="ajouter_Admin()" class="btn btn-large btn-primary">
                                        <i class="icon-user"></i>Cr&eacute;er un administrateur</button>
                                </div><br><br>
								 <div class="input-append" align="center" style="position:inherit;">
								
                            </div></div>
                            <div class="module-body">
                                <div class="row-fluid">
								<?php liste_utilisateurs();?>
									
                                <br />
                               
                            </div>
                        </div>
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
        </div>
    </div>
    
    <script src="../scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="../scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
	  <script src="../scripts/functions.js" type="text/javascript"></script>
</body>