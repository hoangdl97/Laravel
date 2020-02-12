<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = [
		'name', 'phone', 'email', 'address', 'image',
	];

	public function projects()
	{
		return $this->hasMany(Project::class);
	}
    //
}
