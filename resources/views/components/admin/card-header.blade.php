<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">{{ $title }}</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    @foreach($breadcrumbs as $page => $route)
                        @if($route == 'current')
                        <li class="breadcrumb-item" aria-current="page">{{ $page }}</li>
                        @else
                        <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="{{ route($route) }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    @if(isset($img))
                    <img src="{{ asset('dist/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>