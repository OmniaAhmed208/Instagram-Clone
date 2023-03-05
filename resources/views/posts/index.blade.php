@extends('layouts.app')

@section('title') Instagram @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content')

            <div class="col-lg-5">
                <div class="home">

                    <div class="inside-home">

                        {{-- @foreach($users as $user)
                        @php
                            if (!empty(DB::table('media')->where('user_id', $user->id)->first())) {
                                $fileStory = DB::table('media')->where('user_id', $user->id)->first();
                                $filesStories = explode('|', $fileStory->content_path);
                            }
                        @endphp
                        @endforeach --}}
{{-- 
                        <div class="allStories">
                            @foreach($allMedia as $index=>$story)
                            <a  href="/stories/{{$story['user_id']}}"> --}}
                                {{--start story--}}
                                {{-- <div class="stories"> 
                                    <div class="story">
                                        @foreach($users as $user)
                                            <div class="box">
                                                @if($user->id == $story->user_id)
                                                    <div class="imgBx">
                                                        <img  src="{{URL::to( $filesStories[0])}}" alt="">
                                                    </div>
                                                @else
                                                    <div class="imgBx">
                                                        <img src="{{asset('lap.png')}}" alt="">
                                                    </div>
                                                @endif
                                            </div>

                                            @if($user->id == $story->user_id)
                                                <div class="title">{{$user->first_name}}</div>
                                            @else
                                                <div class="title">ahmed</div>
                                            @endif
                                        @endforeach
                                    </div>
                                    
                                </div>
                            </a>
                            @endforeach
                        </div> --}}

                        @foreach ($posts as $post)
                        <div class="posts"> {{--start posts--}}

                            <div class="post container"> {{--start title of posts--}}
                                <div class="story" id="postStory">
                                    <div class="imgBx">
                                        <img src="{{asset('lap.png')}}" alt="">
                                    </div>
                                </div>
                                {{-- <div class="title">name-of-page <span>.1h</span></div> --}}
                                {{-- @foreach($users as $user) --}}
                                <div class="title">
                                    {{$post->user->nick_name}}
                                    {{-- @if ($post->post_creator_id == $user->id) {{$user->nick_name}} @endif --}}
                                    <span>.1h</span>
                                </div>
                                {{-- @endforeach --}}

                                <div class="info" id="points">...</div>

                                <div class="infoPerson" id="hover"> {{--when hover on person--}}

                                    <div class="person">{{--start owner--}}
                                        <div class="story">
                                            <div class="imgBx">
                                                <img src="{{asset('lap.png')}}" alt="">
                                            </div>
                                        </div>

                                        <div class="title">
                                            <a href="/profile/{{ auth()->user()->id }}">Nikename-of-owner-page</a>
                                            <p>{{auth()->user()->first_name." ".auth()->user()->last_name}}</p>
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
                                            {{-- @dd($media) --}}
                                                @if (substr(strrchr($media,'.'),1) == 'mp4')
                                                    <div class="slide" data-index={{$index}} data-post-id="{{$post->id}}">
                                                        <video controls autoplay muted playsinline loop style="width:100%;height:100%" poster="http://placehold.it/350x350">
                                                            <source src="{{URL::to($media)}}" type="video/mp4">
                                                            <source src="{{URL::to($media)}}"  type="video/ogg">
                                                            Your device does not support HTML5 video.
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
                                <div style="display:flex; justify-content: space-between">
                                    <div class="col-11">
                                        <a href="{{route('posts.like', $post->id)}}" style="padding: 5px 5px 5px"><img class="red" style="width:8%" src="img\heart.png" alt=""></a>
                                        <a href="#" style="padding: 5px 5px 5px"><img style="width:8%" src="img\comment.png" alt=""></a>
                                        <a href="#" style="padding: 5px 5px 5px"><img style="width:8%" src="img\send.png" alt=""></a>
                                        {{-- eyeicon.classList.replace("bx-hide" , "bx-show");  --}}
                                    </div>
                                    <a class="col-1" href="{{route('posts.save', $post->id)}}"><img style="width:90%" src="img\save-instagram.png" alt=""></a>

                                    
                                </div>
                            </div>

                            <div class="num-likes container"><a href="">{{ $post->likes_counts_settings }} likes</a></div>

                            <div class="post-content container">
                                {{-- <div class="title">name-of-page</div> --}}
                                {{-- @if ($post->post_creator_id == $user->id) --}}
                                    <div class="title">{{$post->user->nick_name}}</div>
                                {{-- @endif --}}
                                {{-- <p>content of post will write here</p> --}}
                                <p>{{$post->caption}}</p>
                                
                            </div>

                            <div>
                            
                                @forEach ($comments as $comment)
                                
                                @if ($comment->post_id == $post->id)
                                    <div class="post-content container">
                                        <div class="title">{{ $comment->user->first_name }}</div>
                                        <p>{{ $comment->comment_content }}</p>
                                    </div>
                                @endif
                                @endforeach

                               
                            </div>

                            <div class="add-comment container">
                                <form method="POST" action="{{ route('comments.store', 1) }}">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input name="comment" style="width: 80%" type="text" placeholder="Add a comment...">
                                    <input type="submit" style="width: 15%" value="post" class="btn">
                                    

                                </form>
                                
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
                                    <li><a href="{{route('posts.edit', $post->id)}}" > Edit</a></li>
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
                var like = document.getElementsByClassName("red");
                console.log(like)
            </script>
            <script>
                // slider ===============
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

                //  video ==============

                window.addEventListener('load', videoScroll);
                window.addEventListener('scroll', videoScroll);

                function videoScroll() {

                if ( document.querySelectorAll('video[autoplay]').length > 0) {
                    var windowHeight = window.innerHeight,
                        videoEl = document.querySelectorAll('video[autoplay]');

                    for (var i = 0; i < videoEl.length; i++) {

                    var thisVideoEl = videoEl[i],
                        videoHeight = thisVideoEl.clientHeight,
                        videoClientRect = thisVideoEl.getBoundingClientRect().top;

                    if ( videoClientRect <= ( (windowHeight) - (videoHeight*.5) ) && videoClientRect >= ( 0 - ( videoHeight*.5 ) ) ) {
                        thisVideoEl.play();
                    } else {
                        thisVideoEl.pause();
                    }

                    }
                }

}
            </script>

@endsection
