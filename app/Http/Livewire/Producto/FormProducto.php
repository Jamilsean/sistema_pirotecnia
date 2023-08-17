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
    public $codigo, $nombre_producto, $descripcion_producto,$precio_venta, $imagen_url, $estado, $stock = 0;
    public $idImagen;
    protected $listeners = ['mostrar_form', 'eliminar'];
    public function mount()
    {
        $this->idImagen = rand();
    }
    public function render()
    {
        return view('livewire.producto.form-producto');
    }
    public function guardar()
    {
        $url_imagen = '';
        if (isset($this->imagen_url)) {
            $url_imagen = $this->imagen_url->storePublicly('productos', 'public');
        }
        $this->obj_producto = new productos();
        $this->obj_producto->codigo = $this->codigo;
        $this->obj_producto->nombre_producto = $this->nombre_producto;
        $this->obj_producto->descripcion_producto = $this->descripcion_producto;
        $this->obj_producto->stock = $this->stock;
        $this->obj_producto->precio_venta = $this->precio_venta;
        $this->obj_producto->imagen_url = $url_imagen;
        $this->obj_producto->save();
        $this->emit('guardado', 'Registrado', 'Registro guardado');
        $this->cancelar();
    }
    public function mostrar_form($id)
    {
        $this->modal = true;
        $this->obj_producto = productos::find($id);
        $this->codigo = $this->obj_producto->codigo;
        $this->nombre_producto = $this->obj_producto->nombre_producto;
        $this->descripcion_producto = $this->obj_producto->descripcion_producto;
        $this->precio_venta = $this->obj_producto->precio_venta;
        $this->stock = $this->obj_producto->stock;
    }
    public function editar()
    {
        $url_imagen = '';
        if (isset($this->imagen_url)) {
            $url_imagen = $this->imagen_url->storePublicly('productos', 'public');
        }
        $this->obj_producto->codigo = $this->codigo;
        $this->obj_producto->nombre_producto = $this->nombre_producto;
        $this->obj_producto->descripcion_producto = $this->descripcion_producto;
        $this->obj_producto->stock = $this->stock;
        $this->obj_producto->precio_venta = $this->precio_venta;
        $this->obj_producto->imagen_url = $url_imagen;
        $this->obj_producto->save();
        $this->emit('guardado', 'Editado', 'Registro editado ');
        $this->cancelar();
    }
    public function ver_archivo($ruta_antigua,$ruta_nueva,$carpeta)
    {
        $ruta_salida='nada';
        if (isset($ruta_nueva)) {
            $ruta_salida='cambiar';
            $ruta_verificar=storage_path('app/public/' . $ruta_antigua);
            if (file_exists($ruta_verificar) ) {
               // unlink(storage_path('app/public/' . $ruta_antigua));    
               $ruta_salida='cambiar y eliminar'.$ruta_salida;
            }else{
               $ruta_salida='cambiar y no eliminar';
            }
            if ( strlen($ruta_antigua)>1) {   
                $ruta_salida='cambiar y eliminar';
             }
            //$ruta_salida = $ruta_nueva->storePublicly($carpeta, 'public');
        }else{
            $ruta_salida='no cambiar';
        }
        return $ruta_salida;
    }
    public function eliminar($id)
    {
        $this->obj_producto = productos::find($id);
        $this->obj_producto->borrado=1;
        $this->obj_producto->update();
        $this->cancelar();
        $this->emit('guardado', 'Eliminado', 'Registro eliminado');
        $this->emitTo('venta.form-venta', 'cancelar');
    }
    public function cancelar()
    {
        $this->idImagen = rand();
        $this->resetValidation();
        $this->reset();
        $this->emitTo('producto.view-productos', 'render');
    }
}
