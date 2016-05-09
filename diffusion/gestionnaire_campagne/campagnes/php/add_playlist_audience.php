<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database="diffusion";
        $playlistname=$_POST["playlistname"];
        $description=$_POST["description"];
        $groupid=intval($_POST["group"]);
        $filelist=str_replace("\\", "\\\\", $_POST["filelist"]);
        $filelistmen=str_replace("\\", "\\\\", $_POST["filelistmen"]);
        $filelistwomen=str_replace("\\", "\\\\", $_POST["filelistwomen"]);
        $filePaths = explode("|", $filelist);
        $filePathsmen = explode("|", $filelistmen);
        $filePathswomen = explode("|", $filelistwomen);
        // Create connection
        $conn = new mysqli($servername, $username, $password,$database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $insertplaylist="INSERT INTO `campagne` (labelcampagne,description,`group`,separationSexuee) VALUES('$playlistname','$description','$groupid',1)";
        if(!$select=$conn->query($insertplaylist))
            {
                die("Erreur d'insertion".$conn->error);
            }
        $string="SELECT idCampagne FROM `campagne` WHERE labelCampagne='$playlistname' and description='$description'";
        $select=$conn->query($string);        
        $row = $select->fetch_row();
                $idcamp=$row["0"];
           
            $idcampagne=intval($idcamp);

            //standard playlist
        for($i=0;$i<sizeof($filePaths);$i++)
            {
                $paths=explode("\\", $filePaths[$i]);
                $path=$paths[sizeof($paths)-1];
                if($path!="")
                {
                    $string="INSERT INTO `media`(labelMedia,source,genre,campagne) VALUES ('$path','$filePaths[$i]',2,'$idcampagne') ";
                     if(!$select=$conn->query($string))
                        {
                            die("Erreur d'insertion".$conn->error);
                        }
                        $filePaths[$i]=str_replace('\\\\', '\\', $filePaths[$i]);
                    $id=$conn->insert_id;
                    $string = "INSERT INTO `playlist_fichier`(idpaylist,idfichier,genre) VALUES ('$idcampagne','$id',2)";
                    if(!$select=$conn->query($string))
                    {
                        die("Erreur d'insertion".$conn->error);
                    }
                      
                }

            }

            //insertion playlist men
             for($i=0;$i<sizeof($filePathsmen);$i++)
            {
                $pathsmen=explode("\\\\", $filePathsmen[$i]);
                $pathmen=$pathsmen[sizeof($pathsmen)-1];
                if($pathmen!="")
                {
                    $string="INSERT INTO `media`(labelMedia,source,genre) VALUES ('$pathmen','$filePathsmen[$i]',0) ";
                     if(!$select=$conn->query($string))
                        {
                            die("Erreur d'insertion".$conn->error);
                        }
                    $filePathsmen[$i]=str_replace('\\\\', '\\', $filePathsmen[$i]);
                    $id=$conn->insert_id;
                    $string = "INSERT INTO `playlist_fichier`(idpaylist,idfichier,genre) VALUES ('$idcampagne','$id',0)";
                    if(!$select=$conn->query($string))
                    {
                        die("Erreur d'insertion".$conn->error);
                    }
                }
            }
            // playlist women
        for($i=0;$i<sizeof($filePathswomen);$i++)
            {
                $pathswomen=explode("\\\\", $filePathswomen[$i]);
                $pathwomen=$pathswomen[sizeof($pathswomen)-1];
                if($pathwomen!="")
                {
                    $string="INSERT INTO `media`(labelMedia,source,genre) VALUES ('$pathwomen','$filePathswomen[$i]',1) ";
                    if(!$select=$conn->query($string))
                        {
                            echo("Erreur d'insertion".$conn->error);
                        }
                    $filePathswomen[$i]=str_replace('\\\\', '\\', $filePathswomen[$i]);
                    $id=$conn->insert_id;
                    $string = "INSERT INTO `playlist_fichier`(idpaylist,idfichier,genre) VALUES ('$idcampagne','$id',1)";
                    if(!$select=$conn->query($string))
                        {
                            echo("Erreur d'insertion".$conn->error);
                        }
                }

            }
        print_r($filePaths);
?>