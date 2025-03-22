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

$formType = $_GET['form'] ?? 'Appointments';
$fileName = $formFiles[$formType] ?? 'appointForm.txt';
$filePath = "../txtFiles/" . $fileName;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [];
    foreach ($headersMap[$formType] as $field) {
        $fieldKey = str_replace(' ', '_', strtolower($field));
        $data[] = $_POST[$fieldKey] ?? '';
    }
    
    $line = implode("~", $data) . "\n";
    file_put_contents($filePath, $line, FILE_APPEND);
    header("Location: admin.php?form=" . urlencode($formType));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New <?= htmlspecialchars($formType) ?> Record</title>
    <link rel="stylesheet" href="servicesAdminCSS/admin.css">
</head>
<body>
<h1>Add New <?= htmlspecialchars($formType) ?> Record</h1>

<form method="post">
    <?php foreach ($headersMap[$formType] as $field): 
        $fieldKey = str_replace(' ', '_', strtolower($field)); ?>
        <label><?= htmlspecialchars($field) ?>:</label>
        <input type="text" name="<?= $fieldKey ?>" required><br>
    <?php endforeach; ?>
    <button type="submit">Save Record</button>
</form>

<div style="margin-top: 20px;">
    <a href="admin.php?form=<?= urlencode($formType) ?>" style="background: #2196F3; color: white; padding: 8px 12px; border-radius: 5px; text-decoration: none;">⬅ Back to <?= htmlspecialchars($formType) ?> Records</a>
</div>

</body>
</html>