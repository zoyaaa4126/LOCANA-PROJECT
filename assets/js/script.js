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

  document.body.classList.remove("filter-open");

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