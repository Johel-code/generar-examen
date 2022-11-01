<div class="bg-transparent w-full pt-10">
	<div class=" flex items-center justify-between">
		<div class="">
			<button 
				wire:click="crear()" 
				class="bg-orange-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer hover:bg-orange-700 transition duration-300">
				Create
			</button>
			@if($modal)
				@include('livewire.crear')
			@endif
		</div>
		<div class="bg-white rounded flex items-center w-full max-w-md shadow-sm border border-gray-200">
			<button class="outline-none focus:outline-none">
			<svg class="w-8 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" 
				stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
				<path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
			</svg>
			</button>
			<input wire:model="term" type="search" name="" id="" placeholder="Search" 
			class="border-0 w-full pl-3 text-sm text-black focus:outline-none focus:border-transparent focus:ring-0 bg-transparent"/>
		</div>
	</div>
	<div class="pt-2">
		@if(session()->has('message'))
			<div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
				<div class="flex">
					<div>
						<h4>{{ session('message')}}</h4>
					</div>
				</div>
			</div>
		@endif
		<div class="overflow-hidden rounded-lg shadow-xs">
			<table class="w-full">
				<thead>
					<tr class ="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
						<th class="px-4 py-3">Name</th>
						<th class="px-4 py-3">Careers</th>
						<th class="px-4 py-3">Created at</th>
						<th class="px-4 py-3">Status</th>
						<th  class="px-4 py-3">Actions</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
					@foreach ($faculties as $faculty)
					<tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
						<td class="px-4 py-3">
							<div class="flex items-center text-sm">
								{{-- <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
									<img class="object-cover w-full h-full rounded-full"
										src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
										alt="" loading="lazy"/>
									<div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
								</div> --}}
								<div>
									<p class="font-semibold">{{$faculty->name}}</p>
									{{-- <p class="text-xs text-gray-600 dark:text-gray-400">10x Developer</p> --}}
								</div>
							</div>
						</td>
						<td class="px-4 py-3 text-sm">
							<div>
								<a href="#" class="">Carreras: {{$faculty->careers->count()}}</a>
							</div>
						</td>
						<td class="px-4 py-3 text-sm">{{$faculty->created_at->diffForHumans()}}</td>
						<td class="px-4 py-3 text-xs">  

						{{-- @livewire('toggle-button', [
							'model' => $faculty,
							'field' => 'active' 
						], key($faculty->id)) --}}
							<livewire:toggle-button :faculty='$faculty' :field="'active'" :key="'toggle-button'.$faculty->id" />
							
						</td>
						<td class="px-4 py-3 text-xs">
							<button 
								wire:click="editar({{$faculty->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
								Edit
							</button>
							<button 
								wire:click="borrar({{$faculty->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">
								Delete
							</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $faculties->links() }}
		</div>
		
		{{-- <div
			class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
			<span class="text-xs xs:text-sm text-gray-900">
				Showing 1 to 4 of 50 Entries
			</span>
			<div class="inline-flex mt-2 xs:mt-0">
				<button
					class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
					Prev
				</button>
				&nbsp; &nbsp;
				<button
					class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r">
					Next
				</button>
			</div>
		</div> --}}
	</div>
</div>

	

	
