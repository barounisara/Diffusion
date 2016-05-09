<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database="diffusion";
        $playlistname=$_POST["playlistname"];
        $description=$_POST["description"];

        // Create connection
        $conn = new mysqli($servername, $username, $password,$database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $insertplaylist="INSERT INTO `campagne` (labelcampagne,description) VALUES('$playlistname','$description')";
        if(!$select=$conn->query($insertplaylist))
            {
                die("Erreur d'insertion".$conn->error);
            }
        $string="SELECT idCampagne FROM `campagne` WHERE labelCampagne='$playlistname' and description='$description'";
        $select=$conn->query($string);
        while($row = $select->fetch_array())
            {   
                $idcampagne=$row["idCampagne"];
            }
        $filePaths = explode("|", $_POST["filelist"]);
        for($i=0;$i<sizeof($filePaths);$i++)
            {
                $paths=explode("\\", $filePaths[$i]);
                $path=$paths[sizeof($paths)-1];
                if($path!="")
                {
                    $string="INSERT INTO `media`(labelMedia,source) VALUES ('$path','$filePaths[$i]') ";
                     if(!$select=$conn->query($string))
                        {
                            die("Erreur d'insertion".$conn->error);
                        }
                        $string="SELECT idMedia FROM `media` WHERE labelMedia='$path' and source='$filePaths[$i]'";
                         if(!$select=$conn->query($string))
                            {
                                die("Erreur de selection".$conn->error);
                            }

                        while($row = $select->fetch_array())
                          {   
                            $id=$row["idMedia"];
                          }
                          $string = "INSERT INTO `playlist_fichier` VALUES ('$idcampagne','$id')";
                        if(!$select=$conn->query($string))
                        {
                            die("Erreur d'insertion".$conn->error);
                        }
                }
            }
        print_r($filePaths);
?>