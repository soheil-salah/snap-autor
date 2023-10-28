<x-admin-app-layout>

    @push('title')
    <title>{{ config('app.name') }} - {{ $post->title }}</title>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/toastr/toastr.min.css') }}">
    @endpush

    <x-admin.card-header title="{{ $post->title }}" :breadcrumbs="['Home' => 'admin.dashboard', 'Posts' => 'admin.blog.post.all', '{$post->title}' => 'current']" />

    <div class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <x-admin.forms.form id="update-thumbnail">
                        <x-admin.forms.form-group type="file" label="Thumbnail" id="thumbnail" name="thumbnail" formGroupClass="mb-4" required />

                        @if($post->thumbnail != null)
                        <img src="{{ asset('uploads/blog/posts/'.$post->slug.'/thumbnail/'.$post->thumbnail) }}" class="img-fluid" alt="{{ $post->title }}">
                        @endif

                        <div class="p-3">
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                                    Update
                                </button>
                            </div>
                        </div>
                    </x-admin.forms.form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-success float-start">Publish</button>
                    <button class="btn btn-danger float-end" id="delete-post">Delete</button>
                </div>
                <div class="card-body">
                    <x-admin.forms.form id="update-post">
        
                        <x-admin.forms.form-group-select label="Category" id="category" name="category" formGroupClass="mb-4">
                            @foreach($postCategories as $postCategory)
                            <option value="{{ $postCategory->id }}" {{ $postCategory->id == $post->post_category_id ? 'selected' : null }}>{{ $postCategory->name }}</option>
                            @endforeach
                        </x-admin.forms.form-group-select>
        
                        <x-admin.forms.form-group type="text" label="Title" id="title" name="title" formGroupClass="mb-4" required />
                        
                        <x-admin.forms.form-group type="text" label="Short Description" id="short_description" name="short_description" formGroupClass="mb-4" required />
        
                        <x-admin.forms.form-group-textarea label="Content" id="content" name="content" formGroupClass="mb-4" required />
        
        
                        <x-admin.forms.form-group type="date" label="Posted at" id="posted_at" name="posted_at" formGroupClass="mb-4" />
        
                        <x-admin.forms.form-group-select label="Tags" id="tags" multiple="" name="tags[]" formGroupClass="mb-4" required>
                            @foreach($post->tags as $tag)
                            <option value="{{ $tag->belongsToTag->id }}" selected>{{ $tag->belongsToTag->name }}</option>
                            @endforeach
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </x-admin.forms.form-group-select>
        
                        <div class="p-3">
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-info rounded-pill px-4 waves-effect waves-light">
                                    Update
                                </button>
                            </div>
                        </div>
                    </x-admin.forms.form>
                </div>
            </div>
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
                    title: "{{ $post->title }} ?",
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
                reload : true
            });
        });

        // remove post
        $("#delete-post").on('click', function(e){
            e.preventDefault();

            ajaxSwalConfirmation('click', {
                route : "{{ route('admin.blog.post.ajax.delete') }}",
                data : {
                    "_token" : "{{ csrf_token() }}",
                    "post_id" : "{{ $post->id }}",
                },
                swalConfirmation : {
                    title: "This post will be removed",
                    text : "Are you sure you want to remove this post",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, I'm Sure"
                },
                swalBeforeSend: {
                    title: "Deleting Post ... Please wait",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                },
                swalSuccess: {
                    title: "Post has been deleted",
                    icon: 'success',
                },
                redirect : "{{ route('admin.blog.post.all') }}",
            });
        });
    </script>
    @endpush

</x-admin-app-layout>