@extends('layouts.main.app')
@section('title','P')
@section('content')

<div class="col-md-12 container mt-5 ">
    <div>
     <h6  class="mb-0 select_product " >Select a Product Category <span class=" text-danger select_product">*</span></h4>
      <span><p  class="mt-0 select_product_choose">(Choose a category to filter your search)</p></span> 
    </div>
    
    <div class="container-fluid ms-0 row ms-0 mt-4">
      <div class="col-xs-4 col-sm-4 col-md text-align-center product">
       <a href="" class=" text-black">
         <div class="product_img position-absolute"><img src="images/lap.png" alt=""></div>
         <div class="bg-white div_white"></div>
         <h5 class=" position-absolute text-center fiter-product">Smart Gadgets</h5>
       </a>
      </div>
      <div class="col-xs-4 col-sm-4 col-md  product">
       <a href="" class=" text-black">
         <div class="product_img position-absolute"><img src="images/car2.png" alt=""></div>
         <div class="bg-white div_white"></div>
         <h5 class=" position-absolute text-center fiter-product">Vehicles</h5>
       </a>
          
     </div>
      <div class="col-xs-4 col-sm-4 col-md product">
       <a href="" class=" text-black">
         <div class="product_img position-absolute"><img src="images/house2.png" alt=""></div>
         <div class="bg-white div_white"></div>
         <h5 class=" position-absolute fiter-product text-center ">Landed Property</h5>
       </a>
           
      </div>
      <div class="col-xs-4 col-sm-4 col-md product">
       <a href="" class=" text-black">
         <div class="product_img position-absolute"><img src="images/hang2.png" alt=""></div>
         <div class="bg-white div_white"></div>
         <h5 class=" position-absolute text-center fiter-product ">Fashion</h5>
       </a>
          
      </div>
      <div class="col-xs-4 col-sm-4 col-md product ">
       <a href="" class=" text-black">
         <div class="product_img position-absolute"><img src="images/manwithfl.png" alt=""></div>
         <div class="bg-white div_white"></div>
         <h5 class=" position-absolute  text-center fiter-product">Jobs</h5>
       </a>
           
      </div>
      <div class="col-xs-4 col-sm-4 col-md product">
       <a href="" class=" text-black">
         <div class="product_img position-absolute"><img src="images/flower.png" alt=""></div>
         <div class="bg-white div_white"></div>
         <h5 class=" position-absolute text-center fiter-product ">Beauty/Cosmetics</h5>
       </a>
        
      </div>
      <div class="col-xs-4 col-sm-4 col-md  product">
        <a href=""  class=" text-black">
          <div class="product_img position-absolute"><img src="images/basket.png" alt=""></div>
          <div class="bg-white div_white"></div>
          <h5 class=" position-absolute text-center fiter-product ">Supermarkets</h5>
        </a>
       
     </div>
</div>
<!-- {{-- Beginning of the form --}} -->
  
<form class="row g-3 bg-white mt-2 shadow p-3 bg-body rounded justify-space-between mb-6 product-form">
  <div class="col-md-4 ">
   <h6>Add Photo</h6>
   <p class="w-auto " style="font-size: 12px; width:20px;">(Your first selected photo is your product Gig)</p>
   <div class="form-control"  style="width: 90%; height:200px; border:2px dashed gray; text-align: center; padding-top: 50px;">
    <!-- <img src="images/camera.png" alt="" class=""style="" >
      <p class="font_size_form">maximum size picture: <span style="color:#FE3D3D">5mb</span> <br> 
        <span class="font_size_form" style="top:110px">Supported format: <span style="color:#FE3D3D;">Jpg and Png</span></p> -->
            <img src="images/camera.png" alt="" class=""style="" >
      <p class="font_size_form">maximum size picture: <span style="color:#FE3D3D">5mb</span> <br> 
        <span class="font_size_form" style="top:110px">Supported format: <span style="color:#FE3D3D;">Jpg and Png</span></p>
             <!-- <input name="file" type="file" multiple /> -->
        
      </div>
   <!-- <form action="#" class="dropzone mt-4 border-dashed">
    <div class="fallback">
       <input name="file" type="file" multiple />
    </div>
   </form>	 -->

  </div>
  <div class="col-md-4">
   <input type="text" value="" class="mt-5 rounded-2 form-control font_size_form" placeholder="Location*">
   <input type="text" value="Actual Selling Price *    |    Promo Price (optional) " class="mt-4 rounded-2 form-control font_size_form ">
   <input  class="mt-4 rounded-3 form-control font_size_form" type="text" value="" placeholder="How many copies of this product do you have in stock, suitable for wholesales(Optional)">
      <div class="d-flex mt-4">
       <label class=""><b>Product Condition</b><span class=" text-danger">*</span></label>
       <input type="button" value="New" class="rounded-2 w-25 h-25 text-center ms-1 bg-white form-control font_size_form">
       <input type="button" value="Fairly Used" class="rounded-2 w-25 h-25 text-center ms-1 bg-white form-control font_size_form">
      </div>
      <div class="d-flex mt-4 ask">
         <label class="w-75 h-25 "><b>Ask for price</b> <span>(Use "Ask for Price" label for services with variable pricing based on buyer demand.)</span></label>
         <div class="switch">
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
         </div>
      </div>
      <div class="d-flex mt-4 negotiable">
       <label class="w-75 h-25 "><b>Negotiable</b> <span>(this allows potential buyers to negotiate by sending you an offer)</span></label>
       <div class="switch">
        <label class="switch">
          <input type="checkbox">
          <span class="slider round"></span>
        </label>
       </div>
    </div>
  </div>
  <div class="col-md-4 ">
   <input type="text" value="Product tittle* " class="mt-5 rounded-2 form-control font_size_form">
   <input type="text area" value=" Product Description *" class="mt-4 rounded-2 form-control font_size_form " style="width: 90%; height:200px;">
   <div class="d-grid gap-2 col-sm-12 mx-auto">
     <button class="btn upload_product_button mt-4" type="button" style="color: white;">
       <img src="images/baglogo.png" alt="" width="30px" height="30px"> <span class="upload-text">Upload your Product</span>
     </button>
     <p class="upload-terms">By selecting the "Upload Your Product" option, you acknowledge and agree to the Terms of Use,
       commit to following the Safety Tips, and verify that your submission does not contain any Prohibited Items.</p>
   </div>
  </div>
 </form>

 @endsection