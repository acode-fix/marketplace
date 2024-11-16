function showText() {
  document.getElementById('hover-text').style.display = 'block';
}

function hideText() {
  document.getElementById('hover-text').style.display = 'none';
}
function showText3() {
  document.getElementById('hover-text3').style.display = 'block';
}

function hideText3() {
  document.getElementById('hover-text3').style.display = 'none';
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


function hideIcon(self){
  self.style.backgroundImage='none';
}

/*
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

  if(nextBtn) {

    nextBtn.addEventListener('click', function() {
      if (currentPageIndex < pages.length - 1) {
        pages[currentPageIndex].style.display = 'none';
        currentPageIndex++;
        pages[currentPageIndex].style.display = 'block';
        if (currentPageIndex === pages.length - 1) {
          nextBtn.style.display = 'none'; // Hide the next button on the last page
        }
      }
    });

    if (modalArrow) {

      modalArrow.addEventListener('click', function() {
        if (currentPageIndex > 0) {
          pages[currentPageIndex].style.display = 'none';
          currentPageIndex--;
          pages[currentPageIndex].style.display = 'block';
          if (nextBtn.style.display === 'none') {
            nextBtn.style.display = 'block'; // Show the next button when navigating back from the last page
          }
        }
      });


    }
  


  }

 
 
});
*/



document.addEventListener("DOMContentLoaded", function() {
  //  Get all the input fields
  const usernameInput = document.getElementById('usernameInput');
  const phoneInput = document.getElementById('phoneInput');
  // const whatsappInput = document.getElementById('whatsappInput');
  const profileInput = document.getElementById('profileInput');


  // Get all the edit buttons
  const editUsernameBtn = document.getElementById('editUsernameBtn');
  const editPhoneBtn = document.getElementById('editPhoneBtn');
  // const editWhatsappBtn = document.getElementById('editWhatsappBtn');
  const editProfileBtn = document.getElementById('editProfileBtn');

  // Get the save button
  const saveBtn = document.getElementById('saveBtn');

  // Function to toggle readonly attribute
  function toggleReadOnly(input) {

   // console.log(input)
    input.readOnly = !input.readOnly;
  }


  if (editUsernameBtn && editPhoneBtn && editProfileBtn && saveBtn) {

 
  // Add click event listeners to edit buttons
  editUsernameBtn.addEventListener('click', () => {
    toggleReadOnly(usernameInput);
  });

  editPhoneBtn.addEventListener('click', () => {
    toggleReadOnly(phoneInput);
  });

  // editWhatsappBtn.addEventListener('click', () => {
  //   toggleReadOnly(whatsappInput);
  // });
   editProfileBtn.addEventListener('click', () => {
    toggleReadOnly(profileInput);
  });

  // Add click event listener to save button
  saveBtn.addEventListener('click', () => {
    // Toggle readonly for all input fields
    toggleReadOnly(usernameInput);
    toggleReadOnly(phoneInput);
    // toggleReadOnly(whatsappInput);
    toggleReadOnly(profileInput);
  });
}
});

document.addEventListener("DOMContentLoaded", function() {
  //  Get all the input fields
  const usernameInput = document.getElementById('usernameInput1');
  const profileInput = document.getElementById('profileInput1');
  const phoneInput = document.getElementById('phoneInput1');

  // Get all the edit buttons
  const editUsernameBtn = document.getElementById('editUsernameBtn1');
  const editProfileBtn = document.getElementById('editProfileBtn1');
  const editPhoneBtn = document.getElementById('editPhoneBtn1');

  // Get the save button
  const saveBtn = document.getElementById('saveBtn1');

  // Function to toggle readonly attribute
  function toggleReadOnly(input) {
    if(input) {
      input.readOnly = !input.readOnly;
    }
    
  }
 if (usernameInput && profileInput && phoneInput && saveBtn) {

    // Add click event listeners to edit buttons
    editUsernameBtn.addEventListener('click', () => {
      toggleReadOnly(usernameInput);
    });
  
    editProfileBtn.addEventListener('click', () => {
      toggleReadOnly(profileInput);
    });
  
    editPhoneBtn.addEventListener('click', () => {
      toggleReadOnly(phoneInput);
    });
  




  // Add click event listener to save button
  saveBtn.addEventListener('click', () => {
    // Toggle readonly for all input fields
    toggleReadOnly(usernameInput);
    toggleReadOnly(phoneInput);
    toggleReadOnly(profileInput);
  })
};
});


document.addEventListener("DOMContentLoaded", function() {
// Get the input element and the default image
const imgInp = document.getElementById('actual-btn-desktop');
const defaultImage = document.getElementById('preview-image');

if (imgInp) {

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
})}
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

function previewImage(input, previewImgId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var img = document.getElementById(previewImgId);
            img.src = e.target.result;
            img.style.width = '80px'; // Set the width
            img.style.height = '80px'; // Set the height
            img.style.borderRadius = '50%'; // Set the border radius
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function previewImageMobile(input, previewImgId) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          var img = document.getElementById(previewImgId);
          img.src = e.target.result;
          img.style.width = '50px'; // Set the width
          img.style.height = '50px'; // Set the height
          img.style.borderRadius = '100%'; // Set the border radius
      };

      reader.readAsDataURL(input.files[0]);
  }
}

