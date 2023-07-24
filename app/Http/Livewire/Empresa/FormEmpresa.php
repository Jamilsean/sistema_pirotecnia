<?php

namespace App\Http\Livewire\Empresa;

use Livewire\Component;

class FormEmpresa extends Component
{
    public $blurModal=false;
    public $nombre_empresa,$Telefono;
    protected $rules = [
        'nombre_empresa' => 'required|integer|size:10',
        'Telefono' => 'required|max:9',
       
    ];
 
    public function render()
    {
        return view('livewire.empresa.form-empresa');
    }
    public function save(){
        $this->validate();
    }
    public function close(){
        $this->resetValidation();
        $this->reset();
    }
    
}
