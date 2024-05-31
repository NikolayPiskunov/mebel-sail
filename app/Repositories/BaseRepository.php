<?php

namespace App\Repositories;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class BaseRepository
{
    protected string $modelClass;
    protected Model $model;
    protected Guard $auth;

    public function __construct()
    {
        $this->model = app($this->modelClass);
        $this->auth = app(Guard::class);
    }

    public function getOne($id): Model
    {
        return $this->model->findOrFail($id);
    }

    public function findOne($id): ?Model
    {
        return $this->model->find($id);
    }

    /** @return Collection|array<array-key, Model> */
    public function getMany(array $ids, bool $inThatOrder = false): Collection
    {
        $models = $this->model::query()->find($ids);

        return $inThatOrder ? $models->orderByArray($ids) : $models;
    }

    /** @return Collection|array<array-key, Model> */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getFirstWhere(...$params): ?Model
    {
        return $this->model->firstWhere(...$params);
    }

    protected function pagination(Builder $query, int $limit, int $offset = 0): Builder
    {
        return $query->offset($offset)->limit($limit);
    }
}
