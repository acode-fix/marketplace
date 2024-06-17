  
// document.addEventListener("DOMContentLoaded", function() {
//   var mobileLinks = document.querySelectorAll(".mobile-link-btn");

//   // Function to set the clicked link as active
//   function setActiveLink(linkIndex) {
//     mobileLinks.forEach(function(link, index) {
//       var anchor = link.querySelector("a");
//       if (index === linkIndex) {
//         link.classList.add("clicked");
//         anchor.classList.add("clicked");
//       } else {
//         link.classList.remove("clicked");
//         anchor.classList.remove("clicked");
//       }
//     });
//   }

//   // Function to retrieve the index of the clicked link from local storage
//   function getClickedLinkIndex() {
//     return parseInt(localStorage.getItem("clickedLinkIndex"));
//   }

//   // Function to determine if a link matches the current page's URL
//   function isLinkCurrentPage(link) {
//     var linkHref = link.querySelector("a").getAttribute("href");
//     var currentPageURL = window.location.pathname;
//     return linkHref === currentPageURL;
//   }

//   // Get the index of the clicked link from local storage
//   var clickedLinkIndex = getClickedLinkIndex();

//   // Set the active link based on the stored index
//   if (!isNaN(clickedLinkIndex)) {
//     setActiveLink(clickedLinkIndex);
//   }

//   mobileLinks.forEach(function(mobileLink, index) {
//     mobileLink.addEventListener("click", function(event) {
//       // Store the clicked link index in local storage
//       localStorage.setItem("clickedLinkIndex", index);
//       setActiveLink(index);
//     });

//     // Apply styles to the clicked link based on the current page's URL
//     if (isLinkCurrentPage(mobileLink)) {
//       mobileLink.classList.add("clicked");
//       mobileLink.querySelector("a").classList.add("clicked");
//     }
//   });
// });
document.addEventListener("DOMContentLoaded", function() {
  var mobileLinks = document.querySelectorAll(".mobile-link-btn");

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

  function getClickedLinkIndex() {
    return parseInt(localStorage.getItem("clickedLinkIndex"));
  }

  function isLinkCurrentPage(link) {
    var linkHref = link.querySelector("a").getAttribute("href");
    var currentPageURL = window.location.pathname;
    return linkHref === currentPageURL;
  }

  var clickedLinkIndex = getClickedLinkIndex();

  if (!isNaN(clickedLinkIndex)) {
    setActiveLink(clickedLinkIndex);
  }

  mobileLinks.forEach(function(mobileLink, index) {
    mobileLink.addEventListener("click", function(event) {
      localStorage.setItem("clickedLinkIndex", index);
      setActiveLink(index);
    });

    if (isLinkCurrentPage(mobileLink)) {
      setActiveLink(index);
    }
  });
});
