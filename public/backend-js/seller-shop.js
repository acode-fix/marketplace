import { serverError } from "./admin/auth-helper.js";
import { generateAvatar, getDate, getUserProfileImage, logoutUser, getShopPrice } from "./helper/helper.js";



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

       // console.log(response)

        if (response.status === 200 && response.data) {

            const data = response.data.data;

            //console.log(data);
            getProduct(data.products, data);
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
                    willClose() {
                      window.location.href = '/';
                    }
                })

            }

            if (error.response.status === 500) {

                serverError();

            } 


        }

    });


    function getProduct(products, data) {

        let display = '';

        products.forEach((product) => {

            display += `
          <div>
                <div class="card card-preview productCard" data-product-id="${product.id}">
                  <h6 class="sold">Sold 75</h6>
                  <img src="/uploads/products/${image(product.image_url)}" class="card-img-top w-100 image-border" alt="...">
                  <div class="card-body">
                    <div class="card-structure">
                    ${getShopPrice(product)}
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
                      <p class="card-text infinix-text pt-3">${product.title}</p>
                      <img class="mt-3 logo-bag" src="kaz/images/badge.png" alt="">
                    </div>
                  </div>
                </div>
                <div class="overlay" onclick="closeCustomContainer()" id="overlay"></div>
                <div id="loadedCardContainer"></div>

              </div> `;
        });

        


        document.querySelector('.new-card').innerHTML = display ||'You Have No Product Listed!!';
        const el = document.querySelectorAll('.productCard');
        getDom(el, products, data)

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



    function getDom(element, products, data) {



        element.forEach((card) => {

            card.addEventListener("click", function () {

                const id = card.dataset.productId;

                const product = getOverlayProduct(products, id);

                console.log(product);

                getImagePath(product);

            
                // Placeholder data for the new card (replace with your own code)
                //testing Photo = 455514555c4ffcf103a53bdf7a834d24.jpg;
                var newCardHTML = `
            <div id="customContainer" class="custom-container">
                <div class="custom-image">
                  <img style="height:400px" id="slideshowImage" src="/uploads/products/${image(product.image_url)}" alt="Slideshow Image">
                </div>
                <div class="custom-content">
                    <div style="display: flex; justify-content: space-between; align-items: center;" class="custom-header">
                        ${updateOverlayUserProfile(data)}
                      </div>
                        </div>
                        <div class="middle">
                          <h6 class="sold-10 fw-light me-2">
                            sold 10
                          </h6> 
                          <h6 class="stock fw-light me-2">
                            ${product.quantity ?? '0'} in stock
                          </h6> 
                          <h6 class="new fw-light">
                           ${product.condition ?? ''}
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
                        <h6>Buy ${product.title ?? ''}</h6>
                        ${product.ask_for_price
                          ? '<h6 class="amount-js mt-2" style="color:red; font-size:15px;">Ask for price</h6>' 
                          : ` <h6 class="amount">$${product.promo_price ?? 0} <span class="amount-span-js ps-4">$${product.actual_price ?? 0}</span></h6>`}
                        
                        <p class="mac-text mt-2">${product.description ?? ''}</p>
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


    function  updateOverlayUserProfile(user) {
    const img = user.photo_url 
          ? `<img class="ms-2 js-profile"  src="/uploads/users/${user.photo_url}" alt="">`
          : `<img class="ms-2 js-profile"  src="${generateAvatar(user.email)}"  alt="">`;

      return `<div>
                <div style="display: flex; align-items: center;">
                 ${img}
                <div class="gary">
                <h6 class="ps-2 gary-text">${user.name} .........</h6>
                <img class="ms-1 "height="14px" width="14px" src="kaz/images/location.svg" alt=""><span class="location-text ps-1">${user.location ?? ''}, Nigera</span>
              </div>`;
    
    
    };

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
                ${getShopPrice(product)}
                  <p class="card-text infinix-text pt-3">${product.title}.</p>
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
                          <h5 class="">${user.name ? user.name : 'No Data Provided'}<span style="font-size: small;">(Shop No: ${user.shop_no ? user.shop_no : 'No Data Provided'})</span></h5>
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

      const mobileBannerImg = user.banner 
            ? `<img style="height:180px;" id="banner" src="/uploads/users/${user.banner}" class="card-img-top main-img-border2" alt="...">`
            : `<img style="height:180px;" id="banner" src="${generateAvatar(user.email)}" class="card-img-top main-img-border2" alt="...">`;

      const userMobileImg = user.photo_url 
            ? `<img class="js-profile"  src="/uploads/users/${user.photo_url}"  alt="">`
            : `<img class="js-profile"  src="${generateAvatar(user.email)}"  alt="">`;

        const mobileBannerUpdate =`
           ${mobileBannerImg}
          <div class="card-body">
            <div style="display: flex;justify-content: space-between;">
              <div class="drill">
                ${userMobileImg}
                <div class="camera2-m">
                  <img class="badge-cam-m" height="20px" width="15px" src="kaz/images/badge.png" alt="">
                </div>
                <div class="ms-3 mb-2 ">
                  <h5 class="pt-3 mired-drill-m">${user.name ?? ''}<span style="font-size: small;"> (Shop No: ${user.shop_no ? user.shop_no : 'No Data Provided'})</span></h5>
                  <h6 class="mired-email">${user.email ?? ''}</h6>
                  <h6 class="veri-m pt-1">verified seller</h6>
                </div>

              </div>
              <div>
                <h6 class="connect-shop3  mt-4">Connect</h6>
              </div>
            </div> 
          </div>`;

        document.querySelector('.main-card-mobile').innerHTML = mobileBannerUpdate;

        const connectElement = document.querySelector('.connect-shop3');
    
        // Add event listener for mouseover
        connectElement.addEventListener('mouseover', function() {
          connectElement.textContent = "Connect with me";
          connectElement.classList.add('with-padding1'); // Add class to reduce padding
        });
        
        // Add event listener for mouseout
        connectElement.addEventListener('mouseout', function() {
          connectElement.textContent = "Connect";
          connectElement.classList.remove('with-padding1'); // Remove class to revert padding
        });


        loadMobileSidebar(user)


        


          

        
      

    }

    function loadSidebar(user) {

      //console.log(user)
      
      const bioText = user.bio ?? '';
      const previewLength = 100;

      const visibleBio = bioText.slice(0, previewLength);
      const hiddenBio = bioText.length > previewLength  ? bioText.slice(previewLength) : '';

      
      const display = `
       <div class="ms-2">
            <h6 class="card-title">About me</h6>
            <p  style="font-size: small; " class="card-text our-company">
             ${visibleBio}
            <span id="moreText" style="display: none;"> ${hiddenBio}.</span>
              ${hiddenBio ? '<a href="#" id="readMoreBtn"> ......Read more</a>' : ''} 
            </p>
          </div>
          <hr style="background-color: #343434;">
          <div>
            <div class="side-display">
              <div>
                <img width="10px" height="13px" src="kaz/images/location.svg" alt="">
                <span style="font-size: small;">From</span>
              </div>
              <h6 style="font-size: small;">${user.location ?? ''} Nigera</h6>
            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="kaz/images/profile.svg" alt="">
                <span style="font-size: small;">Member since</span>
              </div>
              <h6 style="font-size: small;"> ${getDate(user.created_at)}</h6>

            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="kaz/images/product.svg" alt="">
                <span style="font-size: small;">Listed products</span>
              </div>
              <h6 style="font-size: small;">${user.products.length ?? 0}</h6>

            </div>
            <hr style="background-color: #343434;">
          
          </div>`;

          document.querySelector('.test').innerHTML = display;

          const sidebarPicElement = document.querySelector('.sidebar-pic');

          user.photo_url
           ? sidebarPicElement.src = `/uploads/users/${user.photo_url}` 
           : sidebarPicElement.src = `${generateAvatar(user.email)}`;

         

           if(hiddenBio) {
            desktopReadMore();
  
          }
        


    }

    function desktopReadMore() {

      var moreText = document.getElementById("moreText");
            var readMoreBtn = document.getElementById("readMoreBtn");

            // Function to close the accordion
            function closeAccordion() {
                moreText.style.display = "none";
                readMoreBtn.textContent = ".......Read more";
            }

          
          
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


    function loadMobileSidebar(user) {

      const mobileSidebar = `
        <div class="side-display">
              <div>
                <img class="ms-1" width="8px" height="10px" src="kaz/images/location.svg" alt="">
                <span class="from ms-1">From</span>
              </div>
              <h6 class="from ">${user.location ?? ''},Nigera</h6>
            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="kaz/images/profile.svg" alt="">
                <span class="from ">Member since</span>
              </div>
              <h6 class="from ">${getDate(user.created_at)}</h6>

            </div>
            <div class="side-display">
              <div>
                <img width="15px" src="kaz/images/product.svg" alt="">
                <span class="from ">Listed products</span>
              </div>
              <h6 class="from ">${user.products.length ?? 0}</h6>
            </div>`;

            document.querySelector('.js-sidebar').innerHTML = mobileSidebar;

        const bioText = user.bio ?? '';
        const previewLength = 100;
        const visibleBio = bioText.slice(0, previewLength);
        const hiddenBio = bioText.length > previewLength ? bioText.slice(previewLength) : '';

      const about = `
       <h6>About me</h6>
        <p style="font-size: small; " class="card-text our-company  pt-1">
         ${visibleBio}
         <span id="moreText2" style="display: none;">
            ${hiddenBio}</span>
             ${hiddenBio ? ` <a href="#" id="readMoreBtn2"> ......Read more</a>` : '' }
        </p>`;

        document.querySelector('.about-mobile').innerHTML = about;

        if( hiddenBio) {

          mobileReadMore();

        }

      



    }

    function mobileReadMore() {
      
      var moreText = document.getElementById("moreText2");
      var readMoreBtn = document.getElementById("readMoreBtn2");

      // Function to close the accordion
      function closeAccordion() {
          moreText.style.display = "none";
          readMoreBtn.textContent = ".......Read more";
      }
    
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


    document.querySelectorAll('.js-logout').forEach((logout) => {

      logout.addEventListener('click', (event) => {
        event.preventDefault();
  
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes,I am sure!"
          }).then((result) => {
          if (result.isConfirmed) {
            logoutUser();
            
          }
      });
        
  
      })


    })
    
    
} else {
    Swal.fire({
        icon: 'error',
        title: 'Unauthenticated User',
        text: 'Please log in.',
    }).then(() => {
        window.location.href = '/';

    });

}



