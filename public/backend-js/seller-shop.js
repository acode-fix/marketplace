import { serverError } from "./admin/auth-helper.js";
import { generateAvatar, getUserProfileImage } from "./helper/helper.js";


const token = localStorage.getItem('apiToken');

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

const userId = localStorage.getItem('userId');

if (!userId) {

    Swal.fire({
        icon: 'error',
        title: 'Resources Unavailable',
        text: 'Acess Denied!! ',
    }).then(() => {
        window.location.href = '/';
    });



} else if (token) {

    axios.get('/api/v1/verified-seller/details', {

        params: {
            userId,
        },

        headers: {
            'Content-type': 'application/json',
        }

    }).then((response) => {

        console.log(response)

        if (response.status === 200 && response.data) {

            const data = response.data.data;

            console.log(data);
            getProduct(data.products);
            loadMobileCard(data.products);
            updateUserProfile(data);


        }

    }).catch((error) => {

        console.log(error);

        if (error.response) {

            if (error.response.status === 404 && error.response.data) {

                Swal.fire({
                    icon: 'error',
                    title: 'Verification',
                    text: error.response.data.message,
                })

            }

            if (error.response.status === 500) {

                serverError();

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Request Error',
                    text: 'Something went wrong. Please try again later.',
                });

            }


        }

    });


    function getProduct(products) {

        let display = '';

        products.forEach((product) => {

            display += `
          <div>
                <div class="card card-preview productCard" data-product-id="${product.id}">
                  <h6 class="sold">Sold 75</h6>
                  <img src="/uploads/products/${image(product.image_url)}" class="card-img-top w-100 image-border" alt="...">
                  <div class="card-body">
                    <div class="card-structure">
                      <h6 class="amount">$${product.promo_price} <span class="amount-span">$${product.actual_price}</span></h6>
                      <div class="star-layout">
                        <div>
                          <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                          <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                          <img src="kaz/images/Rate.png" class="img-fluid image-rate" width="10px" alt="">
                        </div>
                        <div>
                          <h6 class="ps-1 rate-no">5.0</h6>
                        </div>
                      </div>
                    </div>
                    <div class="footer-card">
                      <p class="card-text infinix-text pt-3">${product.description}</p>
                      <img class="mt-3 logo-bag" src="kaz/images/badge.png" alt="">
                    </div>
                  </div>
                </div>
                <div class="overlay" onclick="closeCustomContainer()" id="overlay"></div>
                <div id="loadedCardContainer"></div>

              </div> `;
        });

        //console.log(display);
        document.querySelector('.new-card').innerHTML = display;
        const el = document.querySelectorAll('.productCard');
        getDom(el, products)

    }

    function image(productImages) {

        const images = JSON.parse(productImages);

        let singleImage;
        images.forEach((image, index) => {

            if (index === 0) {
                singleImage = image;
                return

            }

        });

        return singleImage;

    }



    function getDom(element, products) {



        element.forEach((card) => {

            card.addEventListener("click", function () {

                const id = card.dataset.productId;

                const product = getOverlayProduct(products, id);

                console.log(product);

                getImagePath(product);



                // console.log(product);


                // Placeholder data for the new card (replace with your own code)
                var newCardHTML = `
            <div id="customContainer" class="custom-container">
                <div class="custom-image">
                  <img id="slideshowImage" src="/uploads/products/${image(product.image_url)}" alt="Slideshow Image">
                </div>
                <div class="custom-content">
                    <div style="display: flex; justify-content: space-between; align-items: center;" class="custom-header">
                        <div>
                          <div style="display: flex; align-items: center;">
                          <img class="ps-2" width="50px" src="kaz/images/dp.png" alt="">
                          <div class="gary">
                          <h6 class="ps-2 gary-text">innocent .........</h6>
                          <img class="ms-1 "height="14px" width="14px" src="kaz/images/location.svg" alt=""><span class="location-text ps-1">Lagos, Nigera</span>
                          </div>
                      </div>
                        </div>
                        <div class="middle">
                          <h6 class="sold-10 fw-light me-2">
                            sold 10
                          </h6> 
                          <h6 class="stock fw-light me-2">
                            200 in stock
                          </h6> 
                          <h6 class="new fw-light">
                            New
                          </h6> 
                        </div>
                        <div>
                            <img width="30px" id="forwardArrow" type="button" src="kaz/images/Arrow.png" alt="">
                            <img width="30px" id="backwardArrow" type="button" src="kaz/images/Arrow-right.png" alt="">    
                            <img   width="45px"  class="btn closeBtn" src="kaz/images/Close.png" alt="">
                        </div>
                    </div>
                    <div class="custom-scrollable-content">
                      <div class="ms-4 mt-2">
                        <h6>Buy ipad pro 11</h6>
                        <h6 class="amount-js mt-2">$553,999.00 <span class="amount-span-js ps-4"> $765,999,0</span></h6>
                        <p class="mac-text mt-2">Macbook is a brand of mac notebook computers designed and marketed by Apple's macOs 
                          operating system since 2006.The Macbook brand replaced the powerBook and ibook brands
                          during the mark tranistion to intel processors,announced in 2005.
                        </p>
                        <p class="mac-text mt-3">Macbook is a brand of mac notebook computers designed and marketed by Apple's macOs 
                          operating system since 2006.The Macbook brand replaced the powerBook and ibook brands
                          during the mark tranistion to intel processors,announced in 2005.
                        </p>
                        <div class="last-box" style="display: flex; justify-content: space-between;">
                           <div class="rate-box">
                            <img width="10px" src="kaz/images/Rate.png" alt="">
                            <h6 class="rate-js ps-1">5.0</h6>
                          </div>
      
                          <h6 id="connect" class="connect me-4">Connect</h6>
                        </div>
      
                      </div>
                   
                    </div>
                </div>
            </div>
        `;
                // Append the new card HTML to the container
                document.getElementById("loadedCardContainer").innerHTML = newCardHTML;

                // Show the overlay and loaded card container
                document.getElementById("overlay").style.display = "block";
                document.getElementById("loadedCardContainer").style.display = "block";

                // Add event listeners to the arrows after the card is loaded
                var forwardArrow = document.getElementById("forwardArrow");
                var backwardArrow = document.getElementById("backwardArrow");

                if (forwardArrow && backwardArrow) {
                    forwardArrow.addEventListener("click", showNextImage);
                    backwardArrow.addEventListener("click", showPreviousImage);
                }


                var connectElement = document.getElementById("connect");
                if (connectElement) {
                    connectElement.addEventListener("mouseenter", function () {
                        connectElement.textContent = "Connect with me";
                    });
                    connectElement.addEventListener("mouseleave", function () {
                        connectElement.textContent = "Connect";
                    });
                }

                document.querySelector('.closeBtn').addEventListener('click', () => {

                    var customContainer = document.getElementById("customContainer");
                    var overlay = document.getElementById("overlay");
                    if (customContainer && overlay) {
                        customContainer.style.display = "none";
                        overlay.style.display = "none";
                        imagePaths = [];
                        currentIndex = 0;
                    }


                });

            });



        });

        showImage(currentIndex);




    }

    var currentIndex = 0;
    var imagePaths = [

    ];


    function getImagePath(product) {

        const imagePath = JSON.parse(product.image_url);

        imagePath.forEach((image) => {

            imagePaths.push(`/uploads/products/${image}`)
        });

        console.log(imagePaths);

    }



    function showImage(index) {
        var imageContainer = document.getElementById("slideshowImage");
        if (imageContainer) {
            console.log("Current index:", index);
            console.log("Image path:", imagePaths[index]);
            imageContainer.src = imagePaths[index];
        }
    }

    function showNextImage() {
        currentIndex = (currentIndex + 1) % imagePaths.length;
        console.log("Next index:", currentIndex);
        showImage(currentIndex);
    }

    // Function to show the previous image
    function showPreviousImage() {
        currentIndex = (currentIndex - 1 + imagePaths.length) % imagePaths.length;
        console.log("Previous index:", currentIndex);
        showImage(currentIndex);
    }


    function getOverlayProduct(products, id) {

        let productId = id;

        const test = products.find((product) => {

            return product.id == productId;

        });

        return test;




    }


    function loadMobileCard(products) {

      let display = '';

      products.forEach((product) => {
      
        display += `
        <a class="link-card" href="/product_des">
              <div class="card card-preview" data-card-id="1">
                <div class="sold-mobile">
                  <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
                  <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px" alt=""><span
                    class="img-rate ps-1">3.6</span>
                </div>
                <img src="/uploads/products/${image(product.image_url)}" class="card-img-top w-100 image-border" alt="...">
                <div class="card-body">
                  <h6 class="amount">$${product.promo_price} <span class="amount-span">$${product.actual_price}</span></h6>
                  <p class="card-text infinix-text pt-3">${product.description}.</p>
                  <div class="footer-card-mobile">
                    <div style="display: flex;align-items: center;">
                      <img style="margin-left:-10px;" width="8px" src="kaz/images/location.svg" alt=""><span
                        class="location-text ps-1">${product.location}, Nigera</span>
                    </div>
                    <button style="margin-top: -10px;" type="button" class="dropbtn"><img class="mt-3 logo-bag" src="kaz/images/badge.png" alt=""></button>
                  </div>

                </div>
              </div>
         </a>`;

      });

      document.querySelector('.mobile-card').innerHTML = display;

    }

    function updateUserProfile(user) {

      document.querySelectorAll('.js-name').forEach((username) => {
        username.textContent = user.name ? user.name : 'No Data Provided';
      });
      
      document.querySelectorAll('.js-email').forEach((userEmail) => {
        userEmail.textContent = user.email ? user.email : 'No Data Provided';
      });
      
       document.querySelectorAll('.js-profile').forEach((userProfile) => {
        user.photo_url 
        ? userProfile.src =`/uploads/users/${user.photo_url}` 
        : userProfile.src = generateAvatar(user.email);

      });
          
   const  bannerImg = user.banner 
         ?  `<img style="height:220px;" id="banner" src="/uploads/users/${user.banner}" class="card-img-top main-img-border" alt="...">` 
         : `<img style="height:220px;" id="banner" src="${generateAvatar(user.email)}" class="card-img-top main-img-border" alt="...">`;

  

      const bannerUpdate = `
      <div style="width: 90%;" class="card mb-3  main-card-preview">
               ${bannerImg}
                <div class="card-body">
                  <div class="row">
                    <div class="col mt-2">
                      <div style="display: flex; align-items: center;">
                        ${getUserProfileImage(user)}
                        <div class="camera2">
                          <img class="badge-cam" height="20px" width="15px" src="kaz/images/badge.png" alt="">
                        </div>
                        <div class="mt-4 ms-4">
                          <h5 class="">${user.name ? user.name : 'No Data Provided'}<span style="font-size: small;">(${user.shop_no ? user.shop_no : 'No Data Provided'})</span></h5>
                          <h6 class="mired-email">${user.email ? user.email : 'No Data Provided'}</h6>
                          <a class="verified-link" href="#">verified seller</a>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div style="float: right;">
                        <h6 class="connect-shop2  me-2 mt-4">Connect</h6>
                      </div>
                    </div>
                  </div>
                </div>
        </div>` ;

        document.querySelector('.content-margin').innerHTML = bannerUpdate;

        loadConnectBtn();
        loadSidebar(user);

        
      

      

      
       

      








    }

    function loadSidebar(user) {

      console.log(user) 

      const display = `
       <div class="ms-2">
            <h6 class="card-title">About me</h6>
            <p  style="font-size: small; " class="card-text our-company">
            ${user.bio}
            <span id="moreText" style="display: none;">Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Magnam reiciendis, eveniet porro ad iusto illum quisquam dolores modi
                excepturi officia. Doloribus dolor sunt dicta! A fuga, nesciunt non laborum minus provident repellat
                numquam rerum natus unde dolorum corrupti culpa. Doloremque, sunt nam modi porro unde ipsam voluptate
                ipsa alias ab dolorum vitae sed rem beatae exercitationem repellat quas! Molestias ipsa dolore sequi
                asperiores quia. Expedita iure similique vel nihil magni.</span>
              <a href="#" id="readMoreBtn"> ......Read more</a>
            </p>
          </div>
          <hr style="background-color: #343434;">
          <div>
            <div class="side-display">
              <div>
                <img width="10px" height="13px" src="kaz/images/location.svg" alt="">
                <span style="font-size: small;">From</span>
              </div>
              <h6 style="font-size: small;">Abuja,Nigera</h6>
            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="kaz/images/profile.svg" alt="">
                <span style="font-size: small;">Member since</span>
              </div>
              <h6 style="font-size: small;">May,2022</h6>

            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="kaz/images/product.svg" alt="">
                <span style="font-size: small;">Listed products</span>
              </div>
              <h6 style="font-size: small;">12</h6>

            </div>
            <hr style="background-color: #343434;">
          
          </div>`;

          document.querySelector('.test').innerHTML = display;

          
            var moreText = document.getElementById("moreText");
            var readMoreBtn = document.getElementById("readMoreBtn");

            
          
            // Function to close the accordion
            function closeAccordion() {
                moreText.style.display = "none";
                readMoreBtn.textContent = ".......Read more";
            }

            console.log(readMoreBtn);
          
            // Toggle accordion on read more button click
            readMoreBtn.addEventListener("click", function(e) {
                e.preventDefault();
                if (moreText.style.display === "none") {
                    moreText.style.display = "inline";
                    readMoreBtn.textContent = "Read less";
                } else {
                    closeAccordion();
                }
            });
          
            // Close accordion when clicking outside of it
            document.addEventListener("click", function(e) {
                var isClickInsideAccordion = readMoreBtn.contains(e.target) || moreText.contains(e.target);
                if (!isClickInsideAccordion) {
                    closeAccordion();
                }
            });
          
          
        


    }


    function loadConnectBtn() {

      const connectElement = document.querySelector('.connect-shop2');
      // Add event listener for mouseover
      connectElement.addEventListener('mouseover', function() {
        connectElement.textContent = "Connect with me";
       
      });
      
      // Add event listener for mouseout
      connectElement.addEventListener('mouseout', function() {
        connectElement.textContent = "Connect";
       
      });

    }





    



















} else {
    Swal.fire({
        icon: 'error',
        title: 'Unauthenticated User',
        text: 'Please log in.',
    }).then(() => {
        window.location.href = '/';

    });

}



