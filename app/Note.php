<?php

namespace App;
use App\Subject;
use App\Faculty;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['name','file','subject_id','faculty_id','user_id'];

    public function subject()
    {
    	return $this->belongsTo(Subject::class);
    }

    public function user()
 	{
 		return $this->belongsTo(User::class);
 	}
 	
 	  public function faculty()
 	{
 		return $this->belongsTo(Faculty::class);
 	}
}
