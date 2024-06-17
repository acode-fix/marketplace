document.addEventListener('DOMContentLoaded', function() {
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
  });

  useCamera.addEventListener('click', () => {
    startWebCam();
    videoContainer.style.display = 'block'; // Show the video container
  });

  window.addEventListener('beforeunload', stopWebCam);

  saveButton.addEventListener('click', () => {
    // Get the canvas data
    const canvasData = canvas.toDataURL('image/png');
    
    // Create a FormData object
    const formData = new FormData();
    
    // Append the canvas data to the FormData object
    formData.append('canvasImage', canvasData);

    // Get the form element
    const form = document.querySelector('form');

    // Submit the form with the canvas image data
    fetch(form.action, {
      method: 'POST',
      body: formData
    })
    .then(response => {
      // Handle response if needed
      console.log('Form submitted successfully');
      // Optionally, redirect to another page
      window.location.href = 'next-page.html';
    })
    .catch(error => {
      console.error('Error submitting form:', error);
    });
  });

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
        defaultImage.style.height = '150px';
      };
      newImage.src = URL.createObjectURL(file);
    }
  });
});