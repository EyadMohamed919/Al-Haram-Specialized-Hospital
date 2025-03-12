function ValidateForm(event) {
    let inputs = document.getElementsByClassName("input");
    for (let i = 0; i < inputs.length; i++) {
        let input = inputs[i];
        if (input.type === "submit" || input.type === "reset") {
            continue;
        }
        if (input.value === "" || input.value === null) {
            alert("You can't leave it empty");
            return false
        }
    }
    return true;
}