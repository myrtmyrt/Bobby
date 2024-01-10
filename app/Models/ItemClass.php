<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class ItemClass extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "private",
        'quantity',
        'image',
        "asso_id"
    ];

    public function items() : HasMany
    {
        return $this->hasMany(Item::class, 'class_id');
    }

    /*public function categories():HasMany
    {
        return $this->hasMany(ClassCategory::class, 'class_id');
    }*/

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_item_class', 'item_class_id', 'category_id');
    }

    public function belongsToCategory($cat)
    {
        foreach ($this->categories as $category) {
            if ($category->id === $cat) {
                return true;
            }
        }

        return false;
    }

}
