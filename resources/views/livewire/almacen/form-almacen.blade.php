<div>
    <button class="btn btn-success mx-2" wire:click='$set("modal",true)'>Nueva Entrada</button>
    <x-modal.card title="Gestión de empresa" blur wire:model.defer="modal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input  wire:model='nombre_empresa' icon="home" label="Nombre" placeholder="Nombre de la empresa" />
            <x-inputs.number label="¿Cantidad de entrada?" wire:model='cantidad' min='0'/>
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
               <!-- <x-button flat negative label="Delete" wire:click="delete" />-->
                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" wire:click='close' />
                    @if (isset($obj_almacen))
                    <x-button warning label="Editar" wire:click="editar" />    
                    @else
                    <x-button primary label="Guardar" wire:click="save" />
                    @endif
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
