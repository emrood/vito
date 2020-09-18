<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pointofsale extends Model
{
    use \App\Models\GeneratedRelations\PointofsaleRelations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pointofsales';

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

    protected $fillable = ['model', 'manufacturer', 'imei', 'serial_number', 'mac_address', 'ip_address'];
}