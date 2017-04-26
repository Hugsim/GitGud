<?php 
session_start();

if (isset($_SESSION["loginT"]))
{
    if($_SESSION["loginT"] === true)
    {

	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sessions";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT username, password FROM userdata";
    $result = $conn->query($sql);

    if ($result === false) {
        die(mysqli_error($conn)); 
    }
    elseif ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
	        if ($row["username"] == $_SESSION["username"] and $row["password"] == $_SESSION["password"]) {
	    		echo "Inloggad som: ";
	    		echo $_SESSION["username"];
	    		echo "<br>";
	    		echo "Du har kommit till sida2! Grattis!!1!!!two<br>";
				echo "<a href='sida1.php'>Sida1</a><br>";
				echo "<a href='sida3.php'>Sida3</a><br>";
                echo "<a href='logout.php'>Logga ut!</a> <br>";
				echo "<img src='WbserverProject.png'>";

	        }
	    }
    }
	       
	else {
	    echo "Wrong login information!";
	    session_unset();
	}

    }
    else{
        echo "Not Logged in";
    }
}
else{
        echo "Not Logged in";
}

 ?>