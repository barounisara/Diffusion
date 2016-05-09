<?php
function liste_utilisateurs()
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
		echo'<a href="creer.php">Creer</a>';
		$query="SELECT login from utilisateur ";
		$select=$conn->query($query);
		echo "<table>";
		while($row = $select->fetch_array())
		  {   
			echo"<tr>";
			echo "<td>".$row['login']."</td>";
			echo '<td><a href="supprimer.php?id='.$row['login'].'">Supprimer</a></td>';
			echo "</tr>";
        } 
		echo "</table>";
		}
		liste_utilisateurs();
?>