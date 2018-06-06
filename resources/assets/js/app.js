require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import m from 'mithril'
import Todos from './components/Todos'
import util from './lib/Util'
import data from './Data'

m.mount(document.body, Todos)

// util.request({method: 'GET', url: '/api/todos'})
//     .then((data) => {
//         console.log(data)
// })

Echo.channel('todo')
    .listen('TodoAdded', (e) => {
        data.todos.push(e.todo);
        m.redraw()
    })
    .listen('TodoDeleted', (e) => {
        _.remove(data.todos, (todo) => {
            return todo.id == e.todo.id
        })
        m.redraw()
    })
    .listen('TodoCompleted', (e) => {
        let todoIndex = _.findIndex(data.todos, { id: e.todo.id })
        data.todos.splice(todoIndex, 1, e.todo)
        m.redraw()
    })
    .listen('TodoUncompleted', (e) => {
        let todoIndex = _.findIndex(data.todos, { id: e.todo.id })
        data.todos.splice(todoIndex, 1, e.todo)
        m.redraw()
    })

$(document).foundation()
