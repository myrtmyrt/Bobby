<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function item()
    {
        return $this->hasMany('App\Models\Item');
    }
}
