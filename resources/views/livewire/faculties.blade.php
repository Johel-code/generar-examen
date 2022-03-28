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
					<input class="bg-gray-50 outline-none ml-1 block " type="text" wire:model="term" name="" id="" placeholder="search...">
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
		<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
			<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
				<table class="min-w-full leading-normal">
					<thead>
						<tr>
							<th
								class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Name
							</th>
							<th
								class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Careers
							</th>
							<th
								class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Created at
							</th>
							<th
								class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Status
							</th>
							<th 
								class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($faculties as $faculty)
						<tr>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<div class="flex items-center">
									<div class="flex-shrink-0 w-10 h-10">
										<img class="w-full h-full rounded-full"
											src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80"
											alt="" />
									</div>
										<div class="ml-3">
											<p class="text-gray-900 whitespace-no-wrap">
												{{$faculty->name}}
											</p>
										</div>
									</div>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<div>
									<a href="#" class="text-gray-900 whitespace-no-wrap">Carreras: {{$faculty->careers->count()}}</a>
								</div>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<p class="text-gray-900 whitespace-no-wrap">
									{{$faculty->created_at->diffForHumans()}}							
								</p>
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">  

							@livewire('toggle-button', [
								'model' => $faculty,
								'field' => 'active'
							], key($faculty->id))
								
							</td>
							<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<span 
									class="inline-block w-1/3 md:hidden font-bold">
									Actions</span>
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
				<div
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
				</div>
			</div>
		</div>
	</div>
</div>

	

	
