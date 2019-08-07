<?php

namespace App\Http\Controllers;

use App\Models\TDetalleventum;
use App\Models\TVenta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      $producto = $data['producto'];
      $newDetailInfo = $data['producto_to_add'];
      //Calculo el subtotal de lo pedido en el item
      $newDetailInfo['dll_subtotal'] = $producto['prd_valorproducto'] * $newDetailInfo['dll_cantidad'];
      //Calculo el valor total del iva
      $valorTotalIva = $newDetailInfo['dll_subtotal'] * $producto['prd_valoriva'];
      $newDetailInfo['dll_total'] = $newDetailInfo['dll_subtotal'] + $valorTotalIva;
      $newDetailInfo['dll_preciounitario'] = $producto['prd_valorproducto'];
      $newDetailInfo['dll_valoriva'] = $producto['prd_valoriva'];
      //Guardo en la base de datos el nuevo detalle
      $nuevoDetalle = TDetalleventum::create($newDetailInfo);
      return response()->json($nuevoDetalle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TDetalleventum  $tDetalleventum
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $venta = TVenta::find($id);
      $productos = TDetalleventum::with('t_producto', 't_venta')->where('dll_venta', $id)->get();
      return view('carritocompras.cart', compact('venta', 'productos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TDetalleventum  $tDetalleventum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $elementToDelete = TDetalleventum::find($id)->delete();
      return response()->json($elementToDelete);
    }
}
