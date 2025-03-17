<?php
function readFormData() {
    $filename = "MedVol.txt";

    if (!file_exists($filename)) {
        return false; 
    }

    $file = fopen($filename, "r"); 
    $data = [];

    if ($file) {
        while (($line = fgets($file)) !== false) { 
            $line = trim($line); 
            if (!empty($line)) {
                $data[] = $line;
            }
        }
        fclose($file); 
    }

    return $data;
}
$data = readFormData();

if ($data) {
    echo "<h1>Medical Volunteering Data</h1>";
    echo "<table border='1'>";
    echo "<tr>
            <th>First Name</th><th>Second Name</th><th>Third Name</th>
            <th>Gender</th><th>Nationality</th><th>DOB</th>
            <th>Mobile</th><th>Email</th><th>Medical Knowledge</th>
            <th>Interpersonal Skills</th><th>Practical Skills</th><th>Start Date</th>
          </tr>";

    foreach ($data as $line) {
        $fields = array_map('trim', explode(" | ", $line)); 

        if (count($fields) === 12) {
            echo "<tr>";
            foreach ($fields as $field) {
                echo "<td>" . htmlspecialchars($field) . "</td>"; 
            echo "</tr>";
        }
    }

    echo "</table>";
} 
else 
{
    echo "<p>No data found.</p>";
}
?>