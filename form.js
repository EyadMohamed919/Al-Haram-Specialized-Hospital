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
        city.innerHTML = '<option value="nsr">Nasr City</option> <option value="d5">District 5</option> <option value="mdi">Maadi</option> <option value="zam">Zamalek</option> <option value="cap">New Capital</option>';
    }
    else if(governorate.value === "giz")
    {
        city.innerHTML = '<option value="6oct">6th of October</option> <option value="zyd">Sheikh Zayed</option> <option value="hrm">El Haram</option> <option value="fas">Faisal</option>'
    }
    else
    {
        city.innerHTML = '<option value="mnd">El Mandara</option> <option value="asf">Asafra</option> <option value="bes">Sidi Beshr</option> <option value="gab">Sidi Gaber</option> <option value="san">San Stefano</option>'
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
    if(password === JSON.parse(localStorage.getItem("savedData")).password)
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

function saveAdminData()
{
    const name = document.getElementById("name").value;
    const password = document.getElementById("password").value;
    const newPassword = document.getElementById("newPassword").value;
    const email = document.getElementById("email").value;
    if(password === JSON.parse(localStorage.getItem("savedData")).password)
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