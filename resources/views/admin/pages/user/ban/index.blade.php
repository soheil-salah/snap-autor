<x-admin-app-layout>

    @push('title')
        <title>{{ config('app.name') }} - {{ $user->firstname.' '.$user->lastname }} / Update Password</title>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/daterangepicker/daterangepicker.css') }}">
    @endpush

    <x-admin.card-header title="List of All Users" :breadcrumbs="['Home' => 'admin.dashboard', 'Users' => 'admin.user.all', $user->firstname => 'current']" />

    <div class="card">
        @include('admin.pages.user.nav-pills')

        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div class="card w-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-4">Ban {{ $user->firstname.' '.$user->lastname }}'s Account</h5>
                            <x-admin.forms.form id="ban-user">

                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                
                                @if($user->ban != null && $user->ban->ban_type == 'duration')
                                <x-admin.forms.radio.form-check label="By Duration" name="ban_type" id="duration" class="ban-type" value="duration" checked />
                                @else
                                <x-admin.forms.radio.form-check label="By Duration" name="ban_type" id="duration" class="ban-type" value="duration" />
                                @endif

                                @if($user->ban != null && $user->ban->ban_type == 'daterange')
                                <x-admin.forms.radio.form-check label="Date Range" name="ban_type" id="pick_daterange" class="ban-type" value="daterange" checked />
                                @else
                                <x-admin.forms.radio.form-check label="Date Range" name="ban_type" id="pick_daterange" class="ban-type" value="daterange" />
                                @endif

                                @if($user->ban != null && $user->ban->ban_type == 'forever')
                                <x-admin.forms.radio.form-check label="Forever" name="ban_type" id="forever" class="ban-type" value="forever" checked />
                                @else
                                <x-admin.forms.radio.form-check label="Forever" name="ban_type" id="forever" class="ban-type" value="forever" />
                                @endif

                                <hr>

                                <div id="ban-res"></div>

                                <div class="p-3">
                                    <div class="form-group text-end">
                                        <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                                            Ban {{ $user->firstname.' '.$user->lastname }}
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

        $.ajax({
            type: "POST",
            url : "{{ route('admin.user.ajax.ban.type') }}",
            data : {
                "_token" : "{{ csrf_token() }}",
                "ban_type" : $(".ban-type:checked").val(),
                "user_id" : "{{ $user->id }}",
            },
            beforeSend : function(){
                $("#ban-res").html('<p class="fw-bold text-center">Preview Data ... Please wait !</p>');
            },
            success : function(data){

                $("#ban-res").html(data);
            }
        });

        $(".ban-type").on('change', function(){

            $.ajax({
                type: "POST",
                url : "{{ route('admin.user.ajax.ban.type') }}",
                data : {
                    "_token" : "{{ csrf_token() }}",
                    "ban_type" : $(this).val(),
                    "user_id" : "{{ $user->id }}",
                },
                beforeSend : function(){
                    $("#ban-res").html('<p class="fw-bold text-center">Preview Data ... Please wait !</p>');
                },
                success : function(data){

                    $("#ban-res").html(data);
                }
            });
        });

        // ban user
        $("#ban-user").on('submit', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.user.ajax.ban') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "{{ $user->firstname }} will be banned",
                    text : "Are you sure you want to ban {{ $user->firstname }} ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, I'm Sure"
                },
                swalBeforeSend: {
                    title: "Banning {{ $user->firstname.' '.$user->lastname }}'s Account ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                },
                swalSuccess: {
                    title: "{{ $user->firstname.' '.$user->lastname }} has been banned",
                    icon: 'success',
                },
                // reload : true,
            });
        });
    </script>
    @endpush
</x-admin-app-layout>
