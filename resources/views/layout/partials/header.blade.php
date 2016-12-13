<!--header-->
<div class="header">
    <div class="top-header navbar navbar-default"><!--header-one-->
        <div class="container">
            <div class="nav navbar-nav wow fadeInLeft animated" data-wow-delay=".5s">
                @if (Auth::guest())
                    <p>Welcome to Modern Shoppe 
                    <a href="#" data-toggle="modal" data-target="#register-modal">Register </a> Or <a href="#" data-toggle="modal" data-target="#login-modal">Sign In </a>
                @else
                    <p>Hello
                    <a href="javascript:,">{{ Auth::user()->name }}</a> | 
                    @if(Auth::user()->role_id == 1)
                        <a href="{{url('/admin')}}">Manage</a> |
                    @else
                        <a href="{{route('profile')}}">Profile</a> |
                    @endif
                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
                </p>
            </div>
            <div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated" data-wow-delay=".5s">
                <ul>
                    <li><a href="#"> </a></li>
                    <li><a href="#" class="pin"> </a></li>
                    <li><a href="#" class="in"> </a></li>
                    <li><a href="#" class="be"> </a></li>
                    <li><a href="#" class="you"> </a></li>
                    <li><a href="#" class="vimeo"> </a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="header-two navbar navbar-default"><!--header-two-->
        <div class="container">
            <div class="nav navbar-nav header-two-left">
                <ul>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 892</li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">mail@example.com</a></li>          
                </ul>
            </div>
            <div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
                <h1><a href="{{route('home')}}">Modern <b>Shoppe</b><span class="tag">Everything for world </span> </a></h1>
            </div>
            <div class="nav navbar-nav navbar-right header-two-right">
                <div class="header-right my-account">
                    <a href="{{route('contact')}}"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> CONTACT US</a>                       
                </div>
                <div class="header-right cart">
                    <a href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
                    <h4>
                        @if (Auth::guest())
                        <a href="javascript:;">
                        @else
                        <a href="{{route('cart.show')}}">
                        @endif
                                <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>) 
                        </a>
                    </h4>
                    <div class="cart-box">
                        <p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="top-nav navbar navbar-default"><!--header-three-->
        <div class="container">
            <nav class="navbar" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!--navbar-header-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav top-nav-info">
                        <li><a href="{{route('home')}}" class="active">Home</a></li>
                        @foreach($categories as $category)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$category->name}}<b class="caret"></b></a>
                                @if($category->sub_categories)
                                <ul class="dropdown-menu">
                                    @foreach($category->sub_categories as $sub)
                                        <li><a href="/category/{{$category->slug}}/{{$sub->slug}}">{{$sub->name}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
    
                        @endforeach
<!--                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Baby<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column multi-column1">
                                <div class="row">
                                    <div class="col-sm-4 menu-grids menulist1">
                                        <h4>Bath & Care</h4>
                                        <ul class="multi-column-dropdown ">
                                            <li><a class="list" href="#">Diapering</a></li>
                                            <li><a class="list" href="#">Baby Wipes</a></li>
                                            <li><a class="list" href="#">Baby Soaps</a></li>
                                            <li><a class="list" href="#">Lotions & Oils </a></li>
                                            <li><a class="list" href="#">Powders</a></li>
                                            <li><a class="list" href="#">Shampoos</a></li>
                                        </ul>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="#">Body Wash</a></li>
                                            <li><a class="list" href="#">Cloth Diapers</a></li>
                                            <li><a class="list" href="#">Baby Nappies</a></li>
                                            <li><a class="list" href="#">Medical Care</a></li>
                                            <li><a class="list" href="#">Grooming</a></li>
                                            <li><h6><a class="list" href="#">Combo Packs</a></h6></li>
                                        </ul>
                                    </div>                                                                      
                                    <div class="col-sm-2 menu-grids">
                                        <h4>Baby Clothes</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="#">Onesies & Rompers</a></li>
                                            <li><a class="list" href="#">Frocks</a></li>
                                            <li><a class="list" href="#">Socks & Tights</a></li>
                                            <li><a class="list" href="#">Sweaters & Caps</a></li>
                                            <li><a class="list" href="#">Night Wear</a></li>
                                            <li><a class="list" href="#">Quilts & Wraps</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 menu-grids">
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="#">Blankets</a></li>
                                            <li><a class="list" href="#">Gloves & Mittens</a></li>
                                            <h4>Shop by Age</h4>
                                            <li><a class="list" href="#">New Born (0 - 5 M)</a></li>
                                            <li><a class="list" href="#">5 - 10 Months</a></li>
                                            <li><a class="list" href="#">10 - 15 Months</a></li>
                                            <li><a class="list" href="#">15 Months Above</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 menu-grids">
                                        <ul class="multi-column-dropdown">
                                            <li><h6><a class="list" href="#">Feeding & Nursing</a></h6></li>
                                            <h4>Baby Gear</h4>
                                            <li><a class="list" href="#">Baby Walkers</a></li>
                                            <li><a class="list" href="#">Strollers</a></li>
                                            <li><a class="list" href="#">Prams & Toys</a></li>
                                            <li><a class="list" href="#">Cribs & Cradles</a></li>
                                            <li><a class="list" href="#">Booster Seats</a></li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </ul>
                        </li>
                        <li class="dropdown grid">
                            <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Kids<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column multi-column2">
                                <div class="row">
                                    <div class="col-sm-3 menu-grids">
                                        <h4>New Arrivals</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="#">Topwear</a></li>
                                            <li><a class="list" href="#">Bottomwear</a></li>
                                            <li><a class="list" href="#">Innerwear</a></li>
                                            <li><a class="list" href="#">Nightwear</a></li>
                                            <li><a class="list" href="#">Swimwear</a></li>
                                            <li><a class="list" href="#">Jumpers</a></li>
                                        </ul>
                                    </div>                                                                      
                                    <div class="col-sm-3 menu-grids">
                                        <h4>Boys</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="#">Jeans</a></li>
                                            <li><a class="list" href="#">Shirts</a></li>
                                            <li><a class="list" href="#">T-shirts</a></li>
                                            <li><a class="list" href="#">Dhoti Kurta Sets</a></li>
                                            <li><a class="list" href="#">Winter wear</a></li>
                                            <li><a class="list" href="#">Party Wear</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 menu-grids">
                                        <h4>Girls</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="#">Tops</a></li>
                                            <li><a class="list" href="#">Leggings</a></li>
                                            <li><a class="list" href="#">Dresses </a></li>
                                            <li><a class="list" href="#">Skirts</a></li>
                                            <li><a class="list" href="#">Casual Dresses</a></li>
                                            <li><a class="list" href="#">Capris & 3/4ths</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3 menu-grids new-add2">
                                        <a href="#">
                                            <h6>Kids Special</h6>
                                            <img src="{{asset('images/img1.jpg')}}" alt="">
                                        </a>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </ul>
                        </li>
                        <li class="dropdown grid">
                            <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Accessories<b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column menu-two multi-column3">
                                <div class="row">
                                    <div class="col-sm-4 menu-grids">
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="#">Jewellery</a></li>
                                            <li><a class="list" href="#">Hair bands & Clips</a></li>
                                            <li><a class="list" href="#">Bangles </a></li>
                                            <li><a class="list" href="#">Caps & Belts</a></li>
                                            <li><a class="list" href="#">Rain wear</a></li>
                                            <li><a class="list" href="#">Bags</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-8 menu-grids">
                                        <a href="#">
                                            <div class="new-add">
                                                <h5>30% OFF <br> Today Only</h5>
                                            </div>  
                                        </a>
                                    </div>  
                                    <div class="clearfix"> </div>
                                </div>  
                            </ul>
                        </li>               
                        <li class="dropdown grid">
                            <a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Toys <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column multi-column4">
                                <div class="row">
                                    <div class="col-sm-4 menu-grids menulist1">
                                        <h4>BABY</h4>
                                        <ul class="multi-column-dropdown ">
                                            <li><a class="list" href="#">Rockers</a></li>
                                            <li><a class="list" href="#">Rattles</a></li>
                                            <li><a class="list" href="#">Stroller Toys</a></li>
                                            <li><a class="list" href="#">Musical Toys </a></li>
                                            <li><a class="list" href="#">Doll Houses</a></li>
                                            <li><a class="list" href="#">Play Sets</a></li>
                                        </ul>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="#">Toys Dolls</a></li>
                                            <li><a class="list" href="#">Pacifiers</a></li>
                                            <li><a class="list" href="#">Building Sets</a></li>
                                            <li><a class="list" href="#">Bath Toys</a></li>
                                            <li><a class="list" href="#">Soft Toys</a></li>
                                            <li><h6><a class="list" href="#">Special Off</a></h6></li>
                                        </ul>
                                    </div>                                                                      
                                    <div class="col-sm-2 menu-grids">
                                        <h4>Pretend Play</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><h6><a class="list" href="#">Video Games</a></h6></li>
                                            <li><a class="list" href="#">Kitchen Sets</a></li>
                                            <li><a class="list" href="#">Sand Toys</a></li>
                                            <li><a class="list" href="#">Tool Sets</a></li>
                                            <li><a class="list" href="#">Bath Toys</a></li>
                                            <li><a class="list" href="#">Medical Set</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2 menu-grids">
                                        <h4>Outdoor</h4>
                                        <ul class="multi-column-dropdown">
                                            <li><a class="list" href="#">Swimming</a></li>
                                            <li><a class="list" href="#">Rideons </a></li>
                                            <li><a class="list" href="#">Scooters</a></li>
                                            <li><a class="list" href="#">Remote Control</a></li>
                                            <li><a class="list" href="#">Animals</a></li>
                                            <li><a class="list" href="#">Make up</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 menu-grids">
                                        <a href="#">
                                            <div class="new-add">
                                                <h5>30% OFF <br> Today Only</h5>
                                            </div>
                                        </a>    
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </ul>
                        </li> -->
                        <li><a href="#">Special Offers</a></li>
                    </ul> 
                    <div class="clearfix"> </div>
                    <!--//navbar-collapse-->
                    <header class="cd-main-header">
                        <ul class="cd-header-buttons">
                            <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                        </ul> <!-- cd-header-buttons -->
                    </header>
                </div>
                <!--//navbar-header-->
            </nav>
            <div id="cd-search" class="cd-search">
                <form>
                    <input type="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </div>
</div>
<!--//header-->