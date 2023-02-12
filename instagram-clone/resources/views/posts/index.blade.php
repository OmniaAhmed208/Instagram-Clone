@extends('layouts.app')

@section('title') Home @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content')

            <div class="col-lg-4">
                <div class="home">

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

                </div>
            </div>

@endsection
