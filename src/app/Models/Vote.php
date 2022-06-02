<?php
/* Autori: Vukašin Stepanović 0133/2019, Petar Repac 0616/2019 */

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Klasa koja predstavlja jedan red tabele Vote u bazi podataka
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
		'value',
		'voter',
		'post',
	];

	/**
	 * Definise inverznu vezu za postove.
	 */
	public function post()
	{
		return $this->belongsTo(Post::class, 'post');
	}

	/**
	 * Definise inverznu vezu za korisnika.
	 */
	public function user()
	{
		return $this->belongsTo(User::class, 'voter');
	}
}
