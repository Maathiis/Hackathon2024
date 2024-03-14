<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Departement
 * 
 * @property int $idDepartement
 * @property string $nomDepartement
 *
 * @package App\Models
 */
class Departement extends Model
{
	protected $table = 'departement';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idDepartement' => 'int'
	];

	protected $fillable = [
		'idDepartement',
		'nomDepartement'
	];
}
