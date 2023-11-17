<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BorrowedItem extends Model
{
    use HasFactory;

    protected $fillable=[
        "quantity"
    ];

    public function borrow (): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function request (): BelongsTo
    {
        return $this->belongsTo(BorrowRequest::class, 'borrow_id');
    }
}

