
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
 document.addEventListener("DOMContentLoaded", function() {
  var myLinks = document.querySelectorAll(".myLink");

  // Function to set the clicked link as active
  function setActiveLink(linkIndex) {
    myLinks.forEach(function(link, index) {
      if (index === linkIndex) {
        link.classList.add("clicked");
      } else {
        link.classList.remove("clicked");
      }
    });
  }

  // Function to retrieve the index of the clicked link from local storage
  function getClickedLinkIndex() {
    return parseInt(localStorage.getItem("clickedLinkIndex"));
  }

  // Function to determine if a link matches the current page's URL
  function isLinkCurrentPage(link) {
    var linkHref = link.getAttribute("href");
    var currentPageURL = window.location.pathname;
    return linkHref === currentPageURL;
  }

  // Get the index of the clicked link from local storage
  var clickedLinkIndex = getClickedLinkIndex();

  // Set the active link based on the stored index
  if (!isNaN(clickedLinkIndex)) {
    setActiveLink(clickedLinkIndex);
  }

  myLinks.forEach(function(myLink, index) {
    myLink.addEventListener("click", function(event) {
      // Store the clicked link index in local storage
      localStorage.setItem("clickedLinkIndex", index);
    });

    // Apply styles to the clicked link based on the current page's URL
    if (isLinkCurrentPage(myLink)) {
      myLink.classList.add("clicked");
    }
  });







});

function hideIcon(self){
  self.style.backgroundImage='none';  
}


document.addEventListener("DOMContentLoaded", function() {
const nextBtn = document.getElementById('nextBtn');
const modalArrow = document.querySelector('.modal-arrow');
const pages = [
  document.getElementById('page1'),
  document.getElementById('page2'),
  document.getElementById('page3'),
  document.getElementById('page4'),
  document.getElementById('page5'),
  document.getElementById('page6')
];
let currentPageIndex = 0;

nextBtn.addEventListener('click', function() {
  if (currentPageIndex < pages.length - 1) {
    pages[currentPageIndex].style.display = 'none';
    currentPageIndex++;
    pages[currentPageIndex].style.display = 'block';
  }
});

modalArrow.addEventListener('click', function() {
  if (currentPageIndex > 0) {
    pages[currentPageIndex].style.display = 'none';
    currentPageIndex--;
    pages[currentPageIndex].style.display = 'block';
  }
});
});

document.addEventListener("DOMContentLoaded", function() {
  //  Get all the input fields
  const usernameInput = document.getElementById('usernameInput');
  const phoneInput = document.getElementById('phoneInput');
  const whatsappInput = document.getElementById('whatsappInput');
  const profileInput = document.getElementById('profileInput');

  // Get all the edit buttons
  const editUsernameBtn = document.getElementById('editUsernameBtn');
  const editPhoneBtn = document.getElementById('editPhoneBtn');
  const editWhatsappBtn = document.getElementById('editWhatsappBtn');
  const editProfileBtn = document.getElementById('editProfileBtn');

  // Get the save button
  const saveBtn = document.getElementById('saveBtn');

  // Function to toggle readonly attribute
  function toggleReadOnly(input) {
    input.readOnly = !input.readOnly;
  }

  // Add click event listeners to edit buttons
  editUsernameBtn.addEventListener('click', () => {
    toggleReadOnly(usernameInput);
  });

  editPhoneBtn.addEventListener('click', () => {
    toggleReadOnly(phoneInput);
  });

  editWhatsappBtn.addEventListener('click', () => {
    toggleReadOnly(whatsappInput);
  });
   editProfileBtn.addEventListener('click', () => {
    toggleReadOnly(profileInput);
  });

  // Add click event listener to save button
  saveBtn.addEventListener('click', () => {
    // Toggle readonly for all input fields
    toggleReadOnly(usernameInput);
    toggleReadOnly(phoneInput);
    toggleReadOnly(whatsappInput);
    toggleReadOnly(profileInput);
  });
});

document.addEventListener("DOMContentLoaded", function() {
// Get the input element and the default image
const imgInp = document.getElementById('actual-btn-desktop');
const defaultImage = document.getElementById('preview-image');

// Add onchange event listener
imgInp.addEventListener('change', function(evt) {
    const [file] = imgInp.files;
    if (file) {
        // Create a new image element
        const newImage = new Image();
        newImage.onload = function() {
            // Set the src of the default image to the selected image
            defaultImage.src = newImage.src;
            // Apply the CSS style to the new image
            defaultImage.style.width = '200px';
            defaultImage.style.height = '200px';
        };
        newImage.src = URL.createObjectURL(file);
    }
})
});

function selectPlan(plan) {
  const monthRadio = document.getElementById('flexRadioDefault1');
  const yearRadio = document.getElementById('flexRadioDefault2');
  const monthDiv = document.querySelector('.month');
  const yearDiv = document.querySelector('.year');

  if (plan === 'month') {
    monthRadio.checked = true;
    monthDiv.classList.add('selected');
    yearDiv.classList.remove('selected');
  } else if (plan === 'year') {
    yearRadio.checked = true;
    yearDiv.classList.add('selected');
    monthDiv.classList.remove('selected');
  }
}
function previewImage(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          var img = document.getElementById('previewImg1');
          img.src = e.target.result;
          img.style.width = '80px'; // Set the width
          img.style.height = '80px'; // Set the height
          img.style.borderRadius = '50%'; // Set the border radius
      };

      reader.readAsDataURL(input.files[0]);
  }
}
