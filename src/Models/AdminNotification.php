<?php

namespace Admin\Extend\AdminNotifications\Models;

use Admin\Models\AdminUser;
use Illuminate\Database\Eloquent\Model;

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
