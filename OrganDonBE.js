window.onload = function() {
    alert("Welcome Administrator");
};

function AddNewdonationRecord() {
    if (validateForm()) {
        alert("New organ donation record added successfully.");
    }
}

function UpdateDonationRecord() {
    if (validateForm()) {
        alert("Organ donation record updated successfully.");
    }
}

function RemoveDonationRecord() {
    const donationID = document.getElementById("DonationID").value;
    if (donationID) {
        alert(`Organ donation record with ID ${donationID} removed successfully.`);
    } else {
        displayError("DonationID", "Please provide a valid Donation ID to remove.");
    }
}

function ClearForm() {
    document.getElementById("DonationID").value = "";
    document.getElementById("DonatorsName").value = "";
    document.getElementById("Organ").value = "";
    document.getElementById("DonationDate").value = "";
    document.getElementById("DonationCountry").value = "";

    clearErrors();
}

function validateForm() {
    clearErrors(); 
    let isValid = true;

    const donationID = document.getElementById("DonationID").value;
    if (!/^\d+$/.test(donationID)) {
        displayError("DonationID", "Donation ID must be a positive integer.");
        isValid = false;
    }

    const donatorsName = document.getElementById("DonatorsName").value;
    if (donatorsName.length < 2) {
        displayError("DonatorsName", "Name must be at least 2 characters long.");
        isValid = false;
    }

    const organ = document.getElementById("Organ").value;
    if (organ.trim() === "") {
        displayError("Organ", "Organ Type must not be empty.");
        isValid = false;
    }

    const donationDate = document.getElementById("DonationDate").value;
    const today = new Date().toISOString().split("T")[0];
    if (donationDate === "" || donationDate > today) {
        displayError("DonationDate", "Date must not be in the future.");
        isValid = false;
    }

    const donationCountry = document.getElementById("DonationCountry").value;
    if (donationCountry.trim() === "") {
        displayError("DonationCountry", "Country must not be empty.");
        isValid = false;
    }

    return isValid;
}

function displayError(fieldID, errorMessage) {
    const field = document.getElementById(fieldID);
    field.style.border = "2px solid red"; 

    const errorField = document.createElement("p");
    errorField.className = "error-message";
    errorField.style.color = "red";
    errorField.style.fontSize = "0.9em";
    errorField.innerText = errorMessage;

    field.insertAdjacentElement("afterend", errorField);
}

function clearErrors() {
    const errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach((error) => error.remove());

    const inputs = document.querySelectorAll("input");
    inputs.forEach((input) => {
        input.style.border = ""; 
    });
}
