
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  
    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
    
   
    <style>
        #sideheader li {
            color: #5ba4cf;
        }
        #sideheader a {
            color: #fff;
        }
        #sideheader a:hover, #sideheader a#active {
            background-color: #5ba4cf;
        }
        #addbutton {
            background-color: #192841;
            color: #fff;
            border: 1px solid #192841;
            border-radius: 20px;
            padding: 8px;
        }
        #addbutton:hover {
            background-color: #5ba4cf;
            border: 1px solid #5ba4cf;
        }
        #submitbtn {
            background-color: #192841;
            color: #fff;
            border: 1px solid #192841;
            border-radius: 5px;
            padding: 10px 30px 10px 30px;
            font-size: 17px;
            margin-left: 80%;
        }
        #submitbtn:hover {
            background-color: #5ba4cf;
            border: 1px solid #5ba4cf;
        }
        #titles {
            color: #192841;
            font-weight: bold;
        }
        form label {
            color: #192841;
            font-weight: bold;
        }


    </style>
</head>
<body>
    <div class="app-container body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow" style="background-color: #192841">
            <div class="app-header__logo">
                <div class="logo">
                    <img class="ml-5" src="{{ asset('images/1.png') }}" width="60" height="60"></img>
                </div>
                
                <!-- <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span> 
                            </span>
                        </button>
                    </div>
                </div> -->
            </div>

            <!-- hamburger for mobile -->
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span> 
                        </span>
                    </button>
                </div>
            </div>

            <!-- ellipse for mobile -->
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    
            <div class="app-header__content">
                <div class="app-header-left">
                    <!-- <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div> -->
                   
                
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/1.png" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8" style="color: #fff"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <!-- <button type="button" tabindex="0" class="dropdown-item">User Account</button> -->

                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading" style="color: #fff">
                                    {{ Auth::user()->name }}
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>         
                </div>
            </div>
        </div>    

        <div class="app-main">
                <div class="app-sidebar sidebar-shadow" style="background-color: #192841">
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu" id="sideheader">
                                <li class="app-sidebar__heading">Dashboard</li>
                                <li>
                                    <a href="{{ url('/dashboard') }}" class="mm-active" id="active">
                                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                                        Dashboard 
                                    </a>
                                </li>

                                <li class="app-sidebar__heading">Manage People</li>
                                <li>
                                    <a href="{{ url('/supplier') }}">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                        All Suppliers
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/customer') }}">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        All Customers
                                    </a>
                                </li>

                                <li class="app-sidebar__heading">Manage Product</li>
                                <li>
                                    <a href="{{ url('/category') }}">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                        All Category
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/unit') }}">
                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                        All Units
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/product') }}">
                                        <i class="fa fa-cubes" aria-hidden="true"></i>
                                        All Products
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/product/show') }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                        View Products
                                    </a>
                                </li>
                                
                                <li class="app-sidebar__heading">Manage Purchase</li>
                                <li>
                                    <a href="{{ url('/purchase') }}">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        All Purchase
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/purchase/show') }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                        View Purchases
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/purchasereport') }}">
                                    <i class="fa fa-tasks" aria-hidden="true"></i>
                                        Purchase Report
                                    </a>
                                </li>

                                <li class="app-sidebar__heading">Manage Sales</li>
                                <li>
                                    <a href="{{ url('/sales') }}">
                                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                        All Sales
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/sales/show') }}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                        View Sales
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/salesreport') }}">
                                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                                        Sales Report
                                    </a>
                                </li>

                                <li class="app-sidebar__heading">Manage Stock</li>
                                <li>
                                    <a href="{{ url('/stock/stockreport') }}">
                                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                                        Stock Report
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>  

       
                <div class="app-main__outer" style="background-color: #e6f2f8;">
                    <div class="app-main__inner">
                    @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                @if(session()->exists('message'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{session('message')}}</li>
                        </ul>
                    </div>
                @endif
                    @yield('content')
                    </div>
                </div>
                
                <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
       
    </div>
<script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>


</body>
</html>
