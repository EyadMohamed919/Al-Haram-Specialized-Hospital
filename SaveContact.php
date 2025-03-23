<?php
$servername = "sql312.infinityfree.com"; 
$username = "if0_38545498"; 
$password = "oNcWcXZM3fR"; 
$database = "if0_38545498_hospital"; 


// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$fname = $_POST['Fname'];
$lname = $_POST['Lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gov = $_POST['Gaddress'];
$city = $_POST['Caddress'];
$type = $_POST['type'];
$message = $_POST['message'];




$sql = "INSERT INTO contact (fname, lname, email, phone, gov, city, type, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $fname, $lname, $email, $phone, $gov, $city, $type, $message);

if ($stmt->execute()) {
    echo "Data submitted successfully.";
    header("location:../successContact.html");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();



$conn->close();
?>