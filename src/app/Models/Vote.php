<?php
/* Autori: Vukašin Stepanović, Petar Repac */

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vote
 * 
 * @property int $voter
 * @property int $post
 * @property int $value
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Vote extends Model
{
	protected $table = 'Vote';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'voter' => 'int',
		'post' => 'int',
		'value' => 'int'
	];

	protected $fillable = [
		'value'
	];

	public function post()
	{
		return $this->belongsTo(Post::class, 'post');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'voter');
	}
}
