function ajouter_user()
{
	
		
	var div=document.getElementById("add_div");
	var string='  <div class="module">\
                    <div class="module-head">\
                        <h3>Super Administrateur</h3>\
                   </div> \
				   <div class="module-body">\
					<form  class="form-horizontal" action="" method="post">\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Login</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="login" id="login" class="span3" >\
									<span class="add-on"><i class="icon-user"></i></span>\
								</div>\
							</div>\
						</div>\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Mot de passe</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="pwd" id="pwd" placeholder="" class="span3">\
									<span class="add-on">**</span>\
								</div>\
							</div>\
						</div>\
							<div class="control-group">\
							<label class="control-label" for="basicinput">Societé</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="societe" id="societe" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-building"></i></span>\
								</div>\
							</div>\
						</div>\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Numéro de telephone</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="telephone" id="telephone" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-phone"></i></span>\
								</div>\
							</div>\
						</div>\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Description</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="Description" id="Description" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-edit"></i></span>\
								</div>\
							</div>\
						</div>\
							<div class="control-group">\
							<label class="control-label" for="basicinput">Adresse</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="Adresse" id="Adresse" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-map-marker"></i></span>\
								</div>\
							</div>\
						</div>\
							<div class="control-group">\
							<label class="control-label" for="basicinput">Disposition</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="mail" id="mail" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-envelope"></i></span>\
								</div>\
							</div>\
						</div>\
						<br>\
                        <div class="btn-group pull-right" style="position:inherit;">\
				<input type="submit" name="creer" id="creer" class="btn btn-success" value="Ajouter">\
                   </div><br><br> \
			</form></div></div>';
	div.innerHTML=string;
}
function ajouter_superAdmin()
{
	
	var div=document.getElementById("add_div");
	var string='  <div class="module">\
                    <div class="module-head">\
                        <h3>Super Administrateur</h3>\
                   </div> \
				   <div class="module-body">\
					<form  class="form-horizontal" action="" method="post">\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Login</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="login" id="login" class="span3" >\
									<span class="add-on"><i class="icon-user"></i></span>\
								</div>\
							</div>\
						</div>\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Mot de passe</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="pwd" id="pwd" placeholder="" class="span3">\
									<span class="add-on">**</span>\
								</div>\
							</div>\
						</div>\
							<div class="control-group">\
							<label class="control-label" for="basicinput">Societé</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="societe" id="societe" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-building"></i></span>\
								</div>\
							</div>\
						</div>\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Numéro de telephone</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="telephone" id="telephone" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-phone"></i></span>\
								</div>\
							</div>\
						</div>\
							<div class="control-group">\
							<label class="control-label" for="basicinput">Adresse e-mail</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="mail" id="mail" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-envelope"></i></span>\
								</div>\
							</div>\
						</div><br>\
                        <div class="btn-group pull-right" style="position:inherit;">\
				<input type="submit" name="creer" id="creer" class="btn btn-success" value="Ajouter">\
                   </div><br><br> \
			</form></div></div>';
	div.innerHTML=string;
}

function ajouter_Admin()
{
	
	var div=document.getElementById("add_div");
	var string='  <div class="module">\
                    <div class="module-head">\
                        <h3>Administrateur</h3>\
                   </div> \
				   <div class="module-body">\
					<form  class="form-horizontal" action="" method="post">\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Login</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="login" id="login" class="span3" >\
									<span class="add-on"><i class="icon-user"></i></span>\
								</div>\
							</div>\
						</div>\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Mot de passe</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="pwd" id="pwd" placeholder="" class="span3">\
									<span class="add-on">**</span>\
								</div>\
							</div>\
						</div>\
							<div class="control-group">\
							<label class="control-label" for="basicinput">Societé</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="societe" id="societe" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-building"></i></span>\
								</div>\
							</div>\
						</div>\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Numéro de telephone</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="telephone" id="telephone" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-phone"></i></span>\
								</div>\
							</div>\
						</div>\
							<div class="control-group">\
							<label class="control-label" for="basicinput">Adresse e-mail</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="mail" id="mail" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-envelope"></i></span>\
								</div>\
							</div>\
						</div><br>\
                        <div class="btn-group pull-right" style="position:inherit;">\
				<input type="submit" name="creer" id="creer" class="btn btn-success" value="Ajouter">\
                   </div><br><br> \
			</form></div></div>';
	div.innerHTML=string;
}

function ajouter_gestionnaire()
{
	
	var div=document.getElementById("add_div");
	var string='  <div class="module">\
                    <div class="module-head">\
                        <h3>Gestionnaire de campagne</h3>\
                   </div> \
				   <div class="module-body">\
					<form  class="form-horizontal" action="" method="post">\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Login</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="login" id="login" class="span3" >\
									<span class="add-on"><i class="icon-user"></i></span>\
								</div>\
							</div>\
						</div>\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Mot de passe</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="pwd" id="pwd" placeholder="" class="span3">\
									<span class="add-on">**</span>\
								</div>\
							</div>\
						</div>\
							<div class="control-group">\
							<label class="control-label" for="basicinput">Societé</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="societe" id="societe" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-building"></i></span>\
								</div>\
							</div>\
						</div>\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Numéro de telephone</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="telephone" id="telephone" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-phone"></i></span>\
								</div>\
							</div>\
						</div>\
							<div class="control-group">\
							<label class="control-label" for="basicinput">Adresse e-mail</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="mail" id="mail" placeholder="" class="span3">\
									<span class="add-on"><i class="icon-envelope"></i></span>\
								</div>\
							</div>\
						</div><br>\
                        <div class="btn-group pull-right" style="position:inherit;">\
				<input type="submit" name="creer" id="creer" class="btn btn-success" value="Ajouter">\
                   </div><br><br> \
			</form></div></div>';
	div.innerHTML=string;
}



function ajouter_dossier()
{
	
	var div=document.getElementById("add_div");
	var string='  <div class="module">\
                    <div class="module-head">\
                        <h3>Nouveau dossier</h3>\
                   </div> \
				   <div class="module-body">\
					<form  class="form-horizontal" action="" method="post">\
						<div class="control-group">\
							<label class="control-label" for="basicinput">Nom du dossier</label>\
							<div class="controls">\
								<div class="input-append">\
									<input type="text" name="dirname" id="dirname" class="span3" >\
									<span class="add-on"><i class="icon-folder-open"></i></span>\
								</div>\
							</div>\
						</div>\
						<div class="control-group">\
							<label class="control-label">Portée</label>\
								<div class="controls">\
									<label class="radio">\
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="0" checked="">\
										Invisible\
									</label> \
									<label class="radio">\
										<input type="radio" name="optionsRadios" id="optionsRadios2" value="1">\
										Visible\
									</label> \
								</div>\
							</div>\
						<br>\
                        <div class="btn-group pull-right" style="position:inherit;">\
				<input type="submit" name="creer" id="creer" class="btn btn-success" value="Ajouter">\
                   </div><br><br> \
			</form></div></div>';
	div.innerHTML=string;
}

function ajouter_fichier()
{
	
	var div=document.getElementById("add_div");
	var hdn=document.getElementById("hidn");
	var string='  <div class="module">\
                    <div class="module-head">\
                        <h3>Nouveau fichier</h3>\
                   </div> \
				   <div class="module-body">\
					<form  class="form-horizontal" action="" method="post">\
						<div class="control-group">\
							</div>\
						<input type="file" class="filestyle" data-iconName="glyphicon-inbox" id="file" name="file">  \
						<br>\
                        <div class="btn-group pull-right" style="position:inherit;">\
				<input type="submit" name="creerFile" id="creerFile" class="btn btn-success" value="Ajouter">\
                   </div><br><br> \
			</form></div></div>';
	div.innerHTML=string;
	alert (hdn.value);
}
