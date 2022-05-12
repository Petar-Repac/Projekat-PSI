<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $idUser
 * @property string $username
 * @property string $password
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
	protected $table = 'user';
	protected $primaryKey = 'idUser';
	public $timestamps = false;

	protected $casts = [
		'role' => 'int',
		'isBanned' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'username',
		'password',
		'status',
		'role',
		'isBanned'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'role');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class, 'commenter');
	}

	public function posts()
	{
		return $this->hasMany(Post::class, 'author');
	}

	public function votes()
	{
		return $this->hasMany(Vote::class, 'voter');
	}
}
