<?php

namespace App\Repository;
use App\Faculty;
use App\User;


class FacultyRepository
{
	private $FacultyRepository;

	public function __construct(Faculty $faculty)
	{
		$this->faculty = $faculty;
	}

	public function store($request)
	{
		$faculty = $this->faculty->create($request);
		$faculty->save();
		return true;
	}

	public function delete($id)
	{
		$faculty = $this->faculty->find($id);
		$faculty->delete();
		return true;

	}

}