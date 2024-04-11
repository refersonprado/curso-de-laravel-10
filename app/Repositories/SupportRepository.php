<?php 

namespace App\Repositories;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use stdClass;

interface SupportRepository 
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null) : PaginationInterface;
    public function getAll(string $filter) : array;
    public function findOne(string $id) : stdClass | null;
    public function delete(string $id) : void;
    public function new(CreateSupportDTO $dto) : stdClass;
    public function update(UpdateSupportDTO $dto) : stdClass | null;
}