<?php

namespace App\Http\Livewire\Producto;

use App\Models\productos;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class ViewProductos extends Component
{
    use Actions;
    use WithPagination;
    protected $listeners = ['render','cancelar'];
    public $productos_vender = [];
    public function render()
    {
        $productos = productos::paginate(5);
        return view('livewire.producto.view-productos', compact('productos', 'productos'));
    }
    public function editar($id)
    {
        $this->emitTo('producto.form-producto', 'mostrar_form', $id);
    }

    public function aumentar($id)
    {
        $this->emitTo('almacen.form-almacen', 'mostrar_form', $id);
    }
    public function agregar_carrito($id)
    {
        array_push($this->productos_vender, $id);
        $this->notification()->success(
            $title = 'Producto añadido !!!',
            $description = 'Su producto fue añadido al carrito'
        );
        $this->emitTo('venta.form-venta', 'ver_compras', $this->productos_vender);
    }
    public function quitar_carrito($id)
    {
        // Eliminar "Producto 2" del arreglo
        $numero = array_search($id, $this->productos_vender);
        if ($numero !== false) {
            unset($this->productos_vender[$numero]);
        }
        $this->notification()->error(
            $title = 'Producto quitado !!!',
            $description = 'Su producto fue quitado del carrito'
        );
        $this->emitTo('venta.form-venta', 'ver_compras', $this->productos_vender);
    }
    public function cancelar(){
        $this->reset();
    }
    public function save()
    {
        
    }
}
