<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('ResTaxs') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-message :message="session('success')" type="success" />
            <x-smart-table type="basic" id="res_taxesDatatable">
                <x-smart-thead>
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th class="text-center">{{ ucwords(str_replace('_', ' ', 'name')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'percentage')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'status')) }}</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </x-smart-thead>
                <x-smart-tbody>
                @foreach($res_taxes as $res_tax)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $res_tax->name }}</td><td class="text-center">{{ $res_tax->percentage }}</td><td class="text-center">{{ $res_tax->status }}</td>
                        <td class="text-center">
                            <x-smart-link-show href="{{ route('res_taxes.show', $res_tax->uuid) }}" />
                            <x-smart-link-edit href="{{ route('res_taxes.edit', $res_tax->uuid) }}" />
                            <x-smart-btn-delete action="{{ route('res_taxes.destroy', $res_tax->uuid) }}" method="delete" />
                        </td>
                    </tr>
                @endforeach
                </x-smart-tbody>
            </x-smart-table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_taxes.create') }}" />
        </x-slot>
    </x-smart-card>

    @push('js')
    <script>
        $(document).ready(function() {
            $('#res_taxesDatatable').DataTable({
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