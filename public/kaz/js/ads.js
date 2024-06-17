
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
 

// Function to toggle the dropdown
function myFunction() {
  var dropdownContent = document.getElementById("myDropdown");
  dropdownContent.classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

// Document Ready Function
document.addEventListener("DOMContentLoaded", function() {
  // Select buttons and rows based on your HTML structure
  const inReviewBtn = document.getElementById("in-review-btn");
  const onGoingBtn = document.getElementById("on-going-btn");
  const expiredBtn = document.getElementById("expired-btn");

  const inReviewRows = document.querySelectorAll(".in-review");
  const onGoingRows = document.querySelectorAll(".on-going");
  const expiredRows = document.querySelectorAll(".expired");

  // Function to show all rows
  function showAllRows() {
    inReviewRows.forEach(row => row.style.display = "table-row");
    onGoingRows.forEach(row => row.style.display = "table-row");
    expiredRows.forEach(row => row.style.display = "table-row");
  }

  // Initially show all rows
  showAllRows();
  function toggleDropdown() {
    var dropdownContent = document.getElementById("myDropdown");
    dropdownContent.classList.toggle("show");
  }

  // Function to hide all rows
  function hideAllRows() {
    inReviewRows.forEach(row => row.style.display = "none");
    onGoingRows.forEach(row => row.style.display = "none");
    expiredRows.forEach(row => row.style.display = "none");
  }

  // Event listeners for buttons
  inReviewBtn.addEventListener("click", function() {
    hideAllRows();
    inReviewRows.forEach(row => row.style.display = "table-row");
    document.getElementById("Newest-main").textContent = "In-Review"; // Update button text
    toggleDropdown(); 
  });

  onGoingBtn.addEventListener("click", function() {
    hideAllRows();
    onGoingRows.forEach(row => row.style.display = "table-row");
    document.getElementById("Newest-main").textContent = "On-Going"; // Update button text
    toggleDropdown(); 
  });

  expiredBtn.addEventListener("click", function() {
    hideAllRows();
    expiredRows.forEach(row => row.style.display = "table-row");
    document.getElementById("Newest-main").textContent = "Expired"; // Update button text
    toggleDropdown(); 
  });
});












// Function to toggle dropdown
function toggleDropdown() {
  var dropdownContent = document.getElementById("myDropdown2");
  dropdownContent.classList.toggle("custom-show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.custom-btn')) {
    var dropdowns = document.getElementsByClassName("custom-dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('custom-show')) {
        openDropdown.classList.remove('custom-show');
      }
    }
  }
}

// Document Ready Function
document.addEventListener("DOMContentLoaded", function() {
  // Select buttons and rows based on your HTML structure
  const inReviewBtnMobile = document.getElementById("in-review-btn-mobile");
  const onGoingBtnMobile = document.getElementById("on-going-btn-mobile");
  const expiredBtnMobile = document.getElementById("expired-btn-mobile");

  const inReviewRows = document.querySelectorAll(".in-review-mobile");
  const onGoingRows = document.querySelectorAll(".On-going-mobile");
  const expiredRows = document.querySelectorAll(".expired");

  // Function to show all rows
  function showAllRows() {
    inReviewRows.forEach(row => row.style.display = "table-row");
    onGoingRows.forEach(row => row.style.display = "table-row");
    expiredRows.forEach(row => row.style.display = "table-row");
  }

  // Initially show all rows
  showAllRows();

  // Function to hide all rows
  function hideAllRows() {
    inReviewRows.forEach(row => row.style.display = "none");
    onGoingRows.forEach(row => row.style.display = "none");
    expiredRows.forEach(row => row.style.display = "none");
  }

  // Event listeners for buttons
  inReviewBtnMobile.addEventListener("click", function() {
    hideAllRows();
    inReviewRows.forEach(row => row.style.display = "table-row");
    document.getElementById("Newest").textContent = "In-Review"; // Update button text
  });

  onGoingBtnMobile.addEventListener("click", function() {
    hideAllRows();
    onGoingRows.forEach(row => row.style.display = "table-row");
    document.getElementById("Newest").textContent = "On-Going"; // Update button text
  });

  expiredBtnMobile.addEventListener("click", function() {
    hideAllRows();
    expiredRows.forEach(row => row.style.display = "table-row");
    document.getElementById("Newest").textContent = "Expired"; // Update button text
  });
});
