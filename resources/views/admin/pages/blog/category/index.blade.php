<x-admin-app-layout>

    @push('title')
    <title>{{ config('app.name') }} - List of all Blog Categories</title>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/toastr/toastr.min.css') }}">
    @endpush

    <x-admin.card-header title="List of All Blog Categories" :breadcrumbs="['Home' => 'admin.dashboard', 'Blog Categories' => 'current']" />

    <div class="card">
        <div class="card-header">
            <h5 class="card-title fw-semibold float-start">Blog Categories ({{$countPostCategory}})</h5>


            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#categoryModal">
                Create new Category
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModalLabel">Create New Tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <x-admin.forms.form id="create-category">
                        <div class="modal-body">
                            <x-admin.forms.form-group label="Category Name" id="category" />
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
    <script src="{{ asset('dist/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {{ $dataTable->scripts() }}
    <script>
        $("#create-category").on('submit', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.blog.category.ajax.create') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "Create new Category ?",
                    text: "You are about to create a new category",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                },
                swalBeforeSend: {
                    title: "Creating New Category ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Category has been created",
                    icon: 'success',
                },
                // reload : true
            });
        });
    </script>
    @endpush

</x-admin-app-layout>
