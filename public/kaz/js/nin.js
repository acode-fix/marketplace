document.addEventListener('DOMContentLoaded', function() {
 
  const imgInp = document.getElementById('actual-btn');
  const defaultImage = document.querySelector('label img');

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