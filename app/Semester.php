<?php

use App\User;
namespace App;
use App\Faculty;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['name','subject_id','faculty_id','user_id'];

    public function user()
 	{
 		return $this->belongsTo(User::class);
 	}

 	public function subject()
 	{
 		return $this->hasMany(Subject::class);
 	}

 	public function faculty()
 	{
 		return $this->belongsTo(Faculty::class);
 	}
}
