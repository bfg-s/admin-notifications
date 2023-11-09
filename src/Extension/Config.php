<?php

namespace Admin\Extend\AdminNotifications\Extension;

use Admin\Core\ConfigExtensionProvider;

use Admin\Extend\AdminNotifications\Controllers\BfgAdminNotificationsController;
use Illuminate\Routing\RouteRegistrar;

/**
 * Class Config
 * @package Admin\Extend\AdminNotifications\Extension
 */
class Config extends ConfigExtensionProvider {

    /**
     * @var array
     */
    protected array $scripts = [
        "vendor/bfg-admin-notifications/app.js"
    ];

    /**
     * @var array
     */
    protected array $styles = [
        "vendor/bfg-admin-notifications/app.css"
    ];

    /**
     * @param  RouteRegistrar  $route
     * @return void
     */
    public function routes(RouteRegistrar $route): void
    {
        $route->get('bfg-admin-notifications/messages', [BfgAdminNotificationsController::class, 'messages'])
            ->name('bfg-admin-notifications.messages');
        $route->get('bfg-admin-notifications/count-of-new', [BfgAdminNotificationsController::class, 'countOfNew'])
            ->name('bfg-admin-notifications.count-of-new');
        $route->post('bfg-admin-notifications/set-as-read', [BfgAdminNotificationsController::class, 'setAsRead'])
            ->name('bfg-admin-notifications.set-as-read');
    }
}
