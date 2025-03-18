window.onload = function() {
    alert("Welcome Administrator");
};

function AddNewdonationRecord() {
    if (validateForm()) {
        alert("New donation record added successfully.");
    }
}

function UpdateDonationRecord() {
    if (validateForm()) {
        alert("Donation record updated successfully.");
    }
}

function RemoveDonationRecord() {
    const donationID = document.getElementById("DonationID").value;
    if (donationID) {
        alert(`Donation record with ID ${donationID} removed successfully.`);
    } else {
        displayError("DonationID", "Please provide a valid Donation ID to remove.");
    }
}

function ClearForm() {
    document.getElementById("DonationID").value = "";
    document.getElementById("DonatorsName").value = "";
    document.getElementById("BloodType").value = "";
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

    const bloodType = document.getElementById("BloodType").value.toUpperCase();
    if (!["A", "B", "AB", "O"].includes(bloodType)) {
        displayError("BloodType", "Blood Type must be A, B, AB, or O.");
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
