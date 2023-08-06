<?php

namespace App\Http\Livewire\Producto;

use App\Models\productos;
use Livewire\Component;
use Livewire\WithPagination;

class ViewProductos extends Component
{
    use WithPagination;
    protected $listeners = ['render'];
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
        $this->emit('carrito','Se agregó al carrito','success');
        $this->emitTo('venta.form-venta', 'ver_compras', $this->productos_vender);
    }
    public function quitar_carrito($id)
    {
        // Eliminar "Producto 2" del arreglo
        $numero = array_search($id, $this->productos_vender);
        if ($numero !== false) {
            unset($this->productos_vender[$numero]);
        }
        $this->emit('carrito','Se quitó del carrito','error');
        $this->emitTo('venta.form-venta', 'ver_compras', $this->productos_vender);
    }
}
