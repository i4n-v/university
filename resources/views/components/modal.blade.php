@props(['title', 'class', 'fullWidth', 'handleClose'])

@php
    $fullWidth = $fullWidth ?? false;
    $handleClose = $handleClose ?? '';
    $title = $title ?? '';
    $class = $class ?? '';
@endphp

<div class="absolute top-0 left-0 flex items-center px-6 bg-gray-950/40 w-full h-full position-fixed z-50 shadow-md">
    <div @class([
        'w-full mx-auto bg-white p-4 animate-down rounded-md',
        $class => true,
        'max-w-none' => $fullWidth,
        'max-w-4xl' => !$fullWidth,
    ])>
        <div class="col-span-full flex justify-between w-full border-b border-gray-200 mb-4">
            <p class="text-xl text-base-700 font-title">{{ $title }}</p>
            <img src="/icons/close.svg" alt="Ícone de fechar" x-on:click="{{ $handleClose }}"
                class="cursor-pointer w-6 h-6" />
        </div>
        {{ $slot }}
    </div>
</div>
