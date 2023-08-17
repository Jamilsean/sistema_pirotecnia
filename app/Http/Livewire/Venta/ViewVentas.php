<?php

namespace App\Http\Livewire\Venta;

use App\Models\ventas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewVentas extends Component
{
    public function render()
    {
        $ventas=ventas::join('tipo_pagos','tipo_pagos.id','=','ventas.tipo_pagos_id')
        ->join('detalle_ventas','ventas.id','=','detalle_ventas.ventas_id')
        ->select('ventas.*','tipo_pagos.nombre_tipo',DB::raw('SUM(detalle_ventas.precio_venta) as precio_total '))
        ->groupBy('id')
        ->paginate(5);
        return view('livewire.venta.view-ventas',compact([
            'ventas','ventas'
        ]));
    }
}
