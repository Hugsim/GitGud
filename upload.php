<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="stylebuttons.css">
		<link rel="stylesheet" href="styleauthsvar.css">
    </head>
    <body class="body">
		<?php
		session_start();

		if ($_SESSION["loginT"]) { 
            
        }
        else {
            header("Location: login.html");
            die();
        }

		?>
		
	</body>
</html>


