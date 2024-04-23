<?php

namespace App\Repositories;

use App\DTO\Supports\UpdateSupportDTO;
use App\DTO\Supports\CreateSupportDTO;
use App\Models\Support;
use App\Repositories\SupportRepository;
use stdClass;

class SupportEloquentORM implements SupportRepository
{
    public function __construct(
        protected Support $model
    ){ }
        
    public function paginate(
        int $page = 1, 
        int $totalPerPage = 15, 
        string $filter = null,
        string $status = null,
    ): PaginationInterface
    {
        $query = $this->model
                    ->where(
                        function ($query) use ($filter) {
                            if ($filter) {
                                $query->where('subject', $filter);
                                $query->orWhere('body', 'like', "%{$filter}%");
                            }
                        });
        
        if ($status) {
            $query->where('status', $status);
        }
    
        $result = $query->orderBy('created_at', 'desc')
                    ->paginate($totalPerPage, ['*'], 'page', $page);
        return new PaginationPresenter($result);
    }
    
    
    public function getAll(string $filter = null) : array {
        return $this->model
                    ->where(
                        function ($query) use ($filter) {
                            if ($filter) {
                                $query->where('subject', $filter);
                                $query->orWhere('body', 'like', "%{$filter}%");
                            }
                        })
                    ->get()
                    ->toArray();
    }

    public function findOne(string $id) : stdClass | null {
        $support = $this->model->find($id);

        if(!$support) {
            return null;
        }

        return (object) $this->model->find($id)->toArray();
    }

    public function delete(string $id) : void 
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateSupportDTO $dto) : stdClass 
    {
        $support = $this->model->create (
            (array) $dto
        );

        return (object) $support->toArray();
    }

    public function update(UpdateSupportDTO $dto) : stdClass | null
    {
        if (!$support = $this->model->find($dto->id)) {
            return null;
        }

        $support->update(
            (array) $dto
        );

        return (object) $support->toArray();
    }
}