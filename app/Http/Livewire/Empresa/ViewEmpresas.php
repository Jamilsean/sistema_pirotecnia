<?php

namespace App\Http\Livewire\Empresa;

use App\Models\empresas;
use Livewire\Component;
use Livewire\WithPagination;
class ViewEmpresas extends Component
{
    use WithPagination;
    protected $listeners=['hola','render'];
    public function render()
    {
        $empresas=empresas::paginate(5);
        return view('livewire.empresa.view-empresas',compact('empresas','empresas'));
    }
    public function editar($id){
        $this->emitTo('empresa.form-empresa','mostrar_form',$id);
    }
    public function eliminar(){
        $this->emit('guardado','as','ass');
    }
}
