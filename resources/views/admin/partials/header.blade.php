<div id="kt_header" style="" class="header align-items-stretch">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
                <i class="bi bi-list fs-1"></i>
            </div>
        </div>
        
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ route('admin.dashboard') }}" class="d-lg-none">
                <h4 class="text-dark fw-bolder m-0">JobFindLink</h4>
            </a>
        </div>

        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
                        <!-- Header menu items could go here -->
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-stretch flex-shrink-0">
                <!-- Notifications -->
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="bi bi-bell fs-2"></i>
                        <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
                        <div class="d-flex flex-column bgi-no-repeat rounded-top bg-primary" style="padding: 2rem;">
                            <h3 class="text-white fw-bold m-0">Notifications <span class="fs-8 opacity-75 ps-3">2 new items</span></h3>
                        </div>
                        <div class="scroll-y mh-325px my-5 px-8">
                            <div class="d-flex flex-stack py-4">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px me-4"><span class="symbol-label bg-light-primary"><i class="bi bi-briefcase text-primary"></i></span></div>
                                    <div class="mb-0 me-2">
                                        <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">New Job Posted</a>
                                        <div class="text-gray-400 fs-7">By TechCorp Inc.</div>
                                    </div>
                                </div>
                                <span class="badge badge-light fs-8">2 hrs</span>
                            </div>
                            <div class="d-flex flex-stack py-4">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px me-4"><span class="symbol-label bg-light-success"><i class="bi bi-file-earmark-person text-success"></i></span></div>
                                    <div class="mb-0 me-2">
                                        <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bolder">New Application</a>
                                        <div class="text-gray-400 fs-7">For Senior Developer</div>
                                    </div>
                                </div>
                                <span class="badge badge-light fs-8">5 hrs</span>
                            </div>
                        </div>
                        <div class="py-3 text-center border-top">
                            <a href="#" class="btn btn-color-gray-600 btn-active-color-primary">View All <i class="bi bi-arrow-right fs-5"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Theme Toggle -->
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="bi bi-moon fs-2 toggle-icon-dark d-none"></i>
                        <i class="bi bi-sun fs-2 toggle-icon-light"></i>
                    </a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-muted menu-active-bg menu-state-primary fw-bold py-4 fs-6 w-200px" data-kt-menu="true">
                        <div class="menu-item px-3 my-1">
                            <a href="#" class="menu-link px-3 active" onclick="setThemeMode('light')">
                                <span class="menu-icon"><i class="bi bi-sun fs-4"></i></span>
                                <span class="menu-title">Light</span>
                            </a>
                        </div>
                        <div class="menu-item px-3 my-1">
                            <a href="#" class="menu-link px-3" onclick="setThemeMode('dark')">
                                <span class="menu-icon"><i class="bi bi-moon fs-4"></i></span>
                                <span class="menu-title">Dark</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User Toggle -->
                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded" style="width: 40px; height: 40px; font-size: 1.2rem;">
                            {{ substr(Auth::user()->full_name ?? 'A', 0, 1) }}
                        </div>
                    </div>
                    
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded" style="width: 50px; height: 50px; font-size: 1.5rem;">
                                        {{ substr(Auth::user()->full_name ?? 'A', 0, 1) }}
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->full_name }}
                                    <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Admin</span></div>
                                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="{{ route('admin.profile') }}" class="menu-link px-5">My Profile</a>
                        </div>
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
