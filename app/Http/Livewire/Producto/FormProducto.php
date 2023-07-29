<?php

namespace App\Http\Livewire\Producto;

use App\Models\productos;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
class FormProducto extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $obj_producto;
    public $modal;
    public $codigo,$nombre_producto,$descripcion_producto,$imagen_url,$estado;
    public $idImagen;
    public function mount(){
        $this->idImagen=rand();
    }
    public function render()
    {
        return view('livewire.producto.form-producto');
    }
    public function guardar(){
        $url_imagen = '';
        if (isset($this->imagen_url)) {
            $url_imagen = $this->imagen_url->storePublicly('productos', 'public');
        }
        $this->obj_producto=new productos();
        $this->obj_producto->codigo=$this->codigo;
        $this->obj_producto->nombre_producto=$this->nombre_producto;
        $this->obj_producto->descripcion_producto=$this->descripcion_producto;
        $this->obj_producto->imagen_url=$url_imagen;
        $this->obj_producto->save();
        $this->emit('guardado','Registrado','Registro guardado');
        $this->cancelar();
    }
    public function mostrar_fomr($id){

    }
    public function editar(){
        
    }
    public function eliminar($id){
        $this->obj_producto=productos::find($id);
        $this->obj_producto->delete();
        $this->emit('guardado','Eliminado','Registro eliminado');
    }
    public function cancelar(){
        $this->idImagen=rand();
        $this->resetValidation();
        $this->reset();
        $this->emitTo('producto.view-productos','render');
    }
    
}
