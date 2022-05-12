<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
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

	public function user()
	{
		return $this->belongsTo(User::class, 'author');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class, 'post');
	}

	public function votes()
	{
		return $this->hasMany(Vote::class, 'post');
	}
}
