import {
    displayHelpCenter,
    getIndexProfileImage,
    sendProductRequest,
    promptLogin,
    formatPrice,
    getShopPrice,
    getIndexPrice,
    formatProductCondition,
    showLoader,
    hideLoader,
    getStarted,
    dropDownDetails,
    loadResponse,
    checkProfileReg,
} from "./helper/helper.js";



const token = localStorage.getItem("apiToken");

axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;

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

    document.querySelectorAll(".js-default").forEach((defaultImg) => {
        if (defaultImg) {
            defaultImg.src = `/innocent/assets/image/avatar.svg`;
        }
    });

    const becomeLinks = document.querySelectorAll(".js-become-link");

    becomeLinks.forEach((link) => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            promptLogin();
        });
    });

    const guestDashboard = ` <div class="profile_card_user_name">
                <img class="mt-2" id="profile_image" src="/innocent/assets/image/avatar.svg" alt="Profile Image"
                style="width: 50px; height:50px; border-radius:50px;">
                 <p id="profile_name" >Guest User <br>
                    <span id="profile_email">GuestUser@gmail.com</span>
                  </p>
            </div>
            <hr>
            <div class="accont_features">
                <p><a class="js-auth" href="">Dashboard</a></p>
                <p><a class="js-auth" href=""> Refer a Friend </a></p>
                <p> <a class="js-auth" href="">Privacy and Policy </a></p>
                <p><a class="js-auth" href="#" id="logoutLink">Log In</a></p>
            </div>`;

    document.querySelector(".js-guest").innerHTML = guestDashboard;

    document.querySelectorAll(".js-auth").forEach((unAuthEl) => {
        if (unAuthEl) {
            unAuthEl.addEventListener("click", (event) => {
                event.preventDefault();
                promptLogin();
            });
        }
    });
} else {
    logoImg.addEventListener("click", () => {
        logoImg.dataset.bsToggle = "";
        logoImg.dataset.bsTarget = "";
    });
}

axios
    .get("/api/allproduct")

    .then(function (response) {
        const products = response.data;

        //  console.log(products);
        localStorage.setItem("allProducts", JSON.stringify(products));
        renderProductsAndSections(products);
    })
    .catch(function (error) {
        //  console.log(error);
    });

const newBtn = document.querySelector(".js-new");
const used = document.querySelector(".js-used");
const locations = document.querySelectorAll(".location");
const verified = document.querySelector('input[name="verify"]');

verified.addEventListener("change", () => {
    if (!token) {
        promptLogin();
        return;
    }

    const filters = { verified: verified.checked };

    document.querySelector(".filter-result").style.display = "none";

    applyFilter(filters);
});

locations.forEach((location) => {
    location.addEventListener("click", () => {
        if (!token) {
            promptLogin();
            return;
        }

        const value = document.querySelector(".locationInput").value;

        const filters = { location: value.trim() };

        document.querySelector(".filter-result").style.display = "none";

        applyFilter(filters);
    });
});

newBtn.addEventListener("click", () => {
    if (!token) {
        promptLogin();
        return;
    }

    newBtn.classList.toggle("newBtn");

    used.classList.remove("usedBtn");

    const newValue = newBtn.dataset.value;

    const filters = { newValue };

    applyFilter(filters);
    document.querySelector(".filter-result").style.display = "none";
});

used.addEventListener("click", () => {
    if (!token) {
        promptLogin();
        return;
    }

    used.classList.toggle("usedBtn");

    newBtn.classList.remove("newBtn");

    // used.classList.toggle('usedBtn');

    const usedValue = used.dataset.value;

    const filters = { used: usedValue };

    applyFilter(filters);
    document.querySelector(".filter-result").style.display = "none";
});

function applyFilter(filters) {
    // console.log(filters.newValue);

    axios
        .get("/api/v1/product/filter", { params: filters })
        .then(function (response) {
            //  console.log(response);

            const products = response.data.products;

            if (products.length === 0) {
                document.querySelector(".filter-result").style.display =
                    "block";

                // setTimeout(() => {
                //     document.querySelector('.filter-result').style.display = 'none';
                //     window.location.reload();

                // },8000);
            }
            renderProductsAndSections(products);
        })
        .catch(function (error) {
            console.error("Error fetching filtered products:", error);
        });
}

function renderProductsAndSections(products) {
    const productCardDisplay1 = document.getElementById("productCardDisplay");
    const productCardDisplay2 = document.getElementById("productCardDisplay2");

    productCardDisplay1.innerHTML = "";
    productCardDisplay2.innerHTML = "";

    products.forEach((product, index) => {
        // Render product card

        //console.log(product)
        const card = createProductCard(product);

        // Insert product into appropriate container
        if (index < 12) {
            productCardDisplay1.appendChild(card);
        } else {
            productCardDisplay2.appendChild(card);
        }
    });
}

/*
function createProductCard(product) {

    const card = document.createElement('div');
            card.className = 'card';

    let product_img_url = '';
    JSON.parse(product.image_url).forEach((el, i) => {
        if (i === 0) product_img_url = el;
    });

   
    const{verify_status, badge_status,} = product?.user ?? product;

   const badge = verify_status == 1 && badge_status == 1 ? `<img class="logo-bag" src="kaz/images/badge.png" alt="">` : `<img src="innocent/assets/image/logo icon.svg" alt="">`;
   const sold = document.querySelector('.sold');

    // Define a sanitize function for the product description if needed
    const sanitizeString = (str) => {
        return str.replace(/'/g, "\\'") // Escape single quotes
            .replace(/"/g, '\\"') // Escape double quotes
            .replace(/\\/g, '\\\\') // Escape backslashes
            .replace(/\n/g, '\\n') // Escape newlines
            .replace(/\r/g, '\\r') // Escape carriage returns
            .replace(/\u2028/g, '\\u2028') // Escape line separator
            .replace(/\u2029/g, '\\u2029'); // Escape paragraph separator
    };

    const sanitizedProduct = {
        ...product,
        description: product.description ? sanitizeString(product.description) : ""
    };


   
    card.innerHTML = `
        <a href="/product_des" class="product_card_link js-auth-card" data-product='${JSON.stringify(product)}'>
            <div class="card product_card">
                <h6 class="sold ${formatProductCondition(product) === 'new' ? 'new-product' : 'used-product'}">${formatProductCondition(product)} <br> <img src="innocent/assets/image/Rate.png" alt=""> ${product.avg_rating || 0}</h6> 
                <img src="uploads/products/${product_img_url || 'default.jpg'}" class="card-img-top w-100 product_image" alt="${product.title}">
                <div class="product_card_title">
                    <div class="main_and_promo_price_area">
                        ${getIndexPrice(product)}   
                    </div>

                    <p class="product_name">${product.title}</p>
                    <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> ${product.location}</span>
                    ${badge}
                    <span class="connect"><strong>connect</strong></span>
                </div>
            </div>
        </a>
    `;

    card.querySelector('.product_card_link').addEventListener('click', function (event) {
        event.preventDefault();

        if(!token) {
            promptLogin();

            return
            
        }

        const productData = this.getAttribute('data-product');
        const parsedData = JSON.parse(productData);
        
        localStorage.setItem('selectedProduct', JSON.stringify(parsedData));

    window.location.href = this.href;
    });

    return card;
}
*/
function createProductCard(product) {
    const card = document.createElement("div");
    card.className = "card";

    let product_img_url = "";
    JSON.parse(product.image_url).forEach((el, i) => {
        if (i === 0) product_img_url = el;
    });

    const { verify_status, badge_status } = product?.user ?? product;

    const badge =
        verify_status == 1 && badge_status == 1
            ? `<img class="logo-bag" src="kaz/images/badge.png" alt="">`
            : `<img src="innocent/assets/image/logo icon.svg" alt="">`;

    const sanitizeString = (str) => {
        return str
            .replace(/'/g, "&#39;") // Escape single quotes
            .replace(/"/g, "&quot;") // Escape double quotes
            .replace(/\\/g, "&#92;") // Escape backslashes
            .replace(/\n/g, " ") // Replace newlines with a space
            .replace(/\r/g, " ") // Replace carriage returns with a space
            .replace(/\u2028/g, "&#8238;") // Escape line separator
            .replace(/\u2029/g, "&#8239;") // Escape paragraph separator
            .replace(/[\r\n]+/g, " "); // Remove all \r\n sequences
    };

    const sanitizedProduct = {
        ...product,
        description: product.description
            ? sanitizeString(product.description)
            : "",
    };

    const jsonString = JSON.stringify(sanitizedProduct);
    const encodedJson = jsonString.replace(/"/g, "&quot;"); // Encode quotes for HTML attribute

    card.innerHTML = `
    <a href="/product_des" class="product_card_link js-auth-card" data-product="${encodedJson}">
        <div class="card product_card">
            <h6 class="sold ${
                formatProductCondition(product) === "new"
                    ? "new-product"
                    : "used-product"
            }">${formatProductCondition(product)}  </h6> 
            <img src="uploads/products/${
                product_img_url || "default.jpg"
            }" class="card-img-top w-100 product_image" alt="${product.title}">
            <div class="product_card_title">
              <div class="price-wrapper">
                <div class="main_and_promo_price_area">
                    ${getIndexPrice(product)} 
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
                ${badge}
                <span class="connect"><strong>connect</strong></span>
            </div>
        </div>
    </a>
`;
    /*
    card.innerHTML = `
        <a href="/product_des" class="product_card_link js-auth-card" data-product="${encodedJson}">
            <div class="card product_card">
                <h6 class="sold ${formatProductCondition(product) === 'new' ? 'new-product' : 'used-product'}">${formatProductCondition(product)} <br> <img src="innocent/assets/image/Rate.png" alt=""> ${product.avg_rating || 0}</h6> 
                <img src="uploads/products/${product_img_url || 'default.jpg'}" class="card-img-top w-100 product_image" alt="${product.title}">
                <div class="product_card_title">
                    <div class="main_and_promo_price_area">
                        ${getIndexPrice(product)}   
                    </div>

                    <p class="product_name">${product.title}</p>
                    <span class="product_card_location"><i class="fa-solid fa-location-dot"></i> ${product.location}</span>
                    ${badge}
                    <span class="connect"><strong>connect</strong></span>
                </div>
            </div>
        </a>
    `;
*/
    card.querySelector(".product_card_link").addEventListener(
        "click",
        function (event) {
            event.preventDefault();

            if (!token) {
                promptLogin();
                return;
            }

            const productData = this.getAttribute("data-product");
            try {
                const parsedData = JSON.parse(productData);
                console.log(parsedData);
                localStorage.setItem(
                    "selectedProduct",
                    JSON.stringify(parsedData)
                );
                window.location.href = this.href;
            } catch (error) {
                console.error("Error parsing JSON:", error);
            }
        }
    );

    return card;
}

// FETCH THE USER DATA
document.addEventListener("DOMContentLoaded", () => {
    if (token) {
        fetchUserData(token);
    }
});

function fetchUserData(token) {
    axios
        .get("/api/v1/getuser", {
            headers: {
                Authorization: "Bearer " + token,
            },
        })
        .then((response) => {
            const user = response.data;

            //console.log(user);
            updateUserProfile(user);

            loadCheckEl(user);
        })
        .catch((error) => {
            //  console.error('Error fetching user data:', error);
            if (error.response) {
                if (error.response.status === 401 && error.response.data) {
                    localStorage.clear();
                }
            }
        });
}

function loadCheckEl(user) {
    const startSellingEl = document.querySelectorAll(".js-selling-check");

    startSellingEl.forEach((start) => {
        if (start) {
            start.addEventListener("click", (event) => {
                event.preventDefault();

                checkProfileReg(user);
            });
        }
    });
}

function updateUserProfile(user) {
    const userDashboard = dropDownDetails(user);

    document.querySelector(".js-index-dashboard").innerHTML = userDashboard;

    const profileImageElement = document.getElementById("profile_image");
    const profilePictureElement = document.getElementById("profile_picture");
    const profilePictureMobileElement = document.getElementById(
        "profile_picture_mobile"
    );
    const userRequestEl = document.querySelector(".js-tell-us");
    console.log(user);



    if (user) {
        getIndexProfileImage(user, profileImageElement);
        getIndexProfileImage(user, profilePictureElement);
        getIndexProfileImage(user, profilePictureMobileElement);
        getIndexProfileImage(user, userRequestEl);

        const getEl = document.querySelector(".js-get-started");

        getEl.addEventListener("click", (event) => {
            event.preventDefault();

    
            if (user.verify_status == 1 && user.badge_status == 1) {
              return  console.log(user, 'verified & active badge');
                const title =
                    '<span class="text-success">verified seller</span>';
                const content =
                    '<span class="text-dark">You have an active badge</span>';

                loadResponse(title, content);
            }

            if (user.verify_status == -2 && user.badge_status == 0) {
            return    console.log(user, 'pending verification');
                const title =
                    '<span class="text-success">Pending Verification</span>';
                const content =
                    '<span class="text-dark">Awaiting Admin Approval </span>';

                loadResponse(title, content);
            }

            if (user.verify_status == 0 && user.badge_status == 0) {
           return     console.log(user, 'No verification and badge');
                window.location.href = "/become";
            }

            if (user.verify_status == 1 && user.badge_status == -1) {
               return     console.log(user, 'verified & badge expired');
                 //badge expired
                window.location.href = "/badge";
            }
        });
    } else {
        //  console.error('User data is null or undefined');
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const categoryLinks = document.querySelectorAll(".category-link");

    categoryLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            event.preventDefault();

            if (!token) {
                promptLogin();

                return;
            }
            const categoryId = this.getAttribute("data-category-id");
            const categoryName = this.getAttribute("data-category-name");

            axios
                .get(`/api/v1/categories/${categoryId}`)
                .then(function (response) {
                    const products = response.data.data;
                    localStorage.setItem(
                        "allProducts",
                        JSON.stringify(products)
                    );
                    localStorage.setItem("categoryName", categoryName);
                    window.location.href = `/category_search/search?category=${categoryId}`;
                })
                .catch(function (error) {
                    //      console.error('Error fetching products:', error);
                });
        });
    });
});

document
    .getElementById("notification_icon")
    .addEventListener("click", function (e) {
        e.stopPropagation();
        if (!token) {
            document.getElementById("notification_main").style.display = "none";
            promptLogin();

            return;
        }
    });

document.querySelector(".js-send").addEventListener("click", () => {
    if (!token) {
        promptLogin();

        return;
    }

    const shopNo = document.querySelector(".js-input-value").value;

    getVerifiedSellerShop(shopNo);
});

document.querySelector(".js-mobile-send").addEventListener("click", () => {
    if (!token) {
        promptLogin();

        return;
    }

    const shopNo = document.querySelector(".js-mobile-input").value;

    getVerifiedSellerShop(shopNo);
});

function getVerifiedSellerShop(shopNo) {
    if (shopNo.trim() === "") {
        Swal.fire({
            icon: "error",
            title: "Verified Seller Shop",
            text: "Shop No Is Required",
            confirmButtonColor: "#ffb705",
        });

        return;
    }

    axios
        .get("/api/v1/verified-seller/details", {
            params: {
                shopNo,
            },
            headers: {
                "Content-type": "application/json",
                Authorization: `Bearer ${token}`,
            },
        })
        .then((response) => {
            //  console.log(response)

            if (response.status === 200 && response.data) {
                const userId = response.data.data;

                //console.log(userId);

                localStorage.setItem("userId", JSON.stringify(userId));

                window.location.href = "/sellers-shop";
            }
        })
        .catch((error) => {
            //    console.log(error);

            if (error.response) {
                if (error.response.status === 404 && error.response.data) {
                    Swal.fire({
                        icon: "error",
                        title: "Verified Seller Shop",
                        confirmButtonColor: "#ffb705",
                        text: error.response.data.message,
                    });
                }
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Request Error",
                    text: "Something went wrong. Please try again later.",
                    confirmButtonColor: "#ffb705",
                });
            }
        });
}

document.querySelector(".js-change-to-input").addEventListener("click", () => {
    if (!token) {
        return;
    }
    changeToInput();
});

document.querySelector(".js-send-input").addEventListener("click", () => {
    if (!token) {
        return;
    }

    send();

    const input = document.querySelector(".js-tell-us-input").value;

    if (input.trim() === "") {
        return;
    }

    sendProductRequest(input, token);
});

document.querySelector(".js-help").addEventListener("click", (event) => {
    event.preventDefault();

    if (!token) {
        promptLogin();
        return;
    }

    displayHelpCenter();
});

function changeToInput() {
    document.querySelector(".tell_us_paragraph").style.display = "none";
    document.querySelector(".tell_us_what_u_want_input_area").style.display =
        "flex";
    document.querySelector(".tell_us_input").focus();
    document.querySelector(".tell_us_input").value = "";
}

function send() {
    var inputText = document.querySelector(".tell_us_input").value.trim();
    if (inputText === "") {
        var myModal = new bootstrap.Modal(
            document.getElementById("tell_us_what_u_want_input_condition")
        );
        myModal.show();
    } else {
        document.querySelector(
            ".tell_us_what_u_want_input_area"
        ).style.display = "none";
        document.querySelector(".loader").style.display = "block";
        setTimeout(function () {
            document.querySelector(".loader").style.display = "none";
            document.querySelector(".submmited").style.display = "block";
            setTimeout(function () {
                document.querySelector(".submmited").style.display = "none";
                document.querySelector(".tell_us_paragraph").style.display =
                    "block";
            }, 2000);
        }, 2000);
    }
}

const input = document.querySelector(".search-input");
const btn = document.querySelector(".search");

btn.addEventListener("click", () => {
    inputSearch();
});

input.addEventListener("keypress", (event) => {
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
