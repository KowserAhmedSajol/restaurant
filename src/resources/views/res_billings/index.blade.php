<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('ResBillings') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-message :message="session('success')" type="success" />
            <x-smart-table type="basic" id="res_billingsDatatable">
                <x-smart-thead>
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th class="text-center">{{ ucwords(str_replace('_', ' ', 'status')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'date')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'time')) }}</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </x-smart-thead>
                <x-smart-tbody>
                @foreach($res_billings as $res_billing)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $res_billing->status }}</td><td class="text-center">{{ $res_billing->date }}</td><td class="text-center">{{ $res_billing->time }}</td>
                        <td class="text-center">
                            <x-smart-link-show href="{{ route('res_billings.show', $res_billing->uuid) }}" />
                            <x-smart-link-edit href="{{ route('res_billings.edit', $res_billing->uuid) }}" />
                            <x-smart-btn-delete action="{{ route('res_billings.destroy', $res_billing->uuid) }}" method="delete" />
                        </td>
                    </tr>
                @endforeach
                </x-smart-tbody>
            </x-smart-table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_billings.create') }}" />
        </x-slot>
    </x-smart-card>

    @push('js')
    <script>
        $(document).ready(function() {
            $('#res_billingsDatatable').DataTable({
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