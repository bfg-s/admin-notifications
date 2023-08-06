<?php

namespace Admin\Extend\AdminNotifications\Extension;

use Admin\Core\UnInstallExtensionProvider;
use Admin\Interfaces\ActionWorkExtensionInterface;

/**
 * Class Navigator
 * @package Admin\Extend\AdminNotifications\Extension
 */
class Uninstall extends UnInstallExtensionProvider implements ActionWorkExtensionInterface {

    /**
     * @return void
     */
    public function handle(): void
    {

    }
}
