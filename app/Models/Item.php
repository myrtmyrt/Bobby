<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        "description",
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


    public function requests(): BelongsToMany
    {
        return $this->belongsToMany(BorrowRequest::class);
    }

    public function conditions(): HasMany
    {
        return $this->hasMany(ConditionHistory::class, 'item_id');
    }

    public function isAvailable()
    {
        foreach ($this->unavailibilities as $unavailibility){
            if($unavailibility->end_date->gt(now()->format('Y-m-d H:i:s')) && $unavailibility->start_date->lt( now()->format('Y-m-d H:i:s'))){
                return false;
            }
        }
        return true;
    }

}
