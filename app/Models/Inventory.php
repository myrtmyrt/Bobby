<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        "user",
        "date"
    ];

    protected $casts =[
        "date" => "datetime"
    ];

    public function association() : BelongsTo
    {
        return $this->belongsTo(Association::class, 'asso_id');
    }
}
