
// window.onload = function() {
//   document.getElementById('find-what-to-buy_search_page').click();
//   document.getElementById('find-what-to-buy_search_page').click();
// };
function updateSearchInput(button) {
  document.getElementById("find-what-to-buy_search_page").value = button.textContent;
  document.getElementById("search_main").style.display="block"
  document.getElementById("search_container").style.display="none"
  document.getElementById("search_main").style.paddingTop="90px"
 
}

  function check_input() {
    var input = document.getElementById("find-what-to-buy_search_page").value; 
    if (input === "") {
      var myModal = new bootstrap.Modal(document.getElementById('search_input_condition'));
      myModal.show();
    } else {
      
      document.getElementById("search_main").style.display="block"
      document.getElementById("search_container").style.display="none"
      document.getElementById("search_main").style.paddingTop="90px"
    
    }

}

function hideFilterMain() {
  document.querySelector('.filter_main').style.display = 'none';
}

function toggleButton2(button2) {
  if (button2.classList.contains('new2')) {
      document.querySelector('.new2').classList.remove('clicked');
      document.querySelector('.used2').classList.remove('clicked');
      button2.classList.add('clicked');
  } else if (button2.classList.contains('used2')) {
      document.querySelector('.new2').classList.remove('clicked');
      document.querySelector('.used2').classList.remove('clicked');
      button2.classList.add('clicked');
  }
}


function toggleButton3(button3) {
  if (button3.classList.contains('new3')) {
      document.querySelector('.new3').classList.remove('clicked');
      document.querySelector('.used3').classList.remove('clicked');
      button3.classList.add('clicked');
  } else if (button3.classList.contains('used3')) {
      document.querySelector('.new3').classList.remove('clicked');
      document.querySelector('.used3').classList.remove('clicked');
      button3.classList.add('clicked');
  }
}


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("scrollToTop").style.display = "block";
  } else {
    document.getElementById("scrollToTop").style.display = "none";
  }
}

document.getElementById("scrollToTop").addEventListener("click", function() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});


document.querySelector('.profile_picture').addEventListener('click', function(e) {
  e.stopPropagation();
  document.querySelector('.profile_card').style.display = 'block';
});

document.querySelector('.profile_card').addEventListener('click', function(e) {
  e.stopPropagation();
});

document.addEventListener('click', function() {
  document.querySelector('.profile_card').style.display = 'none';
});

function goBack() {
  var previousPage = localStorage.getItem('previousPage');
  if (previousPage) {
      window.location.href = previousPage;
  } else {
      window.history.back();
  }
}