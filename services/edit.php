<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $file = $_GET['file'] ?? '';
    $idToEdit = $_GET['id'] ?? '';
    $formType = $_GET['form'] ?? '';

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Record</title>
        <link rel="stylesheet" href="servicesAdminCSS/edit.css">
    </head>
    <body>

    <?php
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);
        $recordLine = null;

        foreach ($lines as $line) {
            $fields = explode("~", $line);
            if ($fields[0] === $idToEdit) {
                $recordLine = $line;
                break;
            }
        }

        if ($recordLine) {
            $fields = explode("~", $recordLine);
            // Show form
            echo "<h1>Edit Record (ID: $idToEdit)</h1>";
            echo "<form method='post'>";
            echo "<input type='hidden' name='file' value='$file'>";
            echo "<input type='hidden' name='id' value='$idToEdit'>";
            echo "<input type='hidden' name='form' value='$formType'>";

            foreach ($fields as $index => $value) {
            echo "<label>Field $index:</label><input type='text' name='field$index' value='" . htmlspecialchars($value) . "'>";
            }
            echo "<button type='submit'>Save Changes</button>";
            echo "</form>";
        } else {
            echo "Record not found.";
        }
    } else {
        echo "File not found.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_POST['file'] ?? '';
    $id = $_POST['id'] ?? '';
    $formType = $_POST['form'] ?? '';
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);
        $updatedLines = [];

        foreach ($lines as $line) {
            $fields = explode("~", $line);
            if ($fields[0] === $id) {
                // build new line from submitted fields
                $newLineFields = [];
                for ($i = 0; isset($_POST["field$i"]); $i++) {
                    $newLineFields[] = $_POST["field$i"];
                }
                $updatedLines[] = implode("~", $newLineFields);
            } else {
                $updatedLines[] = $line;
            }
        }

        file_put_contents($file, implode(PHP_EOL, $updatedLines));
        header("Location: admin.php?form=" . urlencode($formType));
        exit;
    } else {
        echo "File not found.";
    }
}
?>
