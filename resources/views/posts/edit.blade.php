@extends('layouts.app')

@section('title') Instagram @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content')

            <div class="col-lg-5">
                <div class="home">

                    <div class="inside-home">
                       
    
                       
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
                                                        <img src="{{$media}}" alt="" id="imgPost">
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
                          

                            <div class="add-comment container">
                                <form method="POST" action="{{route('posts.update', $post->id)}}">
                                    @csrf
                                    @method('put')
                                    {{-- <p>{{ $post->caption }}</p> --}}
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input name="caption" style="width: 80%; display:block" type="text" value="{{ $post->caption }}">
                                    <label>Tag:</label> <select name="select_post" class="form-control" id="select_post">
                                        @foreach ($users as $user)
                                        <option value="1">{{ $user->nick_name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input name="caption" style="width: 80%" type="text" value="{{ $post->caption }}"> --}}
                                    <input type="submit" style="width: 15%" value="Done" class="btn" >

                                </form>
                                
                            </div> 

                           

                         
                        

                        </div> {{--end posts--}}
                      
                       

                     
                        

                        

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

