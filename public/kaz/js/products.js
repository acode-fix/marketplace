
// document.addEventListener('DOMContentLoaded', function() {
//   // Get all dropbtns
//   var dropbtns = document.querySelectorAll('.dropbtn');

//   // Loop through each dropbtn
//   dropbtns.forEach(function(dropbtn) {
//       dropbtn.addEventListener('click', function(event) {
//           event.stopPropagation(); // Prevents the window click event from firing immediately
//           // Close all dropdowns
//           closeAllDropdowns();

//           // Get the dropdown-content associated with this dropbtn
//           var dropdownContent = this.parentElement.nextElementSibling;

//           // Toggle the 'show' class
//           dropdownContent.classList.toggle('show');
//       });
//   });

//   // Close dropdown when clicking outside of it
//   window.addEventListener('click', function(event) {
//       closeAllDropdowns();
//   });

//   // Close all dropdowns
//   function closeAllDropdowns() {
//       document.querySelectorAll('.dropdown-content').forEach(function(dropdownContent) {
//           dropdownContent.classList.remove('show');
//       });
//   }
// });