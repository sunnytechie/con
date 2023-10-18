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
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="index.html"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                </li>

                <li class="sub-category">
                    <h3>UI Kit</h3>
                </li>

                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)">
                        <i class="side-menu__icon fe fe-slack"></i><span class="side-menu__label">Assets</span><i class="angle fe fe-chevron-right"></i>
                    </a>
                    <ul class="slide-menu">
                        <li class="panel sidetab-menu">

                            <div class="panel-body tabs-menu-body p-0 border-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="side1">
                                        <ul class="sidemenu-list">
                                            <li class="side-menu-label1"><a href="javascript:void(0)">Apps</a></li>
                                            <li><a href="#" class="slide-item"> List</a></li>
                                            <li><a href="#" class="slide-item"> List</a></li>
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
