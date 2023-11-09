<?php

namespace Admin\Extend\AdminNotifications\Extension;

use Admin\Core\NavigatorExtensionProvider;
use Admin\Extend\AdminNotifications\Components\NotificationsWindow;
use Admin\Extend\AdminNotifications\Controllers\AdminNotificationsController;
use Admin\Interfaces\ActionWorkExtensionInterface;

/**
 * Class Navigator
 * @package Admin\Extend\AdminNotifications\Extension
 */
class Navigator extends NavigatorExtensionProvider implements ActionWorkExtensionInterface {

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->nav_bar_vue(NotificationsWindow::class, [
            'messages_route' => fn () => route('admin.bfg-admin-notifications.messages'),
            'count_of_new_route' => fn () => route('admin.bfg-admin-notifications.count-of-new'),
            'set_as_read_route' => fn () => route('admin.bfg-admin-notifications.set-as-read'),
            'message_url_route' => fn () => route('admin.admin_notifications.index', [
                'q[admin_user_id]' => admin()->id
            ]),
        ]);

        $this->item('Admin notifications')
            ->resource('admin_notifications', AdminNotificationsController::class)
            ->icon_comments();
    }
}
