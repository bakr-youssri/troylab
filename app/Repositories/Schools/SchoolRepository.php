<?php

namespace App\Repositories\Schools;

use App\Models\School;
use App\Repositories\BaseCrudRepositoryInterface;

class SchoolRepository implements  BaseCrudRepositoryInterface
{
    private $model;

    public function __construct(School $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        $school = $this->model->create($data);
        return $school ;
    }

    public function update(array $data, $school)
    {
        $school->update($data);
        return $school;
    }
}
