@props(['name', 'label', 'required' => null, 'type' => 'text','maxlength' => null, 'minlength' => null, 'options' => [], 'errors'=> null])

<div  class="form-group">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @if($type == 'select')
    <select class="form-select"  name="{{ $name }}" id="{{ $name }}" @if($required) required @endif>
            <option value="">Select {{ $label }}</option>
            @foreach ($options as $option)
                <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
            @endforeach
        </select>
    @else
    <input class="form-control @if($errors && $errors->has($name)) is-invalid @endif" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" @if($required) required @endif @if($maxlength) maxlength="{{ $maxlength }}" @endif @if($minlength) minlength="{{ $minlength }}" @endif/>
        @if($errors && $errors->has($name))
            <div class="invalid-feedback">{{ $errors->first($name) }}</div>
        @endif
    @endif
</div>
