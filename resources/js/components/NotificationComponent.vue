<template>
    <div>
        <div v-for="notification in notifications" :key="notification.id">
            {{ notification.message }}
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            notifications: [],
        };
    },
    created() {
        Echo.channel('admin-notifications')
            .listen('OrderPlaced', (data) => {
                this.notifications.push(data);
            });
    },
};
</script>
