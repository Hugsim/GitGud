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
            $sql = "SELECT bildid, title, description, private From imagedata ORDER BY time DESC";
            $result = $conn->query($sql);


            if ($result === false) {
                die(mysqli_error($conn)); 
            }
            elseif ($result->num_rows > 0) {
                echo '<a href="auth_SVAR.php"><h2>Tillbaka</h2></a>';
                echo '<div class="lastImages">';
				while($row = $result->fetch_assoc()) {
                    $src = "images/".$row["bildid"];
                    if(!$row["private"]){
                        echo '<div class="image"><img src="'.$src.'"/>
                            <p class="title">'.$row["title"].'</p>
                            <p class="de">'.$row["description"].'</p>
                            </div>';
                    }
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