import './bootstrap';

import { createApp } from 'vue'
import Chartjs from './components/Chartjs.vue'
import HarvestPie from './components/HarvestPie.vue'
import DashboardBroadcast from './components/DashboardBroadcast.vue';

const app = createApp()
const app2 = createApp()

app2.component('Dash', DashboardBroadcast)
app.component('Chartjs', Chartjs)
app.component('Harvestpie', HarvestPie)

app.mount('#app')
app2.mount('#app2')