<?php

namespace Modules\Categories\src\Repositories;

use Modules\Categories\src\Models\Category;
use App\Repositories\BaseRepository;
use Modules\Categories\src\Repositories\CategoriesRepositoryInterface;

class CategoriesRepository extends BaseRepository implements CategoriesRepositoryInterface
{
    public function getModel()
    {
        return Category::class;
    }
    // public function getCategories()
    // {
    //     return $this->model->select(['id', 'name', 'slug', 'parent_id', 'created_at', 'updated_at'])->latest();
    // }
    public function getAllCategories()
    {
        return $this->getAll();
    }
    public function getCategories()
    {
        return $this->model->with('subCategories')->whereParentId(0)->select(['id', 'name', 'slug', 'parent_id', 'created_at', 'updated_at'])->latest();
    }
}