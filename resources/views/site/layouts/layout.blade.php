@include('site.layouts.head')

<body>
    @include('site.layouts.header')

    @yield('content')

    @include('site.layouts.footer')

    @include('site.layouts.scripts')
</body>

</html>
