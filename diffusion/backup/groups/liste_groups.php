<!DOCTYPE html>
<?php
function creer_layout($disposition,$nomGroup)
{
	mkdir("../index/".$nomGroup, 0777, true);
	$index="../index/".$nomGroup."/index.html";
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database="diffusion";
	$conn = new mysqli($servername, $username, $password,$database);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
	$sql="SELECT label from `disposition` where idDisposition='$disposition'";
	$layouts=$conn->query($sql);
	$layout = $layouts->fetch_array();
	$fichier="../disposition/".$layout['label'].".html";
	copy($fichier,$index);
}
if(isset($_POST['creer']))
{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database="diffusion";
		// Create connection
        // keep track post values
        $nomGroup=$_POST['nomGroup'];
        $description=$_POST['description']; 
		$disposition=intval($_POST['disposition']); 
        // delete data
        $conn = new mysqli($servername, $username, $password,$database);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
        $sql = "INSERT INTO `group`(nomGroup,description,disposition) VALUES('$nomGroup','$description','$disposition')";
		if(!$select=$conn->query($sql))
		{
			die("Erreur d'insertion".$conn->error);
		}
		creer_layout($disposition,$nomGroup);
		 header('Location: '.$_SERVER['PHP_SELF']); 
	}
function liste_groups()
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
		$query="SELECT idGroup,nomGroup,description,disposition FROM `group`";
		$select=$conn->query($query);
		while($row = $select->fetch_array())
		  {   
			$disposition=$row['disposition'];
			$sql="SELECT label from `disposition` where idDisposition='$disposition'";
			$dispos=$conn->query($sql);
			$dispo = $dispos->fetch_array();
			$image=$dispo['label'].".png";
			echo '<div class="module-body">
                                <div class="profile-head media">
                                    <a href="#" class="media-avatar pull-left">
                                        <img src="../images/user_group.png">
                                    </a>
									 <br><h3>'.$row['nomGroup'] .'</h3>
									  <div style="">
                                         <img align="right" width=15% src="../images/layouts/'.$image.'"><br><br><br><br><br>
                                    </div>
                                        <h4>
                                         <div class="btn-group pull-right" data-toggle="buttons-radio">
										<div class="media-option btn-group shaded-icon">
										<button class="btn btn-large btn-primary"><a class="a-none" href="gerer.php?id='.$row['idGroup'].'">Gérer</a>
									</button></div><div class="media-option btn-group shaded-icon">
									<button class="btn btn-large btn-danger"><a class="a-none" href="supprimer.php?id='.$row['idGroup'].'">Supprimer</a>
									</button></div></div></h4>
                                        <p class="profile-brief"><b>Description: '.$row['description'].'</b></p>
									 </div>
                                    <div class="media-body">
									
									';
			$idGroup=$row['idGroup'];
			$sql="SELECT login from `utilisateur` where idGroup='$idGroup'";
			$users=$conn->query($sql);
			$i=0;
			while($user = $users->fetch_array())
			{  
					$i++;
			if($i%2==0){echo "<div class='row-fluid'>";}
			echo "
					<div class='span6'>
						<div class='media user'>
							<a class='media-avatar pull-left' href='#'>
								<img src='../images/TV.png'>
							</a>
							<div class='media-body'>
								<h3 class='media-title'>".$user['login']."
								</h3>
								<p>
								<small class='muted'></small></p>
								<div class='media-option btn-group shaded-icon'>
									
								</div>
							</div>
						</div>
					</div>";
			if($i%2==0){echo "</div><br/>";}
			}
			echo "</div></div><hr>";
        } 
		}
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3is Diffusion | Groupes</title>
    <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="../css/theme.css" rel="stylesheet">
	<link type="text/css" href="../css/image-picker.css" rel="stylesheet">
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
                            <img src="../images/user.png" class="nav-avatar" />
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
                            <li><a href="#"><i class="menu-icon icon-bullhorn"></i>Utilisateurs </a>
                            </li>
                            <li><a href="../groups/liste_groups.php"><i class="menu-icon icon-inbox"></i>Groupes <b class="label green pull-right">
                                11</b> </a></li>
                             <li><a href="../campagnes/liste_campagnes.php"><i class="menu-icon icon-tasks"></i>Campagnes <b class="label orange pull-right">
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
                        <div class="module">
                            <div class="module-head">
                                <h3>
                                    Tous les groupes</h3>
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
                                    <button type="button" onclick="setVisibility()" id="ajouter" class="btn btn-large btn-primary">
                                        <i class="icon-user"></i>Créer un group</button>
                                </div><br><br>
								 <div class="input-append" style="position:inherit;">
								<div  id="add_div" style="display:none">
								<div class="well">
			<form action="" method="post">
			<h4>Informations générales:</h4>
				<button class="btn"><i class="icon-group"></i></button><input type="text" name="nomGroup" id="nomGroup" placeholder="Nom du groupe" class="span3">
				<button class="btn"><i class="icon-tag"></i></button><input type="text" name="description" id="description" placeholder="Description" class="span3">
					<hr><h4>Disposition:</h4>
				<div class="picker">
				 <select name="disposition" class="image-picker show-labels show-html" style="visibility:hidden">
					<option data-img-src="../images/layouts/dispo1.png" value="6"> </option>
					<option data-img-src="../images/layouts/dispo2horiz.png" value="5"></option>
					<option data-img-src="../images/layouts/dispo2vert.png" value="3"></option>
					<option data-img-src="../images/layouts/dispo2vertsup.png" value="2"></option>
					<option data-img-src="../images/layouts/dispo2horizsup.png" value="4"></option>
					<option data-img-src="../images/layouts/dispo3.png" value="1"></option>
					<option data-img-src="../images/layouts/dispo3sup.png" value="0"></option>
				</select>
				</div>	<hr>	
				<input type="reset" name="reset" id="reset" class="btn btn-danger" value="Annuler">		
				<input type="submit" name="creer" id="creer" class="btn btn-success" value="Ajouter">
								           
											</form></div>
</div>
                            </div></div>
                            <div class="module-body">
                                <div class="row-fluid">
								<?php liste_groups();?>

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
	    <script src="../scripts/image-picker.js" type="text/javascript"></script>
</body>

  <script type="text/javascript">

    jQuery("select.image-picker").imagepicker({
      hide_select:  false,
    });

    jQuery("select.image-picker.show-labels").imagepicker({
      hide_select:  false,
      show_label:   true,
    });

    jQuery("select.image-picker.limit_callback").imagepicker({
      limit_reached:  function(){alert('We are full!')},
      hide_select:    false
    });

    var container = jQuery("select.image-picker.masonry").next("ul.thumbnails");
    container.imagesLoaded(function(){
      container.masonry({
        itemSelector:   "li",
      });
    });
$(document).ready(function(){
    $("#ajouter").click(function(){
       $("#add_div").attr("display", "block");
    });
});
function setVisibility() {
document.getElementById("add_div").style.display = "block";
}
  </script>
