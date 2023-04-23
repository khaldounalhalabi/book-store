<?php

namespace App\Models;

use Awssat\Visits\Visits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Book extends Model
{
    use HasFactory;

    protected $guarded = ['id'] ;

    public function likes()
    {
        return $this->hasMany(Like::class) ;
    }

    public function rates()
    {
        return $this->hasMany(Rate::class) ;
    }

    /**
     * Get the instance of the user visits
     *
     * @return Visits
     */
    public function visitsCounter(): Visits
    {
        return visits($this);
    }

    /**
     * Get the visits relation
     *
     * @return Relation
     */
    public function visits(): Relation
    {
        return visits($this)->relation();
    }

    /**
     * @return HasMany
     */
    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class) ;
    }
}
