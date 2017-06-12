<?php

namespace App\Repository;
use App\User;

class MemberRepository
{
    private $MemberRepository;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        $user = $this->user->all();
        return $user;
    }

    public function store($request)
    {
        $user = $this->user->create($request);
        $user->save();
        return true;
    }
}
