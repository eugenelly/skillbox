import React from 'react'
import {connect} from 'react-redux'

import AddComment from '../components/add-comment'
import CommentsList from '../components/comments-list'

import {addComment, deleteComment, setNewComment} from '../actions/comments'

let App = (props) => {
    const {
        comments, new_comment, addComment, deleteComment, setNewComment
    } = props

    localStorage.setItem('initState', JSON.stringify({comments, new_comment}))

    return (
        <div>
            <AddComment
                new_comment={new_comment}
                addComment={addComment}
                setNewComment={setNewComment}
            />
            <CommentsList
                comments={comments}
                deleteComment={deleteComment}/>
        </div>
    )
}

const mapStateToProps = (state) => ({
    comments: state.comments,
    new_comment: state.new_comment
})

const mapDispatchToProps = (dispatch) => ({
    addComment: (author, text, time) => dispatch(addComment(author, text, time)),
    deleteComment: (id) => dispatch(deleteComment(id)),
    setNewComment: (author, text) => dispatch(setNewComment(author, text))
})

App = connect(
    mapStateToProps,
    mapDispatchToProps
)(App)

export default App