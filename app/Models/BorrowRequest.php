<?php

namespace App\Models;

use App\Enum\RequestStateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BorrowRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "start_date",
        "end_date",
        "state",
        "comment",
        "asso_id"
    ];

    protected $casts = [
        "start_date" => "datetime",
        "end_date" => "datetime",
        "state" =>  RequestStateEnum::class

    ];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class);
    }
    }
