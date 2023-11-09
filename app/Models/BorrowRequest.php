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
        "comment",
    ];

    protected $casts = [
        "request_date" => "datetime",
        "start_date" => "datetime",
        "end_date" => "datetime"
    ];
}
