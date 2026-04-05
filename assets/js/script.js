// detect error
document.getElementById("loginForm").addEventListener("submit", function(e) {
  e.preventDefault();

  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  const errorMsg = document.getElementById("error-msg");

  // contoh login sederhana
  if (username === "admin" && password === "1234") {
    alert("Login berhasil!");
    window.location.href = "dashboard.html"; // pindah halaman
  } else {
    errorMsg.textContent = "Username atau password salah!";
  }
});

//btn click perpindahan login register
const masuk = document.getElementById("masuk");
const daftar = document.getElementById("daftar");

masuk.addEventListener("click", () => {
    masuk.classList.add("active");
    daftar.classList.remove("active");

    setTimeout(() => {
        window.location.href = "login.html";
    }, 200);
});

daftar.addEventListener("click", () => {
    daftar.classList.add("active");
    masuk.classList.remove("active");

    setTimeout(() => {
      window.location.href = "register.html";
    }, 200);
});

//visibility
const toggle = document.getElementById("togglePassword");
const password = document.getElementById("password");

toggle.addEventListener("click", () => {
  if (password.type === "password") {
    password.type = "text";
    toggle.textContent = "visibility_off"; // ganti icon
  } else {
    password.type = "password";
    toggle.textContent = "visibility"; // balik lagi
  }
});

