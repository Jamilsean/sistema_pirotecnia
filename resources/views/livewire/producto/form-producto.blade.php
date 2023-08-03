<div>
    <button class="btn btn-success mx-2" wire:click='$set("modal",true)'>Nuevo producto</button>

    <x-modal.card title="Gestión de Productos" blur wire:model.defer="modal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input  wire:model='codigo' icon="home" label="Codigo" placeholder="Codigo del  Producto" />
            <x-input  wire:model='nombre_producto' icon="home" label="Producto" placeholder="Nombre del  Producto" />
            <x-input  wire:model='descripcion_producto' icon="home" label="Descripción" placeholder="Descripción del  Producto" />
            <x-inputs.number label="Stock" wire:model='stock' min='0'/>
            <input class="input_file"  accept="image/*" type="file" id="{{$idImagen}}"
                            wire:model='imagen_url'>
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
               <!-- <x-button flat negative label="Delete" wire:click="delete" />-->
                <div class="flex">
                    <x-button flat label="Cancelar" x-on:click="close" wire:click='cancelar' />
                    @if (isset($obj_producto))
                    <x-button warning label="Editar" wire:click="editar" wire:loading.attr='disabled'  class="disabled:opacity-25"/>
                    @else
                    <x-button primary label="Guardar" wire:click="guardar" wire:loading.attr='disabled'  class="disabled:opacity-25"/>    
                    @endif
                    
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
