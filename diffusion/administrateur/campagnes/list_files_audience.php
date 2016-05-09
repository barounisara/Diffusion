<!DOCTYPE html>
<?php 
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
        $query="SELECT * FROM `group` g WHERE NOT EXISTS(select `group` from campagne c WHERE c.group=g.idGroup)";
        if(!$select=$conn->query($query))
             die("Connection failed: " . $conn->error);

            echo '<table class="table table-striped table-condensed">
                    <thead>
                        <tr><th></th><th>Groupe</th><th>Description</th></tr>
                    </thead>
                    <tbody>';

        while($row = $select->fetch_array())
          {   
            $disposition=$row['disposition'];
            $sql="SELECT label from `disposition` where idDisposition='$disposition'";
            $dispos=$conn->query($sql);
            $dispo = $dispos->fetch_array();
            $image=$dispo['label'].".png";
            echo '<tr>
            <td><input type="radio" name="group" value="'.$row['idGroup'].'"></td>
            <td>'.$row['nomGroup'].'</td>';
            echo '<td>'.$row['description'].'</td></tr>';
        } 
        echo'</tbody></table>';
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
        $i=2;
        while($row = $select->fetch_array())
          {        
            $idCampagne=$row['idCampagne'];
            $idGroup=$row['group'];
            $sql="SELECT nomGroup from `group` where idGroup='$idGroup'";
            $groups=$conn->query($sql);
            $group = $groups->fetch_array();
            $group=$group['nomGroup'];
            if(($i &1)||($i==2)){echo "<div class='row-fluid'>";}
            echo "
                    <div class='span5'>
                        <div class='media user'>
                            <a class='media-avatar pull-left' href='#'>
                                <img src='../images/announcement.png'>
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
            if($i & 1){echo "</div><br>";} 
            $i++;        
        } 
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>3iS Diffusion</title>
        <link type="text/css" href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../css/theme.css" rel="stylesheet">

    <link type="text/css" href="../css/image-picker.css" rel="stylesheet">
        <link type="text/css" href="../images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui.css">
		<script type="text/javascript" src="js/jquery1.min.js"></script>

        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
        
        <script src="../scripts/image-picker.js" type="text/javascript"></script>
        
		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script type="text/javascript" src="js/audience_elfinder_bib.min.js"></script>

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
        <style>
        </style>
 
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
                           <li><a href="liste_superAdmin.php"><i class="menu-icon icon-bullhorn"></i>Super Administrateurs</a>
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

                <div id="content_div">
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                 <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title module-head">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Nouvelle campagne
                                        </a>
                                      </h4>
                                    </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body module-body">
                                      <div>
                                        <form action="" method="post" id="add_div">
                                         <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                                                <li class="active"><a href="#red" data-toggle="tab">Informations générales</a></li>
                                                <li><a href="#orange" data-toggle="tab">Groupes</a></li>
                                                <li><a href="#yellow" data-toggle="tab">Fichiers</a></li>
                                                <li><a href="#green" data-toggle="tab">Listes de lecture</a></li>
                                            </ul>
                                            <div id="my-tab-content" class="tab-content">
                                                <div class="tab-pane active" id="red">
                                                    <span class="icon-group"></span><input type="text" name="playlistname" id="playlistname" placeholder="Nom de la campagne" class="span3"><br/>
                                                    <span class="icon-tag"></span><input type="text" name="description" id="description" placeholder="Description" class="span3">
                                                </div>
                                                <div class="tab-pane" id="orange">
                                                    <?php liste_groups();?>
                                                </div>
                                                <div class="tab-pane" id="yellow">
                                                    <div id="elfinder"></div>
                                                </div>
                                                <div class="tab-pane" id="green">
                                                        <div class="tabbable tabs-left">
                                                            <ul class="nav nav-tabs">
                                                              <li><a href="#a" data-toggle="tab">Standard</a></li>
                                                              <li class="active"><a href="#b" data-toggle="tab"><img src="../images/female.png" height="30" width="30"/></a></li>
                                                              <li><a href="#c" data-toggle="tab"><img src="../images/male.png" height="30" width="30"/></a></li>
                                                            </ul>
                                                        <div class="tab-content">
                                                         <div class="tab-pane active" id="a">
                                                            <blockquote>
                                                            <h5>Liste de lecture standard</h5>   
                                                            </blockquote>
                                                             <input type="hidden" name="filelist" id="filelist" value=""/>                  
                                                            <div id='draggable'>
                                                            <table id="sort" class="grid table table-striped table-bordered table-condensed">
                                                                <thead>
                                                                    <tr><th width="10%"></th><th width="90%">Titre</th><th width="10%">Durée</th></tr>
                                                                </thead>
                                                                <tbody id="addtbody">
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                         </div>
                                                         <div class="tab-pane" id="b">
                                                            <blockquote>
                                                                <h5>Liste de lecture pour femmes</h5>   
                                                            </blockquote>
                                                            <input type="hidden" name="filelistwomen" id="filelistwomen" value=""/>
                                                            <div id='draggable'>
                                                                <table id="sort" class="grid table table-striped table-bordered table-condensed">
                                                                    <thead>
                                                                        <tr><th width="10%"></th><th width="90%">Titre</th><th width="10%">Durée</th></tr>
                                                                    </thead>
                                                                    <tbody id="addtbodywomen">
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                         </div>
                                                         <div class="tab-pane" id="c">
                                                        <blockquote>
                                                            <h5>Liste de lecture pour hommes</h5>   
                                                        </blockquote>
                                                        <input type="hidden" name="filelistmen" id="filelistmen" value=""/>
                                                        <div id='draggable'>
                                                            <table id="sort" class="grid table table-striped table-bordered table-condensed">
                                                                <thead>
                                                                    <tr><th width="10%"></th><th width="90%">Titre</th><th width="10%">Durée</th></tr>
                                                                </thead>
                                                                <tbody id="addtbodymen">
                                                                </tbody>
                                                            </table>                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
       
        <div class="span9"></div>
    </div>
    <div class="span2 pull-right">
        <br>
        <input type="reset" name="reset" id="reset" class="btn btn-danger" value="Annuler">     
        <button id="save_playlist" class="btn btn-success">Ajouter</button>
        <br/><br/>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>                		
</div><!-- end content-div-->

<div class="module">
    <div class="module-head">
        <h3>Toutes les campagnes</h3>
    </div>
    <div class="module-body"><?php liste_campagnes(); ?></div>
</div>
     </div>          
                <!--/.span9-->
</div>
</div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->
</div>
		<!-- footer -->
    <div class="footer">
        <div class="container">
            <b class="copyright">&copy; 3iS Diffusion </b>All rights reserved.
        </div>
    </div>

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
$("#save_playlist").click(function(){
    var filelist=$("#addtbody").find("input[name='file']");
    var filelistwomen=$("#addtbodywomen").find("input[name='file']");
    var filelistmen=$("#addtbodymen").find("input[name='file']");
    var group=$('input[name="group"]:checked', '#add_div').val();
    $("#filelist").val  
    $("#filelistwomen").val("");
    $("#filelistmen").val("");

    for(var i=0;i<filelist.length;i++)
    {
        if((filelist[i].type=="hidden")&&(filelist[i].name=="file"))
        {
            document.getElementById("filelist").value+="|"+filelist[i].value;
        }
    }
    for(var i=0;i<filelistwomen.length;i++)
    {
        if((filelistwomen[i].type=="hidden")&&(filelistwomen[i].name=="file"))
        {
            document.getElementById("filelistwomen").value+="|"+filelistwomen[i].value;
        }
    }
    for(var i=0;i<filelistmen.length;i++)
    {
        if((filelistmen[i].type=="hidden")&&(filelistmen[i].name=="file"))
        {
            document.getElementById("filelistmen").value+="|"+filelistmen[i].value;
        }
    }
    $.ajax({
            url: 'php/add_playlist_audience.php',
            type:'post',
            data:{ filelist:$("#filelist").val(),
            filelistwomen:$("#filelistwomen").val(),
            filelistmen:$("#filelistmen").val(),
            playlistname:$("#playlistname").val(),
            group:group,
            description: $("#description").val()},
            success: function(output) {             
                          }
        });
    //var path="https://www.google.com";
    //window.location.href=path;
});
  </script>

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

	</body>
</html>