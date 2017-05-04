<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body class="body">
		<?php
		session_start();
		if (!isset($_POST["user"]) or !isset($_POST["pass"]))
		{
			header("Location: auth.html");
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

			$loginT = false;

			if ($result === false) {
				die(mysqli_error($conn)); 
			}
			elseif ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if ($row["username"] == $_POST["user"] and $row["password"] == $_POST["pass"]) {
						$_SESSION["username"] = $row["username"];
						$_SESSION["password"] = $row["password"];
						echo "Inloggad som: ";
						echo $_SESSION["username"];
						echo "<br>";
						echo "<a href='sida1.php'>Sida1</a><br>";
						echo "<a href='sida2.php'>Sida2</a><br>";
						echo "<a href='sida3.php'>Sida3</a><br>";
						echo "<a href='logout.php'>Logga ut!</a> <br>";
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
		<p>Welcome <?php echo $_SESSION["username"]?>!</p>
	</body>
</html>


