
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


 document.addEventListener('DOMContentLoaded', function() {
    const linkInput = document.getElementById('linkInput');
    const linkButton = document.getElementById('linkButton');
    const paragraph = document.getElementById('display');

    if(linkButton) {

    linkButton.addEventListener('click', function() {
      if (linkButton.textContent === 'Link') {
        // Fetch data from the database and set it in the input field
        const fetchedLink = "Your fetched link from the database";
        linkInput.value = fetchedLink;
        // Change button text to 'Copy Link'
        linkButton.textContent = 'Copy';
        // Add the small-text class to the input field
        linkInput.classList.add('small-text');
      } else {
        // Copy link to clipboard
        linkInput.select();
        document.execCommand('copy');
        // Display message
        paragraph.textContent = 'Link copied successfully!';
      }
    });

  }
  });
      
  document.addEventListener('DOMContentLoaded', function() {
    const linkInput = document.getElementById('linkInput-mobile');
    const linkButton = document.getElementById('linkButton-mobile');
    const paragraph = document.getElementById('display-mobile');

    if (linkButton) {

    linkButton.addEventListener('click', function() {
      if (linkButton.textContent === 'Link') {
        // Fetch data from the database and set it in the input field
        const fetchedLink = "Your fetched link from the database";
        linkInput.value = fetchedLink;
        // Change button text to 'Copy Link'
        linkButton.textContent = 'Copy';
        // Add the small-text class to the input field
        linkInput.classList.add('small-text');
      } else {
        // Copy link to clipboard
        linkInput.select();
        document.execCommand('copy');
        // Display message
        paragraph.textContent = 'Link copied successfully!';
      }
    });

  }
  });
  
  
 