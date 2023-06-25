<?php

namespace Modules\Courses\src\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'teacher_id',
        'detail',
        'thumbnail',
        'price',
        'sale_price',
        'code',
        'durations',
        'is_document',
        'status',
        'support',
    ];
}
