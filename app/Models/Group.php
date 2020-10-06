<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $primaryKey = 'group_id';

    protected $fillable = [
        'group_number',
        'course',
        'faculty_id'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }

    /**
     * All groups IDs
     *
     * @return mixed
     */

    public static function getAllGroupsIds()
    {
        return self::select('group_id')->get()->pluck('group_id')->toArray();
    }
}
