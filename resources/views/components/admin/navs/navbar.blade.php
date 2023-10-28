<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>

        <div class="d-block d-lg-none">
            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg" class="dark-logo" width="180" alt="" />
            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/light-logo.svg" class="light-logo" width="180" alt="" />
        </div>

        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0)"
                    class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button"
                    data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                    aria-controls="offcanvasWithBothOptions">
                    <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <!-- Languages -->
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-flag-en.svg" alt="" class="rounded-circle object-fit-cover round-20">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body" data-simplebar>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                    <div class="position-relative">
                                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-flag-en.svg" alt="" class="rounded-circle object-fit-cover round-20">
                                    </div>
                                    <p class="mb-0 fs-3">English (UK)</p>
                                </a>
                                <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                                    <div class="position-relative">
                                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-flag-sa.svg" alt="" class="rounded-circle object-fit-cover round-20">
                                    </div>
                                    <p class="mb-0 fs-3">عربي (Arabic)</p>
                                </a>
                            </div>
                        </div>
                    </li> --}}

                    <!-- Notifications -->
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-bell-ringing"></i>
                            <div class="notification bg-primary rounded-circle"></div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop2">
                            <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
                            </div>
                            <div class="message-body" data-simplebar>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                        <span class="d-block">Congratulate him</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="../../dist/images/profile/user-2.jpg" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">New message</h6>
                                        <span class="d-block">Salma sent you new message</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="../../dist/images/profile/user-3.jpg" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Bianca sent payment</h6>
                                        <span class="d-block">Check your earnings</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="../../dist/images/profile/user-4.jpg" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Jolly completed tasks</h6>
                                        <span class="d-block">Assign her new tasks</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="../../dist/images/profile/user-5.jpg" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">John received payment</h6>
                                        <span class="d-block">$230 deducted from account</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"
                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                    <span class="me-3">
                                        <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="user"
                                            class="rounded-circle" width="48" height="48" />
                                    </span>
                                    <div class="w-75 d-inline-block v-middle">
                                        <h6 class="mb-1 fw-semibold">Roman Joined the Team!</h6>
                                        <span class="d-block">Congratulate him</span>
                                    </div>
                                </a>
                            </div>
                            <div class="py-6 px-7 mb-1">
                                <button class="btn btn-outline-primary w-100"> See All Notifications
                                </button>
                            </div>
                        </div>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="35" height="35" alt="" />
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">Admin Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="80" height="80" alt="" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">{{ Auth::guard('admin')->user()->firstname.' '.Auth::guard('admin')->user()->lastname }}</h5>
                                        @if(Auth::guard('admin')->user()->author != null)
                                        <span class="mb-1 d-block text-dark">Author</span>
                                        @elseif(Auth::guard('admin')->user()->editor != null)
                                        <span class="mb-1 d-block text-dark">Editor</span>
                                        @else
                                        <span class="mb-1 d-block text-dark">Admin</span>
                                        @endif
                                        <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                            <i class="ti ti-mail fs-4"></i> {{ Auth::guard('admin')->user()->email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="message-body">
                                    {{ $slot }}
                                </div>
                                <div class="d-grid py-4 px-7 pt-8">
                                    <!-- Offers -->
                                    {{-- <div class="upgrade-plan bg-light-primary position-relative overflow-hidden rounded-4 p-4 mb-9">
                                        <div class="row">
                                            <div class="col-6">
                                                <h5 class="fs-4 mb-3 w-50 fw-semibold text-dark">Unlimited
                                                    Access</h5>
                                                <button class="btn btn-primary text-white">Upgrade</button>
                                            </div>
                                            <div class="col-6">
                                                <div class="m-n4">
                                                    <img src="../../dist/images/backgrounds/unlimited-bg.png"
                                                        alt="" class="w-100">
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <form method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                            
                                        <button type="submit" class="btn btn-outline-danger">
                                            {{ __('Log Out') }}
                                        </button>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>