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
                    echo "Dina lösenord stämmer inte överens! ";
                    echo '<a href="signup.html">Testa igen här</a>';
                }
                elseif (!$duplicate) {
                    echo " Det funka!";
                    $sql = "INSERT INTO userdata VALUES ('".$newuserid."','". $_POST["user"] ."', '". $_POST["pass"] ."', '". $_POST["email"] ."');"; //to do, make säker, förklara vad du vill göra /hugo
                    $result = $conn->query($sql);
                    //mysqli_query($conn, $sql);
                    echo "Användaren '".$_POST["user"]."' finns nu i databasen! ";
                    echo '<a href="login.html">Logga in här!</a>';
				}
                else{
                    echo "Användarnamn upptaget!  ";
                    echo '<a href="signup.html">Testa igen här</a>';
                }

			}
				
			else {
				echo "Wrong login information!";
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
z		
	</body>
</html>


