import './bootstrap';

import { createApp } from 'vue'
import Chartjs from './components/Chartjs.vue'
import HarvestPie from './components/HarvestPie.vue'

const app = createApp()

app.component('Chartjs', Chartjs)
app.component('Harvestpie', HarvestPie)

app.mount('#app')