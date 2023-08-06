<?php

namespace App\Http\Livewire\Venta;

use App\Models\productos;
use Livewire\Component;

class FormVenta extends Component
{
    public $compras=[];
    public $modal=false;
    public $obj_productos=[];
    protected $listeners=['ver_compras'];
    public function render()
    {
        return view('livewire.venta.form-venta');
    }
    
    public function ver_compras($compras){
        $this->compras=$compras;
    }
    public function abrir_modal(){
        $this->modal=true;
        $this->obj_productos = productos::whereIn('id', $this->compras)->get();
    }
}
