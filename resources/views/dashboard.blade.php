@php
    $columns = [
        (object) [
            'name' => 'Nome',
            'field' => 'name',
        ],
        (object) [
            'name' => 'Localização',
            'field' => 'location',
        ],
        (object) [
            'name' => 'Número de alunos',
            'field' => 'students_number',
        ],
        (object) [
            'name' => 'Número de professores',
            'field' => 'teachers_number',
        ],
        (object) [
            'name' => 'Curso mais popular',
            'field' => 'most_popular_course',
        ],
    ];
    
    $actions = [
        (object) [
            'name' => 'edit',
            'identifier' => 'id',
        ],
        (object) [
            'name' => 'delete',
            'identifier' => 'id',
        ],
    ];
    
    $universities = Auth::user()->universities->toArray();
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ openEdit: false, openRegister: false, ...university }">
        <x-message :success="session('success')" :error="session('error')" />

        <div class="max-w-[98rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-900">Listagem de registros</h2>
                        <x-primary-button x-on:click="openRegister = true">Cadastrar</x-primary-button>
                    </div>
                    <x-custom-table :columns="$columns" :actions="$actions" :data="$universities" />

                    <div x-show="openRegister">
                        <x-modal type='register' title="Cadastrar novo registro" handleClose="openRegister = false"
                            class="max-w-5xl">
                            <x-university-form />
                        </x-modal>
                    </div>

                    <div x-show="openEdit">
                        <x-modal title="Editar registro" handleClose="openEdit = false" class="max-w-5xl">
                            <x-university-form type='edit' />
                        </x-modal>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
