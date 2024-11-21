import {
    validationError,
    getShopPrice,
    displayHelpCenter,
    generateStars,
    showLoader,hideLoader
} from "./helper/helper.js";
import {
    serverError
} from "./admin/auth-helper.js";
import dayjs from 'https://unpkg.com/dayjs@1.11.10/esm/index.js';

const token = localStorage.getItem('apiToken');


axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;



// //FOR PRODUCT LISTING
document.addEventListener("DOMContentLoaded", function () {

    if (!token) {
        console.error('API token is missing');
        return;
    }

    axios.get('/api/v1/user/badge').then((response) => {
      console.log(response);

        const expiryData = response.data.badge.expiry_date;

        const expiryDate = dayjs(expiryData).format('D MMMM YYYY')

        if (response.status === 200 && response.data) {

            const verifyElement = document.querySelector('.become-tag');
            const verifyElementMobile = document.querySelector('.become-tag-m');
            const textElements = document.querySelectorAll('.js-hover-text');

            if(response.data.message === -2) {

                verifyElement.textContent = 'Pending';
                verifyElement.href = '';

                verifyElementMobile.textContent = 'Pending';
                verifyElementMobile.style.fontSize = '15px';
                verifyElementMobile.href = '';



            }

            if (response.data.message === 'Active Badge') {

                verifyElement.textContent = 'Active Badge';
                verifyElement.href = '';

                verifyElementMobile.textContent = 'Active Badge';
                verifyElementMobile.style.fontSize = '12px';
                verifyElementMobile.href = '';

                textElements.forEach((textElement) => {
                    textElement.textContent = `Expires on: ${expiryDate}`;
                    textElement.style.color = '#14AE5c';

                });



            } else if (response.data.message === 'Badge Expired') {

                verifyElement.textContent = 'Badge Expired';
                verifyElement.href = '/badge';

                verifyElementMobile.textContent = 'Badge Expired';
                verifyElementMobile.style.fontSize = '12px'
                verifyElementMobile.href = '/badge';



                textElements.forEach((textElement) => {
                    textElement.textContent = `Expired on: ${expiryDate}`;
                    textElement.style.color = '#FF0000';

                })



            }






        }



    }).catch((error) => {

        if (error.response) {

            if (error.response.status === 500) {
                serverError();
            }
        }

    });



    axios.get('/api/v1/user/products', {

        })
        .then(response => {

            const products = response.data.data;

            if (!Array.isArray(products)) {
                console.error('Products data is not an array:', products);
                return;
            }

            loadShopProducts(products);

            let productId;

            function attachDropDownListener() {

                var dropbtns = document.querySelectorAll('.dropbtn2');
                // let productId;
                dropbtns.forEach(function (dropbtn) {
                    dropbtn.addEventListener('click', function (event) {
                        event.stopPropagation(); // Prevents the window click event from firing immediately
                        // Close all dropdowns
                        closeAllDropdowns();

                        productId = dropbtn.dataset.dropdownId;

                        // Get the dropdown-content associated with this dropbtn
                        var dropdownContent = document.querySelector(`.js-dropdown-content${productId}`);

                        // Toggle the 'show' class
                        dropdownContent.classList.toggle('show');
                    });
                });

            }
            //console.log(productId);


            window.addEventListener('click', function (event) {
                closeAllDropdowns();
            });


            function closeAllDropdowns() {
                document.querySelectorAll('.dropdown-content').forEach((dropdownContent) => {
                    dropdownContent.classList.remove('show');

                });




            }

            document.querySelector('.js-share-link').addEventListener('click', () => {

                // console.log(productId);

                fetchLink(productId);

            });


            function fetchLink(productId) {



                axios.get('/api/v1/product/link', {
                    params: {
                        productId,

                    }
                }).then((response) => {

                 //   console.log(response)

                    if (response.status === 200 && response.data) {
                        const key = response.data.data;

                        const encode = key.encode;
                        const shopNo = key.shopNo;
                        const shopToken = key.shopToken;
                        const url = key.url;
                        const id = key.id;
                        const decoy = key.decoy;


                        const productUrl = `${url}/product/shared/link?id=${id}&shop=${shopNo ?? ''}&verify=${decoy}&check=${shopToken}&encode=${encode}`;

                        navigator.clipboard.writeText(productUrl).then(() => {

                            let timerInterval;
                            Swal.fire({
                                icon: 'success',
                                title: 'Product Link',
                                confirmButtonColor: '#ffb705',
                                text: 'Product link Copied To Clipboard Successfully',
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector("b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent = `${Swal.getTimerLeft()}`;
                                    }, 4000);
                                },
                                willClose: () => {

                                    clearInterval(timerInterval);
                                  //  window.location.href = '/shop';

                                }
                            });
                        }, () => {

                            Swal.fire({
                                icon: 'error',
                                title: 'Product Link',
                                confirmButtonColor: '#ffb705',
                                text: 'Failed to copy',
                                willClose: () => {
                                    window.location.href = '/shop';

                                }

                            });

                        });
                    }

                }).catch((error) => {

                    if (error.response) {

                        if (error.response.status === 400 && error.response.data) {

                            Swal.fire({
                                icon: 'error',
                                title: 'Fetching Product',
                                confirmButtonColor: '#ffb705',
                                text: error.response.data.message,
                                willClose: () => {
                                    window.location.href = '/shop';

                                }

                            });

                        }


                        if (error.response.status === 500) {

                            serverError();


                        }

                    }


                })

            }


            function loadShopProducts(products) {

                const productList = document.getElementById('productList');
                productList.innerHTML = '';
                let productCard = '';

        
                if(products.length === 0) {

                return    productList.innerHTML = '<p class="text-danger">You have no product listed!!</p>';
                
                }

                

                products.forEach((product) => {
                   // console.log(product)
                    const imageUrls = JSON.parse(product.image_url);
                    const firstImageUrl = imageUrls.length > 0 ? imageUrls[0] : '';

                  //  console.log(product.avg_rating);


                    productCard += `
          <div class="card card-preview">
              <h6 class="sold">Sold ${product.sold ?? 0}</h6>
              <img src="uploads/products/${firstImageUrl}" class="card-img-top w-100 image-border" alt="Product Image">
              <div class="card-body">
                  <div class="card-structure">
                  ${getShopPrice(product)}
                     
                      <div class="star-layout">
                          <div>
                             ${generateStars(product.avg_rating)}
                          </div>
                          <div>
                              <h6 class="ps-1 rate-no">${product.avg_rating === 0 ? '' : product.avg_rating}</h6>
                          </div>
                      </div>
                  </div>
                  <div class="footer-card">
                      <p class="card-text infinix-text pt-3">${product.title ?? 'No title available'}</p>
                      <button type="button" class="dropbtn2 top " data-dropdown-id="${product.id}">...</button>
                      <div class="dropdown-content js-dropdown-content${product.id}">
                          <a class="share js-share" data-bs-toggle="modal" data-bs-target="#exampleModal-1" data-bs-whatever="@mdo">share</a>
                          <a class="share js-edit" data-bs-toggle="modal" data-bs-target="#exampleModal-edit" data-bs-whatever="@mdo" >Edit</a>
                          <a href="/ads">Boost</a>
                          <a class="share js-delete" data-bs-toggle="modal" data-bs-target="#exampleModal-2" data-bs-whatever="@mdo">Delete</a>
                      </div>
                  </div>
              </div>
          </div>
      `;

                });



                productList.innerHTML = productCard;
                attachDropDownListener();
                loadEditBtn();
                loadDelBtn()

            }


            const searchBtn = document.querySelector('.js-search');
            searchBtn.addEventListener('click', () => {

                const input = document.getElementById('search');

                if (input.value.trim() === '') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Search Product',
                        confirmButtonColor: '#ffb705',
                        text: 'Please provide an input',

                    });

                } else {

                    const searchParams = input.value.trim();
                    shopSearch(searchParams);


                }

            });



            document.addEventListener('keypress', (event) => {

                const input = document.getElementById('search');

                if (event.key === 'Enter') {

                    if (input.value.trim() === '') {
                        Swal.fire({
                            icon: 'error',
                            confirmButtonColor: '#ffb705',
                            title: 'Search Product',
                            text: 'Please provide an input',

                        });

                    } else {

                        const searchParams = input.value.trim();
                        shopSearch(searchParams);


                    }



                }

            });


            function shopSearch(searchParams) {
                axios.get('/api/v1/search/shop/products', {

                    params: {
                        searchParams,
                    }

                }).then((response) => {

                 //   console.log(response);

                    if (response.status === 200 && response.data) {

                        const products = response.data.products

                        if (products.length === 0) {

                            const responseText = '<p class="text-danger fs-5">* Sorry, No match was found !! *</p>';
                            const productList = document.getElementById('productList');

                            productList.innerHTML = responseText;


                        } else {

                            loadShopProducts(products);



                        }



                    }

                }).catch((error) => {

                  //  console.log(error);

                    if (error.response) {

                        if (error.response.status === 404 && error.response.data) {

                            Swal.fire({
                                icon: 'error',
                                title: 'Search Product',
                                confirmButtonColor: '#ffb705',
                                text: error.response.data.message,
                                willClose() {
                                    window.location.reload();
                                }

                            });


                        }

                        if (error.response.status === 400 && error.response.data) {

                            Swal.fire({
                                icon: 'error',
                                title: 'Search Product',
                                confirmButtonColor: '#ffb705',
                                text: error.response.data.message,
                                willClose() {
                                    window.location.reload();
                                }

                            });


                        }

                        if (error.response.status === 500) {
                            serverError();
                        }




                    }

                })

            }


         function loadEditBtn() {
        
        

            document.querySelectorAll('.js-edit').forEach((edit) => {

                edit.addEventListener('click', () => {

                   // console.log(productId)
                  

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
                        document.getElementById('condition').value = productData.condition;
                        document.getElementById('category').value = productData.category_id;
                        const askPrice = document.getElementById('priceSwitch');

                      if(productData.ask_for_price) {
                        askPrice.checked = true;
                        document.querySelector('.actual-price').style.display = 'none';
                        document.querySelector('.promo-price').style.display = 'none';


                      }else {

                        askPrice.checked = false;
                        document.querySelector('.actual-price').style.display = 'block';
                        document.querySelector('.promo-price').style.display = 'block';


                      }


                      askPrice.addEventListener('click', () => {

                        if(askPrice.checked) {

                            document.querySelector('.actual-price').style.display = 'none';
                            document.querySelector('.promo-price').style.display = 'none';
                        }else {

                            document.querySelector('.actual-price').style.display = 'block';
                            document.querySelector('.promo-price').style.display = 'block';
    


                        }

                      })

                  
                      



                    }).catch((error) => {

                        if (error.response) {

                            const responseErrors = error.response.data.errors;
                            Swal.fire({
                                icon: 'error',
                                confirmButtonColor: '#ffb705',
                                title: 'Fetching Product',
                                text: responseErrors,
                                willClose: () => {
                                    window.location.href = '/shop';

                                }

                            });

                        }



                    })

                })

            });

          }


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

                previousStep.addEventListener('click', () => {

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

            function closeFormModal() {
                formModal.hide();
                formModalMobile.hide();

            }

            let selectedFiles = [];

        const desktop = document.getElementById('fileInput');
        const mobile =  document.getElementById('inputMobile');

        [desktop, mobile].forEach((input) => {

            if(input) {

                input.addEventListener('change', function() {

                //    console.log(this.files);

                    if(this.files && this.files.length > 0) {

                        for(let i = 0; i < this.files.length; i++) {
     
                         selectedFiles.push(this.files[i]);
     
                        }
     
                       // this.value = '';
     
                     }
                })

            }

            

        })
           

            function submitForm(form1, form2, continueBtn, signupText, loader) {

                showLoader(continueBtn, signupText, loader);


              // console.log(selectedFiles);

                const formData = new FormData(form1);
                const formData2 = new FormData(form2);
               
                // for (let field of formData2.entries()) {
                //     console.log(field[0] + ':' + field[1]);

                // }

                formData2.forEach((value, key) => {
                    formData.append(key, value);

                });



                selectedFiles.forEach((file) => {
                    formData.append('image_url[]', file); 
                    
                });

                // for(let field of formData.entries()) {
                //     console.log(field[0] + ':' + field[1])


                // }

             //return console.log([...formData]);
            
               
                const id = productId ? productId : mobileProductId;
                console.log(id);


                axios({
                    method: "post",
                    url: `/api/v1/product/edit/${id }`,
                    data: formData,
                    headers: {
                        "Content-Type": "multipart/form-data",

                    },
                }).then((response) => {

                    hideLoader(continueBtn, signupText, loader);

                    if (response.data && response.status === 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Product Update Message',
                            confirmButtonColor: '#ffb705',
                            text: response.data.message,
                            willClose: () => {
                                window.location.href = '/shop';
                            }
                        });


                    }


                }).catch((error) => {

                    hideLoader(continueBtn, signupText, loader);

                    console.log(error);

                    if (error.response) {

                        if (error.response.status === 422 && error.response.data) {

                            const responseErrors = error.response.data.errors;

                            const errorMsg = validationError(responseErrors);

                            Swal.fire({
                                icon: 'error',
                                confirmButtonColor: '#ffb705',
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



            document.getElementById('save-product').addEventListener('click', (event) => {
                event.preventDefault();

                const form1 = document.getElementById('edit-product-form-1');

                const form2 = document.getElementById('edit-product-form-2');

                const continueBtn = document.querySelector('.update-loader');
                const signupText = document.querySelector('.update-text');
                const loader = document.querySelector('.loader-layout'); 


                submitForm(form1, form2, continueBtn, signupText, loader);

            });

            function loadDelBtn() {

      

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
                                    confirmButtonColor: '#ffb705',
                                    text: response.data.message,
                                    willClose: () => {
                                        window.location.href = '/shop';
                                    }

                                });


                            }
                        }).catch((error) => {

                            if (error.response) {

                                if (error.response.status === 500) {

                                    Swal.fire({
                                        icon: 'error',
                                        confirmButtonColor: '#ffb705',
                                        title: 'Delete Product',
                                        text: error.response.data.message,

                                    });

                                }

                                if (error.response.status === 404) {

                                    Swal.fire({
                                        icon: 'error',
                                        confirmButtonColor: '#ffb705',
                                        title: 'Delete Product',
                                        text: error.response.data.message,

                                    });


                                }

                            }
                        })


                    })


                });

                document.querySelector('.js-cancel-btn').addEventListener('click', () => {
                    modal.hide();


                });



            });

            }


            
            document.querySelector('.js-footer-help').addEventListener('click', (event) => {

                event.preventDefault();

                displayHelpCenter();

            })






            // display mobile view cards

            const mobileCard = document.querySelector('.mobile-card');
            mobileCard.innerHTML = '';

            let mobileProduct = '';

            if(products.length === 0) {

              return  mobileCard.innerHTML =   '<p class="text-danger">You have no product listed!!</p>';
            }

            


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
                        <h6 class="amount-sold-m ps-1 pt-1">Sold ${product.sold ?? 0}</h6>
                        <img src="kaz/images/Rate.png" class="img-fluid ps-1" width="13px"
                            alt=""><span class="img-rate ps-1">${product.avg_rating ?? 0}</span>
                    </div>
                    <img src="uploads/products/${firstImageUrl}"
                        class="card-img-top w-100 image-border" alt="...">
                    <div class="card-body">
                        ${getShopPrice(product)}
                        <p class="card-text infinix-text pt-3">${product.title}.</p>
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

            document.querySelector('.js-mobile-share-link').addEventListener('click', () => {
                // console.log(mobileProductId);\

                const productId = mobileProductId;

                fetchLink(productId);
            })



            document.querySelectorAll('.js-mobile-card').forEach((mobileCard) => {

                mobileCard.addEventListener('click', () => {

                    const {
                        productId
                    } = mobileCard.dataset;

                    mobileProductId = productId;
                });

            });

            //console.log(mobileProductId);
            //hide the mobile-view modal btn
            var modal = new bootstrap.Modal(document.getElementById('exampleModal2'))
            document.querySelector('.js-modal-edit').addEventListener('click', () => {
                modal.hide();
               // console.log(mobileProductId);


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
                        document.querySelector('.category').value = productData.category_id;
                        document.getElementById('condition-mobile').value = productData.condition;

                        const askPrice = document.getElementById('mobile-priceSwitch');

                        if(productData.ask_for_price) {
                          askPrice.checked = true;
                          document.querySelector('.mobile-actual-price').style.display = 'none';
                          document.querySelector('.mobile-promo-price').style.display = 'none';
  
  
                        }else {
  
                          askPrice.checked = false;
                          document.querySelector('.mobile-actual-price').style.display = 'block';
                          document.querySelector('.mobile-promo-price').style.display = 'block';
  
  
                        }
  
  
                        askPrice.addEventListener('click', () => {
  
                          if(askPrice.checked) {
  
                              document.querySelector('.mobile-actual-price').style.display = 'none';
                              document.querySelector('.mobile-promo-price').style.display = 'none';
                          }else {
  
                              document.querySelector('.mobile-actual-price').style.display = 'block';
                              document.querySelector('.mobile-promo-price').style.display = 'block';
      
  
  
                          }
  
                        })
  




                        
                    }
                }).catch((error) => {

                    if (error.response) {

                        const responseErrors = error.response.data.errors;
                        Swal.fire({
                            icon: 'error',
                            confirmButtonColor: '#ffb705',
                            title: 'Fetching Product',
                            text: responseErrors,
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

                const continueBtn = document.querySelector('.mobile-loader');
                const signupText = document.querySelector('.mobile-text');
                const loader =  document.querySelector('.mobile-loader-layout');


                submitForm(form1, form2, continueBtn, signupText, loader);
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
                            confirmButtonColor: '#ffb705',
                            title: 'Delete Product',
                            text: response.data.message,
                            willClose: () => {
                                window.location.href = '/shop';
                            }

                        });


                    }
                }).catch((error) => {

                    if (error.response) {

                        if (error.response.status === 500) {

                            Swal.fire({
                                icon: 'error',
                                confirmButtonColor: '#ffb705',
                                title: 'Delete Product',
                                text: error.response.data.message,

                            });

                        }

                        if (error.response.status === 404) {

                            Swal.fire({
                                icon: 'error',
                                confirmButtonColor: '#ffb705',
                                title: 'Delete Product',
                                text: error.response.data.message,

                            });


                        }

                    }
                })
            })

        })
        .catch(error => {
          //  console.error('Error fetching products:', error);
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
        input.onchange = function () {
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                // Set the src attribute of the product image to the uploaded image
                document.getElementById('banner').src = e.target.result;
                document.getElementById('banner2').src = e.target.result;



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
                         //console.log(response)

                        if(response.status === 200 && response.data) {

                            Swal.fire({
                                icon: 'success',
                                confirmButtonColor: '#ffb705',
                                title: 'Banner Upload',
                                text: response.data.message,
                                
                               
                            });

                        }

                       

                    }).catch((error) => {

                        

                      if(error.response) {

                        if(error.response.status === 422 && error.response.data) {

                            Swal.fire({
                                icon: 'error',
                                confirmButtonColor: '#ffb705',
                                title: 'Banner Upload',
                                text: error.response.data.message
                            });


                        }

                        if(error.response.status === 500) {

                            serverError();
                        }
                      }

                        // Swal.fire({
                        //     icon: 'error',
                        //     confirmButtonColor: '#ffb705',
                        //     title: 'Banner Upload',
                        //     text: error.response.message
                        // });



                    })






            }

            reader.readAsDataURL(file);
        };


    });

   


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
        input.onchange = function () {
            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                // Set the src attribute of the product image to the uploaded image
                document.getElementById('images-dp').src = e.target.result;
                document.getElementById('images-dp2').src = e.target.result;



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
                    if(response.status === 200 && response.data) {

                        Swal.fire({
                            icon: 'success',
                            confirmButtonColor: '#ffb705',
                            title: 'profile Image Upload',
                            text: response.data.message,
                           
                        });

                    }
                    
                }).catch((error) => {

                    if(error.response) {

                  
                    if(error.response.status === 422 && error.response.data) {

                        Swal.fire({
                            icon: 'error',
                            confirmButtonColor: '#ffb705',
                            title: 'Profile Image Upload',
                            text: error.response.message
                        })


                    }

                    if(error.response.status === 500) {
                        serverError();
                    }
                    
                  }

                })





            };

            reader.readAsDataURL(file);
        };


    })

});
