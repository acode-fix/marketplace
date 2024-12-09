import { filter } from "../../helper/helper.js";
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
                  </div>
                </div>
              `;

  });

  document.querySelector('.js-content').innerHTML = display;



}


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



});