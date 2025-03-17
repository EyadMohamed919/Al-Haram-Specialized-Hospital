// Show welcome message when the page loads
window.onload = function() {
    alert("Welcome to the Office Volunteering page");
};

// Function to validate first name
function validateFirstName() {
    const firstName = document.getElementById("FirstName");
    const cell = firstName.parentElement;
    const errorMessage = "First Name must contain only letters and cannot be empty.";

    if (!/^[A-Za-z]+$/.test(firstName.value.trim())) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

// Function to validate second name
function validateSecondName() {
    const secondName = document.getElementById("SecondName");
    const cell = secondName.parentElement;
    const errorMessage = "Second Name must contain only letters and cannot be empty.";

    if (!/^[A-Za-z]+$/.test(secondName.value.trim())) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

// Function to validate third name
function validateThirdName() {
    const thirdName = document.getElementById("ThirdName");
    const cell = thirdName.parentElement;
    const errorMessage = "Third Name must contain only letters and cannot be empty.";

    if (!/^[A-Za-z]+$/.test(thirdName.value.trim())) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

// Function to validate gender selection
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

// Function to validate date of birth (must be 18+ years old)
function validateDOB() {
    const dob = document.getElementById("DOB");
    const cell = dob.parentElement;
    const errorMessage = "You must be at least 18 years old.";

    const dateEntered = new Date(dob.value);
    const today = new Date();
    const age = today.getFullYear() - dateEntered.getFullYear();

    if (isNaN(dateEntered.getTime()) || age < 18 || 
       (age === 18 && today < new Date(dateEntered.setFullYear(dateEntered.getFullYear() + 18)))) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

// Function to validate mobile number (must be 10-12 digits)
function validateMobileNumber() {
    const mobileNumber = document.getElementById("MobileNumber");
    const cell = mobileNumber.parentElement;
    const errorMessage = "Mobile Number must be 10-12 digits.";

    if (!/^\d{10,12}$/.test(mobileNumber.value.trim())) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

// Function to validate email address
function validateEmailAddress() {
    const email = document.getElementById("EmailAddress");
    const cell = email.parentElement;
    const errorMessage = "Please enter a valid email address.";
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email.value.trim())) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

// Function to validate yes/no radio questions
function validateRadio(name, errorMessage) {
    const radios = document.getElementsByName(name);
    const cell = radios[0].parentElement;

    if (![...radios].some(radio => radio.checked)) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

// Function to validate start date
function validateStartDate() {
    const startDate = document.getElementById("startDate");
    const cell = startDate.parentElement;
    const errorMessage = "Please enter a valid start date.";

    if (!startDate.value) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

// Main validation function
function validateForm() {
    const isValid = 
        validateFirstName() &&
        validateSecondName() &&
        validateThirdName() &&
        validateGender() &&
        validateDOB() &&
        validateMobileNumber() &&
        validateEmailAddress() &&
        validateRadio("ComputerSkills", "Please select a statement for Computer Skills.") &&
        validateRadio("OrganizationSkills", "Please select a statement for Organization Skills.") &&
        validateRadio("AttentionToDetails", "Please select a statement for Attention To Details.") &&
        validateRadio("PositiveAttitude", "Please select a statement for Positive Attitude.") &&
        validateRadio("Confidence", "Please select a statement for Confidence.") &&
        validateStartDate();

    if (isValid) {
        alert("Form submitted successfully!");
        document.getElementById("officeVolForm").submit(); // Submit form
    } else {
        alert("Please fix the errors before submitting the form.");
    }
}

// Function to display error messages
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

// Function to clear error messages
function clearError(cell) {
    cell.style.backgroundColor = "";
    const errorMessage = cell.querySelector(".error-message");
    if (errorMessage) {
        cell.removeChild(errorMessage);
    }
}