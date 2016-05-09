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
		$query="SELECT * FROM utilisateur WHERE login='$login' AND password='$pwd'";
		$select=$conn->query($query);
		$num_rows = mysqli_num_rows($select);
		if($num_rows>=1)
		{
			echo ("success");
			//session_start();
			//$_SESSION['Login']=$login;
			//header('Location:https://127.0.0.1/projects/diffusion/administrateur/index.php');
		}
		else echo "login ou mot de passe non valide, veuillez réessayer";
}
	connexion($_POST["login"],$_POST["password"]);
?>