<x-admin-app-layout>

    @push('title')
    <title>{{ config('app.name') }} - List of all Tags</title>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('dist/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/toastr/toastr.min.css') }}">
    @endpush

    <x-admin.card-header title="List of All Tags" :breadcrumbs="['Home' => 'admin.dashboard', 'Tags' => 'current']" />

    <div class="card">
        <div class="card-header">
            <h5 class="card-title fw-semibold float-start">Tags ({{$countTags}})</h5>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#tagsModal">
                Create new Tag
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="tagsModal" tabindex="-1" aria-labelledby="tagsModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tagsModalLabel">Create New Tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <x-admin.forms.form id="create-tags">
                        <div class="modal-body">
                            <x-admin.forms.form-group-select label="Tags" id="tags" multiple="" name="tags[]" formGroupClass="mb-4 w-100"></x-admin.forms.form-group-select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </x-admin.forms.form>
                </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('dist/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('dist/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('dist/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {{ $dataTable->scripts() }}
    <script>
        $("#tags").select2({
            tags: true,
            width:'100%'
        });

        $("#create-tags").on('submit', function(e){
            e.preventDefault();
        
            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.blog.tag.ajax.create') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "Create new Tag(s) ?",
                    text: "You are about to create a new tag(s)",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                },
                swalBeforeSend: {
                    title: "Creating New Tag(s) ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Tag(s) has been created",
                    icon: 'success',
                },
                reload : true
            });
        });
    </script>
    @endpush

</x-admin-app-layout>
