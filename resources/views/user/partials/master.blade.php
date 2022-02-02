<!DOCTYPE html>
<html lang="en">
@include('user.partials.header-assets')
<body>
  <!-- ======= Header ======= -->
	@include('user.partials.header')

  <!-- End Header -->
  <main id="main" class="main">
	@yield('main-content')
  </main><!-- End #main -->

@include('user.partials.footer')
@include('user.partials.footer-assets')
@include('user.partials.message')
</body>
</html>
