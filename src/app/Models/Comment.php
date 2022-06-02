<?php
/* Autori: Vukašin Stepanović 2019/0133 , Petar Repac 2019/0616 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Klasa Comment predstavlja jedan red tabele Comment u bazi podataka
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
	protected $table = 'Comment';
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

	/**
	 * Pronalazi pripadajuću objavu
	 * 
	 * @param void
	 * @return Models\Post
	 */
	public function post()
	{
		return $this->belongsTo(Post::class, 'post');
	}

	/**
	 * Pronalazi pripadajućeg korisnika
	 * 
	 * @param void
	 * @return Models\User
	 */
	public function user()
	{
		return $this->belongsTo(User::class, 'commenter');
	}
}