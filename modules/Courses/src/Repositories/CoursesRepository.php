<?php

namespace Modules\Courses\src\Repositories;

use Modules\Courses\src\Models\Course;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Modules\Courses\src\Repositories\CoursesRepositoryInterface;

class CoursesRepository extends BaseRepository implements CoursesRepositoryInterface
{
    public function getModel()
    {
        return Course::class;
    }

    public function getCourses($limit)
    {
        return $this->model->paginate($limit);
    }

    public function getAllCourses()
    {
        return $this->model->select(['id', 'name', 'price', 'status', 'created_at']);
    }
}
