<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="{{ asset('asset/client/images/favicon.png') }}">
      <title>Welcome to FlatShop</title>
      <link href="{{ asset('asset/client/css/bootstrap.css') }}" rel="stylesheet">
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
      <link href="{{ asset('asset/client/css/font-awesome.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('asset/client/css/flexslider.css') }}" type="text/css" media="screen"/>
      <link href="{{ asset('asset/client/css/sequence-looptheme.css') }}" rel="stylesheet" media="all"/>
      <link href="{{ asset('asset/client/css/style.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('asset/admin/plugins/fontawesome-free/css/all.min.css') }}">
      @vite(['resources/client/css/auth.css'])

      <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script><![endif]-->
   </head>
   <body id="home">
      <div class="wrapper">
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-md-2 col-sm-2">
                     <div class="logo"><a href="index.html"><img src="{{ asset('asset/client/images/logo.png') }}" alt="FlatShop"></a></div>
                  </div>
                  <div class="col-md-10 col-sm-10">
                     <div class="header_top">
                        <div class="row">
                           <div class="col-md-6">
                              <ul class="topmenu">
                                 <li><a href="#">About Us</a></li>
                                 <li><a href="#">News</a></li>
                                 <li><a href="#">Service</a></li>
                                 <li><a href="#">Recruiment</a></li>
                                 <li><a href="#">Media</a></li>
                                 <li><a href="#">Support</a></li>
                              </ul>
                           </div>
                           <div class="col-md-6">
                              @if (Auth::check())
                              <ul class="nav navbar-nav usermenu">
                                 <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown">
                                       <img src="{{ asset('asset/client/images/loginbg.png') }}" alt="">
                                       <span>{{ Auth::user()->name }}</span>
                                    </a>
                                    <div class="dropdown-menu">
                                       <ul class="mega-menu-links">
                                          <li><a href="{{ route('profile.index') }}">Thông tin cá nhân</a></li>
                                          <li><a href="home3.html">Lịch sử mua hàng</a></li>
                                          <li><a href="{{ route('user.logout') }}">Đăng xuất</a></li>
                                       </ul>
                                    </div>
                                 </li>
                              </ul>
                              @else
                              <ul class="usermenu">
                                 <li><a href="{{ route('user.login') }}" class="log">Đăng Nhập</a></li>
                                 <li><a href="{{ route('user.register') }}" class="reg">Đăng Kí</a></li>
                              </ul>
                              @endif
                           </div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="header_bottom">
                        <ul class="option">
                           <li id="search" class="search">
                              <form><input class="search-submit" type="submit" value=""><input class="search-input" placeholder="Enter your search term..." type="text" value="" name="search"></form>
                           </li>
                           <li class="option-cart">
                              <a href="{{ route('cart.index') }}" class="cart-icon">cart <span class="cart_no">02</span></a>
                              <ul class="option-cart-item">
                                 <li>
                                    <div class="cart-item">
                                       <div class="image"><img src="{{ asset('asset/client/images/products/thum/products-01.png') }}" alt=""></div>
                                       <div class="item-description">
                                          <p class="name">Lincoln chair</p>
                                          <p>Size: <span class="light-red">One size</span><br>Quantity: <span class="light-red">01</span></p>
                                       </div>
                                       <div class="right">
                                          <p class="price">$30.00</p>
                                          <a href="#" class="remove"><img src="{{ asset('asset/client/images/remove.png') }}" alt="remove"></a>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="cart-item">
                                       <div class="image"><img src="{{ asset('asset/client/images/products/thum/products-02.png') }}" alt=""></div>
                                       <div class="item-description">
                                          <p class="name">Lincoln chair</p>
                                          <p>Size: <span class="light-red">One size</span><br>Quantity: <span class="light-red">01</span></p>
                                       </div>
                                       <div class="right">
                                          <p class="price">$30.00</p>
                                          <a href="#" class="remove"><img src="{{ asset('asset/client/images/remove.png') }}" alt="remove"></a>
                                       </div>
                                    </div>
                                 </li>
                                 <li><span class="total">Total <strong>$60.00</strong></span><button class="checkout" onClick="location.href='checkout.html'">CheckOut</button></li>
                              </ul>
                           </li>
                        </ul>
                        <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                        <div class="navbar-collapse collapse">
                           <ul class="nav navbar-nav">
                              <li class="active dropdown">
                                 <a href="{{ route('user.home') }}">Trang Chủ</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @yield('content-client')
         <div class="clearfix"></div>
         <div class="footer">
            <div class="footer-info">
               <div class="container">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="footer-logo"><a href="#"><img src="{{ asset('asset/client/images/logo.png') }}" alt=""></a></div>
                     </div>
                     <div class="col-md-3 col-sm-6">
                        <h4 class="title">Contact <strong>Info</strong></h4>
                        <p>No. 08, Nguyen Trai, Hanoi , Vietnam</p>
                        <p>Call Us : (084) 1900 1008</p>
                        <p>Email : michael@leebros.us</p>
                     </div>
                     <div class="col-md-3 col-sm-6">
                        <h4 class="title">Customer<strong> Support</strong></h4>
                        <ul class="support">
                           <li><a href="#">FAQ</a></li>
                           <li><a href="#">Payment Option</a></li>
                           <li><a href="#">Booking Tips</a></li>
                           <li><a href="#">Infomation</a></li>
                        </ul>
                     </div>
                     <div class="col-md-3">
                        <h4 class="title">Get Our <strong>Newsletter </strong></h4>
                        <p>Lorem ipsum dolor ipsum dolor.</p>
                        <form class="newsletter">
							<input type="text" name="" placeholder="Type your email....">
							<input type="submit" value="SignUp" class="button">
						</form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright-info">
               <div class="container">
                  <div class="row">
                     <div class="col-md-6">
                        <p>Copyright © 2012. Designed by <a href="#">Michael Lee</a>. All rights reseved</p>
                     </div>
                     <div class="col-md-6">
                        <ul class="social-icon">
                           <li><a href="#" class="linkedin"></a></li>
                           <li><a href="#" class="google-plus"></a></li>
                           <li><a href="#" class="twitter"></a></li>
                           <li><a href="#" class="facebook"></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @if (Session::has('success'))
        <span id="toast__js" message="{{ session('success') }}" type="success"></span>
      @elseif (Session::has('error'))
         <span id="toast__js" message="{{ session('error') }}" type="error"></span>
      @endif
      <!-- Bootstrap core JavaScript==================================================-->
      <script src="{{ asset('asset/admin/plugins/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('asset/admin/plugins/jquery-validation/jquery.validate.js') }}"></script>
      <script type="text/javascript" src="{{ asset('asset/client/js/jquery-1.10.2.min.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/jquery.easing.1.3.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/bootstrap.min.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/jquery.sequence-min.js') }}"></script>
	  <script type="text/javascript" src="{{ asset('asset/client/js/jquery.carouFredSel-6.2.1-packed.js') }}"></script>
     <script type="text/javascript" src="{{ asset('asset/client/js/script.min.js') }}" ></script>
	  <script defer src="{{ asset('asset/client/js/jquery.flexslider.js') }}"></script>
     @vite(['resources/admin/js/toast-message.js'])
   </body>
</html>
