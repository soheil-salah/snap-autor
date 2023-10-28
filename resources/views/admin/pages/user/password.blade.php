<x-admin-app-layout>

    @push('title')
        <title>{{ config('app.name') }} - {{ $user->firstname.' '.$user->lastname }} / Update Password</title>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/toastr/toastr.min.css') }}">
    @endpush

    <x-admin.card-header title="List of All Users" :breadcrumbs="['Home' => 'admin.dashboard', 'Users' => 'admin.user.all', $user->firstname => 'current']" />

    <div class="card">
        @include('admin.pages.user.nav-pills')

        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="card w-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold">Change Password</h5>
                            <p class="card-subtitle mb-4">To change your password please confirm here</p>
                            <x-admin.forms.form id="update-password">

                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <x-admin.forms.form-group label="Password" id="password" name="password" type="password" class="mb-4" autocomplete required />
                
                                <x-admin.forms.form-group label="Confirm Password" id="password_confirmation" name="password_confirmation" type="password" autocomplete required />
                                
                                <div class="p-3">
                                    <div class="form-group text-end">
                                        <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                                            Update Password
                                        </button>
                                    </div>
                                </div>
                            </x-admin.forms.form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('dist/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>
        // update password
        $("#update-password").on('submit', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.user.ajax.update.password') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "{{ $user->firstname }} password will be updated",
                    text : "Are you sure you want to update {{ $user->firstname }}'s password ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, I'm Sure"
                },
                swalBeforeSend: {
                    title: "Updating password for {{ $user->firstname }} ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Password has been updated",
                    icon: 'success',
                },
                reload : true,
            });
        });
    </script>
    @endpush
</x-admin-app-layout>
