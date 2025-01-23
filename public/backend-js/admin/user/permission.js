const userData = JSON.parse(localStorage.getItem('adminUser'));

if(userData.role_id == 3 ) {

  
   window.location.href = '/access/denied'; 



     
}




