<html>
<head>
    <title>Backend Medical Volunteering</title>
    <link rel="stylesheet" type="text/css" href="../../CSS Sheets/BEstylesheet2.css">
    <script src="VolunteeringBE.js" type="text/javascript"></script>
</head>
<body>
    <a href="VolunteeringBE-Homepage.html">VolunteeringBE-HomePage</a><hr>
    <p>Volunteers</p>
    <table border="1" id="VolunteersTable">
        <tr>
            <th>Volunteering ID</th>
            <th>Volunteer's Name</th>
            <th>Start Date</th>
            <th>Country</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Zayed el gahtany</td>
            <td>2024-12-18</td>
            <td>UAE</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Lukas Brotmacher</td>
            <td>2024-11-15</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Amelie roug</td>
            <td>2024-10-04</td>
            <td>France</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Amanda Seyfried</td>
            <td>2024-08-08</td>
            <td>USA</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kim ji won</td>
            <td>2024-09-24</td>
            <td>South Korea</td>
        </tr>
    </table>

    <p>Control Volunteers</p>

    <div>
        <form method="get" action="backend-submitted.html">

            <b><label for="VolunteersID">ID:</label></b><br>
            <input type="text" id="VolunteersID" name="VolunteersID" required><br>
            <p id="VolunteersIDError" style="color:red;"></p><br>

            <b><label for="VolunteersName">Name:</label></b><br>
            <input type="text" id="VolunteersName" name="VolunteersName" required><br>
            <p id="VolunteersNameError" style="color:red;"></p><br>

            <b><label for="StartDate">Date:</label></b><br>
            <input type="date" id="StartDate" name="StartDate" required><br>
            <p id="StartDateError" style="color:red;"></p><br>

            <b><label for="VolunteersCountry">Country:</label></b><br>
            <input type="text" id="VolunteersCountry" name="VolunteersCountry" required><br>
            <p id="VolunteersCountryError" style="color:red;"></p><br>

            <button type="button" onclick="AddNewVolunteerRecord();">Add Record</button><br><br>
            <button type="button" onclick="UpdateVolunteerRecord();">Update Record</button><br><br>
            <button type="button" onclick="RemoveVolunteerRecord();">Remove Record</button><br><br>
            <button type="button" onclick="ClearForm();">Clear Form</button><br><br>

        </form>
    </div>
</body>
</html>
