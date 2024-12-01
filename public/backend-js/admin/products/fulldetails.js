import {
    getToken
} from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

const productId = JSON.parse(localStorage.getItem('productId'));

//console.log(productId);

axios.get(`/api/v1/admin/product-details/${productId}`,).then((response) => {
    console.log(response);

    if (response.status === 200 && response.data) {
        const userData = response.data.product.user;
        const productsData = response.data.product;
        const productCategory = response.data.product.category;

        updatesUserData(userData);
        updatesProductData(productsData, productCategory);

    }

}).catch((error) => {

    if(error.response) {

      if (error.response.status === 404 && error.response.data) {

        Swal.fire({
          icon: 'error',
          confirmButtonColor: '#ffb705',
          title: 'Product Error',
          text: error.response.data.message,
          preConfirm: () => {
            window.location.href = '/admin/products/view'
          }
      });
      }
    }

});


function loadImages(imgs) {

    const parsedImgs = JSON.parse(imgs);

    let images = '';

    parsedImgs.forEach((img) => {

        images += `<img style="height:100px; margin-right:40px;" src="/uploads/products/${img}" alt="">`

    });

    return images;

}


function updatesUserData(userData) {

    for (let field in userData) {

        if (field === 'verify_status') {

            const verifyEl = document.getElementById('verify_status');

            const status = userData.verify_status == 0 ?
                `<p class=text-danger> Unverified </p>` :
                userData.verify_status == -2 ?
                `<p class=text-danger> Pending </p>` :
                `<p class=text-success> verified </p>`;

            verifyEl.innerHTML = status;


        }

        if (field === 'badge_status') {

            const badgeEl = document.getElementById('badge_status');
            const status = userData.badge_status == 0 ?
                `<p class=text-danger>No Badge Subscription </p>` :
                userData.verify_status == -1 ?
                `<p class=text-danger>Expired Badge </p>` :
                `<p class=text-success>Active Badge </p>`;

            badgeEl.innerHTML = status;
        }

        const element = document.getElementById(`${field}_data`);




        if (element) {

            element.textContent = userData[field] === null ? 'No Data Yet' : userData[field];
        }

    }

}


function updatesProductData(productsData, productCategory) {

    for (let field in productsData) {

        if (field === 'image_url') {

            const images = productsData.image_url;

            const genImages = loadImages(images);

            document.getElementById('product-images').innerHTML = genImages;


        }


        const element = document.getElementById(`${field}_data`);
        if (element) {

            element.textContent = productsData[field] === null ? 'N/A' : productsData[field];
        }


    }


    document.getElementById('category_name_data').textContent = productCategory.name;


}
