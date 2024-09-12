<?php

namespace App\Application\Inventory;

use App\Domain\Inventory\IInventoryContract;
use App\DTOs\ArticleDTO;

class UseCaseSaveArticle
{
    private IInventoryContract $repository;

    public function __construct(IInventoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(ArticleDTO $articleDTO)
    {
        $data = $this->repository->saveArticle($articleDTO);
        return $data;
    }
}