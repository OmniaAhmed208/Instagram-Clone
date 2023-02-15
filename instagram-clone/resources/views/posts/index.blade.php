@extends('layouts.app')

@section('title') Home @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content')

            <div class="col-lg-7">
                <div class="home w-75 mx-auto">

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



            <div class="col-lg-3">
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


                            <div class="infoPerson"> {{--when hover on person--}}

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


@endsection
