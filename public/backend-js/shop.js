import { validationError } from "./helper/helper.js";

const token = localStorage.getItem('apiToken');

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;



// //FOR PRODUCT LISTING
document.addEventListener("DOMContentLoaded", function () {

  if (!token) {
      console.error('API token is missing');
      return;
  }

  axios.get('/api/v1/user/products', {
     
  })
  .then(response => { 
      //console.log('Response:', response);
      const products = response.data.data;


      if (!Array.isArray(products)) {
          console.error('Products data is not an array:', products);
          return;
      }

      const productList = document.getElementById('productList');
      productList.innerHTML = '';
      let productCard = '';

      products.forEach((product) => {
      //console.log(product)
          const imageUrls = JSON.parse(product.image_url);
          const firstImageUrl = imageUrls.length > 0 ? imageUrls[0] : 'placeholder.jpg';

           productCard += `
              <div class="card card-preview">
                  <h6 class="sold">Sold ${product.sold || 0}</h6>
                  <img src="uploads/products/${firstImageUrl}" class="card-img-top w-100 image-border" alt="Product Image">
                  <div class="card-body">
                      <div class="card-structure">
                          <h6 class="amount">$${product.promo_price || 0} <span class="amount-span">$${product.actual_price || 0}</span></h6>
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
                          <p class="card-text infinix-text pt-3">${product.title || 'No title available'}</p>
                          <button type="button" class="dropbtn2 top " data-dropdown-id="${product.id}">...</button>
                          <div class="dropdown-content js-dropdown-content${product.id}">
                              <a class="share" data-bs-toggle="modal" data-bs-target="#exampleModal-1" data-bs-whatever="@mdo">share</a>
                              <a class="share js-edit" data-bs-toggle="modal" data-bs-target="#exampleModal-edit" data-bs-whatever="@mdo" >Edit</a>
                              <a href="#about">Boost</a>
                              <a class="share js-delete" data-bs-toggle="modal" data-bs-target="#exampleModal-2" data-bs-whatever="@mdo">Delete</a>
                          </div>
                      </div>
                  </div>
              </div>
          `;
         
      });

     // productList.insertAdjacentHTML('beforeend', productCard);

     productList.innerHTML = productCard;

      
var dropbtns = document.querySelectorAll('.dropbtn2');
let productId;

// Loop through each dropbtn
dropbtns.forEach(function(dropbtn) {
  dropbtn.addEventListener('click', function(event) {
      event.stopPropagation(); // Prevents the window click event from firing immediately
      // Close all dropdowns
      closeAllDropdowns();

      productId  = dropbtn.dataset.dropdownId;
     
      // Get the dropdown-content associated with this dropbtn
      var dropdownContent = document.querySelector(`.js-dropdown-content${productId}`);

      // Toggle the 'show' class
      dropdownContent.classList.toggle('show');
  });
});

//console.log(productId);

// Close dropdown when clicking outside of it
window.addEventListener('click', function(event) {
  closeAllDropdowns();
});

// Close all dropdowns
function closeAllDropdowns() {
  document.querySelectorAll('.dropdown-content').forEach((dropdownContent)=> {
      dropdownContent.classList.remove('show');

  }) ;


 
      

}






document.querySelectorAll('.js-edit').forEach((edit) => {

    edit.addEventListener('click', () => {

     console.log(productId)

      axios({
        method: "get",
        url: `/api/v1/product/${productId}`,
        
      }).then((response) => {

        const productData = response.data.data;
       // console.log(response)
        document.getElementById('title').value = productData.title;
        document.getElementById('location').value = productData.location;
        document.getElementById('quantity').value = productData.quantity;
        document.getElementById('description').value = productData.description;
        document.getElementById('actual_price').value = productData.actual_price;
        document.getElementById('promo_price').value = productData.promo_price;
      }).catch((error) => {

        if (error.response) {

          const responseErrors = error.response.data.errors;
          Swal.fire({ 
            icon: 'error',
            title: 'Fetching Product',
            text:  responseErrors,
            willClose: () => {
              window.location.href = '/shop';

          }

        });

        }

      

      })

    })

  });

 
  document.querySelectorAll('.next-to-step-2').forEach((nextStep) => {
    
    nextStep.addEventListener('click', () => {
      
      document.querySelectorAll('.modal-step-1').forEach((step1) => {
        step1.style.display = 'none';

      });
      
      document.querySelectorAll('.modal-step-2').forEach((step2) => {
       step2.style.display = 'block'

      });
      
    });
  

  })
  

  document.querySelectorAll('.previous-to-step-1').forEach((previousStep) => {

    previousStep .addEventListener('click', () => {

      document.querySelectorAll('.modal-step-1').forEach((modalStep1) => {
        modalStep1.style.display = 'block';

      });
      
      document.querySelectorAll('.modal-step-2').forEach((modalStep2) => {
        modalStep2.style.display = 'none';
      });
      
    });

  });

  const formModal = new bootstrap.Modal(document.getElementById('exampleModal-edit'));
  const formModalMobile = new bootstrap.Modal(document.getElementById('staticBackdrop'));
  function closeFormModal () {
    formModal.hide();
    formModalMobile.hide();

  }
  
  
  function submitForm(form1, form2) {

    const formData = new FormData(form1);
    const formData2 = new FormData(form2);

    for (let field  of formData2.entries()) {
      console.log(field[0] + ':' + field[1]);
      
    }
    formData2.forEach((value, key) => {
      formData.append(key, value);

    });

 /* for ( let field of formData.entries()) {

    console.log(field[0] + ':' + field[1]);
  };
  
  for ( let field of formData.entries()) {

    console.log(field[0] + ':' + field[1]);
  };
*/
 const id = productId ? productId : mobileProductId ;
 console.log(id);


  axios({
    method: "post",
    url: `/api/v1/product/edit/${id }`,
    data: formData,
    headers: { 
        "Content-Type": "multipart/form-data",
      
     },
  }).then((response) => {

  if (response.data && response.status === 200) {
    Swal.fire({ 
      icon: 'success',
      title: 'Product Update Message',
      text:  response.data.message,
      willClose: () => {
        window.location.href = '/shop';
    }
  });


  }

   
  }).catch((error) => {

    if(error.response) {

      if(error.response.status === 422 && error.response.data) {

        const responseErrors = error.response.data.errors;

      const errorMsg = validationError(responseErrors);
      
      Swal.fire({
        icon: 'error',
        title: 'Validation Error',
        text: errorMsg,
        
       // willClose: () => {
      
          //window.location.href = '/shop';
       // }
       
    }).then(() => {
      closeFormModal();
    });
      }
    }
  })

  

    


  }
 


  document.getElementById('save-product').addEventListener('click', () => {
    
    const form1 = document.getElementById('edit-product-form-1');
    const form2 = document.getElementById('edit-product-form-2');

    submitForm(form1, form2)

  });

  document.querySelectorAll('.js-delete').forEach((deleteBtn) => {

    var modal = new bootstrap.Modal(document.getElementById('exampleModal-2'));

    deleteBtn.addEventListener('click', () => {  
        modal.show();

        document.querySelector('.js-delist-btn').addEventListener('click', () => {
         // console.log(productId);
    
          axios({
            method: "delete",
            url: `/api/v1/product/delete/${productId}`,
          }).then((response) => {

           // console.log(response);

            if (response.data.status) {

              Swal.fire({
                icon: 'success',
                title: 'Delete Product',
                text: response.data.message,
                willClose: () => {
                  window.location.href = '/shop';
                }
               
            });
      
              
            }           
          }).catch((error) => {

            if(error.response) {

              if(error.response.status === 500) {

                Swal.fire({
                  icon: 'error',
                  title: 'Delete Product',
                  text:error.response.data.message,
                 
              });

              }

             if(error.response.status === 404) {

                Swal.fire({
                  icon: 'error',
                  title: 'Delete Product',
                  text:error.response.data.message,
                 
              });


              }
      
              }
            }
          )


        })
      
      
    });

    document.querySelector('.js-cancel-btn').addEventListener('click', () => {
      modal.hide();
  
      
    });

    

  });






// display mobile view cards

const mobileCard = document.querySelector('.mobile-card');
mobileCard.innerHTML = '';

let mobileProduct = '';


products.forEach((product) => {
 // console.log(product)

  const imageUrls = JSON.parse(product.image_url);
  //console.log(imageUrls);
  const firstImageUrl = imageUrls.length > 0 ? imageUrls[0] : 'placeholder.jpg';
  //console.log(firstImageUrl);
  
  mobileProduct += `
  <div class="card card-preview js-mobile-card" data-bs-toggle="modal" data-bs-target="#exampleModal2"
  data-bs-whatever="@mdo" data-product-id="${product.id}">
  <div class="sold-mobile">
      <h6 class="amount-sold-m ps-1 pt-1">Sold 100</h6>
      <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px"
          alt=""><span class="img-rate ps-1">3.6</span>
  </div>
  <img src="uploads/products/${firstImageUrl}"
      class="card-img-top w-100 image-border" alt="...">
  <div class="card-body">
      <h6 class="amount">$${product.actual_price || 0} <span class="amount-span">$${product.promo_price || 0} </span></h6>
      <p class="card-text infinix-text pt-3">${product.description}.</p>
      <div class="footer-card-mobile">
          <div>
              <img style="margin-left:-10px;" width="8px"
                  src="kaz/images/location.svg" alt=""><span
                  class="location-text ps-1">${product.location}, Nigera</span>
          </div>
          <button style="margin-top: -10px;" type="button"
              class="dropbtn1">...</button>
      </div>

  </div>
</div>`;

});

mobileCard.innerHTML = mobileProduct;

let mobileProductId;


document.querySelectorAll('.js-mobile-card').forEach((mobileCard) => {
  
  mobileCard.addEventListener('click', () => {

   const {productId} = mobileCard.dataset;
    
   mobileProductId = productId;
  });

});

//console.log(mobileProductId);
//hide the mobile-view modal btn
var modal = new bootstrap.Modal(document.getElementById('exampleModal2'));
document.querySelector('.js-modal-edit').addEventListener('click', () => {
  modal.hide();
  //console.log(mobileProductId);


  axios({
    method: "get",
    url: `/api/v1/product/${mobileProductId}`,
    
  }).then((response) => {
  
    if (response.data && response.status === 200) {
     
      const productData = response.data.data;

      document.querySelector('.title').value = productData.title;
      document.querySelector('.location').value = productData.location;
      document.querySelector('.quantity').value = productData.quantity;
      document.querySelector('.description').value = productData.description;
      document.querySelector('.actual_price').value = productData.actual_price;
      document.querySelector('.promo_price').value = productData.promo_price;
    }
  }).catch((error) => {

    if (error.response ) {

      const responseErrors = error.response.data.errors;
      Swal.fire({ 
        icon: 'error',
        title: 'Fetching Product',
        text:  responseErrors,
        willClose: () => {
          window.location.href = '/shop';

      }
      
    });
  
    }

  })

});

document.getElementById('save-product-mobile').addEventListener('click', () => {

  const form1 = document.getElementById('edit-product-form-mobile1');
  const form2 = document.getElementById('edit-product-form-mobile2');

  submitForm(form1, form2);
});

document.querySelector('.js-cancel-mobile').addEventListener('click', () => {

  modal.hide();
  //console.log(mobileProductId);

});

document.querySelector('.js-delist-mobile').addEventListener('click', () => {
 // console.log(mobileProductId);

 axios({
  method: "delete",
  url: `/api/v1/product/delete/${mobileProductId}`,
}).then((response) => {

 // console.log(response);

  if (response.data.status) {

    Swal.fire({
      icon: 'success',
      title: 'Delete Product',
      text: response.data.message,
      willClose: () => {
        window.location.href = '/shop';
      }
     
  });

    
  }           
}).catch((error) => {

  if(error.response) {

    if(error.response.status === 500) {

      Swal.fire({
        icon: 'error',
        title: 'Delete Product',
        text:error.response.data.message,
       
    });

    }

   if(error.response.status === 404) {

      Swal.fire({
        icon: 'error',
        title: 'Delete Product',
        text:error.response.data.message,
       
    });


    }

    }
  }
)
})

  })
  .catch(error => {
      console.error('Error fetching products:', error);
  });


});



document.querySelectorAll('.js-banner-upload').forEach((banner) => {

  banner.addEventListener('click', () => {
        // Create an input element of type 'file'
        var input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*'
      
        // Create a form element
        var form = document.createElement('form');
        form.style.display = 'none'; // Hide the form
        form.id = 'banner-image-form'; // Set form id
       // form.action = 'uploadBanner'; // Set form action
      
        // Append the input element to the form
        form.appendChild(input);
        document.body.appendChild(form);
      
        // Trigger a click event on the input element
        input.click();
      
        // When a file is selected, update the product image and submit the form
        input.onchange = function() {
          var file = input.files[0];
          var reader = new FileReader();
      
          reader.onload = function(e) {
            // Set the src attribute of the product image to the uploaded image
            document.getElementById('banner').src = e.target.result;
 
 
            const formData = new FormData();
            formData.append('banner', file);
 
            //const token = localStorage.getItem('apiToken');
 
            axios({
             method: "post",
             url: "/api/v1/shop/update",
             data: formData,
             headers: { 
                 "Content-Type": "multipart/form-data",
                // 'Authorization': `Bearer ${token}`,
              },
           })
            .then((response) => {
            // console.log(response)
 
             Swal.fire({
                 icon: 'success',
                 title: 'Banner Upload',
                 text: response.data.message
             });
 
            }).catch((response) => {
 
             Swal.fire({
                 icon: 'error',
                 title: 'Banner Upload',
                 text: response.data.message
             });
 
             
 
            })
        
          
 
    
         
    
          }
      
          reader.readAsDataURL(file);
        };
 
 
 })
 

});

document.querySelectorAll('.js-profile').forEach((profile) => {
    profile.addEventListener('click', () => {

  // Create an input element of type 'file'
  var input = document.createElement('input');
  input.type = 'file';
  input.accept = 'image/*'

  // Create a form element
  var form = document.createElement('form');
  form.style.display = 'none'; // Hide the form
  form.id = 'profile-image-form'; // Set form id


  // Append the input element to the form
  form.appendChild(input);
  document.body.appendChild(form);

  // Trigger a click event on the input element
  input.click();

  // When a file is selected, update the product image and submit the form
  input.onchange = function() {
      var file = input.files[0];
      var reader = new FileReader();

      reader.onload = function(e) {
          // Set the src attribute of the product image to the uploaded image
          document.getElementById('images-dp').src = e.target.result;

          

          const formData = new FormData();
          formData.append('photo_url', file);

          axios({
            method: "post",
            url: "/api/v1/shop/update",
            data: formData,
            headers: { 
                "Content-Type": "multipart/form-data",
               // 'Authorization': `Bearer ${token}`,
             },
          }).then((response) => {
            Swal.fire({
                icon: 'success',
                title: 'Banner Upload',
                text: response.data.message
            });
          }).catch(() => {

            Swal.fire({
                icon: 'error',
                title: 'Profile Upload',
                text: response.data.message
            })

          })
          
         

          
    
      };

      reader.readAsDataURL(file);
  };


    })

});







