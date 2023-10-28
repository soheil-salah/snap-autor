<x-admin-app-layout>

    @push('title')
    <title>{{ config('app.name') }} - List of all Users</title>
    @endpush

    @push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    @endpush

    <x-admin.card-header title="List of All Users" :breadcrumbs="['Home' => 'admin.dashboard', 'Users' => 'current']" />

    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Users ({{$countUsers}})</h5>
            {{ $dataTable->table() }}
        </div>
    </div>

    @push('scripts')

    
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {{ $dataTable->scripts() }}

    @endpush

</x-admin-app-layout>
