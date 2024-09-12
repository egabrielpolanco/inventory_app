<?php

namespace App\Application\Inventory;

use App\Domain\Inventory\IInventoryContract;
use Illuminate\Support\Facades\Auth;

class UseCaseDeleteArticle
{
    private IInventoryContract $repository;

    public function __construct(IInventoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $id)
    {
        $data = $this->repository->deleteArticle(Auth::id(),$id);
        return $data;
    }
}