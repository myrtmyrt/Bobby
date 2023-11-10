<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unavailibility extends Model
{
    use HasFactory;

    protected $fillable = [
        "start_date",
        "end_date"
    ];

    protected $casts = [
        "start_date" => "datetime",
        "end_date" => "datetime"
    ];

    public function item() : HasMany
    {
        return $this->hasMany(Item::class, 'unavailibility_id');
    }
}
