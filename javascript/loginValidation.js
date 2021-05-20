//Login Form Validation

const loginForm = document.getElementById("loginForm");

function loginValidation() {
    var errors = 0;
    loginForm.classList.remove('is-invalid');

    var emailLogin = document.getElementById("emailLogin");
    var passwordLogin = document.forms["loginForm"]["passwordLogin"];

    //Condicionals 

    if (emailLogin.value == "" || !email_Verify(emailLogin.value)) {
        emailLogin.classList.add("is-invalid");
        document.getElementById("errorEmail").textContent = "Invalid email, please fill up your email";
        errors++;

    }
    if (passwordLogin.value == "") {
        passwordLogin.classList.add("is-invalid");
        document.getElementById("errorPassword").textContent = "Please fill up your password";
        errors++;
    }

    if (errors > 0) {
        return false;
    } else {
        return true;
    }
}
// Functions 

function email_Verify(emailLogin) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(emailLogin) ? true : false;
}


loginForm.addEventListener('blur', (event) => {
    console.log(event);
    if (event.target.value != '') event.target.classList.remove('is-invalid');
    loginValidation();

}, true);