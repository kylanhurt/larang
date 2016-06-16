@yield('header')

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <ui-view name="main-cont"> 
        @yield('content')
    </ui-view>

@yield('footer')