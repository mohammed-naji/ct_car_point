@props(['label' => '', 'name', 'value' => old($name), 'placeholder' => '', 'rows' => 4])
<div class="mb-3">
    @if ($label)
        <label>{{ $label }}</label>
    @endif
    <textarea class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}"
        name="{{ $name }}" rows="{{ $rows }}">{{ $value }}</textarea>
    @error($name)
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
