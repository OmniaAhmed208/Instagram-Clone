@extends('layouts.app')

@section('title') Explore @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection



@section('content')

{{-- Post by id start --}}
{{-- @if (Route::is('home.explorePost'))
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12">

	</div>
	<div class="col-lg-6 col-md-6 col-sm-12">
		
	</div>
</div>
@endif --}}
{{-- Post by id start --}}

<div class="col-lg-9">
	<section class="explore-body min-vh-100 p-4">
		
		<div class="container px-2 pt-2">
			<div class="row row-cols-4 d-flex">
				@foreach($posts as $key => $post)
				@if ($post->content_path)

					<div class="col mx-lg-3 mx-sm-1 flex-fill">
						{{-- <a href="{{ url('explore/'.$post->id) }}" data-bs-toggle="modal" data-bs-target="#explorePostModal"> --}}
						<a href="{{ url('explore/'.$post->id) }}">

							{{-- @if ($posts->first() || $posts->last())
								<div class="row" style="height:690px;">
							@else --}}
							<div class="row">
									 {{-- style="
									background-image: url('{{ $post->content_path }}');
									background-size: cover;
									background-repeat: no-repeat;
									background-position: center center" --}}
							{{-- @endif --}}
							
								{{-- one explore content start --}}
								{{-- <span>{{ $post->caption }}</span> --}}

								@php
									$file = DB::table('posts')->where('id', $post->id)->first();
									$files = explode('|', $file->content_path);
                                @endphp
                                {{-- @foreach ($files as $index => $media) --}}
                                    @if ($post->content_type == 'mp4' || $post->content_path == 'ogg')
										<video src="{{ $post->content_path }}" id="video{{ $post->id }}"
											class="w-100 h-100"> 
											Your browser does not support the video tag.
										</video>							
										{{-- one explore video content start --}}
										<img class="icon-video visible" src="{{asset('Icons/photo-gallery.png')}}"/>
										<div class="following-comments-numbers">
											<span class="following-number"><i class="fa fa-heart-o"></i> 0</span>
											<span class="comments-number"><i class="fa-brands fa-facebook-messenger"></i> 0</span>
										</div>
										{{-- one explore video content end --}}	
									@else
										<img src='{{ $post->content_path }}' id="photo{{ $post->id }}" 
											class="w-100 h-100"/>
										{{-- one explore single-photos/albums content start --}}
										<img class="icon-album visible" src="{{asset('Icons/photo-gallery.png')}}"/>
										<div class="following-comments-numbers">
											<span class="following-number"><i class="fa fa-heart-o"></i> 0</span>
											<span class="comments-number"><i class="fa-brands fa-facebook-messenger"></i> 0</span>
										</div>
										{{-- one explore single-photos/albums content end --}}
									@endif
                                {{-- @endforeach --}}
								{{-- one explore content end --}}
							</div>
						</a>
					</div>
				@endif
				@endforeach
			</div>

		</div>

	</section>
</div>

@endsection


{{-- one explore content modal start --}}
{{-- <div class="modal fade" id="explorePostModal" tabindex="-1" aria-labelledby="explorePostModalLabel" aria-hidden="true">
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
</div> --}}
{{-- one explore content modal end --}}
