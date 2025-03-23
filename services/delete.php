<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_POST['file'] ?? '';
    $idToDelete = $_POST['id'] ?? '';
    $formType = $_POST['form'] ?? '';  

    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES);
        $newLines = [];

        foreach ($lines as $line) {
            $fields = explode("~", $line);
            if ($fields[0] !== $idToDelete) {
                $newLines[] = $line;
            }
        }

        file_put_contents($file, implode(PHP_EOL, $newLines));
        
        header("Location: admin.php?form=" . urlencode($formType));
        exit;
    } else {
        echo "File not found.";
    }
} else {
    echo "Invalid request.";
}
?>
