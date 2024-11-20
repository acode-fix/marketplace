const redirectMessage = document.getElementById('redirect-message');

let count = 10;

const intervalId = setInterval(() => {

  count --;

  redirectMessage.textContent = ` You will be redirected back to shop  in ${count} seconds......`;

  if(count === 0) {
    clearInterval(intervalId);

    window.location.href = '/shop'
  }




}, 1000)