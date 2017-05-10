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

			$sql = "SELECT username, password FROM userdata";
			$result = $conn->query($sql);

			$duplicate = false;

			if ($result === false) {
				die(mysqli_error($conn)); 
			}
			elseif ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if ($row["username"] == $_POST["user"]) {
						$duplicate = true;
					}
				}
				if (!$duplicate) {
					echo "Acepteble userdata!";
					$sql = "INSERT INTO userdata (`userid`, `username`, `password`, `mail`) VALUES (, , ,)"; //to do, make säker, förklara vad du vill göra /hugo
			        $result = $conn->query($sql);					
				}
			}
				
			else {
				echo "Wrong login information!";
			session_unset();
			}
		
		?>
		
	</body>
</html>


