<?php
session_start();
$answer = shell_exec("C:/Users/PC/Desktop/dropbox sarra/pfe engineering/ConsoleApplication1/x64/Release/ConsoleApplication1.exe");
echo "bonjour ".$_SESSION['Login'];
?>
<html>
<head>
<title></title>
<script src="jquery/jquery-1.11.2.min.js"></script>
<script> 
$(function(){
  $("#header").load("header.html"); 
  $("#footer").load("footer.html"); 
});
</script> 
</head>
<body>
<div id="header"></div>
<!--Remaining section-->
<div id="footer"></div>
</body>
</html>