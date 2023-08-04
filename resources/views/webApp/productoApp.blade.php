<x-comp.navegacion>
    <div class="bg-slate-500 h-full container mx-auto py-2">
        <div class="">
           @livewire('almacen.form-almacen', ['ver' => false])
            @livewire('producto.form-producto')
        </div>
        <div class="px-5">
            @livewire('producto.view-productos')
        </div>
    </div>
</x-comp.navegacion>