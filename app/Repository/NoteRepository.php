<?php

namespace App\Repository;
use App\Note;

class NoteRepository
{
    private $NoteRepository;

    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    public function all()
    {
       
    }

    public function store($request)
    {
       $note = $this->note->create($request);
       return true;
    }

}
