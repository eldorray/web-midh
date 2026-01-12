@props([
    'label' => null,
    'error' => null,
    'options' => [],
    'value' => null,
    'placeholder' => 'Select an option',
])

<div class="space-y-2">
    @if($label)
        <label class="text-sm font-medium text-[hsl(var(--foreground))]">
            {{ $label }}
        </label>
    @endif
    
    <select {{ $attributes->merge(['class' => 'input cursor-pointer' . ($error ? ' border-[hsl(var(--destructive))]' : '')]) }}>
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $optValue => $text)
            <option value="{{ $optValue }}" {{ $value == $optValue ? 'selected' : '' }}>{{ $text }}</option>
        @endforeach
    </select>
    
    @if($error)
        <p class="text-sm text-[hsl(var(--destructive))]">{{ $error }}</p>
    @endif
</div>
