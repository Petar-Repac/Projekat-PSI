<?php
/* Autori: Vukašin Stepanović 0133/2019, Petar Repac 0616/2019 */

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Klasa koja predstavlja jedan red tabele User u bazi podataka
 * 
 * @property int $idUser
 * @property string $username
 * @property string $password
 * @property int $postStatus
 * @property string|null $status
 * @property int $role
 * @property int $isBanned
 * 
 * @property Collection|Comment[] $comments
 * @property Collection|Post[] $posts
 * @property Collection|Vote[] $votes
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	protected $table = 'User';
	protected $primaryKey = 'idUser';
	public $timestamps = false;

	protected $hidden = [
		'password',
		'remember_token',
	];

	protected $fillable = [
		'username',
		'password',
		'postStatus',
		'status',
		'role',
		'isBanned',
	];

	/**
	 * Definise inverznu vezu za ulogu.
	 */
	public function role()
	{
		return $this->belongsTo(Role::class, 'role', 'idRole');
	}

	/**
	 * Definise 1:n vezu za komentare.
	 */
	public function comments()
	{
		return $this->hasMany(Comment::class, 'commenter');
	}

	/**
	 * Definise 1:n vezu za postove.
	 */
	public function posts()
	{
		return $this->hasMany(Post::class, 'author');
	}

	/**
	 * Definise 1:n vezu za glasove.
	 */
	public function votes()
	{
		return $this->hasMany(Vote::class, 'voter');
	}


	/**
	 * Proverava da li je korisnik običan korisnik.
	 * @return boolean
	 */
	public function isUser()
	{
		return true;
	}

	/**
	 * Proverava da li je korisnik moderator.
	 * @return boolean
	 */
	public function isMod()
	{
		return $this->role == Role::mod()->idRole || $this->role == Role::admin()->idRole;
	}

	/**
	 * Proverava da li je korisnik administrator.
	 * @return boolean
	 */
	public function isAdmin()
	{
		return $this->role == Role::admin()->idRole;
	}
}
