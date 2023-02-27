@extends('layouts.app')

@section('title') Explore @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection



@section('oneExplore-album-Content')
{{-- one explore single-photos/albums content start --}}
	<svg aria-label="Carousel" class="icon-album 
		visible
		" color="#ffffff" fill="#ffffff" height="48" role="img" viewBox="0 0 48 48" width="48">
		<title>Carousel</title>
		<path d="M34.8 29.7V11c0-2.9-2.3-5.2-5.2-5.2H11c-2.9 0-5.2 2.3-5.2 5.2v18.7c0 2.9 2.3 5.2 5.2 5.2h18.7c2.8-.1 5.1-2.4 5.1-5.2zM39.2 15v16.1c0 4.5-3.7 8.2-8.2 8.2H14.9c-.6 0-.9.7-.5 1.1 1 1.1 2.4 1.8 4.1 1.8h13.4c5.7 0 10.3-4.6 10.3-10.3V18.5c0-1.6-.7-3.1-1.8-4.1-.5-.4-1.2 0-1.2.6z"></path>
	</svg>
	<div class="following-comments-numbers">
		<span class="following-number">&#xf004; number</span>
		<span class="comments-number">&#xf075; number</span>
	</div>
{{-- one explore single-photos/albums content end --}}
@endsection

@section('oneExplore-video-Content')
{{-- one explore video content start --}}
	<svg aria-label="Reel" class="icon-video 
		visible
		" color="#ffffff" fill="#ffffff" height="80" role="img" viewBox="0 0 48 48" width="80">
		<title>Reel</title>
		<path d="m12.823 1 2.974 5.002h-5.58l-2.65-4.971c.206-.013.419-.022.642-.027L8.55 1Zm2.327 0h.298c3.06 0 4.468.754 5.64 1.887a6.007 6.007 0 0 1 1.596 2.82l.07.295h-4.629L15.15 1Zm-9.667.377L7.95 6.002H1.244a6.01 6.01 0 0 1 3.942-4.53Zm9.735 12.834-4.545-2.624a.909.909 0 0 0-1.356.668l-.008.12v5.248a.91.91 0 0 0 1.255.84l.109-.053 4.545-2.624a.909.909 0 0 0 .1-1.507l-.1-.068-4.545-2.624Zm-14.2-6.209h21.964l.015.36.003.189v6.899c0 3.061-.755 4.469-1.888 5.64-1.151 1.114-2.5 1.856-5.33 1.909l-.334.003H8.551c-3.06 0-4.467-.755-5.64-1.889-1.114-1.15-1.854-2.498-1.908-5.33L1 15.45V8.551l.003-.189Z" fill-rule="evenodd"></path>
	</svg>
	<div class="following-comments-numbers">
		<span class="following-number">&#xf004; number</span>
		<span class="comments-number">&#xf075; number</span>
	</div>
{{-- one explore video content end --}}
@endsection



@section('content')

<div class="col-lg-10">
	<section class="explore-body min-vh-100 p-5">
		
		<div class="container px-5 pt-2">
			<div class="row row-cols-4 d-flex">
				@foreach($posts as $key => $post)
					<div class="col mx-lg-3 flex-fill">
						<a href="{{ $post->path() }}" data-bs-toggle="modal" data-bs-target="#explorePostModal">
							{{-- @if ($posts->first() || $posts->last())
								<div class="row" style="height:690px;">
							@else --}}
								<div class="row">
							{{-- @endif --}}
								{{-- one explore content start --}}
								<span>{{ $post->caption }}</span>
								@foreach ($post->media() as $media)
									@if ($media->content_type == 'video')
										@yield('oneExplore-video-Content')
									@else
										@yield('oneExplore-photo-Content')
									@endif
								@endforeach
								{{-- one explore content end --}}
							</div>
						</a>
					</div>
				@endforeach
			</div>

		</div>

	</section>
</div>

{{-- one explore content modal start --}}
<div class="modal fade" id="explorePostModal" tabindex="-1" aria-labelledby="explorePostModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="explorePostModalLabel">New message</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4">.col-md-4</div>
						<div class="col-md-4 ms-auto">.col-md-4 .ms-auto</div>
					</div>
					<div class="row">
						<div class="col-md-3 ms-auto">.col-md-3 .ms-auto</div>
						<div class="col-md-2 ms-auto">.col-md-2 .ms-auto</div>
					</div>
					<div class="row">
						<div class="col-md-6 ms-auto">.col-md-6 .ms-auto</div>
					</div>
					<div class="row">
						<div class="col-sm-9">
						Level 1: .col-sm-9
						<div class="row">
							<div class="col-8 col-sm-6">
							Level 2: .col-8 .col-sm-6
							</div>
							<div class="col-4 col-sm-6">
							Level 2: .col-4 .col-sm-6
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- one explore content modal end --}}






<input type="hidden" id="start" value="0">
<input type="hidden" id="rowperpage" value="{{ $rowperpage }}">
<input type="hidden" id="totalrecords" value="{{ $totalrecords }}">

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
// <script>

checkWindowSize();

// Check if the page has enough content or not. If not then fetch records
function checkWindowSize(){
	 if($(window).height() >= $(document).height()){
		   // Fetch records
		   fetchData();
	 }
}

// Fetch records
function fetchData(){
	  var start = Number($('#start').val());
	  var allcount = Number($('#totalrecords').val());
	  var rowperpage = Number($('#rowperpage').val());
	  start = start + rowperpage;

	  if(start <= allcount){
		   $('#start').val(start);

		   $.ajax({
				url:"{{route('getPosts')}}",
				data: {start:start},
				dataType: 'json',
				success: function(response){

					 // Add
					 $(".post:last").after(response.html).show().fadeIn("slow");

					 // Check if the page has enough content or not. If not then fetch records
					 checkWindowSize();
				}
		   });
	  }
}

$(document).on('touchmove', onScroll); // for mobile

function onScroll(){
	  if($(window).scrollTop() > $(document).height() - $(window).height()-100) {
			fetchData(); 
	  }
}

$(window).scroll(function(){
	  onScroll();
});
</script>

@endsection

