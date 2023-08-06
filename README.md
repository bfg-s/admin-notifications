<p align="center"><a href="https://wood.veskod.com/documentation/admin-panel" target="_blank">
<img src="https://wood.veskod.com/images/logo.png" alt="Laravel Logo">
</a></p>

<p align="center">
<a href="https://packagist.org/packages/bfg/admin-notifications"><img src="https://img.shields.io/packagist/dt/bfg/admin-notifications" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/bfg/admin-notifications"><img src="https://img.shields.io/packagist/v/bfg/admin-notifications" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/bfg/admin-notifications"><img src="https://img.shields.io/packagist/l/bfg/admin-notifications" alt="License"></a>
</p>

# Install
```
composer require bfg/admin-notifications
```
# Admin puller install
```
php artisan admin:extension bfg/admin-puller --install
```
# Admin install
```
php artisan admin:extension bfg/admin-notifications --install
```
```
php artisan migrate
```
# Make message for administrator
```php
\Admin\Extend\AdminNotifications\Models\AdminNotification::message(
    int|AdminUser $user, string $title, string $text, string $link = null
);
```
