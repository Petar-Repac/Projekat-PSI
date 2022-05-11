<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * 
 * @property int $idComment
 * @property int|null $commenter
 * @property int $post
 * @property string $content
 * @property Carbon $timeCreated
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class Comment extends Model
{
	protected $table = 'comment';
	protected $primaryKey = 'idComment';
	public $timestamps = false;

	protected $casts = [
		'commenter' => 'int',
		'post' => 'int'
	];

	protected $dates = [
		'timeCreated'
	];

	protected $fillable = [
		'commenter',
		'post',
		'content',
		'timeCreated'
	];

	public function post()
	{
		return $this->belongsTo(Post::class, 'post');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'commenter');
	}
}
