<?php
$file = "ClVol.txt"; 

function readData($file) {
    if (!file_exists($file)) {
        die("Error: ClVol.txt not found!"); 
    }

    $content = trim(file_get_contents($file));
    if (empty($content)) return [];

    $entries = array_filter(explode("-------------------------", $content));
    $data = [];

    foreach ($entries as $entry) {
        $lines = array_filter(explode("\n", trim($entry)));
        $record = [];

        foreach ($lines as $line) {
            if (str_contains($line, ": ")) {
                list($key, $value) = explode(": ", $line, 2);
                $record[$key] = trim($value);
            }
        }

        if (!empty($record)) {
            $data[] = $record;
        }
    }
    return $data;
}

function writeData($file, $data) {
    $content = "";

    foreach ($data as $record) {
        if (!empty(array_filter($record))) {
            foreach ($record as $key => $value) {
                $content .= "$key: $value\n";
            }
            $content .= "-------------------------\n";
        }
    }

    file_put_contents($file, trim($content)); 
}

if (isset($_POST['update'])) {
    $index = $_POST['row_id']; 
    $data = readData($file);

    if (isset($data[$index])) {
        $data[$index] = [
            "First Name" => $_POST["first_name"],
            "Second Name" => $_POST["second_name"],
            "Third Name" => $_POST["third_name"],
            "Gender" => $_POST["gender"],
            "Nationality" => $_POST["nationality"],
            "DOB" => $_POST["dob"],
            "Mobile Number" => $_POST["mobile"],
            "Email Address" => $_POST["email"],
            "Start Date" => $_POST["start_date"]
        ];
        writeData($file, $data);
    }
    header("Location: ChildLifeVolBE.php"); 
    exit();
}

if (isset($_POST['delete'])) {
    $index = $_POST['row_id']; 
    $data = readData($file);

    if (isset($data[$index])) {
        array_splice($data, $index, 1); 
        writeData($file, $data);
    }
    header("Location: ChildLifeVolBE.php"); 
    exit();
}

$data = readData($file); 
?>
<!DOCTYPE html>
<?php
session_start();


if (!isset($_SESSION["user_email"]) || !isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] !== true) {
    header("Location: ../index.php"); // Redirect non-admins
    exit();
}
?>
<html>
<head>
    <title>Child Life Volunteering Admin Page</title>
    <link rel="stylesheet" type="text/css" href="../../CSS Sheets/BEstylesheet2.css">
    <script src="VolunteeringBE.js" defer></script>
</head>
<body>
    <a href="VolunteeringBE-Homepage.php">VolunteeringBE-HomePage</a><hr>
    <p>Child Life Volunteers</p>
    <script>
        let selectedRow = null;
        let selectedId = null;

        function selectRow(row, id) {
            if (selectedRow) selectedRow.classList.remove("selected");
            selectedRow = row;
            selectedRow.classList.add("selected");
            selectedId = id;

            document.getElementById("row_id").value = id;
            document.getElementById("first_name").value = row.cells[1].innerText;
            document.getElementById("second_name").value = row.cells[2].innerText;
            document.getElementById("third_name").value = row.cells[3].innerText;
            document.getElementById("gender").value = row.cells[4].innerText;
            document.getElementById("nationality").value = row.cells[5].innerText;
            document.getElementById("dob").value = row.cells[6].innerText;
            document.getElementById("mobile").value = row.cells[7].innerText;
            document.getElementById("email").value = row.cells[8].innerText;
            document.getElementById("start_date").value = row.cells[9].innerText;
        }
    </script>
</head>
<body>
<style>
    table {
        width: 80%; 
        margin: 20px auto; 
        border-collapse: collapse; 
        text-align: center;
    }

    th, td {
        border: 2px solid black; 
        padding: 10px;
    }

    th {
        background-color:rgb(165, 195, 209); 
    }
</style>

<table>
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Second Name</th>
        <th>Third Name</th>
        <th>Gender</th>
        <th>Nationality</th>
        <th>DOB</th>
        <th>Mobile Number</th>
        <th>Email Address</th>
        <th>Start Date</th>
    </tr>
    <?php foreach ($data as $index => $record): ?>
    <tr onclick="selectRow(this, <?= $index ?>)">
        <td><?= $index + 1 ?></td>
        <td><?= $record["First Name"] ?? "" ?></td>
        <td><?= $record["Second Name"] ?? "" ?></td>
        <td><?= $record["Third Name"] ?? "" ?></td>
        <td><?= $record["Gender"] ?? "" ?></td>
        <td><?= $record["Nationality"] ?? "" ?></td>
        <td><?= $record["DOB"] ?? "" ?></td>
        <td><?= $record["Mobile Number"] ?? "" ?></td>
        <td><?= $record["Email Address"] ?? "" ?></td>
        <td><?= $record["Start Date"] ?? "" ?></td>
    </tr>
    <?php endforeach; ?>
</table>

    <h2 style="text-align: center;">Update or Delete Volunteer Details</h2>
    <form method="POST">
        <input type="hidden" name="row_id" id="row_id">
        
        <label>First Name:</label>
        <input type="text" name="first_name" id="first_name" placeholder="First Name" required>
        
        <label>Second Name:</label>
        <input type="text" name="second_name" id="second_name" placeholder="Second Name" required>
        
        <label>Third Name:</label>
        <input type="text" name="third_name" id="third_name" placeholder="Third Name" required>
        
        <label>Gender:</label>
        <input type="text" name="gender" id="gender" placeholder="Gender" required>
        
        <label>Nationality:</label>
        <input type="text" name="nationality" id="nationality" placeholder="Nationality" required>
        
        <label>Date of Birth:</label>
        <input type="date" name="dob" id="dob" required>
        
        <label>Mobile Number:</label>
        <input type="text" name="mobile" id="mobile" placeholder="Mobile Number" required>
        
        <label>Email Address:</label>
        <input type="email" name="email" id="email" placeholder="Email Address" required>
        
        <label>Start Date:</label>
        <input type="date" name="start_date" id="start_date" required>
        
        <button type="submit" name="update">Update</button>
        <button type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
    </form>
</body>
</html>