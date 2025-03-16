function ValidateForm(event) {
    let inputs = document.getElementsByClassName("input");
    let formIsValid = true;
    
    for (let i = 0; i < inputs.length; i++) {
        let input = inputs[i];
        if (input.type === "submit" || input.type === "reset") {
            continue;
        }
        if (input.value.trim() === "") {
            alert("You can't leave it empty");
            formIsValid = false;
            console.log(`Invalid input found: ${input.name || input.id}`);
        }
    }
    
    if (!formIsValid) {
        event.preventDefault();
        console.log("Form submission prevented due to invalid inputs.");
        return false;
    }
    
    console.log("Form is valid and ready to be submitted.");
    return true;
}