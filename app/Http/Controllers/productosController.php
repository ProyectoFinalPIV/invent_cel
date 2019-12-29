<?php

/*
|--------------------------------------------------------------------------
| Controladores --> este va luego de la creacion de rutas en routes/web.php
|--------------------------------------------------------------------------
|--------------------------------------------------------------------------
| Luego de trabajar en este archivo ir a app/resources/views y crear la
| carpeta producto con sus respectivos archivo (create, edit e index)
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\productos;

class productosController extends Controller
{
    /**
     * Mostrar una lista del recurso.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $productos = DB::table('productos as p')
                    //->join('tb_municipio','c.muni_codi','=','tb_municipio.muni_codi')
                    ->join('stocks','p.id_Invent','=','stocks.id_Invent')
                    ->select('p.id_Producto','p.nomb_Producto','p.desc_Producto','p.id_Invent','p.precio_Producto','p.mode_producto')
                    ->paginate(10); //paginacion

        return view('producto.index', compact('productos'));
        //El index debe llamarse producto.index
    }

    /**
     * Mostrar el formulario para crear un nuevo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Almacene un recurso recién creado en el Store.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;
        //$flight->name = $request->name
        $producto->id_Producto = $request->id_Producto;
        $producto->nomb_Producto = $request->nomb_Producto;
        $producto->desc_Producto = $request->desc_Producto;
        $producto->id_Invent = $request->id_Invent;
        $producto->precio_Producto = $request->precio_Producto;
        $producto->mode_Producto = $request->mode_Producto;
        $producto->save();
        return redirect()->route('producto.index')->with('status','guardado');
    }

    /**
     * Mostrar el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Mostrar el formulario para editar el recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $stocks= Stocks::orderBY('id_Invent')->get();
        return view('producto.edit', compact('producto','stocks'));
    }

    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*request()->validate([
            'comu_nomb' => 'required|min:5',
            'muni_codi' => 'required'
        ]);*/
        $producto = Producto::findOrFail($id);
        $producto->fill($request->all());
        $producto->save();
        return redirect()->route('producto.index')->with('status','actualizado');
    }

    /**
     * Eliminar el recurso especificado del almacenamiento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('producto.index')->with('status','eliminado');
    }
}