<?php
$filename = "ClVol.txt";
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $action = $data["action"];
    $newData = $data["data"];

    $fileContent = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $entries = [];

    foreach ($fileContent as $line) {
        list($key, $value) = explode(": ", $line, 2);
        $entries[$key] = $value;
    }

    if ($action === "create") {
        file_put_contents($filename, "\n" . implode("\n", array_map(fn($k, $v) => "$k: $v", array_keys($newData), $newData)), FILE_APPEND);
    } elseif ($action === "delete") {
        file_put_contents($filename, "");
    }

    echo "Success";
}
?>