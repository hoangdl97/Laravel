<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Project extends Model
{
	public function scopeSearch($query, $request)
    {
        return $query->searchName($request)
            ->searchLeader($request)
            ->searchStatus($request);
    }

    public function scopeSearchName($query, $request)
    {
        return $query->where('name', 'like', '%' . $request->searchName . '%');
    }

    public function scopeSearchLeader($query, $request)
    {
        return $query->where('leader', 'like', '%' . $request->searchLeader . '%');
    }

    public function scopeSearchStatus($query, $request)
    {
        return $query->where('project_status_id', 'like', '%' . $request->searchStatus . '%');
    }

	protected $fillable = [
		'name', 'start_date', 'end_date', 'description', 'leader', 'project_status_id', 'customer_id'
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
		return $this->belongsTo(ProjectStatus::class);
	}

	public function member_project()
	{
		return $this->belongsToMany(Member::class);
	}

	public function members()
	{
		return $this->belongsToMany(Member::class, 'member_project');
	}

	public function leader()
	{
		return $this->belongsTo(Member::class, 'leader');
	}

	public function getMemberIdsAttribute()
    {
        return $this->members->pluck('id')->toArray();
    }
    //
}
