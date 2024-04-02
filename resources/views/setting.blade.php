@extends('layouts.others.app')
@section('title','Privacy Policy')

@section('content')

<div class="col-md-8 " style="padding: 10px;">
    <form class="">
            <div class=" d-flex mt-2">
                <div class="child">
                   <img src="images/profileimg.png" alt="" class="proimg">
                </div>
                <div class="pbut mt-5" style="margin-left: 40px;">
                    <p><b>Upload your profile photo</b> <br>
                    <span>This helps visitor to recognize you and Buyandsell</span></p>
                </div>
                <div style="margin-left: 70px;">
                  <div class="twobtn">
                      <button class="btn-one mb-3 border-warning">Become a verified <br><span><img src="images/baglogo.png" alt=""></span> SELLER </button>
                  </div>
                  <div>
                    <button class="btn-two btn lightgray">Upload photo</button>
                  </div>
                  </div>
                </div>

                <hr style="border-bottom: 1px solid black; margin-top: 40px;">
                        
            <div class="row ms-3  container">
                <div class="col-md-8 me-4 mt-3">
                  <label for="username" class="form-label"><b>Username</b></label>
                  <input type="text" class="form-control border-warning" id="inputusername" placeholder="This is your profile display name on buyandsell">
                </div>
                <div class="col-auto mt-5">
                  <button type="submit" class="btn lightgray">Edit</button>
                </div>
                
            </div>
            <div class="row ms-3  container">
                <div class="col-md-8 me-4 mt-3">
                  <label for="username" class="form-label"><b>Call Phone Number</b></label>
                  <input type="text" class="form-control border-warning" id="inputphonenum" placeholder="This contact will be used by visitor on buyandsell to reach you via phone call">
                </div>
                <div class="col-auto mt-5">
                    <button type="submit" class="btn lightgray">Edit</button>
                  </div>
            </div>
            <div class="row ms-3  container">
                <div class="col-md-8 me-4 mt-3">
                  <label for="username" class="form-label"><b>WhatsApp Phone Link</b> </label>
                  <input type="text" class="form-control border-warning" id="inputwatsapplink" placeholder="This link will be used by visitors on buyandsell to reach on watsapp">
                </div>
                <div class="col-auto mt-5">
                    <button type="submit" class="btn lightgray">Edit</button>
                  </div>
            </div>

            <!-- {{-- hr --}} -->
            <hr style="border-bottom: 1px solid black; margin-top: 40px; width: 350px;">

            <div class="row mt-4 ms-3">
              <div class="d-flex">
                <div style="margin-right: 60px;">
                <label class="form-check-label" for="gridCheck">
                  <b>Location</b>
                  </label>
              </div>
                <div class="form-check col">     
                  <label class="con">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                  </label>         
                </div>
                <div class="col-auto mt-2 savebutton" style="margin-right: 150px;">
                  <button type="submit" class="btn btn-warning">Save </button>
                </div>
              
                </div>
                <p>Turn current on Location</p>

            </div>
    </form>

</div>
</div>
</div>
</div>

@endsection