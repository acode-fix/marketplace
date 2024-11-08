import { displayHelpCenter } from "./helper/helper.js";


document.addEventListener('DOMContentLoaded', function () {
  const token = localStorage.getItem('apiToken');

  axios.get('/api/v1/videos', {
      headers: {
          'Authorization': 'Bearer ' + token
      }
  })
  
.then(function (response) {
    const webLearnContainer = document.getElementById('web-learn-container');
    const mobileLearnContainer = document.getElementById('mobile-learn-container');

    response.data.forEach(item => {
        const cardContent = `
            <iframe style="width: 335px;" class="video-size" src="${item.url}" title="${item.title}" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <div class="card-body card-txt">
                <p class="card-text new-tex">${item.title}</p>
                 <p class="fw-light footer-txt">${item.description} </p>
            </div>
        `;

        const webCard = document.createElement('div');
        webCard.classList.add('card', 'card-main');
        webCard.innerHTML = cardContent;
        webLearnContainer.appendChild(webCard);

        const mobileCard = document.createElement('div');
        mobileCard.classList.add('card', 'card-main');
        mobileCard.innerHTML = cardContent.replace('class="video-size"', 'class="mobile-video-size"');
        mobileLearnContainer.appendChild(mobileCard);
    });
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

