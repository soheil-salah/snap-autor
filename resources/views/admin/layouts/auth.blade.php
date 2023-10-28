<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Admin Login</title>
    {{-- <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" /> --}}
    @include('admin.includes.assets.styles')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="javascript:void(0);" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    {{-- <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt=""> --}}
                                    <h2>{{ config('app.name') }}</h2>
                                </a>
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.assets.scripts')
</body>

</html>
