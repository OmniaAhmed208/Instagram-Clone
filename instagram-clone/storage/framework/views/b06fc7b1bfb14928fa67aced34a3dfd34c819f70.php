

<?php $__env->startSection('title'); ?> Reels <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> "<?php echo e(asset('/css/index.css')); ?>" <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="col-lg-5 col-md-9 col-sm-12">
	<section class="reels-body min-vh-100 px-5">
		<div class="container p-3 min-vh-100">
			<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($post->content_path): ?>
			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php
				$file = DB::table('posts')->where('id', $post->id)->first();
				$files = explode('|', $file->content_path);
				// dd($post->id);
			?>
			<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(substr(strrchr($media,'.'),1) == 'mp4' && $post->post_creator_id == $user->id): ?>
				<div class="reel-element mb-3" style="
					background: linear-gradient(rgba(30, 30, 30, 0.2), transparent, rgba(30, 30, 30, 0.2));
					background-image:
					/* radial-gradient(circle, rgba(255, 255, 255, 0.7) 30%, rgba(255, 255, 255, 1) 50%), */
					/* url('<?php echo e(asset('Thumbnails/2Bap.gif')); ?>'); */
					background-size: cover;
					background-repeat: no-repeat;
					background-position: center center">
					<div class="row m-lg-1 d-flex justify-content-evenly bg-light bg-opacity-10">
						<!--  -->
						<div class="col-9 rounded-2 d-flex flex-wrap px-0 position-relative">
							<!--  -->
							<div class="video-wrap z-n2  rounded-2 h-100 w-100 position-absolute" style="cursor: pointer;" onclick="playPauseVid('#video<?php echo e($post->id); ?>', '#videoIcon<?php echo e($post->id); ?>')">  <!--  -->
								<video src="<?php echo e(URL::to($media)); ?>" id="video<?php echo e($post->id); ?>"
									class="w-100 h-100 rounded-2 video" poster="" 
									autoplay loop > <!-- autoplay --> <!-- loading... as poster: asset('Thumbnails/2Bap.gif') -->
									Your browser does not support the video tag.
								</video>
							</div>
							<!--  -->
							<!--  -->
							<div class="row z-1 mb-auto mt-3 ms-auto text-center">
								<div class="icon-audio" style="cursor: pointer;" onclick="audioVid('#video<?php echo e($post->id); ?>', '#audio<?php echo e($post->id); ?>');">  <!--  -->
									<img class="audio_mute" id="audio<?php echo e($post->id); ?>" src="<?php echo e(asset('Icons/mute.png')); ?>" alt="Audio is muted"
									data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Audio is muted"
									/>
								</div>
							</div>
							<div class="row z-1 mb-auto mt-3 ms-auto text-center">
								<div class="icon-play" style="display:none;" id="videoIcon<?php echo e($post->id); ?>" onclick="playPauseVid('#video<?php echo e($post->id); ?>', '#videoIcon<?php echo e($post->id); ?>');">  <!--  -->
									<img src="<?php echo e(asset('Icons/play.png')); ?>" alt="Video play icon"/>
								</div>
							</div>
							<div class="row z-1 mt-auto mb-3 mx-0 ps-0 text-start">
								<div class="col d-flex ">
									<div class="video_info" id="videContent">
										<div class="row px-1 justify-content-between">
											<div class="col-2 rounded-circle">
												
												<div class="story">
													<div class="imgBx">
														<img src="<?php echo e(asset($user->user_photo_path)); ?>" alt="User photo">
													</div>
												</div>
											</div>
											<div class="col-10 ps-3 my-auto">
												<div id="reels_user" class="fw-bold">
													<?php echo e($user->nick_name); ?> &sdot;
													<span class=" btn m-0 p-0 text-decoration-none fw-bold text-white">
														Follow
													</span>
												</div>
											</div>
											<div class="col-12 d-flex">
												<div class="reels_content text-wrap">
													<span class="collapse scroll-section" id="collapseWithScrollbar<?php echo e($post->id); ?>"><?php echo e($post->caption); ?></span>
													<span class="btn m-0 p-0 text-decoration-none fw-bold text-white" type="button" 
														data-bs-toggle="collapse" data-bs-target="#collapseWithScrollbar<?php echo e($post->id); ?>" 
														aria-expanded="false" aria-controls="collapseWithScrollbar<?php echo e($post->id); ?>"
													>... &#8679;/&#8681;</span>  <!--  -->
												</div>
											</div>
											<div class="col-12 d-flex">
												<div class="reels_music text-wrap">
													<img src="<?php echo e(asset('Icons/musical-notes.png')); ?>" />
													<?php echo e($user->nick_name); ?> &sdot; Original audio
												</div>
												<div class="reels_tagged ps-1">
													<img src="<?php echo e(asset('Icons/user-16.png')); ?>" />
													<span>
														Tagged users
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--  -->
						</div>
						<!--  -->
						<!--  -->
						<div class="reels_right_bar col-1 d-flex flex-wrap justify-content-center text-center text-dark" style="height: 680px;">
							<div class="row mb-auto mt-3">
								<li class="list-group-item">
									<i><img src="<?php echo e(asset('Icons/compact-camera.png')); ?>" /></i>  <!--  -->
								</li>
							</div>
							<div class="row mt-auto align-content-center">
								<ul>
									<li class="list-group-item">
										<i><img src="<?php echo e(asset('Icons/heart.png')); ?>" /></i>
										<!--  -->
											<span>203</span>
										<!--  -->
									</li>
									<li class="list-group-item">
										<i><img src="<?php echo e(asset('Icons/comments.png')); ?>" /></i>
										<span>531</span>
									</li>
									<li class="list-group-item">
										<i><img src="<?php echo e(asset('Icons/send.png')); ?>" /></i>
									</li>
									<li class="list-group-item">
										<i><img src="<?php echo e(asset('Icons/ellipsis.png')); ?>" /></i>
									</li>
									<li class="list-group-item">
										<i><img src="<?php echo e(asset('Icons/bookmark.png')); ?>" /></i>
									</li>
									<li class="list-group-item rounded-4"
										
											style="
											background-image: url('<?php echo e(asset($user->user_photo_path)); ?>');
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
						<!--  -->
					</div>
				</div>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>    
	</section>
</div>

<script>
	var vidMuted = document.querySelectorAll('.video');
	muteVid();
	playPauseVid();

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
			audioMute.src = "<?php echo e(asset('Icons/audio.png')); ?>";
			audioMute.alt = "Audio is playing";
		}else{
			vid.muted = true;
			audioMute.src = "<?php echo e(asset('Icons/mute.png')); ?>";
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Instagram-Clone\instagram-clone\resources\views/posts/reels.blade.php ENDPATH**/ ?>