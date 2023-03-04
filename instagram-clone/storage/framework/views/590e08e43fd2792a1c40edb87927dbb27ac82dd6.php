

<?php $__env->startSection('title'); ?> Instagram <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?> "<?php echo e(asset('/css/index.css')); ?>" <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

            <div class="col-lg-4">
                <div class="home">

                    <div class="inside-home">
                        <div class="stories"> 
                            <div class="story">
                                <div class="box">
                                    <div class="imgBx">
                                        <img src="<?php echo e(asset('lap.png')); ?>" alt="">
                                    </div>
                                </div>
                                <div class="title">
                                    sssssssss
                                </div>
                            </div>
                        </div> 

                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="posts"> 

                            <div class="post container"> 
                                <div class="story" id="postStory">
                                    <div class="imgBx">
                                        <img src="<?php echo e(asset('lap.png')); ?>" alt="">
                                    </div>
                                </div>
                                
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="title">
                                    <?php if($post->post_creator_id == $user->id): ?> <?php echo e($user->nick_name); ?> <?php endif; ?>
                                    <span>.1h</span>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="info" id="points">...</div>

                                <div class="infoPerson" id="hover"> 

                                    <div class="person">
                                        <div class="story">
                                            <div class="imgBx">
                                                <img src="<?php echo e(asset('lap.png')); ?>" alt="">
                                            </div>
                                        </div>

                                        <div class="title">
                                            <a href="">Nikename-of-owner-page</a>
                                            <p>Name</p>
                                        </div>
                                    </div>

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
                                            <div class="row"> 
                                                <div class="col-sm"><img src="<?php echo e(asset('lap.png')); ?>" alt=""></div>
                                                <div class="col-sm"><img src="<?php echo e(asset('lap.png')); ?>" alt=""></div>
                                                <div class="col-sm"><img src="<?php echo e(asset('lap.png')); ?>" alt=""></div>
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
                                    </div> 
                                </div>
                            </div> 


                            <div class="slider" data-post-id=<?php echo e($post->id); ?>>
                                <div class="container">
                                    <div class="slide-wrapper">
                                        <div id="slide-role">

                                            <?php
                                            $file = DB::table('posts')->where('id', $post->id)->first();
                                            $files = explode('|', $file->content_path);
                                            // @dd($files);
                                           ?>

                                            <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(substr(strrchr($media,'.'),1) == 'mp4'): ?>
                                                    <div class="slide" data-index=<?php echo e($index); ?> data-post-id="<?php echo e($post->id); ?>">
                                                        <video controls autoplay muted playsinline loop style="width:100%;height:100%" poster="http://placehold.it/350x350">
                                                            <source src="<?php echo e(URL::to($media)); ?>" type="video/mp4">
                                                            <source src="<?php echo e(URL::to($media)); ?>"  type="video/ogg">
                                                            Your device does not support HTML5 video.
                                                        </video>
                                                    </div>    
                                                <?php else: ?>
                                                    <div class="slide" data-index=<?php echo e($index); ?> data-post-id="<?php echo e($post->id); ?>">
                                                        <img src="<?php echo e(URL::to($media)); ?>" alt="" id="imgPost">
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                        </div>
                                    </div>

                                    <div class="bullets">
                                        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <span>
                                            <input <?php if($index == 0): ?> checked <?php endif; ?> onclick="changeImg(<?php echo e($index); ?>)" type="radio" name="slider" class="trigger">
                                        </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                            <div class="post-content container">
                                
                                <?php if($post->post_creator_id == $user->id): ?>
                                    <div class="title"><?php echo e($user->nick_name); ?></div>
                                <?php endif; ?>
                                
                                <p><?php echo e($post->caption); ?></p>
                            </div>

                            <div class="add-comment">
                                <form method="POST" action="<?php echo e(route('comments.store', 1)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input class="col-10 " type="text" name="comment" placeholder="Add a comment...">
                                    <input type="submit" value="post" class="btn">
                                </form>
                            </div>
                            <hr>

                        </div> 

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
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
                </div>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Instagram-Clone\instagram-clone\resources\views/posts/index.blade.php ENDPATH**/ ?>