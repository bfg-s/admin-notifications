
document.addEventListener('admin:init', () => {
    Vue.component('notifications-window', require(`./components/NotificationsWindow`).default);
});
