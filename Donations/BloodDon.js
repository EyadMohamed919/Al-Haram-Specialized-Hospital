window.onload = function() {
    alert("Welcome to Blood Donations page");
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

function validateBloodType() {
    const selectedBloodType = document.querySelectorAll('input[name="BloodType"]:checked');
    const cell = document.getElementById('BloodType').parentElement;
    const errorMessage = "Please select at least one blood type.";
    if (selectedBloodType.length === 0) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateBloodDonationDate() {
    const bloodDonationDate = document.getElementById("BloodDonationDate");
    const cell = bloodDonationDate.parentElement;
    const errorMessage = "Please select a valid date for your blood donation.";
    if (!bloodDonationDate.value) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateDonationMethod() {
    const donationMethod = document.querySelector('input[name="DonationMethod"]:checked');
    const cell = document.getElementById("DonationMethodPost").parentElement;
    const errorMessage = "Please select a post office.";
    if (!donationMethod) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validatePostOfficelocation() {
    const postOfficeName = document.getElementById("PostOffice");
    const cell = postOfficeName.parentElement;
    const errorMessage = "Post office location cannot be empty.";
    if (postOfficeName.value.trim() === "") {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validatePackageTrackingNumber() {
    const packageTrackingNumber = document.getElementById("PackageTrackingNumber");
    const cell = packageTrackingNumber.parentElement;
    const errorMessage = "Package tracking number cannot be empty.";
    if (packageTrackingNumber.value.trim() === "") {
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
        validateBloodType() &&
        validateBloodDonationDate() &&
        validateDonationMethod() &&
        validatePostOfficeName() &&
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
