function ValidateForm()
{
    let x=document.getElementsByClassName("input").value;
    if (x=="" || x==null)
    {
        alert("You can't leave it empty");
    }
}
