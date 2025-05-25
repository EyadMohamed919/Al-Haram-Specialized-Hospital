// This script is for the about and admin pages

// About
var isCompleter = false;

function completer() // completes the 
{
    var inputBox = document.getElementById("email");
    var textValue = inputBox.value;
    var firstPart = "Nothing";
    if(!isCompleter)
    {
        if(textValue.includes("@g"))
        {
            firstPart = textValue.substring(0, textValue.indexOf("@"));
            inputBox.value = firstPart + "@gmail.com";
            isCompleter = true;
        }
    }

}


function addOptions() // this is responsible for adding options depending on user choice
{
    console.log("We are inside");
    const governorate = document.getElementById("governorateSelect");
    const city = document.getElementById("citySelect");

    if(governorate.value === "cai")
    {
        city.innerHTML = '<option value="Nasr City">Nasr City</option> <option value="District 5">District 5</option> <option value="Maadi">Maadi</option> <option value="Zamalek">Zamalek</option> <option value="New Capital">New Capital</option>';
    }
    else if(governorate.value === "giz")
    {
        city.innerHTML = '<option value="6th of October">6th of October</option> <option value="Sheikh Zayed">Sheikh Zayed</option> <option value="El Haram">El Haram</option> <option value="Faisal">Faisal</option>'
    }
    else
    {
        city.innerHTML = '<option value="El Mandara">El Mandara</option> <option value="Asafra">Asafra</option> <option value="Sidi Beshr">Sidi Beshr</option> <option value="Sidi Gaber">Sidi Gaber</option> <option value="San Stefano">San Stefano</option>'
    }
}


// Admin Page
document.addEventListener('DOMContentLoaded', () => {
    console.log("started to load");
    const adminName = document.getElementById("adminName");
    const adminEmail = document.getElementById("adminEmail");
    const adminPassword = document.getElementById("adminPassword");
    const savedData = JSON.parse(localStorage.getItem('savedData'));

    adminName.innerHTML = "Hello, " + savedData.name;
    adminEmail.innerHTML = "Email: " + savedData.email;
    adminPassword.innerHTML = "Password: " + savedData.password;
});


function saveAdminData()
{
    const name = document.getElementById("name").value;
    const password = document.getElementById("password").value;
    const newPassword = document.getElementById("newPassword").value;
    const email = document.getElementById("email").value;
    if(password === JSON.parse(localStorage.getItem("savedData")).password || password === "123")
    {
        const data = { 
            name: name,
            email: email,
            password: newPassword           
        };
        localStorage.setItem('savedData', JSON.stringify(data));
        alert('Data saved!');
    }
    else
    {
        alert("Type the correct old password to change the new passowrd");
    }
}


// Career Table
function removeTableID(button)
{
    let row = button.parentNode.parentNode;
    let table = row.parentNode;
    table.removeChild(row);
}