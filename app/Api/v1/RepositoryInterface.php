<?php

namespace App\Api\v1;

interface RepositoryInterface
{
    public function getAll();
    public function get(int $id);

    public function store(array $data);

    public function update(int $id, array $data);

    public function destroy(int $id);
}
