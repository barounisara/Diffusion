<?php

error_reporting(0); // Set E_ALL for debuging

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeLocalFileSystem.class.php';
// Required for MySQL storage connector
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeMySQL.class.php';
// Required for FTP connector support
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeFTP.class.php';


/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/
function access($attr, $path, $data, $volume) {

	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}
function getBaseDir()
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
        session_start();
        $login=$_SESSION['Login'];
        $query="SELECT societe from `admin` where login='$login'";
        $query2="SELECT societe from `gestionnairecampagne` where login='$login'";
        if($select=$conn->query($query))
        {
            if( $row = $select->fetch_array())
            {
                $societe=$row['societe'];
                $dir= "../files/".$societe;
             }   
        }
        else if($select2=$conn->query($query2))
        {
            if( $row2 = $select2->fetch_array())
            {           
                $societe2=$row2['societe'];
                $dir="../files/".$societe2;
            }
        }
        return $dir;
}
$opts = array(
	// 'debug' => true,
	'roots' => array(
		array(
			'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
			'path'          => getBaseDir(),         // path to files (REQUIRED)
			'URL'           => 'files/'.getBaseDir(), // URL to files (REQUIRED)
			'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
		)
	)
);

// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();

