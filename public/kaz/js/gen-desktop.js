
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
 
//  document.addEventListener("DOMContentLoaded", function() {
//   var myLinks = document.querySelectorAll(".myLink");

//   // Function to set the clicked link as active
//   function setActiveLink(linkIndex) {
//     myLinks.forEach(function(link, index) {
//       if (index === linkIndex) {
//         link.classList.add("clicked");
//       } else {
//         link.classList.remove("clicked");
//       }
//     });
//   }

//   // Function to retrieve the index of the clicked link from local storage
//   function getClickedLinkIndex() {
//     return parseInt(localStorage.getItem("clickedLinkIndex"));
//   }

//   // Function to determine if a link matches the current page's URL
//   function isLinkCurrentPage(link) {
//     var linkHref = link.getAttribute("href");
//     var currentPageURL = window.location.pathname;
//     return linkHref === currentPageURL;
//   }

//   // Get the index of the clicked link from local storage
//   var clickedLinkIndex = getClickedLinkIndex();

//   // Set the active link based on the stored index
//   if (!isNaN(clickedLinkIndex)) {
//     setActiveLink(clickedLinkIndex);
//   }

//   myLinks.forEach(function(myLink, index) {
//     myLink.addEventListener("click", function(event) {
//       // Store the clicked link index in local storage
//       localStorage.setItem("clickedLinkIndex", index);
//     });

//     // Apply styles to the clicked link based on the current page's URL
//     if (isLinkCurrentPage(myLink)) {
//       myLink.classList.add("clicked");
//     }
//   });

//   // Check if the user is on the delete page
//   var currentPageURL = window.location.pathname;
//   if (currentPageURL === "/delete.html") {
//     // If on the delete page, change the color of the delete button's text to red
//     var deleteButton = document.getElementById("delete-link");
//     deleteButton.style.color = "red";
//   }
// });
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
    // Apply styles to the clicked link based on the current page's URL
    if (isLinkCurrentPage(myLink)) {
      myLink.classList.add("clicked");
    }

    myLink.addEventListener("click", function(event) {
      // Store the clicked link index in local storage
      localStorage.setItem("clickedLinkIndex", index);
    });
  });

  // Check if the user is on the delete page
  var currentPageURL = window.location.pathname;
  if (currentPageURL === "/delete.html") {
    // If on the delete page, change the color of the delete button's text to red
    var deleteButton = document.getElementById("delete-link");
    deleteButton.style.color = "red";
  }
});



