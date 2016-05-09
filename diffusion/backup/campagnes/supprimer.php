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
        $sql = "DELETE FROM `campagne` WHERE idCampagne ='$id'";
       $select=$conn->query($sql);
	    header("Location: list_files.php");
?>