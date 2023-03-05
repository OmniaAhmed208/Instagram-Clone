@extends('layouts.app')

@section('title') Reels @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content')

<div class="col-lg-5 col-md-9 col-sm-12">
	<section class="reels-body min-vh-100 px-5">
		<div class="container p-3 min-vh-100">
			@foreach ($posts as $post)
			@if ($post->content_path && $post->post_creator_id == $post->user->id)
			@php
				$file = DB::table('posts')->where('id', $post->id)->first();
				$files = explode('|', $file->content_path);
				// dd($posts);
			@endphp
			@foreach ($files as $index => $media)
				@if (substr(strrchr($media,'.'),1) == 'mp4')
				<div class="reel-element mb-3" style="
					background: linear-gradient(rgba(30, 30, 30, 0.2), transparent, rgba(30, 30, 30, 0.2));
					background-image:
					/* radial-gradient(circle, rgba(255, 255, 255, 0.7) 30%, rgba(255, 255, 255, 1) 50%), */
					/* url('{{ asset('Thumbnails/CUKe.gif') }}'); */
					background-size: cover;
					background-repeat: no-repeat;
					background-position: center center">
					<div class="row m-lg-1 d-flex justify-content-evenly bg-light bg-opacity-10">
						<!-- {{-- reels main body start --}} -->
						<div class="col-9 rounded-2 d-flex flex-wrap px-0 position-relative">
							<!-- {{-- reels video start --}} -->
							<div class="video-wrap z-n2  rounded-2 h-100 w-100 position-absolute" style="cursor: pointer;" onclick="playPauseVid('#video{{ $post->id }}', '#videoIcon{{ $post->id }}')">  <!--  -->
								<video src="{{ $post->content_path }}" id="video{{ $post->id }}"
									class="video w-100 h-100 rounded-2" poster="" 
									autoplay loop > <!-- autoplay --> <!-- loading... as poster: asset('Thumbnails/CUKe.gif') -->
									Your browser does not support the video tag.
								</video>
								@php
									// dd($post->content_path);
								@endphp
							</div>
							<!-- {{-- reels video end --}} -->
							<!-- {{-- reels info start --}} -->
							<div class="row z-1 mb-auto mt-3 ms-auto text-center">
								<div class="icon-audio" style="cursor: pointer;" onclick="audioVid('#video{{ $post->id }}', '#audio{{ $post->id }}');">  <!--  -->
									<img class="audio_mute" id="audio{{ $post->id }}" src="{{ asset('Icons/mute.png') }}" alt="Audio is muted"
									data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Audio is muted"
									/>
								</div>
							</div>
							<div class="row z-1 mb-auto mt-3 ms-auto text-center">
								<div class="icon-play" style="display:none;" id="videoIcon{{ $post->id }}" onclick="playPauseVid('#video{{ $post->id }}', '#videoIcon{{ $post->id }}');">  <!--  -->
									<img src="{{ asset('Icons/play.png') }}" alt="Video play icon"/>
								</div>
							</div>
							<div class="row z-1 mt-auto mb-3 mx-0 ps-0 text-start">
								<div class="col d-flex ">
									<div class="video_info" id="videContent">
										<div class="row px-1 justify-content-between">
											<div class="col-2 rounded-circle">
												{{-- <img src="{{ asset($reel->post->user->user_photo_path) }}" alt="User profile link"> --}}
												<div class="story">
													<div class="imgBx">
														<img src="{{ asset($post->user->user_photo_path) }}" alt="User photo">
													</div>
												</div>
											</div>
											<div class="col-10 ps-3 my-auto">
												<div id="reels_user" class="fw-bold">
													{{ $post->user->nick_name }} &sdot;
													<span class=" btn m-0 p-0 text-decoration-none fw-bold text-white">
														Follow
													</span>
												</div>
											</div>
											<div class="col-12 d-flex">
												<div class="reels_content text-wrap">
													<span class="collapse scroll-section" id="collapseWithScrollbar{{ $post->id }}">{{ $post->caption }}</span>
													<span class="btn m-0 p-0 text-decoration-none fw-bold text-white" type="button" 
														data-bs-toggle="collapse" data-bs-target="#collapseWithScrollbar{{ $post->id }}" 
														aria-expanded="false" aria-controls="collapseWithScrollbar{{ $post->id }}"
													>... &#8679;/&#8681;</span>  <!--  -->
												</div>
											</div>
											<div class="col-12 d-flex">
												<div class="reels_music text-wrap">
													<img src="{{ asset('Icons/musical-notes.png') }}" />
													{{ $post->user->nick_name }} &sdot; Original audio
												</div>
												<div class="reels_tagged ps-1">
													<img src="{{ asset('Icons/user-16.png') }}" />
													<span>
														Tagged users
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- {{-- reels info end --}} -->
						</div>
						<!-- {{-- reels main body end --}} -->
						<!-- {{-- reels right bar start --}} -->
						<div class="reels_right_bar col-1 d-flex flex-wrap justify-content-center text-center text-dark" style="height: 680px;">
							<div class="row mb-auto mt-3">
								<li class="list-group-item">
									<i><img src="{{ asset('Icons/compact-camera.png') }}" /></i>  <!-- {{-- Camera icon for mobil app --}} -->
								</li>
							</div>
							<div class="row mt-auto align-content-center">
								<ul>
									<li class="list-group-item">
										<i><img src="{{ asset('Icons/heart.png') }}" /></i>
										@if ($likesCount > 999 && $likesCount < 999999)
										<strong class="cursor-pointer" data-bs-target="#likeModalToggle" data-bs-toggle="modal">{{ $likesCount/1000 }}K</strong>
										@elseif ($likesCount > 999999)
										<strong class="cursor-pointer" data-bs-target="#likeModalToggle" data-bs-toggle="modal">{{ $likesCount/1000000 }}M</strong>
										@else
											<strong class="cursor-pointer" data-bs-target="#likeModalToggle" data-bs-toggle="modal">{{ $likesCount }}</strong>
										@endif
									</li>
									<li class="list-group-item cursor-pointer" data-bs-target="#commentModalToggle" data-bs-toggle="modal">
										<i><img src="{{ asset('Icons/comments.png') }}" /></i>
										@if ($commentsCount > 999 && $commentsCount < 999999)
										<strong>{{ $commentsCount/1000 }}K</strong>
										@elseif ($commentsCount > 999999)
										<strong>{{ $commentsCount/1000000 }}M</strong>
										@else
											<strong>{{ $commentsCount }}</strong>
										@endif
									</li>
									<li class="list-group-item">
										<i><img src="{{ asset('Icons/send.png') }}" /></i>
									</li>
									<li class="list-group-item">
										<i><img src="{{ asset('Icons/ellipsis.png') }}" /></i>
									</li>
									<li class="list-group-item">
										<i><img src="{{ asset('Icons/bookmark.png') }}" /></i>
									</li>
									<li class="list-group-item rounded-4"
										{{-- <img src="{{ asset($reel->post->user->user_photo_path) }}" alt="Aaudio source"> --}}
											style="
											background-image: url('{{ asset($post->user->user_photo_path) }}');
											background-size: cover;
											background-repeat: no-repeat;
											background-position: center center;
											background-color: #00000020;
											height: 50px;
											width: 50px;">
									</li>
								</ul>
							</div>
						</div>
						<!-- {{-- reels right bar end --}} -->
					</div>
				</div>
				@endif
			@endforeach
			@endif
			@endforeach
		</div>    
	</section>
</div>







<script>
	var vidMuted = document.querySelectorAll('.video');
	muteVid();
	// playPauseVid();

    function muteVid(){
        vidMuted.muted = true;
    }

	function playPauseVid(video, videoIcon){ 
	  var vid = document.querySelector(video);
	  var playIcon = document.querySelector(videoIcon);

		if(vid.paused){
			vid.play();
			playIcon.style = "display:none;";
		}else{
			vid.pause();
			playIcon.style = "display:block; cursor: pointer;";
		}
    }

    function audioVid(video,audio){   
	  var vid = document.querySelector(video);
	  var audioMute = document.querySelector(audio);

		if(vid.muted == true){
			vid.muted = false;
			audioMute.src = "{{ asset('Icons/audio.png') }}";
			audioMute.alt = "Audio is playing";
		}else{
			vid.muted = true;
			audioMute.src = "{{ asset('Icons/mute.png') }}";
			audioMute.alt = "Audio is muted";
		}
    }

	// === Video Scroll Autoplay === //
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


<!-- Modal of users who reacted (like) to the post start -->
<div class="modal fade" id="likeModalToggle" aria-hidden="true" aria-labelledby="likeModalToggleLabel" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h5 class="modal-title w-100">Likes</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				{{--user-container row start --}}
				@foreach ($posts as $post)
					@foreach ($post->postInteractions as $react)
						@if ($react->like == 1)
							<div class="user-container">
								<div class="row">
									<div class="col-lg-2 align-self-start">
										<div class=" story">
											<div class="imgBx">
												<img src="{{ asset($post->user->user_photo_path) }}" alt="User photo">
											</div>
										</div>
									</div>
									<div class="col-lg-7 align-self-start">
										<div class="title-info">
											<div class="info">
												<p class="mb-0">
													<strong class="h5 text-black">{{ $post->user->nick_name }}</strong>
													<img src="{{asset('Icons/verified.png')}}" />
												</p>
												<p class="text-black-50">{{ $post->user->bio }}</p>
											</div>
										</div>
									</div>
									<div class="col-lg-3 align-self-end align-self-center">
										<button class="btn btn-primary text-white px-4">Follow</button>
									</div>
								</div>
							</div>
						{{-- @else
							<strong class="h5 text-black">Be the first to like this post.</strong> --}}
						@endif
					@endforeach
				@endforeach
				{{--user-container row end --}}
			</div>
		</div>
	</div>
</div>
<!-- Modal of users who reacted (like) to the post end -->

<!-- Modal of users who comment on the post start -->
<div class="modal fade" id="commentModalToggle" aria-hidden="true" aria-labelledby="commentModalToggleLabel" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h5 class="modal-title w-100">Comments</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				{{--comments-container row start --}}
				@foreach ($posts as $post)
				@forEach ($comments as $comment)
					@if ($comment->post_id == $post->id)
						<div class="user-container">
							<div class="row">
								<div class="col-lg-2 align-self-start">
									<div class=" story">
										<div class="imgBx">
											<img src="{{ asset($comment->user->user_photo_path) }}" alt="User photo">
										</div>
									</div>
								</div>
								<div class="col-lg-7 align-self-start">
									<div class="title-info">
										<div class="info">
											<p class="mb-0">
												<strong class="h5 text-black">{{ $comment->user->nick_name }}</strong>
												<img src="{{asset('Icons/verified.png')}}" />
											</p>
											<p class="text-black-50">{{ $comment->comment_content }}</p>
										</div>
									</div>
								</div>
								<div class="col-lg-3 align-self-end align-self-center">
									<button class="btn btn-primary text-white px-4">Follow</button>
								</div>
							</div>
						</div>
					@endif	
				@endforeach
				@endforeach
				{{--comments-container row end --}}
			</div>
			{{-- add comment start --}}
			<div class="modal-footer">
				<form method="POST" action="{{ route('comments.storeForReels', 1) }}">
					@csrf
					{{-- @foreach ($users as $user) --}}
						{{-- @if ($user->id == $user_to_write_comment) --}}
						{{-- @if ($user->id == 2) --}}
							{{-- <div class="row justify-items-center d-flex">
								<div class="col-lg-2 align-self-start">
									<div class=" story">
										<div class="imgBx">
											<img src="{{ asset($user->user_photo_path) }}" alt="User photo">
										</div>
									</div>
								</div> --}}
								<div class="form-control row d-flex justify-content-between">
									<input name="comment flex-fill" style="width: 80%" type="text" placeholder="Add a comment...">
									<input type="submit flex-fill" style="width: 20%" value="post" class="btn">
								</div>
							</div>
						{{-- @endif
					@endforeach --}}
				</form>
			</div>
			{{-- add comment end --}}
		</div>
	</div>
</div>
<!-- Modal of users who comment on the post end -->