<?php
$formType = isset($_GET['form']) ? $_GET['form'] : '';
$txtFile = "txtFiles/" . $formType . "Form.txt";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Read existing data to find last ID
    $data = file($txtFile, FILE_IGNORE_NEW_LINES);
    $lastId = 0;
    if (!empty($data)) {
        $lastRow = explode("|", end($data));
        $lastId = (int)$lastRow[0];
    }

    $newId = $lastId + 1;

    $record = [
        $newId,
        $_POST['doctor'],
        $_POST['fname'],
        $_POST['lname'],
        $_POST['sex'],
        $_POST['phone'],
        $_POST['email'],
        $_POST['date'],
        $_POST['time']
    ];

    $line = implode("|", $record) . "\n";
    file_put_contents($txtFile, $line, FILE_APPEND);
    
    echo "<script>alert('Record added successfully!'); window.location.href='admin.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php
session_start();


if (!isset($_SESSION["user_email"]) || !isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] !== true) {
    header("Location: ../index.php"); // Redirect non-admins
    exit();
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Record - <?= ucfirst($formType) ?></title>
    <style>
        form { max-width: 500px; margin: auto; }
        input, select { width: 100%; margin: 5px 0; padding: 8px; }
        button { padding: 10px 15px; background: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background: #45a049; }
    </style>
</head>
<body>
<h2 style="text-align:center;">Add New <?= ucfirst($formType) ?> Record</h2>
<form method="post">
    <input type="text" name="doctor" placeholder="Doctor" required>
    <input type="text" name="fname" placeholder="First Name" required>
    <input type="text" name="lname" placeholder="Last Name" required>
    <select name="sex" required>
        <option value="">Sex</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    <input type="text" name="phone" placeholder="Phone" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="date" name="date" required>
    <input type="time" name="time" required>
    <button type="submit">Add Record</button>
</form>
</body>
</html>
