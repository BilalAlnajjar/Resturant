<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Dashboard –  English">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="analytics dashboard, bootstrap 4 web app admin template, bootstrap admin panel, bootstrap admin template, bootstrap dashboard, bootstrap panel, Application dashboard design, dashboard design template, dashboard jquery clean html, dashboard template theme, dashboard responsive ui, html admin backend template ui kit, html flat dashboard template, it admin dashboard ui, premium modern html template">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>{{$web ? $web->name : 'Web Title'}}</title>

    <!-- BOOTSTRAP CSS -->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="/assets/css/style.css" rel="stylesheet" />
    <link href="/assets/css/skin-modes.css" rel="stylesheet" />

    <!-- SIDE-MENU CSS -->
    <link href="/assets/plugins/sidemenu/sidemenu.css" rel="stylesheet">

    <!--C3.JS CHARTS CSS -->
    <link href="/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

    <!--MORRIS CSS -->
    <link href="/assets/plugins/morris/morris.css" rel="stylesheet" />

    <!-- CUSTOM SCROLL BAR CSS-->
    <link href="/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <!-- ION-RANGESLIDER CSS -->
    <link href="/assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="/assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css" rel="stylesheet">

    <!--SWEET ALERT CSS-->
    <link href="/assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="/assets/css/icons.css" rel="stylesheet" />
    <link href='/assets/fonts/stylesheet.css' rel='stylesheet' type='text/css'>

    <!-- SIDEBAR CSS -->
    <link href="/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!-- WYSIWYG EDITOR CSS -->
    <link href="/assets/plugins/wysiwyag/richtext.css" rel="stylesheet" />

    <!-- MULTI SELECT CSS -->
    <link rel="stylesheet" href="/assets/plugins/multipleselect/multiple-select.css">

    <!-- FILE UPLODE CSS -->
    <link href="/assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css" />

    <!-- SELECT2 CSS -->
    <link href="/assets/plugins/select2/select2.min.css" rel="stylesheet" />

    <!-- GALLERY CSS -->
    <link href="/assets/plugins/gallery/gallery.css" rel="stylesheet">

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="/assets/colors/color1.css" />

    <script src="sweetalert2.min.js"></script>
    <script src="https://my.forms.app/static/feedback.js" type="text/javascript">  FormsAppFeedbackButton({ formId: "60e35e4e2ca34f5aa4a349b6", buttonText: "Contact Us", buttonTextColor: "#FFFFFF", buttonBackground: "#11c4e0", verticalAlligment: "middle", horizontalAlligment: "left", width: 500,height: 400}); </script>
    <script src="/assets/js/jquery-3.4.1.min.js"></script>

</head>

<body class="app sidebar-mini">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->
    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- Sidebar -->
            <!--APP-SIDEBAR-->
            <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
            <aside class="app-sidebar">
                <div class="side-header">
                    <a class="header-brand1" href="index.php">
                        <img src="/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                        <img src="/assets/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">
                        <img src="/assets/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
                        <img src="/assets/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
                    </a><!-- LOGO -->
                    <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a>
                    <!-- sidebar-toggle-->
                </div>
                <div class="app-sidebar__user">
                    <div class="dropdown user-pro-body text-center">
                        <div class="user-pic">
                            <img src="https://i.imgur.com/ye6m2k3.jpg" alt="user-img" class="avatar-xl rounded-circle">
                        </div>
                        <div class="user-info">
                            <h6 class=" mb-0 text-dark">Admin</h6>
                            <span class="text-muted app-sidebar__user-name text-sm">Company Name</span>
                        </div>
                    </div>
                </div>
                <div class="sidebar-navs">
                    <ul class="nav  nav-pills-circle">
                        {{-- <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Settings">
                            <a class="nav-link text-center m-2" href="generalsettings.php">
                                <i class="fe fe-settings"></i>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Inbox">
                            <a class="nav-link text-center m-2" href="inbox.php">
                                <i class="fe fe-mail"></i>
                            </a>
                        </li> --}}
                        <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
                            <a class="nav-link text-center m-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                <i class="fe fe-power"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        {{-- <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
                            <a class="nav-link text-center m-2">
                                <i class="fe fe-power"></i>
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <ul class="side-menu">
                    <li>
                        <a class="side-menu__item" href="{{route('dashboard')}}"><i class="side-menu__icon ti-home"></i><span
                                class="side-menu__label">Home</span></a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="side-menu__icon mdi mdi-cart"></i><span class="side-menu__label">Orders</span><i
                                class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('orders.index')}}" class="slide-item"> <i
                                        class="side-menu__icon fa fa fa-filter"></i>All </a></li>
                            <li><a href="{{route('order.pending')}}" class="slide-item"> <i
                                        class="side-menu__icon fa fa-hourglass"></i>Pending </a></li>
                            <li><a href="{{route('order.complete')}}" class="slide-item"> <i
                                        class="side-menu__icon fa fa-check"></i>Accepted </a></li>
                            <li><a href="{{route('order.cancel')}}" class="slide-item"> <i
                                        class="side-menu__icon fa fa-remove"></i>Rejected </a></li>
                        </ul>
                    </li>

                    <li>
                        <a class="side-menu__item" href="{{route('customers')}}"><i
                                class="side-menu__icon side-menu__icon mdi mdi-account-multiple"></i><span
                                class="side-menu__label">Customers</span></a>
                    </li>

                    <li>
                        <a class="side-menu__item" href="{{route('emails')}}"><i
                                class="side-menu__icon side-menu__icon fe fe-mail"></i><span
                                class="side-menu__label">Subscribe</span></a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="side-menu__icon fe fe-trending-down"></i><span
                                class="side-menu__label">Offers</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('offer.index')}}" class="slide-item"> <i class="side-menu__icon ion-grid"></i>All
                                    Offers</a></li>
                            <li><a href="{{route('offer.create')}}" class="slide-item"> <i
                                        class="side-menu__icon fe fe-plus"></i>Add Offers</a></li>
                        </ul>
                    </li>


                    <li>
                        <a class="side-menu__item" href="{{route('product.index')}}"><i
                                class="side-menu__icon fa fa-cutlery"></i><span
                                class="side-menu__label">Product</span></a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="side-menu__icon zmdi zmdi-assignment"></i><span
                                class="side-menu__label">Addition</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('addition-category.create')}}" class="slide-item"> <i class="side-menu__icon ion-grid"></i> Addition Category
                                    </a></li>
                            <li><a href="{{route('addition-subcategory.create')}}" class="slide-item"> <i
                                        class="side-menu__icon fe fe-plus"></i>Addition SubCategory</a></li>
                        </ul>
                    </li>
                    {{-- <li>
                        <a class="side-menu__item" href="clients.php"><i class="side-menu__icon fe fe-users"></i><span
                                class="side-menu__label">Clients</span></a>
                    </li> --}}


                    <li>
                        <a class="side-menu__item" href="{{route('place.create')}}"><i
                                class="side-menu__icon mdi mdi-truck"></i><span
                                class="side-menu__label">Delivery</span></a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="side-menu__icon mdi mdi-tune"></i><span class="side-menu__label">Control
                                Site</span><i class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('slid-web.index')}}" class="slide-item"><i
                                        class="side-menu__icon fe fe-align-center"></i>Slider</a></li>
                            <li><a href="{{route('step.index')}}" class="slide-item"><i
                                        class="side-menu__icon fa fa-cubes"></i>Steps</a></li>

                            <li><a href="{{route('element.index')}}" class="slide-item"><i
                                class="side-menu__icon zmdi zmdi-code"></i>Abut</a></li>
                                <li><a href="{{route('element.indexSectionOne')}}" class="slide-item"><i
                                    class="side-menu__icon zmdi zmdi-code"></i>Section 1</a></li>
                                    <li><a href="{{route('element.indexSectionTwo')}}" class="slide-item"><i
                                        class="side-menu__icon zmdi zmdi-code"></i>Section 2</a></li>
                                indexSectionOne
                            {{-- <li><a href="home-global.php" class="slide-item"><i
                                        class="side-menu__icon fa fa-fort-awesome"></i>The best</a></li> --}}
                            <li><a href="{{route('videos.index')}}" class="slide-item"><i
                                        class="side-menu__icon fa fa-play-circle"></i>video</a></li>
                            {{-- <li><a href="pages.php" class="slide-item"><i
                                        class="side-menu__icon fa fa-home"></i>about</a></li> --}}
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="#"><i
                                class="side-menu__icon mdi mdi-wrench"></i><span class="side-menu__label">General</span><i
                                class="angle fa fa-angle-right"></i></a>
                        <ul class="slide-menu">
                            <li><a href="{{route('category.index')}}" class="slide-item"><i
                                        class="side-menu__icon fa fa-th-large"></i>Categories</a></li>
                            <li><a href="{{route('category_status')}}" class="slide-item"><i
                                        class="side-menu__icon fa fa-th-large"></i>Sort Categories</a></li>
                            <li><a href="{{route('firstProduct_status')}}" class="slide-item"><i
                                        class="side-menu__icon fa fa-th-large"></i>Sort products</a></li>
                            {{-- <li><a href="sub_category.php" class="slide-item"><i
                                        class="side-menu__icon fa fa-th-large"></i>Sub Category</a></li> --}}
                            <li><a href="{{route('soical.create')}}" class="slide-item"> <i
                                        class="side-menu__icon fe fe-twitter"></i>Social Media</a></li>
                            <li><a href="{{route('general.create')}}" class="slide-item"><i
                                        class="side-menu__icon fe fe-align-center"></i>General</a></li>

                        </ul>
                    </li>

                    {{-- <li>
                        <a class="side-menu__item" href="{{route('setting-payament.index')}}"><i
                                class="side-menu__icon side-menu__icon fe fe-mail"></i><span
                                class="side-menu__label">Payment Method</span></a>
                    </li> --}}


                    {{-- <li>
                        <a class="side-menu__item" href="{{route('setting-email.index')}}"><i
                                class="side-menu__icon side-menu__icon fe fe-mail"></i><span
                                class="side-menu__label">Setting Emails</span></a>
                    </li> --}}


                    {{-- <li>
                        <a class="side-menu__item" href="users.php"><i
                                class="side-menu__icon side-menu__icon mdi mdi-account-settings-variant"></i><span
                                class="side-menu__label">User</span></a>
                    </li> --}}

                </ul>
            </aside>
            <!--/APP-SIDEBAR-->
            <!-- /Sidebar -->

            <!-- Top Header Mobile -->
            <!-- Mobile Header -->
            <div class="mobile-header">
                <div class="container-fluid">
                    <div class="d-flex">
                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
                        <!-- sidebar-toggle-->
                        <a class="header-brand" href="index.html">
                            <img src="/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                            <img src="/assets/images/brand/logo-3.png"
                                class="header-brand-img desktop-logo mobile-light" alt="logo">
                        </a>
                        <div class="d-flex order-lg-2 ml-auto header-right-icons">
                            <button class="navbar-toggler navresponsive-toggler d-md-none" type="button"
                                data-toggle="collapse" data-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
                            </button>


                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-md-none bg-white">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <div class="d-flex order-lg-2 ml-auto">
                        <div class="dropdown d-sm-flex">
                            <a href="#" class="nav-link icon" data-toggle="dropdown">
                                <i class="fe fe-search"></i>
                            </a>
                            <div class="dropdown-menu header-search dropdown-menu-left">
                                <div class="input-group w-100 p-2">
                                    <input type="text" class="form-control " placeholder="Search....">
                                    <div class="input-group-append ">
                                        <button type="button" class="btn btn-primary ">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- SEARCH -->
                        <div class="dropdown d-md-flex">
                            <a class="nav-link icon full-screen-link nav-link-bg">
                                <i class="fe fe-maximize fullscreen-button"></i>
                            </a>
                        </div><!-- FULL-SCREEN -->
                        <div class="dropdown d-md-flex notifications">
                            <a class="nav-link icon" data-toggle="dropdown">
                                <i class="fe fe-bell"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <div class="notifications-menu">
                                    <a class="dropdown-item d-flex pb-3" href="#">
                                        <div class="fs-16 text-success mr-3">
                                            <i class="fa fa-thumbs-o-up"></i>
                                        </div>
                                        <div class="">
                                            <strong>Someone likes our posts.</strong>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex pb-3" href="#">
                                        <div class="fs-16 text-primary mr-3">
                                            <i class="fa fa-commenting-o"></i>
                                        </div>
                                        <div class="">
                                            <strong>3 New Comments.</strong>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex pb-3" href="#">
                                        <div class="fs-16 text-danger mr-3">
                                            <i class="fa fa-cogs"></i>
                                        </div>
                                        <div class="">
                                            <strong>Server Rebooted</strong>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-center">View all Notification</a>
                            </div>
                        </div><!-- NOTIFICATIONS -->
                        <div class="dropdown d-md-flex message">
                            <a class="nav-link icon text-center" data-toggle="dropdown">
                                <i class="fe fe-mail"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <div class="message-menu">
                                    <a class="dropdown-item d-flex pb-3" href="#">
                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image"
                                            data-image-src="/assets/images/users/1.jpg"></span>
                                        <div>
                                            <strong>Madeleine</strong> Hey! there I' am available....
                                            <div class="small text-muted">
                                                3 hours ago
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex pb-3" href="#">
                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image"
                                            data-image-src="/assets/images/users/12.jpg"></span>
                                        <div>
                                            <strong>Anthony</strong> New product Launching...
                                            <div class="small text-muted">
                                                5 hour ago
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex pb-3" href="#">
                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image"
                                            data-image-src="/assets/images/users/4.jpg"></span>
                                        <div>
                                            <strong>Olivia</strong> New Schedule Realease......
                                            <div class="small text-muted">
                                                45 mintues ago
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item d-flex pb-3" href="#">
                                        <span class="avatar avatar-md brround mr-3 align-self-center cover-image"
                                            data-image-src="/assets/images/users/15.jpg"></span>
                                        <div>
                                            <strong>Sanderson</strong> New Schedule Realease......
                                            <div class="small text-muted">
                                                2 days ago
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item text-center">See all Messages</a>
                            </div>
                        </div><!-- MESSAGE-BOX -->
                    </div>
                </div>
            </div>
            <!-- /Mobile Header -->
            <!-- /Top Header Mobile  -->

            <div class="app-content">

                <div class="side-app">

                    <!-- PAGE-HEADER -->
                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Dashboard</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                        <div class="d-flex  ml-auto header-right-icons header-search-icon">
                            <div class="dropdown d-sm-flex">
                                <a href="#" class="nav-link icon" data-toggle="dropdown">
                                    <i class="fe fe-search"></i>
                                </a>
                                <div class="dropdown-menu header-search dropdown-menu-left">
                                    <div class="input-group w-100 p-2">
                                        <input type="text" class="form-control " placeholder="Search">
                                        <div class="input-group-append ">
                                            <button type="button" class="btn btn-primary ">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- SEARCH -->
                            <div class="dropdown d-md-flex">
                                <a class="nav-link icon full-screen-link nav-link-bg">
                                    <i class="fe fe-maximize fullscreen-button"></i>
                                </a>
                            </div><!-- FULL-SCREEN -->


                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->

                    @yield('content')

                    <!-- Copyright -->
                    <!-- FOOTER -->
                    <footer class="footer">
                        <div class="container">
                            <div class="row align-items-center flex-row-reverse">
                                <div class="col-md-12 col-sm-12 text-center ">
                                    <p class="copy-p">Copyright © 2021 <a href="#">Foxytech</a>. Designed by <a
                                            href="#"> Foxytech.net </a> All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- FOOTER CLOSED -->
                    <!-- /Copyright -->
                </div>
                <!-- Footer -->
                <!-- BACK-TO-TOP -->
                <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

                <!-- JQUERY JS -->
                <script src="/assets/js/jquery-3.4.1.min.js"></script>

                <!-- BOOTSTRAP JS -->
                <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="/assets/plugins/bootstrap/js/popper.min.js"></script>

                <!-- SPARKLINE JS-->
                <script src="/assets/js/jquery.sparkline.min.js"></script>

                <!-- CHART-CIRCLE JS-->
                <script src="/assets/js/circle-progress.min.js"></script>

                <!-- RATING STAR JS-->
                <script src="/assets/plugins/rating/jquery.rating-stars.js"></script>

                <!-- C3 CHART JS -->
                <script src="/assets/plugins/charts-c3/d3.v5.min.js"></script>
                <script src="/assets/plugins/charts-c3/c3-chart.js"></script>

                <!-- INPUT MASK JS-->
                <script src="/assets/plugins/input-mask/jquery.mask.min.js"></script>

                <!-- SIDEBAR JS -->
                <script src="/assets/plugins/sidebar/sidebar.js"></script>

                <!-- SIDE-MENU JS -->
                <script src="/assets/plugins/sidemenu/sidemenu.js"></script>

                <!-- CUSTOM SCROLL BAR JS-->
                <script src="/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

                <!-- CUSTOM JS-->
                <script src="/assets/js/custom.js"></script>

                <!-- DATA TABLE JS-->
                <script src="/assets/plugins/datatable/jquery.dataTables.min.js"></script>
                <script src="/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
                <script src="/assets/plugins/datatable/datatable.js"></script>
                <script src="/assets/plugins/datatable/dataTables.responsive.min.js"></script>

                <!-- FORMEDITOR JS -->
                <script src="/assets/js/summernote.js"></script>
                <script src="/assets/js/formeditor.js"></script>

                <!-- FILE UPLOADES JS -->
                <script src="/assets/plugins/fileuploads/js/fileupload.js"></script>
                <script src="/assets/plugins/fileuploads/js/file-upload.js"></script>

                <!-- SELECT2 JS -->
                <script src="/assets/plugins/select2/select2.full.min.js"></script>

                <!-- BOOTSTRAP-DATERANGEPICKER JS -->
                <script src="/assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
                <script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

                <!-- WYSIWYG Editor JS -->
                <script src="/assets/plugins/wysiwyag/jquery.richtext.js"></script>
                <script src="/assets/plugins/wysiwyag/wysiwyag.js"></script>

                <!-- FORMELEMENTS JS -->
                <script src="/assets/js/form-elements.js"></script>
                <!-- SUMMERNOTE JS -->
                <script src="/assets/plugins/summernote/summernote-bs4.js"></script>

                <!-- MULTI SELECT JS-->
                <script src="/assets/plugins/multipleselect/multiple-select.js"></script>
                <script src="/assets/plugins/multipleselect/multi-select.js"></script>

                <!-- DATEPICKER JS -->
                <script src="/assets/plugins/date-picker/spectrum.js"></script>
                <script src="/assets/plugins/date-picker/jquery-ui.js"></script>
                <script src="/assets/plugins/input-mask/jquery.maskedinput.js"></script>

                <!-- TIMEPICKER JS -->
                <script src="/assets/plugins/time-picker/jquery.timepicker.js"></script>
                <script src="/assets/plugins/time-picker/toggles.min.js"></script>

                <!-- GALLERY JS -->
                <script src="/assets/plugins/gallery/picturefill.js"></script>
                <script src="/assets/plugins/gallery/lightgallery.js"></script>
                <script src="/assets/plugins/gallery/lightgallery-1.js"></script>
                <script src="/assets/plugins/gallery/lg-pager.js"></script>
                <script src="/assets/plugins/gallery/lg-autoplay.js"></script>
                <script src="/assets/plugins/gallery/lg-fullscreen.js"></script>
                <script src="/assets/plugins/gallery/lg-zoom.js"></script>
                <script src="/assets/plugins/gallery/lg-hash.js"></script>
                <script src="/assets/plugins/gallery/lg-share.js"></script>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                @if(session('result') == 'success')
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: "{{session('message')}}",
                    })
                </script>
                @endif

                @if($errors->any())
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>Why do I have this issue?</a>'
                    })
                </script>
                @endif

</body>

</html><!-- /Footer -->
