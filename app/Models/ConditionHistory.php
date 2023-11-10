<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
