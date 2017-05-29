<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="stylebuttons.css">
		<link rel="stylesheet" href="styleauthsvar.css">
		<link rel="stylesheet" href="styleauthsvar.css">
    </head>
    <body class="body">
		<?php
		session_start();
		if (!isset($_POST["user"]) or !isset($_POST["pass"]))
		{
			header("Location: signup.html");
			die();
		}
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

			$sql = "SELECT userid, username, password FROM userdata";
			$result = $conn->query($sql);

            $newuserid = base_convert(rand(0, 1679615), 10, 36);//makes new user id

			$duplicate = false;
            $okuserdata = false;
            $userids = array();//alla user ids

			if ($result === false) {
				die(mysqli_error($conn)); 
			}
			elseif ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if (strtolower($row["username"]) == strtolower($_POST["user"])) {
						$duplicate = true;
					}
                    array_push($userids, $row["userid"]);
				}
                $newuserid = checkuserid($userids, $newuserid);
                //echo $newuserid;
                if($_POST["pass"] != $_POST["pass2"]){
                    echo "<h2>Dina lösenord stämmer inte överens! </h2>";
                    echo '<a href="signup.html"><h2>Testa igen här</h2></a>';
                }
                elseif (!$duplicate) {
                    echo " Det funka!";
                    $sql = "INSERT INTO userdata VALUES ('".$newuserid."','". $_POST["user"] ."', '". $_POST["pass"] ."', '". $_POST["email"] ."');"; //to do, make säker, förklara vad du vill göra /hugo
                    $result = $conn->query($sql);
                    //mysqli_query($conn, $sql);
                    echo "<h2>Användaren '".$_POST["user"]."' finns nu i databasen! </h2>";
                    echo '<a href="login.html"><h2>Logga in här!</h2></a>';
				}
                else{
                    echo "<h2>Användarnamn upptaget!  </h2>";
                    echo '<a href="signup.html"><h2>Testa igen här</h2></a>';
                }

			}
				
			else {
				echo "<h2>Wrong login information!</h2>";
			session_unset();
			}
            function checkuserid($db, $co){
                foreach ($db as $key => $value){
                    if ($value == $co){
                        $newuserid = base_convert(rand(0, 1679615), 10, 36);
                        checkuserid($userids, $newuserid);
                    }
                    else{
                        return $co;
                    }
                }
            }
		
		?>
		<img class="logo" src="bildr.png"/>		
	</body>
</html>


