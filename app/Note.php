<?php

namespace App;
use App\Subject;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['name','description','file','subject_id','user_id'];

    public function subject()
    {
    	return $this->belongsTo(Subject::class);
    }

    public function user()
 	{
 		return $this->belongsTo(User::class);
 	}
}
