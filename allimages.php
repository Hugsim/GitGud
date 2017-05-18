<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="stylebuttons.css">
		<link rel="stylesheet" href="styleauthsvar.css">
        <link rel="stylesheet" href="stylesheetLastImages.css">
    </head>
    <body class="body">
		<?php
		session_start();

		if ($_SESSION["loginT"]) { 
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bildr";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $conn->set_charset("utf8");
            $sql = "SELECT bildid From imagedata";
            $result = $conn->query($sql);


            if ($result === false) {
                die(mysqli_error($conn)); 
            }
            elseif ($result->num_rows > 0) {
                echo '<div class="lastImages">';
				while($row = $result->fetch_assoc()) {
                    $src = "images/".$row["bildid"];
                    echo '<div class="image"><img src="'.$src.'"/></div>';
				}
                echo '</div>';
			}
        }
        else {
            header("Location: login.html");
            die();
        }

        ?>		
        <img class="logo" src="bildr.png"/>
	</body>
</html>