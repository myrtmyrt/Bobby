<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];


    public function access()
    {
        return $this->hasMany('App\Models\TemporaryAccess');
    }

    public function inventory()
    {
        return $this->hasMany('App\Models\Inventory');
    }

    public function item()
    {
        return $this->hasMany('App\Models\Item');
    }


}
