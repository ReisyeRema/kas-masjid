<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />

    @include('includes.style')

  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      @include('komponen.sidebar')
      <!-- End Sidebar -->

      <div class="main-panel">
        

        @include('komponen.header')

        <div class="container">
          <div class="page-inner">
            
            @yield('content')
           
          </div>
        </div>

        @include('komponen.footer')
      </div>

      <!-- Custom template | don't include it in your project! -->
     @include('komponen.color')
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->

    @include('includes.script')
    <!-- Include SweetAlert -->

    @stack('scripts')
  </body>
</html>
