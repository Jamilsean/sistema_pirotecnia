<div>
  <div class="">
    <x-input icon="search" class="" label="Buscar" placeholder="Buscar producto" />
  </div>
  <x-button orange icon="x" label="Cancelar" wire:click="cancelar" wire:loading.attr='disabled'    class="disabled:opacity-25 my-2"/>    
  <!-- component -->
  <x-comp.table>
    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
      <thead class="bg-gray-50">
        <tr>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Productos</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Estado</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Cantidad</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900">Precio</th>
          <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 border-t border-gray-100">
        @foreach ($productos as $producto)
        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-10 w-10">
                <img class="h-10 w-10 rounded-full" src="{{ asset('storage/'.$producto->imagen_url) }}" alt="">
              </div>
              <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">
                  {{$producto->nombre_producto}}
                </div>
                <div class="text-sm text-gray-500">
                  {{$producto->codigo}}
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4">
            
              
              @if ($producto->stock)
              <span
              class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
              <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
              {{$producto->estado}}
            </span>
              @else
              <span
              class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-red-600">
              <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>agotado
            </span>
              @endif
          </td>
          <td class="px-6 py-4">{{$producto->stock}} Cajas</td>
          <td class="px-6 py-4">
            <div class="flex gap-2">
              <button wire:click='aumentar({{$producto->id}})'>
                <i class="fa-solid fa-plus"></i>
              </button>
              <span
                class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-600">
                S/. {{$producto->precio_venta}} 
              </span>
              @if ($producto->stock>0)
              <span
                class="inline-flex items-center gap-1 rounded-full bg-violet-50 px-2 py-1 text-xs font-semibold ">
                @if (in_array($producto->id,$productos_vender))
                <x-icon name="refresh" class="text-red-600 w-5 h-5 " wire:click='quitar_carrito({{$producto->id}})' />
                @else
                <x-icon name="shopping-cart" class="text-green-600 w-5 h-5" wire:click='agregar_carrito({{$producto->id}})' />
                @endif
              </span>   
              @else
              <i class="fa-solid fa-cart-shopping" disabled></i>
              @endif
              
            </div>
          </td>
          <td class="px-6 py-4">
            <div class="flex justify-end gap-4">
              <button wire:click='$emit("delete",{{$producto->id}})' x-data="{ tooltip: 'Delete' }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
              </button>
              <button wire:click='editar({{$producto->id}})' x-data="{ tooltip: 'Edite' }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                </svg>
              </button>
            </div>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    {{$productos->links()}}
  </x-comp.table>
  @push('js')

  <script>


    Livewire.on('delete',postId=>{
          Swal.fire({
  title: 'Desea Eliminar registro?',
  text: "No se podrá recuperar!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Sí Eliminar!'
}).then((result) => {
  if (result.isConfirmed) {
    Livewire.emitTo('producto.form-producto','eliminar',postId)
  }
})
        })
        Livewire.on('carrito',(mensaje,icono)=>{
         
          const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 800,
  timerProgressBar: false,
})

Toast.fire({
  icon: icono,
  title: mensaje
})

        })
       
  </script>
  @endpush
</div>