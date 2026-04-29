document.querySelectorAll('.main-cards').forEach(cardSection => {

  let scrollContainer = cardSection.querySelector('.scrollContainer');
  let backBtn = cardSection.querySelector('.scrollLeft');
  let nextBtn = cardSection.querySelector('.scrollRight');

  function updateButtons() {
    if (scrollContainer.scrollLeft <= 0) {
      backBtn.style.opacity = "0";
      backBtn.style.pointerEvents = "none";
    } else {
      backBtn.style.opacity = "1";
      backBtn.style.pointerEvents = "auto";
    }

    if (scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth - 1) {
      nextBtn.style.opacity = "0";
      nextBtn.style.pointerEvents = "none";
    } else {
      nextBtn.style.opacity = "1";
      nextBtn.style.pointerEvents = "auto";
    }
  }

  nextBtn.addEventListener("click", () => {
    scrollContainer.scrollBy({ left: 900, behavior: "smooth" });
  });

  backBtn.addEventListener("click", () => {
    scrollContainer.scrollBy({ left: -900, behavior: "smooth" });
  });

  scrollContainer.addEventListener("scroll", updateButtons);

  updateButtons();
});

const mobileToggle = document.getElementById("mobileFilterToggle");
const sidebar = document.getElementById("desktopSidebar");

const desktopToggle = document.getElementById("desktopFilterToggle");
const desktopSidebar = document.getElementById("desktopSidebar");

mobileToggle.addEventListener("click", () => {
    sidebar.classList.toggle("max-sm:hidden");
});

desktopToggle.addEventListener("click", () => {
    desktopSidebar.classList.toggle("w-80");
    desktopSidebar.classList.toggle("w-0");
    desktopSidebar.classList.toggle("p-6");
    desktopSidebar.classList.toggle("overflow-hidden");

    if (desktopSidebar.classList.contains("w-0")) {
        desktopSidebar.classList.add("opacity-0");
    } else {
        desktopSidebar.classList.remove("opacity-0");
    }

    desktopToggle.classList.toggle("bg-gray-100");
});