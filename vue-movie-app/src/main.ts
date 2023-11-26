import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import './assets/main.css'

library.add(faUserSecret)
const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(VueAxios, axios) // 👈
app.component('font-awesome-icon', FontAwesomeIcon)
app.mount('#app')
