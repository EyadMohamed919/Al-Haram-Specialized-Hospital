window.onload = function() {
    alert("Welcome Administrator");
};

function validateForm() {
    let isValid = true;

    clearErrorMessages();

    if (!validateVolunteerID()) {
        isValid = false;
    }

    if (!validateVolunteerName()) {
        isValid = false;
    }

    if (!validateStartDate()) {
        isValid = false;
    }

    if (!validateVolunteerCountry()) {
        isValid = false;
    }

    return isValid;
}

function validateVolunteerID() {
    const volunteerID = document.getElementById("VolunteersID").value;
    const errorElement = document.getElementById("VolunteersIDError");

    if (!volunteerID || isNaN(volunteerID)) {
        errorElement.textContent = "Volunteer ID must be a number.";
        document.getElementById("VolunteersID").style.borderColor = "red";
        return false;
    }
    return true;
}

function validateVolunteerName() {
    const volunteerName = document.getElementById("VolunteersName").value;
    const errorElement = document.getElementById("VolunteersNameError");

    if (!volunteerName.trim()) {
        errorElement.textContent = "Volunteer Name cannot be empty.";
        document.getElementById("VolunteersName").style.borderColor = "red";
        return false;
    }
    return true;
}

function validateStartDate() {
    const startDate = document.getElementById("StartDate").value;
    const errorElement = document.getElementById("StartDateError");

    if (!startDate) {
        errorElement.textContent = "Start Date cannot be empty.";
        document.getElementById("StartDate").style.borderColor = "red";
        return false;
    }

    const today = new Date();
    const enteredDate = new Date(startDate);
    if (enteredDate > today) {
        errorElement.textContent = "Start Date cannot be in the future.";
        document.getElementById("StartDate").style.borderColor = "red";
        return false;
    }
    return true;
}

function validateVolunteerCountry() {
    const volunteerCountry = document.getElementById("VolunteersCountry").value;
    const errorElement = document.getElementById("VolunteersCountryError");

    if (!volunteerCountry.trim()) {
        errorElement.textContent = "Volunteer Country cannot be empty.";
        document.getElementById("VolunteersCountry").style.borderColor = "red";
        return false;
    }
    return true;
}

function clearErrorMessages() {
    document.getElementById("VolunteersIDError").textContent = "";
    document.getElementById("VolunteersNameError").textContent = "";
    document.getElementById("StartDateError").textContent = "";
    document.getElementById("VolunteersCountryError").textContent = "";

    document.getElementById("VolunteersID").style.borderColor = "";
    document.getElementById("VolunteersName").style.borderColor = "";
    document.getElementById("StartDate").style.borderColor = "";
    document.getElementById("VolunteersCountry").style.borderColor = "";
}

function AddNewVolunteerRecord() {
    if (validateForm()) {
        alert("Volunteer record added successfully!");
    }
}

function UpdateVolunteerRecord() {
    if (validateForm()) {
        alert("Volunteer record updated successfully!");
    }
}

function RemoveVolunteerRecord() {
    alert("Volunteer record removed successfully!");
}

function ClearForm() {
    document.getElementById("VolunteersID").value = "";
    document.getElementById("VolunteersName").value = "";
    document.getElementById("StartDate").value = "";
    document.getElementById("VolunteersCountry").value = "";

    clearErrorMessages();
}