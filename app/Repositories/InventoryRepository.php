<?php

namespace App\Repositories;

use App\Models\Articles;
use App\Domain\Inventory\IInventoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as IlluminateCollection;
use App\DTOs\ArticleDTO;
use DateTime;


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
        ->whereNull('deleted_at')
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

    public function saveArticle(ArticleDTO $articleDto):IlluminateCollection
    {
        $model = new Articles();
        $model->name = $articleDto->getName();
        $model->description = $articleDto->getDescription();
        $model->quantity = $articleDto->getQuantity();
        $model->price = $articleDto->getPrice();
        $model->user_id = $articleDto->getUserId();
        $model->created_at = $articleDto->getCreatedAt();
        $model->save();

        return collect($model);
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
        $model->user_id = $articleDto->getUserId();
        $model->updated_at = $articleDto->getUpdatedAt();
        $model->update();

        return collect($model);
    }

    public function deleteArticle(int $user_id, int $id):void
    {
        $model = $this->model::query()
        ->where('user_id','=',$user_id)
        ->where('id','=',$id)
        ->firstOrFail();

        $model->deleted_at = new DateTime();
        $model->update();
    }

}