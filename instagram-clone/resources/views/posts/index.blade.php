@extends('layouts.app')

@section('title') Instagram @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content')

            <div class="col-lg-4">
                {{-- <div class="row">
                    <div class="col-lg-1">ee</div>
                    <div class="col-lg-4"> --}}
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
            
                                <div class="posts"> {{--start posts--}}
            
                                    <div class="post"> {{--start title of posts--}}
                                        <div class="story" id="postStory">
                                            <div class="imgBx">
                                                <img src="{{asset('lap.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="title">name-of-page <span>.1h</span></div>
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
            
                                    <div class="imgPost">
                                        <img src="{{asset('lap.png')}}" alt="">
                                    </div>
            
                                    <div class="actions">
                                        <ul class="list-unstyled">
                                            <li class="like"></li>
                                            <li class="comment"></li>
                                            <li class="share"></li>
                                            <li class="save"></li>
                                        </ul>
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
                    {{-- </div>
                    <div class="col-lg-1">ee</div>
                </div> --}}
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

@endsection