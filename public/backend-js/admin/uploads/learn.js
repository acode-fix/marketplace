import { displaySwal, filter, validationError } from "../../helper/helper.js";
import { serverError } from "../auth-helper.js";
import { getToken } from "../helper/helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

axios.get('/api/v1/admin/learn').then((response) => {

  console.log(response);

  const learnsData = response.data.learns;

  loadLearnData(learnsData);

  

}).catch((error) => {

  console.log(error);

});

var delModal = new bootstrap.Modal(document.getElementById('delModal'));

function loadLearnData(learnsData) {

  let display = '';

  learnsData.forEach((data) => {
  
    display += ` <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                  <div class="card card-main">
                    <iframe class="video-size" src="${data.url}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="card-body card-txt">
                      <p class="card-text new-text">${data.title}</p>
                      <p class="fw-light footer-txt">${data.description}</p>
                    </div>
                    <div class="link-layout">
                    <a  data-learn-id="${data.id}" class="edit-btn link"  href="">Edit</a>
                     <a  data-learn-id="${data.id}" class="del-btn link text-danger ms-2" href="">delete</a>
                    </div>
                  </div>
                </div>
              `;

  });

  var modal = new bootstrap.Modal(document.getElementById('editModal'));


  document.querySelector('.js-content').innerHTML = display;

  const editBtn = document.querySelector('.edit-btn');
  const delBtn = document.querySelector('.del-btn');

  editBtn.addEventListener('click', (event) => {
    event.preventDefault();

    const {learnId }= editBtn.dataset;

   

    axios.get('/api/v1/admin-learn/details', {
      params: {
        learnId,
      }
    }).then((response) => {
      console.log(response)

      if(response.status === 200 && response.data) {

        const data = response.data.learn;

        document.querySelector('.title').value = data.title;
        document.querySelector('.desc').value = data.description;
        document.querySelector('.url').value = data.url;
        document.querySelector('.id').value = data.id;

        modal.show();

      }

    }).catch((error) => {
      console.log(error);

      if(error.response) {

        if(error.response.status === 404) {

          
          Swal.fire({
            icon: 'error',
            title: 'Learn Upload Data',
            confirmButtonColor: '#ffb705',
            text: error.response.data.message,
            timer: 3000,
            timerProgressBar: true,
            didOpen: () => {
            Swal.showLoading();
            },
            
        });

          
        }

        if(error.response.status === 500) {

          serverError();
        }
      }

    });

  });

  delBtn.addEventListener('click', (event) => {

    event.preventDefault();

    const {learnId }= delBtn.dataset;

    axios.get('/api/v1/admin-learn/details', {
      params: {
        learnId,
      }
    }).then((response) => {
      if(response.status === 200 && response.data) {


        const data = response.data.learn;

        document.querySelector('.title-text').textContent= data.title;
        document.querySelector('.del-id').value = data.id;

        delModal.show();


      }

    }).catch((error) => {
      console.log(error);

    });


    






  });

}



document.getElementById('del').addEventListener('click', () => {

  // const form = document.getElementById('del-form');

  // const formData = new FormData(form);
  // console.log([...formData]);

  const id = document.querySelector('.del-id').value;

  axios.delete(`/api/v1/admin-learn/delete/${id}`,).then((response) => {

    console.log(response)

    if(response.status === 200 && response.data) {
      Swal.fire({
        icon: 'success',
        title: 'Learn Upload',
        confirmButtonColor: '#ffb705',
        html: '<span class="text-success">learn Data Deleted Successfully</span>',
        timer: 3000,
        timerProgressBar: true,
        didOpen: () => {
        Swal.showLoading();
        },
        willClose: () => {
          window.location.reload();
        }
        
    });




    }

  }).catch((error) => {
    console.log(error);

    if(error.response) {

      if(error.response.status === 500) {

        serverError();
      }
    }

  })

});


function validation() {

  let errors = [];

  const title = document.getElementById('title').value;
  const desc = document.getElementById('desc').value;
  const url = document.getElementById('url').value;


  document.getElementById('title_error').textContent = '';
  document.getElementById('desc_error').textContent = '';
  document.getElementById('url_error').textContent = '';
  


  if(title.trim() === '') {

    errors.push({field:'title', error:'* Title field is required *'});


  }

  
  if(desc.trim() === '') {

    errors.push({field:'desc', error:'* description field is required *'});


  }


  
  if(url.trim() === '') {

    errors.push({field:'url', error:'* url field is required *'});


  }


  for  (let field of errors ) {

   document.getElementById(`${field.field}_error`).textContent = field.error;
   
  }




  return errors.length === 0;

}

const title = document.getElementById('title');
const desc = document.getElementById('desc');
const url = document.getElementById('url');

title.addEventListener('input', () => {

  document.getElementById('title_error').style.display = 'none';
});

desc.addEventListener('input', () => {

  document.getElementById('desc_error').style.display = 'none';
});

url.addEventListener('input', () => {

  document.getElementById('url_error').style.display = 'none';
});

const saveBtn = document.getElementById('save');

saveBtn.addEventListener('click', (event) => {

  event.preventDefault();

   if(!validation()) {

      return
   }

   const form = document.getElementById('learn-form');

   const formData = new FormData(form);
   console.log([...formData]);

   axios.post('/api/v1/admin/update-learn',formData).then((response) => {
    console.log(response);

    if(response.status === 200 && response.data) {

          Swal.fire({
            icon: 'success',
            title: 'Learn Upload',
            confirmButtonColor: '#ffb705',
            html: '<span class="text-success">learn Data saved Successfully</span>',
            timer: 3000,
            timerProgressBar: true,
            didOpen: () => {
            Swal.showLoading();
            },
            
        });




    }

   }).catch((error) => {

    console.log(error);

    if(error.response) {

      if(error.response.status === 422 && error.response.data) {

        const fieldError = error.response.data.errors;

        const msg = validationError(fieldError);
  
        displaySwal(msg);



      }


      if(error.response.status === 500) {

        serverError();
    }
    }

   });



});

const updateBtn = document.getElementById('update');

updateBtn.addEventListener('click', (event) => {

  event.preventDefault();

  const form = document.getElementById('edit-learn-form');

  const formData = new FormData(form);

  console.log([...formData]);

  axios.post('/api/v1/admin/learn-update', formData).then((response) => {
    console.log(response);

    if(response.status === 200 && response.data) {

      Swal.fire({
        icon: 'success',
        title: 'Learn Upload',
        confirmButtonColor: '#ffb705',
        html: '<span class="text-success">learn Data Updated Successfully</span>',
        timer: 3000,
        timerProgressBar: true,
        didOpen: () => {
        Swal.showLoading();
        },
        willClose: () => {
          window.location.reload();
        }
        
    });


    }

  }).catch((error) => {
    console.log(error);

    if(error.response) {

      if(error.response.status === 422 && error.response.data) {

        const fieldError = error.response.data.errors;

        const msg = validationError(fieldError);
  
        displaySwal(msg);

      }







      if(error.response.status === 500) {

        serverError();
    }

    }

  })




});

