<?php
// Function to read data from the file
function readFormData() {
    $file = fopen("MedVol.txt", "r"); // Open file in read mode
    if ($file) {
        $data = [];
        while (!feof($file)) {
            $line = fgets($file); // Read each line
            if (!empty($line)) {
                $data[] = $line; // Add line to the data array
            }
        }
        fclose($file); // Close the file
        return $data;
    } else {
        return false;
    }
}

// Read data from the file
$data = readFormData();

if ($data) {
    echo "<h1>Medical Volunteering Data</h1>";
    echo "<table border='1'>";
    echo "<tr><th>First Name</th><th>Second Name</th><th>Third Name</th><th>Gender</th><th>Nationality</th><th>DOB</th><th>Mobile</th><th>Email</th><th>Medical Knowledge</th><th>Interpersonal Skills</th><th>Practical Skills</th><th>Start Date</th></tr>";

    // Loop through the data and display in a table
    foreach ($data as $line) {
        $fields = explode(" | ", $line); // Split the line into fields
        echo "<tr>";
        foreach ($fields as $field) {
            echo "<td>" . htmlspecialchars(trim($field)) . "</td>"; // Display each field
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}
?>