function checkAgree(){
    var check = document.getElementById("agree");
    var submit = document.getElementById("submit");
    if (check.checked)
    {
        submit.disabled = false;
        submit.style.backgroundColor = "blue";
        submit.style.color="white";
        /*submit.disables = "false"*/
    }
    else
    {
        submit.disabled = true;
        submit.style.backgroundColor = "gray";
        submit.style.color="black";
    }
}