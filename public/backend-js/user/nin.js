import { serverError } from "../admin/auth-helper.js";
import { getToken, validationError, displaySwal } from "../helper/helper.js";

const token = getToken();

if(token) {

  axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

  document.querySelector('.next-btn').addEventListener('click', (event) => {
    event.preventDefault();

    const form = document.getElementById('mobile-nin');
    const file = document.querySelector('.mobile-file');


    if(file.files.length > 0) {
      
        const formData = new FormData(form);

        for (let field of formData) {

         // console.log(field[0] + '' + field[1])
          
        }

        axios.post('/api/v1/verify/nin', formData, {
          headers: {
            'Content-type': 'multipart/form-data',
          }
        }).then((response) => {
       //   console.log(response);

          if(response.status === 200 && response.data) {

            let timerInterval;
           Swal.fire({

            icon: 'success',
            title: 'NIN Submission Successful',
            confirmButtonColor: '#ffb705',
            text: response.data.message,
            timer: 2000,
            timerProgressBar: true,

            didOpen: () => {

              Swal.showLoading();
              const timer = Swal.getPopup().querySelector("b");
              timerInterval = setInterval(() => {

              }, 1000);

            },
            willClose: () => {

              clearInterval(timerInterval);
            window.location.href = '/selfie';

            }
              })


          }

        }).catch((error) => {
         // console.log(error);

          if (error.response) {

            if(error.response.status === 422 && error.response.data) {

              const fieldError = error.response.data.errors;

              const msg = validationError(fieldError);

              displaySwal(msg);

              

          }

          if(error.response.status === 404 && error.response.data) {

              Swal.fire({
                  icon: 'error',
                  title: 'Identification Error',
                  confirmButtonColor: '#ffb705',
                  text: error.response.data.message,
              })


          }
          if(error.response.status === 500) {

              serverError();


          }

            
          }

        })

    }else {

      document.getElementById('error').innerHTML = '* Uploading NIN is required *';

    }
    
    
  });

/*

  const video = document.getElementById('video');
  const canvas = document.getElementById('canvas');
  const snap = document.getElementById('snap');
  const useCamera = document.getElementById('use-camera');
  const videoContainer = document.getElementById('video-container');
  const canvasContainer = document.getElementById('canvas-container');
  const belowSection = document.getElementById('below-section');
  const retakeButton = document.getElementById('retake-button');
  const saveButton = document.getElementById('save-button');
  const imgInp = document.getElementById('actual-btn');
  const defaultImage = document.querySelector('label img');

  let stream; // Store the webcam stream

  const constraints = {
    audio: false,
    video: {
      width: { min: 222, max: 222 },
      height: { min: 133, max: 133 }
    }
  };

  async function startWebCam() {
    try {
      stream = await navigator.mediaDevices.getUserMedia(constraints);
      video.srcObject = stream;
      videoContainer.style.display = 'block'; // Show the video container
      belowSection.style.height = 'auto'; // Reset below section height
      belowSection.style.marginBottom = '20px'; // Add some margin to below section
      snap.style.display = 'inline-block'; // Show the snap button
      useCamera.style.display = 'none'; // Hide the use camera button
      retakeButton.style.display = 'none'; // Hide retake button initially
      saveButton.style.display = 'none'; // Hide save button initially
      video.play(); // Start video autoplay
    } catch (e) {
     // console.log(e.toString());
    }
  }

  function stopWebCam() {
    if (stream) {
      stream.getTracks().forEach(track => {
        track.stop();
      });
    }
  }

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
  });

  retakeButton.addEventListener('click', () => {
    // Restart the camera and hide canvas
    startWebCam();
    canvasContainer.style.display = 'none';

    window.addEventListener('beforeunload', stopWebCam());
  });

  useCamera.addEventListener('click', () => {
    startWebCam();
    videoContainer.style.display = 'block'; // Show the video container
  });

  window.addEventListener('beforeunload', stopWebCam());

  saveButton.addEventListener('click', () => {
    window.addEventListener('beforeunload', stopWebCam());
    // Get the canvas data
    const canvasData = canvas.toDataURL('image/png');
    
    // Create a FormData object
    const formData = new FormData();
    
    // Append the canvas data to the FormData object
    formData.append('canvasImage', canvasData);

    for(let field of formData) {

    //  console.log(field[0] + ':' + field[1]);

    }

    axios.post('/api/v1/verify/nin-cam', formData, {

      headers: {
        'Content-type': 'multipart/form-data',
      }
    }).then((response) => {
      // console.log(response);

       if(response.status === 200 && response.data) {

        let timerInterval;
        Swal.fire({

           icon: 'success',
           title: 'NIN Submission Successful',
           confirmButtonColor: '#ffb705',
           text: response.data.message,
           timer: 2000,
           timerProgressBar: true,

           didOpen: () => {

             Swal.showLoading();
             const timer = Swal.getPopup().querySelector("b");
             timerInterval = setInterval(() => {

             }, 1000);

       },
          willClose: () => {

            clearInterval(timerInterval);
            window.location.href = '/selfie';

          }
            })

       }
    }).catch((error) => {
     // console.log(error);

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
                confirmButtonColor: '#ffb705',
                text: error.response.data.message,
            })


        }

        if (error.response.status === 404 && error.response.data) {

            Swal.fire({
                icon: 'error',
                title: 'Identification Error',
                confirmButtonColor: '#ffb705',
                text: error.response.data.message,
            })


        }

        if(error.response.status === 500) {

            serverError();
        }


    }


    })

    

    
  });

*/

}else {

//  console.log('no')
}