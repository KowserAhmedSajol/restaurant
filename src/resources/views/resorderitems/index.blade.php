<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('ResOrderItems') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-message :message="session('success')" type="success" />
            <x-smart-table type="basic" id="res_order_itemsDatatable">
                <x-smart-thead>
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th class="text-center">{{ ucwords(str_replace('_', ' ', 'qty')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'rate')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'amount')) }}</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </x-smart-thead>
                <x-smart-tbody>
                @foreach($res_order_items as $res_order_item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $res_order_item->qty }}</td><td class="text-center">{{ $res_order_item->rate }}</td><td class="text-center">{{ $res_order_item->amount }}</td>
                        <td class="text-center">
                            <x-smart-link-show href="{{ route('res_order_items.show', $res_order_item->uuid) }}" />
                            <x-smart-link-edit href="{{ route('res_order_items.edit', $res_order_item->uuid) }}" />
                            <x-smart-btn-delete action="{{ route('res_order_items.destroy', $res_order_item->uuid) }}" method="delete" />
                        </td>
                    </tr>
                @endforeach
                </x-smart-tbody>
            </x-smart-table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_order_items.create') }}" />
        </x-slot>
    </x-smart-card>

    @push('js')
    <script>
        $(document).ready(function() {
            $('#res_order_itemsDatatable').DataTable({
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