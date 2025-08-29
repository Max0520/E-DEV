<x-filament::page>
    <form wire:submit.prevent="send" class="space-y-4">
        {{ $this->form }}

        <x-filament::button type="submit" class="bg-primary-600 hover:bg-primary-700">
            Envoyer la Newsletter
        </x-filament::button>
    </form>
</x-filament::page>
