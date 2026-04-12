<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Admin Panel') | JobFindLink</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    @yield('vendor_css')
    <link href="{{ asset('demo1/dist/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('demo1/dist/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            {{-- Aside/Sidebar --}}
            @include('admin.partials.sidebar')

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                {{-- Header --}}
                @include('admin.partials.header')

                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    {{-- Toolbar --}}
                    <div class="toolbar" id="kt_toolbar">
                        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">@yield('page_title', 'Dashboard')</h1>
                                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                                <small class="text-muted fs-7 fw-bold my-1 ms-1">@yield('page_subtitle', '')</small>
                            </div>
                        </div>
                    </div>

                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-fluid">
                            {{-- Flash Messages --}}
                            @if(session('success'))
                            <div class="alert alert-success d-flex align-items-center p-5 mb-5">
                                <i class="bi bi-check-circle-fill fs-2 text-success me-4"></i>
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">{{ session('success') }}</span>
                                </div>
                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                            </div>
                            @endif

                            @if(session('error'))
                            <div class="alert alert-danger d-flex align-items-center p-5 mb-5">
                                <i class="bi bi-exclamation-triangle-fill fs-2 text-danger me-4"></i>
                                <div class="d-flex flex-column">
                                    <span class="fw-bold">{{ session('error') }}</span>
                                </div>
                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                            </div>
                            @endif

                            @yield('content')
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">&copy; {{ date('Y') }}</span>
                            <span class="text-gray-800 text-hover-primary">JobFindLink</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>var hostUrl = "{{ asset('demo1/dist/assets/') }}";</script>
    <script src="{{ asset('demo1/dist/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('demo1/dist/assets/js/scripts.bundle.js') }}"></script>
    <script>
        // Theme initialization
        var defaultThemeMode = "light";
        var themeMode;
        if ( document.documentElement ) {
            if ( document.documentElement.hasAttribute("data-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            } else {
                if ( localStorage.getItem("data-theme") !== null ) {
                    themeMode = localStorage.getItem("data-theme");
                } else {
                    themeMode = defaultThemeMode;
                }			
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
        
        function setThemeMode(mode) {
            document.documentElement.setAttribute('data-theme', mode);
            localStorage.setItem("data-theme", mode);
            
            // Toggle icons in header
            if(mode === 'dark') {
                document.querySelector('.toggle-icon-dark')?.classList.remove('d-none');
                document.querySelector('.toggle-icon-light')?.classList.add('d-none');
            } else {
                document.querySelector('.toggle-icon-light')?.classList.remove('d-none');
                document.querySelector('.toggle-icon-dark')?.classList.add('d-none');
            }
        }

        // Run icon check on load
        window.addEventListener('DOMContentLoaded', (event) => {
            if(localStorage.getItem('data-theme') === 'dark') {
                document.querySelector('.toggle-icon-dark')?.classList.remove('d-none');
                document.querySelector('.toggle-icon-light')?.classList.add('d-none');
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
