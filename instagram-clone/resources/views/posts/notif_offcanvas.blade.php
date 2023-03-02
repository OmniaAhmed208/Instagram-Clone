
    {{-- notifications left side offcanvas start --}}
    <div  class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasNotif" aria-labelledby="offcanvasNotifLabel">
      <div class="notif-bar">
          {{-- offcanvas title start --}}
          <div class="offcanvas-header">
              <h3 class="offcanvas-title" id="offcanvasNotifLabel">Notifications</h3>
          </div>
          {{-- offcanvas title end --}}
          {{-- notifications lists start --}}
          <div class="offcanvas-body">
              <div class="notif-week-list">
                  <div class="row week-title">
                      <h5 class="col align-self-start">This Week</h5>
                  </div>
                  <ul class="row week-list">
                      	{{--week-list row start --}}
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
													<img src="{{asset('Icons/verified.png')}}" />
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
                     	 {{-- week-list row end --}}
                  </ul>
              </div>
              {{-- week notifications end --}}
              <hr />
              {{-- month notifications start --}}
              <div class="notif-month-list">
                  <div class="row month-title">
                      <h5 class="col align-self-start">This Month</h5>
                  </div>
                  <ul class="month-list">
						{{--month-list row start --}}
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
													<img src="{{asset('Icons/verified.png')}}" />
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
						{{-- month-list row end --}}
                  </ul>
              </div>
              {{-- month notifications end --}}
              <hr />
              {{-- earlier notifications start --}}
              <div class="notif-earlier-list">
                  <div class="row earlier-title">
                      <h5 class="col align-self-start">Earlier</h5>
                  </div>
                  <ul class="earlier-list">
                     	{{--earlier-list row start --}}
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
													<img src="{{asset('Icons/verified.png')}}" />
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
                      	{{-- earlier-list row end --}}
                  </ul>
              </div>
              {{-- suggestions for you notifications end --}}
              <hr />
              {{-- suggest notifications start --}}
              <div class="notif-suggest-list">
                  <div class="row suggest-title">
                      <h5 class="col align-self-start">Suggestions for you</h5>
                  </div>
                  <ul class="suggest-list">
						{{--suggest-list row start --}}
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
												<img src="{{asset('Icons/verified.png')}}" />
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
						{{-- suggest-list row end --}}
                  </ul>
              </div>
              {{-- suggest notifications end --}}
          </div>
          {{-- notifications lists end --}}
      </div>
  </div>
  {{-- notifications left side offcanvas end --}}