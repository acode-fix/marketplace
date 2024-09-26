document.addEventListener('DOMContentLoaded', function() {
  function handleFormSubmit(event, formId) {
      event.preventDefault();

      const form = document.getElementById(formId);
      let formData = new FormData(form);

      for (let pair of formData.entries()) {
          console.log(pair[0] + ': ' + pair[1]);
      }

      const token = localStorage.getItem('apiToken');

    
      const locationSwitch = form.querySelector('input[name="location"]');

      if (locationSwitch && locationSwitch.checked) {
          navigator.geolocation.getCurrentPosition(function(position) {
              formData.append('latitude', position.coords.latitude);
              formData.append('longitude', position.coords.longitude);
              sendUpdateRequest(formData, token);
          }, function(error) {
              console.error('Error getting location:', error);
              Swal.fire({
                  icon: 'error',
                  title: 'An error occurred',
                  text: 'Could not get your location. Please try again.'
              });
          });
      } else {
          sendUpdateRequest(formData, token);
      }
  }

  function sendUpdateRequest(formData, token) {
      axios.post(`/api/auth/update`, formData, {
          headers: {
              'Content-Type': 'multipart/form-data',
              'Authorization': 'Bearer ' + token
          }
      })
      .then(function(response) {
         // console.log(response.data);

          if (response.data.status) {
              Swal.fire({
                  icon: 'success',
                  title: 'Success!',
                  text: 'Your profile has been updated.',
                  showConfirmButton: false,
                  timer: 4000
              }).then(() => {
                  window.location.href = '/settings';
              });
          } else {
              Swal.fire({
                  icon: 'error',
                  title: 'Failed to update profile',
                  text: response.data.message
              });
          }
      })
      .catch(function(error) {
        
          if(error.response) {

            if(error.response.status === 422 && error.response.data) {
                
              const responseErrors = error.response.data.errors;
             const allErrors = [];

              for (let field in responseErrors) {

              const fieldErrors  = responseErrors[field];

              fieldErrors.forEach( message => {
                allErrors.push(message);
              });

             
              }

              const errorMsg = allErrors.join('\n')

              displaySwal(errorMsg)
              
            }
          }
      });
  }

  document.getElementById('settingForm').addEventListener('submit', function(event) {
      handleFormSubmit(event, 'settingForm');
  });

  document.getElementById('settingFormMobile').addEventListener('submit', function(event) {
      handleFormSubmit(event, 'settingFormMobile');
  });
});

function displaySwal(errorMsg) {

  Swal.fire({
    icon: 'error',
    title: 'Validation Error',
    text: errorMsg,
});

}

 const previousBtn = document.getElementById('previousBtn');
 const nextBtn = document.getElementById('nextBtn');
 const submitBtn = document.getElementById('submitBtn');
 const form  = document.getElementById('multistep-form');
 let currentStep = 1;
 let totalSteps = 6;

 function showStep(step) {

    for(let i = 1; i <= totalSteps; i++) {
       
      document.getElementById(`page${i}`).style.display = 'none';

    }

    document.getElementById(`page${step}`).style.display = 'block';

    previousBtn.style.display = step > 1 ? 'block' : 'none';
    nextBtn.style.display = step < totalSteps ? 'block' : 'none';
    submitBtn.style.display = step === totalSteps ? 'block' : 'none';

 }


 function collectData() {

    const formData = new FormData(form);
 }

 nextBtn.addEventListener('click', () => {

    if (currentStep === 1) {
        collectData()

    }

    if(currentStep < totalSteps) {
        currentStep++

        showStep(currentStep);
       

    }

 });

 previousBtn.addEventListener('click', () => {

    if (currentStep > 1) {
        
        currentStep--;

        showStep(currentStep);



    }
 })

 showStep(currentStep)