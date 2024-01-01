<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['name' ,'class_id', 'deleted_by'];

    public function Class()
    {
        return $this->belongsTo(Classes::class);
    }
}
