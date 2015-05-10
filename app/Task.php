<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

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
