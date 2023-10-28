<x-admin-app-layout>

    @push('title')
        <title>{{ config('app.name') }} - {{ $user->firstname.' '.$user->lastname }}</title>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/toastr/toastr.min.css') }}">
    @endpush

    <x-admin.card-header title="List of All Users" :breadcrumbs="['Home' => 'admin.dashboard', 'Users' => 'admin.user.all', $user->firstname => 'current']" />

    <div class="card">
        @include('admin.pages.user.nav-pills')
        
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="card w-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-3">Change Image Profile</h5>
                            <div class="text-center">
                                @if($user->info != null && $user->info->image != null)
                                <img src="{{ asset('uploads/users/'.$user->slug.'/personal-image/'.$user->info->image) }}" alt="" class="img-fluid rounded-circle" width="120" height="120">
                                @else
                                <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="img-fluid rounded-circle" width="120" height="120">
                                @endif
                                <x-admin.forms.form id="update-image">

                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    
                                    <x-admin.forms.form-group type="file" id="image" name="image" class="mb-3" required />

                                    <p>Allowed JPG, GIF or PNG. <b class="text-danger">Recommened size of 200 KB</b></p>
    
                                    <div class="form-group text-end">
                                        <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                                            {{ $user->info != null && $user->info->image != null ? 'Change Image' : 'Upload New Image'}}
                                        </button>
                                        @if($user->info != null && $user->info->image != null)
                                        <button type="button" class="btn btn-danger rounded-pill px-4 waves-effect waves-light" id="remove-image" data-user-id="{{ $user->id }}">
                                            Remove
                                        </button>
                                        @endif
                                    </div>
                                </x-admin.forms.form>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="card w-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-3">Update Public User Info</h5>
                            <x-admin.forms.form id="update-info">

                                <input type="hidden" name="user_id" value="{{$user->id}}">

                                <x-admin.forms.form-group label="Firstname" id="fname" name="fname" value="{{ $user->firstname }}" class="mb-4" required />
                                    
                                <x-admin.forms.form-group label="Lastname" id="lname" name="lname" value="{{ $user->lastname }}" class="mb-4" required />

                                <x-admin.forms.form-group label="Email" id="email" name="email" value="{{ $user->email }}" class="mb-4" required />

                                <div class="form-group text-end">
                                    <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                                        Update
                                    </button>
                                </div>
                            </x-admin.forms.form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card w-100 position-relative overflow-hidden mb-0">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-4">Update Personal Details</h5>
                            <x-admin.forms.form id="update-personal-info">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <x-admin.forms.form-group label="Phone" id="phone" name="phone" value="{{ $user->info != null ? $user->info->phone : null }}" placeholder="{{ $user->info != null ? $user->info->phone : 'N / A' }}" class="mb-4" />
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <x-admin.forms.form-group label="Country" id="country" name="country" value="{{ $user->info != null ? $user->info->country : null }}" placeholder="{{ $user->info != null ? $user->info->country : 'N / A' }}" class="mb-4" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <x-admin.forms.form-group label="City" id="city" name="city" value="{{ $user->info != null ? $user->info->city : null }}" placeholder="{{ $user->info != null ? $user->info->city : 'N / A' }}" class="mb-4" />
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <x-admin.forms.form-group label="Address" id="address" name="address" value="{{ $user->info != null ? $user->info->address : null }}" placeholder="{{ $user->info != null ? $user->info->address : 'N / A' }}" class="mb-4" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <x-admin.forms.form-group label="Facebook" id="facebook" name="facebook" value="{{ $user->info != null ? $user->info->facebook : null }}" placeholder="{{ $user->info != null ? $user->info->facebook : 'N / A' }}" class="mb-4" />
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <x-admin.forms.form-group label="Twitter" id="twitter" name="twitter" value="{{ $user->info != null ? $user->info->twitter : null }}" placeholder="{{ $user->info != null ? $user->info->twitter : 'N / A' }}" class="mb-4" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <x-admin.forms.form-group label="YouTube Channel" id="youtube" name="youtube" value="{{ $user->info != null ? $user->info->youtube : null }}" placeholder="{{ $user->info != null ? $user->info->youtube : 'N / A' }}" class="mb-4" />
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <x-admin.forms.form-group label="TikTok Account" id="tiktok" name="tiktok" value="{{ $user->info != null ? $user->info->tiktok : null }}" placeholder="{{ $user->info != null ? $user->info->tiktok : 'N / A' }}" class="mb-4" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <x-admin.forms.form-group label="SnapChat" id="snapchat" name="snapchat" value="{{ $user->info != null ? $user->info->snapchat : null }}" placeholder="{{ $user->info != null ? $user->info->snapchat : 'N / A' }}" class="mb-4" />
                                    </div>
                                </div>

                                <div class="form-group text-end">
                                    <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                                        Update Personal Info
                                    </button>
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

        // update info
        $("#update-info").on('submit', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.user.ajax.update.info') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "{{ $user->firstname }} info will be updated",
                    text : "Are you sure you want to update public info for {{ $user->firstname }} ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, I'm Sure"
                },
                swalBeforeSend: {
                    title: "Updating public info for {{ $user->firstname }} ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Public info has been updated",
                    icon: 'success',
                },
            });
        });

        // update personal info
        $("#update-personal-info").on('submit', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.user.ajax.update.personal-info') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "{{ $user->firstname }} personal info will be updated",
                    text : "Are you sure you want to update personal info for {{ $user->firstname }} ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, I'm Sure"
                },
                swalBeforeSend: {
                    title: "Updating personal info for {{ $user->firstname }} ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Personal info has been updated",
                    icon: 'success',
                },
            });
        });

        // update image
        $("#update-image").on('submit', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.user.ajax.update.image') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "{{ $user->firstname }} image will be updated",
                    text : "Are you sure you want to update {{ $user->firstname }} image ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, I'm Sure"
                },
                swalBeforeSend: {
                    title: "Updating Image",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Image has been updated",
                    icon: 'success',
                },
                reload: true,
            });
        });

        // remove image
        $("#remove-image").on('click', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('click', {
                route : "{{ route('admin.user.ajax.remove.image') }}",
                data : {
                    "_token" : "{{ csrf_token() }}",
                    "user_id" : $(this).data("user-id"),
                },
                swalConfirmation : {
                    title: "{{ $user->firstname }} image will be removed",
                    text : "Are you sure you want to remove {{ $user->firstname }} image ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, I'm Sure"
                },
                swalBeforeSend: {
                    title: "Removing Image ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Image has been removed",
                    icon: 'success',
                },
                reload: true,
            });
        });
    </script>
    @endpush
</x-admin-app-layout>
