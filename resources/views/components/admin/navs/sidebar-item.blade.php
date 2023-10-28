<li class="sidebar-item">
    <a class="sidebar-link" href="{{ isset($route) ? route($route) : 'javascript:void(0);' }}" aria-expanded="false">
        <span>
            <i class="ti ti-{{$icon}}"></i>
        </span>
        <span class="hide-menu">{{ $title }}</span>
    </a>
</li>