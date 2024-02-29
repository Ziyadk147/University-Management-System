<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = ['name' , 'capacity' , 'deleted_by'];

    public function Course()
    {
        return $this->hasMany(Course::class , 'class_id' , 'id');
    }

    public function Student()
    {
        return $this->hasMany(Student::class, 'class_id' , 'id');
    }
}

