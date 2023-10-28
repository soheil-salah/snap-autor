<form {{ $attributes->merge(['class' => 'form-horizontal r-separator']) }}>
    @csrf
    <div class="card-body">
        {{ $slot }}
    </div>
</form>