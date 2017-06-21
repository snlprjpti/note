<?php

namespace App;
use App\Faculty;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
 	protected $fillable = ['name','grade','faculty_id','user_id'];

 	public function faculty()
 	{
 		return $this->belongsTo(Faculty::class);
 	}

 	public function user()
 	{
 		return $this->belongsTo(User::class);
 	}
}
