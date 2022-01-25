<?php

namespace App\Repositories\Students;

use App\Models\Student;
use App\Repositories\BaseCrudRepositoryInterface;
use Throwable;

class StudentRepository implements BaseCrudRepositoryInterface
{
    private $model;
    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        $student = $this->model->create($data);
        return $student;
    }

    public function update(array $data, $student)
    {
        $student->update($data);
        return $student;
    }
}
