<x-comp.plantilla>
    <div class=" mx-11 mt-5 ">
        <x-button primary href="{{route('login')}}">Ingresar</x-button>
    </div>
    
<div class=" my-4 grid grid-cols-3 gap-4 container mx-auto">    
    <div class="relative
     px-4 py-2 bg-green-500 rounded-2xl text-white shadow-lg shadow-green-600">
     <div class="absolute -left-1 -top-1 rounded-full h-10 w-10 bg-amber-300 flex items-center justify-center">
        <i class="fa-solid fa-money-bill-1 text-white text-2xl "></i>
     </div>
        <div class="text-center font-bold text-lg text-white border-b-2 ">Venta de cajas</div>    
        <div class="py-4">
            Cantidad de ventas: 300 en este mes
        </div>    
        <div class="text-xs text-warning-50 border-t-2 mt-4">Footer</div>    
    </div>
    <div class="relative
     px-4 py-2 bg-blue-500 rounded-2xl text-white shadow-lg shadow-blue-600">
     <div class="absolute -left-1 -top-1 rounded-full h-10 w-10 bg-slate-500 flex items-center justify-center">
        <i class="fa-solid fa-money-bill-1 text-white text-2xl "></i>
     </div>
        <div class="text-center font-bold text-lg text-white border-b-2 ">Venta de cajas</div>    
        <div class="py-4">
            Cantidad de ventas: 300 en este mes
        </div>    
        <div class="text-xs text-warning-50 border-t-2 mt-4">Footer</div>    
    </div>
</div>
</x-comp.plantilla>