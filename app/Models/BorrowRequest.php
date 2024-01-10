<?php

namespace App\Models;

use App\Enum\RequestStateEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BorrowRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        "debut_date",
        "end_date",
        "state",
        "comment",
        "asso_id"
    ];

    protected $casts = [
        "debut_date" => "datetime",
        "end_date" => "datetime",
        "state" =>  RequestStateEnum::class

    ];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'borrow_request_item','borrow_request_id','item_id');
    }

    public function isAssoRequest($asso){ // test si la demande est faite a l'asso (l'asso est le preteur)
        if ($this->items->isNotEmpty()) {
            $class = $this->items->first()->itemclass;
            return $class->asso_id == $asso;
        }else{
            return false;
        }
    }
}
