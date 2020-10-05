<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    const COURSES = [
        1, 2, 3, 4, 5
    ];

    /**
     * All courses
     *
     * @return int[]
     */
    public static function getCourses()
    {
        return self::COURSES;
    }
}
