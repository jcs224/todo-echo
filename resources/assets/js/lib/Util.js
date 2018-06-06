import m from 'mithril'

let Util = {
    request(options) {
        let token = document.head.querySelector('meta[name="csrf-token"]');

        let headers = {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': token.content
            }
        }

        let optionsWithHeaders = _.assign({}, headers, options)

        return m.request(optionsWithHeaders)
    },

    sayHello() {
        alert('say hello')
    }
}

export default Util
