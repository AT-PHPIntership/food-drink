<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic page needs -->
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title')</title>
<meta name="Before buying it, get the feel and look of the Refresh Food & Restaurant Website Template by viewing the demo preview. View the pages, examine the images, click the buttons, explore the features.">
<meta name="keywords" content="food shop, fresh, modern, Refresh farm, Restaurant farm shop, Refresh food, Refresh shop, agriculture, e-commerce, eco, eco products, farm, farming, food, health, Restaurant, Refresh food, retail, shop, store"/>
@include('layout.style')
<!-- Mobile specific metas  -->
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body class="cms-index-index cms-home-page">
  <div id="page">
    <!-- Header -->
    @include('layout.header')
    <!-- end header --> 
    <!-- Navbar -->
    @include('layout.nav')
    <!-- end nav -->
    @yield('content')
    <!-- Footer -->
    @include('layout.footer')
    <!-- End Footer -->
  <!-- JS --> 
  </div>
  <!-- Script -->
  @include('layout.script')
</body>
</html>
