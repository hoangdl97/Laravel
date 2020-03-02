<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	public function scopeSearch($query, $request)
    {
        return $query->searchTask($request)
            ->searchProject($request)
            ->searchStatus($request);
    }

    public function scopeSearchTask($query, $request)
    {
        return $query->where('name', 'like', '%' . $request->searchName . '%');
    }

    public function scopeSearchProject($query, $request)
    {
        return $query->where('project_id', 'like', '%' . $request->searchProject . '%');
    }

    public function scopeSearchStatus($query, $request)
    {
        return $query->where('task_status_id', 'like', '%' . $request->searchStatus . '%');
    }

	protected $fillable = [
		'name', 'start_date', 'end_date', 'description', 'task_status_id', 'member_id', 'project_id',
	];

	public function taskStatus()
	{
		return $this->belongsTo(TaskStatus::class);
	}

	public function project()
	{
		return $this->belongsTo(Project::class);
	}

	public function member()
	{
		return $this->belongsTo(Member::class);
	}
    //
}
