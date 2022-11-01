<div>
    <button wire:click="$set('open', true)" 
            class="bg-orange-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer hover:bg-orange-700 transition duration-300" >
        Crear
    </button>


    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Carrera</p>
            </div>
        </x-slot>

    <form>
        <x-slot name="content">
            
             <div class="mb-4 text-md text-gray-600">
                <label for="name" class="text-md text-gray-600">Name</label>
                <input type="text" id="name" wire:model="name" autocomplete="off" name="name" class="h-3 p-6 w-full text-sm text-black border-2 border-gray-300 rounded-md" placeholder="Example. Ing. Financiera">

            <x-jet-input-error for="name" />
            </div>

            <div class = "mb-4">
                <label for="phone" class="text-md text-gray-600">Facultad</label>   
                <select required wire:model="faculty" class="form-select appearance-none
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                    <option hidden >Desplega este menú</option>
                     @foreach($faculties as $faculty)
                        <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                     @endforeach
                </select>

            <x-jet-input-error for="faculty" />

            </div>

        </x-slot>

        <x-slot name="footer">
            
            <div class="flex justify-between pt-6">
                <button
                    wire:click="$set('open', false)" 
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
    </form>

    </x-jet-dialog-modal>
</div>
