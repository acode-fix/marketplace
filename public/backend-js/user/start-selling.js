function descValidation() {
  const desc = document.querySelector('.js-desc').value;
  const descText = desc.trim();

  let isvalid = false;

  if(descText.length > 500){

    document.querySelector('.error').textContent = '* Product Description Must Not Exceed 500 Words !! *'

    isvalid = true;
  }

  return isvalid;
}



document.addEventListener('DOMContentLoaded', function() {
const priceSwitch = document.getElementById('priceSwitch');
const priceFields = document.getElementById('priceFields');
let selectedFiles = []; // Store all selected files

// Hide price fields initially if the switch is checked
if (priceSwitch.checked) {
   priceFields.style.display = 'none';
}

// Toggle price fields visibility based on the switch state
priceSwitch.addEventListener('change', function() {
   if (priceSwitch.checked) {
       priceFields.style.display = 'none';
   } else {
       priceFields.style.display = 'block';
   }
});

document.getElementById('fileInput').addEventListener('change', function() {
   // Append the newly selected files to the existing list
   Array.from(this.files).forEach(file => {
       selectedFiles.push(file);  // Add the file to the selectedFiles array
   });

  // console.log('Currently selected files:', selectedFiles.map(f => f.name));

   // Reset the file input field to allow new selections
   this.value = '';  // Reset after each change so the same file can be selected again
});

document.getElementById('productForm').addEventListener('submit', function(event) {
   event.preventDefault();

  const loader =  document.getElementById('btn-loader');
  const startBtn = document.querySelector('.start-selling-btn');
  const uploadText = document.querySelector('.js-upload-text');
  const loadingText = document.getElementById('loading-text');

  startBtn.disabled = true;
  uploadText.style.display = 'none';
  loader.style.display = 'block';
  loadingText.style.display = 'block';

   if(descValidation()) {
    uploadText.style.display = 'block';
    loader.style.display = 'none';
    loadingText.style.display = 'none';
    startBtn.disabled = false;

       return;
   }

   let formData = new FormData(this);

   // Add ask_for_price to formData based on the switch state
   formData.append('ask_for_price', priceSwitch.checked ? 1 : 0);

   // Conditionally remove actual_price and promo_price if the switch is on
   if (priceSwitch.checked) {
       formData.delete('actual_price');
       formData.delete('promo_price');
   }

   const imageArray = [];

   // Loop through the accumulated selected files and append them to formData
   selectedFiles.forEach((file, index) => {
       formData.append('image_url[]', file); // Append each file to formData
       imageArray.push(file.name); // Store file names in the array
       //console.log(`Appending file ${index}: ${file.name}`); // Log each file name
   });

   // Append the JSON string of image URLs to the formData
   formData.append('image_url_json', JSON.stringify(imageArray));

  // console.log(imageArray);

   // Debug formData content
   for (let pair of formData.entries()) {
       if (pair[1] instanceof File) {
        //  console.log(`${pair[0]}: File Name - ${pair[1].name}, Size - ${pair[1].size} bytes, Type - ${pair[1].type}`);
       } else {
          // console.log(`${pair[0]}: ${pair[1]}`);
       }
   }

   const token = localStorage.getItem('apiToken');
  


   axios.post('/api/v1/product', formData, {
       headers: {
           'Content-Type': 'multipart/form-data',
           'Authorization': `Bearer ${token}`
       }
   })
   .then(function(response) { 
    
    uploadText.style.display = 'block';
    loader.style.display = 'none';
    startBtn.disabled = false;
    loadingText.style.display = 'none';

       if (response.data.status) {

           const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
           modal.show();

           // Redirect to the index page after a short delay
           setTimeout(function() {
               window.location.href = '/';
           }, 5000);
       } 
   })
   .catch(function(error) {

      uploadText.style.display = 'block';
      loader.style.display = 'none';
      loadingText.style.display = 'none';
      startBtn.disabled = false;
      
       if(error.response) {

           if(error.response.status === 401 && error.response.data) {
                  
               const responseErrors = error.response.data.errors;
           

               let allErrors = []

               for(let field in responseErrors) {

                const fieldError = responseErrors[field];

                fieldError.forEach((message) => {
                   allErrors.push(message);

                })
               }

         const errorMsg = allErrors.join('\n');

         Swal.fire({ 
           icon: 'error',
           confirmButtonColor: '#ffb705',
           title: 'Validation Error',
           text:  errorMsg ,
       });

       
           }


           if(error.response.status === 404 && error.response.data) {
            console.log(error);

                    Swal.fire({ 
                        icon: 'error',
                        confirmButtonColor: '#ffb705',
                        title: 'Bio Validation Error',
                        text:  error.response.data.message,
                        willClose:() => {
                            window.location.href = '/settings';

                        }
                    });
     

           }
       }

   });
});
});
