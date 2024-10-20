import { validationError,displaySwal, } from "./helper/helper.js";
import { serverError } from "./admin/auth-helper.js";

const token = localStorage.getItem('apiToken');

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;


document.addEventListener('DOMContentLoaded', function () {
    function handleFormSubmit(event, formId) {
        event.preventDefault();

        

        if(validateBio()) {

            return;
        }


        const form = document.getElementById(formId);
        let formData = new FormData(form);

        for (let pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

        const token = localStorage.getItem('apiToken');


        const locationSwitch = form.querySelector('input[name="location"]');

        

        if (locationSwitch && locationSwitch.checked) {
            navigator.geolocation.getCurrentPosition(function (position) {
                formData.append('latitude', position.coords.latitude);
                formData.append('longitude', position.coords.longitude);
                sendUpdateRequest(formData, token);
            }, function (error) {
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

    function validateBio() {

        const bioText = document.getElementById('profileInput').value;
        const bioTextMobile = document.getElementById('profileInput1').value;
        
        const words = bioText.trim();
        const mobileWords = bioTextMobile.trim();

        const desktopEl = document.getElementById('bio-error');
        const mobileEl = document.getElementById('bio-error-mobile');  
        
        let isValid = false;

    
        if(words.length > 300) {  

            desktopEl.textContent = '* Bio Must Not Exceed 300 Words !! *';
            isValid = true;

        }else {

            desktopEl.textContent = '';
        }

        if(mobileWords.length > 300) {

            mobileEl.textContent = '* Bio Must Not Exceed 300 Words !! *'; 
            isValid = true;
            
        }else {

            mobileEl.textContent = '';
        }

        return isValid;



    }

    function sendUpdateRequest(formData, token) {
        axios.post(`/api/auth/update`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'Authorization': 'Bearer ' + token
                }
            })
            .then(function (response) {
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
            .catch(function (error) {

                if (error.response) {

                    if (error.response.status === 422 && error.response.data) {

                        const responseErrors = error.response.data.errors;
                        const allErrors = [];

                        for (let field in responseErrors) {

                            const fieldErrors = responseErrors[field];

                            fieldErrors.forEach(message => {
                                allErrors.push(message);
                            });


                        }

                        const errorMsg = allErrors.join('\n')

                        displaySwal(errorMsg)

                    }

                    if(error.response.status === 500) {

                        Swal.fire({
                          icon: 'error',
                          title: 'Error Occurred',
                          text: 'Something Went Wrong!!',
                         
                      })
                    }
                }
            });
    }

    document.getElementById('settingForm').addEventListener('submit', function (event) {
        handleFormSubmit(event, 'settingForm');
    });

    document.getElementById('settingFormMobile').addEventListener('submit', function (event) {
        handleFormSubmit(event, 'settingFormMobile');
    });
});

/*
function displaySwal(errorMsg) {

    Swal.fire({
        icon: 'error',
        title: 'Validation Error',
        text: errorMsg,
    });

}
*/

const modalArrow = document.getElementById('modal-arrow');
const previousBtn = document.getElementById('previousBtn');
const nextBtn = document.getElementById('nextBtn');
const proceedBtn = document.getElementById('proceedBtn');
const bioForm = document.getElementById('bio-form');
const bioSubmit = document.getElementById('save');
let currentStep = 1;
let totalSteps = 6;

function showStep(step) {

    for (let i = 1; i <= totalSteps; i++) {

        document.getElementById(`page${i}`).style.display = 'none';

    }

    document.getElementById(`page${step}`).style.display = 'block';

    previousBtn.style.display = step > 1 ? 'block' : 'none';
    nextBtn.style.display = step < totalSteps ? 'block' : 'none';
    proceedBtn.style.display = step === totalSteps ? 'inline-block' : 'none';

}




function collectData() {

    const formData = new FormData(bioForm);

    for (let field of formData) {

        console.log(field[0] + ':' + field[1])
    }
}

nextBtn.addEventListener('click', () => {


    if (currentStep < totalSteps) {
        currentStep++
        showStep(currentStep);

    }


});

previousBtn.addEventListener('click', () => {

    if (currentStep > 1) {

        currentStep--;

        showStep(currentStep);



    }
});

modalArrow.addEventListener('click', () => {

    if (currentStep > 1) {

        currentStep--;

        showStep(currentStep);



    }
});

showStep(currentStep);


let errors;

 function Validation() {

    
     errors = {};

    const email = document.querySelector('.email').value;
    const nationality = document.querySelector('.nationality').value;
    const name = document.querySelector('.username').value;
    const address = document.querySelector('.address').value;
    const phone = document.querySelector('.phone_number').value;
    const gender = document.querySelector('input[name="gender"]:checked');
    const genderInput = gender ? gender.value : '';



    if (email === '') {
        errors['email'] = '*Email Is Required*';
    }

    if (nationality === '') {
        errors['nationality'] = '*Nationality is Required*';
    }

    if (name === '') {
        errors['name'] = '*Name Is Required*';
    }

    if (address === '') {

        errors['address'] = '*Address Is Required*';
    }

    if (genderInput === '') {

        errors['gender'] = '*Gender Is Required*';
    }

    if (phone === '') {

        errors['phone'] = '*Phone Number Is Required*';
    }

    //console.log(errors);

    for (let field in errors) {

        //console.log (errors[field]);

        document.getElementById(`${field}_error`).innerHTML = errors[field];

       if (errors[field]) {

        nextBtn.style.display = 'none';


       }
    }

    


};

//console.log(errors)
bioSubmit.addEventListener('click', (event) => {    
    event.preventDefault();
     
    Validation();
   // console.log(errors);

    const formData = new FormData(bioForm);

    for (let field of formData) {

        //console.log(field[0] + ':' + field[1])
    }
  
      let check = []
    for (let field in errors) {

       check.push(errors[field])
    
    }

    if(check.length === 0) {
    //console.log('yes');
    nextBtn.style.display = 'block';  
    document.querySelectorAll('.error').forEach((errorStyle) => {
        errorStyle.style.display = 'none'; 
    })
     

    axios.post('/api/v1/verify/bio',  formData, {

        headers : {
            'Content-Type': 'multipart/form-data'
        },
        'method': 'post',


    }).then((response) => {
        console.log(response);

        if(response.status === 200 && response.data) {

            Swal.fire({
                icon: 'success',
                title: 'Bio-Form Submission',
                text: response.data.message,
                showConfirmButton: false,
                timer: 2000
            }).then(() => {

                let email = document.querySelector('.email');
                let nationality = document.querySelector('.nationality');
                let name = document.querySelector('.username');
                let address = document.querySelector('.address');
                let phone = document.querySelector('.phone_number');
                let gender = document.querySelector('input[name="gender"]:checked');
            

                email.value = ''; nationality.value = ''; name.value= ''; address.value = ''; phone.value = ''; gender.checked = false; 
            
            })


        }

    }).catch((error) => {
        
        if (error.response) {

        let email = document.querySelector('.email');
        let nationality = document.querySelector('.nationality');
        let name = document.querySelector('.username');
        let address = document.querySelector('.address');
        let phone = document.querySelector('.phone_number');
        let gender = document.querySelector('input[name="gender"]:checked');
            
        email.value = ''; nationality.value = ''; name.value= ''; address.value = ''; phone.value = ''; gender.checked = false;

            if(error.response.status === 422 && error.response.data) {

                const fieldError = error.response.data.errors;

                const msg = validationError(fieldError);

                displaySwal(msg);

                

            }

            if(error.response.status === 400 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    title: 'Submission Error',
                    text: error.response.data.message,
                })


            }

            if(error.response.status === 500) {

                serverError();


            }
        }
    

    })
}

});



 
  const saveBadge = document.getElementById('save_badge');

 document.querySelectorAll('.js-click').forEach((click) => {
    click.addEventListener('click', () => {
        saveBadge.style.display = 'block';   
    })

 });

 saveBadge.addEventListener('click', (event) => {
    event.preventDefault();

    const form = document.getElementById('badge_form');
   
    const formData = new FormData(form);

    for(let field of formData) {
        console.log(field[0] + ':' + field[1]);

    }

    axios.post( '/api/v1/verify/badge', formData, {
        headers: {
            'Content-Type': 'multipart/form-data',

        }

    }).then((response) => {
        //console.log(response);

        if(response.status === 200 && response.data) {

            Swal.fire({
                icon: 'success',
                title: 'Badge Subscription',
                text: response.data.message,
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                saveBadge.style.display = 'none';  

            })
        }

        

    }).catch((error) => {
        
        if(error.response) {

            saveBadge.style.display = 'none';  

            if(error.response.status === 422 && error.response.data) {

                const fieldError = error.response.data.errors;

                const msg = validationError(fieldError);

                displaySwal(msg);

    

            }
            if(error.response.status === 404 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    title: 'Identification Error',
                    text: error.response.data.message,
                })


            }
            if(error.response.status === 400 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    title: 'Submission Error',
                    text: error.response.data.message,
                })


            }

            
            if(error.response.status === 500) {

                serverError();


            }


        }

    })




 });


document.querySelector('.nin_upload').addEventListener('click', () => {

  const defaultImage = document.getElementById('preview-image');
    
  const form = document.getElementById('nin_form');
  const ninUpload =  document.getElementById('upload_nin');
  ninUpload.style.display = 'inline-block';

  ninUpload.addEventListener('click', (event) => {
    event.preventDefault();

    const file = document.querySelector('.file');

    if(file.files.length === 0) {
        document.getElementById('nin_error').innerHTML = '* NIN Is Required *';
        nextBtn.style.display = 'none';
    }else {
        document.getElementById('nin_error').innerHTML = '';
        nextBtn.style.display = 'block';

        
        const formData = new FormData(form);

        for(let field of formData) {

            console.log(field[0] + ':' + field[1])
        }

        

        axios.post('/api/v1/verify/nin',   formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
            'method': 'post',
        }).then((response) => {
            console.log(response);

            if(response.data) {

                if(response.status === 200 && response.data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'NIN Upload',
                        text: response.data.message,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        ninUpload.style.display = 'none';
                        defaultImage.style.width = '70px';
                        defaultImage.style.height = '70px';
                        defaultImage.src ="kaz/images/Nin upload.svg";
                    })
                }

            }

            

        }).catch((error) => {
            if(error.response) {

                ninUpload.style.display = 'none';
                defaultImage.style.width = '70px';
                defaultImage.style.height = '70px';
                defaultImage.src ="kaz/images/Nin upload.svg";

               

                if(error.response.status === 422 && error.response.data) {

                    const fieldError = error.response.data.errors;
    
                    const msg = validationError(fieldError);
    
                    displaySwal(msg);
    
                    
    
                }

                if(error.response.status === 404 && error.response.data) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Identification Error',
                        text: error.response.data.message,
                    })
    
    
                }
                if(error.response.status === 500) {

                    serverError();
    
    
                }
            }

        })
        
    }


  })


})



document.addEventListener('DOMContentLoaded', () => {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const snap = document.getElementById('snap');
    const useCamera = document.getElementById('use-camera');
    const videoContainer = document.getElementById('video-container');
    const canvasContainer = document.getElementById('canvas-container');
    const retakeButton = document.getElementById('retake-button');
    const saveButton = document.getElementById('save-button');

    let stream; // Store the webcam stream

    const constraints = {
        audio: false,
        video: {
            width: {
                min: 249,
                max: 249
            },
            height: {
                min: 242,
                max: 242
            }
        }
    };

    async function startWebCam() {
        try {
            stream = await navigator.mediaDevices.getUserMedia(constraints);
            video.srcObject = stream;
            videoContainer.style.display = 'block'; // Show the video container
            snap.style.display = 'inline-block'; // Show the snap button
            useCamera.style.display = 'none'; // Hide the use camera button
            video.play(); // Start video autoplay
        } catch (e) {
            console.log(e.toString());
        }
    }

    function stopWebCam() {
        if (stream) {
            stream.getTracks().forEach(track => {
                track.stop();
            });
        }
    }
    if (snap) {


        snap.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default action

            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Hide video and show canvas
            videoContainer.style.display = 'none';
            canvasContainer.style.display = 'block';

            // Show retake and save buttons
            retakeButton.style.display = 'inline-block';
            saveButton.style.display = 'inline-block';
            snap.style.display = 'none'; // Hide the snap button after capturing image
        })
    };

    if (retakeButton) {


        retakeButton.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default action

            // Restart the camera and hide canvas
            startWebCam();
            canvasContainer.style.display = 'none';
            retakeButton.style.display = 'none';
            saveButton.style.display = 'none';
            snap.style.display = 'inline-block'; // Show the snap button again
            window.addEventListener('beforeunload', stopWebCam());
        });
    }
    if (useCamera) {


        useCamera.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent default action
            startWebCam();
        })
    };

    window.addEventListener('beforeunload', stopWebCam());
    if (saveButton) {


        saveButton.addEventListener('click', (event) => {
            window.addEventListener('beforeunload', stopWebCam());
            event.preventDefault(); // Prevent default action

            // Get the canvas data
            const canvasData = canvas.toDataURL('image/png');

            // Create a FormData object
            const formData = new FormData();

            // Append the canvas data to the FormData object
            formData.append('canvasImage', canvasData);


            for (let field of formData) {

                console.log(field[0] + ':' + field[1]);

            }

            axios.post('/api/v1/verify/image', formData, {

                headers: {
                    'Content-Type': 'multipart/form-data',
                }


            }).then((response) => {

                console.log(response)

                if (response.data) {

                    if (response.status === 200) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.data.message,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => {

                            videoContainer.style.display = 'none'; // Show the video container
                            snap.style.display = 'none'; // Show the snap button
                            useCamera.style.display = 'block';

                            canvasContainer.style.display = 'none';
                            retakeButton.style.display = 'none';
                            saveButton.style.display = 'none';


                        });



                    }


                }


            }).catch((error) => {   

                videoContainer.style.display = 'none'; // Show the video container
                snap.style.display = 'none'; // Show the snap button
                useCamera.style.display = 'block';

                canvasContainer.style.display = 'none';
                retakeButton.style.display = 'none';
                saveButton.style.display = 'none';

                if (error.response) {

                    if(error.response.status === 422 && error.response.data) {

                        const fieldError = error.response.data.errors;
        
                        const msg = validationError(fieldError);
        
                        displaySwal(msg);
        
                        
                    }


                    if (error.response.status === 400 && error.response.data) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Upload Error',
                            text: error.response.data.message,
                        })


                    }

                    if (error.response.status === 404 && error.response.data) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Identification Error',
                            text: error.response.data.message,
                        })


                    }

                    if(error.response.status === 500) {

                        Swal.fire({
                          icon: 'error',
                          title: 'Error Occurred',
                          text: 'Something Went Wrong!!',
                         
                      })
                    }


                }

            })





        })
    };
});


proceedBtn.addEventListener('click', () => {

    axios.get('api/v1/payment/init', {

    }).then((response) => {
        console.log(response);
 
        if (response.data) {

            const url = response.data.paystack_url;

            window.location.href = url;
        }

        console.log(response);

    })
    
    .catch((error) => {
        console.log(error);

        if(error.response) {

            if(error.response.status === 404 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    title: 'Paystack Init Error',
                    text: error.response.data.message,
                })


            }
            if(error.response.status === 400 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    title: 'Paystack verification',
                    text: error.response.data.message,
                })


            }

            if(error.response.status === 500) {
                serverError();

            }


        }



    })



});

