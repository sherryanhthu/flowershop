function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector("form-message");

    messageElement.textContent = message;
    messageElement.classList.remove("form-message-success", "form-message-error");
    messageElement.classList.add('form-message-${type}');
}

// setFormMessage(loginForm, "success", "You're logged in!");

function setInputError(inputElement, message) {
    inputElement.classList.add("form-input-error");
    inputElement.parentElement.querySelector(".form-input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form-input-error");
    inputElement.parentElement.querySelector(".form-input-error-message").textContent = "";
}

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form-hidden");
        createAccountForm.classList.remove("form-hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("form-hidden");
        createAccountForm.classList.add("form-hidden");
    });

    loginForm.addEventListener("submit", e => {
        e.preventDefault();

        // Perform your AJAX/Fetch login

        setFormMessage(loginForm, "error", "Invalid username/password combination");
    });

    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

    document.querySelectorAll(".form-input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if(e.target.id === "signupUsername" && e.target.value.length > 0 && e.target.value.length < 10){
                setInputError(inputElement, "Username must be at least 10 characters in length");
            }
            if(e.target.id === "signupEmail" && filter.test(e.target.value) == false){
                setInputError(inputElement, "Email is not a valid email address");
            }
            if(e.target.id === "signupPassword" && strongRegex.test(e.target.value) == false){
                setInputError(inputElement, "Password must be at least 8 characters containing UPPERCASE, lowercase, special characters and numbers!");
            }
            if(e.target.id === "signupPassword2" && e.target.value != document.getElementById('signupPassword').value){
                setInputError(inputElement, "Re-entered password does not match!");
            }
        });

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    });
});