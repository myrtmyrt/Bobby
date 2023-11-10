<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BorrowRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "request_date",
        "start_date",
        "end_date",
        "state",
        "comment"
    ];

    protected $casts = [
        "request_date" => "datetime",
        "start_date" => "datetime",
        "end_date" => "datetime"
    ];

    public function item() : HasMany
    {
        return $this->hasMany(Item::class,'item_id');
    }

    public function borrower(): BelongsTo
    {
        return $this->belongsTo(Association::class, 'from');
    }

    public function lender(): BelongsTo
    {
        return $this->belongsTo(Association::class, 'to');
    }
}
