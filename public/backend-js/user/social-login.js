
const links = document.querySelectorAll(".google-login");

links.forEach((link) => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        const provider = "google";
        window.location.href = `/auth/${provider}/redirect`;
      
    });
});


// const fblinks = document.querySelectorAll(".fb-login");


// fblinks.forEach((link) => {
//     link.addEventListener("click", (e) => {
//         e.preventDefault();
//         const provider = "facebook";
//         window.location.href = `/auth/${provider}/redirect`;
      
//     });
// });




