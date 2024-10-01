<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{$title}}</title>
  <link rel="stylesheet" href="{{asset('kaz/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('kaz/css/navbar.css')}}">
  <link rel="stylesheet" href="{{asset('kaz/css/shop.css')}}">
  <link rel="stylesheet" href="{{asset('kaz/css1/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('kaz/css1/fontawesome.min.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <style>
  .links {
    position: relative; /* Set the parent container to relative, so submenu is positioned relative to this */
}

.submenu {
    display: none; /* Initially hidden */
    position: absolute;
    top: 110%;
    left: 0;
    width: 100%;
    background-color: whitesmoke;
    padding: 5px;
    /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); */
    z-index: 1;
}

.submenu ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.submenu ul li {
    margin: 5px 0;
}

.submenu ul li a {
    text-decoration: none;
    color: #333; /* Customize text color */
    display: block; /* Ensure full width clickable area */
    font-size: 13px;
    text-align: center
}
.submenu ul li a:hover {
  color: black;
  background-color: white;
}

/* Animation for sliding effect */
.slide-out {
    animation: slide-out 0.5s forwards;
}

.slide-in {
    animation: slide-in 0.5s forwards;
}

@keyframes slide-in {
    from {
        height: 0;
        opacity: 0;
    }
    to {
        height: auto;
        opacity: 1;
    }
}

@keyframes slide-out {
    from {
        height: auto;
        opacity: 1;
    }
    to {
        height: 0;
        opacity: 0;
    }
}
.profile-picture {
    cursor: pointer;
} 


  </style>
  <script src="{{asset('kaz/js/bootstrap.js')}}"></script>
  <script src="{{asset('kaz/js/shop.js')}}"></script>
  <script  src="{{asset('kaz/js/dashboard.js')}}"></script>
  
  
  
  
</head>