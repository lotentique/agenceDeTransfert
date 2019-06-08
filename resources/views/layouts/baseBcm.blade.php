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
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('template/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>
    <!-- Bootstrap CSS-->
    <link href="{{asset('css/bootstrap-animation.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap-toggle.min.css')}}" rel="stylesheet">
    <!-- Vendor CSS-->
    <link href="{{ asset('template/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('template/vendor/vector-map/jqvmap.min.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('template/css/theme.css')}}" rel="stylesheet" media="all">
    
</head>

<body >
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <div class="image img-cir img-60">
                    <img src="{{asset('img/avatar.png')}}" alt=""  />
                    </div>
                </a>
                <h4 style="margin-left: 10px;color: white;font-family: times new roman;text-shadow: 1px 1px 1px black;">{{ Auth::user()->email }} <a style="text-shadow: none;color: black;" href="{{ route('logout') }}">Deconnexion</a></h4>
                
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-120">
                        <img src="{{asset('img/logo.png')}}" alt="" />
                    </div>
                    <h4 class="name" style="font-family: times new roman">AGENCE/<span style="color: Slateblue;">{{ config('app.name', 'Laravel') }}</span></h4>
                    
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="#" class="Trans">
                                <i class="fas fa-exchange-alt"></i>Transactions</a>
                                @if (count($Transfert))
                                <span class="inbox-num">{{$CTransfert}}</span>
                                @endif
                        </li>
                        <li>
                            <a href="#" class="Stat">
                                <i class="fas fa-chart-bar"></i>Statistiques</a>
                            <!--<span class="inbox-num">100</span>-->
                        </li>
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-envelope"></i>Messagerie
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                                <li>
                                    <a href="map.html">
                                        <i class="fas fa-map-marker-alt"></i>..</a>
                                </li>
                            </ul>
                        </li>
                        
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2" >
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2" >
                <div class="section__content section__content--p30" >
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <div class="image img-cir img-60">
                                    <img src="{{asset('img/avatar.png')}}"/>
                                    </div>
                                </a>
                                 <h4 style="margin-left: 10px;color: white;font-family: times new roman;text-shadow: 1px 1px 1px black;float: right;">{{ Auth::user()->email }}<br> <a style="text-shadow: none;color: black;" href="{{ route('logout') }}">Deconnexion</a></h4>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                @if (count($Transfertelever))
                                 
                                <div class="header-button-item {{$hasnoti}} js-item-menu " >
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown" style="overflow-y: scroll;height: 260px">
                                        <div class="notifi__title">
                                            <p>Vous avez {{$CTransfertelever}} Notifications</p>
                                        </div>
                                        @foreach($Transfertelever as $row)
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-assignment-alert" style="background-color: red;"></i>
                                            </div>
                                            <div class="content">
                                                <p>Transfert tros eleve</p>
                                                <span class="date">Effectuer Le:{{$row->created_at}}</span><br>
                                                <span class="date">somme de {{$row->montant}}</span>
                                            </div>
                                        </div>
                                           @endforeach
                                            
                                        <div class="notifi__footer">
                                            <a href="#"></a>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="header-button-item  js-item-menu " >
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown" style="overflow-y: auto;height: 260px;margin-left: 20px;">
                                        <div class="notifi__title">
                                            <p>Vous avez {{$CTransfertelever}} Notifications</p>
                                        </div>
                                        
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>Aucune Notifications</p>
                                                
                                            </div>
                                        </div>
                                           
                                        
                                    </div>
                                </div>


                                @endif
                                <div class="header-button-item mr-0 js-sidebar-btn ddmb">
                                    <i class="zmdi zmdi-menu ddmb"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <div class="image img-cir img-60">
                                    <img src="{{asset('img/avatar.png')}}"/>
                                    </div>
                                </a>
                                 <h4 style="margin-left: 10px;color: white;font-family: times new roman;text-shadow: 1px 1px 1px black;float: right;">{{ Auth::user()->email }}<br> <a style="text-shadow: none;color: black;" href="{{ route('logout') }}">Deconnexion</a></h4>
                            </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="{{asset('img/logo.png')}}"  />
                        </div>
                       <h4 class="name" style="font-family: times new roman">AGENCE/<span style="color: Slateblue;">{{ config('app.name', 'Laravel') }}</span></h4>
                
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="#" class="Trans">
                                <i class="fas fa-exchange-alt"></i>Transactions</a>
                                @if (count($Transfert))
                                <span class="inbox-num">{{$CTransfert}}</span>
                                @endif
                        </li>
                        <li>
                            <a href="#" class="Stat">
                                <i class="fas fa-chart-bar"></i>Statistiques</a>
                            <!--<span class="inbox-num">100</span>-->
                        </li>
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-envelope"></i>Messagerie
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                
                                <li>
                                    <a href="map.html">
                                        <i class="fas fa-map-marker-alt"></i>..</a>
                                </li>
                            </ul>
                        </li>
                        
                        
                    </ul>
                    </nav>
                </div>
            </aside>
            
            
            <div class="container-fluid contenue">
                
                @yield('content')
                
                
            </div>
        </div>       
    </div>


    
    <!-- Jquery JS-->
    <script src="{{ asset('template/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/bootstrap-toggle.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('template/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{ asset('template/vendor/wow/wow.min.js')}}"></script>
    <script src="{{ asset('template/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{ asset('template/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{ asset('template/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('template/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{ asset('template/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ asset('template/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('template/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('template/vendor/select2/select2.min.js')}}">
    </script>
    <script src="{{ asset('template/vendor/vector-map/jquery.vmap.js')}}"></script>
    <script src="{{ asset('template/vendor/vector-map/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('template/vendor/vector-map/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{ asset('template/vendor/vector-map/jquery.vmap.world.js')}}"></script>
    <!-- Main JS-->
    <script src="{{ asset('template/js/main.js')}}"></script>
     <script type="text/javascript" src="{{asset('DataTables/datatables.min.js') }}"></script>
     <script type="text/javascript">
      $(document).ready(function(){
        $('#PTable').DataTable();
      });

        $('.Trans').click(function(){
          $('.Status').hide();
          $('.scroll').show();
        });
        $('.Stat').click(function(){
          $('.scroll').hide();
          $('.Status').show();
         
        });
     </script>
</body>

</html>
<!-- end document-->