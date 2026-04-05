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