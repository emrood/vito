<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventAgent extends Model
{
    use \App\Models\GeneratedRelations\EventAgentRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event_agents';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
