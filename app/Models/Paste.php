<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
/**
 * App\Models\Paste
 * @mixin IdeHelperPaste
 * @property int $id
 * @property string|null $title
 * @property string $message
 * @property string $expiration
 * @property string $access
 * @property string $lang
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $user_id
 * @method static Builder|Paste newModelQuery()
 * @method static Builder|Paste newQuery()
 * @method static Builder|Paste query()
 * @method static Builder|Paste whereAccess($value)
 * @method static Builder|Paste whereCreatedAt($value)
 * @method static Builder|Paste whereExpiration($value)
 * @method static Builder|Paste whereId($value)
 * @method static Builder|Paste whereLang($value)
 * @method static Builder|Paste whereMessage($value)
 * @method static Builder|Paste whereTitle($value)
 * @method static Builder|Paste whereUpdatedAt($value)
 * @method static Builder|Paste whereUserId($value)
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
