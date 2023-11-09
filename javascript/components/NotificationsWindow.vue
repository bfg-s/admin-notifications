<template>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="far fa-comments"></i>
            <span v-if="count" class="badge badge-danger navbar-badge">
                {{ count }}
                <audio
                    ref="audio"
                    preload="auto"
                >
                    <source src="/vendor/bfg-admin-notifications/beep.mp3" />
                </audio>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">

            <template v-for="(item, key) in items">
                <a :href="item.link ? item.link : `javascript:void(0)`" class="dropdown-item" :key="item.id+'-item-notification'">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                {{ item.title }}
                                <span @click.prevent.stop="readed(item.id)" :class="`float-right text-sm ${ item.read_at ? 'text-success' : 'text-danger'}`">
                                        <i class="fas fa-star"></i>
                                    </span>
                            </h3>
                            <p class="text-sm">{{ item.text }}</p>
                            <p class="text-sm text-muted">
                                <i class="far fa-clock mr-1"></i> {{ item.created_at }}
                            </p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider" :key="item.id+'-item-notification-divider'"></div>
            </template>

            <a v-if="url" :href="url" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
    </li>
</template>

<script>
export default {
    name: "NotificationsWindow",
    props: ['messages_route', 'count_of_new_route', 'message_url_route', 'set_as_read_route'],
    data () {
        return {
            items: [],
            count: 0,
            url: null,
        };
    },
    mounted () {
        axios.get(this.messages_route).then(d => this.items = d.data);
        axios.get(this.count_of_new_route).then(d => this.count = d.data);
        this.url = this.message_url_route;
        document.addEventListener('admin_notifications_update', this.updateItems);
    },
    beforeDestroy () {
        document.removeEventListener('admin_notifications_update', this.updateItems);
    },
    methods: {
        async updateItems () {
            this.items = (await axios.get(this.messages_route)).data;
            this.count = (await axios.get(this.count_of_new_route)).data;
            if (this.count) {
                await this.toggleSound();
            }
        },
        async readed (id) {
            await axios.post(this.set_as_read_route, {_token: exec('token'), id})
        },
        async toggleSound() {
            let audio = this.$refs.audio;
            await audio.play();
            // setTimeout(() => {
            //     audio.pause();
            // }, 500);
        },
    }
}
</script>

<style scoped>

</style>
