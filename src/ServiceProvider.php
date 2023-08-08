<?php

namespace Admin\Extend\AdminNotifications;

use Admin\Extend\AdminAudit\AuditController;
use Admin\Extend\AdminNotifications\Observers\AuditModelObserver;
use Admin\ExtendProvider;
use Admin\Core\ConfigExtensionProvider;
use Admin\Extend\AdminNotifications\Extension\Config;
use Admin\Extend\AdminNotifications\Extension\Install;
use Admin\Extend\AdminNotifications\Extension\Navigator;
use Admin\Extend\AdminNotifications\Extension\Uninstall;
use Admin\Extend\AdminNotifications\Extension\Permissions;
use OwenIt\Auditing\Models\Audit;

/**
 * Class ServiceProvider
 * @package Admin\Extend\AdminNotifications
 */
class ServiceProvider extends ExtendProvider
{
    /**
     * Extension ID name
     * @var string
     */
    public static $name = "bfg/admin-notifications";

    /**
     * Extension call slug
     * @var string
     */
    static $slug = "bfg_admin_notifications";

    /**
     * Extension description
     * @var string
     */
    public static $description = "The notifications panel for bfg admin";

    /**
     * @var string
     */
    protected $navigator = Navigator::class;

    /**
     * @var string
     */
    protected $install = Install::class;

    /**
     * @var string
     */
    protected $uninstall = Uninstall::class;

    /**
     * @var string
     */
    protected $permissions = Permissions::class;

    /**
     * @var ConfigExtensionProvider|string
     */
    protected $config = Config::class;

    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(
            __DIR__ . '/../views',
            'bfg-admin-notifications-extension'
        );

        $this->publishes([
            __DIR__ . '/../assets' => public_path('vendor/bfg-admin-notifications'),
            __DIR__ . '/../migrations' => database_path('migrations')
        ], 'bfg-admin-notifications');

        \Lar\LJS\Facade::jaxNamespace(__DIR__ . '/Jax', '\\Admin\\Extend\\AdminNotifications\\Jax');
    }
}

