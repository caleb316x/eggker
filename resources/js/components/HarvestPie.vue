<template>
    <div
        style="
            position: relative;
            height: 50vh;
            width: 50vw;
            padding: 8px;
            /* margin-left: 20%; */
        "
    >
        <Pie id="my-chart-id" :options="chartOptions" :data="chartData" />
    </div>
</template>

<script>
import { Pie } from "vue-chartjs";
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";
ChartJS.register(ArcElement, Tooltip, Legend);

export default {
    props: ["egg"],
    name: "PieChart",
    components: { Pie },
    data() {
        return {
            chartData: {
                labels: [
                    "peewee",
                    "pullet",
                    "small",
                    "medium",
                    "large",
                    "extra_large",
                    "jumbo",
                ],
                datasets: [
                    {
                        backgroundColor: [
                            "#1F77B4", // Blue
                            "#FF7F0E", // Orange
                            "#2CA02C", // Green
                            "#D62728", // Red
                            "#9467BD", // Purple
                            "#8C564B", // Brown
                            "#E377C2", // Pink
                            "#7F7F7F", // Gray
                        ],
                        data: [40, 20, 80, 10, 40, 20, 80, 10],
                    },
                ],
            },
            chartOptions: {
                responsive: true,
                // circumference: 360
            },
        };
    },
    created() {
        this.chartData.datasets[0].data = this.egg;
    },
};
</script>
