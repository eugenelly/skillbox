import {ADD_COMMENT, DELETE_COMMENT, SET_NEW_COMMENT} from '../contants'

const comments = (state = {
    comments: [],
    new_comment: {}
}, {type, id, author, text, time}) => {
    switch (type) {
        case ADD_COMMENT:
            return {
                ...state, comments: [
                    ...state.comments, {
                        id: ++state.new_comment.id,
                        author: author,
                        text: text,
                        time: time
                    },
                ],
                new_comment: {
                    ...state.new_comment,
                    id: state.new_comment.id
                }
            }

        case DELETE_COMMENT:
            const comments = [...state.comments]

            let i, index = 0
            state.comments.map((comment)=> {
                if (comment.id === id) {
                    i = index
                }
                index++
            })

            comments.splice(i, 1)

            return {...state, comments: comments}


        case SET_NEW_COMMENT:
            return {
                ...state, new_comment: {
                    ...state.new_comment,
                    author: author,
                    text: text
                }
            }

        default:
            return state
    }
}

export default comments