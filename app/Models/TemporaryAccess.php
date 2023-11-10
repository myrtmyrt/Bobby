<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemporaryAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        "user",
        "state",
        "end_date"
    ];

    protected $casts = [
        "end_date" => "datetime"
    ];

    public function association() : BelongsTo
    {
        return $this->belongsTo(Association::class, 'asso_id');
    }
}
