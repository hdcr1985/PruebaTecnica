<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>

  <body>
    @include('menu/nav')

    <div class="container-fluid">
      <div class="row">
        @include('menu/menu')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">@yield('title_section')</h1>
          </div>


          @yield('content')

          @yield('table_content')

        </main>
      </div>
    </div>


    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <!--<script src="{{ asset('/js/jquery-3.2.1.slim.min.js') }}"></script>-->
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    @yield('script_lib')
    
  </body>
</html>