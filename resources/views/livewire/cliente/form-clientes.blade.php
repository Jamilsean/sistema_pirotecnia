<div class="">
    
    <x-button positive class="right-0" wire:click='abrir_modal'>Nuevo Cliente</x-button>
    
    <x-modal.card title="Registro de Cliente" blur wire:model.defer="modal">
 
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input  wire:model='identificador' icon="home" label="Identificador" placeholder="puede escribir una de las opciones RUC|DNI|Código" />
            <x-input  wire:model='datos_clientes' icon="user" label="Datos del cliente" placeholder="Nombre o Razón social" />
            <x-input icon="phone" wire:model='celular' label="Celular" placeholder="celular"  maxlength="9"/> 
            <x-input  wire:model='direccion' icon="home" label="Direccion" placeholder="direccion" />
        </div>
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button  wire:click='cancelar'>Cancelar</x-button>
                @if (empty($obj_cliente))
                    
                <x-button positive  spinner wire:click='guardar'>Guardar</x-button>
                    
                @else
                <x-button warning  spinner wire:click='editar'>Editar</x-button>
                    
                @endif
            </div>
        </x-slot>
    </x-modal.card>
</div>