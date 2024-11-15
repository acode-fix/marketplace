const amountElements = document.querySelectorAll('.main_price_amount');

amountElements.forEach(amountElement => {
  const originalAmountText = amountElement.innerText;
  const amount = parseInt(originalAmountText.replace(/[^0-9]/g, ''));

  let formattedAmount = '';
  if (amount >= 1000000) {
    formattedAmount = `$${(amount / 1000000).toFixed(1)}M`;
  } else if (amount >= 1000) {
    formattedAmount = `$${(amount / 1000).toFixed(1)}K`;
  } else {
    formattedAmount = `$${amount}`;
  }

  // Function to check the width of the text
  function updateAmountText() {
    amountElement.innerText = originalAmountText;
    if (amountElement.scrollWidth > amountElement.clientWidth) {
      amountElement.innerText = formattedAmount;
    }
  }

  // Initial check
  updateAmountText();

  // Re-check on window resize
  window.addEventListener('resize', updateAmountText);
});
// for redirecting to serch input


function formatMoney(input) {
  // Remove all non-numeric characters
  input.value = input.value.replace(/[^0-9]/g, '');

  // Add commas for every 3 digits from the right
  if (input.value.length > 0) {
      input.value = '₦' + input.value;
  }
}


const actualPriceRange = document.getElementById('actualPriceRange');
const actualPriceInput = document.getElementById('actualPriceInput');
const minPriceRange = document.getElementById('minPriceRange');
const minPriceInput = document.getElementById('minPriceInput');
const maxPriceRange = document.getElementById('maxPriceRange');
const maxPriceInput = document.getElementById('maxPriceInput');

// actualPriceRange.addEventListener('input', function() {
//     const actualPrice = parseInt(actualPriceInput.value.substring(1));
//     const minPrice = Math.round(actualPrice * (minPriceRange.value / 100));
//     const maxPrice = Math.round(actualPrice * (maxPriceRange.value / 50));
//     minPriceInput.value = `₦${minPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
//     maxPriceInput.value = `₦${maxPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
// });

// minPriceRange.addEventListener('input', function() {
//     const actualPrice = parseInt(actualPriceInput.value.substring(1));
//     const minPrice = Math.round(actualPrice * (minPriceRange.value / 100));
//     minPriceInput.value = `₦${minPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
// });
// maxPriceRange.addEventListener('input', function() {
//     const actualPrice = parseInt(actualPriceInput.value.substring(1));
//     const maxPrice = Math.round(actualPrice * (maxPriceRange.value / 50));
//     maxPriceInput.value = `₦${maxPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
// });



// search page side bar

//product condition
function toggleButton(button) {
  if (button.classList.contains('new')) {
      document.querySelector('.new').classList.remove('clicked');
      document.querySelector('.used').classList.remove('clicked');
      button.classList.add('clicked');
  } else if (button.classList.contains('used')) {
      document.querySelector('.new').classList.remove('clicked');
      document.querySelector('.used').classList.remove('clicked');
      button.classList.add('clicked');
  }
}


function adjustRange50(rangeInput) {
  if (rangeInput.value = 50) {
      rangeInput.value = 50;
  }

}

function adjustRange0(rangeInput) {
  if (rangeInput.value > 100) {
      rangeInput.value = 100;
  }

}

function adjustRange100(rangeInput) {
  if (rangeInput.value < 50) {
      rangeInput.value = 50;
  }

}
//modal for sign up
function login() {
  document.querySelector(".sign_up_modal").style.display = 'none';
  document.querySelector(".login_modal").style.display = 'block';
}

function login2() {
  document.querySelector(".resetpassword").style.display = 'none';
  document.querySelector(".sign_up_modal").style.display = 'none';
  document.querySelector(".login_modal").style.display = 'block';
}

function login3() {
  document.querySelector(".chagepassword").style.display = 'none';
  document.querySelector(".sign_up_modal").style.display = 'none';
  document.querySelector(".login_modal").style.display = 'block';
}


function signup() {
  document.querySelector(".sign_up_modal").style.display = 'block';
  document.querySelector(".login_modal").style.display = 'none';
}

function showResetPassword() {
  
  document.querySelector(".resetpassword").style.display = 'block';
  document.querySelector(".login_modal").style.display = 'none';
}

function changePassword() {
 
  document.querySelector(".resetpassword").style.display = 'none';
  document.querySelector(".chagepassword").style.display = 'block';
}







function enter_shop_no(){
  document.getElementById("shop_no_dekstop").style.display="none"
  document.getElementById("shop_no_dekstop2").style.display="flex";
  document.getElementById("shop_no_input").focus()
}

function return_enter_shop_no(){
  document.getElementById("shop_no_dekstop2").style.display="none"
  document.getElementById("shop_no_dekstop").style.display="block"
}



function enter_shop_no_mobile(){
  document.getElementById("shop_number_mobile").style.display="flex"
  document.getElementById("shop_no_input_mobile").focus()
}



function return_enter_shop_no_mobile(){
  document.getElementById("shop_number_mobile").style.display="none"

}




function changeToInput() {
  document.querySelector(".tell_us_paragraph").style.display="none"
  document.querySelector(".tell_us_what_u_want_input_area").style.display="flex"
  document.querySelector(".tell_us_input").focus();
  document.querySelector(".tell_us_input").value="";
}

function send() {
  var inputText = document.querySelector(".tell_us_input").value.trim();
  if (inputText === "") {
    var myModal = new bootstrap.Modal(document.getElementById('tell_us_what_u_want_input_condition'));
      myModal.show();
  } else {
    document.querySelector(".tell_us_what_u_want_input_area").style.display="none"
    document.querySelector(".loader").style.display="block";
    setTimeout(function(){
      document.querySelector(".loader").style.display="none";
      document.querySelector(".submmited").style.display="block";
      setTimeout(function(){
          document.querySelector(".submmited").style.display="none";
          document.querySelector(".tell_us_paragraph").style.display="block";
      }, 2000);
    }, 2000);
  }
}


function showCard_get_started() {
  document.getElementById("promotion_card").style.display = "block";
  document.querySelector(".promotion").style.display = "none";
}

function hideCard_get_started() {
  document.getElementById("promotion_card").style.display = "none";
  document.querySelector(".promotion").style.display = "flex";
}






