<<<<<<< HEAD
<?php
$file = "../BF.txt"; 

function readData($file) {
    if (!file_exists($file)) {
        return [];
    }

    $content = trim(file_get_contents($file));
    if (empty($content)) return [];

    $entries = array_filter(explode("-------------------------", $content));
    $data = [];

    foreach ($entries as $entry) {
        $lines = array_filter(explode("\n", trim($entry)));
        $record = [];

        foreach ($lines as $line) {
            if (str_contains($line, ": ")) {
                list($key, $value) = explode(": ", $line, 2);
                $record[$key] = trim($value);
            }
        }

        if (!empty($record)) {
            $data[] = $record;
        }
    }
    return $data;
}

function writeData($file, $data) {
    $content = "";

    foreach ($data as $record) {
        if (!empty(array_filter($record))) {
            foreach ($record as $key => $value) {
                $content .= "$key: $value\n";
            }
            $content .= "-------------------------\n";
        }
    }

    file_put_contents($file, trim($content)); 
}

// Load existing data
$data = readData($file);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $newRecord = [
            "DonationID" => $_POST["DonationID"],
            "DonatorsName" => $_POST["DonatorsName"],
            "BloodType" => $_POST["BloodType"],
            "DonationDate" => $_POST["DonationDate"],
            "DonationCountry" => $_POST["DonationCountry"],
        ];
        $data[] = $newRecord; // Add new record
        writeData($file, $data);
    }

    if (isset($_POST['update']) && !empty($data)) {
        $data[count($data) - 1] = [
            "DonationID" => $_POST["DonationID"],
            "DonatorsName" => $_POST["DonatorsName"],
            "BloodType" => $_POST["BloodType"],
            "DonationDate" => $_POST["DonationDate"],
            "DonationCountry" => $_POST["DonationCountry"],
        ];
        writeData($file, $data);
    }

    if (isset($_POST['delete']) && !empty($data)) {
        array_pop($data); // Remove last added record
        writeData($file, $data);
    }
    header("Location: " . $_SERVER['PHP_SELF']); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
=======
<html>
<?php
session_start();


if (!isset($_SESSION["user_email"]) || !isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] !== true) {
    header("Location: ../index.php");
    exit();
}

?>
>>>>>>> 96d2521643808bb6b027e72a309e6d0e67517858
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Blood Donations</title>
    <link rel="stylesheet" type="text/css" href="../CSS Sheets/BEstylesheet1.css">
</head>
<body>
    <a href="DonationsBE-Homepage.php">DonationsBE-HomePage</a><hr>
    <p>Donations</p>
    <table border="1" id="Donationtable">
        <tr>
            <th>Donation ID</th>
            <th>Donator's Name</th>
            <th>Blood Type</th>
            <th>Date</th>
            <th>Country</th>
        </tr>
        <tr>
            <td>1</td>
            <td>khaled El Eserry</td>
            <td>A</td>
            <td>2024-12-18</td>
            <td>UAE</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Ira Ontrup</td>
            <td>B</td>
            <td>2024-11-15</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Indila luck</td>
            <td>O</td>
            <td>2024-10-04</td>
            <td>France</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Morgan Freeman</td>
            <td>AB</td>
            <td>2024-08-08</td>
            <td>USA</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kim taehyung</td>
            <td>O</td>
            <td>2024-09-24</td>
            <td>South Korea</td>
        </tr>
        <?php foreach ($data as $record): ?>
        <tr>
            <td><?= htmlspecialchars($record["DonationID"]) ?></td>
            <td><?= htmlspecialchars($record["DonatorsName"]) ?></td>
            <td><?= htmlspecialchars($record["BloodType"]) ?></td>
            <td><?= htmlspecialchars($record["DonationDate"]) ?></td>
            <td><?= htmlspecialchars($record["DonationCountry"]) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p>Control Donations</p>

    <div>
        <form method="post">
            <b><label for="DonationID">ID:</label></b><br>
            <input type="text" id="DonationID" name="DonationID" required><br><br>
            <b><label for="DonatorsName">Name:</label></b><br>
            <input type="text" id="DonatorsName" name="DonatorsName" required><br><br>
            <b><label for="BloodType">Blood Type:</label></b><br>
            <input type="text" id="BloodType" name="BloodType" required><br><br>
            <b><label for="DonationDate">Date:</label></b><br>
            <input type="date" id="DonationDate" name="DonationDate" required><br><br>
            <b><label for="DonationCountry">Country:</label></b><br>
            <input type="text" id="DonationCountry" name="DonationCountry" required><br><br>

            <button type="submit" name="add">Add Record</button><br><br>
            <button type="submit" name="update">Update Last Record</button><br><br>
            <button type="submit" name="delete">Remove Last Record</button><br><br>
        </form>
    </div>
</body>
</html>
