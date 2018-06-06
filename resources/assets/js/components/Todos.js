import m from 'mithril'
import data from '../Data'

let Todos = {
    oninit() {
        data.getTodos()
    },

    view() {
        return [
            m('h1.text-center', 'Bozeman Laravel Todo'),
            m(".grid-container",
            m(".grid-x",
                m(".cell.small-12.medium-6.medium-offset-3",
                    m(".input-group", [
                        m("input.input-group-field", { oninput:  m.withAttr('value', data.setTodo), value: data.newTodo }),
                        m(".input-group-button",
                            m("button.button", { onclick: data.createTodo }, 'Submit')
                        )
                    ]),
                    m("ul.menu.vertical", data.todos.filter((todo) => {
                        return todo.completed == false ? true : false
                    }).map((todo) => {
                        return m("li", [
                            m("input[type='checkbox']", {
                                id: 'todo-'+todo.id,
                                onclick: m.withAttr('value', () => {
                                    data.completeTodo(todo.id)
                                })
                            }),
                            m("label", { for: 'todo-'+todo.id }, todo.text)
                        ])
                    })),
                    m("ul.menu.vertical", {style: 'margin-top: 15px;'},  data.todos.filter((todo) => {
                        return todo.completed == true ? true : false
                    }).map((todo) => {
                        return m("li", [
                            m("input[type='checkbox'][checked]", {
                                id: 'todo-'+todo.id,
                                onclick: m.withAttr('value', () => {
                                    data.uncompleteTodo(todo.id)
                                })
                            }),
                            m("label", { for: 'todo-'+todo.id, style: 'text-decoration: line-through' }, todo.text)
                        ])
                    }))
                )
            )
            )
        ]
    }
}

export default Todos
