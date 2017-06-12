<?php

namespace App;
use App\Note;
use App\Semester
use App\User;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
 	protected $fillable = ['name','semester_id','user_id','note_id'];

 	public function notes()
 	{
 		return $this->hasMany(Note::class);
 	}

 	public function semester()
 	{
 		return $this->belongsTo(Semester::class);
 	}

 	public function user()
 	{
 		return $this->belongsTo(User::class);
 	}
}
