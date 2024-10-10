
// document.addEventListener("DOMContentLoaded", function() {
//   // Define closeCustomContainer function
//   function closeCustomContainer() {
//       var customContainer = document.getElementById("customContainer");
//       var overlay = document.getElementById("overlay");
//       if (customContainer && overlay) {
//           customContainer.style.display = "none";
//           overlay.style.display = "none";
//       }
//   }
//  // Add event listener for the product card
//   document.getElementById("productCard").addEventListener("click", function() {

//       // Placeholder data for the new card (replace with your own code)
//       var newCardHTML = `
//       <div id="customContainer" class="custom-container">
//           <div class="custom-image">
//             <img id="slideshowImage" src="kaz/images/Picture of product (USB).png" alt="Slideshow Image">
//           </div>
//           <div class="custom-content">
//               <div style="display: flex; justify-content: space-between; align-items: center;" class="custom-header">
//                   <div>
//                     <div style="display: flex; align-items: center;">
//                     <img class="ps-2" width="50px" src="kaz/images/dp.png" alt="">
//                     <div class="gary">
//                     <h6 class="ps-2 gary-text">innocent .........</h6>
//                     <img class="ms-1 "height="14px" width="14px" src="kaz/images/location.svg" alt=""><span class="location-text ps-1">Lagos, Nigera</span>
//                     </div>
//                 </div>
//                   </div>
//                   <div class="middle">
//                     <h6 class="sold-10 fw-light me-2">
//                       sold 10
//                     </h6> 
//                     <h6 class="stock fw-light me-2">
//                       200 in stock
//                     </h6> 
//                     <h6 class="new fw-light">
//                       New
//                     </h6> 
//                   </div>
//                   <div>
//                       <img width="30px" id="forwardArrow" type="button" src="kaz/images/Arrow.png" alt="">
//                       <img width="30px" id="backwardArrow" type="button" src="kaz/images/Arrow-right.png" alt="">    
//                       <img   width="45px"  onclick="closeCustomContainer()"  class="btn" src="kaz/images/Close.png" alt="">
//                   </div>
//               </div>
//               <div class="custom-scrollable-content">
//                 <div class="ms-4 mt-2">
//                   <h6>Buy ipad pro 11</h6>
//                   <h6 class="amount-js mt-2">$553,999.00 <span class="amount-span-js ps-4"> $765,999,0</span></h6>
//                   <p class="mac-text mt-2">Macbook is a brand of mac notebook computers designed and marketed by Apple's macOs 
//                     operating system since 2006.The Macbook brand replaced the powerBook and ibook brands
//                     during the mark tranistion to intel processors,announced in 2005.
//                   </p>
//                   <p class="mac-text mt-3">Macbook is a brand of mac notebook computers designed and marketed by Apple's macOs 
//                     operating system since 2006.The Macbook brand replaced the powerBook and ibook brands
//                     during the mark tranistion to intel processors,announced in 2005.
//                   </p>
//                   <div class="last-box" style="display: flex; justify-content: space-between;">
//                      <div class="rate-box">
//                       <img width="10px" src="kaz/images/Rate.png" alt="">
//                       <h6 class="rate-js ps-1">5.0</h6>
//                     </div>

//                     <h6 id="connect" class="connect me-4">Connect</h6>
//                   </div>

//                 </div>
             
//               </div>
//           </div>
//       </div>
//   `;
//       // Append the new card HTML to the container
//       document.getElementById("loadedCardContainer").innerHTML = newCardHTML;

//       // Show the overlay and loaded card container
//       document.getElementById("overlay").style.display = "block";
//       document.getElementById("loadedCardContainer").style.display = "block";

//       // Add event listeners to the arrows after the card is loaded
//       var forwardArrow = document.getElementById("forwardArrow");
//       var backwardArrow = document.getElementById("backwardArrow");

//       if (forwardArrow && backwardArrow) {
//           forwardArrow.addEventListener("click", showNextImage);
//           backwardArrow.addEventListener("click", showPreviousImage);
//       }


//       var connectElement = document.getElementById("connect");
//       if (connectElement) {
//           connectElement.addEventListener("mouseenter", function() {
//               connectElement.textContent = "Connect with me";
//           });
//           connectElement.addEventListener("mouseleave", function() {
//               connectElement.textContent = "Connect";
//           });
//       }
  
//   });
  

//   // Show the initial image
//   showImage(currentIndex);
// });



// var currentIndex = 0;
// var imagePaths = [
// "kaz/images/Picture of product (Tablet).png",
// "kaz/images/Picture of product (USB).png",
// "kaz/images/Picture of product.png" 

// // Add more image paths as needed
// ];
// // Function to show the current image
// // Function to show the current image
// function showImage(index) {
// var imageContainer = document.getElementById("slideshowImage");
// if (imageContainer) {
//     console.log("Current index:", index);
//     console.log("Image path:", imagePaths[index]);
//     imageContainer.src = imagePaths[index];
// }
// }


// function showNextImage() {
// currentIndex = (currentIndex + 1) % imagePaths.length;
// console.log("Next index:", currentIndex);
// showImage(currentIndex);
// }

// // Function to show the previous image
// function showPreviousImage() {
// currentIndex = (currentIndex - 1 + imagePaths.length) % imagePaths.length;
// console.log("Previous index:", currentIndex);
// showImage(currentIndex);
// }


// document.addEventListener("DOMContentLoaded", function() {


// // Show the initial image
// showImage(currentIndex);
// });


// // Define closeCustomContainer function in the global scope
// function closeCustomContainer() {
//   var customContainer = document.getElementById("customContainer");
//   var overlay = document.getElementById("overlay");
//   if (customContainer && overlay) {
//       customContainer.style.display = "none";
//       overlay.style.display = "none";
//   }
// }


// document.addEventListener("DOMContentLoaded", function() {
//   const connectElement = document.querySelector('.connect-shop');
  
//   // Add event listener for mouseover
//   connectElement.addEventListener('mouseover', function() {
//     connectElement.textContent = "Connect with me";
//     connectElement.classList.add('with-padding'); // Add class to reduce padding
//   });
  
//   // Add event listener for mouseout
//   connectElement.addEventListener('mouseout', function() {
//     connectElement.textContent = "Connect";
//     connectElement.classList.remove('with-padding'); // Remove class to revert padding
//   });
// });

// document.addEventListener("DOMContentLoaded", function() {
//   const connectElement = document.querySelector('.connect-shop2');
  
//   // Add event listener for mouseover
//   connectElement.addEventListener('mouseover', function() {
//     connectElement.textContent = "Connect with me";
   
//   });
  
//   // Add event listener for mouseout
//   connectElement.addEventListener('mouseout', function() {
//     connectElement.textContent = "Connect";
   
//   });
// });

// document.addEventListener("DOMContentLoaded", function() {
//   const connectElement = document.querySelector('.connect-shop3');
  
//   // Add event listener for mouseover
//   connectElement.addEventListener('mouseover', function() {
//     connectElement.textContent = "Connect with me";
//     connectElement.classList.add('with-padding1'); // Add class to reduce padding
//   });
  
//   // Add event listener for mouseout
//   connectElement.addEventListener('mouseout', function() {
//     connectElement.textContent = "Connect";
//     connectElement.classList.remove('with-padding1'); // Remove class to revert padding
//   });
// });



 

