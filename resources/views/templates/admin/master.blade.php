<!doctype html>
<html class="no-js" lang="">
@include('templates.admin.sidebar')
<div id="right-panel" class="right-panel">
@include('templates.admin.header')
@yield('content')
</div><!-- /#right-panel -->
<script src="/js/vendor/jquery-2.1.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="/js/plugins.js"></script>
  <script src="/js/main.js"></script>
@yield('js-index')
@yield('js-data-table')
</body>
</html>
