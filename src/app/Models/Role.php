<?php
/* Autori: Vukašin Stepanović, Petar Repac */

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
	protected $table = 'Role';
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

	public static function user()
	{
		return Role::where('name', '=', 'user')->first();
	}

	public static function mod()
	{
		return Role::where('name', '=', 'moderator')->first();
	}

	public static function admin()
	{
		return Role::where('name', '=', 'administrator')->first();
	}
}
