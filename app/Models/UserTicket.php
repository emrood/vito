<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    use \App\Models\GeneratedRelations\UserTicketRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_tickets';

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
