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
                            <h5 class="card-title fw-semibold mb-4">Change {{ $user->firstname.' '.$user->lastname }} Role</h5>
                            <x-admin.forms.form id="change-role">

                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                
                                @foreach ($roles as $role)
                                    @if($user->role != null && $user->role->belongsToRole->id == $role->id)
                                    <x-admin.forms.radio.form-check label="{{ ucfirst($role->type) }}" name="role_id" id="{{ $role->type }}" value="{{ $role->id }}" checked />
                                    @else
                                    <x-admin.forms.radio.form-check label="{{ ucfirst($role->type) }}" name="role_id" id="{{ $role->type }}" value="{{ $role->id }}" />
                                    @endif
                                @endforeach

                                <div class="p-3">
                                    <div class="form-group text-end">
                                        <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                                            Change Role
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
        // change role
        $("#change-role").on('submit', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.user.ajax.change.role') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "{{ $user->firstname.' '.$user->lastname }}'s role will be changed",
                    text : "Are you sure you want to change {{ $user->firstname }}'s role ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, I'm Sure"
                },
                swalBeforeSend: {
                    title: "Changing role for {{ $user->firstname }} ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Role has been changed",
                    icon: 'success',
                },
                // reload : true,
            });
        });
    </script>
    @endpush
</x-admin-app-layout>
