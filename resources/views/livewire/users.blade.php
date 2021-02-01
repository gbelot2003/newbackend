<div class="p-6">
    <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
        <x-info-button class="text-right">
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
            </svg>
            {{ __('Add Administrative User') }}
        </x-info-button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Role</th>
                <th>User Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="tbody">
            @if($data->count())
            @foreach($data as $item)
            <tr class="tr">
                <td class="td">{{ $item->id }}</td>
                <td class="td">{{ $item->name }}</td>
                <td class="td">{{ $item->email }}</td>
                <td class="td">{{ $item->updated_at->format('d/m/Y') }} </td>
                <td class="td">{{ $item->roles[0]->name }}</td>
                <td class="td">
                    @if($item->state == 1)
                        Active
                    @else
                        Inactive
                    @endif
                </td>
                <td class="">
                    <div class="actions">
                        <x-jet-button wire:click="">
                            {{ __('Update') }}
                        </x-jet-button>
                        <x-jet-danger-button wire:click="">
                            {{ __('Delete') }}
                        </x-jet-danger-button>
                    </div>

                </td>
            </tr>
            @endforeach

            @else
            <tr>
                <td colspan="4">No results found</td>
            </tr>
            @endif
        </tbody>
    </table>
    {{ $data->links() }}

</div>
