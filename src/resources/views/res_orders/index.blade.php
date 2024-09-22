<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('ResOrders') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-message :message="session('success')" type="success" />
            <x-smart-table type="basic" id="res_ordersDatatable">
                <x-smart-thead>
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th class="text-center">{{ ucwords(str_replace('_', ' ', 'order_no')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'order_date')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'total_qty')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'status')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'order_time')) }}</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </x-smart-thead>
                <x-smart-tbody>
                @foreach($res_orders as $res_order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $res_order->order_no }}</td><td class="text-center">{{ $res_order->order_date }}</td><td class="text-center">{{ $res_order->total_qty }}</td><td class="text-center">{{ $res_order->status }}</td><td class="text-center">{{ $res_order->order_time }}</td>
                        <td class="text-center">
                            <x-smart-link-show href="{{ route('res_orders.show', $res_order->uuid) }}" />
                            <x-smart-link-edit href="{{ route('res_orders.edit', $res_order->uuid) }}" />
                            <x-smart-btn-delete action="{{ route('res_orders.destroy', $res_order->uuid) }}" method="delete" />
                        </td>
                    </tr>
                @endforeach
                </x-smart-tbody>
            </x-smart-table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_orders.create') }}" />
        </x-slot>
    </x-smart-card>

    @push('js')
    <script>
        $(document).ready(function() {
            $('#res_ordersDatatable').DataTable({
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