function uploadBannerImage() {
  // Create an input element of type 'file'
  var input = document.createElement('input');
  input.type = 'file';

  // Create a form element
  var form = document.createElement('form');
  form.style.display = 'none'; // Hide the form
  form.id = 'banner-image-form'; // Set form id
  form.action = 'your_upload_url'; // Set form action

  // Append the input element to the form
  form.appendChild(input);
  document.body.appendChild(form);

  // Trigger a click event on the input element
  input.click();

  // When a file is selected, update the product image and submit the form
  input.onchange = function() {
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      // Set the src attribute of the product image to the uploaded image
      document.getElementById('banner').src = e.target.result;

      // Submit the form
      document.getElementById('banner-image-form').submit();
    }

    reader.readAsDataURL(file);
  };
}

function uploadProfileImage() {
  // Create an input element of type 'file'
  var input = document.createElement('input');
  input.type = 'file';

  // Create a form element
  var form = document.createElement('form');
  form.style.display = 'none'; // Hide the form
  form.id = 'profile-image-form'; // Set form id
  form.action = 'your_upload_url2'; // Set form action for the second form

  // Append the input element to the form
  form.appendChild(input);
  document.body.appendChild(form);

  // Trigger a click event on the input element
  input.click();

  // When a file is selected, update the product image and submit the form
  input.onchange = function() {
      var file = input.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
          // Set the src attribute of the product image to the uploaded image
          document.getElementById('images-dp').src = e.target.result;

          // Submit the form
          document.getElementById('profile-image-form').submit();
      };

      reader.readAsDataURL(file);
  };
}
//mobile-view banner image
function uploadBannerImage2() {
  // Create an input element of type 'file'
  var input = document.createElement('input');
  input.type = 'file';

  // Create a form element
  var form = document.createElement('form');
  form.style.display = 'none'; // Hide the form
  form.id = 'banner-image-form2'; // Set form id
  form.action = 'your_upload_url'; // Set form action

  // Append the input element to the form
  form.appendChild(input);
  document.body.appendChild(form);

  // Trigger a click event on the input element
  input.click();

  // When a file is selected, update the product image and submit the form
  input.onchange = function() {
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
      // Set the src attribute of the product image to the uploaded image
      document.getElementById('banner2').src = e.target.result;

      // Submit the form
      document.getElementById('banner-image-form2').submit();
    }

    reader.readAsDataURL(file);
  };
}

//mobile-view profile image
function uploadProfileImage2() {
  // Create an input element of type 'file'
  var input = document.createElement('input');
  input.type = 'file';

  // Create a form element
  var form = document.createElement('form');
  form.style.display = 'none'; // Hide the form
  form.id = 'profile-image-form2'; // Set form id
  form.action = 'your_upload_url2'; // Set form action for the second form

  // Append the input element to the form
  form.appendChild(input);
  document.body.appendChild(form);

  // Trigger a click event on the input element
  input.click();

  // When a file is selected, update the product image and submit the form
  input.onchange = function() {
      var file = input.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
          // Set the src attribute of the product image to the uploaded image
          document.getElementById('images-dp2').src = e.target.result;

          // Submit the form
          document.getElementById('profile-image-form2').submit();
      };

      reader.readAsDataURL(file);
  };
}


  function showText() {
    document.getElementById('hover-text').style.display = 'block';
  }

  function hideText() {
    document.getElementById('hover-text').style.display = 'none';
  }
  function showText2() {
    document.getElementById('hover-text2').style.display = 'block';
  }

  function hideText2() {
    document.getElementById('hover-text2').style.display = 'none';
  }


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
  const pages = [
    document.getElementById('page3'),
    document.getElementById('page4'),
    document.getElementById('page5')
  ];

  const modalElement = document.getElementById('exampleModal2');

  modalElement.addEventListener('show.bs.modal', function() {
    pages.forEach(page => {
      page.style.display = 'none';
    });
    pages[0].style.display = 'block'; // Show page3 when the modal is shown
  });

  const shareButton = document.querySelector('#page3 .modal-edit1');
  const deleteButton = document.querySelector('#page3 #deleteButton');

  if (shareButton) {
    shareButton.addEventListener('click', function() {
      pages[0].style.display = 'none'; // Hide page3
      pages[1].style.display = 'block'; // Show page4 when Share button is clicked
    });
  }

  if (deleteButton) {
    deleteButton.addEventListener('click', function() {
      pages[0].style.display = 'none'; // Hide page3
      pages[2].style.display = 'block'; // Show page5 when Delete button is clicked
    });
  }
});



document.addEventListener('DOMContentLoaded', function() {
  // Get all dropbtns
  var dropbtns = document.querySelectorAll('.dropbtn2');

  // Loop through each dropbtn
  dropbtns.forEach(function(dropbtn) {
      dropbtn.addEventListener('click', function(event) {
          event.stopPropagation(); // Prevents the window click event from firing immediately
          // Close all dropdowns
          closeAllDropdowns();

          // Get the dropdown-content associated with this dropbtn
          var dropdownContent = this.parentElement.nextElementSibling;

          // Toggle the 'show' class
          dropdownContent.classList.toggle('show');
      });
  });

  // Close dropdown when clicking outside of it
  window.addEventListener('click', function(event) {
      closeAllDropdowns();
  });

  // Close all dropdowns
  function closeAllDropdowns() {
      document.querySelectorAll('.dropdown-content').forEach(function(dropdownContent) {
          dropdownContent.classList.remove('show');
      });
  }
});








