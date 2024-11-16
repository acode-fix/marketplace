//product condition
// function toggleButton(button) {
//     if (button.classList.contains('new')) {
//         document.querySelector('.new').classList.remove('clicked');
//         document.querySelector('.used').classList.remove('clicked');
//         button.classList.add('clicked');
//     } else if (button.classList.contains('used')) {
//         document.querySelector('.new').classList.remove('clicked');
//         document.querySelector('.used').classList.remove('clicked');
//         button.classList.add('clicked');
//     }

//     // document.getElementById('toggle-button').value = condition;
//   }
function toggleButton(button, condition) {
    // Remove 'clicked' class from both buttons
    document.querySelector('.new').classList.remove('clicked');
    document.querySelector('.used').classList.remove('clicked');

    // Add 'clicked' class to the clicked button
    button.classList.add('clicked');

    // Set the value of the hidden input field 'toggle-button' with the selected condition
    document.getElementById('toggle-button').value = condition;
}

  const leftArrow = document.getElementById('leftArrow');
  const rightArrow = document.getElementById('rightArrow');
  const imageGallery = document.getElementById('imageGallery');

  leftArrow.style.display = 'none'; // Initially hide left arrow

  imageGallery.addEventListener('scroll', () => {
      if (imageGallery.scrollLeft <= 0) {
          leftArrow.style.display = 'none'; // Hide left arrow when at left extreme
      } else {
          leftArrow.style.display = 'block'; // Show left arrow when not at left extreme
      }

      if (imageGallery.scrollLeft + imageGallery.clientWidth >= imageGallery.scrollWidth) {
          rightArrow.style.display = 'none'; // Hide right arrow when at right extreme
      } else {
          rightArrow.style.display = 'block'; // Show right arrow when not at right extreme
      }
  });

  leftArrow.addEventListener('click', () => {
      imageGallery.scrollLeft -= 900;
  });

  rightArrow.addEventListener('click', () => {
      imageGallery.scrollLeft += 900;
  });


const priceSwitch = document.getElementById('priceSwitch');
const PricesInput = document.getElementById('priceFields');


priceSwitch.addEventListener('change', function() {
    if (this.checked) {
        PricesInput.classList.add('hidden');

    } else {
        PricesInput.classList.remove('hidden');

    }
});

let selectedCategory = null;

function selectCategory(element, categoryName) {
    if (selectedCategory) {
        selectedCategory.classList.remove('selected');
        selectedCategory.querySelector('.checked-icon').style.display = 'none';
    }
    selectedCategory = element;
    selectedCategory.classList.add('selected');
    selectedCategory.querySelector('.checked-icon').style.display = 'block';
    document.getElementById('selected-category').value = categoryName;
    document.getElementById('tooltip').style.display = 'none';
}

document.getElementById('product-name').addEventListener('focus', function() {
    if (!selectedCategory) {
        document.getElementById('tooltip').style.display = 'block';
    }
});



// var selectedImages = 0;

// document.getElementById('imageContainer').addEventListener('click', function() {
//     document.getElementById('fileInput').click();
// });

// document.getElementById('fileInput').addEventListener('change', function() {

//     var file = this.files[0];
//     if (file) {

//         if (selectedImages < 3) {
//             if (file.type === 'image/jpeg' || file.type === 'image/png') {
//                 if (file.size <= 5242880) { // 5MB
//                     var reader = new FileReader();
//                     reader.onload = function(e) {
//                         var image = document.createElement('img');
//                         image.className = 'uploaded_image'; // Add unique class to the uploaded image
//                         image.onload = function() {
//                             if (image.naturalWidth > 100 || image.naturalHeight > 100) {
//                                 var aspectRatio = image.naturalWidth / image.naturalHeight;
//                                 if (image.naturalWidth > image.naturalHeight) {
//                                     image.width = 100;
//                                     image.height = 100 / aspectRatio;
//                                 } else {
//                                     image.height = 100;
//                                     image.width = 100 * aspectRatio;
//                                 }
//                             }
//                         };
//                         image.src = e.target.result;
//                         var frame = document.querySelector('.frame img') ?
//                             document.querySelector('.frame2 img') ?
//                                 document.querySelector('.frame3 img') ? null : document.querySelector('.frame3') : document.querySelector('.frame2') : document.querySelector('.frame');
//                         if (frame) {
//                             frame.innerHTML = '';
//                             frame.appendChild(image);
//                             frame.style.display = 'flex';

//                             var closeButton = document.createElement('span');
//                             closeButton.innerHTML = '×';
//                             closeButton.className = 'close_button';
//                             closeButton.addEventListener('click', function() {
//                                 frame.innerHTML = '';
//                                 frame.style.display = 'none';
//                                 selectedImages--;
//                                 if (selectedImages === 0) {
//                                     document.querySelector('.frame_container').style.display = 'none';
//                                     document.querySelector('.upload_preview').style.display = 'none';
//                                     document.querySelector('.thumbnail').style.display = 'none';
//                                 }
//                             });
//                             frame.appendChild(closeButton);
//                             selectedImages++;
//                         }
//                     };
//                     reader.readAsDataURL(file);
//                     document.querySelector('.frame_container').style.display = 'flex';
//                     document.querySelector('.upload_preview').style.display = 'block';
//                     document.querySelector('.thumbnail').style.display = 'block';
//                 } else {
//                  //Size must be less than 5MB
//                 var myModal = new bootstrap.Modal(document.getElementById('product_upload_condition1'));
//                 myModal.show();
//                 }
//             } else {
//                //Image must be PNG or JPG
//                 var myModal = new bootstrap.Modal(document.getElementById('product_upload_condition2'));
//                 myModal.show();
//             }
//         } else {
//            //You can only upload a maximum of three images
//             var myModal = new bootstrap.Modal(document.getElementById('product_upload_condition3'));
//             myModal.show();
//         }
//     }
// });


document.getElementById('imageContainer').addEventListener('click', function () {
    document.getElementById('fileInput').click();
});

document.getElementById('fileInput').addEventListener('change', function () {
    const files = Array.from(this.files);
    const maxImages = 3;
    const maxSize = 5242880; // 5MB
    const frameContainer = document.querySelector('.frame_container');
    const uploadPreview = document.querySelector('.upload_preview');
    const thumbnail = document.querySelector('.thumbnail');
    const frames = [document.querySelector('.frame'), document.querySelector('.frame2'), document.querySelector('.frame3')];

    // Clear all frames
    frames.forEach(frame => {
        frame.innerHTML = '';
        frame.style.display = 'none';
    });

    if (files.length > maxImages) {
        // Show modal for max image limit
        var myModal = new bootstrap.Modal(document.getElementById('product_upload_condition3'));
        myModal.show();
        return;
    }

    files.forEach((file, index) => {
        if (file.type === 'image/jpeg' || file.type === 'image/png') {
            if (file.size <= maxSize) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const image = document.createElement('img');
                    image.className = 'uploaded_image';
                    image.src = e.target.result;

                    // Determine the frame to place the image
                    const frame = frames[index];
                    if (frame) {
                        frame.innerHTML = '';
                        frame.appendChild(image);
                        frame.style.display = 'flex';

                        // Add delete button
                        const closeButton = document.createElement('span');
                        closeButton.innerHTML = '×';
                        closeButton.className = 'close_button';
                        closeButton.addEventListener('click', function () {
                            frame.innerHTML = '';
                            frame.style.display = 'none';
                        });
                        frame.appendChild(closeButton);

                        // Mark the first image as the thumbnail
                        if (index === 0) {
                            thumbnail.style.display = 'block';
                        }
                    }
                };
                reader.readAsDataURL(file);
            } else {
                // Image size exceeds 5MB
                var myModal = new bootstrap.Modal(document.getElementById('product_upload_condition1'));
                myModal.show();
            }
        } else {
            // Invalid file type
            var myModal = new bootstrap.Modal(document.getElementById('product_upload_condition2'));
            myModal.show();
        }
    });

    // Show preview areas if at least one image is selected
    if (files.length > 0) {
        frameContainer.style.display = 'flex';
        uploadPreview.style.display = 'block';
    }
});
    




const states = [
    'Abakaliki', 'Aba', 'Abeokuta', 'Abuja', 'Ado Ekiti', 'Akure', 'Asaba', 'Awka', 'Bauchi', 'Benin City',
    'Birnin Kebbi', 'Calabar', 'Damaturu', 'Delta', 'Dutse', 'Edo', 'Ekiti', 'Enugu', 'Gombe', 'Gusau', 'Ibadan',
    'Ikeja', 'Ilorin', 'Imo', 'Jalingo', 'Jos', 'Kaduna', 'Kano', 'Katsina', 'Lafia', 'Lagos', 'Lokoja', 'Maiduguri',
    'Makurdi', 'Minna', 'Ogun', 'Owerri', 'Owere', 'Port Harcourt', 'Sokoto', 'Umuahia', 'Uyo', 'Yenagoa', 'Yola', 'Zaria'
  ];



// location for mobile view serch page
function filterStates3(value) {
    const filteredStates = states.filter(state => state.toLowerCase().startsWith(value.toLowerCase()));
    const stateSelection = document.getElementById('stateSelection3');
    stateSelection.innerHTML = '';
    if (filteredStates.length > 0) {
      filteredStates.forEach(state => {
        const p = document.createElement('p');
        p.textContent = state;
        p.setAttribute('data-bs-dismiss', 'modal');
        p.setAttribute('aria-label', 'Close');
        p.addEventListener('click', () => changeLocation3(state));
        stateSelection.appendChild(p);
      });
    } else {
      const p = document.createElement('p');
      p.textContent = 'State not found';
      stateSelection.appendChild(p);
    }
  }

  function changeLocation3(location) {
    document.getElementById('clickMe3').textContent = location;
    document.querySelector(".locationInput3").value = location;
  }


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("scrollToTop").style.display = "block";
  } else {
    document.getElementById("scrollToTop").style.display = "none";
  }
}

document.getElementById("scrollToTop").addEventListener("click", function() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});