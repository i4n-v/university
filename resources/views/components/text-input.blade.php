@props(['disabled' => false, 'class' => ''])

<input {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => 'w-full rounded-md h-11 bg-gray-100 shadow-sm border border-gray-200 px-2 hover:outline-blue-600 focus:outline-blue-600' . $class]) }}>
