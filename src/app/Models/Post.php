<?php
/* Autori: Vukašin Stepanović 2019/0133, Petar Repac 2019/0616 */


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post  predstavlja jedan red tabele Post u bazi podataka
 * 
 * @property int $idPost
 * @property int $isPermanent
 * @property Carbon $timePosted
 * @property string $heading
 * @property string $content
 * @property int|null $author
 * @property int $isLocked
 * 
 * @property User|null $user
 * @property Collection|Comment[] $comments
 * @property Collection|Vote[] $votes
 *
 * @package App\Models
 */
class Post extends Model
{
	protected $table = 'Post';
	protected $primaryKey = 'idPost';
	public $timestamps = false;

	protected $casts = [
		'isPermanent' => 'int',
		'author' => 'int',
		'isLocked' => 'int'
	];

	protected $dates = [
		'timePosted'
	];

	protected $fillable = [
		'isPermanent',
		'timePosted',
		'heading',
		'content',
		'author',
		'isLocked'
	];

	/**
	 * Pronalazi pripadajućeg korisnika
	 * 
	 * @param void
	 * @return Models\Post
	 */
	public function user()
	{
		return $this->belongsTo(User::class, 'author');
	}

	/**
	 * Pronalazi pripadajuće komentare
	 * 
	 * @param void
	 * @return Collection|Models\Comment
	 */
	public function comments()
	{
		return $this->hasMany(Comment::class, 'post');
	}

	/**
	 * Pronalazi pripadajuće glasove
	 * 
	 * @param void
	 * @return @return Collection|Models\Vote
	 */
	public function votes()
	{
		return $this->hasMany(Vote::class, 'post');
	}
}