// document.addEventListener('DOMContentLoaded', () => {
//   const video = document.getElementById('video');
//   const canvas = document.getElementById('canvas');
//   const snap = document.getElementById('snap');
//   const useCamera = document.getElementById('use-camera');
//   const videoContainer = document.getElementById('video-container');
//   const canvasContainer = document.getElementById('canvas-container');
//   const retakeButton = document.getElementById('retake-button');
//   const saveButton = document.getElementById('save-button');

//   let stream; // Store the webcam stream

//   const constraints = {
//       audio: false,
//       video: {
//           width: { min: 249, max: 249 },
//           height: { min: 242, max: 242 }
//       }
//   };

//   async function startWebCam() {
//       try {
//           stream = await navigator.mediaDevices.getUserMedia(constraints);
//           video.srcObject = stream;
//           videoContainer.style.display = 'block'; // Show the video container
//           snap.style.display = 'inline-block'; // Show the snap button
//           useCamera.style.display = 'none'; // Hide the use camera button
//           video.play(); // Start video autoplay
//       } catch (e) {
//           console.log(e.toString());
//       }
//   }

//   function stopWebCam() {
//       if (stream) {
//           stream.getTracks().forEach(track => {
//               track.stop();
//           });
//       }
//   }
//    if (snap) {

 
//   snap.addEventListener('click', (event) => {
//       event.preventDefault(); // Prevent default action

//       const context = canvas.getContext('2d');
//       context.drawImage(video, 0, 0, canvas.width, canvas.height);

//       // Hide video and show canvas
//       videoContainer.style.display = 'none';
//       canvasContainer.style.display = 'block';

//       // Show retake and save buttons
//       retakeButton.style.display = 'inline-block';
//       saveButton.style.display = 'inline-block';
//       snap.style.display = 'none'; // Hide the snap button after capturing image
//   })
// };
 
// if (retakeButton) {


//   retakeButton.addEventListener('click', (event) => {
//       event.preventDefault(); // Prevent default action

//       // Restart the camera and hide canvas
//       startWebCam();
//       canvasContainer.style.display = 'none';
//       retakeButton.style.display = 'none';
//       saveButton.style.display = 'none';
//       snap.style.display = 'inline-block'; // Show the snap button again
//   });
// }
// if (useCamera) {


//   useCamera.addEventListener('click', (event) => {
//       event.preventDefault(); // Prevent default action
//       startWebCam();
//   })
// };

//   window.addEventListener('beforeunload', stopWebCam);
//  if (saveButton) {


//   saveButton.addEventListener('click', (event) => {
//       event.preventDefault(); // Prevent default action

//       // Get the canvas data
//       const canvasData = canvas.toDataURL('image/png');

//       // Create a FormData object
//       const formData = new FormData();

//       // Append the canvas data to the FormData object
//       formData.append('canvasImage', canvasData);


//       // Get the form element
//       const form = document.querySelector('form');
//       // Submit the form with the canvas image data
//       fetch(form.action, {
//           method: 'POST',
//           body: formData
//       })
//       .then(response => {
//           // Handle response if needed
//           console.log('Form submitted successfully');
//           // Optionally, redirect to another page
//           //window.location.href = 'next-page.html';
//       })
//       .catch(error => {
//           console.error('Error submitting form:', error);
//       });
//   })
// };
// });
