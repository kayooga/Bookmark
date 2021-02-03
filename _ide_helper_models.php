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
 * App\Models\AdminModel
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
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminModel whereUpdatedAt($value)
 */
	class AdminModel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bookmarks
 *
 * @property int $id
 * @property string $title
 * @property string $url
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Bookmarks newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookmarks newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookmarks query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookmarks whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookmarks whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookmarks whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookmarks whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookmarks whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookmarks whereUrl($value)
 */
	class Bookmarks extends \Eloquent {}
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
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

