


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>{{config('app.name')}} | Authentication</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('/backend/assets/images/favicon-1.ico')}}">
      <link rel="stylesheet" href="{{asset('/backend/assets/css/backend-plugin.min-1.css')}}">
      <link rel="stylesheet" href="{{asset('/backend/assets/css/backend-1.css?v=1.0.0')}}">
    </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->

      <div class="wrapper">
        <section class="login-content">
          @yield('content')
      </section>
      </div>

      <script src="{{ asset('/backend/assets/js/backend-bundle.min-1.js')}}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ asset('/backend/assets/js/customizer-1.js')}}"></script>



      <!-- Flextree Javascript-->


      <!-- Table Treeview JavaScript -->




      <!-- Vectoe Map JavaScript -->


      <!-- Chart Custom JavaScript -->


      <!-- slider JavaScript -->


      <!-- Emoji picker -->



      <!-- app JavaScript -->
      <script src="{{ asset('/backend/assets/js/app-1.js')}}"></script>  </body>
</html>
