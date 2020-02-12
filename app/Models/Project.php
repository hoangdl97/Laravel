<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = [
		'name', 'start_date', 'end_date', 'description',
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function tasks()
	{
		return $this->hasMany(Task::class);
	}

	public function projectStatus()
	{
		return $this->hasOne(ProjectStatus::class);
	}

	public function members()
	{
		return $this->belongsToMany(Member::class, 'member_project');
	}
    //
}
