<!DOCTYPE html>
<html>
<head>
    @include('include.head')
</head>
<body>

    @include('include.header')

    <br>
    <div class="container">
            @yield('content')
    </div>

    <div cass="container-fluid">
        <footer class="row">
            @include('include.footer')
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
