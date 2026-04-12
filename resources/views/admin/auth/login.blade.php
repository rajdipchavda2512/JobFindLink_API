<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login | JobFindLink</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('demo1/dist/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('demo1/dist/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('demo1/dist/assets/media/illustrations/sketchy-1/14.png') }})">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <a href="{{ route('admin.login') }}" class="mb-12">
                    <h2 class="text-dark fw-bolder">JobFindLink</h2>
                </a>
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form class="form w-100" method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Admin Sign In</h1>
                            <div class="text-gray-400 fw-bold fs-4">Sign in to access the admin panel</div>
                        </div>

                        @if($errors->any())
                        <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                            <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                                <i class="bi bi-exclamation-triangle-fill fs-2 text-danger"></i>
                            </span>
                            <div class="d-flex flex-column">
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                            <div class="d-flex flex-column">
                                <span>{{ session('success') }}</span>
                            </div>
                        </div>
                        @endif

                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <input class="form-control form-control-lg form-control-solid" type="email" name="email" value="{{ old('email') }}" autocomplete="off" required />
                        </div>

                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                            </div>
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" required />
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="remember" value="1" />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">Remember Me</span>
                            </label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Sign In</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex flex-center flex-column-auto p-10">
                <div class="d-flex align-items-center fw-bold fs-6">
                    <span class="text-muted">&copy; {{ date('Y') }} JobFindLink. All rights reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <script>var hostUrl = "{{ asset('demo1/dist/assets/') }}";</script>
    <script src="{{ asset('demo1/dist/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('demo1/dist/assets/js/scripts.bundle.js') }}"></script>
</body>
</html>
