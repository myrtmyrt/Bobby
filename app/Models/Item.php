<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        "description",
        "state",
        "mono_item",
        "quantity"
    ];

/*    protected $keyType = "uuid";*/

    public function unavailibilities() : HasMany
    {
        return $this->hasMany(Unavailibility::class, 'item_id');
    }

    public function itemClass(): BelongsTo
    {
        return $this->belongsTo(ItemClass::class, 'class_id');
    }


    public function request(): HasMany
    {
        return $this->hasMany(BorrowedItem::class, 'item_id');
    }

    public function conditions(): HasMany
    {
        return $this->hasMany(ConditionHistory::class, 'item_id');
    }

}
