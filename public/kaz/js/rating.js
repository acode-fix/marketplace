document.addEventListener('DOMContentLoaded', () => {
  const stars = document.querySelectorAll('.star');
  const currentRating = document.querySelector('.current-rating');
  const ratingInput = document.getElementById('rating');

  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      let currentStar = index + 1;
      currentRating.innerText = `${currentStar} of 5`;
      ratingInput.value = currentStar;

      stars.forEach((star, i) => {
        if (currentStar >= i + 1) {
          star.innerHTML = '&#9733;'; // filled star
        } else {
          star.innerHTML = '&#9734;'; // empty star
        }
      });
    });
  });
});


document.addEventListener('DOMContentLoaded', () => {
  const stars = document.querySelectorAll('.mobile-star');
  const currentRating = document.querySelector('.mobile-current-rating');
  const ratingInput = document.getElementById('mobile-rating');

  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      let currentStar = index + 1;
      currentRating.innerText = `${currentStar} of 5`;
      ratingInput.value = currentStar;

      stars.forEach((star, i) => {
        if (currentStar >= i + 1) {
          star.innerHTML = '&#9733;'; // filled star
        } else {
          star.innerHTML = '&#9734;'; // empty star
        }
      });
    });
  });
});



document.addEventListener('DOMContentLoaded', function() {
  var checkbox = document.getElementById('menu-checkbox');
  var menuOverlay = document.querySelector('.menu-overlay');
  var menu = document.querySelector('.menu');

  checkbox.addEventListener('change', function() {
      if (this.checked) {
          menuOverlay.style.display = 'block';
          menu.style.display = 'block';
      } else {
          menuOverlay.style.display = 'none';
          menu.style.display = 'none';
      }
  });

  menuOverlay.addEventListener('click', function() {
      checkbox.checked = false;
      menuOverlay.style.display = 'none';
      menu.style.display = 'none';
  });
 });

 /*
 document.addEventListener("DOMContentLoaded", function () {
  const profileDropdownBtn = document.getElementById('profileDropdownBtn');
  const dropdownMenu = document.getElementById('dropdownMenu');

  profileDropdownBtn.addEventListener('click', function () {
    dropdownMenu.classList.toggle('show');
  });

  // Close the dropdown if the user clicks outside of it
  window.addEventListener('click', function (event) {
    if (!event.target.matches('#profileDropdownBtn')) {
      if (dropdownMenu.classList.contains('show')) {
        dropdownMenu.classList.remove('show');
      }
    }
  });
});
*/