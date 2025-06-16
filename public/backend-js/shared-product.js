import {
    getToken,
    getProdDesImage,
    getProdProfileDescImg,
    loadDashboard,
    logoutUser,
    getSingleImage,
    getBadge,
    getPrice,
    loadConnect,
    sendProductRequest,
    displayHelpCenter,
    promptLogin,
    getIndexPrice,
    formatProductCondition,
    getSharePrice,
    getTestPrice,
} from "./helper/helper.js";

import { checkUserSettingStatus } from "./user/user-setting-status.js";
import verificationBtnStatus from "./user/verification-status.js";

checkUserSettingStatus();

const currentUrl = new URL(window.location.href);
const id = currentUrl.searchParams.get("id");
const shopToken = currentUrl.searchParams.get("check");

sessionStorage.setItem("sharedPage", currentUrl);

const token = localStorage.getItem("apiToken");

const logoImg = document.querySelector(".js-logo-img");
const logoLink = document.querySelector(".js-logo-link");

if (!token) {
    logoLink.addEventListener("click", (event) => {
        event.preventDefault();
    });

    logoImg.addEventListener("click", () => {
        logoImg.dataset.bsToggle = "modal";
        logoImg.dataset.bsTarget = "#signup_login-modal";
    });

    const becomeLinks = document.querySelectorAll(".js-become-link");

    becomeLinks.forEach((link) => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            promptLogin();
        });
    });

    document.querySelectorAll(".js-img-tell").forEach((img) => {
        if (img) {
            img.src = `/innocent/assets/image/avatar.svg`;
        }
    });

    const getEl = document.querySelector(".js-get-started");
    const getEl2 = document.querySelector(".js-get-started2");

    [getEl, getEl2].forEach((getEl) => {
        if (getEl) {
            getEl.addEventListener("click", (event) => {
                event.preventDefault();

                return promptLogin();
            });
        }
    });
}

axios
    .post(
        "/api/product/shared",
        {
            id,
            shopToken,
        },
        {
            headers: {
                "Content-type": "application/json",
            },
        }
    )
    .then((response) => {
        //console.log(response)

        if (response.status === 200 && response.data) {
            const singleProduct = response.data.products.singleProduct;
            const otherProducts = response.data.products.otherProduct;

            loadCarousel(singleProduct);
            getCarouselImg(singleProduct);
            updateUserProfile();

            //console.log(singleProduct);
            const { verify_status, badge_status } = singleProduct.user;

            if (verify_status == 1 && badge_status == 1) {
                loadProducts(otherProducts);
                loadMobileProduct(otherProducts);
            } else {
                const arrayProduct = [];
                arrayProduct.push(singleProduct);

                loadProducts(arrayProduct);
                loadMobileProduct(arrayProduct);
            }
        }
    })
    .catch((error) => {
        // console.log(error);
        if (error.response) {
            if (error.response.status === 404 && error.response.data) {
                Swal.fire({
                    icon: "error",
                    title: "Resources Unavailable",
                    confirmButtonColor: "#ffb705",
                    text: error.response.data.message,
                }).then(() => {
                    window.location.href = "/";
                });
            }
        }
    });

function loadCarousel(product) {
    const user = product.user;

    const getEl = document.querySelector(".js-get-started");
    const getEl2 = document.querySelector(".js-get-started2");

    if (token) {
        [getEl, getEl2].forEach((getEl) => {
            if (getEl) {
                getEl.addEventListener("click", (event) => {
                    event.preventDefault();

                   verificationBtnStatus(user);
                });
            }
        });
    }

    const badge =
        user.verify_status == 1 && user.badge_status == 1
            ? `<img src="/innocent/assets/image/badge.png" alt="">`
            : "";

    const img = getProdDesImage(product);

    const carouselHeader = `
     <div class="user_info2">
          ${img}
          <p class="user_name2 ms-2">${
              user.username ?? "No Username Provided"
          }<br>
              <span class="location2"> 
                   ${badge}
                  <i class="fa-solid fa-location-dot " style="font-size: 12px;"></i>
                  <span class="user_state">${
                      product.location ?? "No Location Provided"
                  }</span>
              </span>
          
          </p> 
          <div class="close_product_des"><a href="{{ url('/') }}"><i class="fa-solid fa-close "></i></a></div>
      </div>
      
      <div class="products_details_head2">
          <p class="sold3">
              sold ${product.sold ?? 0}
          </p>
          
          <p class="stock2">
              ${product.quantity ?? ""} in stock
          </p>
          
          <p class="${
              formatProductCondition(product) === "new"
                  ? "condition-new"
                  : "condition2"
          }">
              ${formatProductCondition(product)}
          </p>
    </div>`;

    document.querySelector(".js-header").innerHTML = carouselHeader;

    //LOAD CAROUSEL CONTENT;
    /*
    const verifyStatus = user.verify_status == 1 && user.badge_status == 1 ? ` <button  id="js-viewshop" class="product_card_veiw_shop_button" >
                  <a href="">view shop <img src="/innocent/assets/image/badge.png" alt="" ></a>  
                </button> ` : ''; */

    const btnBadge =
        user.verify_status == 1 && user.badge_status == 1
            ? ` <img src="/innocent/assets/image/Shopping bag.png" alt="" >`
            : "";

    const content = `
                <p class="product_name_on_sidebar" >${
                    product.title ?? "N/A"
                }</p>         
                      <hr>
                      <div class="price-wrapper">
                        <div class="main_and_promo_price_des_sidebar_shared">
                        ${getSharePrice(product)}
       
                        </div>
                        <div class="desc-wrapper">
                         <div style="display: flex; justify-content:space-between;">
                               <div>
                                <span><a class="review-link text-success me-2 fw-bold js-link" href="">Reviews</a></span>
                                <span class="rate">
                                <img style="margin-bottom:2px;" src="/innocent/assets/image/Rate.png" alt="">
                                <span class="rate_value fw-bold">${
                                    product.avg_rating
                                }</span>
                                </span>
                              
                                </div>
                            </div>

                        </div>

                    </div>
                    
                      <div>
                          <span style="font-weight: bold;">Description</span>
                          <p>
                          ${product.description}
                          </p>
                      </div>
                        <div class="connect_buttons">
                             <button  id="js-viewshop" class="product_card_veiw_shop_button" >
                              <a href="">view shop ${btnBadge}</a>  
                            </button>
                            <button  class="product_card_connect_button js-connect-btn">
                                <a href="">connect <img src="/innocent/assets/image/Shopping bag.png" alt="" ></a> 
                            </button>
                        </div>
                    </div>`;

    /*
    const content = `
    <p class="product_name_on_sidebar" >${product.title ?? 'N/A'}</p>         
          <hr>
          <div class="main_and_promo_price_des_sidebar">
          ${getIndexPrice(product)}
            
          </div>
        
          <div>
              <span style="font-weight: bold;">Description</span>
              <p>
              ${product.description}
              </p>
          </div>
            <div class="connect_buttons">
                 ${verifyStatus}
                <button  class="product_card_connect_button js-connect-btn">
                    <a href="">connect <img src="/innocent/assets/image/Shopping bag.png" alt="" ></a> 
                </button>
            </div>
        </div>`;

*/
    document.querySelector(".js-desc").innerHTML = content;

    if (document.getElementById("js-viewshop")) {
        document
            .getElementById("js-viewshop")
            .addEventListener("click", (event) => {
                event.preventDefault();
                //  const auth = getToken();

                if (token) {
                    const userId = user.id;
                    localStorage.setItem("userId", JSON.stringify(userId));

                    window.location.href = "/sellers-shop";
                } else {
                    promptLogin();
                }
            });
    }

    const connectBtn = document.querySelector(".js-connect-btn");

    connectBtn.addEventListener("click", (event) => {
        event.preventDefault();

        if (token) {
            loadConnect(product);
        } else {
            promptLogin();
        }
    });

    const mobileImg = getProdDesImage(product);

    const mobileHeader = ` <div>${mobileImg}</div>
             <div class="user_name_area">
                 <p class="user_name">${user.username ?? "No Data Provided"}</p>
     
                 <p class="location">
                     ${badge}
                     <span class="user_state_mobile">${
                         product.location ?? "No Data Provided"
                     }</span>
                    
                 </p>
             </div>
             <div class="products_details_head">
                 <p class="sold2">
                  sold ${product.sold ?? 0}
                 </p>
     
                 <p class="stock">
                     ${product.quantity ?? "N/A"} in stock
                 </p>
     
                 <p class="condition  ${
                     formatProductCondition(product) === "new"
                         ? "new-product"
                         : "used-product"
                 } ">
                    ${formatProductCondition(product)} 
                    
                 </p>
              </div>`;

    document.querySelector(".js-user-info").innerHTML = mobileHeader;

    const reviewLink = document.querySelector(".js-link");

    reviewLink.addEventListener("click", (event) => {
        event.preventDefault();

        if (!token) {
            promptLogin();
        } else {
            window.location.href = `/review/product?user=${user.id}&shop=${user.shop_token}`;
        }
    });
}

function getCarouselImg(product) {
    let images = JSON.parse(product.image_url);

    //console.log(images.length);

    let check = {};

    images.forEach((image, index) => {
        if (index === 0) {
            check["img_first"] = image;
        }
        if (index === 1) {
            check["img_second"] = image;
        }

        if (index === 2) {
            check["img_third"] = image;
        }
    });

    for (let field in check) {
        document.getElementById(
            `${field}`
        ).src = `/uploads/products/${check[field]}`;
    }

    if (!getCarouselImgLength(images)) {
        document.getElementById("img_second").style.display = "block";

        document.getElementById("img_third").style.display = "block";
    }
}

function getCarouselImgLength(images) {
    let isvalid = false;

    if (images.length < 2) {
        document.getElementById("img_second").style.display = "none";

        isvalid = true;
    }

    if (images.length < 3) {
        document.getElementById("img_third").style.display = "none";

        isvalid = true;
    }

    return isvalid;
}

function updateUserProfile() {
    const imgDesk = document.getElementById("js-profile-desk");

    const token = localStorage.getItem("apiToken");

    // console.log(token);

    if (token) {
        axios
            .get("/api/v1/getuser", {
                headers: {
                    Authorization: `Bearer ${token}`,
                },
            })
            .then((response) => {
                //  console.log(response);

                if (response.status === 200 && response.data) {
                    const authData = response.data;

                    loadDashboard(authData);

                    getProdProfileDescImg(authData, imgDesk);

                    document
                        .getElementById("logout-link")
                        .addEventListener("click", () => {
                            const auth = getToken();

                            if (auth) {
                                Swal.fire({
                                    title: "Are you sure?",
                                    text: "You won't be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#ffb705",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Yes,I am sure!",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        logoutUser();
                                    }
                                });
                            }
                        });

                    document.querySelectorAll(".js-img-tell").forEach((img) => {
                        if (img) {
                            getProdProfileDescImg(authData, img);
                        }
                    });
                }
            })
            .catch((error) => {
                //    console.log(error);
            });
    } else {
        const unAuthUser = null;

        loadDashboard(unAuthUser);

        document.querySelectorAll(".js-unauth").forEach((unauth) => {
            unauth.addEventListener("click", () => {
                promptLogin();
            });
        });
        getProdProfileDescImg(unAuthUser, imgDesk);
    }
}

function loadProducts(otherProducts) {
    //console.log(otherProducts);

    let displayTopContent = "";
    let displayDownContent = "";

    otherProducts.forEach((product, index) => {
        //OBJECT DESTRUCTURING;
        const { image_url, title, location, id, sold, avg_rating } = product;

        let displayProduct = `
       <a href="" class="product_card_link js-id" data-product-id="${id}">
              <div class="card product_card">
                  <h6 class="sold ${
                      formatProductCondition(product) === "new"
                          ? "new-product"
                          : "used-product"
                  }" ">${formatProductCondition(product)} </h6>
                  <img src="/uploads/products/${getSingleImage(
                      image_url
                  )}" class="card-img-top w-100 product_image" alt="...">
                  <div class="product_card_title">
                     <div class="price-wrapper">
                        <div class="main_and_promo_price_area">
                            ${getIndexPrice(product)} 
                        </div>
                          <div class="rate-wrapper">
                            <img src="/kaz/images/Rate.png" alt="" style="width: 20px; height: 20px;">
                            <span class="avg-rate">${
                                product.avg_rating || 0
                            }</span>
                          </div>
                      </div>
                          <p class="product_name">${title ?? "N/A"}</p>
                          <span class="product_card_location"><i class="fa-solid fa-location-dot"></i>  ${
                              location ?? "N/A"
                          }</span>
                          ${getBadge(product)}
                          <span class="connect"><strong>connect</strong></span>                    
                  </div>
              </div>
        </a>`;

        if (index <= 24) {
            displayTopContent += displayProduct;
        } else {
            displayDownContent += displayProduct;
        }
    });

    document.querySelector(".js-desktop-card").innerHTML = displayTopContent;
    document.querySelector(".js-desktop-card-down").innerHTML =
        displayDownContent;

    const cardElements = document.querySelectorAll(".js-id");

    getCardId(cardElements);
}

function getCardId(cards) {
    cards.forEach((card) => {
        card.addEventListener("click", (event) => {
            event.preventDefault();

            //Using object destructuring
            const { productId } = card.dataset;

            if (token) {
                //console.log(productId);

                axios
                    .get(`/api/product-details/${productId}`, {
                        headers: {
                            "Content-type": "application/json",
                        },
                    })
                    .then((response) => {
                        // console.log(response)

                        if (response.status === 200 && response.data) {
                            const product = response.data.product;

                            loadCarousel(product);
                            getCarouselImg(product);
                        }
                    })
                    .catch((error) => {
                        // console.log(error);

                        if (error.response) {
                            if (
                                error.response.status === 400 &&
                                error.response.data
                            ) {
                                Swal.fire({
                                    icon: "error",
                                    confirmButtonColor: "#ffb705",
                                    title: "Resources Unavailable",
                                    text: error.response.data.message,
                                }).then(() => {
                                    window.location.href = "/";
                                });
                            }
                        }
                    });
            } else {
                promptLogin();
            }
        });
    });
}

// document.querySelector('.js-search-bar-input').addEventListener('click', (event) => {

//   if(!token) {
//     event.preventDefault();

//     promptLogin();
//   }

// })

function loadMobileProduct(products) {
    let displayTopContent = "";
    let displayDownContent = "";

    products.forEach((product, index) => {
        //OBJECT DESTRUCTURING;
        const { image_url, title, location, id } = product;

        const display = ` <a href="/product_des" class="product_card_link" data-product='${id}'>
           <div class="card product_card">
               <h6 class="sold ${
                   formatProductCondition(product) === "new"
                       ? "new-product"
                       : "used-product"
               } ">${formatProductCondition(product)} </h6>
               <img src="/uploads/products/${getSingleImage(
                   product.image_url
               )}"  class="card-img-top w-100 product_image" alt="${
            product.title
        }">
               <div class="product_card_title">
                    <div class="price-wrapper">
                    <div class="main_and_promo_price_area">
                        ${getTestPrice(product)} 
                    </div>
                    <div class="rate-wrapper">
                    <img src="/kaz/images/Rate.png" alt="" style="width: 20px; height: 20px;">
                    <span class="avg-rate">${product.avg_rating || 0}</span>
                  </div>
                    </div>
                   <p class="product_name">${product.title}</p>
                   <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> ${
                       product.location
                   }</span>
                    ${getBadge(product)}
                   <span class="connect"><strong>connect</strong></span>
               </div>
           </div>
       </a>`;

        if (index <= 12) {
            displayTopContent += display;
        } else {
            displayDownContent += display;
        }
    });

    document.querySelector(".js-test").innerHTML = displayTopContent;
    document.querySelector(".js-mobileCard-down").innerHTML =
        displayDownContent;

    const mobileCardElements = document.querySelectorAll(".js-mobile-id");

    getCardId(mobileCardElements);
}

document.querySelector(".js-send-input").addEventListener("click", () => {
    if (!token) {
        promptLogin();

        return;
    }

    const input = document.querySelector(".js-input2");

    if (input.value.trim() === "") return send(input);

    sendProductRequest(input.value, token);
});

document.querySelector(".js-send-mobile").addEventListener("click", () => {
    if (!token) {
        promptLogin();

        return;
    }

    const input = document.querySelector(".js-input-mobile");

    if (input.value.trim() === "") return send(input);

    sendProductRequest(input.value, token);
});

document.querySelector(".js-help-shared").addEventListener("click", (event) => {
    event.preventDefault();

    if (!token) {
        promptLogin();

        return;
    }

    displayHelpCenter();
});

document.querySelectorAll(".js-change-to-input").forEach((input) => {
    if (input) {
        input.addEventListener("click", () => {
            if (!token) {
                promptLogin();

                return;
            }

            changeToInput();
        });
    }
});

const input = document.querySelector(".search-input");
const btn = document.querySelector(".search");

btn.addEventListener("click", () => {
    if (!token) {
        promptLogin();

        return;
    }

    inputSearch();
});

input.addEventListener("keypress", (event) => {
    if (!token) {
        event.preventDefault();

        promptLogin();

        return;
    }

    if (event.key === "Enter") {
        inputSearch();
    }
});

function inputSearch() {
    const search_input = input.value;

    if (search_input.trim() === "") {
        Swal.fire({
            icon: "error",
            title: "Search",
            text: "Please input a search parameter",
            confirmButtonColor: "#ffb705",
        });

        return;
    }

    input.value = "";

    localStorage.setItem("input", search_input);

    window.location.href = "/search";
}

function changeToInput() {
    document.querySelector(".tell_us_paragraph").style.display = "none";
    document.querySelector(".tell_us_what_u_want_input_area").style.display =
        "flex";
    document.querySelector(".tell_us_input").focus();
    document.querySelector(".tell_us_input").value = "";
}

function send(input) {
    if (input.value.trim() === "") {
        var myModal = new bootstrap.Modal(
            document.getElementById("tell_us_what_u_want_input_condition")
        );
        myModal.show();
    }
    // else {
    //   document.querySelector(".tell_us_what_u_want_input_area").style.display="none"
    //   document.querySelector(".loader").style.display="block";
    //   setTimeout(function(){
    //     document.querySelector(".loader").style.display="none";
    //     document.querySelector(".submmited").style.display="block";
    //     setTimeout(function(){
    //         document.querySelector(".submmited").style.display="none";
    //         document.querySelector(".tell_us_paragraph").style.display="block";
    //     }, 2000);
    //   }, 2000);
    // }
}
