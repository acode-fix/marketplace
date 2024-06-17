document.addEventListener("DOMContentLoaded", function() {
  var moreText = document.getElementById("moreText");
  var readMoreBtn = document.getElementById("readMoreBtn");

  // Function to close the accordion
  function closeAccordion() {
      moreText.style.display = "none";
      readMoreBtn.textContent = ".......Read more";
  }

  // Toggle accordion on read more button click
  readMoreBtn.addEventListener("click", function(e) {
      e.preventDefault();
      if (moreText.style.display === "none") {
          moreText.style.display = "inline";
          readMoreBtn.textContent = "Read less";
      } else {
          closeAccordion();
      }
  });

  // Close accordion when clicking outside of it
  document.addEventListener("click", function(e) {
      var isClickInsideAccordion = readMoreBtn.contains(e.target) || moreText.contains(e.target);
      if (!isClickInsideAccordion) {
          closeAccordion();
      }
  });
});
document.addEventListener("DOMContentLoaded", function() {
  var moreText = document.getElementById("moreText2");
  var readMoreBtn = document.getElementById("readMoreBtn2");

  // Function to close the accordion
  function closeAccordion() {
      moreText.style.display = "none";
      readMoreBtn.textContent = ".......Read more";
  }

  // Toggle accordion on read more button click
  readMoreBtn.addEventListener("click", function(e) {
      e.preventDefault();
      if (moreText.style.display === "none") {
          moreText.style.display = "inline";
          readMoreBtn.textContent = "Read less";
      } else {
          closeAccordion();
      }
  });

  // Close accordion when clicking outside of it
  document.addEventListener("click", function(e) {
      var isClickInsideAccordion = readMoreBtn.contains(e.target) || moreText.contains(e.target);
      if (!isClickInsideAccordion) {
          closeAccordion();
      }
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
  