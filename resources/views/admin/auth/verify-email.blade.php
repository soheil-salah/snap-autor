<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Verify Account</title>
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
                    <div class="col-md-8">
                        <div class="card mb-0">
                            <div class="card-body text-center">

                                <div class="mb-3">
                                    <h1>You need to verify your email</h1>
    
                                    <p class="fw-bold">
                                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email. Please, click on the button below and we will gladly send you another.') }}
                                    </p>
                                </div>

                                <form method="POST" action="{{ route('admin.verification.send') }}">
                                    @csrf
                        
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Resend Verification Email') }}
                                    </button>
                                </form>

                                
                                @if (session('status') == 'verification-link-sent')
                                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                    <strong>Holy guacamole!</strong>  {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif

                                {{-- <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                        
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Log Out') }}
                                    </button>
                                </form> --}}
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
