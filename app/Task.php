<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	protected static $rules = [
			'name' => ['required', 'min:3'],
			'slug' => ['required'],
			'description' => ['required'],
	];

	protected $guarded = [];

	/**
	 * Find all tasks which will belongs to concrete project
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function project()
	{
		return $this->belongsTo('App\Project');
	}
}
