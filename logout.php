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
    session_start();
    echo "Du har loggat ut!<br>";
    echo '<a href="login.html">Logga in igen!</a>';
    header('HTTP/1.1 401 Unauthorized'); //själva "utloggningen", alltså omdirigerad till en 401 sida
    session_unset();
    session_destroy();
    return true;
}

logout();

 ?>

    <img class="logo" src="bildr.png"/>
 </body>
</html>