<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class ItemClass extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "private",
        "asso_id"
    ];

    public function item() : HasMany
    {
        return $this->hasMany(Item::class, 'class_id');
    }

    public function categories():HasMany
    {
        return $this->hasMany(ClassCategory::class, 'class_id');
    }
}
