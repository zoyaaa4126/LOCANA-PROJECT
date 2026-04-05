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

const buttons = document.querySelectorAll('.kategori-btn');
buttons.forEach(button => {
    button.addEventListener('click', () => {
        buttons.forEach( b => b.classList.remove('active'));
        button.classList.add('active');
    });
});

const slider = document.getElementById("rangeSlider");
const value = document.getElementById("rangeValue");

slider.oninput = function() {
    value.textContent = this.value + "KM";
}

function toggleSearch() {
    const searchBar = document.querySelector(".search-bar");
    searchBar.classList.toggle("active");
}

function myFunction() {
  const nav = document.getElementById("mytopnav");
  const icon = document.querySelector(".menu-icon");

  nav.classList.toggle("responsive");

  document.body.classList.remove("filter-open");

  if(nav.classList.contains("responsive")){
    icon.textContent = "close";
  } else {
    icon.textContent = "menu";
  }
}