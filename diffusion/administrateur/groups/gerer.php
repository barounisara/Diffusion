<!DOCTYPE html>
<?php

function idCampagne()
{
    return $_GET['id'];
}
function show_group_users()
{
        $idCampagne=$_GET['id'];
        //$idGroup=$_GET['id'];
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
        $query="SELECT `group` from campagne WHERE idCampagne='$idCampagne'";
        $select=$conn->query($query);
        $row=$select->fetch_array();
        $idGroup=$row["group"];
         $sql = "SELECT login FROM `utilisateur`WHERE idGroup='$idGroup'";
        $select=$conn->query($sql);
        
        while($row = $select->fetch_array())
        {
            echo ' <a href="#" class="btn-box small span3" id="'.$row['login'].'" ondragstart="drag(this, event)">
                        <i class="icon-user"></i>
                            <b>'.$row['login'].'</b>
                    </a>';
            }
}
function show_available_users()
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
         $sql = "SELECT login FROM `utilisateur` WHERE idGroup=''";
        $select=$conn->query($sql);
        $i=0;
        while($row = $select->fetch_array())
        {$i++;
            echo '  <a href="#" class="btn-box small span3" id="'.$row['login'].'" ondragstart="drag(this, event)">
                        <i class="icon-user"></i>
                            <b>'.$row['login'].'</b>
                    </a>';  
            echo "<input type='hidden' name=".$row['login'].">";
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
        function drag(target, evt) {
        evt.dataTransfer.setData("Text", target.id);
        document.getElementById("drag").value+='/'+target.id;
       }
       function drop(target, evt) {

        var id = evt.dataTransfer.getData("Text");
         document.getElementById("drop").value+='/'+target.id;
        target.appendChild(document.getElementById(id));
        evt.preventDefault();
       }
       function contains()
       {
        return document.getElementById("contains").text;

       }
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
                                    Gerer le groupe</h3>
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
                                 <form action="gerer_valider.php" method='GET' >
                                    <input type="hidden" name="drag" id="drag" value="">
                                    <input type='hidden' name='drop' id="drop" value=''>
                                    <input type='hidden' name='campagne' value=<?php echo idcampagne(); ?>>
                                    <input type="submit"  name="valider" class="btn btn-large btn-primary" value="Valider"/>
                                </form>
                                </div>
                               
                            </div></div>
                            <div class="module-body">
                                <div class="row-fluid">
                                <div id="available" class="span6"  style="height:50em" ondragover="return false" ondrop="drop(this, event)">
                                <h4>Utilisateurs du groupe:</h4>
                                      <?php show_group_users(); ?>
                                </div>
                                <div id="contains" class="span6" style="height:50em"  ondragover="return false" ondrop="drop(this, event)">
                                <h4>Utilisateurs disponibles:</h4>
                                      <?php show_available_users(); ?>
                                </div>
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
/* function getUsers(div)
    {
        var userDiv=document.getElementById(div);
        var hrefList=userDiv.getElementsByTagName("a");
        var users[];
        for(var i=0;i<hrefList.length;i++)
        {
            users[i]=hrefList[i].getAttribute("id");
        }
//document.getElementById("javascriptOutPut").value="aaaaaaaaaaaaaa";
$url = 'gerer.php';
$.get($url, {users: getUsers()});
    } */

  </script>
