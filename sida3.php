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

    $okLoggin = false;

    $sql = "SELECT * FROM userdata WHERE authlvl < " . $_SESSION["authlvl"] . " OR username = '".$_SESSION["username"]."'";
    $result = $conn->query($sql);

    if ($result === false) {
        die(mysqli_error($conn)); 
    }
    elseif ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if (($row["username"] == $_SESSION["username"] and $row["password"] == $_SESSION["password"]) ) {
                $okLoggin = true;
                echo "Inloggad som: " . $_SESSION["username"] . "<br>";
                echo "Grattis du har kommit till sida3!";
                echo "<a href='sida1.php'>Sida1</a><br>";
                echo "<a href='sida2.php'>Sida2</a><br>";
                echo "<a href='logout.php'>Logga ut!</a> <br>";
                    echo "<br><br><br>";
                echo "<table> <tr> <th>Användare</th> <th>Lösenord</th> <th>Adress</th> <th>Nummer</th> <th>Authlvl</th></tr>";
            }
        }
    }
else {
    echo "Wrong login information!";
    session_unset();
}

    $result = $conn->query($sql);

    if ($result === false) {
        die(mysqli_error($conn)); 
    }

    elseif ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($okLoggin) {
                echo "<tr>
                    <td>".$row["username"]."</td>
                    <td>".$row["password"]."</td>
                    <td>".$row["address"]."</td> 
                    <td>".$row["phonenumber"]."</td>
                    <td>".$row["authlvl"]."</td>
                    </tr>";
            }
        }   
        echo "</table>";
    }
    else {
        echo "blblblabslbdalbdlabdbla";
    }

    echo "<br><br><br>";

    $sql = "SELECT boss FROM extradata WHERE username = '" . $_SESSION["username"] ."'";
    $result = $conn->query($sql);

    if ($result === false) {
        die(mysqli_error($conn)); 
    }
     elseif ($result->num_rows > 0) {
        echo "<table> <tr> <th>Användare</th> <th>Namn</th> <th>Lön</th> <th>Anställningsdatum</th> <th>Boss</th></tr>";
        $row = $result->fetch_assoc();
        $sql = "SELECT * FROM extradata";
        $result = $conn->query($sql);
        if ($row["boss"]){
            if ($result === false) {
                die(mysqli_error($conn)); 
            }
             elseif ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>".$row["username"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["salary"]."</td> 
                    <td>".$row["employmentdate"]."</td>
                    <td>".$row["boss"]."</td>
                    </tr>";
                }
            }
            else {
                echo "Wops2!";
            }
            echo "
            <form action='changesalary.php' method='post'>
                <fieldset>
                <legend>Inmatningsfält</legend>
                    <ul>
                        <li>
                            <label>Användarnamn: </label>
                            <input type='text' name='user'> 
                        </li>
                        <li>
                            <label>Sätt lön: </label>
                            <input type='text' name='salary'> 
                        </li>
                    </ul>
                    <input type='submit' value='Skicka'>
                </fieldset>
            </form>
            ";
        }
        else{
            $sql = "SELECT * FROM extradata WHERE username = '" . $_SESSION["username"] ."'";
            $result = $conn->query($sql);

            if ($result === false) {
                die(mysqli_error($conn)); 
            }
            elseif ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>".$row["username"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["salary"]."</td> 
                    <td>".$row["employmentdate"]."</td>
                    <td>".$row["boss"]."</td>
                    </tr>";
                }
            }
            else {
                echo "Wops3!";
            }
        } 
        echo "</table>";
    }
    else {
        echo "Wops!";
    }    
    

    }
    else{
        echo "Not Logged in";
    }
}
else{
        echo "Not Logged in";
}
    
    /*
    if ($result === false) {
        die(mysqli_error($conn)); 
    }
    elseif ($result->num_rows > 0) {
        echo "<table> <tr> <th>Användare</th> <th>Lösenord</th> <th>Adress</th> <th>Nummer</th> <th>Authlvl</th></tr>";
        while($row = $result->fetch_assoc()) {
                
        }
    }
    else {
        echo "Wops!";
    }
    */
 ?>

