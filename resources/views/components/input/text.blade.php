@props(['name', 'type' => 'text', 'label', 'class'])

<div class="form-group {{ $class ?? '' }}">
    <label class='bmd-label-floating' for="{{ $name }}">{{ $label }}</label>

    <input id="{{ $name }}" type="{{ $type }}" class="form-control @error('{{ $name }}') is-invalid @enderror" name="{{ $name }}"
        value="{{ old($name) }}">

    @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>