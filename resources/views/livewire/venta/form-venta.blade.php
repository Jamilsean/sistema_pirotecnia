<div class="">
    @if (!empty($compras))
    <x-button warning class="right-0" wire:click='abrir_modal'>Carrito</x-button>
    @endif
    <x-modal.card title="Gestión de Productos" blur wire:model.defer="modal">
        <x-comp.table>
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Productos</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Estado</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach ($obj_productos as $producto)
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
                        <td class="px-6 py-4">
                            <x-inputs.number label="Stock" min='0' />
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </x-comp.table>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
            <x-button>Cancelar</x-button>
            <x-button>VENDER</x-button>
            </div>
        </x-slot>
    </x-modal.card>
</div>