<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
	const IS_ADMIN = [
        0 => 'Admin',
        1 => 'User'
    ];
    
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

	public function getIsAdminLabelAttribute()
    {
        return self::IS_ADMIN[$this->is_admin];
    }
    //
}
