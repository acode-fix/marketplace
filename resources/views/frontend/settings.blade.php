@extends('layouts.others.app')
@section('title','Settings')
@section('navtitle', 'Settings')


@section('content')

  <div class="main">

    <div class="content">
      <div class="container">
        <div class="row mt-1">
          <div class="col-10">
            <div style="float: right;">
              <div onmouseover="showText()" onmouseout="hideText()" class="badge-shop me-3 mb-2modal-font"
                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <img height="20px" width="15px" src="kaz/images/badge.png" alt="">
                <h6 style="font-size: small;" class="ps-1">Verify Now</h6>
              </div>
              <div id="hover-text">become verified seller</div>
            </div>
          </div>

          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header modal-top">
                  <img class="modal-arrow" src="kaz/images/Arrow.png" alt="">
                  <h6 class="modal-title ms-4 fw-bold" id="exampleModalLabel">Become a verified Seller</h6>
                  <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                  <div id="page1">
                    <h6 class="fw-bold">The verified badge offers several benefits to sellers like yourself on buy and
                      sell marketplace</h6>
                    <ol class="list-style mt-2">
                      <li>
                        <h6><span class="fw-bold">Enhanced Trust and Credibility:</span><span
                            class=" modal-text fw-light">A verified badge signals to potential buyers that the seller's
                            identity and
                            information have been verified by the us (buy and sell marketplace).This can enhance trust
                            and credibility especially
                            for new or lesser-known sellers.
                          </span></h6>
                      </li>
                      <li class="mt-3">
                        <h6><span class="fw-bold">Increased Visibility:</span><span class=" modal-text fw-light">We (buy
                            and sell market place) prioritize verfied sellers in search results and feautured
                            listings.This increased visibility can lead to more exposure and sales opportunities for
                            verified sellers
                          </span></h6>
                      </li>
                      <li class="mt-3">
                        <h6><span class="fw-bold">Improved Conversion Rates:</span><span
                            class=" modal-text fw-light">Buyers are more likely to purchase from sellers they
                            trust.Having a verified
                            badge can reassure potential buyers,leading to higher conversion rates for Verified sellers.
                          </span></h6>
                      </li>
                      <li class="mt-3">
                        <h6><span class="fw-bold">Reduce Risk Of Fraud:</span><span
                            class=" modal-text fw-light">Verification processes help weed out fraudulent or
                            untrustworthy sellers.By displaying
                            a verified badge,sellers demonstrate their legitmacy and reduced the risk of being perceived
                            as a scam.
                          </span></h6>
                      </li>
                      <li class="mt-3">
                        <h6><span class="fw-bold">Access to premium Feautures:</span><span
                            class=" modal-text fw-light">We offer exclusive feautures and benefits to verified
                            sellers,such as promotional
                            opportunities,and dedicated customer support.
                          </span></h6>
                      </li>
                      <li class="mt-3">
                        <h6><span class="fw-bold">Competitive Advantage:</span><span class=" modal-text fw-light">In
                            competitive marketplaces,having a verified badge can differentiate
                            sellers from their competitors and give them an edge in attracting customers
                          </span></h6>
                      </li>
                      <li class="mt-3">
                        <h6><span class="fw-bold">Long-term Reputation Building:</span><span
                            class=" modal-text fw-light">Maintaining a verified status over time can contribute to
                            building a positive
                            reputation for ypu as a seller and your brand on buy and sell marketplace,which can lead to
                            repeat business and word-of-mouth refferals.
                          </span></h6>
                      </li>
                    </ol>

                    <h6 class=" modal-text fw-light"> Overall,the verified badge serves as a valuable trust signal than
                      can benefit sellers by improving thier visibility,
                      credibility,and ultimately thier sales performance on the marketplace.
                    </h6>
                  </div>
                  <!-- Page 2 -->
                  <div id="page2" style="display: none;">

                    <!-- Content for page 2 -->
                    <div style="text-align: center;">
                      <h5 class="fw-bold">Your Bio</h5>
                      <h6 class="fw-light"> It's crucial to verify the credibility <br> and legitmacy of our sellers.
                      </h6>
                    </div>
                    <div class="container">
                      <form class="row g-3 mt-3">
                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label fw-bold">Email</label>
                          <input oninput="hideIcon(this)" id="search-modal" type="text" class="form-control"
                            placeholder="Ceredesign@gmail.com">
                        </div>
                        <div class="col-md-6">
                          <label for="inputState" class="form-label fw-bold">Nationality</label>
                          <select id="inputstate" class="form-select">
                            <option>Choose...</option>
                            <option>Nigera</option>
                            <option>USA</option>
                          </select>
                        </div>
                        <div class="col-md-6 mt-4">
                          <label for="name" class="form-label fw-bold">Name</label>
                          <input oninput="hideIcon(this)" id="search-modal1" type="text" class="form-control"
                            placeholder="Your legalName">
                        </div>
                        <div class="col-md-6 mt-4">
                          <label for="address" class="form-label fw-bold">Address</label>
                          <input oninput="hideIcon(this)" id="search-modal2" type="text" class="form-control"
                            placeholder="Enter your work Address">
                        </div>
                        <div class="col-md-6 mt-5">
                          <div>
                            <label for="address" class="form-label fw-bold">Gender</label>
                          </div>

                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                              value="option1">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                              value="option2">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                          </div>
                        </div>
                        <div class="col-md-6 mt-5">
                          <label for="phonenumber" class="form-label fw-bold">Phone Number</label>
                          <input oninput="hideIcon(this)" id="search-modal3" type="text" class="form-control"
                            placeholder="Enter Your Contact Phone Number">
                        </div>

                        <div class="col-12">
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </form>

                    </div>

                  </div>
                  <div id="page3" style="display: none;">
                    <div class="mt-5" style="text-align: center;">
                      <h2 class="fw-light">NIN</h2>
                      <p>Kind Upload Your Natonal <br>Identification Card </p>
                      <img id="preview-image" class="mt-4" src="kaz/images/Nin upload.svg" alt="">
                    </div>
                    <div class="mt-5" style="text-align: center; ">
                      <form action="">
                        <input type="file" name="" id="actual-btn-desktop" hidden>
                        <label id="upload" class="label" for="actual-btn-desktop">Upload</label>
                      </form>
                    </div>
                  </div>
                  <div id="page4" style="text-align: center; display: none;">
                    <form action="">
                      <div class="  selfie1 mx-auto mt-5">
                        <div class="vid" id="video-container">
                          <video id="video" autoplay></video>
                        </div>
                        <div class="canvas-st" id="canvas-container">
                          <canvas class="canvas2-st" id="canvas"></canvas>
                        </div>
                      </div>
                      <div class="" style="text-align: center; margin-top: -28px;">
                        <!-- <img  id="upload"   src="kaz/images/selfie.svg" alt=""> -->
                        <div class="use-struct">
                          <label id="use-camera" class="">
                            <h6> Click Here To Take a selfie</h6>
                            <h6 class="fw-light mt-2"> Please ensure all your face within the border of the scanner</h6>

                          </label>
                          <button style="display: none;" id="snap" type="button"
                            class=" btn btn-success btn-lg  ">Snap</button>

                        </div>

                      </div>
                      <div class="mt-3" style="text-align: center;">
                        <button style="display: none;" id="retake-button" type="button"
                          class=" btn btn-success btn-lg  ">Retake</button>
                        <button style="display: none;" id="save-button" type="button"
                          class=" btn btn-success btn-lg  ">Save</button>
                      </div>

                    </form>

                  </div>
                  <!-- Page 5 -->
                  <div id="page5" style="display: none;">
                    <!-- Content for page 5 -->
                    <div class="container">
                      <div class="row">
                        <div class="col">
                          <div class="vetted-div">
                            <div style="margin-top: -30px;">
                              <img class="img-fluid dp ms-3" width="60px" src="kaz/images/dp.png" alt="">
                              <div class="vetted">
                                <img src="kaz/images/badge.png" alt="">
                              </div>
                            </div>
                            <div class="ms-4 mt-3">
                              <h5 class="modal-mire">Mired Augustine </h5>
                              <h6 class="modal-augustine" style="margin-top: -10px;">miredaugustine@gmail.com</h6>
                              <h6 class="vetted-seller pt-2 fw-bold">vetted seller badge</h6>
                            </div>
                            <img class="img-vetted" src="kaz/images/badge.png" alt="">
                          </div>
                          <div class="mt-4">
                            <!-- <h6>Monthly</h6> -->
                            <form action="">
                              <div class="month" onclick="selectPlan('month')">
                                <h6>Monthly</h6>
                                <p class="badge-text">Your badge cost #2500 per month to stay <input
                                    class="form-check-input ms-2" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1"><br>
                                  active on your profile </p>
                              </div>
                              <div class="year" onclick="selectPlan('year')">
                                <h6>Yearly</h6>
                                <p class="badge-text"> Your badge cost #20,000 and save 33% <input
                                    class="form-check-input ms-4" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2"><br>
                                  per year to stay active on your profile</p>

                              </div>

                            </form>

                          </div>

                        </div>
                        <div class="col">
                          <h6 class="mt-2">Remember the benefits</h6>
                          <ol class="modal-benefits">
                            <li> Enhanced trust and credibility with potential buyers.</li>
                            <li>Increased visibility in search results and featured listings.</li>
                            <li>Improved conversion rates by reassuring buyers.</li>
                            <li>Reduced risk of fraud and perception as scam.</li>
                            <li>Access to excusive feautures and promotional opportunities.</li>
                            <li>Competitive advantage over unverified sellers.</li>
                            <li>long-term reputation building and potential for repeat business.</li>
                          </ol>
                        </div>
                      </div>

                    </div>

                  </div>
                  <!-- Page 6 -->
                  <div id="page6" style="display: none;">
                    <!-- Content for page 6 -->
                    <div style="text-align: center; margin-top: 40px;">
                      <img src="kaz/images/success.svg" alt="">
                      <h6 style="margin-top: 40px;" class="fw-bold ">Successful!</h6>
                      <p class="fw-light approval-text mt-3">Your document has been uploded.<br>
                        Awaiting Approval normally approval <br>
                        may take up to 1hrs during business days <br>and up to 3hrs during off business days </p>

                    </div>

                  </div>
                </div>
                <div style="border: none;" class="modal-footer">
                  <button style="width: 15%;" id="nextBtn" type="button" class="btn btn-md btn-warning">Next</button>
                </div>
              </div>
            </div>
          </div>



        </div>
        <div class="container">
          <form action="" class="row">
            <div class="col-8 upload-div">
              <img id="previewImg1" class="img-fluid" src="kaz/images/dp.png" alt="">
              <h6 class="ms-4">Upload your profile picture <br>
                <span class="fw-light identify-text">This helps visitors to recognize you on buy and sell</span>
              </h6>
            </div>
            <div class="col-2 post-btn">
              <input type="file" name="photo" id="actual-btn" accept="image/*" hidden onchange="previewImage(this)">
              <label class="label3" for="actual-btn">Upload Photo</label>
            </div>
            <div class="col-8">
              <hr style="background-color: black;">
            </div>
            <div class="col-8 mb-3">
              <label for="usernameInput" class="form-label">Username</label>
              <input type="text" class="form-control" id="usernameInput"
                placeholder="This is your profile display name on buyandsell">
            </div>
            <div class="col-2 mt-3 post-btn">
              <button id="editUsernameBtn" style="background-color: whitesmoke;" type="button"
                class="btn btn-info">Edit</button>
            </div>
            <div class="col-8 mb-3">
              <label for="usernameInput" class="form-label">Profile Bio</label>
              <input type="text" class="form-control" id="profileInput"
                placeholder="This is will be displayed to potential buyers only if you are a verified seller (Mx1000)">
            </div>
            <div class="col-2 mt-3 post-btn">
              <button id="editProfileBtn" style="background-color: whitesmoke;" type="button"
                class="btn btn-info">Edit</button>
            </div>
            <div class="col-8 mb-3">
              <label for="phoneInput" class="form-label">Call Phone Number</label>
              <input type="number" class="form-control" id="phoneInput"
                placeholder="This contact will be used by visitors on buyandsell to reach you via phone call">
            </div>
            <div class="col-2 mt-3 post-btn">
              <button id="editPhoneBtn" style="background-color: whitesmoke;" type="button"
                class="btn btn-info">Edit</button>
            </div>
            <!-- <div class="col-8 mb-3">
              <label for="whatsappInput" class="form-label">Whatsapp Phone link</label>
              <input type="text" class="form-control" id="whatsappInput" placeholder="This link will be used by visitors on buyandsell to reach you on whatsapp">
            </div> -->
            <!-- <div class="col-2 mt-3 post-btn">
              <button id="editWhatsappBtn" style="background-color: whitesmoke;" type="button" class="btn btn-info">Edit</button>
            </div> -->
            <div class="col-8">
              <hr style="background-color: black;">
            </div>
            <div class="col-8 mb-3">
              <div class="location-struct">
                <h6 class="me-2">location</h6>
                <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div>
              <div>
                <p class="fw-light">Turn current location on</p>
              </div>
            </div>
            <div class="col-2 mb-5 post-btn">
              <button id="saveBtn" type="button" class="btn btn-warning">Save</button>
            </div>
          </form>
        </div>
      </div>
   </div>
  </div>
   <!-- mobile-view  -->
   <div class="mobile-view">
    <div class="container-fluid">
      <div class="row">
        <div class="mobile-struct">
          <div class="mobile-link-btn">
            <a href="{{ url('/shop') }}">Shop</a>
          </div>
          <div class="mobile-link-btn1">
            <a href="{{ url('/settings') }}">Settings</a>
          </div>
          <div class="mobile-link-btn">
            <a href="{{ url('/learn') }}">Learn</a>
          </div>

          <div class="mobile-link-btn">
            <a href="{{ url('/ads') }}"> Ads</a>
          </div>

          <div class="mobile-link-btn">
            <a href="{{ url('/wallet') }}"> Wallet</a>
          </div>
        </div>
      </div>
      <form class="row mt-5 " action="">
        <div class="col-10 mb-3">
          <label for="usernameInput" class="form-label">Username</label>
          <input type="text" class="form-control" id="usernameInput1"
            placeholder="This is your profile display name on buyandsell">
        </div>
        <div class="col-2 mt-3 post-btn">
          <button id="editUsernameBtn1" style="background-color: whitesmoke;" type="button"
            class="btn btn-info">Edit</button>
        </div>
        <div class="col-10 mb-3">
          <label for="phoneInput" class="form-label">Call Phone Number</label>
          <input type="text" class="form-control" id="phoneInput1"
            placeholder="This contact will be used by visitors on buyandsell to reach you via phone call">
        </div>
        <div class="col-2 mt-3 post-btn">
          <button id="editPhoneBtn1" style="background-color: whitesmoke;" type="button"
            class="btn btn-info">Edit</button>
        </div>
        <div class="col-10 mb-3">
          <label for="whatsappInput" class="form-label">Whatsapp Phone link</label>
          <input type="text" class="form-control" id="whatsappInput1"
            placeholder="This link will be used by visitors on buyandsell to reach you on whatsapp">
        </div>
        <div class="col-2 mt-3 post-btn">
          <button id="editWhatsappBtn1" style="background-color: whitesmoke;" type="button"
            class="btn btn-info">Edit</button>
        </div>
        <div>
          <hr style="background-color: black;">
        </div>
        <div class="mt-2" style="display: flex;justify-content: space-between;">
          <div onmouseover="showText3()" onmouseout="hideText3()">
            <div class="verify-badge-m">

              <img class="" height="20px" width="15px" src="kaz/images/badge.png" alt="">
              <a href="{{ url('/become') }}">
                <h6 class="verify-m ps-1">Verify Now</h6>
              </a>
            </div>

            <div class="" id="hover-text3">become verified seller</div>
          </div>
          <div style="display: flex; ">
            <div>
              <div class="location-struct-m">
                <h6 class="me-2">Location</h6>
                <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label>
              </div>
              <p class="turn-text">Turn on Current Location</p>
            </div>

          </div>
        </div>

        <div class="mobile-btn">
          <button id="saveBtn1" type="button" class="btn btn-warning save-btn btn-lg">Save</button>
        </div>
      </form>
    </div>
  </div>


  <script>
    function goBack() {
      window.history.back();
    }



  </script>

@endsection
