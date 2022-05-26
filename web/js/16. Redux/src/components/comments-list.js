import React from 'react'

const CommentsList = props => {
    const {comments, deleteComment} = props

    return (
        <div>
            <h2>Comments List</h2>
            <ol>
                {
                    comments.map(comment => {
                        return (
                            <li key = {comment.id}>
                                <button type="button"
                                        onClick={ev => deleteComment(comment.id)}
                                >Удалить
                                </button>
                                {comment.author} "{comment.text}" {comment.time}
                            </li>
                        )
                    })
                }
            </ol>
        </div>
    );
}

export default CommentsList;