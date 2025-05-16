<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shirtify Store</title>

  {{-- bootstrap icons --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <!-- remix icon -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet" />

  <!-- Bootstrap CSS -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- template all css links--}}
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}  " />
  <!-- font awesome style -->
  <link href="{{ asset('css/font-awesome.min.css') }} " rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }} " rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
  <!-- Optionally add your own CSS -->
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
  <!-- Navbar -->
  @include('partials.navbar' )

  <!-- hero section -->

  @if(request()->routeIs('shop.index'))
  @include('partials.hero')
  @include('partials.why')
   @include('partials.arival')
  @endif
  
  <!--  Main content -->

  <div class="">
    @yield('content')

  </div>
  

  <!-- footer include -->
  @include('partials.footer')
  <!-- font awosm link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- Bootstrap 5 JS and Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
  <!-- jQery -->
  <script src=" {{ asset('js/jquery-3.4.1.min.js') }} "></script>
  <!-- popper js -->
  <script src=" {{ asset('js/popper.min.js') }} "></script>
  <!-- bootstrap js -->
  <script src=" {{ asset('js/bootstrap.js') }} "></script>
  <!-- custom js -->
  <script src=" {{ asset('js/custom.js') }}  "></script>
  @stack('script')
  @stack('quantity-script')

</body>

</html>