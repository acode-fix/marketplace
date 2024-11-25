import { displayHelpCenter } from "./helper/helper.js";


document.addEventListener('DOMContentLoaded', function () {
  const token = localStorage.getItem('apiToken');

  const middleSection = document.querySelector('.middle-section');
  const createSection = document.querySelector('.create');
  middleSection.style.display = 'none';
  createSection.style.display = 'none';

  axios.get('/api/v1/videos', {
      headers: {
          'Authorization': 'Bearer ' + token
      }
  })
  
.then(function (response) {
 
    const desktTopLearn = document.querySelector('.js-content');
    const mobileLearn = document.querySelector('.js-mobile-content');

    let cardContent = '';

    response.data.forEach(item => {
         cardContent += `
            <iframe style="width: 335px;" class="video-size" src="${item.url}" title="${item.title}" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <div class="card-body card-txt">
                <p class="card-text new-tex">${item.title}</p>
                 <p class="fw-light footer-txt">${item.description} </p>
            </div>
        `;

       
    });

    let mobileContent = '';

    response.data.forEach(item => {
        mobileContent += `
           <iframe  class="mobile-video-size" src="${item.url}" title="${item.title}" frameborder="0"
               allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
               referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
           <div class="card-body card-txt">
               <p class="card-text new-tex">${item.title}</p>
                <p class="fw-light footer-txt">${item.description} </p>
           </div>
       `;

      
   });

    

    desktTopLearn.innerHTML = cardContent;
    mobileLearn.innerHTML = mobileContent;
})
.catch(function (error) {
    console.error('Error fetching learn data:', error);
});


document.querySelector('.js-learn-help').addEventListener('click', (event) => {
    event.preventDefault();

    displayHelpCenter();



});











});














/*
const cardContent = `
<iframe style="width: 335px;" class="video-size" src="${item.url}" title="${item.title}" frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
<div class="card-body card-txt">
    <p class="card-text new-tex">${item.title}</p>
     <p class="fw-light footer-txt">${item.description} <br>
      ${new Intl.NumberFormat('en-US', { notation: 'compact', compactDisplay: 'short' }).format(item.views)} views ${moment(item.created_at).fromNow() ? 'null' : ''}</p>
</div>
`;

*/

