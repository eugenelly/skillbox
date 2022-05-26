import React from 'react'
import ReactDom from 'react-dom'

import {createStore} from 'redux'

import CommentsApp from './containers/app'
import comments from './reducers/comments'

let initState = {}

if (localStorage.getItem('initState')) {
    initState = JSON.parse(localStorage.getItem('initState'))
} else {
    initState = {
        comments: [
            {
                id: 1,
                author: 'Eugene',
                text: 'Im a web-developer',
                time: new Date().toLocaleTimeString("ru-RU")
            },
        ],
        new_comment: {
            id: 1,
            author: '',
            text: ''
        },
    }
}

const store = createStore(comments, initState)

ReactDom.render(
    <CommentsApp store={store}/>,
    document.querySelector('#app')
)