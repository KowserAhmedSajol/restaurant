<x-smart-master>
    <x-smart-card>
        <x-slot name="heading">
        {{ __('ResCategorys') }}
        </x-slot>
        <x-slot name="body">
            <x-smart-alert-message :message="session('success')" type="success" />
            <x-smart-table type="basic" id="res_categoriesDatatable">
                <x-smart-thead>
                    <tr class="text-center">
                        <th>{{ __('SL') }}</th>
                        <th class="text-center">{{ ucwords(str_replace('_', ' ', 'name')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'slug')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'image')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'serial')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'color')) }}</th><th class="text-center">{{ ucwords(str_replace('_', ' ', 'is_active')) }}</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </x-smart-thead>
                <x-smart-tbody>
                @foreach($res_categories as $res_category)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $res_category->name }}</td>
                        <td class="text-center">{{ $res_category->slug }}</td>
                        <td>
                            @if($res_category->image)
                                <img src="{{ asset('storage/' . $res_category->image) }}" alt="{{ $res_category->name }}" style="height:80px;width:80px;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="text-center">{{ $res_category->serial }}</td>
                        <td class="text-center">{{ $res_category->color }}</td>
                        <td class="text-center">{{ $res_category->is_active }}</td>
                        <td class="text-center">
                            <x-smart-link-show href="{{ route('res_categories.show', $res_category->uuid) }}" />
                            <x-smart-link-edit href="{{ route('res_categories.edit', $res_category->uuid) }}" />
                            <x-smart-btn-delete action="{{ route('res_categories.destroy', $res_category->uuid) }}" method="delete" />
                        </td>
                    </tr>
                @endforeach
                </x-smart-tbody>
            </x-smart-table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-smart-link-create href="{{ route('res_categories.create') }}" />
        </x-slot>
    </x-smart-card>

    @push('js')
    <script>
        $(document).ready(function() {
            $('#res_categoriesDatatable').DataTable({
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