<!DOCTYPE html>
<html lang="en">
    <!-- Title and Links -->
@include('layouts.head')
<body>
<div class="super_container">

    <!-- Header -->
@include('layouts.header')

    <!-- Content -->
@yield('content')

    <!-- Footer -->
{{--@include('layouts.footer')--}}
</div>

    <!-- Javascript -->
@include('layouts.scripts')
</body>
</html>