<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
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
                            <li class="active"><i class="fa"></i><a href="">Home</a></li>
                            <li><i class="fa"></i><a href="">Search</a></li>
                            <li><a href="">Explore</a></li>
                            <li><a href="">Reels</a></li>
                            <li><a href="">Messages</a></li>
                            <li><a href="">Notifications</a></li>
                            <li><a href="">Create</a></li>
                            <li><a href="">Profile</a></li>
                        </ul>
                    </div>
                </div>
                {{-- left side end --}}
            </div>

            <div class="col-lg-4">
                <div class="home">

                    <div class="stories"> {{--start story--}}
                        <div class="story">
                            <div class="imgBx">
                                <img src="{{asset('lap.png')}}" alt="">
                            </div>
                            <div class="title">
                                sssssssss
                            </div>
                        </div>
                    </div> {{--end story--}}

                    <div class="posts"> {{--start posts--}}

                        <div class="post"> {{--start title of posts--}}
                            <div class="story">
                                <div class="imgBx">
                                    <img src="{{asset('lap.png')}}" alt="">
                                </div>
                            </div>
                            <div class="title">name-of-page <span>.1h</span></div>
                            <div class="info">...</div>
                        </div> {{--end title of posts--}}

                        <div class="imgPost">
                            <img src="{{asset('lap.png')}}" alt="">
                        </div>

                        <div class="actions">
                            <i class="fa fa-heart"></i>
                            <i class="fa fa-heart"></i>
                            <i class="fa fa-heart"></i>
                            <i class="fa fa-heart save"></i>
                        </div>

                        <div class="num-likes">11 likes</div>

                        <div class="post-content">
                            <div class="title">name-of-page</div>
                            <p>content of post will write here</p>
                        </div>

                        <div class="add-comment">
                            <input type="text" placeholder="Add a comment...">
                        </div>
                        <hr>
                    </div> {{--end posts--}}

                </div>
            </div>

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

