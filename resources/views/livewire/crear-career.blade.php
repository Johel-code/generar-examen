{{-- <style> --}}
{{--     .animated { --}}
{{--         -webkit-animation-duration: 1s; --}}
{{--         animation-duration: 1s; --}}
{{--         -webkit-animation-fill-mode: both; --}}
{{--         animation-fill-mode: both; --}}
{{--     } --}}
{{----}}
{{--     .animated.faster { --}}
{{--         -webkit-animation-duration: 500ms; --}}
{{--         animation-duration: 500ms; --}}
{{--     } --}}
{{----}}
{{--     .fadeIn { --}}
{{--         -webkit-animation-name: fadeIn; --}}
{{--         animation-name: fadeIn; --}}
{{--     } --}}
{{----}}
{{--     .fadeOut { --}}
{{--         -webkit-animation-name: fadeOut; --}}
{{--         animation-name: fadeOut; --}}
{{--     } --}}
{{----}}
{{--     @keyframes fadeIn { --}}
{{--         from { --}}
{{--             opacity: 0; --}}
{{--         } --}}
{{----}}
{{--         to { --}}
{{--             opacity: 1; --}}
{{--         } --}}
{{--     } --}}
{{----}}
{{--     @keyframes fadeOut { --}}
{{--         from { --}}
{{--             opacity: 1; --}}
{{--         } --}}
{{----}}
{{--         to { --}}
{{--             opacity: 0; --}}
{{--         } --}}
{{--     } --}}
{{-- </style> --}}
{{----}}
{{-- <div class="main-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);"> --}}
{{--     <div class="border border-blue-500 shadow-lg modal-container bg-white md:max-w-11/12 mx-auto rounded-xl shadow-lg z-50 overflow-y-auto"> --}}
{{--         <div class="modal-content py-4 text-left px-6"> --}}
{{--             <!--Title--> --}}
{{--             <div class="flex justify-between items-center pb-3"> --}}
{{--                 <p class="text-2xl font-bold text-gray-500">Carrera</p> --}}
{{--             </div> --}}
{{--             <!--Body--> --}}
{{--             <div class="my-4 mr-5 ml-5 flex justify-center"> --}}
{{--                 <form> --}}
{{--                     <div class=""> --}}
{{--                           <label for="name" class="text-md text-gray-600">Name</label> --}}
{{--                           <input type="text" id="name" wire:model="name" autocomplete="off" name="name" class="h-3 p-6 w-full text-sm text-black border-2 border-gray-300 mb-5 rounded-md" placeholder="Example. Ing. Financiera"> --}}
{{--                           <label for="phone" class="text-md text-gray-600">Facultad</label>    --}}
{{--                           <select wire:model="faculty" class="form-select appearance-none --}}
{{--                             block --}}
{{--                             w-full --}}
{{--                             px-3 --}}
{{--                             py-1.5 --}}
{{--                             text-base --}}
{{--                             font-normal --}}
{{--                             text-gray-700 --}}
{{--                             bg-white bg-clip-padding bg-no-repeat --}}
{{--                             border border-solid border-gray-300 --}}
{{--                             rounded --}}
{{--                             transition --}}
{{--                             ease-in-out --}}
{{--                             m-0 --}}
{{--                             focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"> --}}
{{--                             @foreach($faculties as $faculty) --}}
{{--                             <option value="{{$faculty->id}}">{{$faculty->name}}</option> --}}
{{--                             @endforeach --}}
{{--                         </select> --}}
{{--                     </div> --}}
{{--                     <!--Footer--> --}}
{{----}}
{{--                     <div class="flex justify-between pt-6"> --}}
{{--                         <button --}}
{{--                             wire:click="cerrarModal()"  --}}
{{--                             class="px-4 bg-gray-200 p-3 rounded text-black hover:bg-gray-300 font-semibold"> --}}
{{--                             Cancel --}}
{{--                         </button> --}}
{{--                         <button --}}
{{--                             wire:click.prevent="guardar()"  --}}
{{--                             class="px-4 bg-blue-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400"> --}}
{{--                             Guardar --}}
{{--                         </button> --}}
{{--                     </div> --}}
{{--                 </form> --}}
{{--             </div> --}}
{{--         </div> --}}
{{--     </div> --}}
{{-- </div> --}}

<div>
    <x-jet-dialog-modal wire:model="modal">

        <x-slot name="title">
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Carrera</p>
            </div>
        </x-slot>

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
