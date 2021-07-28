

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



       <title>{{ config('app.name', 'Laravel') }}</title>

       <!-- Scripts -->
       <script src="{{ asset('js/app.js') }}" defer></script>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('/backend/assets/images/favicon-1.ico')}}">

      <link rel="stylesheet" href="{{asset('/backend/assets/css/backend-plugin.min-1.css')}}">
      <link rel="stylesheet" href="{{asset('/backend/assets/css/backend-1.css?v=1.0.0')}}">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <div id="app">

    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper" >
      <div class="iq-sidebar  sidebar-default  sidebar-blue">
          <div class="iq-sidebar-logo d-flex align-items-end justify-content-between" style="    background-color: #ffffff;">
               <a href="index.html" class="header-logo">
                  <img src="/backend/assets/images/logo-1.png" class="img-fluid rounded-normal light-logo" alt="logo">
                  <img src="/backend/assets/images/logodemo/02-blue-1.png" class="img-fluid rounded-normal d-none sidebar-light-img" alt="logo">
                  <span class="text-dark">{{config('app.name')}}</span>
              </a>
              <div class="side-menu-bt-sidebar-1">
                      <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
              </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
                @include('layouts.backend.components.sidemenu')
              <div class="pt-5 pb-5"></div>
          </div>
      </div>
       <div class="iq-top-navbar">
          <div class="iq-navbar-custom">
            @include('layouts.backend.components.navbar')
          </div>
      </div>
      <div class="content-page">
        <div class="container-fluid">
            @yield('content')
            <!-- Page end  -->
        </div>
      </div>
    </div>
    <!-- Wrapper End-->
    </div>

    @include('layouts.backend.components.footer')
    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('/backend/assets/js/backend-bundle.min-1.js')}}"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('/backend/assets/js/customizer-1.js')}}"></script>

    <script src="{{ asset('/backend/assets/js/sidebar-1.js')}}"></script>

    <!-- Flextree Javascript-->
    <script src="{{ asset('/backend/assets/js/flex-tree.min-1.js')}}"></script>
    <script src="{{ asset('/backend/assets/js/tree-1.js')}}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('/backend/assets/js/table-treeview-1.js')}}"></script>
    <script>
   @auth
        window.user = {!! json_encode(Auth::user(), true) !!};
    @else
        window.user = [];
        window.Permissions = [];
    @endauth
</script>
    <!-- Vectoe Map JavaScript -->
    <script src="{{ asset('/backend/assets/js/vector-map-custom-1.js')}}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('/backend/assets/js/chart-custom-1.js')}}"></script>
    <script src="{{ asset('/backend/assets/js/charts/01-1.js')}}"></script>
    <script src="{{ asset('/backend/assets/js/charts/02-1.js')}}"></script>

    <!-- slider JavaScript -->
    <script src="{{ asset('/backend/assets/js/slider-1.js')}}"></script>

    <!-- Emoji picker -->
    <script src="{{ asset('/backend/assets/vendor/emoji-picker-element/index-1.js')}}" type="module"></script>


    <!-- app JavaScript -->
    <script src="{{ asset('/backend/assets/js/app-1.js')}}"></script>  </body>
</html>
