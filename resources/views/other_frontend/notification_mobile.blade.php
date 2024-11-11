<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/notification_mobile.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/icons/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('innocent/assets/css/preloader.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <style>
    </style>
</head>

<body>

    <div class="preloader">
        <img src="{{ asset('innocent/assets/image/Shopping bag.png') }}" alt="Loading icon" class="bag-icon" />
        <div class="dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

    <div class="notification_main">
        <!-- Navbar and Search Button -->
        <div class=" notification_navbar fixed-top">
            <p style="display: flex;">
                <a href="{{ url('/') }}"> <i class="fa-solid fa-angle-left  back_to_index"></i></a>
                <span class="notification_heading">notifications</span>
            </p>

            <img src="{{asset('innocent/assets/image/transparent_logo.png')}}" alt="" class="notification_buy_and_sell_logo">
        </div>

        <div class="notifications_region">
            <div class="notifications_layout">

            </div>

            {{-- <a href="{{ url('/rating') }}">
                <div class="notification">
                    <div class="notification_details">
                        <div class="notification_image"><img src="innocent/assets/image/logo icon.svg"
                                alt="Profile Picture">
                        </div>
                        <div class="message_area">
                            <p class="message"><strong>congratulations </strong> <br>it is a perfect time to tell the
                                world about it.</p>
                            <p class="time">2 hours ago</p>

                        </div>
                        <img src="innocent/assets/image/laptop2.jpg" alt="Picture" class="notification_product_image">

                    </div>

                </div>
            </a>


            <a href="{{ url('/rating') }}">
                <div class="notification">
                    <div class="notification_details">
                        <img src="innocent/assets/image/dp.png" alt="Profile Picture" class="notification_image">
                        <div class="message_area">
                            <p class="message"><strong>suggested for you </strong> <br>enjoy 1000 points to boost your
                                product to reach more audience.</p>
                            <p class="time">5 hours ago</p>

                        </div>
                        <img src="innocent/assets/image/laptop.jpg" alt="Picture" class="notification_product_image">

                    </div>

                </div>
            </a>


            <a href="{{ url('/rating') }}">
                <div class="notification">
                    <div class="notification_details">
                        <img src="innocent/assets/image/bike.png" alt="Profile Picture" class="notification_image">
                        <div class="message_area">
                            <p class="message"><strong>jane connected with you </strong> <br>tell us tell us your
                                experience with the producttell us your experience with the product.your experience with
                                the product.</p>
                            <p class="time">just now</p>

                        </div>
                        <img src="innocent/assets/image/laptop2.jpg" alt="Picture" class="notification_product_image">

                    </div>

                </div>
            </a>


            <a href="{{ url('/rating') }}">
                <div class="notification">
                    <div class="notification_details">
                        <img src="innocent/assets/image/bike.png" alt="Profile Picture" class="notification_image">
                        <div class="message_area">
                            <p class="message"><strong>congratulations </strong> <br>tell us your experience with the
                                product.</p>
                            <p class="time">2 min. ago</p>

                        </div>
                        <img src="innocent/assets/image/laptop.jpg" alt="Picture" class="notification_product_image">

                    </div>

                </div>
            </a>



            <a href="{{ url('/rating') }}">
                <div class="notification">
                    <div class="notification_details">
                        <img src="innocent/assets/image/dp.png" alt="Profile Picture" class="notification_image">
                        <div class="message_area">
                            <p class="message"><strong>james your experience matters </strong> <br>Your experience
                                matters to us share your experience about this product</p>
                            <p class="time">3 hours ago</p>

                        </div>
                        <img src="innocent/assets/image/laptop.jpg" alt="Picture" class="notification_product_image">

                    </div>

                </div>
            </a>

            <a href="{{ url('/rating') }}">
                <div class="notification">
                    <div class="notification_details">
                        <img src="innocent/assets/image/bike.png" alt="Profile Picture" class="notification_image">
                        <div class="message_area">
                            <p class="message"><strong>congratulations </strong> <br>tell tell us your experience with
                                the producttell us your experience with the product.s your experience with the
                                producttell us your experience with the product.</p>
                            <p class="time">2 hours ago</p>

                        </div>
                        <img src="innocent/assets/image/laptop.jpg" alt="Picture" class="notification_product_image">

                    </div>
                </div>
            </a>
            <a href="{{ url('/rating') }}">
                <div class="notification">
                    <div class="notification_details">
                        <img src="innocent/assets/image/dp.png" alt="Profile Picture" class="notification_image">
                        <div class="message_area">
                            <p class="message"><strong>congrats on your new listing </strong> <br>it is a perfect time
                                to tell the world about it.</p>
                            <p class="time">2 hours ago</p>

                        </div>
                        <img src="innocent/assets/image/Picture of product (USB).png" alt="Picture"
                            class="notification_product_image">

                    </div>
                </div>
            </a> --}}
            <div class="d-flex ">
                <i id="volumeHighIcon" class="fa-solid fa-volume-high notification_volume"
                    onclick="turnOnNotifications()"></i>
                <i id="volumeMuteIcon" class="fa-solid fa-volume-mute notification_volume" style="display: none;"
                    onclick="turnOffNotifications()"></i>
                <audio id="notificationSound">
                    <source src="{{ asset('/innocent/assets/notification_sound/mixkit-bell-notification-933.wav') }}" type="audio/mpeg">
                </audio>
                <p class="mt-2">Notification sound</p>
            </div>

        </div>

    </div>

    <script src="{{ asset('innocent/assets/js/notification.js') }}"></script>
    <script type="module" src="{{ asset('backend-js/mobile-notification.js') }}"></script>
    <script type="module"  src="{{ asset('backend-js/notification.js') }}"></script>
    <script src="{{ asset('innocent/assets/js/preloader.js') }}"></script> 

</body>

</html>
