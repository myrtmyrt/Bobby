<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function association()
    {
        return $this->belongsTo('App\Models\Association');
    }
}
