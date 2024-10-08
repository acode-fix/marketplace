<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('kaz/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('kaz/css/become.css') }}">
  <script src="{{ asset('kaz/js/bootstrap.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <style>

  </style>
</head>

<body>
  <div class="header">
    <div>
      <a href="{{ url('/shop') }}"><img class="arrow ms-2" src="kaz/images/Arrow.png" alt=""></a>

    </div>
    <div>
      <h6 class="me-4 mt-2">Become a verified seller</h6>
    </div>
  </div>
  <div class="container-fluid">
    <div class="scroll-text">
      <h6 class="fw-bold ms-3">The verified badge offers several benefits to sellers like yourself on buy and sell
        marketplace</h6>
      <ol class="list-style mt-2 me-2">
        <li>
          <h6><span class="fw-bold">Enhanced Trust and Credibility :</span><span class=" modal-text fw-light"> A
              verified badge signals to potential buyers that the seller's identity and
              information have been verified by the us (buy and sell marketplace).This can enhance trust and credibility
              especially
              for new or lesser-known sellers.
            </span></h6>
        </li>
        <li class="mt-2">
          <h6><span class="fw-bold">Increased Visibility:</span><span class=" modal-text fw-light">We (buy and sell
              market place) prioritize verfied sellers in search results and feautured
              listings.This increased visibility can lead to more exposure and sales opportunities for verified sellers
            </span></h6>
        </li>
        <li class="mt-2">
          <h6><span class="fw-bold">Improved Conversion Rates:</span><span class=" modal-text fw-light">Buyers are more
              likely to purchase from sellers they trust.Having a verified
              badge can reassure potential buyers,leading to higher conversion rates for Verified sellers.
            </span></h6>
        </li>
        <li class="mt-2">
          <h6><span class="fw-bold">Reduce Risk Of Fraud:</span><span class=" modal-text fw-light">Verification
              processes help weed out fraudulent or untrustworthy sellers.By displaying
              a verified badge,sellers demonstrate their legitmacy and reduced the risk of being perceived as a scam.
            </span></h6>
        </li>
        <li class="mt-2">
          <h6><span class="fw-bold">Access to premium Feautures:</span><span class=" modal-text fw-light">We offer
              exclusive feautures and benefits to verified sellers,such as promotional
              opportunities,and dedicated customer support.
            </span></h6>
        </li>
        <li class="mt-2">
          <h6><span class="fw-bold">Competitive Advantage:</span><span class=" modal-text fw-light">In competitive
              marketplaces,having a verified badge can differentiate
              sellers from their competitors and give them an edge in attracting customers
            </span></h6>
        </li>
        <li class="mt-2">
          <h6><span class="fw-bold">Long-term Reputation Building:</span><span class=" modal-text fw-light">Maintaining
              a verified status over time can contribute to building a positive
              reputation for ypu as a seller and your brand on buy and sell marketplace,which can lead to repeat
              business and word-of-mouth refferals.
            </span></h6>
        </li>
      </ol>

      <h6 class="modal-text ms-3 fw-light"> Overall,the verified badge serves as a valuable trust signal than can
        benefit sellers by improving thier visibility,
        credibility,and ultimately thier sales performance on the marketplace.
      </h6>
      <a href="{{ url('/bio') }}">
        <button type="button" class="btn btn-warning become-next-btn  btn-lg">Next</button>
      </a> 
    </div>
    
  

  </div>
  {{-- <a href="{{ url('/bio') }}">
    <button type="button" class="btn btn-warning become-next-btn  btn-lg">Next</button>
  </a> --}}



  <script type="module" src="{{ asset('backend-js/user/become.js') }}"></script>
</body>

</html>
