import {ADD_COMMENT, DELETE_COMMENT, SET_NEW_COMMENT} from '../contants'

export const addComment = (author, text, time) => ({
    type: ADD_COMMENT,
    author,
    text,
    time
})

export const deleteComment = (id) => ({
    type: DELETE_COMMENT,
    id
})

export const setNewComment = (author, text) => ({
    type: SET_NEW_COMMENT,
    author,
    text
})