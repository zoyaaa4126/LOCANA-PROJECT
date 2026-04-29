document.addEventListener("DOMContentLoaded", function () {

  // LOGIN
  document.getElementById("loginForm").addEventListener("submit", function(e){
    e.preventDefault();

    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const errorMsg = document.getElementById("error-msg");

    if(email === "admin@locana.com" && password === "1234"){
      window.location.href = "homepage.html";
    } else {
      errorMsg.textContent = "Username atau Password Salah!";
    }
  });

  // TOGGLE PASSWORD
  const toggle = document.getElementById("togglePassword");
  const password = document.getElementById("password");

  toggle.addEventListener("click", function () {
    if (password.type === "password") {
      password.type = "text";
      toggle.textContent = "visibility_off";
    } else {
      password.type = "password";
      toggle.textContent = "visibility";
    }
  });

});