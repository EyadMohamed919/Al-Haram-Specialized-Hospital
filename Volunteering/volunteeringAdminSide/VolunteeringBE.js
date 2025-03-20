window.onload = function() {
    alert("Welcome Administrator");
};

document.addEventListener("DOMContentLoaded", function () {
    loadVolunteers();
});

function loadVolunteers() {
    fetch("ClVol.txt")
        .then(response => response.text())
        .then(data => {
            const lines = data.split("\n").filter(line => line.trim() !== "");
            const table = document.getElementById("VolunteersTable");

            let volunteerData = {};
            lines.forEach(line => {
                const [key, value] = line.split(": ");
                volunteerData[key] = value;

                if (key === "Start Date") {
                    let row = table.insertRow();
                    row.innerHTML = `
                        <td>${volunteerData["First Name"]}</td>
                        <td>${volunteerData["Second Name"]}</td>
                        <td>${volunteerData["Third Name"]}</td>
                        <td>${volunteerData["Gender"]}</td>
                        <td>${volunteerData["Nationality"]}</td>
                        <td>${volunteerData["DOB"]}</td>
                        <td>${volunteerData["Mobile Number"]}</td>
                        <td>${volunteerData["Email Address"]}</td>
                        <td>${volunteerData["Start Date"]}</td>
                    `;
                    volunteerData = {};
                }
            });
        });
}

function createVolunteer() {
    let formData = getFormData();
    updateFile("create", formData);
}

function readVolunteers() {
    location.reload();
}

function updateVolunteer() {
    let formData = getFormData();
    updateFile("update", formData);
}

function deleteVolunteer() {
    let formData = getFormData();
    updateFile("delete", formData);
}

function getFormData() {
    return {
        "First Name": document.getElementById("FirstName").value,
        "Second Name": document.getElementById("SecondName").value,
        "Third Name": document.getElementById("ThirdName").value,
        "Gender": document.getElementById("Gender").value,
        "Nationality": document.getElementById("Country").value,
        "DOB": document.getElementById("DOB").value,
        "Mobile Number": document.getElementById("MobileNumber").value,
        "Email Address": document.getElementById("EmailAddress").value,
        "Start Date": document.getElementById("StartDate").value
    };
}

function updateFile(action, data) {
    fetch("updateVolunteers.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ action, data })
    }).then(() => location.reload());
}