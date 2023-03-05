<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.css"/>
    
    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css">

        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}

    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"/>

   

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.css"/>
    
    <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css">
    <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    
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
                  <li class="profile"><img
                      src="@auth
                      @if (auth()->user()->user_photo_path == null)
                          {{ asset('default.jpg')}}
                      @else
                          {{ asset('/storage/profile_pic/'.auth()->user()->user_photo_path) }}
                      @endif
                          
                      @endauth" alt=""/><a href="/profile/{{ auth()->user()->id }}">
                      <span>
                          @auth
                          {{ auth()->user()->first_name }}
                        @endauth
                      </span></a></li>
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
          <div>
            <a><img style=" object-fit: fill;overflow: hidden" 
              class="rounded-circle" width="170" height="170"
              
              @if (auth()->user()->id == $user->id)
                role="button"
                 data-bs-toggle="modal" data-bs-target="#changeProfileModal" 
              @endif
              src="{{ $user->profileImage() }}">
            </a>
          </div>
        </div>
        
        <div class="col-7 py-4">
                    <div class="row">
                    <div class="fs-4 me-4 col-lg-5 col-sm-12">

                      @auth
                      @if (auth()->user()->id == $user->id)
                        {{ auth()->user()->first_name ." ". auth()->user()->last_name }}
                      @else
                        {{$user->first_name." ".$user->last_name}}  
                      @endif
                      @endauth

                    </div>

                    @if (auth()->user()->id == $user->id)
                        <button class="btn btn-light col-lg-4 col-8 fw-semibold" 
                        data-bs-toggle="modal" data-bs-target="#updateModal">Edit Profile</button>   
                    @else
                        <button class="btn btn-primary opacity-75 col-lg-4 col-8 fw-semibold">Follow</button>
   
                    @endif

                    @if (auth()->user()->id == $user->id)
                        <button data-bs-toggle="modal" data-bs-target="#settingsModal" class="col-lg-2 col-4 border-0 bg-transparent fs-3 text-dark">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </button>
                    @endif
                    
                    <div class="row mt-4">
                      <div class="col-lg-3 col-sm-2 col-12 pr-4 me-5 fw-light"><b><strong class="fw-bold">{{count($posts)}}</strong> posts</b></div>
                      <div class="col-lg-3 col-sm-2 col-12 pr-4 me-5 fw-light"><b><a href="#" class="text-dark text-decoration-none"><strong class="fw-bold ">82</strong> followers</a></b></div>
                      <div class="col-lg-3 col-sm-2 col-12 pr-4 fw-light"><b><a href="#" class="text-dark text-decoration-none"><strong class="fw-bold ">164</strong> following</a></b></div>

                    </div>
                    <div class="row">
                      <div class="col-12 pt-4 fw-bold">
                        @if (auth()->user()->id == $user->id)
                            {{ auth()->user()->email }}
                        @else
                            {{ $user->email }}   
                        @endif
                      </div>

                        @if (auth()->user()->bio != null)
                            <div class="col-12">{{auth()->user()->bio}}</div>
                        @endif

                        @if (auth()->user()->birth_year != null)
                            <div class="col-12">{{auth()->user()->birth_year}}</div>
                        @endif   
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row mt-5">
                <div style="width: 90%;" class="row mt-4 mx-auto">
    
                    <div class="col-2 text-center" style="object-fit: cover;overflow: hidden;">
                      <img style="width: 110px; height: 110px;"  class="img-thumbnail rounded-circle" role="button" src="{{asset('lap.png')}}">
                      <p style="font-size: small;" class="fw-semibold mt-3">studying</p>
              
                    </div>
                    
                    @if (auth()->user()->id == $user->id)
                    
                    <div class="col-2 text-center" style="object-fit: cover;overflow: hidden; ">
                      <img style="width: 110px; height: 110px;" class="img-thumbnail rounded-circle" role="button" src="{{ asset('plus.png') }}">
                      <p style="font-size: small;" class=" fw-semibold mt-3">New</p>
              
                    </div>
                    @endif
              
              </div>
            </div>
              
              <hr class="mt-4">
              
              <div class=" rounded row text-center">
                <div class="w-50 mx-auto">
                    <div style="font-size: 14px" class="row justify-content-evenly">
                
                        <div id="posts" class="col-4 fw-semibold text-dark" role="button" onclick="display()">
                            <i id="posts" class="fa fa-th"></i> POSTS
                        </div>
                
                        <div id="saved" class="col-4 fw-semibold text-secondary" role="button" onclick="display()">
                            <i id="saved" class="fa fa-bookmark-o" ></i> <a class="text-secondary" style="padding: 5px" href="{{ route('profile.saved') }}">SAVED</a> 
                        </div>
                
                        <div id="tagged" class="col-4 fw-semibold text-secondary" role="button" onclick="display()">
                            <i id="tagged" class="fa fa-user-circle" ></i> <a class="text-secondary" style="padding: 5px" href="{{ route('profile.tagged') }}">TAGGED</a>
                        </div>
                
                    </div>
                </div>

                <div class="row">

                    @foreach ($posts as $post)
                        <div class="col-4 my-4">
                            <img class="w-100 h-100 rounded" src="{{asset($post->content_path)}}">
                        </div>
                    @endforeach

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
  
  <!-- Modal -->
  <div class="modal fade" id="changeProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">
            Change Profile Picture
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data" action="{{route('profile.update',$user)}}">
            @csrf
            @method('PUT')
            <input name="user_photo_path" class="form-control" type="file">
            <div class="my-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary ">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="updateModalLabel">
            Edit Profile Info
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data" action="{{route('profile.update',$user)}}">
            @csrf
            @method('PUT')
            <input name="first_name" class="form-control my-3" type="text" value="{{ auth()->user()->first_name }}" placeholder="First name">
            <input name="last_name" class="form-control my-3" type="text" value="{{ auth()->user()->last_name }}" placeholder="Last name">
            <input name="email" class="form-control my-3" type="email" value="{{ auth()->user()->email }}" placeholder="Email">
            <input name="bio" class="form-control my-3" placeholder="Bio" type="text" 
            @if (auth()->user()->bio != null)
            value="{{auth()->user()->bio}}"
            @endif>
            <input name="birth_year" class="form-control my-3" placeholder="Birth Date" type="date"
            @if (auth()->user()->bio != null)
            value="{{auth()->user()->birth_year}}"
            @endif>



            <div class="my-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary ">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
            
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
            <script src="{{asset('/js/app-and-index.js')}}"></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
            <script type="text/javascript" async src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=MML_HTMLorMML"></script>
            <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>
        
</body>
</html>