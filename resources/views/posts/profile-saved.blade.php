<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.css"/>
    
    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css">

        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"/>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/side-bar.css')}}">

    <link rel="stylesheet" href="{{asset('/css/side-bar-media.css')}}">

    <link rel="stylesheet" href="{{asset('/css/explore_reels.css')}}">
    <link rel="stylesheet" href= @yield('css')>
</head>
<body>
    @yield('body')
    <div class="side-bar">
        <div class="row justify-content-between">
            <div class="col-lg-2">
                {{-- left side strat --}}
                <div class="left-side">

                    <header>
                        <a href="" class="logo"><img src="{{asset('/img/logo.png')}}" alt="" ></a>
                        <a href="" class="logo2"><img src="{{asset('/img/logo2.jpg')}}" alt="" ></a>

                        <ul class="list-unstyled">
                            <li><a href="/home"><i class="fas fa-home"></i> <span>Home</span></a></li>
                            <li><a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch"><i class="fas fa-search"></i> <span>Search</span></a></li>
                            <li><a href="/explore"><i class="fas fa-compass"></i> <span>Explore</span></a></li>
                            <li><a href="/reels"><i class="fas fa-compass"></i> <span>Reels</span></a></li>
                            <li><a href=""><i class="fa-brands fa-facebook-messenger"></i> <span>Messages</span></a></li>
                            <li><a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNotif" aria-controls="offcanvasNotif"><i class="fas fa-heart"></i> <span>Notifications</span></a></li>
                            <li class="create"><i class="fas fa-plus-square"></i> <span>Create</span></li>
                            <li class="profile"><img src="{{asset('lap.png')}}" alt=""/><a href="/profile">
                              <span>
                                @auth
                                  {{ auth()->user()->first_name }}
                                @endauth
                              </span>
                            </a></li>

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
                                        <input name="image[]" type="file" id="img_post" onchange="fileUpload(event)" multiple accept="image/*">
                                        <label for="file" class="btn btn-primary" id="labelFile">Select from computer</label>
                                    </div>
                            </li>
                        </div>
                    </ul>
                </div>
                {{-- crop --}}
                <div class="create-box crop" id="cropBox">
                    <div class="data">
                        <div class="row">
                            <div class="col-sm"><p class="cropBack">back</p></div>
                            <div class="col-sm"><p>Crop</p></div>
                            <div class="col-sm"><p class="cropNext">Next</p></div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <div class="imgBx">
                                <img id="imgCrop" alt="">
                                <input type="hidden" class="cropped" name="cropped">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <p id="cropBtn" class="btn btn-primary">Crop</p>
                        </div>
                    </div>
                </div>
                {{-- edit --}}
                <div class="create-box edit">
                    <div class="data">
                        <div class="row">
                            <div class="col-sm"><p class="editBack">back</p></div>
                            <div class="col-sm"><p>Edit</p></div>
                            <div class="col-sm"><p class="editNext">Next</p></div>
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
                                    <div class="row">
                                        <div class="col-sm text-center"><p>Filters</p></div>
                                        <div class="col-sm text-center"><p>Adjustments</p></div>
                                    </div>
                                    <hr>
                                    <div class="filters">
                                        <img src="{{asset('lap.png')}}" alt="">
                                        <p>filter</p>
                                    </div>
                                    {{-- <div class="Adjustments"></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- share --}}
                <div class="create-box share">
                    <div class="data">
                        <div class="row">
                            <div class="col-sm"><p class="shareBack">back</p></div>
                            <div class="col-sm"><p>Create new post</p></div>
                            <div class="col-sm"><input type="submit" value="Share"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="imgBx">
                                    <img src="" id="shareImg" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info">
                                    <textarea name="content" id="desc" cols="30" rows="7"></textarea>
                                    <hr>
                                    <input type="text" placeholder="Add location">
                                    <select name="select_post" class="form-control" id="select_post">
                                        <option value="1">omnia</option>
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







<div class="container mt-5 mx-auto w-75">
            
    <div class="row justify-content-evenly">
        
        <div class="col-5 text-center mt-3 my-auto">
          <div class="pt-3">
            <img style=" object-fit: fill;overflow: hidden" 
              class="rounded-circle " width="170" height="170" src="">
          </div>
        </div>
        
        <div class="col-7 py-4">
                    <div class="row">
                    <div class="fs-4 me-4 col-lg-5 col-sm-12">

                      @auth
                      {{ auth()->user()->first_name ." ". auth()->user()->last_name }}
                      @endauth

                    </div>
                    <button class="btn btn-light col-lg-4 col-8 fw-semibold">Edit Profile</button>
                    <button data-bs-toggle="modal" data-bs-target="#settingsModal" class="col-lg-2 col-4 border-0 bg-transparent fs-3 text-dark">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </button>
                    <div class="row mt-4">
                      <div class="col-lg-3 col-sm-2 col-12 pr-4 me-5 fw-light"><b><strong class="fw-bold">0</strong> posts</b></div>
                      <div class="col-lg-3 col-sm-2 col-12 pr-4 me-5 fw-light"><b><a href="#" class="text-dark text-decoration-none"><strong class="fw-bold ">0</strong> followers</a></b></div>
                      <div class="col-lg-3 col-sm-2 col-12 pr-4 fw-light"><b><a href="#" class="text-dark text-decoration-none"><strong class="fw-bold ">0</strong> following</a></b></div>

                    </div>
                    <div class="row">
                      <div class="col-12 pt-4 fw-bold">

                        @auth
                        {{ auth()->user()->email }}
                        @endauth

                      </div>

                      @auth
                      @if (auth()->user()->bio != null)
                      <div class="col-12">{{auth()->user()->bio}}</div>
                      @endif 
                      @endauth
                      

                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row mt-5">
                <div style="width: 90%;" class="row mt-4 mx-auto">
    
                    <div class="col-2 text-center" style="object-fit: cover;overflow: hidden;">
                      <img style="width: 110px; height: 110px;"  class="img-thumbnail rounded-circle" role="button" src="">
                      <p style="font-size: small;" class="fw-semibold mt-3">caption</p>
              
                    </div>
                    
                    <div class="col-2 text-center" style="object-fit: cover;overflow: hidden; ">
                      <img style="width: 110px; height: 110px;" class="img-thumbnail rounded-circle" role="button" src="assets/images/plus.png">
                      <p style="font-size: small;" class=" fw-semibold mt-3">New</p>
              
                    </div>
                    
              
              </div>
            </div>
              
              <hr class="mt-4">
              
              <div class=" rounded row text-center">
                <div class="w-50 mx-auto">
                    <div class="row justify-content-evenly">
                
                        <div id="posts" class="col-4 fw-semibold text-secondary" role="button" onclick="display()">
                            <i id="posts" class="fa fa-th"></i> <a class="text-secondary" style="padding: 5px" href="{{ route('profile.index') }}">POSTS</a>
                        </div>
                
                        <div id="saved" class="col-4 fw-semibold text-dark" role="button" onclick="display()">
                            <i id="saved" class="fa fa-bookmark-o" ></i> SAVED
                        </div>
                
                        <div id="tagged" class="col-4 fw-semibold text-secondary" role="button" onclick="display()">
                            <i id="tagged" class="fa fa-user-circle" ></i> <a class="text-secondary" style="padding: 5px" href="{{ route('profile.tagged') }}">TAGGED</a>
                        </div>
                
                    </div>
                </div>
                
                {{-- <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-4 my-4" style="">
                        <p>{{ $post->post->content_path }}</p>
                    </div>
                    @endforeach --}}
                    <div class="row">

                        @foreach ($posts as $post)
                            <div class="col-4 my-4">
                                <img class="w-100 h-100 rounded" src="{{asset($post->post->content_path)}}">
                            </div>
                        @endforeach
    
                    </div>
                    
                
                    
                </div>
            </div>
</div>
        </div>
    </div>


            <div class="modal" tabindex="-1"  id="settingsModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-body">
                      <ul class="list-group text-center border-0">
                          <li role="button" class="py-3 list-group-item list-group-item-action">Change password</li>
                          <li role="button" class="py-3 list-group-item list-group-item-action">QR Code</li>
                          <li role="button" class="py-3 list-group-item list-group-item-action">Apps and Websites</li>
                          <li role="button" class="py-3 list-group-item list-group-item-action">Notifications</li>
                          <li role="button" class="py-3 list-group-item list-group-item-action">Privacy and security</li>
                          <li role="button" class="py-3 list-group-item list-group-item-action">Supervision</li>
                          <li role="button" class="py-3 list-group-item list-group-item-action">Emails from Instagram</li>
                          <li role="button" class="py-3 list-group-item list-group-item-action">Report a problem</li>
                          <li role="button" class="py-3 list-group-item list-group-item-action"><a class="text-decoration-none text-dark" href="{{ route('logout') }}">Logout</a></li>
                          <li role="button" class="py-3 list-group-item list-group-item-action" data-bs-dismiss="modal" aria-label="Close">Cancel</li>
                        </ul>                    
                      </div>

                </div>
              </div>
            </div>
            
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
            <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=MML_HTMLorMML"></script>
            <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>
        
</body>
</html>