@props(['message', 'handleClose', 'handleConfirm'])

@php
    $message = $message ?? '';
    $handleClose = $handleClose ?? '';
    $handleConfirm = $handleConfirm ?? '';
@endphp

<x-modal handleClose="{{ $handleClose }}">
    <p class="text-xl text-gray-700 text-center mb-12">{{ $message }}</p>
    <div class="flex justify-between max-w-[80%] m-auto">
        <x-primary-button x-on:click="{{ $handleConfirm }}" type="button">Confirmar</x-primary-button>
        <x-primary-button x-on:click="{{ $handleClose }}" class="bg-red-600 hover:bg-red-800">Cancelar</x-primary-button>
    </div>
</x-modal>
