<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="/">
                {{-- Both White for white bg --}}
                <img height="50" width="50" src="{{ asset('assets/img/Untitled_design__20_-removebg-preview.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img height="50" width="50" src="{{ asset('assets/img/Untitled_design__20_-removebg-preview.png') }}" class="header-brand-img toggle-logo" alt="logo">
                {{-- Both Dark for white bg --}}
                <img height="50" width="50" src="{{ asset('assets/img/Untitled_design__20_-removebg-preview.png') }}" class="header-brand-img light-logo" alt="logo">
                <img height="50" width="50" src="{{ asset('assets/img/Untitled_design__20_-removebg-preview.png') }}" class="header-brand-img light-logo1" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="/"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>

                @if (Auth::user()->role == "ict" || Auth::user()->role == "admin")
                    {{-- #### Start ##### --}}
                    <li class="sub-category">
                        <h3>Materials</h3>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-book"></i><span class="side-menu__label">Books</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">Books</a></li>
                                                <li class="@if(Route::currentRouteName() === 'price.index') active @endif">
                                                    <a class="@if(Route::currentRouteName() === 'price.index') active @endif slide-item" href="{{ route('price.index') }}">Prices</a>
                                                </li>
                                                <li
                                                class="@if(Route::currentRouteName() === 'studies.dynamite') active @endif">
                                                <a href="{{ route('studies.dynamite') }}" class="slide-item @if(Route::currentRouteName() === 'studies.dynamite') active @endif">Daily Dynamite</a></li>
                                                <li class="@if(Route::currentRouteName() === 'studies.fountain') active @endif"><a href="{{ route('studies.fountain') }}" class="slide-item @if(Route::currentRouteName() === 'studies.fountain') active @endif">Daily Fountain</a></li>
                                                <li class="@if(Route::currentRouteName() === 'studies.study') active @endif"><a href="{{ route('studies.study') }}" class="slide-item @if(Route::currentRouteName() === 'studies.study') active @endif">Bible study</a></li>
                                                <li class="@if(Route::currentRouteName() === 'cyc.index') active @endif"><a href="{{ route('cyc.index') }}" class="slide-item @if(Route::currentRouteName() === 'cyc.index') active @endif">CYC</a></li>
                                                <li class="@if(Route::currentRouteName() === 'cyc.calendar') active @endif"><a href="{{ route('cyc.calendar') }}" class="slide-item @if(Route::currentRouteName() === 'cyc.calendar') active @endif">CY Calender</a></li>
                                                <li class="@if(Route::currentRouteName() === 'bcp.index') active @endif"><a href="{{ route('bcp.index') }}" class="slide-item @if(Route::currentRouteName() === 'bcp.index') active @endif">BCP</a></li>
                                                <li class="@if(Route::currentRouteName() === 'hymnal.index') active @endif"><a href="{{ route('hymnal.index') }}" class="slide-item @if(Route::currentRouteName() === 'hymnal.index') active @endif">Hymnals</a></li>
                                                <li class="@if(Route::currentRouteName() === 'books.index') active @endif"><a href="{{ route('books.index') }}" class="slide-item @if(Route::currentRouteName() === 'books.index') active @endif">PDFs</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>


                    {{-- #### Start categories ##### --}}
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Categories</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                {{-- <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li> --}}
                                                <li><a href="{{ route('bcp.category') }}" class="slide-item">BCP Categories</a></li>
                                                <li><a href="{{ route('cyc.category') }}" class="slide-item">CYC Categories</a></li>
                                                {{-- <li><a href="#" class="slide-item">Sub categories</a></li> --}}
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif



                @if (Auth::user()->role == "finance" || Auth::user()->role == "admin")
                    {{-- #### Start ##### --}}
                    <li class="sub-category">
                        <h3>Purchase Report</h3>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-shopping-cart"></i><span class="side-menu__label">Sales Record</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">record</a></li>
                                                <li><a href="{{ route('payments.index') }}" class="slide-item">Books</a></li>
                                                <li><a href="{{ route('purchase.studies.index') }}" class="slide-item">Devotionals</a></li>
                                                <li><a href="{{ route('purchased.cyc.index') }}" class="slide-item">CYC</a></li>
                                                <li><a href="{{ route('report.bcp.purchase') }}" class="slide-item">BCP</a></li>
                                                <li><a href="{{ route('report.hymnal.purchase') }}" class="slide-item">Con Hymnals</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-shopping-cart"></i><span class="side-menu__label">Finance</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">reports</a></li>
                                                <li><a href="{{ route('donations.index') }}" class="slide-item">Donations</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    {{-- #### End ##### --}}
                @endif


                @if (Auth::user()->role == "db" || Auth::user()->role == "admin")
                    {{-- #### Start ##### --}}
                    <li class="sub-category">
                        <h3>Activity Report</h3>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Report</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">reports</a></li>
                                                <li><a href="{{ route('testimonies.index') }}" class="slide-item">Testimonies</a></li>
                                                <li><a href="{{ route('prayers.index') }}" class="slide-item">Prayer Requests</a></li>
                                                <li><a href="{{ route('feedbacks.index') }}" class="slide-item">Feedbacks</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif


                @if (Auth::user()->role == "ict" || Auth::user()->role == "admin")
                    {{-- #### Start ##### --}}
                    <li class="sub-category">
                        <h3>Notification</h3>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-message-square"></i><span class="side-menu__label">Push Notification</span><i class="angle fe fe-chevron-right"></i>
                        </a>

                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">Push</a></li>
                                                <li><a href="{{ route('notifications.index') }}" class="slide-item">Push</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif


                @if (Auth::user()->role == "ict" || Auth::user()->role == "admin")
                    {{-- #### Media Start ##### --}}
                    <li class="sub-category">
                        <h3>Media</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Category</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">Categories</a></li>
                                                <li><a href="{{ route('categories.index') }}" class="slide-item">Categories</a></li>
                                                {{-- <li><a href="#" class="slide-item">Sub categories</a></li> --}}
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-film"></i><span class="side-menu__label">Video</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">Videos</a></li>
                                                <li><a href="{{ route('media.video') }}" class="slide-item">Media Videos</a></li>
                                                <li><a href="{{ route('kidzone.index') }}" class="slide-item">Kidzone</a></li>
                                                {{-- <li><a href="#" class="slide-item">Create New</a></li> --}}
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-music"></i><span class="side-menu__label">Audio</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">Audio/Podcast</a></li>
                                                <li><a href="{{ route('media.audio') }}" class="slide-item">Media Audio</a></li>
                                                {{-- <li><a href="#" class="slide-item">Create New</a></li> --}}
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-camera"></i><span class="side-menu__label">Gallery</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">Gallery</a></li>
                                                <li><a href="{{ route('media.gallery') }}" class="slide-item">Media Images</a></li>
                                                {{-- <li><a href="#" class="slide-item">Create New</a></li> --}}
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    {{-- #### End ##### --}}
                @endif


                @if (Auth::user()->role == "db" || Auth::user()->role == "admin")

                    {{-- #### Start Users ##### --}}
                    <li class="sub-category">
                        <h3>Users</h3>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Registered Users</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">users</a></li>
                                                <li><a href="{{ route('androidusers.index') }}" class="slide-item">User Sign ups</a></li>
                                                <li><a href="{{ route('memberships.index') }}" class="slide-item">Members</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif


                @if (Auth::user()->role == "ict" || Auth::user()->role == "admin")
                    {{-- #### Start ##### --}}
                    <li class="sub-category">
                        <h3>Settings</h3>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                            <i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label">settings</span><i class="angle fe fe-chevron-right"></i>
                        </a>
                        <ul class="slide-menu">
                            <li class="panel sidetab-menu">

                                <div class="panel-body tabs-menu-body p-0 border-0">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="side1">
                                            <ul class="sidemenu-list">
                                                <li class="side-menu-label1"><a href="javascript:void(0)">settings</a></li>
                                                @if (Auth::user()->role == "admin")
                                                <li><a href="{{ route('admin.index') }}" class="slide-item">Admin</a></li>
                                                @endif
                                                <li><a href="{{ route('settings.index') }}" class="slide-item">Keys</a></li>
                                                <li><a href="{{ route('stream.index') }}" class="slide-item">Livestream</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif

                <div style="height: 100px;"></div>

            </ul>

        </div>
    </div>
</div>
