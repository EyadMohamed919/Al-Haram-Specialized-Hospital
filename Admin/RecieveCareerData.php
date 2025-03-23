<?php
$servername = "sql103.infinityfree.com"; 
$username = "if0_38377371"; 
$password = "kotfdYxZTuM"; 
$database = "if0_38377371_hospital"; 


// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname, email, dob, phone, gender, resume FROM career";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['firstname'] . "</td>
                <td>" . $row['lastname'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['dob'] . "</td>
                <td>" . $row['phone'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td><button onclick=removeTableID(this) class=remove-button type=submit value=Remove>Remove</button></td>
            </tr>";
    }
}


$conn->close();
?>
