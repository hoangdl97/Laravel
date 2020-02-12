<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = [
		'name', 'start_date', 'end_date', 'description',
	];

	public function taskStatus()
	{
		return $this->hasOne(TaskStatus::class);
	}

	public function project()
	{
		return $this->belongsTo(Project::class);
	}

	public function member()
	{
		return $this->belongsTo(Member:class);
	}
    //
}
