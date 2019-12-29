
@extends('layouts.app')

@section('title', 'Listado de Productos')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>

@section('title2', 'Listado de Productos')

@section('content')
	<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="margin-top:10px">
        <thead>
            <tr>
                <th>id_Producto</th>
                <th>nomb_Producto</th>            
                <th>desc_Producto</th>
                <th>id_Invent</th>
                <th>precio_Producto</th>
                <th>mode_Producto</th>
                <th class="text-center">
                    @cannot('isAdmin')
                        <a href="/producto/create" class="btn btn-primary btn-sm" id="nuevo"  
                            data-toggle="tooltip" title="Nuevo Producto">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Nueva
                        </a> 
                    @endcannot
                </th>
            </tr>
        </thead>
        <tbody>
            @include('common.success')

            @foreach($productos as $producto)
                <tr>
                    <td>{{$producto->id_Producto}}</td>
                    <td>{{$producto->nomb_Producto}}</td>
                    <td>{{$producto->desc_Producto}}</td>
                    <td>{{$producto->id_Invent}}</td>
                    <td>{{$producto->precio_Producto}}</td>
                    <td>{{$producto->mode_Porducto}}</td>
                    <td class="text-center">
                        @auth
                        <form method="POST" action="/producto/{{$producto->id_Producto}}" accept-charset="UTF-8" 
                            style="display:inline">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">					
                            <button type="submit" class="btn btn-danger btn-sm fa fa-trash" style="margin-right: 10px">	</button>				
                        </form>
                        <a href="/producto/{{$producto->id_Producto}}/edit"><i class="btn btn-info btn-sm fa fa-edit"></i></a>
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>	
    {{ $productos->links()}}
@endsection
