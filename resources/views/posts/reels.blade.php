@extends('layouts.app')

@section('title') Reels @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content')

<div class="col-lg-4">
	<section class="reels-body min-vh-100 px-5">
		<div class="container p-3">
			<div class="row d-flex">
				<div class="col m-lg-4 flex-fill">
					@foreach ($reels as $reel)

						<div class="row rounded-2 position-relative" style="height:690px;">

							<div class="col-3 position-absolute p-0 m-0 media_video">
								{{-- reels video start --}}
								<div class="row video_clickable" onclick="playPauseVid()">
									<video src="{{ asset($reel->content_path) }}"
										class="w-100 h-100 video" poster="{{ asset($reel->thumbnail_path) }}"
										autoplay loop >
										Your browser does not support the video tag.
									</video>
								</div>
								{{-- reels video start --}}
								{{-- reels info start --}}
								<div class="position-absolute video_audio_info">
									<div class="icon-audio" onclick="audioVid(); console.log('bye');">
										{{-- <div class="col-10"></div> --}}
										<img class="audio_mute" src="{{ asset('Icons/mute.png') }}" alt="Audio is muted"
										data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Audio is muted"
										/>
									</div>
									<div class="icon-play" style="display:none;">
										<img src="{{ asset('Icons/play.png') }}" alt="Video play icon"/>
									</div>
									<div class="video_info" id="videContent">
										<div class="row">
											<div class="col-1 align-self-center">
												<img src="" alt="User profile link">
											</div>
											<div class="col-8">
												<div id="reels_user">
													{{ $reel->post->user->nick_name }}
													<button type="button" id="btnToggleFollow">
														Follow
													</button>
												</div>
												<div class="reels_music">
													Remix with <span>codefrog_insta</span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-11">
												<div class="reels_music">
													Remix with <span>codefrog_insta</span>
												</div>
												<div class="reels_desc">
													Hey Everyone ???? ????????
													<p>
														???? Here is the behind the scene of video recording..
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								{{-- reels info end --}}
							</div>

							{{-- reels side bar start --}}
							<section id="ig_reels" class="col-1 position-absolute p-0 m-0">

								<i class="fa fa-camera"></i>  {{-- Camera icon for mobil app --}}

								<div id="reels_right_action_nav">
									<ul>
										<li>
											<i class="fa fa-heart-o"></i>
											<span>203k</span>
										</li>
										<li>
											<i class="fa fa-comment-o"></i>
											<span>531</span>
										</li>
										<li>
											<i class="fa fa-paper-plane-o"></i>
										</li>
										<li>
											<i class="fa fa-ellipsis-v"></i>
										</li>
										<li>
											<img src="" alt="Aaudio source">
										</li>
									</ul>
								</div>
							</section>
							{{-- reels side bar end --}}

						</div>

					@endforeach

				</div>
			</div>
		</div>
	</section>
</div>

<script>
	var vid = document.querySelector(".video");
	var audioMute = document.querySelector(".audio_mute");
	var playIcon = document.querySelector(".icon-play");
	
	playPauseVid();
	muteVid();
	// autoPlay();
	
	function playPauseVid(){
      if(vid.paused){
        vid.play();
		playIcon.style = "display:none;";
      }else{
        vid.pause();
		playIcon.style = "display:block;";
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
</script>

@endsection