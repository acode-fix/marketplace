
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
  

  document.addEventListener("DOMContentLoaded", function() {
    const connectElement = document.querySelector('.connect-shop');
    
    // Add event listener for mouseover
    connectElement.addEventListener('mouseover', function() {
      connectElement.textContent = "Connect with me";
      connectElement.classList.add('with-padding'); // Add class to reduce padding
    });
    
    // Add event listener for mouseout
    connectElement.addEventListener('mouseout', function() {
      connectElement.textContent = "Connect";
      connectElement.classList.remove('with-padding'); // Remove class to revert padding
    });
  });

