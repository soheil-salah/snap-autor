<div class="form-group {{ isset($formGroupClass) ? $formGroupClass : null }}">
    <label for="{{ $id }}" class="form-label fw-semibold">{{ isset($label) ? $label : null }}</label>
    <textarea {{ $attributes->merge(['class' => 'form-control', 'id' => $id]) }}></textarea>
</div>