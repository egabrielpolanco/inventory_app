<?php

namespace App\Application\Inventory;

use App\Domain\Inventory\IInventoryContract;

class UseCaseGetInventoryShow
{
    private IInventoryContract $repository;

    public function __construct(IInventoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id)
    {
        $user_id = 1;
        $data = $this->repository->getArticleById($user_id, $id);
        return $data;
    }
}