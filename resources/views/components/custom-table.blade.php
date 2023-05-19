@props(['data', 'columns', 'actions', 'class'])

@php
    $class = $class ?? '';
    $data = $data ?? [];
    $columns = $columns ?? [];
    $actions = $actions ?? [];
@endphp

<div x-data="{
    ...university,
    openConfirm: false,
    handler: '',
}">
    <table {{ $attributes->merge(['class' => 'w-full shadow-sm rounded-sm' . $class]) }}>
        <thead>
            <tr class="bg-gray-800 h-12">
                @for ($i = 0; $i < count($columns); $i++)
                    <th @class([
                        'text-white text-left pl-4 border-r-2 border-gray-700',
                        'rounded-tl-md' => $i == 0,
                        'rounded-tr-md' => count($actions) == 0 && $i == count($columns) - 1,
                    ])>{{ $columns[$i]->name }}</th>
                @endfor

                @if (count($actions) > 0)
                    <th class="text-white text-left pl-4 rounded-tr-md">
                        Ações
                    </th>
                @endif
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($data); $i++)
                @php
                    $row = $data[$i];
                @endphp
                <tr @class([
                    'bg-gray-100' => $i % 2 == 0,
                ])>
                    @foreach ($columns as $column)
                        <td class="text-sm text-gray-950 pl-4 py-2">
                            {{ $row[$column->field] }}
                        </td>
                    @endforeach

                    <td class="text-sm text-gray-950 pl-4 py-2 flex gap-2">
                        @foreach ($actions as $action)
                            @switch($action->name)
                                @case('edit')
                                    <button class="rounded-full hover:bg-gray-200 transition ease-in-out delay-150 p-2"
                                        x-on:click="openEdit = true; getUniversity({{ $row[$action->identifier] }})">
                                        <img src="/icons/edit.svg" alt="edit icon" class="w-6 h-6">
                                    </button>
                                @break

                                @case('delete')
                                    <button class="rounded-full hover:bg-gray-200 transition ease-in-out delay-150 p-2"
                                        x-on:click="openConfirm = true; identifier = {{ $row[$action->identifier] }}">
                                        <img src="/icons/delete.svg" alt="delete icon" class="w-6 h-6">
                                    </button>
                                @break

                                @default
                            @endswitch
                        @endforeach
                    </td>
                </tr>
            @endfor
        <tbody>
    </table>
    @if (count($data) === 0)
        <p class="text-lg text-gray-500 text-center my-5">Nenhuma registro encontrado.</p>
    @endif
    <div x-show="openConfirm">
        <x-confirm-modal message="Você realmente deseja excluir esse registro?"
            handleConfirm="deleteUniversity(identifier)" handleClose="openConfirm = false; cleanUniversity()" />
    </div>
</div>
