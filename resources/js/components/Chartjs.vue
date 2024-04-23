<template>
    <div>
        <div class="chartcard">
            <Line :data="data" :options="options" />
        </div>
    </div>
</template>

<script>
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
} from "chart.js";
import { Line } from "vue-chartjs";

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
);
console.log("rtes");
export default {
    props: ["eggs"],
    name: "App",
    components: {
        Line,
    },
    setup() {
        return {
            data: {
                labels: [
                    "peewee",
                    "pullet",
                    "small",
                    "medium",
                    "large",
                    "extra_large",
                    "jumbo",
                    "crack",
                ],

                datasets: [],
            },
            options: {
                responsive: true,
            },

            methods: {
                getDataVal() {},
            },
        };
    },
    created() {
        // this.data.datasets[0].data = this.eggs;
        var t = this;

        const colors = [
            "rgb(230, 216, 211)",
            "rgb(213, 230, 216)",
            "rgb(216, 211, 230)",
            "rgb(230, 218, 211)",
            "rgb(211, 230, 222)",
            "rgb(230, 225, 211)",
            "rgb(211, 223, 230)"
        ];

        this.eggs.forEach((egg, index) => {
            var tempdata = [];
            tempdata.push(egg.peewee_count);
            tempdata.push(egg.pullet_count);
            tempdata.push(egg.small_count);
            tempdata.push(egg.medium_count);
            tempdata.push(egg.large_count);
            tempdata.push(egg.extra_large_count);
            tempdata.push(egg.jumbo_count);
            tempdata.push(egg.crack_count);
            
            t.data.datasets.push({
                label: egg.sorting_date,
                data: tempdata,
                fill: false,
                borderColor: colors[index],
                tension: 0.1,
            });
        });
    },
};
</script>
<style>
.chartcard {
    padding: 40px;
}
</style>
