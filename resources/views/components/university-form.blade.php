@props(['type' => 'register'])

<form id="{{ $type }}" method="POST" action="{{ route('university.store') }}" class="grid grid-cols-2 gap-5">
    @csrf

    @if ($type == 'edit')
        @method('put')
    @endif

    <div class="flex flex-col gap-1 col-span-full">
        <x-input-label for="{{ $type }}-name" :value="__('Nome')" />
        <x-text-input id="{{ $type }}-name" name="name" required />
    </div>

    <div class="flex flex-col gap-1">
        <x-input-label for="{{ $type }}-location" :value="__('Localização')" />
        <x-text-input id="{{ $type }}-location" name="location" />
    </div>

    <div class="flex flex-col gap-1">
        <x-input-label for="{{ $type }}-students_number" :value="__('Número de alunos')" />
        <x-text-input id="{{ $type }}-students_number" type="number" name="students_number" />
    </div>

    <div class="flex flex-col gap-1">
        <x-input-label for="{{ $type }}-teachers_number" :value="__('Número de professores')" />
        <x-text-input id="{{ $type }}-teachers_number" type="number" name="teachers_number" />
    </div>

    <div class="flex flex-col gap-1">
        <x-input-label for="{{ $type }}-most_popular_course" :value="__('Curso mais popular')" />
        <x-text-input id="{{ $type }}-most_popular_course" name="most_popular_course" />
    </div>

    @if ($type == 'register')
        <x-primary-button>Cadastrar</x-primary-button>
    @endif

    @if ($type == 'edit')
        <x-primary-button>Salvar</x-primary-button>
    @endif
</form>
