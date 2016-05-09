<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
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
        $sql = "DELETE FROM superadmin WHERE login ='$id'";
       $select=$conn->query($sql);
        header("Location: liste_superAdmin.php");
?>