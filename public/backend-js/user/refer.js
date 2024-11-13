import { getToken } from "../helper/helper.js";
import { serverError } from "../admin/auth-helper.js";

const token = getToken();

axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

if(token) {
   
    
 
    axios.get('/api/v1/user/refer-link',).then((response) => {

     // console.log(response);

      if (response.status === 200 && response.data) {

        
    const linkInput = document.getElementById('linkInput');
    const mobileLink = document.getElementById('linkInput-mobile');
         
         const referLink = response.data.url;

        linkInput.value = referLink;
        mobileLink.value = referLink; 
       

      }

    }).catch((error) => {

    //  console.log(error); 

      if(error.response) {

        if (error.response.status === 404 && error.response.data) {

          const message = error.response.data.message;

          Swal.fire({
            icon: 'error',
            confirmButtonColor: '#ffb705',
            title: 'Authentication Error',
            text: message,
            willClose() {
              window.location.href = '/';
            }
        });


        }


        if(error.response.status === 500) {
          serverError();
        }



      }

    })

  
    const btn = document.getElementById('linkButton');
    const mobileBtn = document.getElementById('linkButton-mobile');



    
    const paragraph = document.getElementById('display');
    const mobileParagraph = document.getElementById('display-mobile');



    [btn, mobileBtn].forEach((button) => {

      button.addEventListener('click', () => {

      const  paragraphId = button.id === 'linkButton' ? 'display' : 'display-mobile';
      const paragraph = document.getElementById(paragraphId);

       const inputId = button.id === 'linkButton' ? 'linkInput' : 'linkInput-mobile';
       const input = document.getElementById(inputId);

       loadCopy(paragraph, input.value);


      });

    })
  
   
    function loadCopy(paragraph, inputValue) {

      
    navigator.clipboard.writeText(inputValue ).then(() => {

      paragraph.textContent = 'Link copied successfully!';

    }).then(() => {
      Swal.fire({
            icon: 'success',
            confirmButtonColor: '#ffb705',
            title: 'Thank you for inviting your friends',
            text: linkInput.value,
            willClose() {
              paragraph.textContent = '';
            }
        });
    })


    }
   
}else {
 // console.log(error);
}

