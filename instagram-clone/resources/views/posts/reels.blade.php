@extends('layouts.app')

@section('title') Reels @endsection
@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content')

<div class="col-lg-4">
	<section class="reels-body min-vh-100 px-5">
		<div class="container p-3">
			<div class="row d-flex">
				<div class="col m-lg-3 flex-fill">
					@foreach ($reels as $reel)
					<a href="{{ asset($reel->content_path) }}">
						<div class="row rounded-2" style="height:690px;">
							<img src="{{ asset($reel->thumbnail_path) }}" alt="{{ $reel->alt_text }}" />
							
						</div>
					</a>
					@endforeach

				</div>
			</div>
		</div>
	</section>
</div>

@endsection