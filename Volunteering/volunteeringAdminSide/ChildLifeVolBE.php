<?php
$filename = "ClVol.txt";
$volunteers = [];

if (file_exists($filename)) {
    $fileContent = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $volunteerData = [];

    foreach ($fileContent as $line) {
        list($key, $value) = explode(": ", $line, 2);
        $volunteerData[$key] = $value;

        if ($key === "Start Date") {
            $volunteers[] = $volunteerData;
            $volunteerData = [];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Backend Child Life Volunteering</title>
    <link rel="stylesheet" type="text/css" href="../../CSS Sheets/BEstylesheet2.css">
    <script src="VolunteeringBE.js" defer></script>
</head>
<body>
    <a href="VolunteeringBE-Homepage.html">VolunteeringBE-HomePage</a><hr>
    <p>Child Life Volunteers</p>

    <table border="1" id="VolunteersTable">
        <tr>
            <th>First Name</th>
            <th>Second Name</th>
            <th>Third Name</th>
            <th>Gender</th>
            <th>Country</th>
            <th>DOB</th>
            <th>Mobile Number</th>
            <th>Email Address</th>
            <th>Start Date</th>
        </tr>
        <?php foreach ($volunteers as $volunteer): ?>
        <tr>
            <td><?= htmlspecialchars($volunteer["First Name"]) ?></td>
            <td><?= htmlspecialchars($volunteer["Second Name"]) ?></td>
            <td><?= htmlspecialchars($volunteer["Third Name"]) ?></td>
            <td><?= htmlspecialchars($volunteer["Gender"]) ?></td>
            <td><?= htmlspecialchars($volunteer["Nationality"]) ?></td>
            <td><?= htmlspecialchars($volunteer["DOB"]) ?></td>
            <td><?= htmlspecialchars($volunteer["Mobile Number"]) ?></td>
            <td><?= htmlspecialchars($volunteer["Email Address"]) ?></td>
            <td><?= htmlspecialchars($volunteer["Start Date"]) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p>Control the Volunteers</p>
    <div>
        <form id="volunteerForm">
            <b><label for="FirstName">First Name:</label></b><br>
            <input type="text" id="FirstName" required><br><br>

            <b><label for="SecondName">Second Name:</label></b><br>
            <input type="text" id="SecondName" required><br><br>

            <b><label for="ThirdName">Third Name:</label></b><br>
            <input type="text" id="ThirdName"><br><br>

            <b><label for="Gender">Gender:</label></b><br>
            <input type="text" id="Gender" required><br><br>

            <b><label for="Country">Country:</label></b><br>
            <input type="text" id="Country" required><br><br>

            <b><label for="DOB">Date of Birth:</label></b><br>
            <input type="date" id="DOB" required><br><br>

            <b><label for="MobileNumber">Mobile Number:</label></b><br>
            <input type="text" id="MobileNumber" required><br><br>

            <b><label for="EmailAddress">Email Address:</label></b><br>
            <input type="email" id="EmailAddress" required><br><br>

            <b><label for="StartDate">Start Date:</label></b><br>
            <input type="date" id="StartDate" required><br><br>

            <button type="button" onclick="createVolunteer();">Create</button>
            <button type="button" onclick="readVolunteers();">Read</button>
            <button type="button" onclick="updateVolunteer();">Update</button>
            <button type="button" onclick="deleteVolunteer();">Delete</button>
        </form>
    </div>
</body>
</html>