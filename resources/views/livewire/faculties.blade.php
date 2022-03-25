<div class="bg-white px-10 rounded-md w-full">
	<div class=" flex items-center justify-between pb-6">
		<div>
			<h2 class="text-gray-600 font-semibold">Products Oder</h2>
			<span class="text-xs">All products item</span>
		</div>
		<div class="flex items-center justify-between">
				<div class="flex bg-gray-50 items-center p-2 rounded-md">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
						fill="currentColor">
						<path fill-rule="evenodd"
							d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
							clip-rule="evenodd" />
					</svg>
					<input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id="" placeholder="search...">
				</div>
				<div class="ml-10 space-x-8">
					<button 
						wire:click="crear()" 
						class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
						Create
					</button>
					@if($modal)
						@include('livewire.crear')
					@endif
				</div>
		</div>
	</div>
	<div>
		@if(session()->has('message'))
			<div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
				<div class="flex">
					<div>
						<h4>{{ session('message')}}</h4>
					</div>
				</div>
			</div>
		@endif
		@livewire('tabla')
	</div>
</div>

	

	
