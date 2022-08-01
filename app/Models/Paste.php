<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperPaste
 */
class Paste extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'expiration',
        'access',
        'lang',
        'user_id'
    ];



    /**
     * @return BelongsTo
     */

}
