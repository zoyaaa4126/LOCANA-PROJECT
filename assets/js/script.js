document.addEventListener("DOMContentLoaded", function () {

    // TOGGLE PASSWORD
    const toggles = document.querySelectorAll(".toggle-password");

    if (toggles.length) {
        toggles.forEach(function(toggle) {

            toggle.addEventListener("click", function() {

                const password =
                    toggle.parentElement.querySelector(".password-input");

                if (!password) return;

                if (password.type === "password") {
                    password.type = "text";
                    toggle.textContent = "visibility_off";
                } else {
                    password.type = "password";
                    toggle.textContent = "visibility";
                }

            });

        });
    }

    // REVIEW PAGE - SORT DROPDOWN
    const sortSelect = document.getElementById('sortSelect');

    if (sortSelect) {
        sortSelect.addEventListener('change', function () {
            const val = this.value;
            console.log('Sort by:', val);
        });
    }

    // CREATE REVIEW - STAR RATING
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

    if (starBtns.length && ratingInput) {

        const initialRating = parseInt(ratingInput.value);

        if (initialRating) setStars(initialRating);

        starBtns.forEach(btn => {

            btn.addEventListener('mouseenter', function () {
                const val = parseInt(this.dataset.value);
                highlightStars(val);
            });

            btn.addEventListener('mouseleave', function () {
                const selected = parseInt(ratingInput.value);

                if (selected) {
                    setStars(selected);
                } else {
                    resetStars();
                }
            });

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

});