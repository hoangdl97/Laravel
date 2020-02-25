<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
	public function scopeSearch($query, $request) {
        return $query->searchName($request);
    }

    public function scopeSearchName($query, $request) {
        return $query->where('name', 'like', '%' . $request->searchName . '%');
    }

	protected $table = 'project_status';

	protected $fillable = [
		'name',
	];

	public function project()
	{
		return $this->hasMany(Project::class);
	}
    //
}
