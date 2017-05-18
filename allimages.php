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

            $newimageid = base_convert(rand(0, 1679615), 10, 36);
            $imageids = array();

            if ($result === false) {
                die(mysqli_error($conn)); 
            }
            elseif ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    array_push($imageids, $row["bildid"]);
				}
                $newimageid = checkimageid($imageids, $newimageid);

                echo " Det funka!";
                $sql = "INSERT INTO imagedata VALUES ('".$newimageid."','". $_POST["title"] ."', '". $_POST["description"] ."', '". $_SESSION["userid"] ."', '". date("Y-m-d H:i:s") ."', true);"; //to do, make säker, förklara vad du vill göra /hugo
                //$result = $conn->query($sql);
                $svar = mysqli_query($conn, $sql);
                echo $svar;
                echo "Bilden finns nu i databasen! <br>";
                echo '<a href="login.html">Logga in här!</a>';
			}
        }
        else {
            header("Location: login.html");
            die();
        }
        
        ?>		
	</body>
</html>