<?php
$servername = "localhost"; 
$username = "eyad_mohamed";

$database = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["email"];
echo $email;
$password = $_POST["password"];


$SQL = $conn->prepare("SELECT admin, email, password, username FROM user WHERE email = ? AND password = ?");
$SQL->bind_param("ss", $email, $password);
$SQL->execute();
$result = $SQL->get_result();

if ($row = $result->fetch_assoc()) {
    $_SESSION["user_email"] = $email;
    
    if ($row["admin"] == 1) {
        session_start();
        $_SESSION["user_email"] = $email;
        $_SESSION["is_admin"] = true;
        $_SESSION["user_name"] = $row["username"];
        $_SESSION["user_pass"] = $row["password"];
        echo "Welcome Admin!";
        header("Location: Admin/adminPage.php");
    } else {
        $_SESSION["is_admin"] = false;
        echo "Welcome User!";
        header("Location: index.php");
    }
    exit();
} else {
    echo "Invalid email or password!";
    header("Location: Login.php");
}

 ?>
