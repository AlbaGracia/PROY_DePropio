@props(['action', 'title' => __('labels.sure'), 'message' => __('labels.no-option'), 'id' => 'confirm-deletion'])

<x-modal name="{{ $id }}" focusable>
    <form method="POST" action="{{ $action }}" class="p-6">
        @csrf
        @method('DELETE')

        <h2 class="text-lg font-medium text-gray-900">{{ $title }}</h2>

        <p class="mt-1 text-sm text-gray-600">{{ $message }}</p>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">{{ __('labels.cancel') }}</x-secondary-button>
            <x-danger-button class="ms-3">{{ __('labels.delete') }}</x-danger-button>
        </div>
    </form>
</x-modal>
