<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Customer extends Model
{
	public function scopeSearch($query, $request)
    {
        return $query->searchName($request)
            ->searchEmail($request)
            ->searchPhone($request);
    }

    public function scopeSearchName($query, $request)
    {
        return $query->where('name', 'like', '%' . $request->searchName . '%');
    }

    public function scopeSearchEmail($query, $request)
    {
        return $query->Where('email', 'like', '%' . $request->searchEmail . '%');
    }

    public function scopeSearchPhone($query, $request)
    {
        return $query->Where('phone', 'like', '%' . $request->searchPhone . '%');
    }

	protected $fillable = [
		'name', 'phone', 'email', 'address', 'image',
	];

	public function projects()
	{
		return $this->hasMany(Project::class);
	}
    //
}
