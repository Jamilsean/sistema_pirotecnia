<?php

namespace App\Http\Livewire\Producto;

use App\Models\productos;
use Livewire\Component;
use Livewire\WithPagination;

class ViewProductos extends Component
{
    use WithPagination;
    protected $listeners=['render'];
    public function render()
    {
        $productos=productos::paginate(5);
        return view('livewire.producto.view-productos',compact('productos','productos'));
    }
}
