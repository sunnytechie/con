<aside style="z-index: 999" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/" target="_blank">
        {{-- <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> --}}
        <span class="ms-1 font-weight-bold">Church of Nigeria</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    {{-- <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main"> --}}
      <div>
      <ul class="navbar-nav">

        
        <li class="nav-item">
          <a class="nav-link  active" href="/">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-tachometer" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Purchase</h6>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('payments.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-credit-card" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Books Purchased</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('purchase.studies.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-credit-card" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Devotionals Purchased</span>
          </a>
        </li>

        @if (Auth::user()->role == "admin")
          
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Books Listing</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('studies.dynamite') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-calendar" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Daily Dynamite</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('studies.fountain') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-tint" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Fountain</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('studies.study') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-book" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Bible Study</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('books.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-clone" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Books</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Sections</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('categories.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-film" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Media Categories</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('subcategories.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-film" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Media Sub Categories</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('books.categories.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-book" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Books Categories</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('book.sub.categories.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-book" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Book Sub Categories</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Media</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('media.video') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-video" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Video</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('media.audio') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-music" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Audio</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">CoN</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('news.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-newspaper-o" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">CoN News</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('events.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">CoN Events</span>
          </a>
        </li>

        {{-- <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Notications</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('notifications.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-list" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Listing</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('notifications.create') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Compose</span>
          </a>
        </li> --}}

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">App Related</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('androidusers.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-users" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Android Users</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('comments.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-comments" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Comments</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('reportedcomments.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <span><i class="fa fa-comments-o" aria-hidden="true"></i></span>
            </div>
            <span class="nav-link-text ms-1">Reported Comments</span>
          </a>
        </li>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Reports</h6>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('memberships.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Registered Members</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="{{ route('donations.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-money" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Donations</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('testimonies.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-sticky-note" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Testimonies</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('bibles.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-book" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Bible</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('prayers.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-question-circle" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Prayer Request</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('feedbacks.index') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-reply-all" aria-hidden="true"></i>
            </div>
            <span class="nav-link-text ms-1">Member Feedback</span>
          </a>
        </li>

        @endif

      </ul>
    </div>
  </aside>