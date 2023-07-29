<div>
    <button class="btn btn-success mx-2" wire:click='$set("blurModal",true)'>Nuevo producto</button>

    <x-modal.card title="Gestión de Productos" blur wire:model.defer="blurModal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input  wire:model='nombre_empresa' icon="home" label="Nombre" placeholder="Nombre del  Producto" />
            <x-input  wire:model='nombre_empresa' icon="user" label="Ubicacion" placeholder="Ubicacion de la empresa" />
            <x-input icon="phone" wire:model='Telefono' label="Celular" placeholder="Telefono"  maxlength="9"/> 
            
        </div>
     
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
               <!-- <x-button flat negative label="Delete" wire:click="delete" />-->
                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" wire:click='close' />
                    <x-button primary label="Save" wire:click="save" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>