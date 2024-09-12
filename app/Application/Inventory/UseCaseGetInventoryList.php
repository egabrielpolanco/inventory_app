<?php

namespace App\Application\Inventory;

use App\Domain\Inventory\IInventoryContract;

class UseCaseGetInventoryList
{
    private IInventoryContract $repository;

    public function __construct(IInventoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $user_id = 1;
        $data = $this->repository->getInventoryList($user_id);
        return $data;
    }
}