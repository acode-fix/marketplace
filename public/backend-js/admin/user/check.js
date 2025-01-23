const userData = JSON.parse(localStorage.getItem('adminUser'));
const links = document.querySelectorAll('.permission');

  links.forEach((link) => {

  if(userData.role_id == 3)

      link.style.display = 'none';

  })
