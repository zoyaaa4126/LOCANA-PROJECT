let menuOpen = false;

const toggleMenuMobile = document.getElementById("toggleMenu");
const mobileNavbar = document.querySelector(".mobile-navbar");
toggleMenuMobile.addEventListener("click", () => {
    menuOpen = !menuOpen
    if(menuOpen){
        mobileNavbar.style.display = "flex";
        toggleMenuMobile.innerText = "close"
    }else{
        mobileNavbar.style.display = "none";
        toggleMenuMobile.innerText = "menu"
    }
})