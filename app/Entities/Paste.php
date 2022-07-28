<?php

namespace App\Entities;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Paste.
 *
 * @package namespace App\Entities;
 */
class Paste extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'message',
        'expiration',
        'access',
        'lang',
        'user'
    ];

}
