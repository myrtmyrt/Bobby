<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        "description",
        "state"
    ];

    protected $keyType = "uuid";

    public function association()
    {
        return $this->belongsTo('App\Models\Association');
    }

    public function unavailibility()
    {
        return $this->belongsTo('App\Models\Unavailibility');
    }

    public function itemClass()
    {
        return $this->belongsTo('App\Models\ItemClass');
    }

    public function request()
    {
        return $this->belongsTo('App\Models\BorrowRequest');
    }

    public function item_condition_histories(): MorphToMany
    {
        return $this->morphToMany(ItemConditionHistory::class, 'item_condition_history');
    }

}
