<x-comp.navegacion>
    <div class="bg-slate-500 h-full container mx-auto py-2">
        <div class="px-5    ">
          <h1 class="text-lg text-white text-center my-2 font-bold">Gestión de Clientes</h1> 
            @livewire('cliente.form-clientes')
        </div>
        <div class="px-5">
            @livewire('cliente.view-cliente')
        </div>
    </div>
</x-comp.navegacion>