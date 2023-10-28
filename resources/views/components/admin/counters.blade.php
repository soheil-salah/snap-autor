<div class="row">

    {{-- @php
        print_r($list);
    @endphp --}}
    
    @for ($i = 0; $i < count($list); $i++)
    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
        <div class="card border-0 zoom-in bg-light-primary shadow-none">
            <div class="card-body">
                <div class="text-center">
                    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-user-male.svg" width="50" height="50" class="mb-3" alt="" />
                    <p class="fw-semibold fs-3 text-primary mb-1"> {{ $list[$i]['name'] }} </p>
                    <h5 class="fw-semibold text-primary mb-0">{{ $list[$i]['age'] }}</h5>
                </div>
            </div>
        </div>
    </div>
    @endfor
    
</div>