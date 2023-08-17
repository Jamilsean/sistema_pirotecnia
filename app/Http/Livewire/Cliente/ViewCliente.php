<?php

namespace App\Http\Livewire\Cliente;

use App\Models\clientes;
use Livewire\Component;
use Livewire\WithPagination;

class ViewCliente extends Component
{
    use WithPagination;
    protected $listeners=['render'];
    public function render()
    {
        $clientes=clientes::paginate(5);
        return view('livewire.cliente.view-cliente',compact('clientes','clientes'));
    }
    public function editar($id){
        $this->emitTo('cliente.form-clientes','mostrar_form',$id);
    }
}
