import { createApp, provide, h  } from 'vue'
import { createPinia } from 'pinia'
import { DefaultApolloClient } from '@vue/apollo-composable'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUserSecret } from '@fortawesome/free-solid-svg-icons'
import './assets/main.css'
// import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ApolloClient, InMemoryCache, createHttpLink } from '@apollo/client/core'

library.add(faUserSecret)
// const app = createApp(App)
const app = createApp({
  setup () {
    provide(DefaultApolloClient, apolloClient)
  },

  render: () => h(App),
})

// HTTP connection to the API
const httpLink = createHttpLink({
  // You should use an absolute URL here
  uri: 'http://localhost:8000/graphql',
})

// Cache implementation
const cache = new InMemoryCache()

// Create the apollo client
const apolloClient = new ApolloClient({
  link: httpLink,
  cache,
})


// this is from apollo-option, not composable api
// const apolloProvider = createApolloProvider({
//   defaultClient: apolloClient,
// })

// app.use(apolloProvider)

app.use(createPinia())
app.use(router)
app.use(VueAxios, axios) // 👈
app.component('font-awesome-icon', FontAwesomeIcon)
app.mount('#app')


