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
<body>
    <div class="side-bar">
        <div class="row">
            <div class="col-lg-4">
                {{-- left side strat --}}
                <div class="left-side">
                    <div class="bar">
                        <h1><a href="">Instagram</a></h1>
                        <ul class="list-unstyled">
                            <li class="home-icon"><a href="">Home</a></li>
                            <li class="search"><a href="">Search</a></li>
                            <li class="explore"><a href="">Explore</a></li>
                            <li class="reels"><a href="">Reels</a></li>
                            <li class="messages"><a href="">Messages</a></li>
                            <li class="notifications"><a href="">Notifications</a></li>
                            <li class="create"><a href="">Create</a></li>
                            <li class="profile"><img src="{{asset('lap.png')}}" alt=""/><a href="">Profile</a></li>
                            <li class="more">More</li>
                        </ul>
                    </div>
                </div>
                {{-- left side end --}}
            </div>


            @yield('content')



            <div class="col-lg-4">
                {{-- right side strat --}}
                <div class="right-side">

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

    <script src="{{asset('/js/propper.min.js')}}"></script>
    <script src="{{asset('/js/jquery-3.6.0.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
</html>

