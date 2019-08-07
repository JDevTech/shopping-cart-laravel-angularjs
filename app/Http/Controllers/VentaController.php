<?php

namespace App\Http\Controllers;

use App\Models\TVenta;
use App\Models\TProducto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productos =  TProducto::all();
      $ventaAbierta = TVenta::where('vtn_estado', 'Cotizacion')->first();
      if($ventaAbierta != null){
        return view('carritocompras.productos', compact('productos', 'ventaAbierta'));
      }else{
        return view('carritocompras.index');
      }
    }

    public function ventasPagadas(){
      $ventas = TVenta::with('t_detalleventa')->where('vtn_estado', 'Pagada')->get();
      $ventas = collect($ventas)->map(function($venta){

        $venta['valor_total_items_iva_0'] = collect(collect(collect($venta['t_detalleventa'])->filter(function($dll){
          return $dll['dll_valoriva'] == 0.00;
        }))->pluck('dll_total'))->sum();

        $venta['valor_total_items_iva_8'] = collect(collect(collect($venta['t_detalleventa'])->filter(function($dll){
          return $dll['dll_valoriva'] == 0.08;
        }))->pluck('dll_total'))->sum();

        $venta['valor_total_items_iva_19'] = collect(collect(collect($venta['t_detalleventa'])->filter(function($dll){
          return $dll['dll_valoriva'] == 0.19;
        }))->pluck('dll_total'))->sum();
        return $venta;
      });
      return view('carritocompras.ventas', compact('ventas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      $venta = $data;
      $venta['vtn_estado'] = 'Cotizacion';
      $nuevaVenta = TVenta::create($venta);
      return response()->json($nuevaVenta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TVenta  $tVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $data = $request->all();
      $estado = $data['estado'];
      $subtotal = $data['subtotal'];
      $total = $data['total'];

      $ventaToUpdate = TVenta::find($id)->update([
        'vtn_estado' => $estado,
        'vtn_valorsubtotal' => $subtotal,
        'vtn_valortotal' => $total,
      ]);
      return response()->json($ventaToUpdate);
    }
}
