<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
	public function scopeSearch($query, $request) {
        return $query->searchName($request);
    }

    public function scopeSearchName($query, $request) {
        return $query->where('name', 'like', '%' . $request->searchName . '%');
    }

	protected $table = 'task_status';

	protected $fillable = [
		'name',
	];

	public function tasks()
	{
		return $this->hasMany(Task::class);
	}
    //
}
