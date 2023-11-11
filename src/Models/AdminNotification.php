<?php

namespace Admin\Extend\AdminNotifications\Models;

use Admin\Models\AdminUser;
use Illuminate\Database\Eloquent\Model;

/**
 * Admin\Extend\AdminNotifications\Models\AdminNotification
 *
 * @property int $id
 * @property int|null $admin_user_id
 * @property string $title
 * @property string|null $link
 * @property string $text
 * @property string|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read AdminUser|null $admin
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereAdminUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminNotification extends Model
{
    protected $table = "admin_notifications";

    protected $fillable = [
        'admin_user_id',
        'title',
        'text',
        'link',
        'read_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function (AdminNotification $notification) {
            \Puller::setGuard('admin')
                ->user($notification->admin_user_id)
                ->channel('admin_notifications_update')
                ->stream();
            $notification->admin?->notifyMe(
                $notification->title,
                $notification->text,
                $notification->link,
            );
        });

        static::updated(function (AdminNotification $notification) {
            \Puller::setGuard('admin')
                ->user($notification->admin_user_id)
                ->channel('admin_notifications_update')
                ->stream();
        });
    }

    public function admin(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AdminUser::class, 'id', 'admin_user_id');
    }

    public static function message(
        int|AdminUser $user,
        string $title,
        string $text,
        string $link = null,
    ) {
        if ($user instanceof AdminUser) {
            $user = $user->id;
        }

        return static::create([
            'admin_user_id' => $user,
            'title' => $title,
            'text' => $text,
            'link' => $link,
        ]);
    }
}
