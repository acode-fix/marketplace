  import { getSingleImage } from "./helper/helper.js";
  


const token = localStorage.getItem('apiToken');
let shopToken;

axios.get('/api/v1/userId', {
    headers: {
        'Authorization' : `Bearer ${token}`
    }
}).then((response) => {
    console.log(response);

    const userId = response.data.user.id;
    shopToken = response.data.user.shop_token;

    console.log(userId);
  

  // Enable pusher logging - don't include this in production
Pusher.logToConsole = true;
  

var pusher = new Pusher('cb55ced3464e97586728', {
  cluster: 'ap1'
});

var channel = pusher.subscribe('marketplace');

channel.bind("Illuminate\\Notifications\\Events\\BroadcastNotificationCreated", function(data) {

    console.log(userId);
        
        if(data.user_id === userId){

            //alert(`Hi ${data.comment}`) //here you can add you own logic
            loadNotification(data);  
                
        }
  });


}).catch((error) => {
    if(error.response) {
        console.log(error);
        

        
    }

})



async function loadNotification(data) {
  let content = [data];
  console.log(content);

  const notificationPromises = content.map(async (item) => {
      const productImageHtml = await loadProductDetails(item.product_id);
          return `
          <a class="notification-link"  href="/rating/page?user=${item.user_id}&product=${item.product_id}&shop=${shopToken}">
              <div class="notification">
                  <div class="notification_details">
                      <div class="notification_image">
                          <img src="innocent/assets/image/logo icon.svg" alt="Profile Picture">
                      </div>
                      <div class="message_area">
                          <p class="time">${item.comment}</p>
                          <p class="message"><strong>Congratulations</strong><br>It is a perfect time to give a review .</p>
                          <p class="time">${item.user_id}</p>
                          <p class="time">${item.product_id}</p>
                          
                      </div>
                      ${productImageHtml ?? `<img src="innocent/assets/image/laptop2.jpg" alt="Picture" class="notification_product_image">`}
                  </div>
              </div>
          </a>`;
  });

  // Wait for all notifications to load product images before inserting HTML
  const messages = await Promise.all(notificationPromises);

  notificationStatus(messages);

 


  

  const notification = document.querySelector('.notifications_region');
  if (notification) {
      notification.innerHTML += messages.join('');  // Insert all notifications at once

 
      
  }
}

async function loadProductDetails(id) {
 // console.log(id);

  try {
      const response = await axios.get(`/api/v1/product/${id}`, {
          headers: {
              'Authorization': `Bearer ${token}`,
          }
      });

      if (response.status === 200 && response.data) {
          const product = response.data.data;
          const image = getSingleImage(product.image_url);

          if (image) {
              return `<img src="/uploads/products/${image}" alt="Picture" class="notification_product_image">`;
          }
      }
  } catch (error) {
      console.log(error);
  }

  return null; // Return null if no image found or error occurs
}



axios.get('/api/v1/user/notification',  {

  headers : {
    'Authorization': `Bearer ${token}`
  }

}).then((response) => {
  console.log(response);

  if(response.status === 200 && response.data) {

    const notifications = response.data.notifications;

    getUnreadNotification(notifications);

  }



}).catch((error) => {
  console.log(error);

  if(error.response) {

    

  }

 

})



async function getUnreadNotification(notifications) {
  // Use map to create an array of promises for each notification's HTML content
  const messagePromises = notifications.map(async (notification) => {
      const data = JSON.parse(notification.data);

      console.log(data);

     // console.log(shopToken);

      // Load product image asynchronously
      const productImageHtml = await loadProductDetails(data.product_id);

      // Return the HTML for this notification
      return `
          <a class="notification-link"  href="/rating/page?user=${data.user_id}&product=${data.product_id}&shop=${shopToken}">
              <div class="notification">
                  <div class="notification_details">
                      <div class="notification_image">
                          <img src="innocent/assets/image/logo icon.svg" alt="Profile Picture">
                      </div>
                      <div class="message_area">
                          <p class="time">${data.comment}</p>
                          <p class="message"><strong>Congratulations</strong><br>It is a perfect time to give a review .</p>
                          <p class="time">${data.user_id}</p>
                          <p class="time">${data.product_id}</p>
                          
                      </div>
                      ${productImageHtml ?? `<img src="innocent/assets/image/laptop2.jpg" alt="Picture" class="notification_product_image">`}
                  </div>
              </div>
          </a>`;
  });

  // Wait for all notification HTML content to load
  const messages = await Promise.all(messagePromises);

  notificationStatus(messages);


 


  

  // Insert the messages into the notifications region
  const notificationContainer = document.querySelector('.notifications_region');
  if (notificationContainer) {
      notificationContainer.innerHTML += messages.join('');
  }

  


  
}


function notificationStatus(messages) {

    document.querySelector('.indicator-span').innerHTML = messages.length;

  //  console.log(messages.length)
  
    if(messages.length > 0 ) {
  
    document.querySelectorAll('.notification-icon').forEach((icon) => {
        icon.src = 'innocent/assets/image/notification.png';

    })
    
    }
  


}









 
