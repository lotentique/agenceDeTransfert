 <!DOCTYPE html>
 <html>

 <!-- Mirrored from hubancreative.com/projects/templates/coco/classy/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Jun 2018 05:24:15 GMT -->

 <head>
   <meta charset="UTF-8">
   <title>RIMTrans | Agent interface</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <meta name="apple-mobile-web-app-capable" content="yes" />
   <meta name="description" content="">
   <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
   <meta name="author" content="Huban Creative">

   <!-- Base Css Files -->
   <link href="{{ asset('assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css ') }}" rel="stylesheet" />
   <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/libs/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/libs/fontello/css/fontello.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/libs/animate-css/animate.min.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/libs/nifty-modal/css/component.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/libs/ios7-switch/ios7-switch.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/libs/pace/pace.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/libs/sortable/sortable-theme-bootstrap.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/libs/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet" />
   <link href="{{ asset('assets/libs/jquery-icheck/skins/all.css') }}" rel="stylesheet" />
   <!-- Code Highlighter for Demo -->
   <link href="{{ asset('assets/libs/prettify/github.css') }}" rel="stylesheet" />

   <!-- Extra CSS Libraries Start -->
   <link href="{{ asset('assets/libs/rickshaw/rickshaw.min.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/libs/morrischart/morris.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/libs/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/libs/jquery-clock/clock.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/libs/bootstrap-calendar/css/bic_calendar.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/libs/sortable/sortable-theme-bootstrap.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/libs/jquery-weather/simpleweather.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/libs/bootstrap-xeditable/css/bootstrap-editable.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
   <!-- Extra CSS Libraries End -->
   <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet" />

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

   <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
   <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png') }}" />
   <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/apple-touch-icon-57x57.png') }}" />
   <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/apple-touch-icon-72x72.png') }}" />
   <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-touch-icon-76x76.png') }}" />
   <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/apple-touch-icon-114x114.png') }}" />
   <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/apple-touch-icon-120x120.png') }}" />
   <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/apple-touch-icon-144x144.png') }}" />
   <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/apple-touch-icon-152x152.png') }}" />
 </head>

 <body class="fixed-left">

   <!-- Modal Logout -->
   <div class="md-modal md-just-me" id="logout-modal">
     <div class="md-content">
       <h3><strong>Logout</strong> Confirmation</h3>
       <div>
         <p class="text-center">Are you sure want to logout from this awesome system?</p>
         <p class="text-center">
           <button class="btn btn-danger md-close">No</button>
           <a href="{{ route('logout') }}" class="btn btn-success md-close">Oui</a>
         </p>
       </div>
     </div>
   </div> <!-- Modal End -->
   <!-- Begin page -->
   <div id="wrapper">

     <!-- Top Bar Start -->
     <div class="topbar">
       <div class="topbar-left">
         <div class="logo">
           <img src="{{asset('img/logo.png')}}" class="img-responsive" style="height: 60px;width: 60px;float: left;">
           <p style="color:white;font-size: 23px;">{{ config('app.name', 'Laravel') }}</p>
         </div>
         <button class="button-menu-mobile open-left">
           <i class="fa fa-bars"></i>
         </button>
       </div>
       <!-- Button mobile view to collapse sidebar menu -->
       <div class="navbar navbar-default" role="navigation">
         <div class="container">
           <div class="navbar-collapse2">
             <ul class="nav navbar-nav hidden-xs">
               <!--
                    <li class="language_bar dropdown hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">English (US) <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">Arabic</a></li>
                            <li><a href="#">French</a></li>
                            
                        </ul>
                    </li>
                    -->
             </ul>
             <ul class="nav navbar-nav navbar-right top-navbar">
               <li class="dropdown iconify hide-phone">
                 <ul class="dropdown-menu dropdown-message">


                 </ul>
               </li>
               <li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
               <li class="dropdown topbar-profile">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image"><img src="{{ asset('assets/img/88.png') }}"></span><strong>Agent</strong> <i class="fa fa-caret-down"></i></a>
                 <ul class="dropdown-menu">
                   <li><a href="#">Mon Profile</a></li>
                   <li class="divider"></li>
                   <!--<li><a href="#"><i class="icon-help-2"></i> Help</a></li>
                            <li><a href="#"><i class="icon-lock-1"></i> Lock me</a></li>-->
                   <li><a href="{{ route('logout') }}"><i class="icon-logout-1"></i> Deconnexion</a></li>
                 </ul>
               </li>

             </ul>
           </div>
           <!--/.nav-collapse -->
         </div>
       </div>
     </div>
     <!-- Top Bar End -->
     <!-- Left Sidebar Start -->
     <div class="left side-menu">
       <div class="sidebar-inner slimscrollleft">
         <!-- Search form -->
         <form role="search" class="navbar-form">
           <div class="form-group">
             <input type="text" placeholder="Search" class="form-control">
             <button type="submit" class="btn search-button"><i class="fa fa-search"></i></button>
           </div>
         </form>
         <div class="clearfix"></div>
         <!--- Profile -->
         <div class="profile-info" style="background-color: #4B5B65;">
           <div class="col-xs-4">
             <a href="profile.html" class="rounded-image profile-image"><img src="{{ asset('assets/img/88.png') }}"></a>
           </div>
           <div class="col-xs-8">
             <div class="profile-text">Bienvenue <b>{{ Auth::user()->name }}</b></div>

             <!--<div class=" profile-buttons">
               <a href="javascript:;"><i class="fa fa-envelope-o pulse"></i></a>

               <a href="javascript:;" title="Sign Out"><i class="fa fa-power-off text-red-1"></i></a>
             </div>-->

           </div>
         </div>
         <!--- Divider -->
         <div class="clearfix"></div>
         <hr class="divider" />
         <div class="clearfix"></div>
         <!--- Divider -->
         <div id="sidebar-menu">
           <ul>
             <li class='has_sub'><a href='javascript:void(0);'>
                 <i class='icon-home-3'></i><span>Accueil</span> </li>
             <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>

             </li>

             <li class='has_sub'><a href='javascript:void(0);'><i class='icon-pencil-3'></i><span>Transferts</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
               <ul>
                 <li><a href="{{ route('trensfert') }}"><span>Effectuer un transfer</span></a></li>
               </ul>
             </li>

             <!-- <li class='has_sub'><a href='javascript:void(0);'><i class='fa fa-table'></i><span>Configuration</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                             <ul>
                                 <li><a href='#'><span>account setup</span></a></li>
                                 <li><a href='#'><span>Datatables</span></a></li>
                             </ul>
                         </li>-->
           </ul>


           <div class="clearfix"></div>
         </div>
         <div class="clearfix"></div>

         <div class="clearfix"></div><br><br><br>
       </div>

     </div>

     <!-- Right Sidebar End -->
     <!-- Start right content -->
     <div class="content-page">
       <!-- ============================================================== -->
       <!-- Start Content here -->
       <!-- ============================================================== -->
       <div class="content">
         <!-- Start info box -->


         <div class="row">
           <div class="col-lg-8 col-md-6 portlets">
             @yield('content')

           </div>


           <!-- Footer Start 
            <footer style="position: fixed;">
                RIMTrans  &copy; 2019
                <div class="footer-links pull-right">
                    <a href="#">About</a><a href="#">Support</a><a href="#">Terms of Service</a><a href="#">Legal</a><a href="#">Help</a><a href="#">Contact Us</a>
                </div>
            </footer>
            Footer End -->
         </div>
         <!-- ============================================================== -->
         <!-- End content here -->
         <!-- ============================================================== -->

       </div>
       <!-- End right content -->

     </div>

     <!-- End of page -->
     <!-- the overlay modal element -->
     <div class="md-overlay"></div>
     <!-- End of eoverlay modal -->
     <script>
       var resizefunc = [];
     </script>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <script src="{{ asset('assets/libs/jquery/jquery-1.11.1.min.js') }}"></script>
     <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-detectmobile/detect.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-animate-numbers/jquery.animateNumbers.js') }}"></script>
     <script src="{{ asset('assets/libs/ios7-switch/ios7.switch.js') }}"></script>
     <script src="{{ asset('assets/libs/fastclick/fastclick.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-blockui/jquery.blockUI.js') }}"></script>
     <script src="{{ asset('assets/libs/bootstrap-bootbox/bootbox.min.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-sparkline/jquery-sparkline.js') }}"></script>
     <script src="{{ asset('assets/libs/nifty-modal/js/classie.js') }}"></script>
     <script src="{{ asset('assets/libs/nifty-modal/js/modalEffects.js') }}"></script>
     <script src="{{ asset('assets/libs/sortable/sortable.min.js') }}"></script>
     <script src="{{ asset('assets/libs/bootstrap-fileinput/bootstrap.file-input.js') }}"></script>
     <script src="{{ asset('assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>
     <script src="{{ asset('assets/libs/bootstrap-select2/select2.min.js') }}"></script>
     <script src="{{ asset('assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
     <script src="{{ asset('assets/libs/pace/pace.min.js') }}"></script>
     <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-icheck/icheck.min.js') }}"></script>

     <!-- Demo Specific JS Libraries -->
     <script src="{{ asset('assets/libs/prettify/prettify.js') }}"></script>

     <script src="{{ asset('assets/js/init.js') }}"></script>
     <!-- Page Specific JS Libraries -->
     <script src="{{ asset('assets/libs/d3/d3.v3.js') }}"></script>
     <script src="{{ asset('assets/libs/rickshaw/rickshaw.min.js') }}"></script>
     <script src="{{ asset('assets/libs/raphael/raphael-min.js') }}"></script>
     <script src="{{ asset('assets/libs/morrischart/morris.min.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-jvectormap/js/jquery-jvectormap-us-aea-en.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-clock/clock.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-easypiechart/jquery.easypiechart.min.js') }}"></script>
     <script src="{{ asset('assets/libs/jquery-weather/jquery.simpleWeather-2.6.min.js') }}"></script>
     <script src="{{ asset('assets/libs/bootstrap-xeditable/js/bootstrap-editable.min.js') }}"></script>
     <script src="{{ asset('assets/libs/bootstrap-calendar/js/bic_calendar.min.js') }}"></script>
     <script src="{{ asset('assets/js/apps/calculator.js') }}"></script>
     <script src="{{ asset('assets/js/apps/todo.js') }}"></script>
     <script src="{{ asset('assets/js/apps/notes.js') }}"></script>
     <!--<script src="assets/js/pages/index.js"></script>-->
 </body>

 <!-- Mirrored from hubancreative.com/projects/templates/coco/classy/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Jun 2018 05:26:34 GMT -->

 </html>