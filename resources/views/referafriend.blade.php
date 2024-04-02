@extends('layouts.others.app')
@section('title','Privacy Policy')

@section('content')

<div class="col-md-8 " style="padding: 10px; font-size: small;">
    <h4>Use the link below to refer a friend</h4>  
    <p style="font-size: 15px;">Buyandsell marketplace is a user-friendly platform that makes buying and selling<br>
      goods and services easy. Your friend should be able to navigate the website and<br>
       start using it with ease.</p>

       <div class="col-sm-8 rectangle" >


         <form class="d-flex ms-auto search" style="padding-top: 30px;" role="search">
           <input class="form-control  border-2 form_search border-warning" style="width: 550px;" type="search" placeholder=" www.buyandsell.com/join/bas-mrk-pla" aria-label="Search">
           <div class='input-group-append' style="margin-left: -110px; margin-top: 7px; ">
          
           <button class="btn btn-outline-warning text-black yellow_background btn-sm" type="submit">Copy</button>
         </div>
          </form>   
           </div>     
           <div class="col text-center mt-6 p-6 ">
            <a href=""> <img src="images/facebook.png" alt="" class="text-center p-3"></a>
            <a href=""><img src="images/twitter.png" alt="" class="text-center p-4"></a>
            <a href=""><img src="images/google.png" alt="" class="text-center p4"></a>
            <a href=""><img src="images/maill.png" alt="" class="text-center p-4"></a>
 </div>
  </div>
</div>
</div>
</div>
@endsection