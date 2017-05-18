<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="stylebuttons.css">
		<link rel="stylesheet" href="styleauthsvar.css">
    </head>
    <body class="body">

<?php 
function logout(){
    echo "<h2>Du har loggat ut!</h2><br>";
    echo '<a href="login.html"><h2>Logga in igen!</h2></a>';
    header('HTTP/1.1 401 Unauthorized'); //själva "utloggningen", alltså omdirigerad till en 401 sida
    return true;
}

logout();

 ?>

    <img class="logo" src="bildr.png"/>
 </body>
</html>