<div class="form-group mb-3 row pb-3">
    <label for="{{ $id }}" class="col-sm-3 text-end control-label col-form-label">{{ $label }}</label>
    <div class="col-sm-9">
        <input {{ $attributes->merge(['class' => 'form-control']) }}  id="{{ $id }}" name="{{ $id }}" />
    </div>
</div>