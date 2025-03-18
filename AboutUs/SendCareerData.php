<?php
// $servername = "sql312.infinityfree.com"; 
// $username = "if0_38545498"; 
// $password = "oNcWcXZM3fR"; 
// $database = "if0_38545498_hospital"; 

$servername = "localhost"; 
$username = "eyad_mohamed";
 
$database = "hospital"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['Fname'];
    $lname = $_POST['Lname'];
    $email = $_POST['email'];
    $dob = $_POST['DOB'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    
    
    $cv_file = $_FILES['cv']['name'];
    $cv_tmp_name = $_FILES['cv']['tmp_name'];
    $cv_folder = "uploads/" . basename($cv_file);
    
    // Ensure uploads directory exists
    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }
    
    if (move_uploaded_file($cv_tmp_name, $cv_folder)) {
        $cv_path = $cv_folder;
    } else {
        die("Error uploading CV.");
    }
    
    
    $sql = "INSERT INTO career (firstname, lastname, email, dob, phone, gender, resume) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $fname, $lname, $email, $dob, $phone, $gender, $cv_path);
    
    if ($stmt->execute()) {
        echo "Data submitted successfully.";
        header("location:../success.html");
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}


$conn->close();
?>