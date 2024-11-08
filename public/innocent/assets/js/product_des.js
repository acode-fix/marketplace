
function showCard_get_started() {
    document.getElementById("promotion_card").style.display = "block";
    document.querySelector(".promotion").style.display = "none";
  }
  
  function hideCard_get_started() {
    document.getElementById("promotion_card").style.display = "none";
    document.querySelector(".promotion").style.display = "flex";
  }
  
function showCard_get_started2() {
    document.getElementById("promotion_card2").style.display = "block";
    document.querySelector(".promotion2").style.display = "none";
  }
  
  function hideCard_get_started2() {
    document.getElementById("promotion_card2").style.display = "none";
    document.querySelector(".promotion2").style.display = "flex";
  }
  

  
function changeToInput2() {
  document.querySelector(".tell_us_paragraph2").style.display="none"
  document.querySelector(".tell_us_what_u_want_input_area2").style.display="flex"
  document.querySelector(".tell_us_input2").focus();
  document.querySelector(".tell_us_input2").value="";
}

function send2() {
  var inputText = document.querySelector(".tell_us_input2").value.trim();
  if (inputText === "") {
    var myModal = new bootstrap.Modal(document.getElementById('tell_us_what_u_want_input_condition'));
      myModal.show();
  } else {
    document.querySelector(".tell_us_what_u_want_input_area2").style.display="none"
    document.querySelector(".loader2").style.display="block";
    setTimeout(function(){
      document.querySelector(".loader2").style.display="none";
      document.querySelector(".submmited2").style.display="block";
      setTimeout(function(){
          document.querySelector(".submmited2").style.display="none";
          document.querySelector(".tell_us_paragraph2").style.display="block";
      }, 2000);
    }, 2000);
  }
}

function changeText() {
  // document.getElementById("connectButton").innerHTML = "Connect with me <img src='assets/image/Shopping bag.png' alt='' >";
  document.getElementById("connectButton").style.outlineColor = "#ff3434";
  document.getElementById("connectButton").style.outlineStyle ="solid";
  document.getElementById("connectButton").style.outlineWidth ="3px"
}

function resetText() {
  // document.getElementById("connectButton").innerHTML = "Connect <img src='assets/image/Shopping bag.png' alt='' >";
  document.getElementById("connectButton").style.outline="none";
  document.getElementById("connectButton").style.border = "2px solid  #ffce29";
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