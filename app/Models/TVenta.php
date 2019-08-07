<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Aug 2019 23:33:31 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TVenta
 * 
 * @property int $id
 * @property string $vtn_cliente
 * @property float $vtn_valorsubtotal
 * @property float $vtn_valortotal
 * @property string $vtn_estado
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $t_detalleventa
 *
 * @package App\Models
 */
class TVenta extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'vtn_valorsubtotal' => 'float',
		'vtn_valortotal' => 'float'
	];

	protected $fillable = [
		'vtn_cliente',
		'vtn_valorsubtotal',
		'vtn_valortotal',
		'vtn_estado'
	];

	public function t_detalleventa()
	{
		return $this->hasMany(\App\Models\TDetalleventum::class, 'dll_venta');
	}
}
