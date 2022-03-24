<!-- component -->
<!-- component -->
<style>
    .animated {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }

    .animated.faster {
        -webkit-animation-duration: 500ms;
        animation-duration: 500ms;
    }

    .fadeIn {
        -webkit-animation-name: fadeIn;
        animation-name: fadeIn;
    }

    .fadeOut {
        -webkit-animation-name: fadeOut;
        animation-name: fadeOut;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }
</style>

<div class="main-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div class="border border-blue-500 shadow-lg modal-container bg-white w-4/12 md:max-w-11/12 mx-auto rounded-xl shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold text-gray-500">Add Caretaker</p>
            </div>
            <!--Body-->
            <div class="my-5 mr-5 ml-5 flex justify-center">
                <form>
                    <div class="">
                        <div class="">
                            <label for="name" class="text-md text-gray-600">Name</label>
                        </div>
                        <div class="">
                            <input type="text" id="name" wire:model="name" autocomplete="off" name="name" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Example. Economía">
                        </div>
                        <div class="">
                            <label for="phone" class="text-md text-gray-600">Phone Number</label>
                        </div>
                        <div class="">
                            <input type="text" id="phone" autocomplete="off" name="phone" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Example. 0729400426">
                        </div>
                        <div class="">
                            <label for="id_number" class="text-md text-gray-600">ID Number</label>
                        </div>
                        <div class="">
                            <input type="number" id="id_number" autocomplete="off" name="id_number" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Caretaker's ID number">
                        </div>
                    </div>
                    <!--Footer-->

                    <div class="flex justify-end pt-2 space-x-14">
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
                </form>
            </div>
        </div>
    </div>
</div>

