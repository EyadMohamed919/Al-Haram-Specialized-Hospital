<?php
session_start();
if (!isset($_SESSION["Admin"]) || $_SESSION["Admin"] == false) {
    header("location: index.php");
    exit();
}
$filePath = __DIR__ . "/MedVol.txt";
function readData($filePath) {
    $data = [];
    if (!file_exists($filePath)) return $data;
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $fields = explode("~", $line);
        if (count($fields) === 9) { 
            $data[] = [
                'FirstName' => $fields[0],
                'SecondName' => $fields[1],
                'ThirdName' => $fields[2],
                'Gender' => $fields[3],
                'Nationality' => $fields[4],
                'DOB' => $fields[5],
                'MobileNumber' => $fields[6],
                'EmailAddress' => $fields[7],
                'StartDate' => $fields[8],
            ];
        }
    }
    return $data;
}
function writeData($filePath, $data) {
    $lines = [];
    foreach ($data as $record) {
        $lines[] = implode("~", [
            $record['FirstName'],
            $record['SecondName'],
            $record['ThirdName'],
            $record['Gender'],
            $record['Nationality'],
            $record['DOB'],
            $record['MobileNumber'],
            $record['EmailAddress'],
            $record['StartDate']
        ]);
    }
    file_put_contents($filePath, implode("\n", $lines) . "\n");
}
function sanitize($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}
$volunteers = readData($filePath);
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Common fields sanitize
    $index = isset($_POST['index']) ? (int)$_POST['index'] : -1;
    $FirstName = sanitize($_POST['FirstName'] ?? '');
    $SecondName = sanitize($_POST['SecondName'] ?? '');
    $ThirdName = sanitize($_POST['ThirdName'] ?? '');
    $Gender = sanitize($_POST['Gender'] ?? '');
    $Nationality = sanitize($_POST['Nationality'] ?? '');
    $DOB = sanitize($_POST['DOB'] ?? '');
    $MobileNumber = sanitize($_POST['MobileNumber'] ?? '');
    $EmailAddress = sanitize($_POST['EmailAddress'] ?? '');
    $StartDate = sanitize($_POST['StartDate'] ?? '');

    if (isset($_POST['create'])) {
        $volunteers[] = [
            'FirstName' => $FirstName,
            'SecondName' => $SecondName,
            'ThirdName' => $ThirdName,
            'Gender' => $Gender,
            'Nationality' => $Nationality,
            'DOB' => $DOB,
            'MobileNumber' => $MobileNumber,
            'EmailAddress' => $EmailAddress,
            'StartDate' => $StartDate,
        ];
        writeData($filePath, $volunteers);
        $message = "New volunteer added successfully.";
    } elseif (isset($_POST['update'])) {
        if ($index >= 0 && isset($volunteers[$index])) {
            $volunteers[$index] = [
                'FirstName' => $FirstName,
                'SecondName' => $SecondName,
                'ThirdName' => $ThirdName,
                'Gender' => $Gender,
                'Nationality' => $Nationality,
                'DOB' => $DOB,
                'MobileNumber' => $MobileNumber,
                'EmailAddress' => $EmailAddress,
                'StartDate' => $StartDate,
            ];
            writeData($filePath, $volunteers);
            $message = "Volunteer record updated successfully.";
        } else {
            $message = "Invalid record selected for update.";
        }
    } elseif (isset($_POST['delete'])) {
        if ($index >= 0 && isset($volunteers[$index])) {
            array_splice($volunteers, $index, 1);
            writeData($filePath, $volunteers);
            $message = "Volunteer record deleted successfully.";
        } else {
            $message = "Invalid record selected for deletion.";
        }
    }
}

$editRecord = null;
if (isset($_GET['edit'])) {
    $editIndex = (int)$_GET['edit'];
    if (isset($volunteers[$editIndex])) {
        $editRecord = $volunteers[$editIndex];
        $editRecord['index'] = $editIndex;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Child Life Volunteering - Admin Backend</title>
    <link rel="stylesheet" type="text/css" href="../../CSS Sheets/BEstylesheet2.css" />
</head>
<body>
    <a href="VolunteeringBE-Homepage.php">Volunteering Backend HomePage</a><hr>
    <h2>Medical volunteers records</h2>

    <?php if ($message): ?>
        <p style="color:green;"><?php echo $message; ?></p>
    <?php endif; ?>

    <table border="1" id="Volunteeringtable" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Third Name</th>
                <th>Gender</th>
                <th>Nationality</th>
                <th>DOB</th>
                <th>Mobile Number</th>
                <th>Email Address</th>
                <th>Start Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($volunteers as $i => $v): ?>
            <tr>
                <td><?php echo $i + 1; ?></td>
                <td><?php echo htmlspecialchars($v['FirstName']); ?></td>
                <td><?php echo htmlspecialchars($v['SecondName']); ?></td>
                <td><?php echo htmlspecialchars($v['ThirdName']); ?></td>
                <td><?php echo htmlspecialchars($v['Gender']); ?></td>
                <td><?php echo htmlspecialchars($v['Nationality']); ?></td>
                <td><?php echo htmlspecialchars($v['DOB']); ?></td>
                <td><?php echo htmlspecialchars($v['MobileNumber']); ?></td>
                <td><?php echo htmlspecialchars($v['EmailAddress']); ?></td>
                <td><?php echo htmlspecialchars($v['StartDate']); ?></td>
                <td>
                    <a href="?edit=<?php echo $i; ?>">Edit</a>
                    |
                    <form action="" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                        <input type="hidden" name="index" value="<?php echo $i; ?>" />
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <hr>
    <h2><?php echo $editRecord ? "Edit the volunteer ?" : "Add a new volunteer"; ?></h2>
    <form method="post" action="">
        <input type="hidden" name="index" value="<?php echo $editRecord['index'] ?? -1; ?>">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr><td>First Name:</td><td><input type="text" name="FirstName" required value="<?php echo $editRecord['FirstName'] ?? ''; ?>"></td></tr>
            <tr><td>Second Name:</td><td><input type="text" name="SecondName" value="<?php echo $editRecord['SecondName'] ?? ''; ?>"></td></tr>
            <tr><td>Third Name:</td><td><input type="text" name="ThirdName" value="<?php echo $editRecord['ThirdName'] ?? ''; ?>"></td></tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="Gender" value="M" <?php if (($editRecord['Gender'] ?? '') === 'M') echo 'checked'; ?>> Male
                    <input type="radio" name="Gender" value="F" <?php if (($editRecord['Gender'] ?? '') === 'F') echo 'checked'; ?>> Female
                </td>
            </tr>
            <tr>
                <td>Nationality:</td>
                <td>
                    <select name="Nationality" required>
                        <?php
                        $countries = [
                            "EG" => "Egypt",
                            "GE" => "Germany",
                            "SR" => "Turkey",
                            "UAE" => "United Arab Emirates",
                            "SAR" => "Saudi Arabia",
                            "QTR" => "Qatar",
                            "ENG" => "England",
                            "FR" => "France",
                            "USA" => "United States of America",
                            "SK" => "South Korea"
                        ];
                        foreach ($countries as $code => $name) {
                            $selected = ($editRecord['Nationality'] ?? '') === $code ? 'selected' : '';
                            echo "<option value=\"$code\" $selected>$name</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr><td>DOB:</td><td><input type="date" name="DOB" value="<?php echo $editRecord['DOB'] ?? ''; ?>"></td></tr>
            <tr><td>Mobile Number:</td><td><input type="tel" name="MobileNumber" value="<?php echo $editRecord['MobileNumber'] ?? ''; ?>"></td></tr>
            <tr><td>Email Address:</td><td><input type="email" name="EmailAddress" value="<?php echo $editRecord['EmailAddress'] ?? ''; ?>"></td></tr>
            <tr><td>Start Date:</td><td><input type="date" name="StartDate" value="<?php echo $editRecord['StartDate'] ?? ''; ?>" required></td></tr>
            <tr>
                <td colspan="2" align="center">
                    <?php if ($editRecord): ?>
                        <button type="submit" name="update">Update</button>
                        <a href="MedicalVolBE.php"><button type="button">Cancel</button></a>
                    <?php else: ?>
                        <button type="submit" name="create">Create</button>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>