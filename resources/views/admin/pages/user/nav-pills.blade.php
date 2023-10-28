<ul class="nav nav-pills user-profile-tab">
    <li class="nav-item" role="presentation">
        <a href="{{ route('admin.user.show', $user->slug) }}" class="nav-link position-relative rounded-0 {{ Route::currentRouteName() == 'admin.user.show' ? 'active' : null }} d-flex align-items-center justify-content-center bg-transparent fs-3 py-4">
            <i class="ti ti-user-circle me-2 fs-6"></i>
            <span class="d-none d-md-block">Account</span>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="{{ route('admin.user.show.password', $user->slug) }}" class="nav-link position-relative rounded-0 {{ Route::currentRouteName() == 'admin.user.show.password' ? 'active' : null }} d-flex align-items-center justify-content-center bg-transparent fs-3 py-4">
            <i class="ti ti-key me-2 fs-6"></i>
            <span class="d-none d-md-block">Update Password</span>
        </a>
    </li>
    {{-- <li class="nav-item" role="presentation">
        <a href="{{ route('admin.user.show.role', $user->slug) }}" class="nav-link position-relative rounded-0 {{ Route::currentRouteName() == 'admin.user.show.role' ? 'active' : null }} d-flex align-items-center justify-content-center bg-transparent fs-3 py-4">
            <i class="ti ti-user-check me-2 fs-6"></i>
            <span class="d-none d-md-block">{{ $user->firstname.' '.$user->lastname }}'s Role</span>
        </a>
    </li> --}}
    <li class="nav-item" role="presentation">
        <a href="{{ route('admin.user.show.ban', $user->slug) }}" class="nav-link position-relative rounded-0 {{ Route::currentRouteName() == 'admin.user.show.ban' ? 'active' : null }} d-flex align-items-center justify-content-center bg-transparent fs-3 py-4">
            <i class="ti ti-user-minus me-2 fs-6"></i>
            <span class="d-none d-md-block">Ban {{ $user->firstname.' '.$user->lastname }}</span>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a href="{{ route('admin.user.show.remove', $user->slug) }}" class="nav-link position-relative rounded-0 {{ Route::currentRouteName() == 'admin.user.show.remove' ? 'active' : null }} d-flex align-items-center justify-content-center bg-transparent fs-3 py-4">
            <i class="ti ti-user-x me-2 fs-6"></i>
            <span class="d-none d-md-block">Remove {{ $user->firstname.' '.$user->lastname }}</span>
        </a>
    </li>
</ul>