<?php
		$servername = "localhost";
		$username = "root";
		$password = "password";
		$database="diffusion";
		// Create connection
        // keep track post values
        $id = $_GET['id'];
         
        // delete data
        $conn = new mysqli($servername, $username, $password,$database);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
        $sql = "DELETE FROM `group` WHERE idGroup ='$id'";
       $select=$conn->query($sql);
	   $sql="UPDATE `utilisateur` set idGroup=null WHERE idGroup='$id'";
	   $select=$conn->query($sql);
        header("Location: liste_groups.php");
?>