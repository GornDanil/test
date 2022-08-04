<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
/**
 * App\Models\Paste
 * @mixin IdeHelperPaste
 */
class Paste extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'expiration',
        'access_key',
        'lang',
        'user_id'
    ];
}
