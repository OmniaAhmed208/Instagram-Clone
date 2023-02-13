
<!-- We can separate off-cancas tags on separated files
   but this didn't work here 
  and include method returns comments in browser-->

<!--
@extends('layouts.app')

@section('css') "{{asset('/css/index.css')}}" @endsection

@section('contentSearchOffCanvas')

      {{-- search start --}}
      <div class="offcanvas-body">
          <div class="row mt-5">
              <div class="col mx-auto">
                  <div class="search">
                      <i class="fa fa-search"></i>
                      <input type="text" class="form-control" placeholder="Search">
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="form-control" aria-label="reset"></button>
                  </div>
              </div>
          </div>
          <hr />
          <ul class="search-auto-results">
              {{--  search-auto-results row start --}}
              <a href="" class="row">
                  <div class="search-auto-result">
                      <div class="row">
                          <div class="col-lg-3 align-self-start">
                              <div class=" story">
                                  <div class="imgBx">
                                      <img src="{{asset('lap.png')}}" alt="img">
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-8 align-self-start">
                              <div class="title-info">
                                  <div class="title">
                                      <p>Nikename-of-person</p>
                                      <i class="verificationSign"></i>
                                  </div>
                                  <div class="info">
                                      <p>Nikename &sdot; 0 followers</p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-1 align-self-center">
                              <button type="button" class="btn-close text-reset " data-bs-dismiss="searchResult" aria-label="Close"></button>
                          </div>
                      </div>
                  </div>
              </a>
              {{-- search-auto-result row end --}}
          </ul>
          <div class="recent-search-list">
              <div class="row recent-title">
                  <h5 class="col align-self-start">Recent</h5>
                  <a class="col align-self-end info" href="">Clear all</a>
              </div>
              <ul class="recent-search-results">
                  {{-- recent-search-results row start --}}
                  <a href="">
                      <div class="search-result">
                          <div class="row">
                              <div class="col-lg-3 align-self-start">
                                  <div class="story">
                                      <div class="imgBx">
                                          <img src="{{asset('lap.png')}}" alt="img">
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-8 align-self-start">
                                  <div class="title-info">
                                      <div class="title">
                                          <p>Nikename-of-person</p>
                                          <i class="verificationSign"></i>
                                      </div>
                                      <div class="info">
                                          <p>Nikename &sdot; 0 followers</p>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-1 align-self-center">
                                  <button type="button" class="btn-close text-reset" data-bs-dismiss="searchResult" aria-label="Close"></button>
                              </div>
                          </div>
                      </div>
                  </a>
                  {{-- recent-search-results row end --}}
              </ul>
          </div>
      </div>
      {{-- search end --}}
  </div>
</div>
{{-- search left side offcanvas end --}}

@endsection -->  
