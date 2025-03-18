window.onload = function() {
    alert("Welcome Administrator");
};

function AddNewdonationRecord() {
    const id = document.getElementById("DonationID").value;
    const name = document.getElementById("DonatorsName").value;
    const amount = document.getElementById("DonationAmount").value;
    const date = document.getElementById("DonationDate").value;
    const country = document.getElementById("DonationCountry").value;

    if (validateForm(id, name, amount, date, country)) {
        const table = document.getElementById("Donationtable");
        const row = table.insertRow(-1);

        row.insertCell(0).innerText = id;
        row.insertCell(1).innerText = name;
        row.insertCell(2).innerText = amount;
        row.insertCell(3).innerText = date;
        row.insertCell(4).innerText = country;

        alert("Record added successfully!");
        ClearForm();
    }
}

function UpdateDonationRecord() {
    const id = document.getElementById("DonationID").value;
    const name = document.getElementById("DonatorsName").value;
    const amount = document.getElementById("DonationAmount").value;
    const date = document.getElementById("DonationDate").value;
    const country = document.getElementById("DonationCountry").value;

    if (!validateForm(id, name, amount, date, country)) return;

    const table = document.getElementById("Donationtable");
    let found = false;

    for (let i = 1; i < table.rows.length; i++) {
        if (table.rows[i].cells[0].innerText === id) {
            table.rows[i].cells[1].innerText = name;
            table.rows[i].cells[2].innerText = amount;
            table.rows[i].cells[3].innerText = date;
            table.rows[i].cells[4].innerText = country;
            found = true;
            alert("Record updated successfully!");
            break;
        }
    }

    if (!found) {
        alert("No record found with the provided ID.");
    }
}

function RemoveDonationRecord() {
    const id = document.getElementById("DonationID").value;

    if (!id) {
        alert("Please provide a Donation ID to remove a record.");
        return;
    }

    const table = document.getElementById("Donationtable");
    let found = false;

    for (let i = 1; i < table.rows.length; i++) {
        if (table.rows[i].cells[0].innerText === id) {
            table.deleteRow(i);
            found = true;
            alert("Record removed successfully!");
            break;
        }
    }

    if (!found) {
        alert("No record found with the provided ID.");
    }
}

function ClearForm() {
    document.getElementById("DonationID").value = "";
    document.getElementById("DonatorsName").value = "";
    document.getElementById("DonationAmount").value = "";
    document.getElementById("DonationDate").value = "";
    document.getElementById("DonationCountry").value = "";
}

function validateForm(id, name, amount, date, country) {
    let isValid = true;

    if (!id.match(/^\d+$/)) {
        alert("Invalid ID. Must be a numeric value.");
        isValid = false;
    }

    if (!name.match(/^[a-zA-Z\s]+$/)) {
        alert("Invalid name. Only letters and spaces are allowed.");
        isValid = false;
    }

    if (!amount.match(/^[\$\€]\d+$/)) {
        alert("Invalid amount. Must start with $ or € followed by a number.");
        isValid = false;
    }

    if (!date || new Date(date) > new Date()) {
        alert("Invalid date. Date cannot be in the future.");
        isValid = false;
    }

    if (!country.match(/^[a-zA-Z\s]+$/)) {
        alert("Invalid nationality. Only letters and spaces are allowed.");
        isValid = false;
    }

    return isValid;
}
