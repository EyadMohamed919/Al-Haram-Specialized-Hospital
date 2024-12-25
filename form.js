var isCompleter = false;

function completer()
{
    var inputBox = document.getElementById("email");
    var textValue = inputBox.value;
    var firstPart = "Nothing";
    if(!isCompleter)
    {
        console.log("Inside the loop");
        if(textValue.includes("@g"))
        {   
            console.log("includes @g");
            firstPart = textValue.substring(0, textValue.indexOf("@"));
            inputBox.value = firstPart + "@gmail.com";
            isCompleter = true;
        }
    }

}


function addOptions()
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