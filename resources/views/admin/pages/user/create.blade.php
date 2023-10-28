<x-admin-app-layout>

    @push('title')
        <title>{{ config('app.name') }} - Create new User</title>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/toastr/toastr.min.css') }}">
    @endpush

    <x-admin.card-header title="Create New User" :breadcrumbs="['Home' => 'admin.dashboard', 'Create New User' => 'current']" />

    <div class="card">
        <x-admin.forms.row-separator.form id="create-user">
            <h5>Personal Info</h5>
            
            <x-admin.forms.row-separator.form-group label="Firstname" id="fname" type="text" required />

            <x-admin.forms.row-separator.form-group label="Lastname" id="lname" type="text" required />

            <x-admin.forms.row-separator.form-group label="Email" id="email" type="email" required />

            <x-admin.forms.row-separator.form-group label="Password" id="password" type="password" autocomplete required />

            <x-admin.forms.row-separator.form-group label="Confirm Password" id="password_confirmation" type="password" autocomplete required />
            
            <div class="p-3">
                <div class="form-group text-end">
                    <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                        Save
                    </button>
                </div>
            </div>
        </x-admin.forms.row-separator.form>
    </div>

    @push('scripts')
    <script src="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('dist/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>

        $("#create-user").on('submit', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.user.ajax.create') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "Create new User ?",
                    text: "Are you sure you want to create a new user",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                },
                swalBeforeSend: {
                    title: "Creating New User",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "New user has been added",
                    icon: 'success',
                },
                reload : true
            });
        });

    </script>
    @endpush

</x-admin-app-layout>
