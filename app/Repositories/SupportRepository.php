<?php 

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

interface SupportRepository 
{
    public function getAll(string $filter) : array;
    public function findOne(string $id) : stdClass | null;
    public function delete(string $id) : void;
    public function new(CreateSupportDTO $dto) : stdClass;
    public function update(UpdateSupportDTO $dto) : stdClass | null;
}