<?php

namespace App\Domain\Inventory;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as IlluminateCollection;
use App\DTOs\ArticleDTO;


interface IInventoryContract
{
    public function getInventoryList(int $user_id):Collection;
    public function getArticleById(int $user_id, int $id):IlluminateCollection;  
    public function updateArticle(ArticleDTO $articleDto):IlluminateCollection;
}