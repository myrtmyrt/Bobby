<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Association extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];


    public function access(): HasMany
    {
        return $this->hasMany(TemporaryAccess::class, 'asso_id');
    }

    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class,'asso_id' );
    }

    public function item(): HasMany
    {
        return $this->hasMany(Item::class, 'asso_id');
    }

    public function borrows(): HasMany
    {
        return $this->hasMany(BorrowRequest::class, 'from');
    }

    public function lends(): HasMany
    {
        return $this->hasMany(BorrowRequest::class, 'to');
    }


}
