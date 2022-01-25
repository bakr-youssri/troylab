<?php

namespace App\Repositories;

interface BaseCrudRepositoryInterface
{
    public function store(array $request);
    public function update(array $request, $id);
}
