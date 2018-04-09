<!-- Whole app layout comes here -->
<!DOCTYPE html>
<head>
    @include('partials.head')
</head>
<body>
<div id="app">
    @include('partials.nav')
    <div class="container">
        @yield('content')
    </div>
    @include('partials.footer')
</div>
@include('partials.scripts')
</body>
