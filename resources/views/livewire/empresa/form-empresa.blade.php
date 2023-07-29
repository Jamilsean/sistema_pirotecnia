<div>
    <button class="btn btn-success mx-2" wire:click='$set("blurModal",true)'>Nuevo</button>
    <x-modal.card title="Gestión de empresa" blur wire:model.defer="blurModal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input  wire:model='nombre_empresa' icon="home" label="Nombre" placeholder="Nombre de la empresa" />
            <x-input  wire:model='ruc_empresa' icon="user" label="RUC Empresa" placeholder="RUC" maxlength="12" />
            <x-input icon="phone" wire:model='telefono' label="Celular" placeholder="telefono"  maxlength="9"/> 
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
               <!-- <x-button flat negative label="Delete" wire:click="delete" />-->
                <div class="flex">
                    <x-button flat label="Cancel" x-on:click="close" wire:click='close' />
                    @if (isset($obj_empresa))
                    <x-button warning label="Editar" wire:click="editar" />    
                    @else
                    <x-button primary label="Guardar" wire:click="save" />
                    @endif
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
