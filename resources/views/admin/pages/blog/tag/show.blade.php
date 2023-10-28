<x-admin-app-layout>

    @push('title')
        <title>{{ config('app.name') }} - {{ $tag->name }}</title>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/toastr/toastr.min.css') }}">
    @endpush

    <x-admin.card-header title="" :breadcrumbs="['Home' => 'admin.dashboard', 'Tags' => 'admin.blog.tag.all', $tag->name => 'current']" />

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="card w-100 position-relative overflow-hidden mb-0">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-4">Update Tag Name</h5>
                            <x-admin.forms.form id="update-tag-name">
                                <input type="hidden" name="tag_id" value="{{ $tag->id }}">
                                <x-admin.forms.form-group label="Tag" id="tag" name="tag" value="{{ $tag->name }}" class="mb-4" required />

                                <div class="form-group text-end">
                                    <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                                        Update
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

        // update tag
        $("#update-tag-name").on('submit', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.blog.tag.ajax.update') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "{{ $tag->name }} tag will be updated",
                    text : "Are you sure you want to update tag {{ $tag->name }} ?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, I'm Sure"
                },
                swalBeforeSend: {
                    title: "Updating tag {{ $tag->name }} ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Tag has been updated",
                    icon: 'success',
                },
                redirect : "{{ route('admin.blog.tag.all') }}"
            });
        });
    </script>
    @endpush
</x-admin-app-layout>
