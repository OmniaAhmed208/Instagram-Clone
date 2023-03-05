@extends('layouts.app')

@section('title') Reels @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content')

<div class="col-lg-5 col-md-9 col-sm-12">
	<section class="reels-body min-vh-100 px-5">
		<div class="container p-3 min-vh-100">
			@foreach ($posts as $post)
			@if ($post->content_path)
			@foreach ($users as $user)
			@php
				$file = DB::table('posts')->where('id', $post->id)->first();
				$files = explode('|', $file->content_path);
				// dd($post->id);
			@endphp
			@foreach ($files as $index => $media)
				@if (substr(strrchr($media,'.'),1) == 'mp4' && $post->post_creator_id == $user->id)
				<div class="reel-element mb-3" style="
					background: linear-gradient(rgba(30, 30, 30, 0.2), transparent, rgba(30, 30, 30, 0.2));
					background-image:
					/* radial-gradient(circle, rgba(255, 255, 255, 0.7) 30%, rgba(255, 255, 255, 1) 50%), */
					/* url('{{ asset('Thumbnails/2Bap.gif') }}'); */
					background-size: cover;
					background-repeat: no-repeat;
					background-position: center center">
					<div class="row m-lg-1 d-flex justify-content-evenly bg-light bg-opacity-10">
						<!-- {{-- reels main body start --}} -->
						<div class="col-9 rounded-2 d-flex flex-wrap px-0 position-relative">
							<!-- {{-- reels video start --}} -->
							<div class="video-wrap z-n2  rounded-2 h-100 w-100 position-absolute" style="cursor: pointer;" onclick="playPauseVid('#video{{ $post->id }}', '#videoIcon{{ $post->id }}')">  <!--  -->
								<video src="{{ URL::to($media) }}" id="video{{ $post->id }}"
									class="w-100 h-100 rounded-2 video" poster="" 
									autoplay loop > <!-- autoplay --> <!-- loading... as poster: asset('Thumbnails/2Bap.gif') -->
									Your browser does not support the video tag.
								</video>
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
														<img src="{{ asset($user->user_photo_path) }}" alt="User photo">
													</div>
												</div>
											</div>
											<div class="col-10 ps-3 my-auto">
												<div id="reels_user" class="fw-bold">
													{{ $user->nick_name }} &sdot;
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
													{{ $user->nick_name }} &sdot; Original audio
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
										<!-- {{-- @if (> 999 & < 999999)
											<span>203k</span>
										@elseif (> 999999)
											<span>203m</span>
										@else --}} -->
											<span>203</span>
										<!-- {{-- @endif --}} -->
									</li>
									<li class="list-group-item">
										<i><img src="{{ asset('Icons/comments.png') }}" /></i>
										<span>531</span>
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
											background-image: url('{{ asset($user->user_photo_path) }}');
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