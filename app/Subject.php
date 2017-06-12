<?php

namespace App;
use App\Note;
use App\Faculty;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
 	protected $fillable = ['name','faculty_id','user_id','note_id'];

 	public function notes()
 	{
 		return $this->hasMany(Note::class);
 	}

 	public function faculty()
 	{
 		return $this->belongsTo(Faculty::class);
 	}

 	public function user()
 	{
 		return $this->belongsTo(User::class);
 	}
}
