<?php

namespace App\Http\Livewire\Cliente;

use App\Models\clientes;
use Livewire\Component;

class FormClientes extends Component
{
    public $obj_cliente;
    public $modal=false;
    public $identificador,$datos_clientes,$celular,$direccion;
    protected $listeners=['mostrar_form','eliminar'];
    public function render()
    {
        $clientes=clientes::paginate(5);
        return view('livewire.cliente.form-clientes',compact('clientes','clientes'));
    }
    public function abrir_modal(){
        $this->modal=true;
    }
    public function guardar(){
        $this->obj_cliente=new clientes();
        $this->obj_cliente->identificador=$this->identificador;
        $this->obj_cliente->datos_clientes=$this->datos_clientes;
        $this->obj_cliente->celular=$this->celular;
        $this->obj_cliente->direccion=$this->direccion;
        $this->obj_cliente->save();
        $this->cancelar();
    }
    public function cancelar(){
        $this->reset();
        $this->emitTo('cliente.view-cliente','render');
    }
    public function mostrar_form($id){
        $this->modal=true;
        $this->obj_cliente=clientes::find($id);
        $this->identificador=$this->obj_cliente->identificador;
        $this->datos_clientes=$this->obj_cliente->datos_clientes;
        $this->celular=$this->obj_cliente->celular;
        $this->direccion=$this->obj_cliente->direccion;   
    }
    public function eliminar($id){
        $this->obj_cliente=clientes::find($id);
        $this->obj_cliente->delete();
        $this->emit('guardado','Eliminado','Registro eliminado');
        $this->cancelar();
    }
}
