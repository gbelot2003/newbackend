<div class="p-6">
    <x-jet-button wire:click="createShowModal">
        {{ __('Create') }}
    </x-jet-button>

    {{--The data Table--}}


    <table class="min-w-full divide-y divide-gray-200 mt-5">
        <thead>
            <tr>
                <th class="dtr">Title</th>
                <th class="dtr">Link</th>
                <th class="dtr">Content</th>
                <th class="dtr">Actions</th>
            </tr>
        </thead>
        <tbody class="bd-wite divide-y divide-gray-200">
            @if($data->count())
            @foreach($data as $item)
            <tr>
                <td class="dtd">{{ $item->title }}</td>
                <td class="dtd">
                    <a target="_blank" class="text-indigo-600 hover:text-indigo-900" href="{{ URL::to('/'. $item->slug) }}">{{ $item->slug }}
                    </a>

                </td>
                <td class="dtd">{!! substr($item->content, 0, 50) !!}</td>
                <td class="px-6 py-4 text-ms text-rigth">
                    <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                        {{ __('Update') }}
                    </x-jet-button>
                    <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                        {{ __('Delete') }}
                        </x-jet-button>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="px-6 py-4 text-ms whitespace-no-wrap" colspan="4">No results Found</td>
            </tr>
            @endif

        </tbody>
    </table>

    {{ $data->links() }}

    {{--The Modal --}}

    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Save Pages') }} {{ $modalId }}
        </x-slot>

        <x-slot name="content">

            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <x-jet-input id="title" class="block mt-1 w-full" wire:model.dobounce.800ms="title" type="text" name="title" required />
                @error('title') <span class="error">{{ $message}}</span>@enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('Slug') }}" />
                <div class="mt-1 flex rounded-md shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                        http://localhost:8000/
                    </span>
                    <input wire:model="slug" type="text" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="url-slug">

                </div>
                @error('slug') <span class="error">{{ $message}}</span>@enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="title" value="{{ __('Content') }}" />
                <div class="rounded-md shadow-sm">
                    <div class="mt-1 bg-white">
                        <div class="body-content" wire:ignore>
                            <trix-editor class="trix-content" x-ref="trix" wire:model.debounce.100000ms="content" wire:key="trix-content-unique-key">
                            </trix-editor>
                        </div>
                    </div>
                </div>
                @error('content') <span class="error">{{ $message}}</span>@enderror
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            @if($modalId)
            <x-jet-button class="ml-2" wire:loading.attr="disabled" wire:click="update">
                {{ __('Update') }}
                </x-jet-danger-button>
                @else
                <x-jet-button class="ml-2" wire:loading.attr="disabled" wire:click="create">
                    {{ __('Create') }}
                    </x-jet-danger-button>
                    @endif

        </x-slot>
    </x-jet-dialog-modal>

    {{-- delete modal --}}
    <x-jet-dialog-modal wire:model="modalDeletePage">
        <x-slot name="title">
            {{ __('Delete Page') }}
        </x-slot>

        <x-slot name="content">
            <p class="text-justify">
                {{ __('Are you sure you want to delete the page ')}} <span class="text-red-900 text-bold uppercase">"{{ $title }}"</span>
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
            </p>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalDeletePage')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deletePage" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
