<div class="side-bar">
    <div class="sidebar-link">
        <div class="links  {{ Request::is('shop*') ? 'active-link clicked': '' }}">
            <span>
                <a href="{{ url('/shop') }}"> <img class="profile-logo svg-size" src="{{ asset('kaz/images/profile.svg') }}"
                 alt=""><span class="profile-text">Shop</span></a>
                
            </span>
        </div>
    </div>
    <div class="sidebar-link">
        <div class="links  {{ Request::is('settings*') ? 'active-link clicked' : '' }}">
            <span>
                <a href="{{ url('/settings') }}"><img class="profile-logo svg-size" src="{{ asset('kaz/images/product.svg') }}"
                        alt=""><span class="profile-text">Settings</span></a>
                
            </span>
        </div>
    </div>
    <div class="sidebar-link">
        <div class="links {{ Request::is('learn*') ? 'active-link clicked': '' }}">
            <span>
                <a href="{{ url('/learn') }}"><img class="profile-logo svg-size" src="{{ asset('kaz/images/learn.svg') }}"
                        alt=""><span class="profile-text">Learn</span></a>
                
            </span>
        </div>
    </div>
    <div class="sidebar-link">
        <div class="links {{ Request::is('ads*') ? 'active-link clicked' : '' }}">
            <span>
                <a href="{{ url('/ads') }}"><img class="profile-logo" height="20px" width="17px"
                        src="{{ asset('kaz/images/ads.svg') }}" alt="">    <span class="profile-text">Ads</span></a>
                
            </span>
        </div>
    </div>
    <div class="sidebar-link">
        <div class="links {{ Request::is('wallet*') ? 'active-link clicked' : '' }}">
            <span>
                <a href="{{ url('/wallet') }}"> <img class="profile-logo" height="20px" width="17px"
                        src="{{ asset('kaz/images/wallet.svg') }}" alt=""> <span class="profile-text">Wallet</span></a>
                
            </span>
        </div>
    </div>
    <div class="sidebar-link">
        <div class="links {{ Request::is('review*') ? 'active-link clicked' : '' }}">
            <span>
                <a class="review-page" href="{{ url('/review') }}"> <img class="profile-logo" height="20px" width="17px"
                        src="{{ asset('kaz/images/rating.svg') }}" alt=""> <span class="profile-text">Reviews</span></a>
                
            </span>
        </div>
    </div>
    <hr style="color: black;">
    <div class="sidebar-link">
        <div class="links {{ Request::is('privacy*') ? 'active-link clicked' : '' }}">
            <span>
                <a href="{{ url('/privacy') }}"><img class="profile-logo svg-size" src="{{ asset('kaz/images/privacy policy.svg') }}"
                        alt=""><span class="profile-text">Privacy Policy</span></a>
               
            </span>
        </div>
    </div>
    <div class="sidebar-link">
        <div class="links {{ Request::is('refer*') ? 'active-link clicked': '' }}">
            <span>
                <a href="{{ url('/refer') }}"> <img class="profile-logo svg-size" src="{{ asset('kaz/images/refer friends.svg') }}"
                        alt=""><span class="profile-text">Refer Friends</span></a>
               
            </span>
        </div>
    </div>
    <div class="sidebar-link">  
        <div class="links delete {{ Request::is('delete*') ? 'active-link clicked' : '' }}">
            <span>
                <a class="delete" href="{{ url('/delete') }}"><img class="profile-logo svg-size1" src="{{ asset('kaz/images/delete.svg') }}"
                        alt=""> <span class="profile-text">Delete Account</span></a>
            </span>
        </div>
    </div>
    <div class="sidebar-link  sidebar-log-out">  
        <div class="links">
            <span>
                <a class="delete" href=""><img class="profile-logo svg-size1" src="{{ asset('kaz/images/delete.svg') }}"
                        alt=""> <span class="profile-text text-danger">Log Out</span></a>
            </span>
        </div>
    </div>
    <div class="sidebar-link">
        <div class="row mt-5 footer">
            <div style="text-align: center;" class="col">
                <a  href="https://web.facebook.com/loopmart/" ><img height="35px" width="35px" src="{{ asset('kaz/images/facebook.png') }}" alt=""></a>
                <img height="30px" width="30px" src="{{ asset('kaz/images/twitter.png') }}" alt="">
               <a href="https://wa.link/ymloc0"><img height="29px" width="29px" src="{{ asset('kaz/images/whatsapp.png') }}" alt=""></a>
               <a href="mailto:info@gmail.com.ng"><img height="30px" width="30px" src="{{ asset('kaz/images/message.png') }}" alt=""></a> 
                
            </div>
        </div>
    </div>
</div>

