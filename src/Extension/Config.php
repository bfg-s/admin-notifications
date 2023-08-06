<?php

namespace Admin\Extend\AdminNotifications\Extension;

use Admin\Core\ConfigExtensionProvider;

/**
 * Class Config
 * @package Admin\Extend\AdminNotifications\Extension
 */
class Config extends ConfigExtensionProvider {

    /**
     * @var array
     */
    protected $scripts = [
        "vendor/bfg-admin-notifications/app.js"
    ];

    /**
     * @var array
     */
    protected $styles = [
        "vendor/bfg-admin-notifications/app.css"
    ];
}
