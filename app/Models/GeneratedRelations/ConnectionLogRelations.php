<?php
/**
 * WARNING!!
 *
 * Do not modify the content of this file, it's generated by the command:
 * "php artisan models:generate" (package "axn/laravel-models-generator").
 *
 * If you want to add or modify a relation, do it in the model class or in
 * another trait.
 */
namespace App\Models\GeneratedRelations;

trait ConnectionLogRelations
{
    
    /**
     * "belongs to" relation to `devices` table
     * via `device_id` field.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function device()
    {
        return $this->belongsTo(\App\Models\Device::class, 'device_id');
    }

    /**
     * "belongs to" relation to `users` table
     * via `user_id` field.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

}