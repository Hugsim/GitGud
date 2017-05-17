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
			header("Location: login.html");
			die();
		}
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "bildr";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			$conn->set_charset("utf8");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT username, password FROM userdata";
			$result = $conn->query($sql);

			$loginT = false;

			if ($result === false) {
				die(mysqli_error($conn)); 
			}
			elseif ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if (strtolower($row["username"]) == strtolower($_POST["user"]) and $row["password"] == $_POST["pass"]) {
						$_SESSION["username"] = $row["username"];
						$_SESSION["password"] = $row["password"];
						echo '<a href="logout.php">Logga ut!</a>';
						echo '<p class="welcome">Welcome ' . $_SESSION["username"]. '!</p>';
						echo '
							<div class="button-row">
            					<div class="button"> <a href="signup.html" class="animated-button sign-in">Privata Bilder</a> </div>
            					<div class="button"> <a href="login.html" class="animated-button login ">Public bilder</a> </div>
								<div class="button"> <a href="upload.php" class="animated-button upload ">Ladda upp</a> </div>
								<div class="button"> <a href="logout.php" class="animated-button logout ">Logga ut</a> </div>
        					</div>
							';
						echo '<form action="imgUpload.php" class="form">
                      		<input type="file" name="pic" accept="image/*">
                      		<input type="submit">
                  		</form>';
						$loginT = true;
						$_SESSION["loginT"] = true;
					}
				}
				if (!$loginT) {
					echo "Wrong login!";
					$_SESSION["loginT"] = false;
					session_unset();
				}
			}
				
			else {
				echo "Wrong login information!";
			session_unset();
			}
		
		?>
		
	</body>
</html>


