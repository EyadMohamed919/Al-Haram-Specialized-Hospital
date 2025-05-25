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
    'Appointments' => ['ID','Doctor','First Name','Last Name','Sex','Phone','Email','Date','Time', 'Submission-Day', 'Submission-Time'],
    'Dentistry' => ['ID','First Name','Last Name','Phone','Email','Date','Time', 'Submission-Day', 'Submission-Time'],
    'Oncology' => ['ID','Treatment','First Name','Last Name','Sex','Phone','Email','Date','Time', 'Submission-Day', 'Submission-Time'],
    'Outpatient' => ['ID','Service','First Name','Last Name','Address','Phone','Email','Date','Time', 'Submission-Day', 'Submission-Time'],
    'Pharmacy' => ['ID','Medicine','First Name','Last Name','Address','Phone','Email', 'Submission-Day', 'Submission-Time'],
    'PrevMed' => ['ID','Time Slot','First Name','Last Name','Phone','NID','Email', 'Submission-Day', 'Submission-Time'],
    'Surgery' => ['ID','Surgery Type','First Name','Last Name','Phone','Auth ID','Email','Date','Time', 'Submission-Day', 'Submission-Time'],
    'Tests' => ['ID','Test','First Name','Last Name','Sex','Phone','Email','Date','Time', 'Submission-Day', 'Submission-Time']
];

$formType = $_GET['form']; 
if (empty($formType) || !isset($formFiles[$formType])) {
    die("Invalid form type.");
}

$filePath = __DIR__ . "/txtFiles/" . $formFiles[$formType];

include_once(__DIR__ . '/../encrypt.php');
    $key1 = 123;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [];
    foreach ($headersMap[$formType] as $index => $field) {
        $key = str_replace([' ', '-'], '_', strtolower($field));
        if ($field === 'Submission-Day') {
            $data[] = encrypt(date("Y-m-d"), $key1);
        } elseif ($field === 'Submission-Time') {
            $data[] = encrypt(date("H:i:s"), $key1);
        } elseif ($index === 0) {
            $data[] = $_POST[$key];
        } else {
            $data[] = encrypt($_POST[$key], $key1);
        }
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
    <title>Add New <?= htmlspecialchars($formType) ?> Record</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        input { margin-bottom: 10px; padding: 5px; width: 300px; }
        label { display: block; margin-top: 10px; }
        button { margin-top: 15px; padding: 8px 12px; }
    </style>
</head>
<body>
<h2>Add New <?= htmlspecialchars($formType) ?> Record</h2>
<form method="post">
    <?php foreach ($headersMap[$formType] as $field): 
        $key = str_replace([' ', '-'], '_', strtolower($field)); ?>
        <label><?= htmlspecialchars($field) ?>:</label>
        <input type="text" name="<?= $key ?>" required>
    <?php endforeach; ?>
    <br>
    <button type="submit">Save Record</button>
</form>
<div style="margin-top:20px;">
    <a href="admin.php?form=<?= urlencode($formType) ?>" style="text-decoration:none; background:#2196F3; color:white; padding: 6px 10px; border-radius: 4px;">⬅ Back to <?= htmlspecialchars($formType) ?> Records</a>
</div>
</body>
</html>
