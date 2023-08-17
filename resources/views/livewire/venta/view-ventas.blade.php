<div>
    <div class="">
      <x-input icon="search" class="" label="Buscar" placeholder="Buscar venta" />
    </div>
  
    <!-- component -->
    <x-comp.table>
      <table class="w-full  bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
          <tr>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nro venta</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Estado</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Fecha de venta</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Tipo Pago</th>
            <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
          @foreach ($ventas as $venta)
          <tr class="hover:bg-gray-50">
            <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
  
              <div class="text-sm">
                <div class="font-medium text-gray-700">
                  Nro -{{$venta->id}}
                </div>
                <div class="text-gray-400"> {{$venta->descripcion}}</div>
              </div>
            </th>
            <td class="px-6 py-4">
              <span
                class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                {{$venta->estado}}
              </span>
            </td>
            <td class="px-6 py-4">
                <span
                  class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                  {{$venta->created_at}}
                </span>
              </td>
            <td class="px-6 py-4 flex flex-col uppercase" > 
                s/.{{$venta->precio_total}}
                @if ($venta->tipo_pagos_id==1)
                <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-red-600">{{$venta->nombre_tipo}}</span>
                @else
                <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">{{$venta->nombre_tipo}}</span>
                @endif
            </td>
            <td class="px-6 py-4">
              <div class="flex justify-end gap-2">
                
              </div>
            </td>
          </tr>
  
          @endforeach
  
        </tbody>
      </table>
      {{$ventas->links()}}
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
      Livewire.emitTo('venta.form-venta','eliminar',postId)
    }
  })
          })
    </script>
    @endpush
  </div>
