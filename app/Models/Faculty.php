<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'faculty_name'
    ];

    /**
     * All faculties IDs
     *
     * @return mixed
     */

    public static function getAllFacultiesIds()
    {
        return self::select('faculty_id')->get()->pluck('faculty_id')->toArray();
    }
}
