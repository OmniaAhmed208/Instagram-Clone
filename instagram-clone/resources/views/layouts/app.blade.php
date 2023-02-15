<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/side-bar.css')}}">
    <link rel="stylesheet" href= @yield('css')>
</head>
<body @yield('body')>
    <div class="side-bar">
        <div class="row">
            <div class="col-lg-2">
                {{-- left side strat --}}
                <div class="left-side">
                    <div class="bar">
                        <h1><a href="">Instagram</a></h1>
                        <ul class="list-unstyled">
                            <li class="home-icon"><a href="/home">Home</a></li>
                            <li class="search" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch"><a>Search</a></li>
                            <li class="explore"><a href="/explore">Explore</a></li>
                            <li class="reels"><a href="/reels">Reels</a></li>
                            <li class="messages"><a href="">Messages</a></li>
                            <li class="notifications" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNotif" aria-controls="offcanvasNotif"><a>Notifications</a></li>
                            <li class="create"><a href="">Create</a></li>
                            <li class="profile"><img src="{{asset('lap.png')}}" alt=""/><a href="">Profile</a></li>
                            <li class="more">More</li>
                        </ul>
                    </div>
                </div>
                {{-- left side end --}}
            </div>


            @yield('content')


        </div>
    </div>



    {{-- search left side offcanvas start --}}
    <div  class="offcanvas offcanvas-start rounded-start rounded-5" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="offcanvasSearchLabel">
        <div class="search-bar">
            {{-- offcanvas title start --}}
            <div class="offcanvas-header">
                <h3 class="offcanvas-title" id="offcanvasSearchLabel">Search</h3>
                {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
            </div>
            {{-- offcanvas title end --}}
            <div class="offcanvas-body">
                {{-- search start --}}
                @yield('contentSearchOffCanvas')
                {{-- search end --}}
            </div>
        </div>
    </div>
    {{-- search left side offcanvas end --}}



    {{-- notifications left side offcanvas start --}}
    <div  class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasNotif" aria-labelledby="offcanvasNotifLabel">
        <div class="notif-bar">
            {{-- offcanvas title start --}}
            <div class="offcanvas-header">
                <h3 class="offcanvas-title" id="offcanvasNotifLabel">Notifications</h3>
            </div>
            {{-- offcanvas title end --}}
            {{-- notifications lists start --}}
            <div class="offcanvas-body">
                <div class="notif-week-list">
                    <div class="row week-title">
                        <h5 class="col align-self-start">This Week</h5>
                    </div>
                    <ul class="row week-list">
                        {{--week-list row start --}}
                        @yield('content-notif-week-user-container')
                        {{-- week-list row end --}}
                    </ul>
                </div>
                {{-- week notifications end --}}
                <hr />
                {{-- month notifications start --}}
                <div class="notif-month-list">
                    <div class="row month-title">
                        <h5 class="col align-self-start">This Month</h5>
                    </div>
                    <ul class="month-list">
                        {{--month-list row start --}}
                        @yield('content-notif-month-user-container')
                        {{-- month-list row end --}}
                    </ul>
                </div>
                {{-- month notifications end --}}
                <hr />
                {{-- earlier notifications start --}}
                <div class="notif-earlier-list">
                    <div class="row earlier-title">
                        <h5 class="col align-self-start">Earlier</h5>
                    </div>
                    <ul class="earlier-list">
                        {{--earlier-list row start --}}
                        @yield('content-notif-earlier-user-container')
                        {{-- earlier-list row end --}}
                    </ul>
                </div>
                {{-- suggestions for you notifications end --}}
                <hr />
                {{-- suggest notifications start --}}
                <div class="notif-suggest-list">
                    <div class="row suggest-title">
                        <h5 class="col align-self-start">Suggestions for you</h5>
                    </div>
                    <ul class="suggest-list">
                        {{--suggest-list row start --}}
                        @yield('content-notif-suggest-user-container')
                        {{-- suggest-list row end --}}
                    </ul>
                </div>
                {{-- suggest notifications end --}}
            </div>
            {{-- notifications lists end --}}
        </div>
    </div>
    {{-- notifications left side offcanvas end --}}

    <script src="{{asset('/js/propper.min.js')}}"></script>
    <script src="{{asset('/js/jquery-3.6.0.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
</html>

