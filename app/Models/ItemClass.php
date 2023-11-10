<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class ItemClass extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "private"
    ];

    public function item()
    {
        return $this->hasMany('App\Models\Item');
    }

    public function class_categories(): MorphToMany
    {
        return $this->morphToMany(ClassCategory::class, 'class_category');
    }
}
