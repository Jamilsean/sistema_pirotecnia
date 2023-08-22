<?php

namespace App\Http\Livewire\Venta;

use App\Models\clientes;
use App\Models\detalle_ventas;
use App\Models\productos;
use App\Models\tipo_pago;
use App\Models\ventas;
use Livewire\Component;
use WireUi\Traits\Actions;

class FormVenta extends Component
{
    use Actions;
    public $compras = [];
    public $modal = false;
    public $obj_productos = [];
    public $imprimir_id = 0;
    public $productos_venta = [];
    public $precios = [], $cantidad = [], $clientes_id, $tipo_pagos_id = 1;
    public $pago_total = '0';
    protected $rules = [
        'tipo_pagos_id' => 'required',
    ];
    protected $listeners = ['ver_compras', 'cancelar'];
    public function render()
    {
        $this->calular_total();
        $tipo_pagos = tipo_pago::all();
        $clientes = clientes::all();
        return view('livewire.venta.form-venta', compact([
            'clientes', 'clientes',
            'tipo_pagos', 'tipo_pagos',
        ]));
    }
    public function calular_total()
    {
        $this->pago_total = 0;
        if (count($this->cantidad) > 0) {
            foreach ($this->compras as $index => $producto) {

                if ($this->cantidad[$index] > 0 && $this->precios[$index] > 0) {
                    $stok = productos::where('id', $producto)->value('stock');
                    if ($this->cantidad[$index] > $stok) {
                        $this->emit('error', 'ERROR', 'No cuenta con stock suficiente');
                        $this->cantidad[$index] = $stok;
                    }
                } else {
                    $this->cantidad[$index] = 1;
                    $this->precios[$index] = productos::where('id', $producto)->value('precio_venta');
                    $this->emit('error', 'ERROR', 'INGRESAR NÚMERO VALIDO');
                }
                $this->pago_total += $this->cantidad[$index] * $this->precios[$index];
            }
        }
    }

    public function ver_compras($compras)
    {
        $this->compras = $compras;
    }

    public function abrir_modal()
    {
        $this->modal = true;
        $this->obj_productos = productos::whereIn('id', $this->compras)->get();
        foreach ($this->obj_productos as $producto) {
            array_push($this->precios, $producto->precio_venta);
            array_push($this->cantidad, 1);
        }
    }

    public function guardar_venta()
    {
        $this->validate();
        $venta = new ventas();
        $venta->descripcion = 'nuevo';
        $venta->clientes_id = $this->clientes_id;
        $venta->tipo_pagos_id = $this->tipo_pagos_id;
        $venta->save();
        foreach ($this->compras as $index => $producto) {
            $producto_venta = productos::find($producto);
            $this->productos_venta = new detalle_ventas();
            $this->productos_venta->cantidad = $this->cantidad[$index];
            $this->productos_venta->precio_venta = ($this->cantidad[$index] * $this->precios[$index]);
            $this->productos_venta->ventas_id = $venta->id;
            $this->productos_venta->productos_id = $producto_venta->id;
            $producto_venta->stock = ($producto_venta->stock - $this->cantidad[$index]);
            $producto_venta->save();
            $this->productos_venta->save();
        }
        $this->notification()->confirm([
            'title'       => 'VENTA REALIZADA!',
            'description' => 'Desea imprimir el comprobante?',
            'icon'        => 'success',
            'accept'      => [
                'label'  => 'Sí,imprimir',
                'method' => 'imprimir_boleta',
                'params' => [$venta->id],
            ],
            'reject' => [
                'label'  => 'No, cancelar',
                'method' => 'cancelar',
            ],
        ]);
        $this->cancelar();
        
    }
    public function imprimir_boleta($id)
    {
        return redirect()->route('pdf.show',$id,404);
    }
    public function cancelar()
    {
        $this->resetExcept('imprimir_id');
        $this->emitTo('producto.view-productos', 'render');
        $this->emitTo('producto.view-productos', 'cancelar');
    }
}
