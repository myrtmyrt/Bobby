<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConditionHistory extends Model
{
    use HasFactory;

    protected $fillable = [
      "condition",
      "date"
    ];

    protected $casts=[
        "date" => "datetime"
    ];

    public function item_condition_histories(): MorphToMany
    {
        return $this->morphToMany(ItemConditionHistory::class, 'item_condition_history');
    }
}
