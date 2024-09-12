<?php

namespace App\Repositories;

use App\Models\Articles;
use App\Domain\Inventory\IInventoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as IlluminateCollection;
use App\DTOs\ArticleDTO;


class InventoryRepository implements IInventoryContract
{
    private Articles $model;

    public function __construct()
    {
        $this->model = new Articles();
    }

    public function getInventoryList(int $user_id):Collection
    {
        $data = $this->model::query()
        ->where('user_id','=',$user_id)
        ->get();

        return $data;
    }

    public function getArticleById(int $user_id, int $id):IlluminateCollection
    {
        $data = $this->model::query()
        ->where('user_id','=',$user_id)
        ->where('id','=',$id)
        ->findOrFail($id);

        return collect($data);
    }

    public function updateArticle(ArticleDTO $articleDto):IlluminateCollection
    {
        $model =  $this->model::query()
        ->where('user_id','=',$articleDto->getUserId())
        ->where('id','=',$articleDto->getId())
        ->firstOrFail();
        
        $model->name = $articleDto->getName();
        $model->description = $articleDto->getDescription();
        $model->quantity = $articleDto->getQuantity();
        $model->price = $articleDto->getPrice();
        $model->updated_at = $articleDto->getUpdatedAt();
        $model->update();

        return collect($model);
    }

}