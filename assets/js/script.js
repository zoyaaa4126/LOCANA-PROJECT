document.addEventListener("DOMContentLoaded", function () {

  // LOGIN
  const loginForm = document.getElementById("loginForm");

  if (loginForm) {

    loginForm.addEventListener("submit", function(e){
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

  }

  // TOGGLE PASSWORD
  const toggles = document.querySelectorAll(".toggle-password");

  toggles.forEach(function(toggle) {

    toggle.addEventListener("click", function() {

      const password =
        toggle.parentElement.querySelector(".password-input");

      if (password.type === "password") {
        password.type = "text";
        toggle.textContent = "visibility_off";
      } else {
        password.type = "password";
        toggle.textContent = "visibility";
      }

    });

  });

});

// =============================================
// REVIEW PAGE - SORT DROPDOWN
// =============================================
const sortSelect = document.getElementById('sortSelect');
if (sortSelect) {
    sortSelect.addEventListener('change', function () {
        const val = this.value;
        // Sorting logic akan disambungkan ke backend nanti
        // Untuk sekarang dropdown berfungsi tapi belum sort
        console.log('Sort by:', val);
    });
}

// =============================================
// CREATE REVIEW - STAR RATING
// =============================================
const starBtns = document.querySelectorAll('.star-btn');
const ratingInput = document.getElementById('ratingInput');
const ratingLabel = document.getElementById('ratingLabel');

const ratingLabels = {
    1: 'Buruk',
    2: 'Kurang',
    3: 'Cukup',
    4: 'Bagus',
    5: 'Sangat Bagus!'
};

if (starBtns.length) {
    // Set awal jika ada old value
    const initialRating = parseInt(ratingInput?.value);
    if (initialRating) setStars(initialRating);

    starBtns.forEach(btn => {
        // Hover
        btn.addEventListener('mouseenter', function () {
            const val = parseInt(this.dataset.value);
            highlightStars(val);
        });

        // Mouse leave — kembali ke nilai yang sudah dipilih
        btn.addEventListener('mouseleave', function () {
            const selected = parseInt(ratingInput.value);
            if (selected) {
                setStars(selected);
            } else {
                resetStars();
            }
        });

        // Click — simpan nilai
        btn.addEventListener('click', function () {
            const val = parseInt(this.dataset.value);
            ratingInput.value = val;
            setStars(val);
            if (ratingLabel) {
                ratingLabel.textContent = ratingLabels[val] || '';
                ratingLabel.classList.add('text-[#FBB45E]');
                ratingLabel.classList.remove('text-gray-400');
            }
        });
    });
}

function highlightStars(count) {
    starBtns.forEach(btn => {
        const val = parseInt(btn.dataset.value);
        if (val <= count) {
            btn.style.color = '#FBB45E';
            btn.style.fontVariationSettings = "'FILL' 1";
        } else {
            btn.style.color = '#D1D5DB';
            btn.style.fontVariationSettings = "'FILL' 0";
        }
    });
}

function setStars(count) {
    highlightStars(count);
}

function resetStars() {
    starBtns.forEach(btn => {
        btn.style.color = '#D1D5DB';
        btn.style.fontVariationSettings = "'FILL' 0";
    });
}

// =============================================
// CREATE REVIEW - FILE PREVIEW
// =============================================
function previewFile(input) {
    const preview = document.getElementById('filePreview');
    const previewImg = document.getElementById('previewImg');
    const previewName = document.getElementById('previewName');

    if (input.files && input.files[0]) {
        const file = input.files[0];
        previewName.textContent = file.name;

        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImg.src = e.target.result;
                previewImg.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            previewImg.classList.add('hidden');
        }

        preview.classList.remove('hidden');
    }
}