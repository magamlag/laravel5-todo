<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * Model there goes validation and table relations
 * @package App
 */
class Project extends Model {

	public static $rules = [
			'name' => [ 'required', 'min:3' ],
			'slug' => [ 'required' ],
	];

	protected $fillable = [ 'name', 'slug' ];

	/**
	 * Grab all tasks related to project
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function tasks()
	{
		return $this->hasMany('App\Task');
	}
}
