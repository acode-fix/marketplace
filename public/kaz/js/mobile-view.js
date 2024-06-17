  
document.addEventListener("DOMContentLoaded", function() {
  var mobileLinks = document.querySelectorAll(".mobile-link-btn");

  // Function to set the clicked link as active
  function setActiveLink(linkIndex) {
    mobileLinks.forEach(function(link, index) {
      var anchor = link.querySelector("a");
      if (index === linkIndex) {
        link.classList.add("clicked");
        anchor.classList.add("clicked");
      } else {
        link.classList.remove("clicked");
        anchor.classList.remove("clicked");
      }
    });
  }

  // Function to retrieve the index of the clicked link from local storage
  function getClickedLinkIndex() {
    return parseInt(localStorage.getItem("clickedLinkIndex"));
  }

  // Function to determine if a link matches the current page's URL
  function isLinkCurrentPage(link) {
    var linkHref = link.querySelector("a").getAttribute("href");
    var currentPageURL = window.location.pathname;
    return linkHref === currentPageURL;
  }

  // Get the index of the clicked link from local storage
  var clickedLinkIndex = getClickedLinkIndex();

  // Set the active link based on the stored index
  if (!isNaN(clickedLinkIndex)) {
    setActiveLink(clickedLinkIndex);
  }

  mobileLinks.forEach(function(mobileLink, index) {
    mobileLink.addEventListener("click", function(event) {
      // Store the clicked link index in local storage
      localStorage.setItem("clickedLinkIndex", index);
      setActiveLink(index);
    });

    // Apply styles to the clicked link based on the current page's URL
    if (isLinkCurrentPage(mobileLink)) {
      mobileLink.classList.add("clicked");
      mobileLink.querySelector("a").classList.add("clicked");
    }
  });
});

document.addEventListener("DOMContentLoaded", function() {
  //  Get all the input fields
  const usernameInput = document.getElementById('usernameInput1');
  const phoneInput = document.getElementById('phoneInput1');
  const whatsappInput = document.getElementById('whatsappInput1');

  // Get all the edit buttons
  const editUsernameBtn = document.getElementById('editUsernameBtn1');
  const editPhoneBtn = document.getElementById('editPhoneBtn1');
  const editWhatsappBtn = document.getElementById('editWhatsappBtn1');

  // Get the save button
  const saveBtn = document.getElementById('saveBtn1');

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

  // Add click event listener to save button
  saveBtn.addEventListener('click', () => {
    // Toggle readonly for all input fields
    toggleReadOnly(usernameInput);
    toggleReadOnly(phoneInput);
    toggleReadOnly(whatsappInput);
  });
})
