{{-- search left side offcanvas start --}}
<div  class="offcanvas offcanvas-start rounded-start rounded-5" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="offcanvasSearchLabel">
    <div class="search-bar">
        {{-- offcanvas title start --}}
        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="offcanvasSearchLabel">Search</h3>
            {{-- <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
        </div>
        {{-- offcanvas title end --}}
        <div class="offcanvas-body">
            {{-- container for search off-canvas start --}}
      <div class="row mt-2">
        <div class="col mx-auto">
            <div class="search">
                <i class="fa fa-search"></i>
                <input type="text" class="form-control" placeholder="Search">
                <div class="col-lg-1 align-self-center">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="form-control" aria-label="reset"></button>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-4"/>
    <ul class="search-auto-results">
        {{--  search-auto-results row start --}}
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
                    <div class="col-lg-9 align-self-start">
                        <div class="title-info">
                            <div class="title">
                                <p>Nikename-of-person</p>
                                <img src="{{asset('Icons/verified.png')}}" />
                                {{-- <i class="fa-solid fa-badge-check"></i> --}}
                            </div>
                            <div class="info">
                                <p>Nikename &sdot; 0 followers</p>
                            </div>
                        </div>
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
            <a href="" class="row">
                <div class="user-container">
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
                                    <img src="{{asset('Icons/verified.png')}}" />
                                    {{-- <i class="fa-solid fa-badge-check"></i> --}}
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
    {{-- container for search off-canvas end --}}
        </div>
    </div>
  </div>
  {{-- search left side offcanvas end --}}