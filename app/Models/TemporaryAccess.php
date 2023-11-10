<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function association()
    {
        return $this->belongsTo('App\Models\Association');
    }
}
