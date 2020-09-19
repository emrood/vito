<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    use \App\Models\GeneratedRelations\StockLogRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock_logs';

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

    public $fillable = ['stock_user_id', 'cashier_user_id', 'quantity', 'event_product_id'];
}
