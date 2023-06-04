<!DOCTYPE html>
<html lang="id">

@include('partials.head')
<body>
    @include('partials.nav')
    @yield('content')
    @include('partials.footer')
</body>
{{-- @yield('scripts') --}}
</html>