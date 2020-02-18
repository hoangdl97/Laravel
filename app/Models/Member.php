<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class Member extends Authenticatable
{
	const IS_ADMIN = [
        0 => 'Admin',
        1 => 'User'
    ];

    public function scopeSearch($query, $request)
    {
        return $query->searchName($request)
            ->searchEmail($request)
            ->searchPhone($request)
            ->searchUser($request);
    }

    public function scopeSearchName($query, $request)
    {
        return $query->where('name', 'like', '%' . $request->searchName . '%');
    }

    public function scopeSearchEmail($query, $request)
    {
        return $query->where('email', 'like', '%' . $request->searchEmail . '%');
    }

    public function scopeSearchPhone($query, $request)
    {
        return $query->where('phone', 'like', '%' . $request->searchPhone . '%');
    }

    public function scopeSearchUser($query, $request)
    {
        return $query->where('username', 'like', '%' . $request->searchUser . '%');
    }

    public function scopeSearchPosition($query, $request)
    {
        return $query->where('is_admin', 'like', '%' . $request->searchPosition . '%');
    }

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
