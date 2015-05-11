<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
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
