<template>
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
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

    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Weekly Harvest</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Peewee: <span class="font-bold" :class="{ 'fade-text': isAnimating['peewee'] }">{{ w_size["peewee"] }}</span>
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Pullet: <span class="font-bold" :class="{ 'fade-text': isAnimating['pullet'] }">{{ w_size["pullet"] }}</span>
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Small: <span class="font-bold" :class="{ 'fade-text': isAnimating['small'] }">{{ w_size["small"] }}</span>
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Medium: <span class="font-bold" :class="{ 'fade-text': isAnimating['medium'] }">{{ w_size["medium"] }}</span>
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Large: <span class="font-bold" :class="{ 'fade-text': isAnimating['large'] }">{{ w_size["large"] }}</span>
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Extra Large:
            <span class="font-bold" :class="{ 'fade-text': isAnimating['extra_large'] }">{{ w_size["extra_large"] }}</span>
        </p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Jumbo: <span class="font-bold" :class="{ 'fade-text': isAnimating['jumbo'] }">{{ w_size["jumbo"] }}</span>
        </p>
        <hr />
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            Total Eggs: <span class="font-bold">{{ w_total }}</span>
        </p>
    </div>
    
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Monthly Harvest ({{ month_now }})</h5>
        </a>  
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Peewee: <span class="font-bold" :class="{ 'fade-text': isAnimating['peewee'] }">{{ m_size["peewee"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Pullet: <span class="font-bold" :class="{ 'fade-text': isAnimating['pullet'] }">{{ m_size["pullet"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Small: <span class="font-bold" :class="{ 'fade-text': isAnimating['small'] }">{{ m_size["small"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Medium: <span class="font-bold" :class="{ 'fade-text': isAnimating['medium'] }">{{ m_size["medium"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Large: <span class="font-bold" :class="{ 'fade-text': isAnimating['large'] }">{{ m_size["large"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Extra Large:
                <span class="font-bold" :class="{ 'fade-text': isAnimating['extra_large'] }">{{ m_size["extra_large"] }}</span>
            </p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Jumbo: <span class="font-bold" :class="{ 'fade-text': isAnimating['jumbo'] }">{{ m_size["jumbo"] }}</span>
            </p>
            <hr />
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                Total Eggs: <span class="font-bold">{{ m_total }}</span>
            </p>
    </div>
</template>

<script>
export default {
    props: ["egg","w_egg","m_egg","month_now"],
    data() {
        return {
            currentDate: new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }),
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
            w_size: {
                peewee: 0,
                pullet: 0,
                small: 0,
                medium: 0,
                large: 0,
                extra_large: 0,
                jumbo: 0,
            },
            m_size: {
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
            w_total: 0,
            m_total: 0,
        };
    },
    mounted() {
        this.getCount();
        this.getTotal();
        console.log("👂");
        window.Echo.channel("eggker").listen(".MessageSent", (e) => {
            console.log("Event received", e);
            this.messages.push({ text: e.message });
            this.changeValue(e.message);
            this.size[e.message] += 1;
            this.w_size[e.message] += 1;
            this.m_size[e.message] += 1;
            this.total += 1;
            this.w_total += 1;
            this.m_total += 1;
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
            if (this.w_egg != null) {
                this.w_size["peewee"] = this.w_egg[0];
                this.w_size["pullet"] = this.w_egg[1];
                this.w_size["small"] = this.w_egg[2];
                this.w_size["medium"] = this.w_egg[3];
                this.w_size["large"] = this.w_egg[4];
                this.w_size["extra_large"] = this.w_egg[5];
                this.w_size["jumbo"] = this.w_egg[6];
            }
            if (this.m_egg != null) {
                this.m_size["peewee"] = this.m_egg[0];
                this.m_size["pullet"] = this.m_egg[1];
                this.m_size["small"] = this.m_egg[2];
                this.m_size["medium"] = this.m_egg[3];
                this.m_size["large"] = this.m_egg[4];
                this.m_size["extra_large"] = this.m_egg[5];
                this.m_size["jumbo"] = this.m_egg[6];
            }
        },
        getTotal: function () {
            var t = this;
            for (let key in this.size) {
                if (this.size.hasOwnProperty(key)) {
                    t.total += t.size[key];
                }
            }

            for (let key in this.w_size) {
                if (this.w_size.hasOwnProperty(key)) {
                    t.w_total += t.w_size[key];
                }
            }

            for (let key in this.m_size) {
                if (this.m_size.hasOwnProperty(key)) {
                    t.m_total += t.m_size[key];
                }
            }
        },
        changeValue(index) {
            this.isAnimating[index] = true;
            setTimeout(() => {
                this.isAnimating[index] = false;
            }, 3000);
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
