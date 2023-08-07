<?php

namespace App\Http\Livewire\Venta;

use App\Models\detalle_ventas;
use App\Models\productos;
use App\Models\ventas;
use Livewire\Component;

class FormVenta extends Component
{
    public $compras=[];
    public $modal=false;
    public $obj_productos=[];
    public $productos_venta=[];
    public $precios=[],$cantidad=[];
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
        
        foreach($this->obj_productos as $producto){
            array_push($this->precios,$producto->precio_venta);
            array_push($this->cantidad,1);
        }
    }
    public function guardar_venta(){
        $venta=new ventas();
        $venta->descripcion='nuevo';
        $venta->save();
        foreach($this->compras as $index=>$producto){
           $producto_venta=productos::find($producto);
           $this->productos_venta=new detalle_ventas();
           $this->productos_venta->cantidad=$this->cantidad[$index];
           $this->productos_venta->precio_venta=($this->cantidad[$index]*$this->precios[$index]);
           $this->productos_venta->ventas_id=$venta->id;
           $this->productos_venta->productos_id=$producto_venta->id;

           $producto_venta->stock=($producto_venta->stock-$this->cantidad[$index]);
           $producto_venta->save();
           $this->productos_venta->save();
        }
        $this->emit('guardado', 'Guardado', 'Venta Realizada');
        $this->cancelar();
    }
    public function cancelar(){
        $this->reset();
        $this->emitTo('producto.view-productos','render');
        $this->emitTo('producto.view-productos','cancelar');
    }
}
