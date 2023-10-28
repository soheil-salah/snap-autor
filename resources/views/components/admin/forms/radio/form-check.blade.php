<div class="form-check">
    <input {{ $attributes->merge(['class' => 'form-check-input', 'id' => $id, 'type' => 'radio']) }}>
    <label class="form-check-label" for="{{ $id }}">
        {{ $label }}
    </label>
</div>
