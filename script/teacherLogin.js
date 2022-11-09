document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");

    var user = "adminT";
    var pass = "adminT";
    var email = "";
    var name = "";

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("formHidden");
        createAccountForm.classList.remove("formHidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("formHidden");
        createAccountForm.classList.add("formHidden");
    });

    document.querySelector("#submit").addEventListener("click", e => {
        e.preventDefault();
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username == user && password == pass) {
            window.location.href = 'teachers.html';
        }
        else {
            document.querySelector("#loginErrorMassage").classList.remove("formHidden");
        }
    });

    document.querySelector("#post").addEventListener("click", e => {
        e.preventDefault();
        user = document.getElementById("createUsername").value;
        pass = document.getElementById("createPassword").value;
        email = document.getElementById("email").value;
        name = document.getElementById("name").value;
        alert("Account Created Successfully!");
        loginForm.classList.remove("formHidden");
        createAccountForm.classList.add("formHidden");
    });


});