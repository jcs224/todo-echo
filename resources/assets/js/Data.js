import m from 'mithril'
import util from './lib/Util'

let Data = {
    todos: [],
    newTodo: '',

    setTodo(value) {
        Data.newTodo = value
    },

    createTodo() {
        util.request({
            method: 'POST',
            url: '/api/todos',
            data: {
                'text': Data.newTodo
            }
        }).then((result) => {
            Data.getTodos()
            Data.newTodo = ''
        })
    },

    getTodos() {
        util.request({
            method: 'GET',
            url: '/api/todos'
        }).then((result) => {
            Data.todos = result
        })
    },

    completeTodo(id) {
        util.request({
            method: 'PUT',
            url: '/api/todos/'+id+'/complete'
        }).then((result) => {
            Data.getTodos()
        })
    },

    uncompleteTodo(id) {
        util.request({
            method: 'PUT',
            url: '/api/todos/'+id+'/uncomplete'
        }).then((result) => {
            Data.getTodos()

        })
    }
}

export default Data
