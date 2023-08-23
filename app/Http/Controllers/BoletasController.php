<?php

namespace App\Http\Controllers;

use App\Models\detalle_ventas;
use App\Models\productos;
use App\Models\ventas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

class BoletasController extends Controller
{
    
    public function index()
    {     
        $id=4;
        $venta=ventas::find($id);
        $total=0;
        $datos=detalle_ventas::join('productos','productos.id','=','detalle_ventas.productos_id')->select('detalle_ventas.*','productos.codigo','productos.nombre_producto','productos.descripcion_producto')
        //->where('detalle_ventas.id',$id)
        ->get();
        foreach($datos as $d_venta){
            $total+=$d_venta->cantidad*$d_venta->precio_venta;
        }

        $pdf = Pdf::loadView('webApp.boleta', compact(['datos','datos',
        'venta','venta',
        'total','total',
    ]));
        
        return $pdf->stream("Boleta_Venta_$id.pdf");
        //return view('webApp.boleta', compact('datos','datos'));
    /*
    return view();*/
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $venta=ventas::leftJoin('clientes','clientes.id','=','ventas.clientes_id')
        ->select('clientes.identificador','clientes.datos_clientes','ventas.*')
        ->where('ventas.id',$id)->first();
        $total=0;
        $datos=detalle_ventas::join('productos','productos.id','=','detalle_ventas.productos_id')->select('detalle_ventas.*','productos.codigo','productos.nombre_producto','productos.descripcion_producto')
        ->where('detalle_ventas.ventas_id',$id)
        ->get();
        foreach($datos as $d_venta){
            $total+=$d_venta->cantidad*$d_venta->precio_venta;
        }
        $pdf = Pdf::loadView('webApp.boleta', compact(['datos','datos',
        'venta','venta',
        'total','total',
    ]));
        return $pdf->stream("Boleta_Venta_$id.pdf");
    }
    
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
