<template>
    <div>
        <a href="#">
            <h5
                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
            >
                Today's Harvest
                <br />({{ currentDate }})
            </h5>
        </a>
        <p
            v-if="total == 0"
            class="mb-3 font-normal text-gray-700 dark:text-gray-400"
        >
            No eggs were harvested today
        </p>

        <div v-else>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Peewee: <span class="font-bold" :class="{ 'fade-text': isAnimating['peewee'] }">{{ size["peewee"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Pullet: <span class="font-bold" :class="{ 'fade-text': isAnimating['pullet'] }">{{ size["pullet"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Small: <span class="font-bold" :class="{ 'fade-text': isAnimating['small'] }">{{ size["small"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Medium: <span class="font-bold" :class="{ 'fade-text': isAnimating['medium'] }">{{ size["medium"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Large: <span class="font-bold" :class="{ 'fade-text': isAnimating['large'] }">{{ size["large"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Extra Large:
                <span class="font-bold" :class="{ 'fade-text': isAnimating['extra_large'] }">{{ size["extra_large"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Jumbo: <span class="font-bold" :class="{ 'fade-text': isAnimating['jumbo'] }">{{ size["jumbo"] }}</span>
            </p>
            <hr />
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Total Eggs: <span class="font-bold">{{ total }}</span>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: ["egg"],
    data() {
        return {
            currentDate: new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }),
            // currentDate: new Date().toLocaleDateString(),
            messages: [],
            size: {
                peewee: 0,
                pullet: 0,
                small: 0,
                medium: 0,
                large: 0,
                extra_large: 0,
                jumbo: 0,
            },
            isAnimating: {
                peewee: false,
                pullet: false,
                small: false,
                medium: false,
                large: false,
                extra_large: false,
                jumbo: false,
            },
            total: 0,
        };
    },
    mounted() {
        this.getCount();
        this.getTotal();
        window.Echo.channel("eggker").listen(".MessageSent", (e) => {
            console.log("Event received", e);
            this.messages.push({ text: e.message });
            this.changeValue(e.message);
            this.size[e.message] += 1;
            this.total += 1;
        });
    },
    methods: {
        
        getCount: function () {
            if (this.egg != null) {
                this.size["peewee"] = this.egg.peewee_count;
                this.size["pullet"] = this.egg.pullet_count;
                this.size["small"] = this.egg.small_count;
                this.size["medium"] = this.egg.medium_count;
                this.size["large"] = this.egg.large_count;
                this.size["extra_large"] = this.egg.extra_large_count;
                this.size["jumbo"] = this.egg.jumbo_count;
            }
        },
        getTotal: function () {
            var t = this;
            for (let key in this.size) {
                if (this.size.hasOwnProperty(key)) {
                    t.total += t.size[key];
                }
            }
        },
        changeValue(index) {
            // Trigger animation
            this.isAnimating[index] = true;

            // Reset the animation after it completes
            setTimeout(() => {
                this.isAnimating[index] = false;
            }, 3000); // Duration should match the animation duration
        },
    },
};
</script>

<style scoped>
.fade-text {
    animation: greenToBlack 3s forwards;
}

@keyframes greenToBlack {
    0% {
        color: green;
    }
    50% {
        color: green;
    }
    100% {
        color: #9ca3af;
    }
}
</style>
