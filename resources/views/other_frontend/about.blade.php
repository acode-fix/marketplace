<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About :: Page</title>
  <link rel="icon" href="{{ asset('innocent/assets/image/brand-icon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/success.css') }}">
  <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
  <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>

  </style>
</head>

<body>
  <div class="preloader">
    <div class="preloader-content">
      <img  src="{{ asset('innocent/assets/image/brand-icon.png') }}" class="bag-icon" alt="Bag Icon">
      <div class="dots">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
    </div>
 </div>
  <div class="header">
    <div>
      <a href="{{ url('/') }}"> <img class="arrow ms-2" src="{{ asset('/kaz/images/Arrow.png') }}" alt=""></a>

    </div>
    <div>
      <h6 class="me-5 mt-2">Become a verified seller</h6>
    </div>
  </div>
  <div style="margin-top: 150px" class="container">
    <div class="row">
      <div class="col">
        <h5 class="fw-bold">About Us</h5>
        <p class="fw-light">Welcome to LoopMart—an innovative marketplace built to connect buyers and sellers directly. At LoopMart, we’re reshaping how people buy and sell by focusing on building connections rather than facilitating payments, making every transaction safe, transparent, and community driven.</p>
        <h5 class="fw-bold">Our Mission</h5>
        <p class="fw-light">LoopMart was created with a clear purpose: to empower a trustworthy, connection-based marketplace where buyers and sellers can interact freely, transparently, and securely. We aim to make buying and selling simple, secure, and accessible, with a mission to foster a community where everyone can find what they need or discover new opportunities.</p>
        <h5 class="fw-bold">How LoopMart Works</h5>
        <p class="fw-light">We simplify the buying and selling process by focusing on seamless connections. Sellers can create detailed listings for their products or services, including category, condition (new or fairly used), price options, promotional discounts, "ask for price" options, images, and location. Our vetted sellers, who subscribe monthly or annually, gain a badge that highlights their credibility, making it easier for buyers to identify trusted sources. Buyers can view each vetted seller’s shop for all their listings, allowing for a complete shopping experience.</p>
        <h5 class="fw-bold">Commitment to Quality and Trust</h5>
        <p class="fw-light">Trust is the backbone of LoopMart. Our vetted seller system ensures that only reputable sellers earn the distinguished badge, enhancing safety for our buyers. We are dedicated to maintaining quality across the platform, providing tools that encourage transparency, and building a strong community foundation based on trust and accountability.</p>
        <h5 class="fw-bold">Customer Support and Assistance</h5>
        <p class="fw-light">We understand that support is essential in creating a smooth experience. Our dedicated customer support team is here to help you with any questions, resolve issues, and listen to your feedback. Whether you're new to LoopMart or a longtime user, we’re here to make sure you have a seamless experience.</p>
        <h5 class="fw-bold">Future Growth and Expansion Plans</h5>
        <p class="fw-light">Currently, LoopMart is operating in beta in Nigeria, with exciting plans to expand to more locations in the near future. We’re continuously developing new features, including an upcoming buyer request dashboard exclusive to vetted sellers, which will allow for direct connections and opportunities to meet buyer needs faster. As we grow, our vision remains focused on building a marketplace that empowers communities across Nigeria and beyond.</p>
        <h5 class="fw-bold">Community and Feedback</h5>
        <p class="fw-light">We believe in building LoopMart with our users in mind. Your feedback helps shape our platform, and we welcome suggestions, feature requests, and insights from our community. Our goal is to create a marketplace that evolves with you, serving as a hub for discovering, buying, and selling within a trusted network.</p>
        <h5 class="fw-bold">Join Us  </h5>
        <p class="fw-light">Whether you're looking to buy, sell, or simply explore, LoopMart invites you to become part of our community. Join us today to connect, discover, and be a part of a marketplace that brings people together—LoopMart, where connections come full circle.</p>
      </div>
    </div>
  </div>
  <script type="module" src="{{ asset('backend-js/about.js') }}"></script>
  
</body>

</html>
