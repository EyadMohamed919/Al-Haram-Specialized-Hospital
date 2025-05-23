<?php
session_start();
if (!isset($_SESSION["Admin"]) || !$_SESSION["Admin"]) {
    header("Location: index.php");
    exit();
}

$filePath = __DIR__ . "/MedVol.txt";
$volunteers = file_exists($filePath) ? array_filter(array_map(function($line) {
    $fields = explode("~", $line);
    return count($fields) == 9 ? [
        'FirstName' => $fields[0], 'SecondName' => $fields[1], 'ThirdName' => $fields[2],
        'Gender' => $fields[3], 'Nationality' => $fields[4], 'DOB' => $fields[5],
        'MobileNumber' => $fields[6], 'EmailAddress' => $fields[7], 'StartDate' => $fields[8]
    ] : null;
}, file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES))) : [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $index = isset($_POST['index']) ? (int)$_POST['index'] : -1;
    $new = [
        $_POST['FirstName'], $_POST['SecondName'], $_POST['ThirdName'],
        $_POST['Gender'], $_POST['Nationality'], $_POST['DOB'],
        $_POST['MobileNumber'], $_POST['EmailAddress'], $_POST['StartDate']
    ];

    if (isset($_POST['create'])) {
        $volunteers[] = array_combine(['FirstName','SecondName','ThirdName','Gender','Nationality','DOB','MobileNumber','EmailAddress','StartDate'], $new);
        $_SESSION['message'] = "New volunteer added.";
    } elseif (isset($_POST['update']) && isset($volunteers[$index])) {
        $volunteers[$index] = array_combine(['FirstName','SecondName','ThirdName','Gender','Nationality','DOB','MobileNumber','EmailAddress','StartDate'], $new);
        $_SESSION['message'] = "Volunteer updated.";
    } elseif (isset($_POST['delete']) && isset($volunteers[$index])) {
        array_splice($volunteers, $index, 1);
        $_SESSION['message'] = "Volunteer deleted.";
    }

    file_put_contents($filePath, implode("\n", array_map(function($v) { return implode("~", $v); }, $volunteers)));
    header("Location: MedicalVolBE.php");
    exit();
}

$editIndex = isset($_GET['edit']) ? (int)$_GET['edit'] : -1;
$edit = ($editIndex >= 0 && isset($volunteers[$editIndex])) ? $volunteers[$editIndex] : null;
$countries = ["EG"=>"Egypt","GE"=>"Germany","SR"=>"Turkey","UAE"=>"United Arab Emirates","SAR"=>"Saudi Arabia","QTR"=>"Qatar","ENG"=>"England","FR"=>"France","USA"=>"United States","SK"=>"South Korea"];
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Admin Backend</title>
<link rel="stylesheet" href="../../CSS Sheets/BEstylesheet2.css"></head>
<body>
<a href="VolunteeringBE-Homepage.php">Volunteering Backend HomePage</a><hr>
<h2>Medical volunteers records</h2>
<?php if (isset($_SESSION['message'])) { echo "<p style='color:green'>".$_SESSION['message']."</p>"; unset($_SESSION['message']); } ?>

<table border="1"><thead><tr>
<th>#</th><th>First</th><th>Second</th><th>Third</th><th>Gender</th><th>Nationality</th><th>DOB</th><th>Mobile</th><th>Email</th><th>Start</th><th>Actions</th>
</tr></thead><tbody>
<?php foreach ($volunteers as $i => $v) { ?>
<tr><td><?= $i+1 ?></td>
<?php foreach (['FirstName','SecondName','ThirdName','Gender','Nationality','DOB','MobileNumber','EmailAddress','StartDate'] as $f) { ?>
<td><?= htmlspecialchars($v[$f]) ?></td><?php } ?>
<td>
<a href="?edit=<?= $i ?>">Edit</a> |
<form method="post" style="display:inline"><input type="hidden" name="index" value="<?= $i ?>">
<button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this row ?')">Delete</button></form>
</td></tr><?php } ?>
</tbody></table>

<hr><h2><?= $edit ? "Edit" : "Add" ?> a volunteer</h2>
<form method="post"><input type="hidden" name="index" value="<?= $edit ? $editIndex : -1 ?>">
<table border="1" id="Volunteeringtable">
<tr><td>First Name:</td><td><input type="text" name="FirstName" required value="<?= $edit ? $edit['FirstName'] : '' ?>"></td></tr>
<tr><td>Second Name:</td><td><input type="text" name="SecondName" value="<?= $edit ? $edit['SecondName'] : '' ?>"></td></tr>
<tr><td>Third Name:</td><td><input type="text" name="ThirdName" value="<?= $edit ? $edit['ThirdName'] : '' ?>"></td></tr>
<tr><td>Gender:</td><td>
<input type="radio" name="Gender" value="M" <?= $edit && $edit['Gender']=='M' ? 'checked' : '' ?>>Male
<input type="radio" name="Gender" value="F" <?= $edit && $edit['Gender']=='F' ? 'checked' : '' ?>>Female</td></tr>
<tr><td>Nationality:</td><td><select name="Nationality" required>
<?php foreach ($countries as $code => $name) { ?>
<option value="<?= $code ?>" <?= $edit && $edit['Nationality']==$code ? 'selected' : '' ?>><?= $name ?></option>
<?php } ?></select></td></tr>
<tr><td>DOB:</td><td><input type="date" name="DOB" value="<?= $edit ? $edit['DOB'] : '' ?>"></td></tr>
<tr><td>Mobile:</td><td><input type="tel" name="MobileNumber" value="<?= $edit ? $edit['MobileNumber'] : '' ?>"></td></tr>
<tr><td>Email:</td><td><input type="email" name="EmailAddress" value="<?= $edit ? $edit['EmailAddress'] : '' ?>"></td></tr>
<tr><td>Start Date:</td><td><input type="date" name="StartDate" required value="<?= $edit ? $edit['StartDate'] : '' ?>"></td></tr>
<tr><td colspan="2"><button type="submit" name="<?= $edit ? 'update' : 'create' ?>"><?= $edit ? 'Update' : 'Create' ?></button>
<?php if ($edit) { ?> <a href="MedicalVolBE.php"><button type="button">Cancel</button></a><?php } ?>
</td></tr></table></form>
</body></html>