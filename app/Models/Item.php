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
        "state"
    ];

    protected $keyType = "uuid";

    public function association() : BelongsTo
    {
        return $this->belongsTo(Association::class, 'asso_id');
    }

    public function unavailibility() : BelongsTo
    {
        return $this->belongsTo(Unavailibility::class, 'unavailibility_id');
    }

    public function itemClass(): BelongsTo
    {
        return $this->belongsTo(ItemClass::class, 'class_id');
    }

    public function request(): HasMany
    {
        return $this->hasMany(BorrowRequest::class, 'item_id');
    }

    public function conditions(): HasMany
    {
        return $this->hasMany(ConditionHistory::class, 'item_id');
    }

}