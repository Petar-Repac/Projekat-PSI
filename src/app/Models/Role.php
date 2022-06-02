<?php
/* Autori: Vukašin Stepanović 2019/0133, Petar Repac 2019/0616 */



namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Klassas Role  predstavlja jedan red tabele Role u bazi podataka
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

	/**
	 * Pronalazi sve pripadajuće  korisnike
	 * 
	 * @param void
	 * @return Collection|Models\User
	 */
	public function users()
	{
		return $this->hasMany(User::class, 'role');
	}

	/**
	 * Pronalazi prvog pripadajućeg korisnika
	 * 
	 * @param void
	 * @return Models\User
	 */
	public static function user()
	{
		return Role::where('name', '=', 'user')->first();
	}

	/**
	 * Pronalazi prvog pripadajuceg moderatora
	 * 
	 * @param void
	 * @return Models\User
	 */
	public static function mod()
	{
		return Role::where('name', '=', 'moderator')->first();
	}

	/**
	 *  Pronalazi prvog pripadajuceg administratora
	 * 
	 * @param void
	 * @return Models\User
	 */
	public static function admin()
	{
		return Role::where('name', '=', 'administrator')->first();
	}
}