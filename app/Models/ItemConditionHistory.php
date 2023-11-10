<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemConditionHistory extends Model
{
    use HasFactory;

    public function items(): MorphToMany
    {
        return $this->morphedByMany(Item::class, 'class_category');
    }

    public function condition_histories(): MorphToMany
    {
        return $this->morphedByMany(ConditionHistory::class, 'class_category');
    }
}
