<x-comp.navegacion>
    <div>
        <div class="bg-slate-500 h-full container mx-auto px-5 py-2 ">
            @livewire('almacen.form-almacen', ['ver' => false])
            <div class="flex justify-between">
                @livewire('producto.form-producto')
                @livewire('venta.form-venta')
            </div>
            <div class="">
                @livewire('producto.view-productos')
            </div>
            
        </div>
    </div>
</x-comp.navegacion>