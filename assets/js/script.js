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

const links = document.querySelectorAll('.kategori-btn a');

links.forEach(link => {
    link.addEventListener('click', (e) => {
        const buttons = document.querySelectorAll('.kategori-btn');

        buttons.forEach(b => b.classList.remove('active'));
        link.closest('.kategori-btn').classList.add('active');
    });
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

function myFunction() {
  const nav = document.getElementById("mytopnav");
  const icon = document.querySelector(".menu-icon");

  nav.classList.toggle("responsive");

  if(nav.classList.contains("responsive")){
    icon.textContent = "close";
  } else {
    icon.textContent = "menu";
  }
}

function toggleFilter(){
  document.body.classList.toggle("filter-open");

  document.getElementById("mytopnav").classList.remove("responsive");

  document.querySelector(".menu-icon").textContent = "menu";
}

function toggleMenu() {
    const mobileNavbar = document.querySelector(".mobile-navbar");
    const toggleIcon = document.getElementById("toggleMenu");

    if (mobileNavbar.style.display === "flex") {
        mobileNavbar.style.display = "none";
        toggleIcon.innerText = "menu";
    } else {
        mobileNavbar.style.display = "flex";
        toggleIcon.innerText = "close";
    }
}