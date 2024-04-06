<div x-data="{ isVisible: @entangle('isVisible') }"
     x-show.transition.duration.500ms="isVisible"
     x-init="$wire.hideToast()"
     @toastShown.window="isVisible = true"
     @click.away="isVisible = false"
     class="fixed bottom-4 right-4 bg-gray-800 text-white px-4 py-2 rounded shadow-md">
    <div>{{ $message }}</div>
</div>
