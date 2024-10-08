export function validationError(responseErrors) {

  let allErrors = [];

  for (let field in responseErrors) {

    const fieldErrors = responseErrors[field];

    fieldErrors.forEach((message) => {

    allErrors.push(message);

    })


  }
 const errorMsg = allErrors.join('\n');

return  errorMsg;

}

export function displaySwal(errorMsg) {

    Swal.fire({
      icon: 'error',
      title: 'Validation Error',
      text: errorMsg,
  });
  


}


export function getToken () {

  const token = localStorage.getItem('apiToken')

if(!token) {

    Swal.fire({
    icon: 'error',
    title: 'Unauthenticated User',
    text: 'Kindly log in.'
}).then(() => {

    window.location.href = '/'; 
    
});

return false

} else {

  return token;
}

}
