<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>
     <meta http-equiv="Refresh" content="300">
    <!-- Fontfaces CSS-->
    <link href="{{asset('template/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('template/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('template/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('template/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('template/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
  <div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="{{ route('agent') }}">
                        <img src="{{asset('img/logo.png')}}" alt="CoolAdmin" class="img-responsive" style="height: 60px;width: 60px;float: left;"/>
                    </a>
                    <h2>{{ config('app.name', 'Laravel') }}</h2>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
          <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
              <li>
                <a href="{{ route('agent') }}">
                  <i class="fas fa-home"></i>Accueil
                </a>
              </li>
              <li class="has-sub">
                <a class="js-arrow" href="#">
                    <i class="fas fa-exchange-alt"></i>Transfert</a>
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                  <li>
                      <a href="{{ route('saisie') }}">Effectuer un transfer</a>
                  </li>
                  <li>
                      <a href="#" data-toggle="modal" data-target="#retrais">Retrait</a>
                  </li> 
                </ul>
              </li>
              <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-money"></i>Caisse</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                         <li>
                              <a href="#" data-toggle="modal" data-target="#ajout">Ajout</a>
                          </li>
                          <li>
                              <a href="#" data-toggle="modal" data-target="#retirais">Retrait</a>
                          </li>
                    </ul>
                </li>
            </ul>
          </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
      <div class="logo">
          <a href="{{ route('agent') }}">
              <img src="{{asset('img/logo.png')}}" alt="Cool Admin" class="img-responsive" style="height: 60px;width: 60px;float: left;"/>
          </a>
          <h2>{{ config('app.name', 'Laravel') }}</h2>
      </div>
          <nav class="navbar-sidebar">
              <ul class="list-unstyled navbar__list">

                 <li>
                      <a href="{{ route('agent') }}">
                          <i class="fas fa-home"></i>Accueil</a>
                  </li>
                  <li class="active has-sub">
                      <a dusk="trans" class="js-arrow" href="#">
                          <i class="fas fa-exchange-alt"></i>Transfert</a>
                      <ul class="list-unstyled navbar__sub-list js-sub-list">
                          <li>
                              <a href="{{ route('saisie') }}">Effectuer un transfert</a>
                          </li>
                          <li>
                              <a dusk="retrais" href="#" data-toggle="modal" data-target="#retrais">Retrait</a>
                          </li>
                      </ul>
                  </li>

                   <li class="active has-sub">
                      <a dusk="mjr" class="js-arrow" href="#">
                          <i class="fas fa-money"></i>Caisse</a>
                      <ul class="list-unstyled navbar__sub-list js-sub-list">
                          <li>
                              <a dusk="ajt" href="#" data-toggle="modal" data-target="#ajout">Ajout</a>
                          </li>
                          <li>
                              <a dusk="rtr" href="#" data-toggle="modal" data-target="#retirais">Retrait</a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </nav>
      </div>
    </aside>
      <!-- END MENU SIDEBAR-->

      <!-- PAGE CONTAINER-->
      <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="{{ route('retrait') }}" method="get">
                          {{ csrf_field() }}
                            <input class="au-input au-input--xl" type="text" name="code" placeholder="saisir le code transfert" />
                            <button dusk="val" class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                        <div class="header-button">
                            <!-- <div class="noti-wrap">
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-comment-more"></i>
                                    <span class="quantity">1</span>
                                    <div class="mess-dropdown js-dropdown">
                                        <div class="mess__title">
                                            <p>You have 2 news message</p>
                                        </div>
                                        <div class="mess__item">
                                            <div class="image img-cir img-40">
                                                <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                            </div>
                                            <div class="content">
                                                <h6>Michelle Moreno</h6>
                                                <p>Have sent a photo</p>
                                                <span class="time">3 min ago</span>
                                            </div>
                                        </div>
                                        <div class="mess__item">
                                            <div class="image img-cir img-40">
                                                <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                            </div>
                                            <div class="content">
                                                <h6>Diane Myers</h6>
                                                <p>You are now connected on message</p>
                                                <span class="time">Yesterday</span>
                                            </div>
                                        </div>
                                        <div class="mess__footer">
                                            <a href="#">View all messages</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-email"></i>
                                    <span class="quantity">1</span>
                                    <div class="email-dropdown js-dropdown">
                                        <div class="email__title">
                                            <p>You have 3 New Emails</p>
                                        </div>
                                        <div class="email__item">
                                            <div class="image img-cir img-40">
                                                <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                            </div>
                                            <div class="content">
                                                <p>Meeting about new dashboard...</p>
                                                <span>Cynthia Harvey, 3 min ago</span>
                                            </div>
                                        </div>
                                        <div class="email__item">
                                            <div class="image img-cir img-40">
                                                <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                            </div>
                                            <div class="content">
                                                <p>Meeting about new dashboard...</p>
                                                <span>Cynthia Harvey, Yesterday</span>
                                            </div>
                                        </div>
                                        <div class="email__item">
                                            <div class="image img-cir img-40">
                                                <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                            </div>
                                            <div class="content">
                                                <p>Meeting about new dashboard...</p>
                                                <span>Cynthia Harvey, April 12,,2018</span>
                                            </div>
                                        </div>
                                        <div class="email__footer">
                                            <a href="#">See all emails</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <span class="quantity">3</span>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a new file</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div></div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <!--<div class="image">
                                        <img src="images/icon/avatar-01.jpg" />
                                    </div>-->
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{asset('img/avatar.png')}}"  />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    {{ Auth::user()->name }}
                                                </h5>
                                                <span class="email">{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                        
                                        <div class="account-dropdown__footer">
                                            <a href="{{ route('logout') }}">
                                                <i class="zmdi zmdi-power"></i>Deconnexion</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    @yield('content')
                    <div class="row">
                        <div class="col-md-12">
                          <div class="copyright">
                            <p>Copyright © 2019 </p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- modal retrais -->
        <div class="modal fade" id="retrais" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">Retrais</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="form-header" action="{{ route('retrait') }}" method="get">
                        {{ csrf_field() }}
                        <div class="col col-md-12">
                            <div class="input-group">
                                <input type="text" id="input2-group2" name="code" placeholder="code transfert" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin modal retrais -->

        <!-- modal ajout de solde dans la caisse -->
        <div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">ajouter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="form-header" action="{{ route('ajout') }}" method="post">
                        {{ csrf_field() }}
                        <div class="col col-md-12">
                            <div class="input-group">
                                <input type="text" id="input2-group2" name="montant" placeholder="montant" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin modal ajout de solde dans la caisse  -->

        <!-- modal retirais du solde la caisse -->
        <div class="modal fade" id="retirais" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallmodalLabel">Retrait</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="form-header" action="{{ route('retirais') }}" method="post">
                        {{ csrf_field() }}
                        <div class="col col-md-12">
                            <div class="input-group">
                                <input type="text" id="input2-group2" name="montant" placeholder="montant" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin modal retirais du solde la caisse  -->
      <!-- END PAGE CONTAINER-->
      </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('template/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('template/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('template/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('template/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('template/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('template/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('template/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('template/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('template/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('template/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('template/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('template/js/main.js')}}"></script>

  </body>

</html>
<!-- end document-->

             