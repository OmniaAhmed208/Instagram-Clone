@extends('notif_offcanvas')

@section('css') "{{asset('/css/index.css')}}" @endsection

@section('content-notif-week-user-container')

	{{-- user-container for notifications off-canvas row start --}}
	<a href="" class="row">
		<div class="user-container">
			<div class="row">
				<div class="col-lg-3 align-self-start">
					<div class=" story">
						<div class="imgBx">
							<img src="{{asset('lap.png')}}" alt="img">
						</div>
					</div>
				</div>
				<div class="col-lg-6 align-self-start">
					<div class="title-info">
						<div class="info">
							<p>
								<strong class="h5 text-black">nickname</strong>
								<img src="{{asset('verified.png')}}" />
								generated text about this user.
								<strong class="h5 text-black">munual friend</strong>
								other generated text with numbers variable.
								<span class="text-black-50">duration of this notification</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 align-self-end align-self-center">
					<button class="btn btn-primary text-white px-4">Follow</button>
				</div>
			</div>
		</div>
	</a>
	{{-- user-container row end --}}

@endsection



@section('content-notif-month-user-container')

	{{-- user-container for notifications off-canvas row start --}}
	<a href="" class="row">
		<div class="user-container">
			<div class="row">
				<div class="col-lg-3 align-self-start">
					<div class=" story">
						<div class="imgBx">
							<img src="{{asset('lap.png')}}" alt="img">
						</div>
					</div>
				</div>
				<div class="col-lg-6 align-self-start">
					<div class="title-info">
						<div class="info">
							<p>
								<strong class="h5 text-black">nickname</strong>
								<img src="{{asset('verified.png')}}" />
								generated text about this user.
								<strong class="h5 text-black">munual friend</strong>
								other generated text with numbers variable.
								<span class="text-black-50">duration of this notification</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 align-self-end align-self-center">
					<button class="btn btn-primary text-white px-4">Follow</button>
				</div>
			</div>
		</div>
	</a>
	{{-- user-container row end --}}

@endsection



@section('content-notif-earlier-user-container')

	{{-- user-container for notifications off-canvas row start --}}
	<a href="" class="row">
		<div class="user-container">
			<div class="row">
				<div class="col-lg-3 align-self-start">
					<div class=" story">
						<div class="imgBx">
							<img src="{{asset('lap.png')}}" alt="img">
						</div>
					</div>
				</div>
				<div class="col-lg-6 align-self-start">
					<div class="title-info">
						<div class="info">
							<p>
								<strong class="h5 text-black">nickname</strong>
								<img src="{{asset('verified.png')}}" />
								generated text about this user.
								<strong class="h5 text-black">munual friend</strong>
								other generated text with numbers variable.
								<span class="text-black-50">duration of this notification</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 align-self-end align-self-center">
					<button class="btn btn-primary text-white px-4">Follow</button>
				</div>
			</div>
		</div>
	</a>
	{{-- user-container row end --}}

@endsection



@section('content-notif-suggest-user-container')

	{{-- user-container for notifications off-canvas row start --}}
	<a href="" class="row">
		<div class="user-container">
			<div class="row">
				<div class="col-lg-3 align-self-start">
					<div class=" story">
						<div class="imgBx">
							<img src="{{asset('lap.png')}}" alt="img">
						</div>
					</div>
				</div>
				<div class="col-lg-6 align-self-start">
					<div class="title-info">
						<div class="title">
							<p>Nikename-of-person</p>
							<img src="{{asset('verified.png')}}" />
						</div>
						<div class="info">
							<p class="text-black-50">User Name</p>
							<p class="text-black-50">Suggested for you. and other phrases</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 align-self-end align-self-center">
					<button class="btn btn-primary text-white px-4">Follow</button>
				</div>
			</div>
		</div>
	</a>
	{{-- user-container row end --}}

@endsection 