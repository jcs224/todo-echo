require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import m from 'mithril'
import Todos from './components/Todos'
import util from './lib/Util'

m.mount(document.body, Todos)

util.request({method: 'GET', url: '/api/todos'})
    .then((data) => {
        console.log(data)
})

$(document).foundation()
