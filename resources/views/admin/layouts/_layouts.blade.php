<!doctype html>
<html lang="en">
@include('admin.layouts.htmlhead')
<body class="fix-sidebar">
@include('admin.layouts.sidebar')
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    @include('admin.layouts.header')
    <!-- Content -->
    @yield('content')
</div>
@include('admin.layouts.footer')
@include('admin.layouts.scripts')
</body>
</html>