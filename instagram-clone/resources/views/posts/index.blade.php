@extends('layouts.app')

@section('title') Instagram @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content')

            <div class="col-lg-5">
                <div class="home">

                    <div class="inside-home">
                        <div class="stories"> {{--start story--}}
                            <div class="story">
                                <div class="box">
                                    <div class="imgBx">
                                        <img src="{{asset('lap.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="title">
                                    sssssssss
                                </div>
                            </div>
                        </div> {{--end story--}}
    
                        @foreach ($posts as $post)
                        <div class="posts"> {{--start posts--}}

                            <div class="post container"> {{--start title of posts--}}
                                <div class="story" id="postStory">
                                    <div class="imgBx">
                                        <img src="{{asset('lap.png')}}" alt="">
                                    </div>
                                </div>
                                {{-- <div class="title">name-of-page <span>.1h</span></div> --}}
                                @foreach($users as $user)
                                <div class="title">
                                    @if ($post->post_creator_id == $user->id) {{$user->nick_name}} @endif
                                    <span>.1h</span>
                                </div>
                                @endforeach

                                <div class="info" id="points">...</div>

                                <div class="infoPerson" id="hover"> {{--when hover on person--}}

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
                                                    <div class="col sm">
                                                        <div class="stats">
                                                            <p>25.500</p>
                                                            <span>Posts</span>
                                                          </div>
                                                    </div>
                                                    <div class="col sm">
                                                        <div class="stats">
                                                            <p>25.500</p>
                                                            <span>Followers</span>
                                                        </div>
                                                    </div>
                                                    <div class="col sm">
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
                                                <div class="row">
                                                    <div class="col sm">
                                                        <input type="button" class="btn btn-primary" value="Message">
                                                        <input type="button" class="btn btn-primary" value="Following">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> {{--info2 end--}}
                                </div>
                            </div> {{--end title of posts--}}


                            <div class="slider" data-post-id={{$post->id}}>
                                <div class="container">
                                    <div class="slide-wrapper">
                                        <div id="slide-role">

                                            @php
                                            $file = DB::table('posts')->where('id', $post->id)->first();
                                            $files = explode('|', $file->content_path);
                                            // @dd($files);
                                           @endphp

                                            @foreach ($files as $index => $media)
                                                @if (substr(strrchr($media,'.'),1) == 'mp4')
                                                    <div class="slide" data-index={{$index}} data-post-id="{{$post->id}}">
                                                        <video controls autoplay muted playsinline loop style="width:100%;height:100%">
                                                            <source src="{{URL::to($media)}}" type="video/mp4">
                                                        </video>
                                                    </div>    
                                                @else
                                                    <div class="slide" data-index={{$index}} data-post-id="{{$post->id}}">
                                                        <img src="{{URL::to($media)}}" alt="" id="imgPost">
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="bullets">
                                        @foreach ($files as $index => $media)
                                         <span>
                                            <input @if ($index == 0) checked @endif onclick="changeImg({{$index}})" type="radio" name="slider" class="trigger">
                                        </span>
                                        @endforeach
                                    </div>

                                </div>
                            </div>

                            <div class="actions container">
                                <ul class="list-unstyled">
                                    <li class="like"></li>
                                    <li class="comment"></li>
                                    <li class="share"></li>
                                    <li class="save"></li>
                                </ul>
                            </div>

                            <div class="num-likes container">11 likes</div>

                            <div class="post-content container">
                                {{-- <div class="title">name-of-page</div> --}}
                                @if ($post->post_creator_id == $user->id)
                                    <div class="title">{{$user->nick_name}}</div>
                                @endif
                                {{-- <p>content of post will write here</p> --}}
                                <p>{{$post->caption}}</p>
                            </div>

                            <div class="add-comment container">
                                <input type="text" placeholder="Add a comment...">
                                <div class="post-content">
                                    <div class="title">user</div>
                                    <p>content of post will write here</p>
                                </div>
    
                                <div class="add-comment">
                                    <form method="POST" action="{{ route('comments.store', 1) }}">
                                        @csrf
                                        <input class="col-10 " type="text" name="comment" placeholder="Add a comment...">
                                        <input type="submit" value="post" class="btn">
                                    </form>
                                </div>
                            </div>    
                            <hr>

                        </div> {{--end posts--}}

                        @endforeach

                        {{-- when click on 3 points ... --}}
                        <div class="fixedActions">
                            <div class="actionPoints">
                                <ul class="list-unstyled">
                                    <li class="red">Report</li>
                                    <hr>
                                    <li class="red">unfollow</li>
                                    <hr>
                                    <li>Add to favorite</li>
                                    <hr>
                                    <li>Go to post</li>
                                    <hr>
                                    <li>Share to...</li>
                                    <hr>
                                    <li>Copy link</li>
                                    <hr>
                                    <li>Embed</li>
                                    <hr>
                                    <li>About this account</li>
                                    <hr>
                                    <li id="cancel">Cancel</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>{{--end home--}}
            </div>

            <script>
                var fixedAction = document.querySelector('.fixedActions');
                var points = document.getElementById('points');
                var cancel = document.getElementById('cancel');

                points.onclick = function(){
                    fixedAction.style.display = "block";
                }
                cancel.onclick = function(){
                    fixedAction.style.display = "none";
                }
            </script>

            <script>
                var slide = document.querySelectorAll('.slide');
                var sliderParent = document.querySelectorAll('.slider');

                function changeImg(n){
                    removeActive();
                    slide.forEach(element => {
                        if( element.getAttribute('data-index') != n ){element.classList.add('active');}
                    });

                }

                function removeActive(){
                    slide.forEach(element => {
                            element.classList.remove('active');
                    });
                }
            </script>

@endsection
