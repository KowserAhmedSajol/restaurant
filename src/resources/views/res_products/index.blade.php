<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('ResProducts') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-message :message="session('success')" type="success" />
            <x-smart-table type="basic" id="res_productsDatatable">
                <x-smart-thead>
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th class="text-center">{{ ucwords(str_replace('_', ' ', 'name')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'price')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'image')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'status')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'serial')) }}</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </x-smart-thead>
                <x-smart-tbody>
                @foreach($res_products as $res_product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $res_product->name }}</td><td class="text-center">{{ $res_product->price }}</td><td class="text-center">{{ $res_product->image }}</td><td class="text-center">{{ $res_product->status }}</td><td class="text-center">{{ $res_product->serial }}</td>
                        <td class="text-center">
                            <x-smart-link-show href="{{ route('res_products.show', $res_product->uuid) }}" />
                            <x-smart-link-edit href="{{ route('res_products.edit', $res_product->uuid) }}" />
                            <x-smart-btn-delete action="{{ route('res_products.destroy', $res_product->uuid) }}" method="delete" />
                        </td>
                    </tr>
                @endforeach
                </x-smart-tbody>
            </x-smart-table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_products.create') }}" />
        </x-slot>
    </x-smart-card>

    @push('js')
    <script>
        $(document).ready(function() {
            $('#res_productsDatatable').DataTable({
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