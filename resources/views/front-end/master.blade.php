<!DOCTYPE html>
<html>

<head>
    <base href="{{asset('/front-end')}}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="zalo-chat-widget" data-oaid="579745863508352884" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <div class="">
    </div>
    <!-- header -->
    <header id="header ">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark primary-color bg-primary shadow-none fixed-top ">
            <div class="container">
                <!-- Navbar brand -->
            <a class="navbar-brand" href="/">
                    <h1>Trang chủ</h1>
                </a>
                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">
                    <!-- Links -->
                    <ul class="navbar-nav mr-auto text-center align-items-center">


                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('/gio-hang-cua-ban')}}" style="display: grid">
                                <div>
                                    <i style="font-size: 24px" class="fa fa-cart-plus" aria-hidden="true"></i>
                                </div>
                                 Giỏ Hàng</a>
                        </li>
                    </ul>
                    <!-- Links -->
                    <form class="form-inline" method="GET" action="{{asset('/search')}}">
                        <div class="md-form my-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Tìm Kiếm" name="result" aria-label="Search">
                        </div>
                        <button class="btn btn-outline-white btn-sm my-0" type="submit">Tìm Kiếm</button>
                    </form>
                </div>
                <!-- Collapsible content -->
            </div>
        </nav>
        <!--/.Navbar-->

    </header>
    <!-- /header -->
    <!-- endheader -->

    <!-- main -->
    <section id="body">
        <div class="container">
            <div class="row" style="margin-top: 100px;">


                <div id="main" class="col-md-12">
                    <!-- main -->
                    <!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
                    <div id="slider">
                        <div id="demo" class="carousel slide" data-ride="carousel">

                            <!-- Indicators -->
                            <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                            </ul>



                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>

                    <!-- wrap -->
                    @yield('main')
                    <!-- end main -->
                </div>
            </div>
        </div>
    </section>
    <!-- endmain -->

    <!-- footer -->
    <!-- Footer -->
    <footer class="page-footer font-small bg-primary pt-4">

        <!-- Footer Text -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row pb-3">

                <!-- Grid column -->
                <div class="col-md-4 mt-md-0 mt-3">
                    <!-- Content -->
                    <h5 class=" font-weight-normal pb-3">Giới Thiệu</h5>
                    <div>
                        <p class="pb-2">Địa chỉ : Số 3 Cầu Giấy - Phường Láng Thượng - Quận Đống Đa - Hà Nội</p>
                        <p>Hotline : 0984368263</p>
                    </div>
                    <div>

                    </div>
                </div>
                <!-- Grid column -->

                <div class="col-md-4 mt-md-0 mt-3">
                        <h5 class=" font-weight-normal pb-3">Hỗ Trợ Thanh Toán</h5>
                        <div>
                            <img style="max-width: 340px;" src="/front-end/img/home/a-icon-payment.method.png" alt="pay">
                        </div>
                </div>

                <!-- Grid column -->
                <div class="col-md-4 mb-md-0 mb-3">

                    <!-- Content -->
                    <h5 class="font-weight-normal pb-3">Kết Nối Với Chúng Tôi</h5>
                    <div class="d-flex pb-2">
                        <p><i class="fa fa-facebook-official pr-2" aria-hidden="true"></i>
                                    </i>Facebook :&nbsp;</p>
                        <a href="https://www.facebook.com/">https://www.facebook.com/</a>
                    </div>
                    <div class="d-flex pb-2">
                        <p><i class="fa fa-instagram pr-2" aria-hidden="true"></i>Instagram :&nbsp;</p>
                        <a href="https://www.instagram.com/">https://www.instagram.com/</a>
                    </div>
                    <div class="d-flex pb-2">
                        <p><i class="fa fa-envelope pr-2" aria-hidden="true"></i>Gmail : &nbsp;</p>
                        <a href="https://www.google.com/intl/vi/gmail/about/">https://www.google.com/intl/vi/gmail/about/</a>
                    </div>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Text -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
           My Team</a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script type="text/javascript" src="{{ URL::to('front-end/js/bootstrap.min.js') }}"></script>
    @stack('scripts')
    <script type="text/javascript" src="{{ URL::to('front-end/jsWebsite/master.js') }}"></script>
</body>

</html>
