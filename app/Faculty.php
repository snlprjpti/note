<?php

namespace App;
use App\Semester;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['name','fullname','user_id'];

	public function semester()
	{
		return $this->hasMany(Semester::class);
	} 

	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
}
