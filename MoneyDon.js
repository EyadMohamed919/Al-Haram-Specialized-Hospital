window.onload = function() {
    alert("Welcome to Money Donations page");
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

function validatePaymentMethod() {
    const paymentMethods = document.querySelectorAll('input[name="PaymentMethod"]:checked');
    const cell = document.querySelector('input[name="PaymentMethod"]').parentElement;
    const errorMessage = "Please select at least one payment method.";
    if (paymentMethods.length === 0) {
        displayError(cell, errorMessage);
        return false;
    }
    clearError(cell);
    return true;
}

function validateAmount() {
    const amount = document.getElementById("Amount");
    const cell = amount.parentElement;
    const errorMessage = "Please select a valid donation amount.";
    if (amount.value === "0") {
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
        validatePaymentMethod() &&
        validateAmount();
    if (isValid) {
        alert("Form submitted successfully!");
        document.querySelector("form").submit();
    } else {
        alert("Please fix the error before submitting the form.");
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
