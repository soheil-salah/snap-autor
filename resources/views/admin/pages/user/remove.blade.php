<x-admin-app-layout>

    @push('title')
        <title>{{ config('app.name') }} - {{ $user->firstname.' '.$user->lastname }} / Remove Account</title>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/toastr/toastr.min.css') }}">
    @endpush

    <x-admin.card-header title="Remove Account" :breadcrumbs="['Home' => 'admin.dashboard', 'Users' => 'admin.user.all', $user->firstname => 'current']" />

    <div class="card">
        @include('admin.pages.user.nav-pills')

        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="card w-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <x-admin.forms.form id="remove-user">

                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                

                                <div class="p-3">
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-danger rounded-pill px-4 waves-effect waves-light">
                                            Remove {{ $user->firstname.' '.$user->lastname }} from our database
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
        // remove user
        $("#delete-user").on('submit', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.user.ajax.ban.remove') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "{{ $user->firstname }} will be removed",
                    text : "Are you sure you want to remove {{ $user->firstname }}'s account ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, I'm Sure"
                },
                swalBeforeSend: {
                    title: "Deleting {{ $user->firstname }} Account ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Account has been deleted",
                    icon: 'success',
                },
                redirect : "{{ route('admin.user.all') }}",
            });
        });
    </script>
    @endpush
</x-admin-app-layout>
