<?php

namespace Admin\Extend\AdminNotifications\Extension;

use Admin\Core\InstallExtensionProvider;
use Admin\Interfaces\ActionWorkExtensionInterface;

/**
 * Class Install
 * @package Admin\Extend\AdminNotifications\Extension
 */
class Install extends InstallExtensionProvider implements ActionWorkExtensionInterface {

    /**
     * @return void
     */
    public function handle(): void
    {
        \Artisan::call('vendor:publish', [
            '--tag' => 'bfg-admin-notifications',
            '--force' => true
        ]);
    }
}
