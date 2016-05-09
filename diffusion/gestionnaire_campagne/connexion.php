<?php
function connexion($login,$pwd)
{
	
		$servername = "localhost";
		$username = "root";
		$password = "password";
		$database="diffusion";
		// Create connection
		$conn = new mysqli($servername, $username, $password,$database);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";
		$query="SELECT * FROM admin WHERE login='$login' AND password='$pwd'";
		$select=$conn->query($query);
		$num_rows = mysqli_num_rows($select);
		if($num_rows<1){echo "Le login ou le mot de passe incorrects veuillez les resaisir"; }
		else
		{
			session_start();
			$_SESSION['Login']=$login;
			header('Location:accueil.php');
		}
}
?>
<html>
<head></head>
<body>
<form name="history" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype='multipart/form-data' method="POST">
Login:<input type="text" name="login" id="login"/>
Mot de passe:<input type="password" name="password" id="password"/>
<input type="submit" name="submit" value="Connexion">
</form>
<?php
if(isset($_POST['submit']))
{
	connexion($_POST["login"],$_POST["password"]);
	}
?>
</body>
</html>