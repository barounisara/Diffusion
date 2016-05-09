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
		 header('Location: '.$_SERVER['PHP_SELF']); 
	}
function liste_campagnes()
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
		$query="SELECT idCampagne,labelCampagne,`group`,separationSexuee FROM `campagne`";
		$select=$conn->query($query);
        $i=0;
        while($row = $select->fetch_array())
          {   

            $i++;
            $idCampagne=$row['idCampagne'];
            $idGroup=$row['group'];
            $sql="SELECT nomGroup from `group` where idGroup='$idGroup'";
            $groups=$conn->query($sql);
            $group = $groups->fetch_array();
            $group=$group['nomGroup'];
            if($i%2==0){echo "<div class='row-fluid'>";}
            echo "
                    <div class='span6'>
                        <div class='media user'>
                            <a class='media-avatar pull-left' href='#'>
                                <img src='../images/user.png'>
                            </a>
                            <div class='media-body'>
                                <h3 class='media-title'>".$row['labelCampagne']."
                                </h3>
                                <p>
                                <small class='muted'> ".$group."</small></p>
                                <div class='media-option btn-group shaded-icon'>
                                    <button class='btn btn-large btn-primary'>
                                    <a class='a-none' href='gerer.php?id={$row["idCampagne"]}'
                                        <i class='icon-remove'></i>&nbsp;Gerer</a>
                                    </button>
                                    <button class='btn btn-large btn-primary'>";
                                    echo'
                                        <a class="a-none" href="supprimer.php?id='.$row['idCampagne'].'"><i class="icon-remove"></i>&nbsp;Supprimer</a>
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
        <title>3iS Diffusion</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../css/theme.css" rel="stylesheet">
        <link type="text/css" href="../images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>

        <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui.css">
        <script type="text/javascript" src="js/jquery1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        
        
        <!-- elFinder CSS (REQUIRED) -->
        <link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">

        <!-- elFinder JS (REQUIRED) -->
        <script type="text/javascript" src="js/elfinder_bib.min.js"></script>

        <!-- elFinder translation (OPTIONAL) -->
        <script type="text/javascript" src="js/i18n/elfinder.fr.js"></script>

        <!-- elFinder initialization (REQUIRED) -->
               <script type="text/javascript" charset="utf-8">
            $().ready(function() {
                var elf = $('#elfinder').elfinder({
                    url : 'php/connector.php',  // connector URL (REQUIRED)
                     lang: 'fr',             // language (OPTIONAL)
                }).elfinder('instance');
            $('#elfinder').height("250px").resize();
            });
        </script>
 
    </head>
<body>

    <!--/.wrapper--> 
                         
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
                            <li><a href="task.html"><i class="menu-icon icon-tasks"></i>Tasks <b class="label orange pull-right">
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
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <div class="pull-right">
            <a data-toggle="collapse" class="btn btn-large btn-primary" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Nouvelle campagne
        </a></div>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse pull-left" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
                                <div  id="add_div">
                                <div >
            <form action="" method="post">
            <h5>Informations générales:</h5>
                <span class="icon-group"></span><input type="text" name="playlistname" id="playlistname" placeholder="Nom de la campagne" class="span3">
                <span class="icon-tag"></span><input type="text" name="description" id="description" placeholder="Description" class="span3">
                    <hr><h5>Disposition:</h5>
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
                </div>  <hr>    
                <h5>Fichiers:</h5>
                <hr>
                <input type="reset" name="reset" id="reset" class="btn btn-danger" value="Annuler">     
                <input type="submit" name="creer" id="creer" class="btn btn-success" value="Ajouter">
                                           
                                            </form></div>
</div>
      </div>
    </div>
  </div></div>
                               </div>
                            <div class="module-body">
                                
                                <div class="elfinder"></div>
                                <div class="row-fluid">
								<?php liste_campagnes();?>

                                <br/>
                    
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
  </script>


 <script>
// Return a helper with preserved width of cells
var fixHelper = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};

$("#sort tbody").sortable({
    helper: fixHelper
}).disableSelection();

var fixHelperModified = function(e, tr) {
   var $originals = tr.children();
    var $helper = tr.clone();
    $helper.children().each(function(index)
    {
      // Set helper cell sizes to match the original sizes
      $(this).width($originals.eq(index).width());
    });
    return $helper;
};
$("#save").click(
    function(){
    $("#save").hide();
    var div=document.getElementById("add_div");
    var string=' <div class="input-append">\
                                    <input type="text" name="playlistname" id="playlistname" class="span3" placeholder="Nom de la liste" >\
                        </div><br><br>\
                                <div class="input-append">\
                                    <textarea name="description" id="description" placeholder="Notes" class="span3"></textarea>\
                                    </div>\
                       <br><br>';
    div.innerHTML+=string;
$('#save_playlist').show();
    }
    );

$("#save_playlist").click(function(){
    var filelist =document.getElementsByTagName('input');
    $("#filelist").val("");
    for(var i=0;i<filelist.length;i++)
    {
        if((filelist[i].type=="hidden")&&(filelist[i].name=="file"))
        {
            document.getElementById("filelist").value+="|"+filelist[i].value;
        }
    }
    $.ajax({
   url: 'php/add_playlist.php',
    type:'post',
     data:{ filelist:$("#filelist").val(),
     playlistname:$("#playlistname").val(),
     description: $("#description").val()},
    success: function(output) {
                      alert(output);
                  }
});
    alert($("#filelist").val());
});
  </script>