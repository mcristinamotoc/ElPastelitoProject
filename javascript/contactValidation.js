//Contact Form Validation

const contactForm = document.getElementById("contactForm");
contactForm.addEventListener(
  "blur",
  (event) => {
    console.log(event);
    if (event.target.value != "") event.target.classList.remove("is-invalid");
    contactValidation();
  },
  true
);

function contactValidation() {
  //Variables
  var errors = 0;
  contactForm.classList.remove("is-invalid");

  var name = document.getElementById("name");
  var email = document.getElementById("email");
  var phone = document.getElementById("phone");
  var subject = document.getElementById("subject");
  var rations = document.getElementById("rations");
  var cake = document.getElementById("cake");
  var cream = document.getElementById("cream");
  var textarea = document.getElementById("textarea");
  //Condicionals

  if (name.value == "") {
    name.classList.add("is-invalid");
    document.getElementById("errorName").textContent = "This field is required";
    errors++;
  }
  if (email.value == "" || !emailValidation(email.value)) {
    email.classList.add("is-invalid");
    document.getElementById("errorEmail").textContent =
      "Invalid field, please fill up your email";
    errors++;
  }

  if (phone.value == "" || !phoneValidation(phone.value)) {
    phone.classList.add("is-invalid");
    document.getElementById("errorPhone").textContent =
      "Invalid field, please fill up your phone number";
    errors++;
  }

  if (subject.value == "") {
    subject.classList.add("is-invalid");
    document.getElementById("errorSubject").textContent =
      "This field is required";
    errors++;
  }
  if (rations.value == "") {
    rations.classList.add("is-invalid");
    document.getElementById("errorRations").textContent =
      "Invalid field, please fill up your rations number";
    errors++;
  }
  if (cake.value == "") {
    cake.classList.add("is-invalid");
    document.getElementById("errorCake").textContent =
      "This field is required";
    errors++;
  }
  if (cream.value == "") {
    cream.classList.add("is-invalid");
    document.getElementById("errorCream").textContent =
    "This field is required" ;
    errors++;
  }
  if (textarea.value == "") {
    textarea.classList.add("is-invalid");
    document.getElementById("errorTextArea").textContent =
      "This field is required";
    errors++;
  }

  if (errors > 0) {
    return false;
  } else {
    return true;
  }
}
// Functions

function emailValidation(emailRegister) {
  var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(emailRegister) ? true : false;
}

function phoneValidation(phoneRegister) {
  var regex = /(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}/;
  return regex.test(phoneRegister) ? true : false;
}
