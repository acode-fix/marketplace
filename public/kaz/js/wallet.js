document.addEventListener('DOMContentLoaded', function() {
  // Get all accordion elements
  const accordions = document.getElementsByClassName("accordion");

  // Loop through all accordion elements
  for (let i = 0; i < accordions.length; i++) {
    // Add click event listener to each accordion
    accordions[i].addEventListener("click", function() {
      this.classList.toggle("active");
      const panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
      
      // Toggle caret icons within the clicked accordion
      const caretDown = this.querySelector('.caret-btn');
      const caretUp = this.querySelector('.caret-btn2');
      caretDown.style.display = caretDown.style.display === 'none' ? 'inline-block' : 'none';
      caretUp.style.display = caretUp.style.display === 'none' ? 'inline-block' : 'none';
    });
  }
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
 
