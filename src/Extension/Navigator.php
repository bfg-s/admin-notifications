<?php

namespace Admin\Extend\AdminNotifications\Extension;

use Admin\Core\NavigatorExtensionProvider;
use Admin\Extend\AdminNotifications\AdminNotificationsController;
use Admin\Extend\AdminNotifications\Models\AdminNotification;
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
        $this->nav_bar_view('bfg-admin-notifications-extension::notifications');

        $this->item('Admin notifications')
            ->resource('admin_notifications', AdminNotificationsController::class)
            ->icon_comments();
    }
}
