<div>

    @if ($ver)
    <button class="btn btn-success mx-2" wire:click='$set("modal",true)'>Nueva Entrada
    </button>
    @endif
    <x-modal.card title="Gestión de Producto {{$obj_producto?$obj_producto->nombre_producto:''}}" blur
        wire:model.defer="modal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input label="Fecha de entrada" id="date" class="block mt-1" type="date" name="date"
                wire:model='fecha_ingreso' />
            <x-inputs.number label="¿Cantidad de entrada?" wire:model='cantidad' min='0' />
            <x-input icon="cash" label="Precio de entrada" placeholder="Precio de compra" wire:model='precio_entrada' step="0.01" />
            <x-input icon="cash" label="Precio de salida" placeholder="Precio de venta" wire:model='precio_venta' step="0.01" />
            <select id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                wire:model='empresas_id'>
                <option value="0">Seleccionar...</option>
                @foreach ($empresas as $empresa)
                <option value="{{$empresa->id}}">
                    {{$empresa->nombre_empresa}}</option>
                @endforeach
            </select>
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <!-- <x-button flat negative label="Delete" wire:click="delete" />-->
                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="cancel" wire:click='cancelar' />
                    @if (isset($obj_almacen))
                    <x-button warning label="Editar" wire:click="editar" />
                    @else
                    <x-button primary label="Guardar" wire:click="guardar" />
                    @endif
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>