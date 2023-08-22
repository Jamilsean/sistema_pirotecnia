<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boleta de venta</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body{
            width: 40rem;
        }
        .div_table {
            width: 40rem;
            padding: 4px;
            text-align: center;
        }

        .table {
            border-bottom: #b2b2b2 solid 2px;
            margin: auto;
            width: 100%;
        }

        .head_table {
            border-radius: 20px;
            background-color: rgb(61, 57, 57);
            color: white;
        }

        .item_head {
            border-top: #b2b2b2 solid 2px;
            border-bottom: #b2b2b2 solid 2px;
            padding: 6px 10px;
            text-transform: uppercase;
        }

        .item_body {
            border-top: #b2b2b2 solid 2px;
        }

        .tr_body:nth-child(even) {
            background-color: rgb(175, 182, 182);
        }

        .codigo {
            color: black;
            text-align: left;
            font-weight: 600;
        }

        .titulo {
            background-color: rgb(98, 204, 204);
            text-align: center;
            font-weight: bold;
            padding: 10px 0px;
            width: 40rem;
        }

        .descripcion {
            display: flex;
            flex-grow: inherit;
            width: 40rem;
            margin: auto;
            padding: 10px 0px;
        }

        .cliente {
            width: 100%;
            font-size: 15px;
            text-transform: uppercase;
            font-weight: 600;
            margin: 20px 0px;
        }

        .texto_desc {
            color: #5c5858;
            font-size: 15px !important;
        }

        .pequenio {
            width: 10px;
            text-align: center;
        }

        .descripcion_p {
            padding: 2px;
            font-weight: 800;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
        }
        .fecha{
            text-align: right;
        }
    </style>
</head>

<body>
    <div>

        <h1 class="titulo">Boleta de venta: N:000{{$venta->id}}</h1>
        @if (!empty($venta->datos_clientes))
        <div class="descripcion">
            <div class="cliente"> Cliente: <span class="texto_desc">{{$venta->datos_clientes}}</span>
            </div>
            <div class="cliente"> Cod: <span class="texto_desc">{{$venta->identificador}}</span>
            </div>
            
        </div>
        @endif
        <div class="fecha"> Fecha de venta: <span class="texto_desc">{{$venta->created_at}}</span></div>
        <div class="div_table">
            <table class="table">
                <thead class="head_table ">
                    <tr class="">
                        <th class="item_head">Cogido</th>
                        <th class="item_head">Cantidad</th>
                        <th class="item_head">Descripcion</th>
                        <th class="item_head">Precio Unitario</th>
                        <th class="item_head">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $item)
                    <tr class="tr_body">
                        <td class="item_body codigo pequenio">{{$item->codigo}} </td>
                        <td class="item_body pequenio">{{$item->cantidad}} caja(as)</td>
                        <td class="item_body descripcion_p">
                            <div>
                                <span>{{$item->nombre_producto}}</span>
                                <p class="texto_desc">{{$item->descripcion_producto}}</p>
                            </div>
                        </td>
                        <td class="item_body pequenio">S/. {{$item->precio_venta}}</td>
                        <td class="item_body pequenio">{{$item->cantidad*$item->precio_venta}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="footer">
                Total: {{$total}}
            </div>
        </div>
    </div>
</body>

</html>