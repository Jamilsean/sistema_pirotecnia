<?php

namespace App\Http\Livewire\Almacen;

use App\Models\almacen_productos;
use Livewire\Component;

class FormAlmacen extends Component
{
    
    
    public $obj_almacen;
    public $fecha_ingreso,$cantidad,$precio_entrada,$precio_venta,$productos_id,$empresas_id=0;

    //Inicial todos
    public $modal=false;
    public $idImagen;
    protected $listeners = ['mostrar_form', 'eliminar'];
    public function mount()
    {
        $this->idImagen = rand();
    }
    

    public function render()
    {
      
        return view('livewire.almacen.form-almacen');
    }

    public function guardar()
    {
        
        $this->obj_almacen = new almacen_productos();
        $this->obj_almacen->fecha_ingreso = $this->fecha_ingreso;
        $this->obj_almacen->cantidad = $this->cantidad;
        $this->obj_almacen->precio_entrada = $this->precio_entrada;
        $this->obj_almacen->precio_venta = $this->precio_venta;
        $this->obj_almacen->productos_id = $this->productos_id;
        $this->obj_almacen->empresas_id = $this->empresas_id;
        $this->obj_almacen->save();
        $this->emit('guardado', 'Registrado', 'Registro guardado');
        $this->cancelar();
    }
    public function mostrar_form($id)
    {
        $this->emit('guardado', 'Registrado', 'Registro guardado');

    }
    public function editar()
    {
        $this->obj_almacen->fecha_ingreso = $this->fecha_ingreso;
        $this->obj_almacen->cantidad = $this->cantidad;
        $this->obj_almacen->precio_entrada = $this->precio_entrada;
        $this->obj_almacen->precio_venta = $this->precio_venta;
        $this->obj_almacen->productos_id = $this->productos_id;
        $this->obj_almacen->empresas_id = $this->empresas_id;
        $this->obj_almacen->save();
        $this->emit('guardado', 'Editado', 'Registro editado ');
        $this->cancelar();
    }
    
    public function eliminar($id)
    {
        $this->obj_almacen = almacen_productos::find($id);
        $this->obj_almacen->delete();
        $this->cancelar();
        $this->emit('guardado', 'Eliminado', 'Registro eliminado');
    }
    public function cancelar()
    {
        $this->idImagen = rand();
        $this->resetValidation();
        $this->reset();
        $this->emitTo('almacen.view-almacen', 'render');
    }
}
