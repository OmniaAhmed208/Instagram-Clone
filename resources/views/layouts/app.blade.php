<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('/img/Instagram_Glyph_Gradient.png')}}">
    {{-- cropper.js to crop image--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.css"/>
    {{-- <link rel="stylesheet" href="{{asset('/css/cropper.css')}}"> --}}
    {{-- <script src="{{asset('/js/cropper.js')}}"></script> --}}
    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css">
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>
    {{-- bootstrap --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Fonts and icons --}}
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    {{-- css --}}
    <link rel="stylesheet" href="{{asset('/css/side-bar.css')}}">
    <link rel="stylesheet" href="{{asset('/css/side-bar-media.css')}}">
    <link rel="stylesheet" href="{{asset('/css/explore_reels.css')}}">
    <link rel="stylesheet" href= @yield('css')>
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script
    type="text/javascript"
    async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=MML_HTMLorMML"
  ></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body @yield('body')>
    <!-- ===========================topheader========================= -->

    <div class="top-header">
        <a class="logo" href="#"><img src="{{asset('/img/logo.png')}}" alt="" ></a>
        <div class="right-header container">
            <input type="search"  placeholder="Search" aria-label="Search">
            <!--<a href="" data-bs-toggle="offcanvas" data-bs-target=""fa fa-heart-o"></i></a>-->
            <i class="fa fa-heart-o"></i>
        </div>
    </div>

    <!-- ===========================bottom-header========================= -->

    {{-- <div class="bottom-header">
        <ul class="list-unstyled">
            <li><a href="/home"><i class="fa fa-home"></i></a></li>
            <li><a href="/explore"><i class="fa fa-compass"></i></a></li>
            <li><a href="/reels"><i class="fa fa-compass"></i></a></li>
            <li class="create"><i class="fa fa-plus-square"></i></li>
            <li><a href=""><i class="fa fa-commenting-o"></i></a></li>
            <li class="profile"><a href=""><img src="{{asset('lap.png')}}" alt=""/></a></li>
        </ul>
    </div> --}}

    <!-- ============================================================= -->
    <div class="side-bar">
        <div class="row justify-content-center">
            <div class="col-lg-3 left-col">
                {{-- left side strat --}}
                <div class="left-side">

                    <header>
                        <a href="" class="logo"><img src="{{asset('/img/logo.png')}}" alt="" ></a>
                        <a href="" class="logo2"><img src="{{asset('/img/logo2.jpg')}}" alt="" ></a>

                        <ul class="list-unstyled">
                            <li><a href="/home"><i class="fas fa-home"></i> <span>Home</span></a></li>
                            <li><a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch"><i class="fa fa-search"></i><span>Search</span></a></li>
                            <li><a href="/explore"> <i class="fa fa-compass"></i><span>Explore</span></a></li>
                            <li><a href="/reels"><img src="{{asset('/img/10391363.png')}}" style="width: 27px;margin-right: 17px;" alt=""/><span>Reels</span></a></li>
                            <li><a href="/chatify"><i class="fa-brands fa-facebook-messenger"></i> <span>Messages</span></a></li>
                            <li><a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNotif" aria-controls="offcanvasNotif"><i class="fas fa-heart"></i> <span>Notifications</span></a></li>
                            <li class="create"><i class="fas fa-plus-square"></i> <span>Create</span></li>
                            <li class="profile"><a href="/profile/{{auth()->user()->id}}"><img src="
                                 @if (auth()->user()->user_photo_path == null)
                                    {{ asset('default.jpg') }}
                                @else
                                    {{ asset('/storage/profile_pic/'.auth()->user()->user_photo_path) }}
                                @endif
                                    
                                " alt=""/>
                                <span>
                                    {{ auth()->user()->first_name }}
                                </span>
                            </a>
                            </li>
                            <li class="more">
                                <div class="dropdown">
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Setting</a></li><hr>
                                        <li><a class="dropdown-item" href="#">Saved</a></li><hr>
                                        <li><a class="dropdown-item" href="#">Switch appearance</a></li><hr>
                                        <li><a class="dropdown-item" href="#">Your Activity</a></li><hr>
                                        <li><a class="dropdown-item" href="#">Report a problem</a></li><hr>
                                        <li><a class="dropdown-item" href="#">Switch accounts</a></li><hr>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                                    </ul>
                                    <i class="fa fa-bars fa-x2" aria-hidden="true"></i>
                                    <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">More</a>
                                </div>
                            </li>
                        </ul>
                    </header>

                </div>
                {{-- left side end --}}
            </div>

            {{-- ========= create box ======== --}}
            <div class="creation">
                <div class="create-box chooseImage">
                    <ul class="list-unstyled">
                        <li>Create new post</li>
                        <hr>
                        <div class="list">
                            <li><span class="material-icons">
                                photo_library
                                </span>
                                </li>
                            <li>Drag photos and videos here</li>
                            <li>
                                <form action="/home" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="file">
                                        <input name="image[]" type="file" id="img_post" onchange="fileUpload(event)" multiple accept="*">
                                        <label for="file" class="btn btn-primary" id="labelFile">Select from computer</label>
                                    </div>
                            </li>
                        </div>
                    </ul>
                </div>
                {{-- crop --}}
                {{-- <div class="create-box crop" id="cropBox">
                    <div class="data">
                        <div class="row">
                            <div class="col-sm"><i class="fa fa-backward cropBack back"></i></div>
                            <div class="col-sm"><p>Crop</p></div>
                            <div class="col-sm"><i class="fa fa-forward cropNext next"></i></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            {{--<div class="imgBx">
                                <img id="imgCrop" alt="">
                                <input type="hidden" class="cropped" name="cropped">
                            </div>--
                            <div class="gallery">
                                <div class="container">
                                  <div class="img-container">
                                    <img src="{{asset('lap.png')}}" alt="">
                                    <div class="img-prev text-center">
                                      <div class="img-slide">
                                        <img src="" onclick="changeImgBox()" alt="" class="active" id="imgCrop">
                                      </div>
                                      <div class="img-slide">
                                        <img src="{{asset('lap.png')}}" onclick="changeImgBox()" alt="" class="active">
                                      </div>
                                      <div class="img-slide">
                                        <img src="{{asset('lap.png')}}" onclick="changeImgBox()" alt="" class="active">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <input type="hidden" class="cropped" name="cropped">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <p id="cropBtn" class="btn btn-primary">Crop</p>
                        </div>
                    </div>
                </div> --}}
                {{-- edit --}}
                <div class="create-box edit">
                    <div class="data">
                        <div class="row">
                            <div class="col-sm"><i class="fa fa-backward editBack back"></i></div>
                            <div class="col-sm"><p>Edit</p></div>
                            <div class="col-sm"><i class="fa fa-forward editNext next"></i></div>
                        </div>
                    </div>
                    <hr>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="imgBx">
                                    <img src="" id="editImg" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <div class="text-center"><p>Filters</p></div>
                                    <hr>
                                    <div class="filters">
                                        <img src="{{asset('lap.png')}}" alt="">
                                        <p>filter</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- share --}}
                <div class="create-box share">
                    <div class="data">
                        <div class="row">
                            <div class="col-sm"><i class="fa fa-backward shareBack back"></i></p></div>
                            <div class="col-sm"><p>Create new post</p></div>
                            <div class="col-sm shareParent"><input type="submit" value="Share"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-7">
                                {{-- <div class="imgBx">
                                    <img src="" id="shareImg" alt="">
                                </div> --}}
                                <div class="gallery">
                                    <div class="container">
                                      <div class="img-container">
                                        <img class="choosen-img" alt="">
                                        <div class="img-prev text-center">
                                            {{-- javaScript --}}
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="info">
                                    <textarea name="content" id="desc" cols="30" rows="9" id="contentText" maxlength="200" placeholder="Write a caption"></textarea>
                                    <p id="counter"></p>
                                    <hr>
                                    <input type="text" placeholder="Add location" style="display:block">
                                    <label>Tag:</label> <select name="tag" class="form-control" id="select_post">
                                        @foreach ($users as $user)
                                        <option value="1">{{ $user->nick_name }}</option>
                                        @endforeach
                                    </select>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <i class="fa fa-close cancel"></i>
            </div>

        </form>

            @yield('content')

            @if (!Route::is('home.explore'))
            <div class="col-lg-4">
                {{-- right side strat --}}
                <div class="right-side d-lg-block d-sm-none">

                    <div class="owner">{{--start owner--}}
                        <div class="story">
                            <div class="imgBx">
                                <img src="
                                @if (auth()->user()->user_photo_path == null)
                                {{ asset('default.jpg') }}
                                    
                                @else
                                {{ asset('/storage/profile_pic/'.auth()->user()->user_photo_path) }}
                                    
                                @endif" alt="">
                            </div>
                        </div>

                        <div class="title">
                            <a href="/profile/{{auth()->user()->id}}">{{ auth()->user()->first_name." ".auth()->user()->last_name }}</a>
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
                                            <img src="
                                            @if (auth()->user()->user_photo_path == 1)
                                            {{ asset('default.jpg') }}
                                            @else
                                            
                                            {{ asset('/storage/profile_pic/'.auth()->user()->user_photo_path) }}
                                            @endif

                                        "></div>
                                    </div>

                                    <div class="title">
                                        <a href="/profile/{{ auth()->user()->id }}">{{ auth()->user()->first_name}}." ".{{ auth()->user()->last_name }}</a>
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
            @endif
            
        </div>
    </div>

    @include('posts.search_offcanvas')

    @include('posts.notif_offcanvas')

    <script src="{{asset('/js/app-and-index.js')}}"></script>
    <script src="{{asset('/js/jquery-3.6.0.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>



