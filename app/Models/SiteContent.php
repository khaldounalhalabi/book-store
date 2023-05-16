<?php

namespace App\Models;

use Awssat\Visits\Visits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class SiteContent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the instance of the user visits
     */
    public function visitsCounter(): Visits
    {
        return visits($this);
    }

    /**
     * Get the visits relation
     */
    public function visits(): Relation
    {
        return visits($this)->relation();
    }
}
