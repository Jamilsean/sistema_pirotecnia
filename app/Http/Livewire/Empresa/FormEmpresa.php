<?php

namespace App\Http\Livewire\Empresa;

use App\Models\empresas;
use Livewire\Component;

class FormEmpresa extends Component
{
    public $blurModal=false;
    public $nombre_empresa,$ruc_empresa,$telefono;
    public $obj_empresa;
    protected $listeners=['mostrar_form','eliminar'];
        protected $rules = [
        'nombre_empresa' => 'required',
        'telefono' => 'required|size:9',
        'ruc_empresa' => 'required|size:12',

    ];
    
    public function render()
    {
        return view('livewire.empresa.form-empresa');
    }
    public function save(){
        $this->validate();
        $this->obj_empresa=new empresas();
        $this->obj_empresa->nombre_empresa=$this->nombre_empresa;
        $this->obj_empresa->ruc_empresa=$this->ruc_empresa;
        $this->obj_empresa->telefono_empresa=$this->telefono;
        $this->obj_empresa->save();
        $this->emit('guardado','Registrado','Registro guardado');
        $this->cancelar();
        
    }
    public function mostrar_form($id){
        $this->blurModal=true;
        $this->obj_empresa=empresas::find($id);
        $this->nombre_empresa=$this->obj_empresa->nombre_empresa;
        $this->ruc_empresa=$this->obj_empresa->ruc_empresa;
        $this->telefono=$this->obj_empresa->telefono_empresa;
        
    }
    public function editar(){
        $this->validate();
        $this->obj_empresa->nombre_empresa=$this->nombre_empresa;
        $this->obj_empresa->ruc_empresa=$this->ruc_empresa;
        $this->obj_empresa->telefono_empresa=$this->telefono;
        $this->obj_empresa->save();
        $this->emit('guardado','Editado','Registro editado');
        $this->cancelar();
    }
    public function close(){
        $this->cancelar();
    }
    public function cancelar(){
        $this->resetValidation();
        $this->reset();
        $this->emitTo('empresa.view-empresas','render');
    }
    public function eliminar($id){
        $this->obj_empresa=empresas::find($id);
        $this->obj_empresa->delete();
        $this->emit('guardado','Eliminado','Registro eliminado');
        $this->cancelar();
    }
    
}
