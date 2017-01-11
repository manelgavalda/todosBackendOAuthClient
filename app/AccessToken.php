<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AccessToken
 * @package App
 */
class AccessToken extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['token','user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}