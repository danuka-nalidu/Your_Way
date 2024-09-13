function validatePassword() {
    var password = document.getElementById("password").value;
    var c_pass = document.getElementById("conpassword").value;
    if (password !== c_pass) {
    alert("Password and confirm password does not match each other.");
    return false;
    }
    window.location.href = "login_new.php";
    return true;
}