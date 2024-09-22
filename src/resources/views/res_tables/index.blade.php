<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('ResTables') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-message :message="session('success')" type="success" />
            <x-smart-table type="basic" id="res_tablesDatatable">
                <x-smart-thead>
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th class="text-center">{{ ucwords(str_replace('_', ' ', 'name')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'capacity')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'status')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'color')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'is_occupied')) }}</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </x-smart-thead>
                <x-smart-tbody>
                @foreach($res_tables as $res_table)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $res_table->name }}</td><td class="text-center">{{ $res_table->capacity }}</td><td class="text-center">{{ $res_table->status }}</td><td class="text-center">{{ $res_table->color }}</td><td class="text-center">{{ $res_table->is_occupied }}</td>
                        <td class="text-center">
                            <x-smart-link-show href="{{ route('res_tables.show', $res_table->uuid) }}" />
                            <x-smart-link-edit href="{{ route('res_tables.edit', $res_table->uuid) }}" />
                            <x-smart-btn-delete action="{{ route('res_tables.destroy', $res_table->uuid) }}" method="delete" />
                        </td>
                    </tr>
                @endforeach
                </x-smart-tbody>
            </x-smart-table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_tables.create') }}" />
        </x-slot>
    </x-smart-card>

    @push('js')
    <script>
        $(document).ready(function() {
            $('#res_tablesDatatable').DataTable({
                buttons: [
                    {
                        extend: 'colvis',
                        text: '<i class="icon-grid3"></i>',
                        className: 'btn bg-indigo-400 btn-icon dropdown-toggle'
                    }
                ],
                stateSave: false,
                columnDefs: [
                    {
                        targets: 0,
                        visible: true
                    }
                ]
            });
        });
    </script>
    @endpush
</x-smart-master>