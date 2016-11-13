<!DOCTYPE html>
<html lang="en">

<head>
@include('partials._header')
</head>

<body>

@include('partials._nav')


<div class="container ">
    @include('partials._messages')
    @yield('content')

</div>

@yield('scripts')
@yield('styles')
@include('partials._footer')

</body>
</html>