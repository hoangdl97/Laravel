<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	protected $fillable = [
		'name', 'phone', 'email', 'address', 'image', 'username', 'password', 'is_admin'
	];

	protected $hidden = [
        'password', 'remember_token',
    ];

	public function tasks()
	{
		return $this->hasMany(Task::class);
	}

	public function projects()
	{
		return $this->belongsToMany(Project::class, 'member_project');
	}
    //
}
