<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventProduct extends Model
{
    use \App\Models\GeneratedRelations\EventProductRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event_products';

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

    protected $fillable = ['event_id', 'product_id', 'price', 'currency', 'initial'];
}
