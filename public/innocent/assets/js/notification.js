


// function show_notifications() {
//     document.getElementById("notification_main").style.display = "block";
// }



// document.addEventListener('click', (event) => {
//     if (!notification_main.contains(event.target) && event.target !== notification_icon && !event.target.classList.contains('dropdown-arrow')) {
//         notification_main.style.display = 'none';
//     }
// });



if(document.getElementById('notification_icon')) {

document.getElementById('notification_icon').addEventListener('click', function(e) {
    e.stopPropagation();
    document.getElementById("notification_main").style.display = "block";
  });
  
  document.getElementById('notification_main').addEventListener('click', function(e) {
    e.stopPropagation();
  });
  
  document.addEventListener('click', function() {
    document.getElementById("notification_main").style.display = "none";
  });

  function turnOnNotifications() {
    document.getElementById("volumeHighIcon").style.display = "none";
    document.getElementById("volumeMuteIcon").style.display = "block";
  
}

function turnOffNotifications() {
    document.getElementById("volumeMuteIcon").style.display = "none";
    document.getElementById("volumeHighIcon").style.display = "block";
    document.getElementById("notificationSound").play();
}


}