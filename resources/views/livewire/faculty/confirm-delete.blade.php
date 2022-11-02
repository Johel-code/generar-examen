<div>
    <x-jet-dialog-modal wire:model="confirm_delete">

        <x-slot name="title">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Eliminar Facultad</p>
            </div>
        </x-slot>

        <x-slot name="content">
             <div class="mb-4 text-md text-gray-600">
                <label class="text-md text-gray-600">¿Está seguro de que quiere eliminar esta Facultad?</label>
            </div>            
        </x-slot>

        <x-slot name="footer">
            
            <div class="flex justify-between pt-2">
                <button
                    wire:click="$toggle('confirm_delete')" 
                    class="px-4 bg-gray-200 p-3 rounded text-black hover:bg-gray-300 font-semibold">
                    Cancel
                </button>
                <button
                    wire:click.prevent="deleteFaculty()" 
                    class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">
                    Eliminar 
                </button>
            </div>

        </x-slot>

    </x-jet-dialog-modal>
</div>
