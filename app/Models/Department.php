<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['name'])]
class Department extends Model
{
    public function lecturers():Hasmany
    {
        return $this->hasmany(lecturer::class);
    }
}
