<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function item()
    {
        return $this->hasMany('App\Models\Item');
    }

    public function borrower(): MorphToMany
    {
        return $this->morphedByMany(Association::class, 'asso'); // ca doit pas etre ca??
    }

    public function lender(): MorphToMany
    {
        return $this->morphedByMany(Association::class, 'asso');// ca doit pas etre ca??
    }
}
