<div class="">
    @if (!empty($compras))
    <x-button warning class="right-0" wire:click='abrir_modal'>Carrito</x-button>
    @endif
    <x-modal.card title="Gestión de Productos" blur wire:model.defer="modal">
        <div>
            <select id="clientes"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                wire:model.defer='clientes_id'>
                <option value="0">Seleccionar...</option>
                @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}">
                    {{$cliente->datos_clientes.'|'.$cliente->identificador}}</option>
                @endforeach
            </select>
        </div>
        <x-comp.table>
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Productos</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Precio |Cantidad</th>
                        
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach ($obj_productos as $index=> $producto)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <img class="h-10 w-10 rounded-full"
                                        src="{{ asset('storage/'.$producto->imagen_url) }}" alt="">
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
                        <td class="px-6 py-4 grid grid-cols-1 sm:grid-cols-2 gap-1">
                            <div>
                                <x-input icon="cash" label="Precio de venta" placeholder="Precio de venta" wire:model='precios.{{$index}}' step="0.01" />
                                <span class="text-xs">Precio de almacen:
                                    {{$producto->precio_venta}}
                                </span>
                            </div>
                            <div>
                                <x-inputs.number label="Stock" wire:model='cantidad.{{$index}}' min='0'/>
                                <span class="text-xs">Stock en almacen:
                                    {{$producto->stock}}
                                </span>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </x-comp.table>
        
        <h1 class="text-black font-bold text-right px-5">Pago total: s/.{{$pago_total}}</h1>
        <div class="flex space-x-2 uppercase">
           @foreach ($tipo_pagos as $tipo_pago)
           <x-radio label="{{$tipo_pago->nombre_tipo}}" class="uppercase" wire:model="tipo_pagos_id" value='{{$tipo_pago->id}}'/>               
           @endforeach
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button wire:click='cancelar'>Cancelar</x-button>
                <x-button positive wire:click='guardar_venta'>VENDER</x-button>
            </div>
        </x-slot>
    </x-modal.card>
</div>