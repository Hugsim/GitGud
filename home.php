<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="stylebuttons.css">
        <link rel="stylesheet" href="stylesheetLastImages.css">
    </head>
    <body class="body">
        <div class="button-row">
            <div class="button"> <a href="signup.html" class="animated-button sign-in">Sign up</a> </div>
            <div class="button"> <a href="login.html" class="animated-button login ">Login</a> </div>
        </div>
    <!--<div class="lastImages">
        <div class="image">
            <img src="images/bH729k"/>
            <p class="title">Titeln</p>
            <p class="de">här är en lite längre text</p>
        </div>
        <div class="image">
            <img src="images/bH729k"/>
        </div>
        <div class="image">
            <img src="images/bH729k"/>
        </div>                                                          Att göra: Dynamiskt hämta senaste bilderna 
        <div class="image">             
            <img src="images/bH729k"/>                                  Gjort
        </div>
        <div class="image">
            <img src="images/bH729k"/>
        </div>
        <div class="image">
            <img src="images/bH729k"/>
        </div>
    </div>-->
    <?php
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
        
        ?>

    <img class="logo" src="bildr.png"/>

    </body>
</html>