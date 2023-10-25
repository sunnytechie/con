<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
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
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="#"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>

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
                                            <li><a href="#" class="slide-item">Daily Dynamite</a></li>
                                            <li><a href="#" class="slide-item">Daily Fountain</a></li>
                                            <li><a href="#" class="slide-item">Bible study</a></li>
                                            <li><a href="#" class="slide-item">CYC</a></li>
                                            <li><a href="#" class="slide-item">BCP</a></li>
                                            <li><a href="#" class="slide-item">Hymnals</a></li>
                                            <li><a href="{{ route('books.index') }}" class="slide-item">PDFS</a></li>
                                        </ul>

                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
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
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
                                            <li><a href="#" class="slide-item">Categories</a></li>
                                            <li><a href="#" class="slide-item">Sub categories</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="sub-category">
                    <h3>Purchase</h3>
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
                                            <li><a href="#" class="slide-item">Books</a></li>
                                            <li><a href="#" class="slide-item">Devotionals</a></li>
                                            <li><a href="#" class="slide-item">CYC</a></li>
                                            <li><a href="#" class="slide-item">BCP</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

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
                                            <li><a href="#" class="slide-item">Categories</a></li>
                                            <li><a href="#" class="slide-item">Sub categories</a></li>
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
                                            <li class="side-menu-label1"><a href="javascript:void(0)">video</a></li>
                                            <li><a href="#" class="slide-item">Listings</a></li>
                                            <li><a href="{{ route('kidzone.index') }}" class="slide-item">Kidzone</a></li>
                                            <li><a href="#" class="slide-item">Create New</a></li>
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
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Audio</a></li>
                                            <li><a href="#" class="slide-item">Listings</a></li>
                                            <li><a href="#" class="slide-item">Create New</a></li>
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
                                            <li><a href="#" class="slide-item">Listings</a></li>
                                            <li><a href="#" class="slide-item">Create New</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

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
                                            <li><a href="#" class="slide-item">Sign ups</a></li>
                                            <li><a href="#" class="slide-item">Members</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

                <li class="sub-category">
                    <h3>Activity Report</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-shopping-cart"></i><span class="side-menu__label">Financial</span><i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">

                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">reports</a></li>
                                            <li><a href="#" class="slide-item">Donations</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
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
                                            <li><a href="#" class="slide-item">Testimonies</a></li>
                                            <li><a href="#" class="slide-item">Prayer Requests</a></li>
                                            <li><a href="#" class="slide-item">Feedbacks</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>

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
                                            <li><a href="#" class="slide-item">Admin</a></li>
                                            <li><a href="#" class="slide-item">Keys</a></li>
                                            <li><a href="#" class="slide-item">Livestream</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>


            </ul>

        </div>
    </div>
</div>
