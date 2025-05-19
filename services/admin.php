<?php
$formFiles = [
    "Appointments" => "appointForm.txt",
    "Dentistry" => "dentForm.txt",
    "Oncology" => "oncoForm.txt",
    "Outpatient" => "outPatForm.txt",
    "Pharmacy" => "pharmaForm.txt",
    "PrevMed" => "prevMedForm.txt",
    "Surgery" => "surgForm.txt",
    "Tests" => "testsForm.txt"
];

$formType = $_GET['form'] ?? 'Appointments';
$fileName = $formFiles[$formType] ?? 'appointForm.txt';
$filepath = "txtFiles/" . $fileName;
?>
<!DOCTYPE html>


<!-- Session Code -->

<?php
session_start();


if(isset($_SESSION["Admin"]))
    {
      if($_SESSION["Admin"] == false)
      {
        header("location: index.php");
      }
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="servicesAdminCSS/admin.css">
</head>
<body>
<h1>Admin Dashboard</h1>
<div class="tabs">
<?php foreach ($formFiles as $formName => $file): ?>
    <a href="?form=<?= urlencode($formName) ?>" class="<?= ($formType === $formName) ? 'active' : '' ?>"> <?= $formName ?> </a>
<?php endforeach; ?>
</div>

<?php if (!empty($formType)) { ?>
    <div style="margin: 10px 0;">
        <a href="add.php?form=<?= $formType ?>" style="background: #4CAF50; color: white; padding: 8px 12px; border-radius: 5px; text-decoration: none;">
            ➕ Add New <?= ucfirst($formType) ?> Record
        </a>
    </div>
<?php } ?>


<?php
$headersMap = [
    'Appointments' => ['ID','Doctor','First Name','Last Name','Sex','Phone','Email','Date','Time'],
    'Dentistry' => ['ID','First Name','Last Name','Phone','Email','Date','Time'],
    'Oncology' => ['ID','Treatment','First Name','Last Name','Sex','Phone','Email','Date','Time'],
    'Outpatient' => ['ID','Service','First Name','Last Name','Address','Phone','Email','Date','Time'],
    'Pharmacy' => ['ID','Medicine','First Name','Last Name','Address','Phone','Email'],
    'PrevMed' => ['ID','Time Slot','First Name','Last Name','Phone','NID','Email'],
    'Surgery' => ['ID','Surgery Type','First Name','Last Name','Phone','Auth ID','Email','Date','Time'],
    'Tests' => ['ID','Test','First Name','Last Name','Sex','Phone','Email','Date','Time']
];

if (file_exists($filepath)) {
    $lines = file($filepath, FILE_IGNORE_NEW_LINES);
    if (count($lines) > 0) {
        echo "<h2>$formType Records</h2>";
        echo "<table><tr>";
        $headers = $headersMap[$formType];
        foreach ($headers as $header) echo "<th>$header</th>";
        echo "<th>Actions</th></tr>";

        foreach ($lines as $line) {
            $fields = explode("~", $line);
            echo "<tr>";
            foreach ($fields as $f) echo "<td>".htmlspecialchars($f)."</td>";
            echo "<td class='actions'>
                <form method='post' action='delete.php' style='display:inline;'>
                    <input type='hidden' name='file' value='$filepath'>
                    <input type='hidden' name='id' value='{$fields[0]}'>
                    <input type='hidden' name='form' value='$formType'> 
                    <button type='submit'>Delete</button>
                </form>
                <form method='get' action='edit.php' style='display:inline;'>
                    <input type='hidden' name='file' value='$filepath'>
                    <input type='hidden' name='id' value='{$fields[0]}'>
                    <input type='hidden' name='form' value='$formType'>
                    <button type='submit'>Edit</button>
                </form>
            </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No records found for $formType.</p>";
    }
} else {
    echo "<p>No data file found for $formType at $filepath.</p>";
}
?>
</body>
</html>
