<?php

namespace Admin\Extend\AdminNotifications\Jax;

use Admin\Extend\AdminNotifications\Models\AdminNotification;
use Illuminate\Support\Facades\App;
use Lar\LJS\JaxController;
use Lar\LJS\JaxExecutor;
use Request;
use Route;

class AdminNotificationsExecutor extends JaxExecutor
{
    public function __construct()
    {
        JaxController::on_mounted(static function ($executor, $method, $params, $executor_class_name) {
            admin_log_warning('Call executing admin notifications command', "{$executor_class_name}@{$method}", 'fas fa-exchange-alt');
        });
    }

    /**
     * Public method access.
     *
     * @return bool
     */
    public function access()
    {
        return !\Admin::guest();
    }

    public function messagesUrl()
    {
        return route('admin.admin_notifications.index', [
            'q[admin_user_id]' => admin()->id
        ]);
    }

    public function messages()
    {
        return AdminNotification::where('admin_user_id', admin()->id)
            ->orderBy('id', 'desc')
            ->take(6)
            ->whereNull('read_at')
            ->get()
            ->map(function (AdminNotification $notification) {
                $notification = $notification->toArray();
                $notification['read_at'] = isset($notification['read_at']) ? butty_date_time($notification['read_at']) : null;
                $notification['created_at'] = isset($notification['created_at']) ? butty_date_time($notification['created_at']) : null;
                $notification['updated_at'] = isset($notification['updated_at']) ? butty_date_time($notification['updated_at']) : null;
                return $notification;
            });
    }

    public function countOfNew()
    {
        return AdminNotification::where('admin_user_id', admin()->id)
            ->whereNull('read_at')
            ->count();
    }

    public function setAsRead($id)
    {
        if ($notification = AdminNotification::where('id', $id)->where('admin_user_id', admin()->id)->first()) {
            $notification->read_at = now();
            $notification->save();
        }

        return $notification;
    }
}
