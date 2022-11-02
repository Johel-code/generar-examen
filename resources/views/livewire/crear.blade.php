<div>
    <x-jet-dialog-modal wire:model="modal">

        <x-slot name="title">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Facultad</p>
            </div>
        </x-slot>

        <x-slot name="content">
            
             <div class="mb-4 text-md text-gray-600">
                <label for="name" class="text-md text-gray-600">Name</label>
                <input type="text" id="name" wire:model="name" autocomplete="off" wire:keydown.enter="guardar()"
                name="name" class="h-3 p-6 w-full text-sm text-black border-2 border-gray-300 rounded-md" placeholder="Example. Economía">

            <x-jet-input-error for="name" />
            </div>

        </x-slot>

        <x-slot name="footer">
            
            <div class="flex justify-between pt-2">
                <button
                    wire:click="cerrarModal()" 
                    class="px-4 bg-gray-200 p-3 rounded text-black hover:bg-gray-300 font-semibold">
                    Cancel
                </button>
                <button
                    wire:click.prevent="guardar()" 
                    class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">
                    Guardar
                </button>
            </div>

        </x-slot>

    </x-jet-dialog-modal>
</div>
