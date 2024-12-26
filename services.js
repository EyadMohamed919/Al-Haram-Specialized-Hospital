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
    document.getElementById("statusUpdate").value = "Submitted successfully";
    return true;
}

const form = document.getElementsByTagName("form");
const email = document.getElementById ("email");
const pn = document.getElementById ("pn");