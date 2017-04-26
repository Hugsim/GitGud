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

    $sql = "UPDATE extradata SET salary = ". $_POST["salary"] ." WHERE username = '".$_POST["user"]."'; DROP TABLE droptest";
    //$sql2= "UPDATE extradata SET salary = 123 WHERE username = 'hu'; DROP TABLE droptest; UPDATE extradata SET salary = 123 WHERE username = 'hu'";


    $result = $conn->query($sql);

    if ($result === false) {
        die(mysqli_error($conn)); 
    }
	       
	else {
	    mysqli_query($conn, $sql);
	    echo "Updaterat lön för '".$_POST["user"]."'";
	    echo "<br><a href='sida3.php'>Sida3</a>";
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