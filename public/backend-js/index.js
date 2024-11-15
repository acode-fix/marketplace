import { displayHelpCenter, getIndexProfileImage, sendProductRequest, promptLogin, formatPrice, getShopPrice, getIndexPrice } from "./helper/helper.js";


const token = localStorage.getItem('apiToken');


axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

const logoImg =  document.querySelector('.js-logo-img');
const logoLink = document.querySelector('.js-logo-link');

if(!token) {

   logoLink.addEventListener('click', (event) => {
        event.preventDefault();

    });

    
    logoImg.addEventListener('click', () => {
        
        logoImg.dataset.bsToggle = 'modal';
        logoImg.dataset.bsTarget = '#signup_login-modal';

    })



    document.querySelectorAll('.js-auth').forEach((unAuthEl) => {

        if(unAuthEl) {

            unAuthEl.addEventListener('click', (event) => {
                event.preventDefault();
                promptLogin();
            });

         }

       

    });

    document.querySelectorAll('.js-default').forEach((defaultImg) => {

        if(defaultImg) {

            defaultImg.src = `/innocent/assets/image/avatar.svg`;

        }

    });

   const becomeLinks = document.querySelectorAll('.js-become-link');

   becomeLinks.forEach((link) => {
    link.addEventListener('click', (event) => {
        event.preventDefault();
        promptLogin();
    
    
        
       });

   });


   

   


 const guestDashboard =   ` <div class="profile_card_user_name">
                <img class="mt-2" id="profile_image" src="/innocent/assets/image/avatar.svg" alt="Profile Image"
                style="width: 50px; height:50px; border-radius:50px;">
                <p id="profile_name">Guest User
                </p>
                <p><span id="profile_email">GuestUser@gmail.com</span></p>
            </div>
            <hr>
            <div class="accont_features">
                <p><a href="">Account Setting </a></p>
                <p><a href=""> Reffer a Friend </a></p>
                <p> <a href="">Privacy and Policy </a></p>
                <p><a href="#" id="logoutLink">Log out</a></p>
            </div>`;


 document.querySelector('.js-guest').innerHTML = guestDashboard;


}else {



logoImg.addEventListener('click', () => {
    logoImg.dataset.bsToggle = '';
    logoImg.dataset.bsTarget = '';
})


}




axios.get('/api/allproduct')

.then(function (response) {
    const products = response.data;

   //console.log(products);
    localStorage.setItem('allProducts', JSON.stringify(products));
    renderProductsAndSections(products);
})
.catch(function (error) {
  //  console.log(error);
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

   // console.log('Filters applied:', filters);
   

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

   // console.log(product);
   // const{verify_status, badge_status} = product.user;
    const{verify_status, badge_status,} = product?.user ?? product;

   const badge = verify_status === 1 && badge_status === 1 ? `<img class="logo-bag" src="kaz/images/badge.png" alt="">` : `<img src="innocent/assets/image/logo icon.svg" alt="">`;

   //${getShopPrice(product)}


    card.innerHTML = `
        <a href="/product_des" class="product_card_link js-auth-card" data-product='${JSON.stringify(product)}'>
            <div class="card product_card">
                <h6 class="sold"> Sold ${product.sold || 0} <br> <img src="innocent/assets/image/Rate.png" alt=""> ${product.avg_rating || 0}</h6>
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
    const userRequestEl = document.querySelector('.js-tell-us');

    if (user) {
        nameElement.innerHTML = `${user.username ?? 'No Username Provided'} <br>`;
        emailElement.innerHTML = user.email ?? 'No email provided';
        
        getIndexProfileImage(user, profileImageElement);
        getIndexProfileImage(user, profilePictureElement);
        getIndexProfileImage(user, profilePictureMobileElement);
        getIndexProfileImage(user, userRequestEl);

    

    } else {
      //  console.error('User data is null or undefined');
    }
}



document.addEventListener('DOMContentLoaded', function () {
    const categoryLinks = document.querySelectorAll('.category-link');

    categoryLinks.forEach(link => {
        link.addEventListener('click', function (event) {
           
            event.preventDefault();

            if(!token) {

                promptLogin();

                return;
            }
            const categoryId = this.getAttribute('data-category-id');
            const categoryName = this.getAttribute('data-category-name');
            

            axios.get(`/api/v1/categories/${categoryId}`,)
            .then(function (response) {
                const products = response.data.data;
                localStorage.setItem('allProducts', JSON.stringify(products));
                localStorage.setItem('categoryName', categoryName);
                window.location.href = `/category_search/search?category=${categoryId}`;
            })
            .catch(function (error) {
          //      console.error('Error fetching products:', error);
            });
        });
    });
});


document.getElementById('notification_icon').addEventListener('click', function(e) {
    e.stopPropagation();
    if(!token) {
        document.getElementById("notification_main").style.display = "none";
        promptLogin();

        return;

    }
    
  });



document.querySelector('.js-send').addEventListener('click', () => {

    if(!token) {

        promptLogin();

        return
    }

 const shopNo =  document.querySelector('.js-input-value').value;

  getVerifiedSellerShop(shopNo)

});

document.querySelector('.js-mobile-send').addEventListener('click', () => {

    if(!token) {

        promptLogin();

        return
    }

    const shopNo = document.querySelector('.js-mobile-input').value;

    getVerifiedSellerShop(shopNo);
})

function getVerifiedSellerShop(shopNo) {


    if(shopNo.trim() === '') {

    
        Swal.fire({
                icon: 'error',
                title: 'Verified Seller Shop',
                text: 'Shop No Is Required',
                confirmButtonColor: '#ffb705',
             });

       return
    }

    
    axios.get('/api/v1/verified-seller/details', {

        params: {
            shopNo,

        },
        headers: {
            'Content-type': 'application/json',
            'Authorization': `Bearer ${token}`,
        }
    }).then((response) =>{

      //  console.log(response)

        if(response.status === 200 && response.data) {

         const userId = response.data.data;

         //console.log(userId);

         localStorage.setItem('userId', JSON.stringify(userId))

         window.location.href = '/sellers-shop';

        }

    }).catch((error) => {

    //    console.log(error);

        if(error.response) {

            if(error.response.status === 404 && error.response.data) {

                Swal.fire({
                icon: 'error',
                title: 'Verified Seller Shop',
                confirmButtonColor: '#ffb705',
                text: error.response.data.message});

            }

        }else {   

            Swal.fire({
                 icon: 'error',
                 title: 'Request Error',
                 text: 'Something went wrong. Please try again later.',
                 confirmButtonColor: '#ffb705', });


        }

        
        
    })


}


document.querySelector('.js-change-to-input').addEventListener('click', () => {

    if(!token) {
        return
    }
    changeToInput() ;
    
})



document.querySelector('.js-send-input').addEventListener('click', () => {

    if(!token) {
        return
    }

    send();

    const input = document.querySelector('.js-tell-us-input').value;

    if(input.trim() === '') {
        return;
    }

     sendProductRequest(input, token);

});

document.querySelector('.js-help').addEventListener('click', (event) => {

    event.preventDefault();

    if(!token) {

        promptLogin();
        return;
        
    }

    displayHelpCenter();

});


function changeToInput() {
    document.querySelector(".tell_us_paragraph").style.display="none"
    document.querySelector(".tell_us_what_u_want_input_area").style.display="flex"
    document.querySelector(".tell_us_input").focus();
    document.querySelector(".tell_us_input").value="";
  }
  
  function send() {
    var inputText = document.querySelector(".tell_us_input").value.trim();
    if (inputText === "") {
      var myModal = new bootstrap.Modal(document.getElementById('tell_us_what_u_want_input_condition'));
        myModal.show();
        
    } else {
      document.querySelector(".tell_us_what_u_want_input_area").style.display="none"
      document.querySelector(".loader").style.display="block";
      setTimeout(function(){
        document.querySelector(".loader").style.display="none";
        document.querySelector(".submmited").style.display="block";
        setTimeout(function(){
            document.querySelector(".submmited").style.display="none";
            document.querySelector(".tell_us_paragraph").style.display="block";
        }, 2000);
      }, 2000);
    }
  }










