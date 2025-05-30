@props(['action', 'id', 'title' => __('labels.sure'), 'message' => __('labels.no-option')])

<x-modal name="{{ $id }}" focusable>
    <form method="POST" action="{{ $action }}" class="p-6" x-data
        x-on:submit.prevent="
            $el.submit();
            setTimeout(() => {
                $dispatch('close');
                document.getElementById('success-{{ $id }}').classList.remove('hidden');
            }, 30000);
          ">
        @csrf
        @method('POST')

        <h2 class="text-lg font-medium text-gray-900">{{ $title }}</h2>
        <p class="mt-1 text-sm text-gray-600">{{ $message }}</p>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">{{ __('labels.cancel') }}</x-secondary-button>
            <x-check-button class="ms-3">{{ __('labels.confirm') }}</x-check-button>
        </div>
    </form>
</x-modal>
