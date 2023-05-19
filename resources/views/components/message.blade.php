@props(['success' => '', 'error' => ''])

@if ($success || $error)
    <div id="message" @class([
        'py-2 px-4 w-full max-w-fit rounded-md absolute top-20 left-[40%] animate-down',
        'bg-green-300' => !$error,
        'bg-red-300' => !$success,
    ])>
        <span @class([
            'font-semibold',
            'text-green-800' => !$error,
            'text-red-800' => !$success,
        ])>{{ $success }}</span>
    </div>
@endif
