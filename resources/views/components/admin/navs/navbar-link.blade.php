<a href="{{ isset($route) ? route($route) : 'javascript:void(0);' }}" class="py-8 px-7 mt-8 d-flex align-items-center">
    <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
        @isset($img)
        <img src="{{$img}}" alt="" width="24" height="24">
        {{-- <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-account.svg" alt="" width="24" height="24"> --}}
        @endisset
    </span>
    <div class="w-75 d-inline-block v-middle ps-3">
        <h6 class="mb-1 bg-hover-primary fw-semibold"> {{ $title }}
        </h6>
        @isset($subTitle)
        <span class="d-block text-dark">{{ $subTitle }}</span>
        @endisset
    </div>
</a>