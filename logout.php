<?php 
function logout(){
    echo "Du har loggat ut!<br>";
    echo '<a href="auth.html">Logga in igen!</a>';
    header('HTTP/1.1 401 Unauthorized'); //själva "utloggningen", alltså omdirigerad till en 401 sida
    return true;
}

logout();

 ?>