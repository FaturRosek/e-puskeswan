<!DOCTYPE html>
<html lang="en">

<head>
    <!--  Title -->
    <title>Login</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo.jpeg') }}" />
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('landing/css/style.css') }}" />
    <link id="themeColors" rel="stylesheet" href="{{ asset('landing/css/app.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @yield('content')
    </div>

    <div class="py-8">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100 h-50">
                <div class="d-none d-lg-flex col-6 col justify-content-center"
                    style="background-image: url('{{ asset('assets/images/login-bg.png') }}');"></div>
                <div class="col-md-8 col-lg-4">
                    <div class="card mb-0 login-card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-6 text-center">
                                    <h3 class="fw-bolder">Login</h3>
                                </div>
                            </div>
                            <form method="post" action="/login">
                                @csrf
                                <div class="mb-3">
                                    <x-atoms.form-label for="email_field">Email</x-atoms.form-label>
                                    <x-atoms.input type="email" name="email" id="email_field"
                                        placeholder="Masukkan Alamat Email" required ssr />
                                </div>
                                <div class="mb-4">
                                    <x-atoms.form-label for="password_field">Password</x-atoms.form-label>
                                    <x-atoms.input type="password" name="password" id="password_field"
                                        placeholder="Masukkan Password" required ssr />
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" value=""
                                            id="flexCheckChecked" checked>
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                            Keep me sign in
                                        </label>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn btn-primary w-100 login-btn mb-4 rounded-2">Login</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="text-primary fw-medium ms-2" href="#">Forgot your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Import Js Files -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.init.js') }}"></script>
    <script src="{{ asset('assets/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
