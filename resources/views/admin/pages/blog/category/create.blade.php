<x-admin-app-layout>

    @push('title')
    <title>{{ config('app.name') }} - Create new Post</title>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/toastr/toastr.min.css') }}">
    @endpush

    <x-admin.card-header title="Create new Post" :breadcrumbs="['Home' => 'admin.dashboard', 'Create new Post' => 'current']" />

    <div class="card">
        <div class="card-body">
            <x-admin.forms.form id="create-post">

                <x-admin.forms.form-group-select label="Category" id="category" name="category" formGroupClass="mb-4">
                    <option>orange</option>
                    <option>white</option>
                    <option>purple</option>
                    <option value="red">red</option>
                    <option value="blue" selected>blue</option>
                    <option value="green" selected>green</option>
                </x-admin.forms.form-group-select>

                <x-admin.forms.form-group type="text" label="Title" id="title" name="title" formGroupClass="mb-4" />
                
                <x-admin.forms.form-group type="text" label="Short Description" id="short_description" formGroupClass="mb-4" />

                <x-admin.forms.form-group-textarea label="Content" id="content" name="content" formGroupClass="mb-4" />

                <x-admin.forms.form-group type="file" label="Thumbnail (Optional)" id="title" formGroupClass="mb-4" />

                <x-admin.forms.form-group type="date" label="Posted at" id="posted_at" formGroupClass="mb-4" />

                <x-admin.forms.form-group-select label="Tags" id="tags" multiple="" name="tags[]" formGroupClass="mb-4">
                    <option>orange</option>
                    <option>white</option>
                    <option>purple</option>
                    <option value="red">red</option>
                    <option value="blue" selected>blue</option>
                    <option value="green" selected>green</option>
                </x-admin.forms.form-group-select>

                <div class="p-3">
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                            Save
                        </button>
                    </div>
                </div>
            </x-admin.forms.form>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script src="{{ asset('dist/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('dist/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('dist/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script>
        CKEDITOR.replace( 'content' );

        $("#category").select2();

        $("#tags").select2({
            tags: true,
        });

        $("#create-post").on('submit', function(e){
            e.preventDefault();

            for (var i in CKEDITOR.instances) {
                CKEDITOR.instances[i].updateElement();
            }
        
            ajaxSwalConfirmation('submit', {
                route : "{{ route('admin.blog.post.ajax.create') }}",
                data : new FormData(this),
                swalConfirmation : {
                    title: "Create new Post ?",
                    text: "You are about to create a new post",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                },
                swalBeforeSend: {
                    title: "Creating New Post ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Post has been created",
                    icon: 'success',
                },
                // reload : true
            });
        });
    </script>
    @endpush

</x-admin-app-layout>
