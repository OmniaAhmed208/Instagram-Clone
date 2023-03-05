<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>
    <link rel="stylesheet" href="{{asset('/css/stories.css')}}">
    <link rel="icon" href="{{asset('/img/Instagram_Glyph_Gradient.jpg')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    @foreach($users as $user)
        @php
        $fileStory = DB::table('media')->where('user_id', $user->id)->first();
        // @dd($fileStory)
        $filesStories = explode('|', $fileStory->content_path);
        // @dd($fileStory->user_id)
        @endphp
    @endforeach

    <div class="storyParent">
        <i class="fa fa-close cancel"></i>
        
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="">

           <div class="personStory">
            <div class="story" id="postStory">
                <div class="imgBx">
                    <img src="{{asset('lap.png')}}" alt="">
                </div>
            </div>
            {{-- <div class="title">name-of-page <span>.1h</span></div> --}}
            @foreach($users as $user)
                <div class="user-name">
                    @if($fileStory->user_id == $user->id) {{$user->nick_name}} @endif
                    <span>.2h</span>
                </div>
            @endforeach
           </div>

            <div class="carousel-inner">
                @foreach ($filesStories as $index => $media)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <img src="{{URL::to($media)}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>

    <script src="{{asset('/js/jquery-3.6.0.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

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
</body>
</html>
