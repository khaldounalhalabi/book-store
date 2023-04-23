<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsToAlias;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * @return BelongsToAlias
     */
    public function user(): BelongsToAlias
    {
        return $this->belongsTo(User::class) ;
    }

    /**
     * @return BelongsToAlias
     */
    public function book(): BelongsToAlias
    {
        return $this->belongsTo(Book::class) ;
    }
}
