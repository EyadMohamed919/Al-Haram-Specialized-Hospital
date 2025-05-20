<?php
session_start();
if (!isset($_SESSION["Admin"]) || $_SESSION["Admin"] == false) {
    header("location: index.php");
    exit();
}

$filePath = __DIR__ . "/MedVol.txt";

function readData($path) {
    if (!file_exists($path)) return [];
    return array_map(function($line) {
        $f = explode("~", $line);
        return count($f) === 9 ? array_combine(
            ['FirstName','SecondName','ThirdName','Gender','Nationality','DOB','MobileNumber','EmailAddress','StartDate'],
            $f) : null;
    }, array_filter(file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
}

function writeData($path, $data) {
    file_put_contents($path, implode("\n", array_map(fn($r) => implode("~", $r), $data)) . "\n");
}

function sanitize($v) {
    return htmlspecialchars(strip_tags(trim($v)));
}

$volunteers = array_values(array_filter(readData($filePath)));
$message = "";
$fields = ['FirstName','SecondName','ThirdName','Gender','Nationality','DOB','MobileNumber','EmailAddress','StartDate'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = isset($_POST['index']) ? (int)$_POST['index'] : -1;
    $new = array();
    foreach ($fields as $f) {
        $new[] = isset($_POST[$f]) ? sanitize($_POST[$f]) : '';
    }
    $assoc = array_combine($fields, $new);

    if (isset($_POST['create'])) {
        $volunteers[] = $assoc;
        $message = "New volunteer added.";
    } elseif (isset($_POST['update']) && isset($volunteers[$index])) {
        $volunteers[$index] = $assoc;
        $message = "Volunteer updated.";
    } elseif (isset($_POST['delete']) && isset($volunteers[$index])) {
        unset($volunteers[$index]);
        $message = "Volunteer deleted.";
    }
    writeData($filePath, $volunteers);
}

$editIndex = isset($_GET['edit']) ? (int)$_GET['edit'] : -1;
$edit = isset($volunteers[$editIndex]) ? $volunteers[$editIndex] : null;
if ($edit) $edit['index'] = $editIndex;

$countries = ["EG"=>"Egypt","GE"=>"Germany","SR"=>"Turkey","UAE"=>"United Arab Emirates","SAR"=>"Saudi Arabia","QTR"=>"Qatar","ENG"=>"England","FR"=>"France","USA"=>"United States","SK"=>"South Korea"];
?>

<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Admin Backend</title>
<link rel="stylesheet" href="../../CSS Sheets/BEstylesheet2.css"></head>
<body>
<a href="VolunteeringBE-Homepage.php">Volunteering Backend HomePage</a><hr>
<h2>Medical volunteers records</h2>
<?php if ($message) echo "<p style='color:green;'>$message</p>"; ?>

<table border="1" cellpadding="5" cellspacing="0"><thead><tr>
<th>#</th><th>First</th><th>Second</th><th>Third</th><th>Gender</th><th>Nationality</th><th>DOB</th><th>Mobile</th><th>Email</th><th>Start</th><th>Actions</th>
</tr></thead><tbody>
<?php foreach ($volunteers as $i => $v): ?>
<tr><td><?php echo $i+1; ?></td>
<?php foreach ($fields as $f): ?><td><?php echo htmlspecialchars($v[$f]); ?></td><?php endforeach; ?>
<td>
<a href="?edit=<?php echo $i; ?>">Edit</a> |
<form method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this record ?');">
<input type="hidden" name="index" value="<?php echo $i; ?>"><button type="submit" name="delete">Delete</button>
</form>
</td></tr>
<?php endforeach; ?>
</tbody></table>

<hr><h2><?php echo $edit ? "Edit" : "Add"; ?> a new volunteer</h2>
<form method="post"><input type="hidden" name="index" value="<?php echo isset($edit['index']) ? $edit['index'] : -1; ?>">
<table border="1" cellpadding="5" cellspacing="0" id="Volunteeringtable">
<tr><td>First Name:</td><td><input type="text" name="FirstName" required value="<?php echo isset($edit['FirstName']) ? $edit['FirstName'] : ''; ?>"></td></tr>
<tr><td>Second Name:</td><td><input type="text" name="SecondName" value="<?php echo isset($edit['SecondName']) ? $edit['SecondName'] : ''; ?>"></td></tr>
<tr><td>Third Name:</td><td><input type="text" name="ThirdName" value="<?php echo isset($edit['ThirdName']) ? $edit['ThirdName'] : ''; ?>"></td></tr>
<tr><td>Gender:</td><td>
<input type="radio" name="Gender" value="M" <?php if (isset($edit['Gender']) && $edit['Gender'] === 'M') echo 'checked'; ?>>Male
<input type="radio" name="Gender" value="F" <?php if (isset($edit['Gender']) && $edit['Gender'] === 'F') echo 'checked'; ?>>Female</td></tr>
<tr><td>Nationality:</td><td><select name="Nationality" required>
<?php foreach ($countries as $code => $name): ?>
<option value="<?php echo $code; ?>" <?php if (isset($edit['Nationality']) && $edit['Nationality'] === $code) echo 'selected'; ?>><?php echo $name; ?></option>
<?php endforeach; ?></select></td></tr>
<tr><td>DOB:</td><td><input type="date" name="DOB" value="<?php echo isset($edit['DOB']) ? $edit['DOB'] : ''; ?>"></td></tr>
<tr><td>Mobile:</td><td><input type="tel" name="MobileNumber" value="<?php echo isset($edit['MobileNumber']) ? $edit['MobileNumber'] : ''; ?>"></td></tr>
<tr><td>Email:</td><td><input type="email" name="EmailAddress" value="<?php echo isset($edit['EmailAddress']) ? $edit['EmailAddress'] : ''; ?>"></td></tr>
<tr><td>Start Date:</td><td><input type="date" name="StartDate" required value="<?php echo isset($edit['StartDate']) ? $edit['StartDate'] : ''; ?>"></td></tr>
<tr><td colspan="2" align="center">
<?php if ($edit): ?>
<button type="submit" name="update">Update</button>
<a href="MedicalVolBE.php"><button type="button">Cancel</button></a>
<?php else: ?><button type="submit" name="create">Create</button><?php endif; ?>
</td></tr></table></form>
</body></html>