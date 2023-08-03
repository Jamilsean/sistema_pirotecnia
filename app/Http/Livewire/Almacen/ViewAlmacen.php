<?php

namespace App\Http\Livewire\Almacen;

use App\Models\almacen_productos;
use Livewire\Component;
use Livewire\WithPagination;

class ViewAlmacen extends Component
{
    use WithPagination;
    protected $listeners=['render'];
    public function render()
    {
        $almacenes=almacen_productos::paginate(5);
        return view('livewire.almacen.view-almacen',compact('almacenes','almacenes'));
    }
    public function editar($id){
        $this->emitTo('almacen.form-almacen','mostrar_form',$id);
    }
}
