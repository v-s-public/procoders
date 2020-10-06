<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'student_id';

    protected $fillable = [
        'name',
        'patronymic',
        'surname',
        'date_of_birth',
        'group_id'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
