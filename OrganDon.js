window.onload = function() {
    alert("Welcome to Organ Donations page");
};

function validateFirstName() {
    const firstName = document.getElementById("FirstName");
    const cell = firstName.parentElement;
    const errorMessage = "First Name must contain only letters and cannot be empty.";
    if (!/^[A-Za-z]+$/.test(firstName.value)) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateSecondName() {
    const secondName = document.getElementById("SecondName");
    const cell = secondName.parentElement;
    const errorMessage = "Second Name must contain only letters and cannot be empty.";
    if (!/^[A-Za-z]+$/.test(secondName.value)) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateThirdName() {
    const thirdName = document.getElementById("ThirdName");
    const cell = thirdName.parentElement;
    const errorMessage = "Third Name must contain only letters and cannot be empty.";
    if (!/^[A-Za-z]+$/.test(thirdName.value)) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateGender() {
    const gender = document.querySelector('input[name="Gender"]:checked');
    const cell = document.querySelector('input[name="Gender"]').parentElement;
    const errorMessage = "Please select a gender.";
    if (!gender) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateDOB() {
    const dob = document.getElementById("DOB");
    const cell = dob.parentElement;
    const errorMessage = "You must be at least 18 years old.";
    const dateEntered = new Date(dob.value);
    const today = new Date();
    const age = today.getFullYear() - dateEntered.getFullYear();
    if (isNaN(dateEntered.getTime()) || age < 18 || (age === 18 && today < new Date(dateEntered.setFullYear(dateEntered.getFullYear() + 18)))) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateMobileNumber() {
    const mobileNumber = document.getElementById("MobileNumber");
    const cell = mobileNumber.parentElement;
    const errorMessage = "Mobile Number must be 10-12 digits.";
    if (!/^\d{10,12}$/.test(mobileNumber.value)) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateEmailAddress() {
    const email = document.getElementById("EmailAddress");
    const cell = email.parentElement;
    const errorMessage = "Please enter a valid email address.";
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value)) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateOrganType() {
    const organTypeCells = [
        document.getElementById("Heart"),
        document.getElementById("Kidneys"),
        document.getElementById("Liver"),
        document.getElementById("OtherOrgan")
    ];
    const errorMessage = "Please select at least one organ type.";
    const isChecked = organTypeCells.some(cell => cell.checked); 
    const cell = document.querySelector("td:has(input[type='checkbox'])"); 

    if (!isChecked) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateSurgeryDate() {
    const surgeryDate = document.getElementById("SurgeryDate");
    const cell = surgeryDate.parentElement;
    const errorMessage = "Please select a valid surgery date.";

    if (!surgeryDate.value) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateDonationMethod() {
    const donationMethod = document.querySelector('input[name="DonationMethod"]:checked');
    const cell = document.querySelector("td:has(input[type='radio'])"); 
    const errorMessage = "Please select a donation method.";

    if (!donationMethod) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validatePostOffice() {
    const postOffice = document.getElementById("PostOffice");
    const cell = postOffice.parentElement;
    const errorMessage = "Please enter the post office location.";

    if (!postOffice.value.trim()) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validatePackageTrackingNumber() {
    const trackingNumber = document.getElementById("PackageTrackingNumber");
    const cell = trackingNumber.parentElement;
    const errorMessage = "Please enter a valid tracking number.";

    if (!trackingNumber.value.trim()) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateForm() {
    const isValid =
        validateFirstName() &&
        validateSecondName() &&
        validateThirdName() &&
        validateGender() &&
        validateDOB() &&
        validateMobileNumber() &&
        validateEmailAddress() &&
        validateOrganType() &&
        validateSurgeryDate() &&
        validateDonationMethod() &&
        validatePostOffice() &&
        validatePackageTrackingNumber();

    if (isValid) {
        alert("Form submitted successfully!");
        document.querySelector("form").submit();
    } else {
        alert("Please fix the errors before submitting the form.");
    }
}

function displayError(cell, message) {
    cell.style.backgroundColor = "red"; 
    if (!cell.querySelector(".error-message")) {
        const errorMessage = document.createElement("span");
        errorMessage.className = "error-message";
        errorMessage.style.color = "white";
        errorMessage.style.fontSize = "0.9em";
        errorMessage.innerText = message;
        cell.appendChild(errorMessage);
    }
}

function clearError(cell) {
    cell.style.backgroundColor = ""; 
    const errorMessage = cell.querySelector(".error-message");
    if (errorMessage) {
        cell.removeChild(errorMessage);
    }
}
