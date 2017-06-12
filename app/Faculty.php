<?php

namespace App;
use App\Subject;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['name','subject_id','user_id'];

	public function subjects()
	{
		return $this->hasMany(Subject::class);
	} 

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
