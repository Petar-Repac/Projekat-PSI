<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $idRole
 * @property string $name
 * @property int $privilege
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'role';
	protected $primaryKey = 'idRole';
	public $timestamps = false;

	protected $casts = [
		'privilege' => 'int'
	];

	protected $fillable = [
		'name',
		'privilege'
	];

	public function users()
	{
		return $this->hasMany(User::class, 'role');
	}
}
