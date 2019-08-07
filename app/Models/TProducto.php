<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Aug 2019 23:33:17 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TProducto
 * 
 * @property int $id
 * @property string $prd_nombreproducto
 * @property float $prd_valorproducto
 * @property float $prd_valoriva
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $t_detalleventa
 *
 * @package App\Models
 */
class TProducto extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'prd_valorproducto' => 'float',
		'prd_valoriva' => 'float'
	];

	protected $fillable = [
		'prd_nombreproducto',
		'prd_valorproducto',
		'prd_valoriva'
	];

	public function t_detalleventa()
	{
		return $this->hasMany(\App\Models\TDetalleventum::class, 'dll_producto');
	}
}
