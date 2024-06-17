
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
 