<?php

namespace Admin\Extend\AdminNotifications\Controllers;

use Admin\Controllers\Controller;
use Admin\Extend\AdminNotifications\Models\AdminNotification;
use Illuminate\Http\Request;

class BfgAdminNotificationsController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function messages()
    {
        return AdminNotification::where('admin_user_id', admin()->id)
            ->orderBy('id', 'desc')
            ->take(6)
            ->whereNull('read_at')
            ->get()
            ->map(function (AdminNotification $notification) {
                $notification = $notification->toArray();
                $notification['read_at'] = isset($notification['read_at']) ? beautiful_date_time($notification['read_at']) : null;
                $notification['created_at'] = isset($notification['created_at']) ? beautiful_date_time($notification['created_at']) : null;
                $notification['updated_at'] = isset($notification['updated_at']) ? beautiful_date_time($notification['updated_at']) : null;
                return $notification;
            });
    }

    public function countOfNew()
    {
        return AdminNotification::where('admin_user_id', admin()->id)
            ->whereNull('read_at')
            ->count();
    }

    public function setAsRead(Request $request)
    {
        if ($request->id) {
            if ($notification = AdminNotification::where('id', $request->id)->where('admin_user_id', admin()->id)->first()) {
                $notification->read_at = now();
                $notification->save();
            }
        }

        return $notification;
    }
}
