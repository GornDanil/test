<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Paste
 *
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
 * @property string|null $access_key
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Paste whereAccessKey($value)
 */
	class IdeHelperPaste {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Paste[] $pastes
 * @property-read int|null $pastes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 */
	class IdeHelperUser {}
}

