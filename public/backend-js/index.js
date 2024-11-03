import { getIndexProfileImage } from "./helper/helper.js";


const token = localStorage.getItem('apiToken');


axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;




axios.get('/api/allproduct')

.then(function (response) {
    const products = response.data;

   // console.log(products);
    localStorage.setItem('allProducts', JSON.stringify(products));
    renderProductsAndSections(products);
})
.catch(function (error) {
    console.log(error);
});



document.getElementById('clickMe').addEventListener('click', () => {
    applyFilter();
})
document.getElementById('verifiedSeller').addEventListener('click', () => {
    applyFilter();
})
//THIS IS FOR PRODUCTS
function applyFilter() {

    if(!token) {

        promptLogin();
    }
    

    const locationFilter = document.getElementById('clickMe').innerText.trim().toLowerCase();
    const verifiedSeller = document.getElementById('verifiedSeller').checked ? 1 : 0;




    let condition = '';
    const conditionButton = document.querySelector('.product_condition_desktop .button.clicked');

    if (conditionButton) {

      const conditionButtonValue = conditionButton.getAttribute('data-value');
      condition = conditionButtonValue.trim().toLowerCase();
       
    }

    const filters = {
        condition: condition,
        location: locationFilter,
        verifyStatus: verifiedSeller,
    };

    console.log('Filters applied:', filters);
   

    axios.get('/api/v1/product/filter', { params: filters},)
        .then(function (response) {
            const products = response.data;
            console.log(products);
            renderProductsAndSections(products);
        })
        .catch(function (error) {
            console.error('Error fetching filtered products:', error);
        });
}

// Function to handle condition button toggle
function toggleButton(button) {
    if(!token) {
        promptLogin();
    }


    document.querySelectorAll('.product_condition_desktop .button').forEach(btn => btn.classList.remove('clicked'));
    button.classList.add('clicked');
    applyFilter();
}


document.addEventListener('DOMContentLoaded', function () {
    
    document.querySelectorAll('.product_condition_desktop .button').forEach(button => {
        button.addEventListener('click', function() {  
            if(!token) {
                promptLogin();
            }

            toggleButton(this);
        });
    });

    document.getElementById('verifiedSeller').addEventListener('change', function() {
        if(!token) {

           promptLogin();
        }

        applyFilter();
    });

    document.getElementById('clickMe').addEventListener('input', function() {
        if(!token) {

        promptLogin();
    }
        applyFilter();
    });
});


function renderProductsAndSections(products) {
    const productCardDisplay1 = document.getElementById('productCardDisplay');
    const productCardDisplay2 = document.getElementById('productCardDisplay2');

    productCardDisplay1.innerHTML = ''; // Clear the container first
    productCardDisplay2.innerHTML = ''; // Clear the container first

    products.forEach((product, index) => {
        // Render product card

        //console.log(product)
        const card = createProductCard(product);

        // Insert product into appropriate container
        if (index < 9) {
            productCardDisplay1.appendChild(card);
        } else {
            productCardDisplay2.appendChild(card);
        }
    });
}

function createProductCard(product) {

    const card = document.createElement('div');
            card.className = 'card';

    let product_img_url = '';
    JSON.parse(product.image_url).forEach((el, i) => {
        if (i === 0) product_img_url = el;
    });

    console.log(product);
    const{verify_status, badge_status} = product.user;

   const badge = verify_status === 1 && badge_status === 1 ? `<img class="logo-bag" src="kaz/images/badge.png" alt="">` : `<img src="innocent/assets/image/logo icon.svg" alt="">`;


    card.innerHTML = `
        <a href="/product_des" class="product_card_link" data-product='${JSON.stringify(product)}'>
            <div class="card product_card">
                <h6 class="sold"> Sold ${product.sold || 0} <br> <img src="innocent/assets/image/Rate.png" alt=""> ${product.rating || 0}</h6>
                <img src="uploads/products/${product_img_url || 'default.jpg'}" class="card-img-top w-100 product_image" alt="${product.title}">
                <div class="product_card_title">
                    <div class="main_and_promo_price_area">
                        ${
                            product.ask_for_price
                            ? '<p class="ask-for-price" style="color:red; padding-right: 2px; font-size:23px">Ask for price</p>'
                            : `
                                <p class="promo_price">$${product.promo_price || ''}</p>
                                <div class="main_price"><p class="main_price_amount">$${product.actual_price || ''}</p></div>
                            `
                        }
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
        //console.log( this.getAttribute('data-product'))
        localStorage.setItem('selectedProduct', this.getAttribute('data-product'));

      console.log(window.location.href = this.href);
    });

    return card;
}


 // FETCH THE USER DATA
document.addEventListener('DOMContentLoaded', () => {
    if (token) {
        fetchUserData(token);
    } 
});

function fetchUserData(token) {

    axios.get('/api/v1/getuser', {
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
    .then(response => {
        const user = response.data;

        //console.log(user)

        updateUserProfile(user);
    })
    .catch(error => {
        console.error('Error fetching user data:', error);
        if (error.response && error.response.status === 401) {
           // promptLogin('Your session has expired. Please log in again.');
        }
    });
}

function updateUserProfile(user) {

    const nameElement = document.getElementById('profile_name');
    const emailElement = document.getElementById('profile_email');
    const profileImageElement = document.getElementById('profile_image');
    const profilePictureElement = document.getElementById('profile_picture');
    const profilePictureMobileElement = document.getElementById('profile_picture_mobile');

    if (user) {
        nameElement.innerHTML = `${user.username ?? 'No Username Provided'} <br>`;
        emailElement.innerHTML = user.email ?? 'No email provided';
        
        getIndexProfileImage(user, profileImageElement);
        getIndexProfileImage(user, profilePictureElement);
        getIndexProfileImage(user, profilePictureMobileElement);

    

    } else {
        console.error('User data is null or undefined');
    }
}


function promptLogin() {
    Swal.fire({
        icon: 'error',
        title: 'Login Required',
        text: 'Please login to continue'
    }).then(() => {
    
        const myModal = new bootstrap.Modal(document.querySelector('#signup_login-modal'));
        myModal.show();



    });
}


document.addEventListener('DOMContentLoaded', function () {
    const categoryLinks = document.querySelectorAll('.category-link');

    categoryLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            if(!token) {

                promptLogin();
            }
            event.preventDefault();
            const categoryId = this.getAttribute('data-category-id');
            const categoryName = this.getAttribute('data-category-name');
            

            axios.get(`/api/v1/categories/${categoryId}`,)
            .then(function (response) {
                const products = response.data.data;
                localStorage.setItem('allProducts', JSON.stringify(products));
                localStorage.setItem('categoryName', categoryName);
                window.location.href = "/category_search";
            })
            .catch(function (error) {
                console.error('Error fetching products:', error);
            });
        });
    });
});


document.getElementById('notification_icon').addEventListener('click', function(e) {
    e.stopPropagation();
    if(!token) {
        document.getElementById("notification_main").style.display = "none";
        promptLogin();

    }
    
  });



document.querySelector('.js-send').addEventListener('click', () => {

 const shopNo =  document.querySelector('.js-input-value').value;

    if (shopNo.trim()  === '' ) {

        Swal.fire({
                icon: 'error',
                title: 'Verified Seller Shop',
                text: 'Shop No Is Required', })

    }else {

        getVerifiedSellerShop(shopNo)

   }


});

function getVerifiedSellerShop(shopNo) {

    
    axios.get('/api/v1/verified-seller/details', {

        params: {
            shopNo,

        },
        headers: {
            'Content-type': 'application/json',
            'Authorization': `Bearer ${token}`,
        }
    }).then((response) =>{

        console.log(response)

        if(response.status === 200 && response.data) {

         const userId = response.data.data;

         //console.log(userId);

         localStorage.setItem('userId', JSON.stringify(userId))

         window.location.href = '/sellers-shop';

        }

    }).catch((error) => {

        console.log(error);

        if(error.response) {

            if(error.response.status === 404 && error.response.data) {

                Swal.fire({
                icon: 'error',
                title: 'Verified Seller Shop',
                text: error.response.data.message});

            }

        }else {   

            Swal.fire({
                 icon: 'error',
                 title: 'Request Error',
                 text: 'Something went wrong. Please try again later.', });


        }

        
        
    })


}





if(!token) {

  document.querySelectorAll('.js-start-selling').forEach((sellingPage) => {

    sellingPage.addEventListener('click', (event) => {
        event.preventDefault();
        promptLogin();
        
    })

  });


  document.querySelector('.js-send').addEventListener('click', (event) => {
    event.preventDefault()
    promptLogin();

  });


  document.querySelector('.js-search').addEventListener('click',(event) => {
    event.preventDefault();
    promptLogin();  

  })

}





