  import { getSingleImage } from "./helper/helper.js";


const token = localStorage.getItem('apiToken');

axios.get('/api/v1/userId', {
    headers: {
        'Authorization' : `Bearer ${token}`
    }
}).then((response) => {
    console.log(response);

    const userId = response.data.userId;

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

/*
async function loadNotification(data) {

    let content = [];
    content.push(data);

    console.log(content);

      let message = '';
    for (let i = 0; i < content.length; i++) {

      const productImageHtml = await loadProductDetails(content[i].product_id);

         message += `
     <a href="{{ url('rating') }}" >
                <div class="notification">
                    <div class="notification_details">
                        <div class="notification_image"><img src="innocent/assets/image/logo icon.svg" alt="Profile Picture">
                        </div>
                        <div class="message_area">
                            <p class="message"><strong>congratulations </strong> <br>it is a perfect time to tell the
                                world about it.</p>
                            <p class="time">${content[i].user_id}</p>
                            <p class="time">${content[i].product_id}</p>
                            <p class="time">${content[i].comment}</p>
                            

                        </div>
                        ${productImageHtml ?? `<img src="innocent/assets/image/laptop2.jpg" alt="Picture" class="notification_product_image"></img>`} 
                        

                    </div>

                </div>
     </a>`;


    }

    console.log(message);


const notification = document.querySelector('.notifications_region');

if(notification) {
     notification.insertAdjacentHTML('beforeend', message);
}


    
   
}

async function loadProductDetails(id) {

    console.log(id);

    axios.get(`/api/v1/product/${id}`, {
        headers : {
            'Authorization': `Bearer ${token}`,
        }

       
    }).then((response)=> {
        console.log(response);

        if(response.status === 200 && response.data) {

           const product  = response.data.data;

         const image  = getSingleImage(product.image_url);

         console.log(image);

         if(image) {

           return  `<img src="/uploads/products/${image}" alt="Picture" class="notification_product_image"></img>`

         }
        }

    }).catch((error) => {
        console.log(error);

    })

}

*/

async function loadNotification(data) {
  let content = [data];
  console.log(content);

  const notificationPromises = content.map(async (item) => {
      const productImageHtml = await loadProductDetails(item.product_id);

      return `
          <a href="{{ url('rating') }}">
              <div class="notification">
                  <div class="notification_details">
                      <div class="notification_image">
                          <img src="innocent/assets/image/logo icon.svg" alt="Profile Picture">
                      </div>
                      <div class="message_area">
                          <p class="message"><strong>Congratulations</strong><br>It is a perfect time to tell the world about it.</p>
                          <p class="time">${item.user_id}</p>
                          <p class="time">${item.product_id}</p>
                          <p class="time">${item.comment}</p>
                      </div>
                      ${productImageHtml ?? `<img src="innocent/assets/image/laptop2.jpg" alt="Picture" class="notification_product_image">`}
                  </div>
              </div>
          </a>`;
  });

  // Wait for all notifications to load product images before inserting HTML
  const messages = await Promise.all(notificationPromises);

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

})



async function getUnreadNotification(notifications) {
  // Use map to create an array of promises for each notification's HTML content
  const messagePromises = notifications.map(async (notification) => {
      const data = JSON.parse(notification.data);

      console.log(data);

      // Load product image asynchronously
      const productImageHtml = await loadProductDetails(data.product_id);

      // Return the HTML for this notification
      return `
          <a href="{{ url('rating') }}">
              <div class="notification">
                  <div class="notification_details">
                      <div class="notification_image">
                          <img src="innocent/assets/image/logo icon.svg" alt="Profile Picture">
                      </div>
                      <div class="message_area">
                          <p class="message"><strong>Congratulations</strong><br>It is a perfect time to tell the world about it.</p>
                          <p class="time">${data.user_id}</p>
                          <p class="time">${data.product_id}</p>
                          <p class="time">${data.comment}</p>
                      </div>
                      ${productImageHtml ?? `<img src="innocent/assets/image/laptop2.jpg" alt="Picture" class="notification_product_image">`}
                  </div>
              </div>
          </a>`;
  });

  // Wait for all notification HTML content to load
  const messages = await Promise.all(messagePromises);

  // Insert the messages into the notifications region
  const notificationContainer = document.querySelector('.notifications_region');
  if (notificationContainer) {
      notificationContainer.innerHTML += messages.join('');
  }
}



 
