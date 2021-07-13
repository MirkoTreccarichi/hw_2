
//FUNCTIONS

function checkEmail(event) {
    //EMAIL CONTROL
    if (!validateEmail(email.value)) {
        const error = "Email non valida !";
        errors.add(error);
        setError(email);
    }
}

function checkPassword(event) {
    //PASSWORD CONTROL
    if (!validatePassword(password.value)) {
        const error = "la password non è di un formato corretto";
        errors.add(error);
        setError(password);
    }

}

function checkName(event){
    //NAME CONTROL
    if(!validateNameSurname(name.value)){
        const error = "Il nome non è di un formato corretto";
        errors.add(error);
        setError(name);
    }
}

function  checkSurname(event){
    //SURNAME CONTROL
    if(!validateNameSurname(surname.value)){
        const error = "Il cognome non è di un formato corretto";
        errors.add(error);
        setError(surname);
    }
}

function checkConfirmPassoword(event) {
    //CONFIRM PASSWORD CONTROL
    if (password.value !== confirmPassoword.value) {
        const error = "le passoword non sono uguali";
        errors.add(error);
        setError(confirmPassoword);
    }
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validatePassword(password) {
    const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
    return re.test(String(password));
}

function validateNameSurname(nameSurname){
    const re = /^[a-zA-Z]{1,}$/;
    return re.test(String(nameSurname));
}


function setError(element) {
    element.classList.add("error");
}

function resetError(event) {
    event.currentTarget.classList.remove("error")
}

function checkValues(event) {
    event.preventDefault();
    for (element of elementList) {
        if (element.value === "") {
            const error = "L'elemento " +
                document.querySelector("label[for="+ element.name + "]").textContent
                + " è vuoto !";
            errors.add(error);
            setError(element);
        }
        else{
            element.focus();
            element.blur();
        }
    }
}



async function checkForm(event) {
    event.preventDefault();
    error_display.innerHTML = "";
    error_display.classList.add("hidden");

    if(email.value)
    await fetch("http://localhost/HW_2/public/registrazione/email_free", {
        method: "post",
        headers: {'X-CSRF-TOKEN': token.content},
        body: new FormData(signupForm)
    }).then(promise => promise.json()).then(json => {
        if (json) {
            const error = "Email già presente !";
            errors.add(error);
            setError(email);
        }
    });

    checkValues(event);

    if (errors.size) {

        error_display.classList.remove('hidden');
        for (const er of errors) {
            const element = document.createElement("p");

            element.textContent = er;

            error_display.append(element);
        }

        errors.clear();
        return;
    }

    document.forms["signup"].submit();

    //myusername/email : admin
    //mypassword : admin
}

//CONSTANTS AND VARIABLES
let errors = new Set;

//EVENT LISTENERS
const email = document.querySelector(".email input");
email.addEventListener('blur', checkEmail);

const password = document.querySelector(".password input");
password.addEventListener('blur', checkPassword);

const confirmPassoword = document.querySelector(".confirm_password input");
confirmPassoword.addEventListener('blur', checkConfirmPassoword);

const name = document.querySelector(".name input");
name.addEventListener('blur',checkName);

const surname = document.querySelector(".surname input");
surname.addEventListener('blur',checkSurname);

const signupForm = document.forms["signup"];
signupForm.addEventListener("submit", checkForm);
const elementList = document.querySelectorAll("input");

const error_display = document.querySelector(".error_display");

for (element of elementList) {
    element.addEventListener("focus", resetError);
}

const token = document.querySelector('#csrf');
