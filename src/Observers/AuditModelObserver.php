<?php

namespace Admin\Extend\AdminNotifications\Observers;

use Admin\Extend\AdminNotifications\Models\AdminNotification;
use Admin\Models\AdminUser;
use OwenIt\Auditing\Models\Audit;

class AuditModelObserver
{
    public function created(Audit $audit)
    {
            foreach (AdminUser::all() as $user) {
                if ($audit->event == 'created') {
                    AdminNotification::message(
                        $user,
                        'The model has been created',
                        $audit->auditable_type,
                        route('admin.audits.show', $audit)
                    );
                } else if ($audit->event == 'updated') {
                    AdminNotification::message(
                        $user,
                        'The model has been updated',
                        $audit->auditable_type,
                        route('admin.audits.show', $audit)
                    );
                } else if ($audit->event == 'deleted') {
                    AdminNotification::message(
                        $user,
                        'The model has been deleted',
                        $audit->auditable_type,
                        route('admin.audits.show', $audit)
                    );
                }
            }
    }
}
