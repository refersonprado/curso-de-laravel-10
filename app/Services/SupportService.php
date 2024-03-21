<?php

namespace App\Services;

use stdClass;

class SupportService 
{
    protected $repository;

    public function __construct() {}


    // Metodos

    public function getAll(string $filter) : array 
    {
        $this->repository->getAll($filter);
    }

    public function findOne(string $id) : stdClass
    {
        $this->repository->findOne($id);
    }

    public function delete(string $id) : void 
    {
        $this->repository->detele($id);
    }

    public function new(
        string $subject,
        string $body,
        string $status
    ) : stdClass {
        $this->repository->new(
            $subject,
            $body,
            $status
        );
    }

    public function update(
        string $id,
        string $subject,
        string $body,
        string $status
    ) : stdClass | null{
        $this->repository->update(
            $id,
            $subject,
            $body,
            $status
        );
    }
}