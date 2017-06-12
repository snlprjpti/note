<?php

namespace App;
use App\Note;
use App\Subject;
use App\Faculty;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->admin;
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

    public function faculty()
    {
        return $this->hasMany(Faculty::class);
    }
}
