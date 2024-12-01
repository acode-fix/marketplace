document.addEventListener('DOMContentLoaded', function() {
  // Select all menu links and submenus
  const menuLinks = document.querySelectorAll('.menu-link');
  const submenus = document.querySelectorAll('.submenu');

  menuLinks.forEach((menuLink, index) => {
    const submenu = submenus[index];

    // Function to toggle the submenu
    const toggleSubmenu = () => {
      if (submenu.style.display === 'none' || submenu.style.display === '') {
        submenu.style.display = 'block';
        submenu.classList.remove('slide-out');
        submenu.classList.add('slide-in');
      } else {
        submenu.classList.remove('slide-in');
        submenu.classList.add('slide-out');
        setTimeout(() => {
          submenu.style.display = 'none';
        }, 500); // Matches the slide-out animation duration
      }
    };

    // Add click event listener to the current menu link
    menuLink.addEventListener('click', function(e) {
      e.preventDefault(); // Prevent default anchor behavior
      toggleSubmenu(); // Toggle the submenu visibility
    });
  });

  // Ensure submenu links navigate as expected
  const submenuLinks = document.querySelectorAll('.submenu a');
  submenuLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.stopPropagation(); // Stop the click from propagating to parent elements
      // Do not use e.preventDefault() here to allow navigation
    });
  });

  // Close all submenus when clicking outside of the sidebar
  document.addEventListener('click', function(event) {
    menuLinks.forEach((menuLink, index) => {
      const submenu = submenus[index];
      if (!menuLink.contains(event.target) && submenu.style.display === 'block') {
        submenu.classList.remove('slide-in');
        submenu.classList.add('slide-out');
        setTimeout(() => {
          submenu.style.display = 'none';
        }, 500);
      }
    });
  });
});
