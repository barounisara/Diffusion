<?php
if(isset($_POST['creer']))
{
		$servername = "localhost";
		$username = "root";
		$password = "password";
		$database="diffusion";
		// Create connection
        // keep track post values
        $login=$_POST['login'];
        $pwd=$_POST['pwd']; 
        // delete data
        $conn = new mysqli($servername, $username, $password,$database);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        $sql = "INSERT INTO utilisateur(login,password) VALUES('$login','$pwd')";
		if(!$select=$conn->query($sql))
		{
			die("selection error".$conn->error);
		}
        header("Location: liste_users.php");
	}
?>
<html>
<head></head>
<body>
 <form action="creer.php" method="post">
<input type="text" name="login" id="login">
<input type="text" name="pwd" id="pwd">
<input type="submit" name="creer" id="creer" value="Ajouter un support">
</form>
</body>
</html>