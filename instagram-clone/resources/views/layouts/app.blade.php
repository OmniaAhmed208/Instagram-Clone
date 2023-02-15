<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{asset('/css/side-bar.css')}}">
    <link rel="stylesheet" href="{{asset('/css/side-bar-media.css')}}">
    <link rel="stylesheet" href= @yield('css')>
</head>
<body @yield('body')>
    <div class="side-bar">
        <div class="row">
            <div class="col-lg-2">
                {{-- left side strat --}}
                <div class="left-side">

                    <header>
                        <a href="" class="logo"><img src="{{asset('/img/logo.png')}}" alt="" ></a>
                        <a href="" class="logo2"><img src="{{asset('/img/logo2.jpg')}}" alt="" ></a>

                        <ul class="list-unstyled">
                            <li><a href=""><i class="fas fa-home"></i> <span>Home</span></a></li>
                            <li><a href=""><i class="fas fa-search"></i> <span>Search</span></a></li>
                            <li><a href=""><i class="fas fa-compass"></i> <span>Explore</span></a></li>
                            <li><a href=""><i class="fas fa-compass"></i> <span>Reels</span></a></li>
                            <li><a href=""><i class="fa-brands fa-facebook-messenger"></i> <span>Messages</span></a></li>
                            <li><a href=""><i class="fas fa-heart"></i> <span>Notifications</span></a></li>
                            <li><a href=""><i class="fas fa-plus-square"></i> <span>Create</span></a></li>
                            <li class="profile"><img src="{{asset('lap.png')}}" alt=""/><a href=""><span>Profile</span></a></li>

                            <li class="more">
                                <div class="dropdown">
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Setting</a></li><hr>
                                        <li><a class="dropdown-item" href="#">Saved</a></li><hr>
                                        <li><a class="dropdown-item" href="#">Switch appearance</a></li><hr>
                                        <li><a class="dropdown-item" href="#">Your Activity</a></li><hr>
                                        <li><a class="dropdown-item" href="#">Report a problem</a></li><hr>
                                        <li><a class="dropdown-item" href="#">Switch accounts</a></li><hr>
                                        <li><a class="dropdown-item" href="#">Log out</a></li>
                                    </ul>
                                    <i class="fa fa-bars fa-x2" aria-hidden="true"></i>
                                    <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                                </div>
                            </li>

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
                    </header>
                </div>
                {{-- left side end --}}
            </div>


            @yield('content')



            <div class="col-lg-4">
                {{-- right side strat --}}
                <div class="right-side d-lg-block d-sm-none">

                    <div class="owner">{{--start owner--}}
                        <div class="story">
                            <div class="imgBx">
                                <img src="{{asset('lap.png')}}" alt="">
                            </div>
                        </div>

                        <div class="title">
                            <a href="">Nikename-of-owner-page</a>
                            <p>Name</p>
                        </div>
                        <div class="info">Switch</div>
                    </div>{{--end owner--}}

                    <div class="suggested-persons">
                        <div class="content">
                            <div class="title">Suggestions for you</div>
                            <div class="see-all">See All</div>
                        </div>

                        <div class="persons">{{--start persons--}}
                            <div class="story">
                                <div class="imgBx">
                                    <img src="{{asset('lap.png')}}" alt="">
                                </div>
                            </div>
                            <div class="title">
                                <a href="">Nikename-of-person</a>
                                <p>suggested for you</p>
                            </div>
                            <div class="info">Follow</div>


                            <div class="infoPerson"> {{--when hover on person--}}

                                <div class="person">{{--start owner--}}
                                    <div class="story">
                                        <div class="imgBx">
                                            <img src="{{asset('lap.png')}}" alt="">
                                        </div>
                                    </div>

                                    <div class="title">
                                        <a href="">Nikename-of-owner-page</a>
                                        <p>Name</p>
                                    </div>
                                </div>{{--end owner--}}

                                <hr>
                                <div class="info2">
                                    <div class="data text-center">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="stats">
                                                        <p>25.500</p>
                                                        <span>Posts</span>
                                                      </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="stats">
                                                        <p>25.500</p>
                                                        <span>Followers</span>
                                                      </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="stats">
                                                        <p>25.500</p>
                                                        <span>Following</span>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="imgBx">
                                        <div class="row"> {{--3 imgs from page of user--}}
                                            <div class="col-sm"><img src="{{asset('lap.png')}}" alt=""></div>
                                            <div class="col-sm"><img src="{{asset('lap.png')}}" alt=""></div>
                                            <div class="col-sm"><img src="{{asset('lap.png')}}" alt=""></div>
                                        </div>
                                    </div>

                                    <div class="follow-btn text-center">
                                        <div class="container">
                                            <input type="button" class="btn btn-primary" value="Follow">
                                        </div>
                                    </div>
                                </div> {{--info2 end--}}
                            </div>
                        </div>{{--end persons--}}

                    </div>
                </div>
                {{-- right side end --}}
            </div>
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> --}}

</body>
</html>

