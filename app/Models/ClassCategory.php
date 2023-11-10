<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCategory extends Model
{
    use HasFactory;

    public function categories(): MorphToMany
    {
        return $this->morphedByMany(Category::class, 'class_category');
    }

    public function classes(): MorphToMany
    {
        return $this->morphedByMany(ItemClass::class, 'class_category');
    }

}
