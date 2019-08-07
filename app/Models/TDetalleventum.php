<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Aug 2019 23:33:43 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TDetalleventum
 *
 * @property int $id
 * @property int $dll_venta
 * @property int $dll_producto
 * @property int $dll_cantidad
 * @property float $dll_preciounitario
 * @property float $dll_valoriva
 * @property float $dll_subtotal
 * @property float $dll_total
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 *
 * @property \App\Models\TProducto $t_producto
 * @property \App\Models\TVenta $t_venta
 *
 * @package App\Models
 */
class TDetalleventum extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'dll_venta' => 'int',
		'dll_producto' => 'int',
		'dll_cantidad' => 'int',
		'dll_preciounitario' => 'float',
		'dll_valoriva' => 'float',
		'dll_subtotal' => 'float',
		'dll_total' => 'float'
	];

	protected $fillable = [
		'dll_venta',
		'dll_producto',
		'dll_cantidad',
		'dll_preciounitario',
		'dll_valoriva',
		'dll_subtotal',
		'dll_total'
	];

	public function t_producto()
	{
		return $this->belongsTo(\App\Models\TProducto::class, 'dll_producto');
	}

	public function t_venta()
	{
		return $this->belongsTo(\App\Models\TVenta::class, 'dll_venta');
	}
}
