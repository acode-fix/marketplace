import { serverError } from "../admin/auth-helper.js";
import { getToken, validationError, displaySwal } from "../helper/helper.js";


const token = getToken()

if(token) {

  document.querySelector('.next-btn').addEventListener('click', (event) => {
    event.preventDefault();

    document.getElementById('error').innerHTML = '* Selfie Capturing Is Required *';

    

  })
  

    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

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
  
                  //console.log(response)
  
                  if (response.data) {
  
                      if (response.status === 200) {
  
                        let timerInterval;
                        Swal.fire({
                
                           icon: 'success',
                           title: 'Selfie Submission Successful',
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
                            window.location.href = '/badge';
                
                          }
                            })
                
  
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
  
                       serverError();
                      }
  
  
                  }
  
              })
  
  
  
  
  
          })
      };
  

   
 

  


}else {
  console.log('no')
}