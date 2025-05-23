<?php
session_start();
if (!isset($_SESSION["Admin"]) || !$_SESSION["Admin"]) {
    header("Location: index.php");
    exit();
}

include_once(__DIR__ . '/../encrypt.php');
$key = 0; 

$filePath = __DIR__ . "/CLVol.txt";

$volunteers = file_exists($filePath) ? array_filter(array_map(function($line) use ($key) {
    $fields = explode("~", $line);
    if (count($fields) != 9) return null;

    return [
        'FirstName' => Decrypt($fields[0], $key),
        'SecondName' => Decrypt($fields[1], $key),
        'ThirdName' => Decrypt($fields[2], $key),
        'Gender' => Decrypt($fields[3], $key),
        'Nationality' => Decrypt($fields[4], $key),
        'DOB' => Decrypt($fields[5], $key),
        'MobileNumber' => Decrypt($fields[6], $key),
        'EmailAddress' => Decrypt($fields[7], $key),
        'StartDate' => Decrypt($fields[8], $key)
    ];
}, file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES))) : [];

// Handle form submission
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

    // Encrypt and save
    file_put_contents($filePath, implode("\n", array_map(function($v) use ($key) {
        return implode("~", [
            Encrypt($v['FirstName'], $key),
            Encrypt($v['SecondName'], $key),
            Encrypt($v['ThirdName'], $key),
            Encrypt($v['Gender'], $key),
            Encrypt($v['Nationality'], $key),
            Encrypt($v['DOB'], $key),
            Encrypt($v['MobileNumber'], $key),
            Encrypt($v['EmailAddress'], $key),
            Encrypt($v['StartDate'], $key)
        ]);
    }, $volunteers)));

    header("Location: ChildLifeVolBE.php");
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
<h2>Office volunteers records</h2>
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
<?php if ($edit) { ?> <a href="ChildLifeVolBE.php"><button type="button">Cancel</button></a><?php } ?>
</td></tr></table></form>
</body></html>