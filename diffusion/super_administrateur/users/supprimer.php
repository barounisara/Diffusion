<?php
       	$servername = "localhost";
		$username = "root";
		$password = "";
		$database="diffusion";
		// Create connection
		$conn = new mysqli($servername, $username,$password,$database);
		// Check connection
		 $id = $_GET['id'];
        $sql = "DELETE FROM utilisateur WHERE login LIKE'$id'";
       	$select=$conn->query($sql);
        header("Location: liste_users.php");
?>