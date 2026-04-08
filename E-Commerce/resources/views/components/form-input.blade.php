@props([
    'label',
    'name',
    'type' => 'text',
    'value' => '',
])

<div class="space-y-2">
    <label for="{{ $name }}" class="block text-sm font-medium text-stone-700">{{ $label }}</label>
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        {{ $attributes->merge(['class' => 'w-full rounded-lg border border-stone-300 bg-white px-4 py-2.5 outline-none ring-0 transition focus:border-stone-900']) }}
    >
</div>
