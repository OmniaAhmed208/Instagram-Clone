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
                {{-- left side start --}}
                <div class="left-side">
                    <div class="bar">
                        <h1><a href="">Instagram</a></h1>
                        <ul class="list-unstyled">
                            <li class="active"><i class="fa"></i><a href="">Home</a></li>
                            <li><i class="fa"></i><a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">Search</a></li>
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

    {{-- search left side offcanvas start --}}
    <div  class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasSearch" aria-labelledby="offcanvasSearchLabel">
        <div class="search-bar">
            {{-- offcanvas title start --}}
            <div class="offcanvas-header">
                <h3 class="offcanvas-title" id="offcanvasSearchLabel">Search</h3>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            {{-- offcanvas title end --}}
            {{-- search start --}}
            <div class="offcanvas-body">
                <div class="row mt-5">
                    <div class="col mx-auto">
                        <div class="search">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control" placeholder="Search">
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="form-control" aria-label="reset"></button>
                        </div>
                    </div>
                </div>
                <hr />
                <ul class="search-auto-results">
                    {{--  search-auto-results row start --}}
                    <a href="" class="row">
                        <div class="search-auto-result">
                            <div class="row">
                                <div class="col-lg-3 align-self-start">
                                    <div class=" story">
                                        <div class="imgBx">
                                            <img src="{{asset('lap.png')}}" alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 align-self-start">
                                    <div class="title-info">
                                        <div class="title">
                                            <p>Nikename-of-person</p>
                                            <i class="verificationSign"></i>
                                        </div>
                                        <div class="info">
                                            <p>Nikename &sdot; 0 followers</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 align-self-center">
                                    <button type="button" class="btn-close text-reset " data-bs-dismiss="searchResult" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </a>
                    {{-- search-auto-result row end --}}
                </ul>
                <div class="recent-search-list">
                    <div class="row recent-title">
                        <h5 class="col align-self-start">Recent</h5>
                        <a class="col align-self-end info" href="">Clear all</a>
                    </div>
                    <ul class="recent-search-results">
                        {{-- recent-search-results row start --}}
                        <a href="">
                            <div class="search-result">
                                <div class="row">
                                    <div class="col-lg-3 align-self-start">
                                        <div class="story">
                                            <div class="imgBx">
                                                <img src="{{asset('lap.png')}}" alt="img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 align-self-start">
                                        <div class="title-info">
                                            <div class="title">
                                                <p>Nikename-of-person</p>
                                                <i class="verificationSign"></i>
                                            </div>
                                            <div class="info">
                                                <p>Nikename &sdot; 0 followers</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 align-self-center">
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="searchResult" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        </a>
                        {{-- recent-search-results row end --}}
                    </ul>
                </div>
            </div>
            {{-- search end --}}
        </div>
    </div>
    {{-- search left side offcanvas end --}}

    <script src="{{asset('/js/propper.min.js')}}"></script>
    <script src="{{asset('/js/jquery-3.6.0.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
</html>

