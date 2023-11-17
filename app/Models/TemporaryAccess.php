<?php

namespace App\Models;

use App\Enum\RequestStateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TemporaryAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        "user",
        "state",
        "end_date",
        "asso_id"
    ];

    protected $casts = [
        "end_date" => "datetime",
        "state" => RequestStateEnum::class
    ];

}
