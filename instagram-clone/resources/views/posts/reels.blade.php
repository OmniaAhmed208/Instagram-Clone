@extends('layouts.app')

@section('title') Reels @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content')

<div class="col-lg-5 col-md-9 col-sm-12">
	<section class="reels-body min-vh-100 px-5">
		<div class="container p-3 min-vh-100">
			@foreach ($reels as $reel)
				<div class="reel-element mb-3" style="
					background-image:
					radial-gradient(circle, rgba(255, 255, 255, 0.7) 30%, rgba(255, 255, 255, 1) 50%),
					url('{{ asset($reel->thumbnail_path) }}');
					background-size: cover;
					background-repeat: no-repeat;
					background-position: center center">
					<div class="row m-lg-1 d-flex justify-content-evenly bg-light bg-opacity-10">
						<!-- {{-- reels main body start --}} -->
						<div class="col-9 rounded-2 d-flex flex-wrap px-0 position-relative">
							<!-- {{-- reels video start --}} -->
							<div class="z-n2  rounded-2 h-100 w-100 position-absolute" onclick="playPauseVid()" style="cursor: pointer;">
								<video src="{{ asset($reel->content_path) }}"
									class="w-100 h-100 rounded-2 video" poster="{{ asset($reel->thumbnail_path) }}"
									loop > <!-- autoplay -->
									Your browser does not support the video tag.
								</video>
							</div>
							<!-- {{-- reels video end --}} -->
							<!-- {{-- reels info start --}} -->
							<div class="row z-1 mb-auto mt-3 ms-auto text-center">
								<div class="icon-audio" onclick="audioVid();" style="cursor: pointer;">
									<img class="audio_mute" src="{{ asset('Icons/mute.png') }}" alt="Audio is muted"
									data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Audio is muted"
									/>
								</div>
							</div>
							<div class="row z-1 mb-auto mt-3 ms-auto text-center">
								<div class="icon-play" style="display:none;"  onclick="playPauseVid();">
									<img src="{{ asset('Icons/play.png') }}" alt="Video play icon"/>
								</div>
							</div>
							<div class="row z-1 mt-auto mb-3 mx-0 ps-3 text-start">
								<div class="col px-3 d-flex ">
									<div class="video_info" id="videContent">
										<div class="row px-1 justify-content-between">
											<div class="col-2 rounded-circle">
												{{-- <img src="{{ asset($reel->post->user->user_photo_path) }}" alt="User profile link"> --}}
												<div class="story">
													<div class="imgBx">
														<img src="{{ asset($reel->post->user->user_photo_path) }}" alt="">
													</div>
												</div>
											</div>
											<div class="col-10 ps-3">
												<div id="reels_user" class="fw-bold">
													{{ $reel->post->user->nick_name }} &sdot;
													<span class=" btn m-0 p-0 text-decoration-none fw-bold text-white">
														Follow
													</span>
												</div>
											</div>
											<div class="col-12 d-flex">
												<div class="reels_content text-wrap">
													<span class="collapse" id="collapseExample">{{ $reel->post->caption }}</span>
													<span class="btn m-0 p-0 text-decoration-none fw-bold text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">... &#8679;/&#8681;</span>
												</div>
											</div>
											<div class="col-12 d-flex">
												<div class="reels_music text-wrap">
													{{ $reel->post->user->nick_name }} &sdot; Original audio
												</div>
												<div class="reels_desc">
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
						<div class="reels_right_bar col-2 d-flex flex-wrap justify-content-center text-center text-dark" style="height: 680px;">
							<div class="row mb-auto mt-3">
								<i class="fa fa-camera"></i>  <!-- {{-- Camera icon for mobil app --}} -->
							</div>
							<div class="row mt-auto align-content-center">
								<ul>
									<li class="list-group-item">
										<i class="fa fa-heart-o"></i>
										<!-- {{-- @if (> 999 & < 999999)
											<span>203k</span>
										@elseif (> 999999)
											<span>203m</span>
										@else --}} -->
											<span>203</span>
										<!-- {{-- @endif --}} -->
									</li>
									<li class="list-group-item">
										<i class="fa fa-comment-o"></i>
										<span>531</span>
									</li>
									<li class="list-group-item">
										<i class="fa fa-paper-plane-o"></i>
									</li>
									<li class="list-group-item">
										<i class="fa fa-ellipsis-v"></i>
									</li>
									<li class="list-group-item">
										<i class="fa-light fa-bookmark"><img src="{{ asset('Icons/bookmark.png') }}" /></i>
									</li>
									<li class="list-group-item rounded-4"
										{{-- <img src="{{ asset($reel->post->user->user_photo_path) }}" alt="Aaudio source"> --}}
											style="
											background-image: url('{{ asset($reel->post->user->user_photo_path) }}');
											background-size: cover;
											background-repeat: no-repeat;
											background-position: center center;
											height: 50px;
											width: 50px;">
									</li>
								</ul>
							</div>
						</div>
						<!-- {{-- reels right bar end --}} -->
					</div>
				</div>
			@endforeach
		</div>    
	</section>
</div>

<script>
	var vid = document.querySelector(".video");
	var audioMute = document.querySelector(".audio_mute");
	var playIcon = document.querySelector(".icon-play");
	
	// playPauseVid();
	muteVid();
	// autoPlay();
	
	function playPauseVid(){
      if(vid.paused){
        vid.play();
		playIcon.style = "display:none;";
      }else{
        vid.pause();
		playIcon.style = "display:block; cursor: pointer;";
      }
    }

	// function autoPlay(){
	// 	if(vid.currentTime == vid.duration){
	// 		vid.play();
	// 	}
    // }

    function muteVid(){
        vid.muted = true;
    }

    function audioVid(){
      if(vid.muted == true){
        vid.muted = false;
		audioMute.src = "{{ asset('Icons/audio.png') }}";
		audioMute.alt = "Audio is playing";
		// audioMute.data-bs-title = "Audio is playing";
      }else{
        vid.muted = true;
		audioMute.src = "{{ asset('Icons/mute.png') }}";
		audioMute.alt = "Audio is muted";
		// audioMute.data-bs-title = "Audio is muted";
      }
    }

	window.onscroll = function(){
		let el = document.querySelector(".reel-element");
		el.scrollIntoView({behavior: "auto", block: "start"});
		el.scrollBy(0, 700);
		vid.play();
		console.log(1);
	}
</script>

@endsection