<?php
function readFormData() {
    $filename = "ClVol.txt";

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
    echo "<h1>Child Life Volunteering Data</h1>";

    echo "<style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
                font-family: Arial, sans-serif;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
          </style>";

    echo "<table border='1'>";
    echo "<tr>
            <th>First Name</th><th>Second Name</th><th>Third Name</th>
            <th>Gender</th><th>Nationality</th><th>DOB</th>
            <th>Mobile</th><th>Email</th><th>Understand Child Development</th>
            <th>Prepare Children for Medical Procedures</th><th>Communicate with Children</th><th>Start Date</th>
          </tr>";

    foreach ($data as $line) {
        $fields = array_map('trim', explode(" | ", $line)); 

        if (count($fields) === 12) { 
            echo "<tr>";
            foreach ($fields as $field) {
                echo "<td>" . htmlspecialchars($field) . "</td>"; 
            }
            echo "</tr>";
        }
    }

    echo "</table>";
} else {
    echo "<p>No data found.</p>";
}
?>